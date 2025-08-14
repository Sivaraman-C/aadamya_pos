<?php 
	$this->load->view('master_pages/header');
	$this->load->view('master_pages/sidebar');
?>
		 
		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<div class="page-wrapper">
				<div class="content">
					<div>
						<div class="page-header">
							<div class="add-item d-flex">
								<div class="page-title">
									<h4>Purchase report</h4>
									<h6>Manage your Purchase report</h6>
								</div>
							</div>
							<ul class="table-top-head">
								<li class="me-2">
									<a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i class="ti ti-refresh"></i></a>
								</li>
								<li>
									<a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i class="ti ti-chevron-up"></i></a>
								</li>
							</ul>
						</div>
						<div class="card">
							<div class="card-body pb-1">
								<form action="purchase-report.html">
									<div class="row align-items-end">
										<?php

										$categories = $this->db->query("SELECT DISTINCT category FROM product")->result();

										$products = $this->db->query("SELECT DISTINCT product_name FROM product")->result();

										?>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-md-4">
													<div class="mb-3">
														<label class="form-label">Categorys</label>
													    <select class="select form-control" name="Category">
													        <option value="">All</option>
													        <?php foreach ($categories as $cat): ?>
													            <option value="<?php echo $cat->category; ?>">
													                <?php echo ucfirst($cat->category); ?>
													            </option>
													        <?php endforeach; ?>
													    </select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="mb-3">
														<label class="form-label">Products</label>
														<select class="select form-control" name="ProductName">
													        <option value="">All</option>
													        <?php foreach ($products as $product): ?>
													            <option value="<?php echo $product->product_name; ?>">
													                <?php echo ucfirst($product->product_name); ?>
													            </option>
													        <?php endforeach; ?>
													    </select>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-2">
											<div class="mb-3">
												<button class="btn btn-primary w-100" type="submit">Generate Report</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- /product list -->
						<div class="card no-search">
							<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
								<div>
									<h4>Purchase Report</h4>
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
									<table id="example" class="display">
								        <thead>
								            <tr>
												<th>Id </th>
												<th>Date</th>
												<th>Time</th>
												<th>Product Name</th>
												<th>Category</th>
												<th>Brand</th>
												<th>Quantity</th>
												<th>Price</th>
												<th>Total Price</th>
												<th>Discount</th>
												<th>Final Price</th>
											</tr>
								        </thead>
								        <tbody>
								        	<?php 
								        	$fetchMyProducts = $this->db->query("SELECT * FROM product");
								        	foreach ($fetchMyProducts->result() as $row) { ?>
								            <tr>
								                <td><?php echo $row->id; ?></td>
								                <td><?php echo date('Y-m-d', strtotime($row->date)); ?></td>
								                <td><?php echo date('H:i', strtotime($row->date)); ?></td>
								                <td><img src="<?php echo $row->image; ?>" width='50' height='50' alt='Product Image'><span style="margin-left: 20px;"><?php echo $row->product_name; ?></span></td>
								                <td><?php echo $row->category; ?></td>
								                <td><?php echo $row->brand; ?></td>
								                <td><?php echo $row->quantity; ?></td>
								                <td><?php echo $row->unit_price; ?></td>
								                <td><?php echo $row->total_unit_price; ?></td>
								                <td><?php echo $row->discount; ?> %</td>
								                <td><?php echo $row->final_price; ?></td>
								            </tr>
								        <?php } ?>
								        </tbody>
								        <tfoot>
								            <tr>
												<th>Id </th>
												<th>Date</th>
												<th>Time</th>
												<th>Product Name</th>
												<th>Category</th>
												<th>Brand</th>
												<th>Quantity</th>
												<th>Price</th>
												<th>Total Price</th>
												<th>Discount</th>
												<th>Final Price</th>
											</tr>
								        </tfoot>
								    </table>
								</div>
							</div>
						</div>
						<!-- /product list -->
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

<script>
	new DataTable('#example');
</script>

<?php 
	$this->load->view('master_pages/footer');
?>