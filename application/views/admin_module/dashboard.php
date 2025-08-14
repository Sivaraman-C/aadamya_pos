<?php
$this->load->view('master_pages/header');
$this->load->view('master_pages/sidebar');
?>

	
	<!-- Main Wrapper -->
	<div class="main-wrapper">

		
		<div class="page-wrapper">
			<div class="content">

				<div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-2">
					<div class="mb-3">
						<h1 class="mb-1">Welcome, Admin</h1>
						<p class="fw-medium">You have <span class="text-primary fw-bold">200+</span> Orders, Today</p>
					</div>
					<div class="input-icon-start position-relative mb-3">
						<span class="input-icon-addon fs-16 text-gray-9">
							<i class="ti ti-calendar"></i>
						</span>
						<input type="text" class="form-control date-range bookingrange" placeholder="Search Product">
					</div>
				</div>

				<div class="alert alert-dismissible fade show mb-4">
					<ul class="nav user-menu">

					
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
						    <a href="<?php echo base_url('low-stock#pills-home'); ?>"  class="alert alert-success mb-0 py-2 px-3 text-dark text-decoration-none d-inline-block" role="alert"  style="min-width: 500px; text-align: center;">
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
					
				</ul>
				</div>

				
				<div class="row">

					<!-- Profit -->
					<div class="col-xl-3 col-sm-6 col-12 d-flex">
						<div class="card bg-primary revenue-widget flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
									<div>
										<h4 class="text-white mb-1"><i class="fa-solid fa-indian-rupee-sign"></i> 8,458,798</h4>
										<p class="text-white">Profit</p>
									</div>
									<span class="revenue-icon bg-cyan-transparent text-cyan">
										<i class="fa-solid fa-layer-group fs-16"></i>
									</span>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<p class="text-white mb-0"><span class="fs-13 fw-bold badge badge-soft-success">+35%</span> vs Last Month</p>
									<a href="<?php echo base_url('profit-loss') ?>" class="text-white text-decoration-underline fs-13 fw-medium">View All</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Profit -->

					<!-- Invoice -->
					<div class="col-xl-3 col-sm-6 col-12 d-flex">
						<div class="card bg-secondary revenue-widget flex-fill">
							<div class="card-body">
								<?php 
									$query = $this->db->query("SELECT SUM(total_unit_price) AS total_purchase FROM product");
									$totalPurchase = $query->row()->total_purchase;
									$totalFormatted = number_format($totalPurchase, 2);
								?>
								<div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
									<div>
										<h4 class="text-white mb-1"><i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $totalFormatted; ?></h4>
										<p class="text-white">Purchase</p>
									</div>
									<span class="revenue-icon bg-teal-transparent text-teal">
										<i class="ti ti-chart-pie fs-16"></i>
									</span>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<p class="text-white mb-0"><span class="fs-13 fw-bold badge badge-soft-success">+35%</span> vs Last Month</p>
									<a href="<?php echo base_url('purchase-report') ?>" class="text-white text-decoration-underline fs-13 fw-medium">View All</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Invoice -->

					<!-- Expenses -->
					<div class="col-xl-3 col-sm-6 col-12 d-flex">
						<div class="card bg-teal revenue-widget flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
									<div>
										<h4 class="text-white mb-1"><i class="fa-solid fa-indian-rupee-sign"></i> 8,980,097</h4>
										<p class="text-white">Inventory</p>
									</div>
									<span class="revenue-icon bg-orange-transparent text-orange">
										<i class="ti ti-lifebuoy fs-16"></i>
									</span>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<p class="text-white mb-0"><span class="fs-13 fw-bold badge badge-soft-success">+41%</span> vs Last Month</p>
									<a href="<?php echo base_url('inventory-report') ?>" class="text-white text-decoration-underline fs-13 fw-medium">View All</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Expenses -->

					<!-- Returns -->
					<div class="col-xl-3 col-sm-6 col-12 d-flex">
						<div class="card bg-info revenue-widget flex-fill">
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
									<div>
										<h4 class="text-white mb-1"><i class="fa-solid fa-indian-rupee-sign"></i> 78,458,798</h4>
										<p class="text-white">Sales</p>
									</div>
									<span class="revenue-icon bg-indigo-transparent text-indigo">
										<i class="ti ti-hash fs-16"></i>
									</span>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<p class="text-white mb-0"><span class="fs-13 fw-bold badge badge-soft-danger">-20%</span> vs Last Month</p>
									<a href="<?php echo base_url('sales-report') ?>" class="text-white text-decoration-underline fs-13 fw-medium">View All</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Returns -->

				</div>

				<div class="row">

					<!-- Sales & Purchase -->
					<div class="col-xxl-8 col-xl-7 col-sm-12 col-12 d-flex">
						<div class="card flex-fill">
							<div class="card-header d-flex justify-content-between align-items-center">
								<div class="d-inline-flex align-items-center">
									<span class="title-icon bg-soft-primary fs-16 me-2"><i class="ti ti-shopping-cart"></i></span>
									<h5 class="card-title mb-0">Sales & Purchase</h5>
								</div>
								<ul class="nav btn-group custom-btn-group">
									<a class="btn btn-outline-light" href="javascript:void(0);">1D</a>
									<a class="btn btn-outline-light" href="javascript:void(0);">1W</a>
									<a class="btn btn-outline-light" href="javascript:void(0);">1M</a>
									<a class="btn btn-outline-light" href="javascript:void(0);">3M</a>
									<a class="btn btn-outline-light" href="javascript:void(0);">6M</a>
									<a class="btn btn-outline-light active" href="javascript:void(0);">1Y</a>
								</ul>
							</div>
							<div class="card-body pb-0">
								<div>
									<div class="d-flex align-items-center gap-2">
										<div class="border p-2 br-8">
											<p class="d-inline-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-8 text-primary-300 me-1"></i>Total Purchase</p>
											<h4>3K</h4>
										</div>
										<div class="border p-2 br-8">
											<p class="d-inline-flex align-items-center mb-1"><i class="ti ti-circle-filled fs-8 text-primary me-1"></i>Total Sales</p>
											<h4>1K</h4>
										</div>
									</div>
									<div id="sales-daychart"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Sales & Purchase -->

					<!-- Overall Information -->
					<div class="col-xxl-4 col-xl-5 d-flex">
						<div class="card flex-fill">
							<div class="card-header">
								<div class="d-inline-flex align-items-center">
									<span class="title-icon bg-soft-info fs-16 me-2"><i class="ti ti-info-circle"></i></span>
									<h5 class="card-title mb-0">Overall Information</h5>
								</div>
							</div>
							<div class="card-body">
								<div class="row g-3">
									<div class="col-md-4">
										<div class="info-item border bg-light p-3 text-center">
											<div class="mb-2 text-info fs-24">
												<i class="ti ti-user-check"></i>
											</div>
											<p class="mb-1">Suppliers</p>
											<h5>6987</h5>
										</div>
									</div>
									<div class="col-md-4">
										<div class="info-item border bg-light p-3 text-center">
											<div class="mb-2 text-orange fs-24">
												<i class="ti ti-users"></i>
											</div>
											<p class="mb-1">Customer</p>
											<h5>4896</h5>
										</div>
									</div>
									<div class="col-md-4">
										<div class="info-item border bg-light p-3 text-center">
											<div class="mb-2 text-teal fs-24">
												<i class="ti ti-shopping-cart"></i>
											</div>
											<p class="mb-1">Orders</p>
											<h5>487</h5>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer pb-sm-0">
								<div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
									<h5>Customers Overview</h5>
									<div class="dropdown dropdown-wraper">
										<a href="javascript:void(0);" class="dropdown-toggle btn btn-sm btn-white"  data-bs-toggle="dropdown" aria-expanded="false">
											<i class="ti ti-calendar me-1"></i>Today
										</a>
										<ul class="dropdown-menu p-3">
											<li>
												<a href="javascript:void(0);" class="dropdown-item">Today</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item">Weekly</a>
											</li>
											<li>
												<a href="javascript:void(0);" class="dropdown-item">Monthly</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="row align-items-center">
									<div class="col-sm-5">
										<div id="customer-chart"></div>
									</div>
									<div class="col-sm-7">
										<div class="row gx-0">
											<div class="col-sm-6">
												<div class="text-center border-end">
													<h2 class="mb-1">5.5K</h2>
													<p class="text-orange mb-2">First Time</p>
													<span class="badge badge-success badge-xs d-inline-flex align-items-center"><i class="ti ti-arrow-up-left me-1"></i>25%</span>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="text-center">
													<h2 class="mb-1">3.5K</h2>
													<p class="text-teal mb-2">Return</p>
													<span class="badge badge-success badge-xs d-inline-flex align-items-center"><i class="ti ti-arrow-up-left me-1"></i>21%</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ Overall Information -->
				</div>

				<div class="row">

					<!-- Top Selling Products -->
					<div class="col-xxl-4 col-md-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
								<div class="d-inline-flex align-items-center">
									<span class="title-icon bg-soft-pink fs-16 me-2"><i class="ti ti-box"></i></span>
									<h5 class="card-title mb-0">Top Selling Products</h5>
								</div>
								<div class="dropdown">
									<a href="javascript:void(0);" class="dropdown-toggle btn btn-sm btn-white" data-bs-toggle="dropdown" aria-expanded="false">
										<i class="ti ti-calendar me-1"></i>Today
									</a>
									<ul class="dropdown-menu p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item">Today</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item">Weekly</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item">Monthly</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-body sell-product">
								<div class="d-flex align-items-center justify-content-between border-bottom">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="avatar avatar-lg">
											<img src="modules/assets/img/products/product-01.jpg" alt="img">
										</a>
										<div class="ms-2">
											<h6 class="fw-bold mb-1"><a href="javascript:void(0);">Charger Cable - Lighting</a></h6>
											<div class="d-flex align-items-center item-list">			
												<p>$187</p>
												<p>247+ Sales</p>
											</div>
										</div>
									</div>
									<span class="badge bg-outline-success badge-xs d-inline-flex align-items-center"><i class="ti ti-arrow-up-left me-1"></i>25%</span>
								</div>
								<div class="d-flex align-items-center justify-content-between border-bottom">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="avatar avatar-lg">
											<img src="modules/assets/img/products/product-16.jpg" alt="img">
										</a>
										<div class="ms-2">
											<h6 class="fw-bold mb-1"><a href="javascript:void(0);">Yves Saint Eau De Parfum</a></h6>
											<div class="d-flex align-items-center item-list">			
												<p>$145</p>
												<p>289+ Sales</p>
											</div>
										</div>
									</div>
									<span class="badge bg-outline-success badge-xs d-inline-flex align-items-center"><i class="ti ti-arrow-up-left me-1"></i>25%</span>
								</div>
								<div class="d-flex align-items-center justify-content-between border-bottom">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="avatar avatar-lg">
											<img src="modules/assets/img/products/product-03.jpg" alt="img">
										</a>
										<div class="ms-2">
											<h6 class="fw-bold mb-1"><a href="javascript:void(0);">Apple Airpods 2</a></h6>
											<div class="d-flex align-items-center item-list">			
												<p>$458</p>
												<p>300+ Sales</p>
											</div>
										</div>
									</div>
									<span class="badge bg-outline-success badge-xs d-inline-flex align-items-center"><i class="ti ti-arrow-up-left me-1"></i>25%</span>
								</div>
								<div class="d-flex align-items-center justify-content-between border-bottom">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="avatar avatar-lg">
											<img src="modules/assets/img/products/product-04.jpg" alt="img">
										</a>
										<div class="ms-2">
											<h6 class="fw-bold mb-1"><a href="javascript:void(0);">Vacuum Cleaner</a></h6>
											<div class="d-flex align-items-center item-list">			
												<p>$139</p>
												<p>225+ Sales</p>
											</div>
										</div>
									</div>
									<span class="badge bg-outline-danger badge-xs d-inline-flex align-items-center"><i class="ti ti-arrow-down-left me-1"></i>21%</span>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="avatar avatar-lg">
											<img src="modules/assets/img/products/product-05.jpg" alt="img">
										</a>
										<div class="ms-2">
											<h6 class="fw-bold mb-1"><a href="javascript:void(0);">Samsung Galaxy S21 Fe 5g</a></h6>
											<div class="d-flex align-items-center item-list">			
												<p>$898</p>
												<p>365+ Sales</p>
											</div>
										</div>
									</div>
									<span class="badge bg-outline-success badge-xs d-inline-flex align-items-center"><i class="ti ti-arrow-up-left me-1"></i>25%</span>
								</div>
							</div>
						</div>
					</div>
					<!-- /Top Selling Products -->

					<!-- Low Stock Products -->
					<div class="col-xxl-4 col-md-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
								<div class="d-inline-flex align-items-center">
									<span class="title-icon bg-soft-danger fs-16 me-2"><i class="ti ti-alert-triangle"></i></span>
									<h5 class="card-title mb-0">Low Stock Products</h5>
								</div>								
								<a href="<?php echo base_url('low-stock') ?>" class="fs-13 fw-medium text-decoration-underline">View All</a>
							</div>
							<div class="card-body">
								<?php 
					            $fetchMyProducts = $this->db->query("SELECT * FROM product WHERE quantity <= 10 ORDER BY quantity ASC LIMIT 5");
					            foreach ($fetchMyProducts->result() as $row) { ?>
					                <div class="d-flex align-items-center justify-content-between mb-4">
					                    <div class="d-flex align-items-center">
					                        <a href="javascript:void(0);" class="avatar avatar-lg">
					                            <img src="<?php echo $row->image; ?>" alt="img" width="50" height="50">
					                        </a>
					                        <div class="ms-2">
					                            <h6 class="fw-bold mb-1">
					                                <a href="javascript:void(0);"><?php echo $row->product_name; ?></a>
					                            </h6>
					                            <p class="fs-13">ID : <?php echo $row->id; ?></p>
					                        </div>
					                    </div>
					                    <div class="text-end">
					                        <p class="fs-13 mb-1">Instock</p>
					                        <h6 class="text-orange fw-medium"><?php echo $row->quantity; ?></h6>
					                    </div>
					                </div>
					            <?php } ?>
								
							</div>
						</div>
					</div>
					<!-- /Low Stock Products -->

					<!-- Top Customers -->
					<div class="col-xxl-4 col-md-6 d-flex">
						<div class="card flex-fill">
							<div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
								<div class="d-inline-flex align-items-center">
									<span class="title-icon bg-soft-orange fs-16 me-2"><i class="ti ti-users"></i></span>
									<h5 class="card-title mb-0">Top Customers</h5>
								</div>								
								<a href="customers.html" class="fs-13 fw-medium text-decoration-underline">View All</a>
							</div>
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between border-bottom mb-3 pb-3 flex-wrap gap-2">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="avatar avatar-lg flex-shrink-0">
											<img src="modules/assets/img/customer/customer11.jpg" alt="img">
										</a>
										<div class="ms-2">
											<h6 class="fs-14 fw-bold mb-1"><a href="javascript:void(0);">Carlos Curran</a></h6>
											<div class="d-flex align-items-center item-list">			
												<p class="d-inline-flex align-items-center"><i class="ti ti-map-pin me-1"></i>USA</p>
												<p>24 Orders</p>
											</div>
										</div>
									</div>
									<div class="text-end">
										<h5>$8,9645</h5>
									</div>									
								</div>
								<div class="d-flex align-items-center justify-content-between border-bottom mb-3 pb-3 flex-wrap gap-2">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="avatar avatar-lg flex-shrink-0">
											<img src="modules/assets/img/customer/customer12.jpg" alt="img">
										</a>
										<div class="ms-2">
											<h6 class="fs-14 fw-bold mb-1"><a href="javascript:void(0);">Stan Gaunter</a></h6>
											<div class="d-flex align-items-center item-list">			
												<p class="d-inline-flex align-items-center"><i class="ti ti-map-pin me-1"></i>UAE</p>
												<p>22 Orders</p>
											</div>
										</div>
									</div>
									<div class="text-end">
										<h5>$16,985</h5>
									</div>									
								</div>
								<div class="d-flex align-items-center justify-content-between border-bottom mb-3 pb-3 flex-wrap gap-2">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="avatar avatar-lg flex-shrink-0">
											<img src="modules/assets/img/customer/customer13.jpg" alt="img">
										</a>
										<div class="ms-2">
											<h6 class="fs-14 fw-bold mb-1"><a href="javascript:void(0);">Richard Wilson</a></h6>
											<div class="d-flex align-items-center item-list">			
												<p class="d-inline-flex align-items-center"><i class="ti ti-map-pin me-1"></i>Germany</p>
												<p>14 Orders</p>
											</div>
										</div>
									</div>
									<div class="text-end">
										<h5>$5,366</h5>
									</div>									
								</div>
								<div class="d-flex align-items-center justify-content-between border-bottom mb-3 pb-3 flex-wrap gap-2">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="avatar avatar-lg flex-shrink-0">
											<img src="modules/assets/img/customer/customer14.jpg" alt="img">
										</a>
										<div class="ms-2">
											<h6 class="fs-14 fw-bold mb-1"><a href="javascript:void(0);">Mary Bronson</a></h6>
											<div class="d-flex align-items-center item-list">			
												<p class="d-inline-flex align-items-center"><i class="ti ti-map-pin me-1"></i>Belgium</p>
												<p>08 Orders</p>
											</div>
										</div>
									</div>
									<div class="text-end">
										<h5>$4,569</h5>
									</div>									
								</div>
								<div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="avatar avatar-lg flex-shrink-0">
											<img src="modules/assets/img/customer/customer15.jpg" alt="img">
										</a>
										<div class="ms-2">
											<h6 class="fs-14 fw-bold mb-1"><a href="javascript:void(0);">Annie Tremblay</a></h6>
											<div class="d-flex align-items-center item-list">			
												<p class="d-inline-flex align-items-center"><i class="ti ti-map-pin me-1"></i>Greenland</p>
												<p>14 Orders</p>
											</div>
										</div>
									</div>
									<div class="text-end">
										<h5>$3,5698</h5>
									</div>									
								</div>
							</div>
						</div>
					</div>	
					<!-- /Top Customers -->
				</div>

				<div class="row">

					<!-- Sales Statics -->
					<div class="col-xxl-8 col-xl-7 col-sm-12 col-12 d-inline-flex">
						<div class="card flex-fill">
							<div class="card-header d-flex justify-content-between align-items-center">
								<div class="d-inline-flex align-items-center">
									<span class="title-icon bg-soft-danger fs-16 me-2"><i class="ti ti-alert-triangle"></i></span>
									<h5 class="card-title mb-0">Sales Statics</h5>
								</div>
								<div class="dropdown">
									<a href="javascript:void(0);" class="dropdown-toggle btn btn-sm btn-white"  data-bs-toggle="dropdown" aria-expanded="false">
										<i class="ti ti-calendar me-1"></i>2025
									</a>
									<ul class="dropdown-menu p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item">2025</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item">2022</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item">2021</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-body pb-0">
								<div class="d-flex align-items-center flex-wrap gap-2">
									<div class="border p-2 br-8">
										<h5 class="d-inline-flex align-items-center text-teal">$12,189<span class="badge badge-success badge-xs d-inline-flex align-items-center ms-2"><i class="ti ti-arrow-up-left me-1"></i>25%</span></h5>
										<p>Revenue</p>
									</div>
									<div class="border p-2 br-8">
										<h5 class="d-inline-flex align-items-center text-orange">$48,988,078<span class="badge badge-danger badge-xs d-inline-flex align-items-center ms-2"><i class="ti ti-arrow-down-right me-1"></i>25%</span></h5>
										<p>Expense</p>
									</div>
								</div>
								<div id="sales-statistics"></div>
							</div>
						</div>
					</div>
					<!-- /Sales Statics -->

					<!-- Top Categories -->
					<div class="col-xxl-4 col-xl-5 d-flex">
						<div class="card flex-fill">
							<div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
								<div class="d-inline-flex align-items-center">
									<span class="title-icon bg-soft-orange fs-16 me-2"><i class="ti ti-users"></i></span>
									<h5 class="card-title mb-0">Top Categories</h5>
								</div>
								<div class="dropdown">
									<a href="javascript:void(0);" class="dropdown-toggle btn btn-sm btn-white d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
										<i class="ti ti-calendar me-1"></i>Weekly
									</a>
									<ul class="dropdown-menu p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item">Today</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item">Weekly</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item">Monthly</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-body">
								<div class="d-flex align-items-center justify-content-between flex-wrap gap-4 mb-4">
									<div>
										<canvas id="top-category" height="230" width="200"></canvas>
									</div>
									<div>
										<div class="category-item category-primary">
											<p class="fs-13 mb-1">Electronics</p>
											<h2 class="d-flex align-items-center">698<span class="fs-13 fw-normal text-default ms-1">Sales</span></h2>
										</div>
										<div class="category-item category-orange">
											<p class="fs-13 mb-1">Sports</p>
											<h2 class="d-flex align-items-center">545<span class="fs-13 fw-normal text-default ms-1">Sales</span></h2>
										</div>
										<div class="category-item category-secondary">
											<p class="fs-13 mb-1">Lifestyles</p>
											<h2 class="d-flex align-items-center">456<span class="fs-13 fw-normal text-default ms-1">Sales</span></h2>
										</div>
									</div>
								</div>
								<h6 class="mb-2">Category Statistics</h6>
								<div class="border br-8">
									<div class="d-flex align-items-center justify-content-between border-bottom p-2">
										<p class="d-inline-flex align-items-center mb-0"><i class="ti ti-square-rounded-filled text-indigo fs-8 me-2"></i>Total Number Of Categories</p>
										<h5>698</h5>
									</div>
									<div class="d-flex align-items-center justify-content-between p-2">
										<p class="d-inline-flex align-items-center mb-0"><i class="ti ti-square-rounded-filled text-orange fs-8 me-2"></i>Total Number Of Products</p>
										<h5>7899</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Top Categories -->

				</div>
				
			</div>
		</div>

	</div>
	<!-- /Main Wrapper -->

<?php
	$this->load->view('master_pages/footer');
?>