
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
								<h4 class="fw-bold">Low Stocks</h4>
								<h6>Manage your low stocks</h6>
							</div>
						</div>
						<ul class="table-top-head">
							<li>
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img src="modules/assets/img/icons/pdf.svg" alt="img"></a>
							</li>
							<li>
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img src="modules/assets/img/icons/excel.svg" alt="img"></a>
							</li>
							<li>
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i class="ti ti-refresh"></i></a>
							</li>
							<li>
								<a href="low-stocks.html#" class="btn btn-secondary w-auto shadow-none" data-bs-toggle="modal" data-bs-target="#send-email"><i data-feather="mail" class="feather-mail"></i>Send Email</a>
							</li>
						</ul>
						
					</div>
					<div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
							<ul class="nav nav-pills low-stock-tab d-flex me-2 mb-0" id="pills-tab" role="tablist">
								<li class="nav-item" role="presentation">
								  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Low Stocks</button>
								</li>
								<li class="nav-item" role="presentation">
								  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Out of Stocks</button>
								</li>
								
							</ul>
						</div>
					

					<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<!-- /product list -->
								<?php
								$lowStockQuery = $this->db->query("SELECT COUNT(*) as count FROM product WHERE quantity >= 1 AND quantity <= 10");
								$lowStockCount = $lowStockQuery->row()->count;
								?>
								<?php if ($lowStockCount > 0): ?>
								    <div class="alert alert-warning mx-3 mt-3 text-dark" role="alert">
								        ⚠️ There are <strong><?php echo $lowStockCount; ?></strong> products with low stock!
								    </div>
								<?php else: ?>
								    <div class="alert alert-success mx-3 mt-3 text-dark" role="alert">
								        ✅ No low stock products at the moment.
								    </div>
								<?php endif; ?>

								<div class="card">
									
									<div class="card-body p-0">
											<table id="lowStocksTable" class="display">
										        <thead>
										            <tr>
														<th>Id </th>
														<th>Product Name</th>
														<th>Category</th>
														<th>Brand</th>
														<th>Price</th>
														<th>Discount</th>
														<th>DIscount Amount</th>
														<th>Final Price</th>
														<th>Image</th>
														<th>Quantity</th>
														<th>Action</th>
													</tr>
										        </thead>
										        <tbody>
										        	<?php 
										        	$fetchMyProducts = $this->db->query("SELECT * FROM product WHERE quantity >= 1 AND quantity <= 10");
										        	foreach ($fetchMyProducts->result() as $row) { ?>
										            <tr>
										                <td><?php echo $row->id; ?></td>
										                <td><?php echo $row->product_name; ?></td>
										                <td><?php echo $row->category; ?></td>
										                <td><?php echo $row->brand; ?></td>
										                <td><?php echo $row->unit_price; ?></td>
										                <td><?php echo $row->discount; ?></td>
										                <td><?php echo $row->discount_amount; ?></td>
										                <td><?php echo $row->final_price; ?></td>
										                <td><img src="<?php echo $row->image; ?>" width='50' height='50' alt='Product Image'></td>
										                <td><?php echo $row->quantity; ?></td>
										                <td class="action-table-data">
											                <div class="edit-delete-action">
											                    <a class="me-2 edit-icon p-2" href="<?php echo base_url('view_details?id=' . $row->id); ?>">
											                        <i data-feather="eye" class="action-eye"></i>
											                    </a>
											                    <a class="me-2 p-2" href="<?php echo base_url('edit_details?id=' . $row->id); ?>">
											                        <i data-feather="edit" class="feather-edit"></i>
											                    </a>
											                    <a href="<?php echo base_url('deleteProduct?id=' . $row->id); ?>" class="p-2" onclick="return confirm('Are you sure you want to delete this product?')">
											                        <i data-feather="trash-2" class="feather-trash-2 text-danger"></i>
											                    </a>
											                </div>
										            </td>
										            </tr>
										        <?php } ?>
										        </tbody>
										        <tfoot>
										            <tr>
														<th>Id </th>
														<th>Product Name</th>
														<th>Category</th>
														<th>Brand</th>
														<th>Price</th>
														<th>Discount</th>
														<th>DIscount Amount</th>
														<th>Final Price</th>
														<th>Image</th>
														<th>Quantity</th>
														<th>Action</th>
													</tr>
										        </tfoot>
										    </table>
									</div>
								</div>
								<!-- /product list -->
							</div>
							<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<!-- /product list -->
								<?php
								$outOfStockQuery = $this->db->query("SELECT COUNT(*) as count FROM product WHERE quantity = 0");
								$outOfStockCount = $outOfStockQuery->row()->count;
								?>
								<?php if ($outOfStockCount > 0): ?>
														    <div class="alert alert-danger mx-3 mt-3 text-dark" role="alert">
														        ❌ There are <strong><?php echo $outOfStockCount; ?></strong> out-of-stock products!
														    </div>
														<?php else: ?>
														    <div class="alert alert-success mx-3 mt-3 text-dark" role="alert">
														        ✅ No out-of-stock products at the moment.
														    </div>
														<?php endif; ?>
								<div class="card">
									
									<div class="card-body p-0">
											<table id="outOfStocksTable" class="display">
										        <thead>
										            <tr>
														<th>Id </th>
														<th>Product Name</th>
														<th>Category</th>
														<th>Brand</th>
														<th>Price</th>
														<th>Discount</th>
														<th>DIscount Amount</th>
														<th>Final Price</th>
														<th>Image</th>
														<th>Quantity</th>
														<th>Action</th>
													</tr>
										        </thead>
										        <tbody>
										        	<?php 
										        	$fetchMyProducts = $this->db->query("SELECT * FROM product WHERE quantity = 0");
										        	foreach ($fetchMyProducts->result() as $row) { ?>

										            <tr>
										                <td><?php echo $row->id; ?></td>
										                <td><?php echo $row->product_name; ?></td>
										                <td><?php echo $row->category; ?></td>
										                <td><?php echo $row->brand; ?></td>
										                <td><?php echo $row->price; ?></td>
										                <td><?php echo $row->discount; ?></td>
										                <td><?php echo $row->discount_amount; ?></td>
										                <td><?php echo $row->final_price; ?></td>
										                <td><img src="<?php echo $row->image; ?>" width='50' height='50' alt='Product Image'></td>
										                <td><?php echo $row->quantity; ?></td>
										                <td class="action-table-data">
											                <div class="edit-delete-action">
											                    <a class="me-2 edit-icon p-2" href="<?php echo base_url('view_details?id=' . $row->id); ?>">
											                        <i data-feather="eye" class="action-eye"></i>
											                    </a>
											                    <a class="me-2 p-2" href="<?php echo base_url('edit_details?id=' . $row->id); ?>">
											                        <i data-feather="edit" class="feather-edit"></i>
											                    </a>
											                    <a href="<?php echo base_url('deleteProduct?id=' . $row->id); ?>" class="p-2" onclick="return confirm('Are you sure you want to delete this product?')">
											                        <i data-feather="trash-2" class="feather-trash-2 text-danger"></i>
											                    </a>
											                </div>
										            </td>
										            </tr>
										        <?php } ?>
										        </tbody>
										        <tfoot>
										            <tr>
														<th>Id </th>
														<th>Product Name</th>
														<th>Category</th>
														<th>Brand</th>
														<th>Price</th>
														<th>Discount</th>
														<th>DIscount Amount</th>
														<th>Final Price</th>
														<th>Image</th>
														<th>Quantity</th>
														<th>Action</th>
													</tr>
										        </tfoot>
										    </table>
									</div>
								</div>
								<!-- /product list -->
							</div>
							
						</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

    

<script>
	let lowStocksTable = new DataTable('#lowStocksTable');

	let outOfStocksTableInitialized = false;
	document.getElementById('pills-profile-tab').addEventListener('shown.bs.tab', function (e) {
	    if (!outOfStocksTableInitialized) {
	        new DataTable('#outOfStocksTable');
	        outOfStocksTableInitialized = true;
	    }
	});
</script>
<?php
$this->load->view('master_pages/footer');
?>