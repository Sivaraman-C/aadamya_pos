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
				<div class="login-wrapper register-wrap bg-img">
                    <div class="login-content authent-content">
                        <form action="<?php echo base_url('registerAdmin') ?>" method="POST">
                            <div class="login-userset">
                                <div class="login-logo logo-normal">
                                   <img src="<?php echo base_url(); ?>modules/assets/img/logo.svg" alt="img">
                               </div>
                               <a href="index.html" class="login-logo logo-white">
                                   <img src="<?php echo base_url(); ?>modules/assets/img/logo-white.svg"  alt="Img">
                               </a>
                               <div class="login-userheading">
                                   <h3>Register</h3>
                                   <h4>Create New Dreamspos Account</h4>
                               </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Contact <span class="text-danger"> *</span></label>
                                    <div class="input-group">
                                        <input type="number" name="contact" id="contact" class="form-control border-end-0"  onkeypress="if(this.value.length === 10)return false;" >
                                        <span class="input-group-text border-start-0">
                                            <i class="ti ti-device-mobile"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password <span class="text-danger"> *</span></label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="pass-input form-control">
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
                                                       <span class="checkmarks"></span>I agree to the <a href="register.html#" class="text-primary">Terms & Privacy</a>
                                                   </label>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="form-login">
                                   <button type="submit" name="registerData" class="btn btn-login">Sign Up</button>
                               </div>
                               <div class="signinform">
                                   <h4>Already have an account ? <a href="<?php echo base_url('signin'); ?>" class="hover-a">Sign In Instead</a></h4>
                               </div>
                               
                               
                               <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                                   <p>Copyright &copy; 2025 DreamsPOS</p>
                               </div>
                           </div>
                        </form>
                       
                    </div>
                </div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="<?php echo base_url(); ?>modules/assets/js/jquery-3.7.1.min.js" type="418a88810f22d4dbedb48155-text/javascript"></script>

         <!-- Feather Icon JS -->
		<script src="<?php echo base_url(); ?>modules/assets/js/feather.min.js" type="418a88810f22d4dbedb48155-text/javascript"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="<?php echo base_url(); ?>modules/assets/js/bootstrap.bundle.min.js" type="418a88810f22d4dbedb48155-text/javascript"></script>
		
		<!-- Custom JS -->
<script src="<?php echo base_url(); ?>modules/assets/js/script.js" type="418a88810f22d4dbedb48155-text/javascript"></script>

	
    <script src="<?php echo base_url(); ?>modules/assets/js/rocket-loader.min.js" data-cf-settings="418a88810f22d4dbedb48155-|49" defer></script></body>
</html>