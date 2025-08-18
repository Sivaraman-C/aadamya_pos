<?php 
if(!isset($_SESSION['activeAdmin']))
{
	redirect(base_url());
}

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

		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		
		<script src="<?php echo base_url(); ?>modules/assets/js/theme-script.js" type="725c65875058b172a241ff4a-text/javascript"></script>	

		<script src="<?php echo base_url(); ?>modules/assets/js/theme-script.js" type="37213bcb04edd4441f501932-text/javascript"></script>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>modules/assets/img/favicon.png">

		<!-- Apple Touch Icon -->
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>modules/assets/img/apple-touch-icon.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
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

		<!-- Map CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/plugins/jvectormap/jquery-jvectormap-2.0.5.css">
		<!-- Owl Carousel CSS -->
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/plugins/owlcarousel/owl.carousel.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/plugins/owlcarousel/owl.theme.default.min.css">
		
		<!-- Color Picker Css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/plugins/@simonwep/pickr/themes/nano.min.css">

	    <!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>modules/assets/css/style.css">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css">
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>

        <!-- xlsx -->
		<script src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>
		
		<!-- jsPDF -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
		<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

		<!-- jsPDF and autoTable -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.29/jspdf.plugin.autotable.min.js"></script>
		
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			
		<!-- Header -->
		<div class="header">
			<div class="main-header">

				<!-- Logo -->
				<div class="header-left active">
					<a href="index.html" class="logo logo-normal">
						<img src="<?php echo base_url(); ?>modules/assets/img/logo.svg" alt="Img">
					</a>
					<a href="index.html" class="logo logo-white">
						<img src="<?php echo base_url(); ?>modules/assets/img/logo-white.svg" alt="Img">
					</a>
					<a href="index.html" class="logo-small">
						<img src="<?php echo base_url(); ?>modules/assets/img/logo-small.png" alt="Img">
					</a>
				</div>
				<!-- /Logo -->

				<a id="mobile_btn" class="mobile_btn" href="product-list.html#sidebar">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>

				<!-- Header Menu -->
				<ul class="nav user-menu">

					<!-- Search -->
					<li class="nav-item nav-searchinputs">
						<div class="top-nav-search">
							<a href="javascript:void(0);" class="responsive-search">
								<i class="fa fa-search"></i>
							</a>
							<form action="product-list.html#" class="dropdown">
								<div class="searchinputs input-group dropdown-toggle" id="dropdownMenuClickable" data-bs-toggle="dropdown" data-bs-auto-close="outside">
									<input type="text" placeholder="Search">
									<div class="search-addon">
										<span><i class="ti ti-search"></i></span>
									</div>
								</div>
								
							</form>
						</div>
					</li>
					<!-- /Search -->

					

					
					
					<li class="nav-item pos-nav">
						<a href="<?php echo base_url('Pointofsales') ?>" class="btn btn-dark btn-md d-inline-flex align-items-center">
							<i class="ti ti-device-laptop me-1"></i>POS
						</a>
					</li>

					<!-- Flag -->
					<li class="nav-item dropdown has-arrow flag-nav nav-item-box">
						<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);"
							role="button">
							<img src="<?php echo base_url(); ?>modules/assets/img/flags/us-flag.svg" alt="Language" class="img-fluid">
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="javascript:void(0);" class="dropdown-item">
								<img src="<?php echo base_url(); ?>modules/assets/img/flags/english.svg" alt="Img" height="16">English
							</a>
							<a href="javascript:void(0);" class="dropdown-item">
								<img src="<?php echo base_url(); ?>modules/assets/img/flags/arabic.svg" alt="Img" height="16">Arabic
							</a>
							<a href="javascript:void(0);" class="dropdown-item">
								<img src="<?php echo base_url(); ?>modules/assets/img/flags/arabic.svg" alt="Img" height="16">Tamil
							</a>
						</div>
					</li>
					<!-- /Flag -->

					<li class="nav-item nav-item-box">
						<a href="javascript:void(0);" id="btnFullscreen">
							<i class="ti ti-maximize"></i>
						</a>
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

							<?php 
				        	$fetchAdmin = $this->db->query("SELECT * FROM register_seller");
				        	foreach ($fetchAdmin->result() as $row) { ?>

							<div class="profileset d-flex align-items-center">
								<span class="user-img me-2">
									<img src="<?php echo base_url(); ?>modules/assets/img/profiles/avator1.jpg" alt="Img">
								</span>
								<div>
									<h6 class="fw-medium"><?php echo $row->contact_no; ?></h6>
									<p>Admin</p>
								</div>
							</div>
							<?php } ?>
							<a class="dropdown-item" href="<?php echo base_url('profile') ?>"><i class="ti ti-user-circle me-2"></i>MyProfile</a>
							<a class="dropdown-item" href="<?php echo base_url('sales-report') ?>"><i class="ti ti-file-text me-2"></i>Reports</a>
							<a class="dropdown-item" href="<?php echo base_url('uppass') ?>"><i class="ti ti-settings-2 me-2"></i>Settings</a>
							<hr class="my-2">
							<a class="dropdown-item logout pb-0" href="<?php echo base_url('adminLogout') ?>"><i class="ti ti-logout me-2"></i>Logout</a>
						</div>
					</li>
				</ul>
				<!-- /Header Menu -->

				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
						aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="<?php echo base_url('profile') ?>">My Profile</a>
						<a class="dropdown-item" href="general-settings.html">Settings</a>
						<a class="dropdown-item" href="<?php echo base_url('adminLogout') ?>">Logout</a>
					</div>
				</div>
				<!-- /Mobile Menu -->
			</div>
		</div>
		<!-- /Header -->
        </div>
		<!-- /Main Wrapper -->
		
