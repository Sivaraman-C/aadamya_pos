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

		<script src="<?php echo base_url(); ?>modules/assets/js/theme-script.js" type="f19eba6cac2c5bdf6aa2d583-text/javascript"></script>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>modules/assets/img/favicon.png">

		<!-- Apple Touch Icon -->
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>modules/assets/img/apple-touch-icon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/css/bootstrap.min.css">

		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- animation CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/css/animate.css">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/plugins/select2/css/select2.min.css">

		<!-- Datatable CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/css/dataTables.bootstrap5.min.css">
		
        <!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/plugins/fontawesome/css/all.min.css">

		<!-- Daterangepikcer CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/plugins/daterangepicker/daterangepicker.css">

		<!-- Tabler Icon CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/plugins/tabler-icons/tabler-icons.css">

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/plugins/owlcarousel/owl.carousel.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/plugins/owlcarousel/owl.theme.default.min.css">
		
		<!-- Color Picker Css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/plugins/@simonwep/pickr/themes/nano.min.css">

	    <!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/css/style.css">
		
	</head>
	
	<body class="pos-page">
		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<!-- Header -->
			<div class="header pos-header">
			
				<!-- Logo -->
				 <div class="header-left active">
					<a href="index.html" class="logo logo-normal">
						<img src="<?php echo base_url(); ?>modules/assets/img/logo.svg"  alt="Img">
					</a>
					<a href="index.html" class="logo logo-white">
						<img src="<?php echo base_url(); ?>modules/assets/img/logo-white.svg"  alt="Img">
					</a>
					<a href="index.html" class="logo-small">
						<img src="<?php echo base_url(); ?>modules/assets/img/logo-small.png"  alt="Img">
					</a>
				</div>
				<!-- /Logo -->
				
				<a id="mobile_btn" class="mobile_btn d-none" href="pos-2.html#sidebar">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>
				
				<!-- Header Menu -->
				<ul class="nav user-menu">

					<!-- Search -->
					<li class="nav-item time-nav">
						<span class="bg-teal text-white d-inline-flex align-items-center"><img src="<?php echo base_url(); ?>modules/assets/img/icons/clock-icon.svg" alt="img" class="me-2">09:25:32</span>
					</li>
					<!-- /Search -->
					<!-- Out of Stock Alert and warning alert -->
					<li class="nav-item time-nav align-items-center">
					    <?php
						$lowStockQuery = $this->db->query("SELECT COUNT(*) as count FROM product WHERE quantity >= 1 AND quantity <= 10");
						$lowStockCount = $lowStockQuery->row()->count;
						?>
						<?php if ($lowStockCount > 0): ?>
						    <a href="<?php echo base_url('low-stock#pills-home'); ?>" 
					           class="alert alert-warning mb-0 py-2 px-3 text-dark text-decoration-none d-inline-block" 
					           role="alert" style="min-width: 500px; text-align: center;">
						        ⚠️ There are <strong><?php echo $lowStockCount; ?></strong> products with low stock!
						    </a>
						<?php else: ?>
						    <a href="<?php echo base_url('low-stock#pills-home'); ?>"  class="alert alert-success mx-3 mt-3 text-dark text-decoration-none d-inline-block" role="alert"  style="min-width: 500px; text-align: center;">
						        ✅ No low stock products at the moment.
						    </a>
						<?php endif; ?>
					</li>
					<li class="nav-item time-nav align-items-center">
					    <?php
					    $outOfStockQuery = $this->db->query("SELECT COUNT(*) as count FROM product WHERE quantity = 0");
					    $outOfStockCount = $outOfStockQuery->row()->count;
					    ?>
					    <?php if ($outOfStockCount > 0): ?>
					        <a href="<?php echo base_url('low-stock#pills-profile'); ?>" 
					           class="alert alert-danger mb-0 py-2 px-3 text-dark text-decoration-none d-inline-block" 
					           role="alert"  style="min-width: 500px; text-align: center;">
					            ❌ <strong><?php echo $outOfStockCount; ?></strong> product(s) out of stock!
					        </a>
					    <?php else: ?>
					        <a href="<?php echo base_url('low-stock#pills-profile'); ?>" class="alert alert-success mb-0 py-2 px-3 text-dark text-decoration-none d-inline-block" role="alert"  style="min-width: 500px; text-align: center;">
					            ✅ No out-of-stock products.
					        </a>
					    <?php endif; ?>
					</li>
					<li class="nav-item pos-nav">
						<a href="<?php echo base_url('dashboard'); ?>" class="btn btn-purple btn-md d-inline-flex align-items-center">
							<i class="ti ti-world me-1"></i>Dashboard
						</a>
					</li>

					
					
					<li class="nav-item nav-item-box">
						<a href="pos-2.html#" data-bs-toggle="modal" data-bs-target="#calculator" class="bg-orange border-orange text-white"><i class="ti ti-calculator"></i></a>
					</li>
					<li class="nav-item nav-item-box">
						<a href="javascript:void(0);" id="btnFullscreen" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Maximize" >
							<i class="ti ti-maximize"></i>
						</a>
					</li>
					<li class="nav-item nav-item-box" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Today’s Sale">
						<a href="pos-2.html#" data-bs-toggle="modal" data-bs-target="#today-sale"><i class="ti ti-progress"></i></a>
					</li>
					<li class="nav-item nav-item-box" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Today’s Profit">
						<a href="pos-2.html#" data-bs-toggle="modal" data-bs-target="#today-profit"><i class="ti ti-chart-infographic"></i></a>
					</li>
					<li class="nav-item dropdown has-arrow main-drop profile-nav">
						<a href="javascript:void(0);" class="nav-link userset" data-bs-toggle="dropdown">
							<span class="user-info p-0">
								<span class="user-letter">
									<img src="<?php echo base_url(); ?>modules/assets/img/profiles/avator1.jpg" alt="Img" class="img-fluid">
								</span>
							</span>
						</a>
						<div class="dropdown-menu menu-drop-user">
							<div class="profilename">
								<div class="profileset">
									<span class="user-img"><img src="<?php echo base_url(); ?>modules/assets/img/profiles/avator1.jpg" alt="Img">
										<span class="status online"></span></span>
									<div class="profilesets">
										<h6>John Smilga</h6>
										<h5>Super Admin</h5>
									</div>
								</div>
								<hr class="m-0">
								<a class="dropdown-item" href="profile.html"><i class="me-2" data-feather="user"></i>My
									Profile</a>
								<a class="dropdown-item" href="general-settings.html"><i class="me-2" data-feather="settings"></i>Settings</a>
								<hr class="m-0">
								<a class="dropdown-item logout pb-0" href="<?php echo base_url('adminLogout') ?>"><img src="<?php echo base_url(); ?>modules/assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
							</div>
						</div>
					</li>
				</ul>
				<!-- /Header Menu -->
				
				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="general-settings.html">Settings</a>
						<a class="dropdown-item" href="signin.html">Logout</a>
					</div>
				</div>
				<!-- /Mobile Menu -->
			</div>
			<!-- /Header -->