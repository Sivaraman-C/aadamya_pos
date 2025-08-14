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
        
    </head>
    <body class="account-page bg-white">
    
        <!-- Main Wrapper -->
        <div class="main-wrapper">
            <div class="account-content">
                <div class="row login-wrapper m-0">
                    <div class="col-lg-6 p-0">
                        <div class="login-content">
                            <form method="POST" action="<?php echo base_url('adminVerify') ?>" class="digit-group">
                                <div class="login-userset">
                                    <div class="login-logo logo-normal">
                                        <img src="modules/assets/img/logo.svg" alt="img">
                                    </div>
                                    <a href="index.html" class="login-logo logo-white">
                                        <img src="modules/assets/img/logo-white.svg"  alt="Img">
                                    </a>
                                    <div>
                                        <div class="login-userheading">
                                            <h3>OTP Verification</h3>
                                            <h4>verify your OTP here <?php echo $_SESSION['activeAdmin']; ?></h4>
                                        </div>
                                        <div class="text-center otp-input">
                                            <div class="d-flex align-items-center mb-3">
                                                <input type="text" class=" rounded w-100 py-sm-3 py-2 text-center fs-18 fw-bold me-3" id="recived_mobile_otp" name="recived_mobile_otp" maxlength="6">
                                                
                                            </div>
                                            <div>
                                                <!-- <div class="mb-3 d-flex justify-content-center">
                                                    <p class="text-gray-9">Didn't get the OTP? <a href="javascript:void(0);" class="text-primary">Resend OTP</a></p>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="OTPVerify" class="btn btn-success w-100">Verify & Proceed</button>
                                        </div>
                                    </div>
                                    <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                                        <p>Copyright &copy; 2025 DreamsPOS</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 p-0">
                        <div class="login-img">
                            <img src="modules/assets/img/authentication/authentication-06.svg" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
          
        <!-- /Main Wrapper -->
    
        <!-- jQuery -->
        <!-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
        <script src="modules/assets/js/jquery-3.7.1.min.js" type="32f5eb40336cd9385ff47743-text/javascript"></script>

         <!-- Feather Icon JS -->
        <script src="modules/assets/js/feather.min.js" type="32f5eb40336cd9385ff47743-text/javascript"></script>
        
        <!-- Bootstrap Core JS -->
        <script src="modules/assets/js/bootstrap.bundle.min.js" type="32f5eb40336cd9385ff47743-text/javascript"></script>
        
        <!-- Custom JS -->
        <script src="modules/assets/js/script.js" type="32f5eb40336cd9385ff47743-text/javascript"></script>

    <script src="<?php echo base_url(); ?>modules/assets/js/rocket-loader.min.js" data-cf-settings="87f84cbd846120c591297171-|49" defer></script></body>
</html>