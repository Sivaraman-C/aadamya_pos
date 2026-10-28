<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aadamya POS - Database Migration Utility
 * 
 * Handles database schema migrations and updates
 * 
 * @package    Aadamya_POS
 * @category   Utilities
 * @author     Aadamya Development Team
 * @version    1.0.0
 */

class Database_Migration_Utility {

    private $CI;
    private $migrations_dir;
    private $migrations_table = 'schema_migrations';
    private $errors = array();

    public function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->database();
        $this->migrations_dir = APPPATH . 'migrations/';
        $this->_create_migrations_table();
    }

    /**
     * Create migrations tracking table if it doesn't exist
     */
    private function _create_migrations_table() {
        $this->CI->db->query("
            CREATE TABLE IF NOT EXISTS `{$this->migrations_table}` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `migration` VARCHAR(255) NOT NULL UNIQUE,
                `batch` INT NOT NULL,
                `executed_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        ");
    }

    /**
     * Get list of all available migrations
     * 
     * @return array
     */
    public function get_available_migrations() {
        $migrations = array();

        if (is_dir($this->migrations_dir)) {
            $files = scandir($this->migrations_dir);
            
            foreach ($files as $file) {
                if (preg_match('/^\d+_.*\.php$/', $file)) {
                    $migrations[] = str_replace('.php', '', $file);
                }
            }
            
            sort($migrations);
        }

        return $migrations;
    }

    /**
     * Get list of executed migrations
     * 
     * @return array
     */
    public function get_executed_migrations() {
        $query = $this->CI->db->get($this->migrations_table);
        $executed = array();

        foreach ($query->result() as $row) {
            $executed[] = $row->migration;
        }

        return $executed;
    }

    /**
     * Get pending migrations
     * 
     * @return array
     */
    public function get_pending_migrations() {
        $available = $this->get_available_migrations();
        $executed = $this->get_executed_migrations();

        return array_diff($available, $executed);
    }

    /**
     * Run a specific migration
     * 
     * @param string $migration_name
     * @return boolean
     */
    public function run_migration($migration_name) {
        $file_path = $this->migrations_dir . $migration_name . '.php';

        if (!file_exists($file_path)) {
            $this->errors[] = "Migration file not found: $migration_name";
            return false;
        }

        try {
            // Include migration file
            include $file_path;

            // Get current batch number
            $query = $this->CI->db->select('MAX(batch) as batch')
                                   ->get($this->migrations_table);
            $batch = 1;
            
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $batch = $row->batch + 1;
            }

            // Record migration as executed
            $this->CI->db->insert($this->migrations_table, array(
                'migration' => $migration_name,
                'batch' => $batch
            ));

            return true;
        } catch (Exception $e) {
            $this->errors[] = "Migration failed: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Run all pending migrations
     * 
     * @return array
     */
    public function run_pending_migrations() {
        $pending = $this->get_pending_migrations();
        $executed = array();
        $failed = array();

        foreach ($pending as $migration) {
            if ($this->run_migration($migration)) {
                $executed[] = $migration;
            } else {
                $failed[] = $migration;
            }
        }

        return array(
            'executed' => $executed,
            'failed' => $failed
        );
    }

    /**
     * Rollback last batch of migrations
     * 
     * @return boolean
     */
    public function rollback_last_batch() {
        // Get last batch number
        $query = $this->CI->db->select('MAX(batch) as batch')
                               ->get($this->migrations_table);
        
        if ($query->num_rows() === 0) {
            $this->errors[] = "No migrations to rollback";
            return false;
        }

        $row = $query->row();
        $batch = $row->batch;

        // Get migrations from last batch
        $migrations = $this->CI->db->where('batch', $batch)
                                   ->get($this->migrations_table)
                                   ->result();

        foreach ($migrations as $migration) {
            // Call rollback method from migration file
            $file_path = $this->migrations_dir . $migration->migration . '.php';
            
            if (file_exists($file_path)) {
                include $file_path;
                // Note: Migration file should have rollback logic
            }

            // Remove from migrations table
            $this->CI->db->where('migration', $migration->migration)
                        ->delete($this->migrations_table);
        }

        return true;
    }

    /**
     * Create a new migration file
     * 
     * @param string $migration_name
     * @param string $template
     * @return boolean
     */
    public function create_migration($migration_name, $template = null) {
        $timestamp = date('YmdHis');
        $file_name = $timestamp . '_' . $migration_name . '.php';
        $file_path = $this->migrations_dir . $file_name;

        if (!is_dir($this->migrations_dir)) {
            mkdir($this->migrations_dir, 0755, true);
        }

        $content = $template ? $template : $this->_get_default_template($migration_name);

        if (file_put_contents($file_path, $content)) {
            return true;
        } else {
            $this->errors[] = "Failed to create migration file: $file_path";
            return false;
        }
    }

    /**
     * Get default migration template
     * 
     * @param string $migration_name
     * @return string
     */
    private function _get_default_template($migration_name) {
        $class_name = $this->_camelcase($migration_name);

        return "<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Migration: {$migration_name}
 * 
 * Description: Add description here
 */
class {$class_name} {

    private \$CI;

    public function __construct() {
        \$this->CI = &get_instance();
        \$this->CI->load->database();
    }

    /**
     * Run migration
     */
    public function up() {
        // Add your migration SQL here
        // Example: \$this->CI->db->query('ALTER TABLE table_name ADD COLUMN ...');
    }

    /**
     * Rollback migration
     */
    public function down() {
        // Add your rollback SQL here
        // Example: \$this->CI->db->query('ALTER TABLE table_name DROP COLUMN ...');
    }
}
";
    }

    /**
     * Convert underscore string to camelcase
     * 
     * @param string $string
     * @return string
     */
    private function _camelcase($string) {
        return ucwords(str_replace('_', ' ', $string), ' ');
    }

    /**
     * Add column to table
     * 
     * @param string $table
     * @param string $column_name
     * @param array $column_definition
     * @return boolean
     */
    public function add_column($table, $column_name, $column_definition) {
        if ($this->_column_exists($table, $column_name)) {
            $this->errors[] = "Column already exists: $table.$column_name";
            return false;
        }

        try {
            $sql = "ALTER TABLE `$table` ADD COLUMN `$column_name` " . $this->_get_column_definition($column_definition);
            $this->CI->db->query($sql);
            return true;
        } catch (Exception $e) {
            $this->errors[] = "Failed to add column: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Modify column in table
     * 
     * @param string $table
     * @param string $column_name
     * @param array $column_definition
     * @return boolean
     */
    public function modify_column($table, $column_name, $column_definition) {
        try {
            $sql = "ALTER TABLE `$table` MODIFY COLUMN `$column_name` " . $this->_get_column_definition($column_definition);
            $this->CI->db->query($sql);
            return true;
        } catch (Exception $e) {
            $this->errors[] = "Failed to modify column: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Drop column from table
     * 
     * @param string $table
     * @param string $column_name
     * @return boolean
     */
    public function drop_column($table, $column_name) {
        try {
            $this->CI->db->query("ALTER TABLE `$table` DROP COLUMN `$column_name`");
            return true;
        } catch (Exception $e) {
            $this->errors[] = "Failed to drop column: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Create index
     * 
     * @param string $table
     * @param string $index_name
     * @param array $columns
     * @return boolean
     */
    public function create_index($table, $index_name, $columns) {
        $column_list = implode('`, `', $columns);

        try {
            $this->CI->db->query("CREATE INDEX `$index_name` ON `$table` (`$column_list`)");
            return true;
        } catch (Exception $e) {
            $this->errors[] = "Failed to create index: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Check if column exists
     * 
     * @param string $table
     * @param string $column_name
     * @return boolean
     */
    private function _column_exists($table, $column_name) {
        $query = $this->CI->db->query("SHOW COLUMNS FROM `$table` WHERE Field = '$column_name'");
        return $query->num_rows() > 0;
    }

    /**
     * Get column definition SQL
     * 
     * @param array $definition
     * @return string
     */
    private function _get_column_definition($definition) {
        $sql = '';

        if (isset($definition['type'])) {
            $sql .= $definition['type'];
        }

        if (isset($definition['length'])) {
            $sql .= "({$definition['length']})";
        }

        if (isset($definition['unsigned']) && $definition['unsigned']) {
            $sql .= " UNSIGNED";
        }

        if (isset($definition['nullable']) && !$definition['nullable']) {
            $sql .= " NOT NULL";
        }

        if (isset($definition['default'])) {
            $sql .= " DEFAULT '{$definition['default']}'";
        }

        if (isset($definition['auto_increment']) && $definition['auto_increment']) {
            $sql .= " AUTO_INCREMENT";
        }

        return $sql;
    }

    /**
     * Get errors
     * 
     * @return array
     */
    public function get_errors() {
        return $this->errors;
    }

    /**
     * Clear errors
     */
    public function clear_errors() {
        $this->errors = array();
    }
}
