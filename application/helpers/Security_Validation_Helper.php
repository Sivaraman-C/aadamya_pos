<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aadamya POS - Security & Validation Helper
 * 
 * Provides methods for:
 * - Input validation
 * - Data sanitization
 * - Security checks
 * - Error handling
 * 
 * @package    Aadamya_POS
 * @category   Helpers
 * @author     Aadamya Development Team
 * @version    1.0.0
 */

class Security_Validation_Helper {

    private $CI;
    private $errors = array();

    public function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->library('form_validation');
    }

    /**
     * Validate and sanitize string input
     * 
     * @param string $input
     * @param array $rules (min_length, max_length, pattern, etc.)
     * @return array|boolean
     */
    public function validate_string($input, $rules = array()) {
        $input = trim($input);
        
        if (empty($input)) {
            return false;
        }

        // Check minimum length
        if (isset($rules['min_length']) && strlen($input) < $rules['min_length']) {
            $this->errors[] = "String must be at least {$rules['min_length']} characters.";
            return false;
        }

        // Check maximum length
        if (isset($rules['max_length']) && strlen($input) > $rules['max_length']) {
            $this->errors[] = "String must not exceed {$rules['max_length']} characters.";
            return false;
        }

        // Validate pattern (regex)
        if (isset($rules['pattern']) && !preg_match($rules['pattern'], $input)) {
            $this->errors[] = "String does not match required format.";
            return false;
        }

        // Additional check for alphanumeric
        if (isset($rules['alphanumeric']) && $rules['alphanumeric']) {
            if (!preg_match('/^[a-zA-Z0-9_\s\-]+$/', $input)) {
                $this->errors[] = "String contains invalid characters.";
                return false;
            }
        }

        return true;
    }

    /**
     * Validate email address
     * 
     * @param string $email
     * @return boolean
     */
    public function validate_email($email) {
        $email = trim(strtolower($email));
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Invalid email address format.";
            return false;
        }

        // Check email length
        if (strlen($email) > 254) {
            $this->errors[] = "Email address is too long.";
            return false;
        }

        return true;
    }

    /**
     * Validate phone number
     * 
     * @param string $phone
     * @return boolean
     */
    public function validate_phone($phone) {
        $phone = preg_replace('/[^\d\+\-\s\(\)]/', '', $phone);
        
        if (empty($phone)) {
            $this->errors[] = "Phone number is required.";
            return false;
        }

        // Must have at least 7 digits
        if (strlen(preg_replace('/[^\d]/', '', $phone)) < 7) {
            $this->errors[] = "Phone number must have at least 7 digits.";
            return false;
        }

        // Should not exceed 20 characters
        if (strlen($phone) > 20) {
            $this->errors[] = "Phone number is too long.";
            return false;
        }

        return true;
    }

    /**
     * Validate numeric input
     * 
     * @param mixed $value
     * @param array $rules (min, max, decimal_places)
     * @return boolean
     */
    public function validate_numeric($value, $rules = array()) {
        if (!is_numeric($value)) {
            $this->errors[] = "Value must be numeric.";
            return false;
        }

        $value = (float) $value;

        // Check minimum value
        if (isset($rules['min']) && $value < $rules['min']) {
            $this->errors[] = "Value must be at least {$rules['min']}.";
            return false;
        }

        // Check maximum value
        if (isset($rules['max']) && $value > $rules['max']) {
            $this->errors[] = "Value must not exceed {$rules['max']}.";
            return false;
        }

        // Check decimal places
        if (isset($rules['decimal_places'])) {
            $decimals = strlen(substr(strrchr($value, "."), 1));
            if ($decimals > $rules['decimal_places']) {
                $this->errors[] = "Too many decimal places.";
                return false;
            }
        }

        return true;
    }

    /**
     * Validate integer input
     * 
     * @param mixed $value
     * @param array $rules
     * @return boolean
     */
    public function validate_integer($value, $rules = array()) {
        if (!is_numeric($value) || $value != (int)$value) {
            $this->errors[] = "Value must be an integer.";
            return false;
        }

        return $this->validate_numeric($value, $rules);
    }

    /**
     * Validate password strength
     * 
     * @param string $password
     * @param int $min_length (default: 8)
     * @return boolean
     */
    public function validate_password($password, $min_length = 8) {
        if (strlen($password) < $min_length) {
            $this->errors[] = "Password must be at least {$min_length} characters.";
            return false;
        }

        // Check for uppercase letter
        if (!preg_match('/[A-Z]/', $password)) {
            $this->errors[] = "Password must contain at least one uppercase letter.";
            return false;
        }

        // Check for lowercase letter
        if (!preg_match('/[a-z]/', $password)) {
            $this->errors[] = "Password must contain at least one lowercase letter.";
            return false;
        }

        // Check for number
        if (!preg_match('/[0-9]/', $password)) {
            $this->errors[] = "Password must contain at least one number.";
            return false;
        }

        // Check for special character
        if (!preg_match('/[!@#$%^&*()_+\-=\[\]{};:\'",.<>?\/]/', $password)) {
            $this->errors[] = "Password must contain at least one special character.";
            return false;
        }

        return true;
    }

    /**
     * Validate URL
     * 
     * @param string $url
     * @return boolean
     */
    public function validate_url($url) {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $this->errors[] = "Invalid URL format.";
            return false;
        }

        return true;
    }

    /**
     * Validate date
     * 
     * @param string $date (format: YYYY-MM-DD)
     * @return boolean
     */
    public function validate_date($date, $format = 'Y-m-d') {
        $d = \DateTime::createFromFormat($format, $date);
        if (!$d || $d->format($format) !== $date) {
            $this->errors[] = "Invalid date format. Use {$format}";
            return false;
        }

        return true;
    }

    /**
     * Sanitize string input
     * 
     * @param string $input
     * @return string
     */
    public function sanitize_string($input) {
        $input = trim($input);
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        $input = strip_tags($input);
        return $input;
    }

    /**
     * Sanitize array
     * 
     * @param array $data
     * @return array
     */
    public function sanitize_array(&$data) {
        foreach ($data as &$value) {
            if (is_array($value)) {
                $this->sanitize_array($value);
            } elseif (is_string($value)) {
                $value = $this->sanitize_string($value);
            }
        }
        return $data;
    }

    /**
     * Escape SQL string (additional to parameterized queries)
     * 
     * @param string $string
     * @return string
     */
    public function escape_sql($string) {
        return $this->CI->db->escape($string);
    }

    /**
     * Check if user is authenticated
     * 
     * @return boolean
     */
    public function is_authenticated() {
        if (!$this->CI->session->userdata('user_id')) {
            $this->errors[] = "Unauthorized access. Please login first.";
            return false;
        }

        return true;
    }

    /**
     * Check if user has permission
     * 
     * @param string $permission
     * @return boolean
     */
    public function has_permission($permission) {
        $user_role = $this->CI->session->userdata('user_role');
        
        if (!$user_role) {
            $this->errors[] = "User role not found.";
            return false;
        }

        // Simple role-based permission check
        $allowed_roles = array('admin', 'manager', 'seller');
        
        if (!in_array($user_role, $allowed_roles)) {
            $this->errors[] = "User does not have permission to perform this action.";
            return false;
        }

        return true;
    }

    /**
     * Check CSRF token
     * 
     * @return boolean
     */
    public function check_csrf_token() {
        if (!$this->CI->security->get_csrf_token_name()) {
            $this->errors[] = "CSRF protection is not enabled.";
            return false;
        }

        return true;
    }

    /**
     * Validate file upload
     * 
     * @param array $file
     * @param array $rules (max_size, allowed_types, etc.)
     * @return boolean
     */
    public function validate_file_upload($file, $rules = array()) {
        // Check if file was uploaded
        if (!isset($file['tmp_name']) || empty($file['tmp_name'])) {
            $this->errors[] = "No file was uploaded.";
            return false;
        }

        // Check file size
        if (isset($rules['max_size'])) {
            if ($file['size'] > $rules['max_size']) {
                $this->errors[] = "File size exceeds maximum allowed size.";
                return false;
            }
        }

        // Check file type
        if (isset($rules['allowed_types'])) {
            $allowed = explode(',', $rules['allowed_types']);
            $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            
            if (!in_array($file_ext, $allowed)) {
                $this->errors[] = "File type is not allowed.";
                return false;
            }
        }

        // Check MIME type
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (isset($rules['allowed_mimes'])) {
            $allowed_mimes = explode(',', $rules['allowed_mimes']);
            if (!in_array($mime, $allowed_mimes)) {
                $this->errors[] = "File MIME type is not allowed.";
                return false;
            }
        }

        return true;
    }

    /**
     * Generate safe filename
     * 
     * @param string $filename
     * @return string
     */
    public function safe_filename($filename) {
        $filename = basename($filename);
        $filename = preg_replace('/[^a-zA-Z0-9._-]/', '_', $filename);
        $filename = preg_replace('/_+/', '_', $filename);
        return $filename;
    }

    /**
     * Get validation errors
     * 
     * @return array
     */
    public function get_errors() {
        return $this->errors;
    }

    /**
     * Clear errors
     * 
     * @return void
     */
    public function clear_errors() {
        $this->errors = array();
    }

    /**
     * Validate order data
     * 
     * @param array $order_data
     * @return boolean
     */
    public function validate_order_data($order_data) {
        $this->clear_errors();

        // Validate customer ID
        if (!isset($order_data['customer_id']) || !$this->validate_integer($order_data['customer_id'])) {
            $this->errors[] = "Invalid customer ID.";
            return false;
        }

        // Validate amounts
        if (!isset($order_data['subtotal']) || !$this->validate_numeric($order_data['subtotal'], ['min' => 0])) {
            $this->errors[] = "Invalid subtotal amount.";
            return false;
        }

        if (!isset($order_data['grand_total']) || !$this->validate_numeric($order_data['grand_total'], ['min' => 0])) {
            $this->errors[] = "Invalid grand total amount.";
            return false;
        }

        // Grand total should be >= subtotal
        if ($order_data['grand_total'] < $order_data['subtotal']) {
            $this->errors[] = "Grand total cannot be less than subtotal.";
            return false;
        }

        return true;
    }

    /**
     * Validate customer data
     * 
     * @param array $customer_data
     * @return boolean
     */
    public function validate_customer_data($customer_data) {
        $this->clear_errors();

        // Validate name
        if (!isset($customer_data['name']) || !$this->validate_string($customer_data['name'], ['min_length' => 2, 'max_length' => 255])) {
            $this->errors[] = "Customer name is required and must be 2-255 characters.";
            return false;
        }

        // Validate contact
        if (!isset($customer_data['contact']) || !$this->validate_phone($customer_data['contact'])) {
            $this->errors[] = "Valid phone number is required.";
            return false;
        }

        // Validate email if provided
        if (isset($customer_data['email']) && !empty($customer_data['email'])) {
            if (!$this->validate_email($customer_data['email'])) {
                return false;
            }
        }

        return true;
    }

    /**
     * Validate product data
     * 
     * @param array $product_data
     * @return boolean
     */
    public function validate_product_data($product_data) {
        $this->clear_errors();

        // Validate product name
        if (!isset($product_data['product_name']) || !$this->validate_string($product_data['product_name'], ['min_length' => 2, 'max_length' => 255])) {
            $this->errors[] = "Product name is required and must be 2-255 characters.";
            return false;
        }

        // Validate category
        if (!isset($product_data['category']) || empty($product_data['category'])) {
            $this->errors[] = "Product category is required.";
            return false;
        }

        // Validate quantity
        if (!isset($product_data['quantity']) || !$this->validate_integer($product_data['quantity'], ['min' => 0])) {
            $this->errors[] = "Quantity must be a non-negative integer.";
            return false;
        }

        // Validate price
        if (!isset($product_data['unit_price']) || !$this->validate_numeric($product_data['unit_price'], ['min' => 0])) {
            $this->errors[] = "Unit price must be a valid number.";
            return false;
        }

        return true;
    }

    /**
     * Prevent SQL Injection by using parameterized queries
     * This is a reminder - always use $this->db->insert/update with arrays
     * 
     * @param string $input
     * @return string
     */
    public function prevent_sql_injection($input) {
        return $this->CI->db->escape($input);
    }

    /**
     * Prevent XSS attacks
     * 
     * @param string $input
     * @return string
     */
    public function prevent_xss($input) {
        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }
}

// Load helper as library in controller
// $this->load->helper('security_validation');
