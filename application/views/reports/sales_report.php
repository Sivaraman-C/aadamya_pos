<?php 
	$this->load->view('master_pages/header');
	$this->load->view('master_pages/sidebar');
?>
		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<div class="page-wrapper">
				<div class="content">
					<div class="page-header">
						<div class="add-item d-flex">
							<div class="page-title">
								<h4>Sales Report</h4>
								<h6>Manage your Sales report</h6>
							</div>
						</div>
						<ul class="table-top-head">
							<li class="me-2">
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i class="ti ti-refresh"></i></a>
							</li>
							<li class="me-2">
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i class="ti ti-chevron-up"></i></a>
							</li>
						</ul>
					</div>
					<div class="row">
						<?php 
							$query = $this->db->query("SELECT SUM(total_unit_price) AS total_purchase FROM product");
							$totalPurchase = $query->row()->total_purchase;
							$totalFormatted = number_format($totalPurchase, 2);
						?>
						<div class="col-xl-3 col-sm-6 col-12 d-flex">
							<div class="card border border-success sale-widget flex-fill">
								<div class="card-body d-flex align-items-center">
									<span class="sale-icon bg-success text-white">
										<i class="ti ti-align-box-bottom-left-filled fs-24"></i>
									</span>
									<div class="ms-2">
										<p class="fw-medium mb-1">Total Amount</p>
										<div>
											<h3><i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $totalFormatted; ?></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12 d-flex">
							<div class="card border border-info sale-widget flex-fill">
								<div class="card-body d-flex align-items-center">
									<span class="sale-icon bg-info text-white">
										<i class="ti ti-align-box-bottom-left-filled fs-24"></i>
									</span>
									<div class="ms-2">
										<p class="fw-medium mb-1">Total Paid</p>
										<div>
											<h3><i class="fa-solid fa-indian-rupee-sign"></i> 2,56,42</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12 d-flex">
							<div class="card border border-orange sale-widget flex-fill">
								<div class="card-body d-flex align-items-center">
									<span class="sale-icon bg-orange text-white">
										<i class="ti ti-moneybag fs-24"></i>
									</span>
									<div class="ms-2">
										<p class="fw-medium mb-1">Total Unpaid</p>
										<div>
											<h3><i class="fa-solid fa-indian-rupee-sign"></i> 1,52,45</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12 d-flex">
							<div class="card border border-danger sale-widget flex-fill">
								<div class="card-body d-flex align-items-center">
									<span class="sale-icon bg-danger text-white">
										<i class="ti ti-alert-circle-filled fs-24"></i>
									</span>
									<div class="ms-2">
										<p class="fw-medium mb-1">Overdue</p>
										<div>
											<h3><i class="fa-solid fa-indian-rupee-sign"></i> 2,56,12</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body pb-1">
							<form action="sales-report.html">
								<div class="row align-items-end">
									<div class="col-lg-10">
										<div class="row">
											<div class="col-md-4">
												<div class="mb-3">
													<div class="search-set">
														<div class="search-input">
															<span class="btn-searchset"><i class="ti ti-search"></i></span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					
					<div class="card no-search">
						<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
							<div>
								<h4>Sales Report</h4>
							</div>
							<ul class="table-top-head">
								<li class="me-2">
									<a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img src="<?php echo base_url(); ?>modules/assets/img/icons/pdf.svg" alt="img"></a>
								</li>
								<li class="me-2">
									<a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img src="<?php echo base_url(); ?>modules/assets/img/icons/excel.svg" alt="img"></a>
								</li>
								<li>
									<a data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="ti ti-printer"></i></a>
								</li>
							</ul>
						</div>
						<div class="card-body p-0">
							<div class="table-responsive">
								<table class="table datatable">
									<thead class="thead-light">
										<tr>
											<th>Id</th>
											<th>Product Name</th>
											<th>Brand</th>
											<th>Category</th>
											<th>Sold Qty</th>
											<th>Sold Amount</th>
											<th>Instock Qty</th>
										</tr>
									</thead>
<tbody>
		        	<?php 
		        	$fetchMyProducts = $this->db->query("SELECT * FROM product");
		        	foreach ($fetchMyProducts->result() as $row) { ?>
		            <tr>
		                <td><?php echo $row->id; ?></td>
		                <td><img src="<?php echo $row->image; ?>" width='50' height='50' alt='Product Image'> <?php echo $row->product_name; ?></td>
		                <td><?php echo $row->brand; ?></td>
		                <td><?php echo $row->category; ?></td>
		                <td><?php echo $row->quantity; ?></td>
		                <td><?php echo $row->total_unit_price; ?></td>
		                <td><?php echo $row->discount; ?></td>
		            </tr>
		        <?php } ?>
		        </tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /product list -->
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->
		  
<?php 
	$this->load->view('master_pages/footer');
?>