<!DOCTYPE html>
<html lang="en">
    <head>

		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Dreams POS is a powerful Bootstrap based Inventory Management Admin Template designed for businesses, offering seamless invoicing, project tracking, and estimates.">
		<meta name="keywords" content="inventory management, admin dashboard, bootstrap template, invoicing, estimates, business management, responsive admin, POS system">
		<meta name="author" content="Dreams Technologies">
		<meta name="robots" content="index, follow">
		<title>Dreams POS - Inventory Management & Admin Dashboard Template</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>modules/assets/img/favicon.png">

		<!-- Apple Touch Icon -->
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>modules/assets/img/apple-touch-icon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/css/bootstrap.min.css">
		
        <!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/plugins/fontawesome/css/all.min.css">

         <!-- Tabler Icon CSS -->
	    <link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/plugins/tabler-icons/tabler-icons.css">
		

	    <!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/css/style.css">

        <style type="text/css">
            input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button { 
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                margin: 0; 
            }
        </style>
		
    </head>
    <body class="account-page">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<div class="row login-wrapper m-0">
                    <div class="col-lg-6 p-0">
                        <div class="login-content">
                            <form action="<?php echo base_url('userRegister') ?>" method="POST">
                                <div class="login-userset">
                                    <div class="login-logo logo-normal">
                                    <img src="<?php echo base_url(); ?>modules/assets/img/logo.svg" alt="img">
                                </div>
                                <a href="index.html" class="login-logo logo-white">
                                    <img src="<?php echo base_url(); ?>modules/assets/img/logo-white.svg"  alt="Img">
                                </a>
                                <div class="login-userheading">
                                    <h3>Register User</h3>
                                    <h4>Create New Dreamspos User Account</h4>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Contact Number<span class="text-danger"> *</span></label>
                                    <div class="input-group">
                                        <input type="number" name="user_contact" id="user_contact" class="form-control border-end-0"  onkeypress="if(this.value.length === 10)return false;" >
                                        <span class="input-group-text border-start-0">
                                            <i class="ti ti-device-mobile"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password <span class="text-danger"> *</span></label>
                                    <div class="pass-group">
                                        <input type="password" name="user_password" class="pass-input form-control">
                                        <span class="ti toggle-password ti-eye-off text-gray-9"></span>
                                    </div>
                                </div>
                                <div class="form-login authentication-check">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="custom-control custom-checkbox justify-content-start">
                                                <div class="custom-control custom-checkbox">
                                                    <label class="checkboxs ps-4 mb-0 pb-0 line-height-1">
                                                        <input type="checkbox">
                                                        <span class="checkmarks"></span>I agree to the <a href="register-2.html#" class="text-primary">Terms & Privacy</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-login">
                                    <button type="submit" name="registerUser" class="btn btn-login">Sign Up</button>
                                </div>
                                <div class="signinform">
                                    <h4>Already have an account ? <a href="<?php echo base_url('userSignin'); ?>" class="hover-a">Sign In Instead</a></h4>
                                </div>
                                <!-- <div class="form-setlogin or-text">
                                    <h4>OR</h4>
                                </div>
                                <div class="mt-2">
                                    <div class="d-flex align-items-center justify-content-center flex-wrap">
                                        <div class="text-center me-2 flex-fill">
                                            <a href="javascript:void(0);"
                                                class="br-10 p-2 btn btn-info d-flex align-items-center justify-content-center">
                                                <img class="img-fluid m-1" src="<?php echo base_url(); ?>modules/assets/img/icons/facebook-logo.svg" alt="Facebook">
                                            </a>
                                        </div>
                                        <div class="text-center me-2 flex-fill">
                                            <a href="javascript:void(0);"
                                                class="btn btn-white br-10 p-2  border d-flex align-items-center justify-content-center">
                                                <img class="img-fluid m-1" src="<?php echo base_url(); ?>modules/assets/img/icons/google-logo.svg" alt="Facebook">
                                            </a>
                                        </div>
                                        <div class="text-center flex-fill">
                                            <a href="javascript:void(0);"
                                                class="bg-dark br-10 p-2 btn btn-dark d-flex align-items-center justify-content-center">
                                                <img class="img-fluid m-1" src="<?php echo base_url(); ?>modules/assets/img/icons/apple-logo.svg" alt="Apple">
                                            </a>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                                    <p>Copyright &copy; 2025 DreamsPOS</p>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 p-0">
                        <div class="login-img">
                            <img src="<?php echo base_url(); ?>modules/assets/img/authentication/authentication-02.svg" alt="img">
                        </div>
                    </div>
                </div>
			</div>
        </div>
		<!-- /Main Wrapper -->
          

		
		<!-- jQuery -->
        <script src="<?php echo base_url(); ?>modules/assets/js/jquery-3.7.1.min.js" type="cd99592f6c5891e2ae1c9b9b-text/javascript"></script>

         <!-- Feather Icon JS -->
		<script src="<?php echo base_url(); ?>modules/assets/js/feather.min.js" type="cd99592f6c5891e2ae1c9b9b-text/javascript"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="<?php echo base_url(); ?>modules/assets/js/bootstrap.bundle.min.js" type="cd99592f6c5891e2ae1c9b9b-text/javascript"></script>
		
		<!-- Custom JS -->
<script src="<?php echo base_url(); ?>modules/assets/js/script.js" type="cd99592f6c5891e2ae1c9b9b-text/javascript"></script>

	
    <script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="cd99592f6c5891e2ae1c9b9b-|49" defer></script></body>
</html>