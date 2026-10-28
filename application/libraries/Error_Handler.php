<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aadamya POS - Error Handler & Logger
 * 
 * Centralized error handling and logging system
 * 
 * @package    Aadamya_POS
 * @category   Libraries
 * @author     Aadamya Development Team
 * @version    1.0.0
 */

class Error_Handler {

    private $CI;
    private $log_file;
    private $enable_email_alerts = false;
    private $error_email = 'admin@aadamya.com';

    public function __construct() {
        $this->CI = &get_instance();
        $this->log_file = APPPATH . 'logs/error_' . date('Y-m-d') . '.log';
        $this->enable_email_alerts = getenv('ERROR_EMAIL_ALERTS') === 'true';
    }

    /**
     * Log error with context
     * 
     * @param string $message Error message
     * @param array $context Additional context
     * @param string $level (debug, info, warning, error, critical)
     */
    public function log_error($message, $context = array(), $level = 'error') {
        $log_entry = $this->_format_log_entry($message, $context, $level);
        
        // Write to file
        $this->_write_to_file($log_entry);
        
        // Send email alert for critical errors
        if ($level === 'critical' && $this->enable_email_alerts) {
            $this->_send_alert_email($message, $context);
        }
    }

    /**
     * Log API error
     * 
     * @param string $endpoint API endpoint
     * @param string $method HTTP method
     * @param int $status_code HTTP status code
     * @param string $message Error message
     * @param array $details Additional details
     */
    public function log_api_error($endpoint, $method, $status_code, $message, $details = array()) {
        $context = array(
            'type' => 'API_ERROR',
            'endpoint' => $endpoint,
            'method' => $method,
            'status_code' => $status_code,
            'ip_address' => $this->CI->input->ip_address(),
            'user_agent' => $this->CI->input->user_agent(),
            'details' => $details
        );

        $this->log_error($message, $context, 'error');
    }

    /**
     * Log database error
     * 
     * @param string $message Error message
     * @param string $query SQL query that failed
     * @param array $bindings Query bindings
     */
    public function log_db_error($message, $query = '', $bindings = array()) {
        $context = array(
            'type' => 'DATABASE_ERROR',
            'query' => $query,
            'bindings' => $bindings,
            'error' => $this->CI->db->error()
        );

        $this->log_error($message, $context, 'error');
    }

    /**
     * Log user activity
     * 
     * @param string $action User action
     * @param string $description Action description
     * @param int $user_id User ID
     * @param array $details Additional details
     */
    public function log_user_activity($action, $description, $user_id = null, $details = array()) {
        if (is_null($user_id)) {
            $user_id = $this->CI->session->userdata('user_id');
        }

        $context = array(
            'type' => 'USER_ACTIVITY',
            'user_id' => $user_id,
            'action' => $action,
            'description' => $description,
            'ip_address' => $this->CI->input->ip_address(),
            'details' => $details
        );

        $this->log_error("User Activity: $action", $context, 'info');
    }

    /**
     * Log security event
     * 
     * @param string $event_type Security event type
     * @param string $description Event description
     * @param array $details Event details
     */
    public function log_security_event($event_type, $description, $details = array()) {
        $context = array(
            'type' => 'SECURITY_EVENT',
            'event' => $event_type,
            'ip_address' => $this->CI->input->ip_address(),
            'user_agent' => $this->CI->input->user_agent(),
            'details' => $details
        );

        $level = in_array($event_type, array('INTRUSION_ATTEMPT', 'SUSPICIOUS_ACTIVITY')) ? 'critical' : 'warning';
        $this->log_error("Security: $description", $context, $level);
    }

    /**
     * Log payment error
     * 
     * @param string $payment_method Payment method
     * @param string $message Error message
     * @param string $transaction_id Transaction ID
     * @param array $details Payment details
     */
    public function log_payment_error($payment_method, $message, $transaction_id = '', $details = array()) {
        $context = array(
            'type' => 'PAYMENT_ERROR',
            'payment_method' => $payment_method,
            'transaction_id' => $transaction_id,
            'details' => $details
        );

        $this->log_error("Payment Error ($payment_method): $message", $context, 'error');
    }

    /**
     * Format log entry
     * 
     * @param string $message
     * @param array $context
     * @param string $level
     * @return string
     */
    private function _format_log_entry($message, $context, $level) {
        $timestamp = date('Y-m-d H:i:s');
        $level_upper = strtoupper($level);
        
        $entry = "[$timestamp] [$level_upper] $message\n";
        
        if (!empty($context)) {
            $entry .= "Context:\n";
            $entry .= json_encode($context, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";
        }
        
        $entry .= "---\n";
        
        return $entry;
    }

    /**
     * Write log entry to file
     * 
     * @param string $entry Log entry
     */
    private function _write_to_file($entry) {
        try {
            if (!is_dir(dirname($this->log_file))) {
                mkdir(dirname($this->log_file), 0755, true);
            }
            
            file_put_contents($this->log_file, $entry, FILE_APPEND);
        } catch (Exception $e) {
            // Fallback to system error log
            error_log($entry);
        }
    }

    /**
     * Send email alert for critical errors
     * 
     * @param string $message
     * @param array $context
     */
    private function _send_alert_email($message, $context) {
        try {
            $this->CI->load->library('email');
            
            $subject = 'Critical Error Alert - Aadamya POS';
            $body = "An critical error has occurred in the Aadamya POS system:\n\n";
            $body .= "Message: $message\n\n";
            $body .= "Time: " . date('Y-m-d H:i:s') . "\n";
            $body .= "Server: " . $_SERVER['SERVER_NAME'] . "\n";
            $body .= "Context: " . json_encode($context, JSON_PRETTY_PRINT) . "\n";

            $this->CI->email->from('noreply@aadamya.com');
            $this->CI->email->to($this->error_email);
            $this->CI->email->subject($subject);
            $this->CI->email->message($body);
            $this->CI->email->send();
        } catch (Exception $e) {
            // Silently fail for email alerts
        }
    }

    /**
     * Get recent errors
     * 
     * @param int $limit Number of errors to retrieve
     * @return array
     */
    public function get_recent_errors($limit = 50) {
        if (!file_exists($this->log_file)) {
            return array();
        }

        $lines = file($this->log_file, FILE_IGNORE_NEW_LINES);
        $errors = array();
        $current_error = '';

        foreach (array_reverse($lines) as $line) {
            if (strpos($line, '[ERROR]') !== false || strpos($line, '[CRITICAL]') !== false) {
                $current_error = $line . "\n" . $current_error;
                
                if (count($errors) < $limit && strpos($line, '---') !== false) {
                    $errors[] = trim($current_error);
                    $current_error = '';
                }
            } else {
                $current_error = $line . "\n" . $current_error;
            }
        }

        return array_reverse($errors);
    }

    /**
     * Clear old log files
     * 
     * @param int $days Keep logs for this many days
     */
    public function clear_old_logs($days = 30) {
        $log_dir = APPPATH . 'logs/';
        $cutoff_time = time() - ($days * 24 * 60 * 60);

        if (is_dir($log_dir)) {
            foreach (glob($log_dir . '*.log') as $file) {
                if (filemtime($file) < $cutoff_time) {
                    unlink($file);
                }
            }
        }
    }

    /**
     * Get log statistics
     * 
     * @return array
     */
    public function get_log_statistics() {
        if (!file_exists($this->log_file)) {
            return array(
                'total_errors' => 0,
                'critical' => 0,
                'error' => 0,
                'warning' => 0,
                'info' => 0
            );
        }

        $lines = file($this->log_file);
        $stats = array(
            'total_errors' => 0,
            'critical' => 0,
            'error' => 0,
            'warning' => 0,
            'info' => 0
        );

        foreach ($lines as $line) {
            if (strpos($line, '[CRITICAL]') !== false) {
                $stats['critical']++;
            } elseif (strpos($line, '[ERROR]') !== false) {
                $stats['error']++;
            } elseif (strpos($line, '[WARNING]') !== false) {
                $stats['warning']++;
            } elseif (strpos($line, '[INFO]') !== false) {
                $stats['info']++;
            }
        }

        $stats['total_errors'] = $stats['critical'] + $stats['error'] + $stats['warning'];

        return $stats;
    }
}

/**
 * Aadamya POS - API Response Formatter
 * 
 * Provides consistent API response formatting
 */
class API_Response {

    /**
     * Format success response
     * 
     * @param string $message Success message
     * @param mixed $data Response data
     * @param int $status_code HTTP status code
     * @return array
     */
    public static function success($message = 'Success', $data = null, $status_code = 200) {
        http_response_code($status_code);
        header('Content-Type: application/json');

        return array(
            'status' => 'success',
            'code' => $status_code,
            'message' => $message,
            'data' => $data,
            'timestamp' => date('Y-m-d H:i:s')
        );
    }

    /**
     * Format error response
     * 
     * @param string $message Error message
     * @param array $errors Detailed errors
     * @param int $status_code HTTP status code
     * @return array
     */
    public static function error($message = 'Error', $errors = array(), $status_code = 400) {
        http_response_code($status_code);
        header('Content-Type: application/json');

        return array(
            'status' => 'error',
            'code' => $status_code,
            'message' => $message,
            'errors' => $errors,
            'timestamp' => date('Y-m-d H:i:s')
        );
    }

    /**
     * Format paginated response
     * 
     * @param array $data Data array
     * @param int $total Total items
     * @param int $per_page Items per page
     * @param int $current_page Current page
     * @param string $message Response message
     * @return array
     */
    public static function paginated($data, $total, $per_page, $current_page, $message = 'Success') {
        $last_page = ceil($total / $per_page);

        return self::success($message, array(
            'items' => $data,
            'pagination' => array(
                'total' => $total,
                'per_page' => $per_page,
                'current_page' => $current_page,
                'last_page' => $last_page,
                'from' => (($current_page - 1) * $per_page) + 1,
                'to' => min($current_page * $per_page, $total)
            )
        ));
    }

    /**
     * Format validation error response
     * 
     * @param array $validation_errors
     * @return array
     */
    public static function validation_error($validation_errors) {
        return self::error('Validation failed', $validation_errors, 422);
    }

    /**
     * Format unauthorized response
     * 
     * @return array
     */
    public static function unauthorized() {
        return self::error('Unauthorized access', array(), 401);
    }

    /**
     * Format forbidden response
     * 
     * @return array
     */
    public static function forbidden() {
        return self::error('Access forbidden', array(), 403);
    }

    /**
     * Format not found response
     * 
     * @return array
     */
    public static function not_found() {
        return self::error('Resource not found', array(), 404);
    }

    /**
     * Format server error response
     * 
     * @return array
     */
    public static function server_error() {
        return self::error('Internal server error', array(), 500);
    }
}
