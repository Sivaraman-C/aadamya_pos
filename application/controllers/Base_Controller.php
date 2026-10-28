<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aadamya POS - Base Controller
 * 
 * Provides common functionality for all controllers:
 * - Authentication checking
 * - Error handling
 * - Response formatting
 * - Logging
 * 
 * @package    Aadamya_POS
 * @category   Controllers
 * @author     Aadamya Development Team
 * @version    1.0.0
 */

class Base_Controller extends CI_Controller {

    protected $user_id;
    protected $user_role;
    protected $is_authenticated;

    public function __construct() {
        parent::__construct();
        
        // Load common libraries and helpers
        $this->load->helper(['url', 'form', 'security', 'date']);
        $this->load->library(['session', 'form_validation', 'security']);
        $this->load->helper('Security_Validation_Helper');

        // Check authentication
        $this->check_authentication();
    }

    /**
     * Check if user is authenticated
     */
    protected function check_authentication() {
        $this->user_id = $this->session->userdata('user_id');
        $this->user_role = $this->session->userdata('user_role');
        $this->is_authenticated = !empty($this->user_id);

        // If not authenticated and not on login page, redirect
        if (!$this->is_authenticated) {
            if (!$this->_is_public_route()) {
                $this->session->set_flashdata('error', 'Please log in to continue');
                redirect('signin');
            }
        }
    }

    /**
     * Check if current route is public (doesn't require authentication)
     * 
     * @return boolean
     */
    private function _is_public_route() {
        $controller = $this->router->class;
        $method = $this->router->method;
        
        $public_routes = array(
            'signin', 'signinAdmin', 'userSignin',
            'register', 'registerAdmin', 'userRegister',
            'googleLogin', 'verifyOTP', 'adminOTPVerify',
            'updatePassword', 'uppass'
        );

        return in_array($method, $public_routes);
    }

    /**
     * Check if user has required role
     * 
     * @param mixed $required_roles (string or array)
     * @return boolean
     */
    protected function check_permission($required_roles) {
        if (!$this->is_authenticated) {
            return false;
        }

        if (is_string($required_roles)) {
            $required_roles = array($required_roles);
        }

        return in_array($this->user_role, $required_roles);
    }

    /**
     * Require authentication
     * Redirects to login if not authenticated
     */
    protected function require_auth() {
        if (!$this->is_authenticated) {
            $this->session->set_flashdata('error', 'Authentication required');
            redirect('signin');
        }
    }

    /**
     * Require specific role
     * 
     * @param mixed $required_roles
     */
    protected function require_role($required_roles) {
        $this->require_auth();

        if (!$this->check_permission($required_roles)) {
            $this->show_error('Access Denied', 'You do not have permission to access this resource.', 403);
        }
    }

    /**
     * Send JSON success response
     * 
     * @param string $message
     * @param array $data
     * @param int $status_code
     */
    protected function send_success($message = 'Success', $data = array(), $status_code = 200) {
        header('Content-Type: application/json');
        http_response_code($status_code);

        echo json_encode(array(
            'status' => 'success',
            'code' => $status_code,
            'message' => $message,
            'data' => $data
        ));

        exit;
    }

    /**
     * Send JSON error response
     * 
     * @param string $message
     * @param array $errors
     * @param int $status_code
     */
    protected function send_error($message = 'Error', $errors = array(), $status_code = 400) {
        header('Content-Type: application/json');
        http_response_code($status_code);

        echo json_encode(array(
            'status' => 'error',
            'code' => $status_code,
            'message' => $message,
            'errors' => $errors
        ));

        // Log error
        $this->log_error($message, $errors);

        exit;
    }

    /**
     * Show error page
     * 
     * @param string $title
     * @param string $message
     * @param int $status_code
     */
    protected function show_error($title, $message, $status_code = 400) {
        header('HTTP/1.1 ' . $status_code . ' ' . $title);
        
        $this->load->view('errors/error_page', array(
            'title' => $title,
            'message' => $message,
            'status_code' => $status_code
        ));

        exit;
    }

    /**
     * Log an error
     * 
     * @param string $message
     * @param array $context
     */
    protected function log_error($message, $context = array()) {
        $log_data = array(
            'timestamp' => date('Y-m-d H:i:s'),
            'user_id' => $this->user_id,
            'controller' => $this->router->class,
            'method' => $this->router->method,
            'message' => $message,
            'context' => $context,
            'ip_address' => $this->input->ip_address(),
            'user_agent' => $this->input->user_agent()
        );

        log_message('error', json_encode($log_data));
    }

    /**
     * Log user activity
     * 
     * @param string $action
     * @param string $table_name
     * @param int $record_id
     * @param array $details
     */
    protected function log_activity($action, $table_name = null, $record_id = null, $details = array()) {
        $this->load->model('AuditModel');

        $this->AuditModel->log_activity(array(
            'user_id' => $this->user_id,
            'action' => $action,
            'table_name' => $table_name,
            'record_id' => $record_id,
            'details' => $details,
            'ip_address' => $this->input->ip_address(),
            'user_agent' => $this->input->user_agent()
        ));
    }

    /**
     * Validate CSRF token (for AJAX requests)
     */
    protected function check_ajax_csrf() {
        if ($this->input->is_ajax_request()) {
            if (!$this->security->get_csrf_token_name() || 
                $this->input->post($this->security->get_csrf_token_name()) == '') {
                $this->send_error('CSRF Token validation failed', array(), 403);
            }
        }
    }

    /**
     * Get input with validation
     * 
     * @param string $field
     * @param string $rules
     * @return mixed
     */
    protected function get_validated_input($field, $rules = '') {
        $this->form_validation->set_rules($field, str_replace('_', ' ', $field), $rules);

        if ($this->form_validation->run() == FALSE) {
            return null;
        }

        return $this->input->post($field);
    }

    /**
     * Get JSON input
     * 
     * @return array
     */
    protected function get_json_input() {
        $input = json_decode(file_get_contents('php://input'), true);
        return is_array($input) ? $input : array();
    }

    /**
     * Render view with common data
     * 
     * @param string $view
     * @param array $data
     */
    protected function render_view($view, $data = array()) {
        // Add common data
        $data['is_authenticated'] = $this->is_authenticated;
        $data['user_id'] = $this->user_id;
        $data['user_role'] = $this->user_role;
        $data['csrf_token'] = $this->security->get_csrf_token_name();
        $data['csrf_value'] = $this->security->get_csrf_hash();

        $this->load->view($view, $data);
    }

    /**
     * Paginate query results
     * 
     * @param object $query
     * @param int $per_page
     * @param int $page
     * @return array
     */
    protected function paginate($query, $per_page = 20, $page = 1) {
        if ($page < 1) {
            $page = 1;
        }

        $total = $query->num_rows();
        $last_page = ceil($total / $per_page);
        $offset = ($page - 1) * $per_page;

        return array(
            'data' => $query->limit($per_page, $offset)->result(),
            'pagination' => array(
                'total' => $total,
                'per_page' => $per_page,
                'current_page' => $page,
                'last_page' => $last_page
            )
        );
    }

    /**
     * Redirect with message
     * 
     * @param string $path
     * @param string $message
     * @param string $type (success, error, warning, info)
     */
    protected function redirect_with_message($path, $message, $type = 'success') {
        $this->session->set_flashdata($type, $message);
        redirect($path);
    }

    /**
     * Get user from session
     * 
     * @return object
     */
    protected function get_current_user() {
        if (!$this->is_authenticated) {
            return null;
        }

        $this->load->model('AdminModel');
        return $this->AdminModel->get_user($this->user_id);
    }
}
