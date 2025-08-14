<?php 

defined('BASEPATH') OR exit ('no direct script access allowed');


/**
 * 
 */
class AdminController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	// Register Seller

	public function viewProfile()
	{
		$this->load->view('admin_module/profile');
	}
	public function adminDetails($id)
	{
		$this->load->model('AdminModel');
		$data['register_seller'] = $this->AdminModel->profileDetails($id);
		$this->load->view('admin_module/profile', $data);
	}
	public function adminRegisteration()
	{
		$this->load->view('admin_module/register');
	}
	public function registerAdmin()
	{
		$this->load->model('AdminModel');
		$this->AdminModel->adminRegister();
	}

	// Signin Admin

	public function adminSignin()
	{
		$this->load->view('admin_module/signin');
	}
	public function signinAdmin()
	{
		$this->load->model('AdminModel');
		$this->AdminModel->adminLogin();
	}

	public function updatePass()
	{
		$this->load->view('admin_module/update_pass');
	}
	public function passwordUpdate()
{
    $this->load->model('AdminModel');
    $this->AdminModel->UpdatePassword();
}

	public function googleLogin()
	{
		$this->load->view('admin_module/login_view');
	}

	public function verifyOTP()
	{
		$this->load->view('admin_module/otp_verification');
	}
	public function adminOTPVerify()
	{
		$this->load->model('AdminModel');
		$this->AdminModel->OTPVerification();
	}

	public function adminLogout()
	{
		$this->load->model('AdminModel');
		$this->AdminModel->AdminLogout();
	}

	// Google api

	// Signin User

	public function loginUser()
	{
		$this->load->view('admin_module/user_signin');
	}
	public function userLogin()
	{
		$this->load->model('AdminModel');
		$this->AdminModel->userSignin();
	}

	public function userRegisteration()
	{
		$this->load->view('admin_module/register_user');
	}
	public function registerUser()
	{
		$this->load->model('AdminModel');
		$this->AdminModel->userRegister();
	}

	// public function googleLogin()
	// {
	// 	$this->load->view('admin_module/login_view');
	// }

	// public function verifyOTP()
	// {
	// 	$this->load->view('admin_module/otp_verification');
	// }
	// public function adminOTPVerify()
	// {
	// 	$this->load->model('AdminModel');
	// 	$this->AdminModel->OTPVerification();
	// }

	// public function adminLogout()
	// {
	// 	$this->load->model('AdminModel');
	// 	$this->AdminModel->AdminLogout();
	// }

// dashboard
	public function adminHeader()
	{
		$this->load->view('master_pages/header');
	}
	public function posHeader()
	{
		$this->load->view('master_pages/pos_header');
	}

	public function adminSidebar()
	{
		$this->load->view('master_pages/sidebar');
	}

	public function adminFooter()
	{
		$this->load->view('master_pages/footer');
	}

	public function adminDashboard()
	{
		$this->load->view('admin_module/dashboard');
	}

	public function salesDashboard()
	{
		$this->load->view('admin_module/sales_dashboard');
	}

	public function lowStocks()
	{
		$this->load->view('admin_module/low-stocks');
	}


}


?>