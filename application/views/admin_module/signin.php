<?php 
require_once 'vendor/autoload.php';
use Twilio\Rest\Client;
?>

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
        <link rel="shortcut icon" type="image/x-icon" href="modules/assets/img/favicon.png">

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="modules/assets/img/apple-touch-icon.png">
    
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="modules/assets/css/bootstrap.min.css">
    
        <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="modules/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="modules/assets/plugins/fontawesome/css/all.min.css">

        <!-- Tabler Icon CSS -->
      <link rel="stylesheet" href="modules/assets/plugins/tabler-icons/tabler-icons.css">

      <!-- Main CSS -->
        <link rel="stylesheet" href="modules/assets/css/style.css">

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
        <div class="login-wrapper bg-img">
                    <div class="login-content authent-content">
                        <form method="POST" action="<?php echo base_url('signinAdmin'); ?>">
                            <div class="login-userset">
                                <div class="login-logo logo-normal">
                                   <img src="modules/assets/img/logo.svg" alt="img">
                               </div>
                               <a href="index.html" class="login-logo logo-white">
                                   <img src="modules/assets/img/logo-white.svg"  alt="Img">
                               </a>
                               <div class="login-userheading">
                                   <h3>Signin</h3>
                                   <h4 class="fs-16">Enter registered mobile number and password</h4>
                               </div>
                                <div class="mb-3">
                                    <label class="form-label">Contact<span class="text-danger"> *</span></label>
                                    <div class="input-group">
                                        <input type="number" name="admin_contact_no" id="contact_no" class="form-control border-end-0"  onkeypress="if(this.value.length === 10)return false;" >
                                        <span class="input-group-text border-start-0">
                                            <i class="ti ti-device-mobile"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password <span class="text-danger"> *</span></label>
                                    <div class="pass-group">
                                        <input type="password" name="admin_password" class="pass-input form-control" onkeypress="if(this.value.length === 6)return false;">
                                        <span class="ti toggle-password ti-eye-off text-gray-9"></span>
                                    </div>
                                </div>
                               
                               <div class="form-login">
                                   <button type="submit" name="sendOtp" class="btn btn-login w-100">Send OTP</button>
                               </div>

                               <div class="form-login">
                                   
                               </div>
                               <div class="signinform">
                                   <h4>New on our platform?<a href="<?php echo base_url('register'); ?>" class="hover-a"> Create an account</a></h4>
                               </div>
                               <div class="form-setlogin or-text">
                                    <h4>OR</h4>
                                </div>
                                <div class="mt-2">
                                   <div class="d-flex align-items-center justify-content-center flex-wrap">
                                       <!-- <div class="text-center me-2 flex-fill">
                                           <a href="javascript:void(0);"
                                               class="br-10 p-2 btn btn-info d-flex align-items-center justify-content-center">
                                               <img class="img-fluid m-1" src="assets/img/icons/facebook-logo.svg" alt="Facebook">
                                           </a>
                                       </div> -->
                                       <?php if (isset($loginButton)): ?>
                                        <?php else: ?>
                                       <div class="text-center me-2 flex-fill">
                                           <a href="<?php $loginButton ?>"
                                               class="btn btn-white br-10 p-2  border d-flex align-items-center justify-content-center">
                                               <img class="img-fluid m-1" src="<?php echo base_url('modules/assets/img/icons/google-logo.svg'); ?>" alt="gmail">
                                               <span class="ms-2">Sign in with Google</span>
                                           </a>
                                       </div>   
                                       <?php endif; ?>
                                   </div>
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
        <script src="modules/assets/js/jquery-3.7.1.min.js" type="87f84cbd846120c591297171-text/javascript"></script>

         <!-- Feather Icon JS -->
    <script src="modules/assets/js/feather.min.js" type="87f84cbd846120c591297171-text/javascript"></script>
    
    <!-- Bootstrap Core JS -->
        <script src="modules/assets/js/bootstrap.bundle.min.js" type="87f84cbd846120c591297171-text/javascript"></script>
    
    <!-- Custom JS -->
        <script src="modules/assets/js/script.js" type="87f84cbd846120c591297171-text/javascript"></script>

    <script src="<?php echo base_url(); ?>modules/assets/js/rocket-loader.min.js" data-cf-settings="87f84cbd846120c591297171-|49" defer></script></body>
</html>