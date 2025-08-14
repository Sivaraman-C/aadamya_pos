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
				              <h4 class="fw-bold">Product Details</h4>
				              <h6>Full details of a product</h6>
				            </div>
				          </div>
				          <ul class="table-top-head">
				            <li>
				              <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i class="ti ti-refresh"></i></a>
				            </li>
				            <li>
				              <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i class="ti ti-chevron-up"></i></a>
				            </li>
				          </ul>
				          <div class="page-btn mt-0">
				            <a href="<?php echo base_url('product_list') ?>" class="btn btn-secondary"><i data-feather="arrow-left" class="me-2"></i>Back to Product</a>
				          </div>
				        </div>
					<!-- /add -->
					<div class="row">
						<div class="col-lg-8 col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="bar-code-view">
										<img src="<?php echo base_url(); ?>modules/assets/img/barcode/barcode1.png" alt="barcode">
										<a class="printimg">
											<img src="<?php echo base_url(); ?>modules/assets/img/icons/printer.svg" alt="print">
										</a>
									</div>
									<div class="productdetails">
										<ul class="product-bar">
											<?php if (!empty($product)) { ?>
									            <li>
									                <h4>Product Name</h4>
									                <h6><?= $product->product_name; ?></h6>
									            </li>
									            <li>
									                <h4>Category</h4>
									                <h6><?= $product->category; ?></h6>
									            </li>
									            <li>
									                <h4>Brand</h4>
									                <h6><?= $product->brand; ?></h6>
									            </li>
									            <li>
									                <h4>Quantity</h4>
									                <h6><?= $product->quantity; ?></h6>
									            </li>
									            <li>
									                <h4>Price</h4>
									                <h6><?= $product->unit_price; ?></h6>
									            </li>
									            <li>
									                <h4>Discount %</h4>
									                <h6><?= $product->discount; ?> %</h6>
									            </li>
									            <li>
									                <h4>Discount Amount</h4>
									                <h6><?= $product->discount_amount; ?></h6>
									            </li>
									            <li>
									                <h4>Final Price</h4>
									                <h6><?= $product->final_price; ?></h6>
									            </li>
									        <?php } ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="text-center">
												<?php if (!empty($product)) { ?>
												<img class="img-fluid" style="max-height: 390px;" src="<?php echo $product->image; ?>" />
											<h3><?= $product->product_name; ?></h3>
									<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
						
					<!-- /add -->
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->
		  

		 <?php

    $this->load->view('master_pages/footer');

    ?>