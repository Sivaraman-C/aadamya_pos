# Aadamya POS - Code Organization & Standards

## Project Structure

```
aadamya_pos/
├── application/
│   ├── config/              # Configuration files
│   │   ├── autoload.php
│   │   ├── config.php
│   │   ├── database.php
│   │   ├── routes.php
│   │   └── ...
│   │
│   ├── controllers/         # Application Controllers
│   │   ├── Base_Controller.php      # Base class with common functionality
│   │   ├── AdminController.php      # Admin/Seller management
│   │   ├── PosController.php        # Point of Sale functionality
│   │   ├── InventoryController.php  # Inventory management
│   │   ├── ReportController.php     # Reporting
│   │   ├── StockController.php      # Stock management
│   │   └── Welcome.php              # Welcome page
│   │
│   ├── models/              # Database Models
│   │   ├── AdminModel.php           # User/Admin operations
│   │   ├── PosModel.php             # POS/Sales operations
│   │   ├── CustomerModel.php        # Customer management
│   │   ├── InventoryModel.php       # Inventory operations
│   │   ├── ProductModel.php         # Product operations
│   │   ├── OrderModel.php           # Order operations
│   │   ├── ReportModel.php          # Report queries
│   │   ├── SalesModel.php           # Sales tracking
│   │   ├── StockModel.php           # Stock operations
│   │   └── AuditModel.php           # Activity logging
│   │
│   ├── views/               # View Templates
│   │   ├── admin_module/            # Admin pages
│   │   │   ├── dashboard.php        # Admin dashboard
│   │   │   ├── inventory.php        # Inventory management
│   │   │   ├── pos.php              # POS interface
│   │   │   ├── reports.php          # Reports
│   │   │   └── ...
│   │   ├── errors/                  # Error pages
│   │   ├── master_pages/            # Layout templates
│   │   ├── sellercontent/           # Seller pages
│   │   ├── login.php                # Login page
│   │   └── ...
│   │
│   ├── helpers/             # Helper Functions
│   │   ├── Security_Validation_Helper.php   # Input validation & security
│   │   └── ...
│   │
│   ├── libraries/           # Custom Libraries
│   │   ├── Database_Migration_Utility.php   # Database migrations
│   │   └── ...
│   │
│   ├── migrations/          # Database Migrations
│   │   ├── 001_initial_schema.php
│   │   └── ...
│   │
│   ├── logs/                # Application Logs
│   │   └── .gitkeep
│   │
│   └── cache/               # Cache Files
│       └── .gitkeep
│
├── system/                  # CodeIgniter Core
│
├── modules/                 # Frontend Modules
│   ├── assets/              # CSS, JS, Images
│   │   ├── css/
│   │   ├── js/
│   │   └── img/
│   ├── dreampos/            # DreamPOS Module
│   └── pos_landingpage/     # Landing page
│
├── vendor/                  # Composer Dependencies
│
├── scripts/                 # Utility Scripts
│   ├── backup_database.sh           # Backup script
│   ├── restore_database.sh          # Restore script
│   └── ...
│
├── .env.example             # Environment template
├── .gitignore               # Git ignore rules
├── README.md                # Main documentation
├── API_DOCUMENTATION.md     # API reference
├── INSTALLATION_DEPLOYMENT_GUIDE.md  # Setup guide
├── CODE_ORGANIZATION.md     # This file
├── composer.json            # PHP dependencies
├── composer.lock            # Locked dependencies
├── aadamya_pos.sql         # Initial database
├── database_schema_enhanced.sql  # Enhanced schema
└── index.php               # Entry point
```

---

## Naming Conventions

### Controllers
- **Naming:** PascalCase + "Controller" suffix
- **Example:** `AdminController.php`, `PosController.php`
- **File:** `application/controllers/ControllerName.php`
- **Class:** `class ControllerName extends Base_Controller {}`

### Models
- **Naming:** PascalCase + "Model" suffix
- **Example:** `AdminModel.php`, `PosModel.php`
- **File:** `application/models/ModelName.php`
- **Class:** `class ModelName extends CI_Model {}`

### Views
- **Naming:** lowercase with underscores
- **Example:** `admin_dashboard.php`, `pos_interface.php`
- **File:** `application/views/module/view_name.php`

### Helpers
- **Naming:** PascalCase + suffix
- **Example:** `Security_Validation_Helper.php`
- **File:** `application/helpers/Helper_Name.php`

### Libraries
- **Naming:** PascalCase
- **Example:** `Database_Migration_Utility.php`
- **File:** `application/libraries/Library_Name.php`

### Functions
- **Naming:** lowercase with underscores
- **Example:** `get_user_by_id()`, `validate_email()`

### Variables
- **Naming:** lowercase with underscores
- **Example:** `$user_id`, `$total_sales`

### Constants
- **Naming:** UPPERCASE with underscores
- **Example:** `define('MAX_UPLOAD_SIZE', 5242880);`

---

## Coding Standards

### PHP Code Style

```php
<?php
// Always use <?php not <? for better compatibility
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Documentation
 * 
 * Describe the purpose and usage
 * 
 * @package    Aadamya_POS
 * @category   Controllers
 * @version    1.0.0
 */
class MyController extends Base_Controller {

    /**
     * Method Documentation
     * 
     * @param  string $param Description
     * @return boolean
     */
    public function my_method($param) {
        // Code here
        return true;
    }

    /**
     * Private method using underscore prefix
     */
    private function _private_helper() {
        // Code here
    }
}
```

### Indentation & Whitespace
- **Tabs:** Use 4 spaces (not tabs)
- **Line Length:** Maximum 120 characters
- **Line Breaks:** After control structures
- **Blank Lines:** Separate methods with one blank line

### Arrays
```php
// Prefer array() syntax for compatibility
$array = array(
    'key1' => 'value1',
    'key2' => 'value2'
);

// Access
$value = $array['key1'];
```

### Strings
```php
// Use single quotes for simple strings
$string = 'Simple string';

// Use double quotes or concatenation for variables
$greeting = "Hello " . $name;
$greeting = "Hello $name";  // Variable interpolation
```

### Conditions
```php
// Always use braces
if ($condition) {
    // Code
} elseif ($another) {
    // Code
} else {
    // Code
}

// Use === and !==
if ($value === true) {
    // Code
}
```

### Functions/Methods
```php
// Always use visibility modifiers
public function public_method() {}
protected function protected_method() {}
private function private_method() {}

// Use type hints
public function process_data($id, $data) {}
```

---

## Database Standards

### Table Naming
- **Singular nouns:** `product` not `products`
- **Lowercase:** `user_account` not `UserAccount`
- **Underscores:** For multi-word names

### Column Naming
- **Lowercase:** `user_id` not `UserId`
- **Underscores:** For multi-word columns
- **Prefix Foreign Keys:** `user_id` references `user.id`

### Common Columns
- **Primary Key:** `id INT AUTO_INCREMENT PRIMARY KEY`
- **Timestamps:** `created_at`, `updated_at`
- **Status:** `status VARCHAR(50) DEFAULT 'active'`
- **Soft Delete:** `deleted_at TIMESTAMP NULL`

### Indexes
- **Primary Key:** Automatic
- **Foreign Keys:** Always index
- **Frequently Queried:** Index for performance
- **Unique Values:** Use UNIQUE constraint

---

## Controller Standards

### Base Controller Extension
All controllers should extend `Base_Controller`:

```php
class MyController extends Base_Controller {
    
    public function __construct() {
        parent::__construct();
        // Additional initialization
    }
    
    public function index() {
        $this->require_auth();  // Check authentication
        $this->require_role('admin');  // Check specific role
        
        // Get and validate input
        $data = $this->get_json_input();
        
        // Process and respond
        $this->send_success('Success message', $result);
    }
}
```

### Method Organization
```php
class MyController extends Base_Controller {
    // 1. Private variables
    private $some_var;
    
    // 2. Constructor
    public function __construct() {}
    
    // 3. Public methods
    public function index() {}
    
    // 4. Protected methods
    protected function process_data() {}
    
    // 5. Private methods (prefix with underscore)
    private function _helper_method() {}
}
```

---

## Model Standards

### Query Standards
```php
class MyModel extends CI_Model {
    
    /**
     * Always use parameterized queries to prevent SQL injection
     */
    public function get_user($id) {
        return $this->db
            ->where('id', $id)
            ->where('status', 'active')
            ->get('user')
            ->row();
    }
    
    /**
     * Use transactions for multi-step operations
     */
    public function create_order($data) {
        $this->db->trans_start();
        
        $this->db->insert('orders', $order_data);
        $order_id = $this->db->insert_id();
        
        foreach ($items as $item) {
            $item['order_id'] = $order_id;
            $this->db->insert('order_items', $item);
        }
        
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
}
```

---

## Validation Standards

### Input Validation
```php
// Always validate and sanitize input
$name = $this->input->post('name');
$name = trim($name);  // Remove whitespace

// Use security helper
if (!$this->validate_string($name, ['min_length' => 2, 'max_length' => 255])) {
    return $this->send_error('Invalid name');
}

// For numeric values
if (!$this->validate_numeric($amount, ['min' => 0, 'max' => 999999.99])) {
    return $this->send_error('Invalid amount');
}

// For emails
if (!$this->validate_email($email)) {
    return $this->send_error('Invalid email');
}
```

---

## Error Handling

### Exception Handling
```php
try {
    // Code that might throw exception
    $this->process_payment($data);
} catch (Exception $e) {
    $this->log_error('Payment processing failed', $e->getMessage());
    $this->send_error('Payment failed', array(), 500);
}
```

### Response Format
```php
// Success
$this->send_success('Operation successful', $data, 200);

// Error
$this->send_error('Operation failed', array('field' => 'error message'), 400);

// Log error
$this->log_error('Critical error occurred', $context_array);
```

---

## Security Standards

### Prevent SQL Injection
```php
// ✅ CORRECT - Use parameterized queries
$this->db->where('id', $id)->get('users');

// ❌ WRONG - Never concatenate user input
$this->db->query("SELECT * FROM users WHERE id = " . $id);
```

### Prevent XSS
```php
// ✅ CORRECT - Escape output
<?php echo htmlspecialchars($user_input, ENT_QUOTES, 'UTF-8'); ?>

// ❌ WRONG - Never output user input directly
<?php echo $user_input; ?>
```

### CSRF Protection
```php
// Automatic with CI security library
// Always include token in forms
<form>
    <?php echo form_hidden($csrf_token, $csrf_value); ?>
</form>
```

### Password Security
```php
// ✅ Hash passwords
$hashed = password_hash($password, PASSWORD_BCRYPT);

// Verify password
if (password_verify($input, $hashed)) {
    // Password correct
}
```

---

## Documentation Standards

### Function Documentation
```php
/**
 * Process customer order
 * 
 * @param array $order_data {
 *     @type int $customer_id Customer identifier
 *     @type array $items Order items
 *     @type float $total Total amount
 * }
 * @param boolean $process_payment Whether to process payment
 * 
 * @return array {
 *     @type boolean $success Operation success status
 *     @type string $message Result message
 *     @type int $order_id Created order ID
 * }
 * 
 * @throws Exception If payment processing fails
 */
public function process_order($order_data, $process_payment = true) {
    // Implementation
}
```

### Inline Comments
```php
// Use comments to explain WHY, not WHAT
// ✅ CORRECT
$price *= 0.9;  // Apply 10% loyalty discount

// ❌ WRONG - Comment states obvious
$price *= 0.9;  // Multiply price by 0.9

// Use specific comment style
/* Single line comment */
// Single line comment

/**
 * Block/multi-line comment
 * used for documentation
 */
```

---

## Testing Standards

### Manual Testing Checklist
- [ ] Form validation works
- [ ] Error messages display correctly
- [ ] Database operations succeed
- [ ] User permissions enforced
- [ ] CSRF protection active
- [ ] Input validation prevents attacks
- [ ] Performance acceptable

### Common Test Cases
```
Login
- Correct credentials
- Incorrect password
- Non-existent user
- Locked account

Orders
- Create order
- Add items
- Apply discount
- Process payment
- Generate invoice

Inventory
- Add product
- Update quantity
- Low stock alert
- Product deletion
```

---

## Version Control Standards

### Commit Messages
```
Format: [TYPE] Brief description

Types:
- feat: New feature
- fix: Bug fix
- refactor: Code restructuring
- docs: Documentation
- test: Tests
- chore: Dependencies, build

Example:
feat: Add inventory low stock alert
fix: Correct tax calculation in orders
docs: Update API documentation
```

### Branch Naming
```
feature/feature-name
bugfix/bug-description
hotfix/critical-issue
release/version-number
docs/documentation-topic
```

---

## Performance Guidelines

### Database Optimization
- Use indexes on frequently queried columns
- Avoid SELECT * - specify required columns
- Use JOIN instead of multiple queries
- Use LIMIT for large result sets
- Monitor slow queries

### Code Optimization
- Cache database queries when appropriate
- Minimize file I/O operations
- Use pagination for large datasets
- Optimize loops and conditionals
- Profile code for bottlenecks

### API Optimization
- Response should be < 1MB
- Use pagination for listings
- Implement caching headers
- Compress responses
- Minimize database calls

---

## Deployment Best Practices

### Pre-deployment
- [ ] All tests passing
- [ ] Code reviewed
- [ ] Database backups taken
- [ ] Dependencies updated
- [ ] Security audit complete

### Post-deployment
- [ ] Monitor application logs
- [ ] Check error rates
- [ ] Verify database integrity
- [ ] Test key features
- [ ] Monitor performance metrics

---

## References

- [CodeIgniter Documentation](https://codeigniter.com/userguide3/)
- [PHP Standards](https://www.php-fig.org/)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [Security Best Practices](https://owasp.org/)

---

**Last Updated:** September 1, 2025
