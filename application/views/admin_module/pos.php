<?php 
$this->load->view('master_pages/pos_header'); ?>

<style type="text/css">
            input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button { 
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                margin: 0; 
            }
        </style>			
			
			<div class="page-wrapper pos-pg-wrapper ms-0">
				<div class="content pos-design p-0">

					<div class="row align-items-start pos-wrapper">

						<!-- Products -->
						<div class="col-md-12 col-lg-7 col-xl-8">
							<div class="pos-categories tabs_wrapper pb-0">
								<div class="card pos-button">
									<div class="d-flex align-items-center">
										<a href="javascript:void(0);" class="btn btn-md btn-indigo ms-auto" data-bs-toggle="modal" data-bs-target="#reset"><i class="ti ti-reload me-1"></i>Reset</a>
										<a href="<?php echo base_url('add_product'); ?>" class="btn btn-md btn-primary" ><i class="ti ti-circle-plus me-1"></i>Add Product</a>
									</div>
									
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<h4 class="mb-3">Categories</h4>
								</div>
									
								<ul class="tabs owl-carousel pos-category">

									<li id="all" class="active">
										<a href="javascript:void(0);">
											<img src="<?php echo base_url(); ?>modules/assets/img/products/pos-product-01.png" alt="Categories">
										</a>
										<h6><a href="javascript:void(0);">All Categories</a></h6>
										<span><?php echo $categoryCounts['All'] ?? 0; ?> Items</span>
									</li>
									<li id="Electronics">
										<a href="javascript:void(0);">
											<img src="<?php echo base_url(); ?>modules/assets/img/products/pos-product-08.png" alt="Categories">
										</a>
										<h6><a href="javascript:void(0);">Headset</a></h6>
										<span><?php echo $categoryCounts['Headset'] ?? 0; ?> Items</span>
									</li>
									<li id="Phone">
										<a href="javascript:void(0);">
											<img src="<?php echo base_url(); ?>modules/assets/img/products/pos-product-01.png" alt="Categories">
										</a>
										<h6><a href="javascript:void(0);">Mobile</a></h6>
										<span><?php echo $categoryCounts['Mobile'] ?? 0; ?> Items</span>
									</li>
									<li id="watches">
										<a href="javascript:void(0);">
											<img src="<?php echo base_url(); ?>modules/assets/img/products/pos-product-11.png" alt="Categories">
										</a>
										<h6><a href="javascript:void(0);">Watches</a></h6>
										<span><?php echo $categoryCounts['Watch'] ?? 0; ?> Items</span>
									</li>
									<li id="Computers">
										<a href="javascript:void(0);">
											<img src="<?php echo base_url(); ?>modules/assets/img/products/pos-product-12.png" alt="Categories">
										</a>
										<h6><a href="javascript:void(0);">Laptops</a></h6>
										<span><?php echo $categoryCounts['Laptop'] ?? 0; ?> Items</span>
									</li>
									
								</ul>
								<div class="pos-products">
									<div class="d-flex align-items-center justify-content-between">
										<h4 class="mb-3">Products</h4>
										<div class="input-icon-start pos-search position-relative mb-3">
											<span class="input-icon-addon">
												<i class="ti ti-search"></i>
											</span>
											<input type="text" class="form-control" placeholder="Search Product">
										</div>
									</div>
									<div class="tabs_container">
										<div class="tab_content active" data-tab="all">
										    <div class="row">
										        <?php if (!empty($allproduct)) {
										            foreach ($allproduct as $row) { ?>
										                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
										                    <div class="product-info card select-product"
										                         data-id="<?= $row->id; ?>"
										                         data-name="<?= $row->product_name; ?>"
										                         data-image="<?= base_url('modules/gallery/' . $row->image); ?>"
										                         data-price="<?= $row->unit_price; ?>">
										                        <a href="javascript:void(0);" class="pro-img">
															        <img src="<?= $row->image; ?>" alt="Product" width="100">  <!-- Use base_url here too -->
															        <span><i class="ti ti-circle-check-filled"></i></span>
															    </a>
										                        <h6 class="cat-name"><?= $row->category; ?></h6>
										                        <h6 class="product-name"><?= $row->product_name; ?></h6>
										                        <div class="d-flex align-items-center justify-content-between price">
										                            <span><?= $row->quantity; ?> pcs</span>
										                            <p>$<?= number_format($row->unit_price, 2); ?></p>
										                        </div>
										                    </div>
										                </div>
										        <?php }
										        } else {
										            echo "<p>No products found</p>";
										        } ?>
										    </div>
										</div>
										<div class="tab_content" data-tab="Electronics">
										    <div class="row">
										        <?php if (!empty($electronic)) {
										            foreach ($electronic as $row) { ?>
										                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
										                    <div class="product-info card select-product"
															     data-id="<?php echo $row->id; ?>"
															     data-name="<?php echo $row->product_name; ?>"
															     data-image="<?php echo base_url($row->image); ?>"
															     data-price="<?php echo $row->unit_price; ?>">
															    <a href="javascript:void(0);" class="pro-img">
															        <img src="<?php echo $row->image; ?>" alt="Product" width="100">
															        <span><i class="ti ti-circle-check-filled"></i></span>
															    </a>
															    <h6 class="cat-name"><?php echo $row->category; ?></h6>
															    <h6 class="product-name"><?php echo $row->product_name; ?></h6>
															    <div class="d-flex align-items-center justify-content-between price">
															        <span><?php echo $row->quantity; ?> pcs</span>
															        <p>$<?php echo number_format($row->unit_price, 2); ?></p>
															    </div>
															</div>
										                </div>
										        <?php }
										        } else {
										            echo "<p>No products found</p>";
										        } ?>
										    </div>
										</div>

										<div class="tab_content" data-tab="Phone">
										    <div class="row">
										        <?php if (!empty($phone)) {
										            foreach ($phone as $row) { ?>
										                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
										                    <div class="product-info card select-product"
															     data-id="<?php echo $row->id; ?>"
															     data-name="<?php echo $row->product_name; ?>"
															     data-image="<?php echo base_url($row->image); ?>"
															     data-price="<?php echo $row->unit_price; ?>">
															    <a href="javascript:void(0);" class="pro-img">
															        <img src="<?php echo $row->image; ?>" alt="Product" width="100">
															        <span><i class="ti ti-circle-check-filled"></i></span>
															    </a>
															    <h6 class="cat-name"><?php echo $row->category; ?></h6>
															    <h6 class="product-name"><?php echo $row->product_name; ?></h6>
															    <div class="d-flex align-items-center justify-content-between price">
															        <span><?php echo $row->quantity; ?> pcs</span>
															        <p><i class="fa-solid fa-indian-rupee-sign"></i><?php echo number_format($row->unit_price, 2); ?></p>
															    </div>
															</div>
										                </div>
										        <?php }
										        } else {
										            echo "<p>No products found</p>";
										        } ?>
										    </div>
										</div>

										<div class="tab_content" data-tab="watches">
										    <div class="row">
										        <?php if (!empty($watch)) {
										            foreach ($watch as $row) { ?>
										                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
										                    <div class="product-info card select-product"
															     data-id="<?php echo $row->id; ?>"
															     data-name="<?php echo $row->product_name; ?>"
															     data-image="<?php echo base_url($row->image); ?>"
															     data-price="<?php echo $row->unit_price; ?>">
															    <a href="javascript:void(0);" class="pro-img">
															        <img src="<?php echo $row->image; ?>" alt="Product" width="100">
															        <span><i class="ti ti-circle-check-filled"></i></span>
															    </a>
															    <h6 class="cat-name"><?php echo $row->category; ?></h6>
															    <h6 class="product-name"><?php echo $row->product_name; ?></h6>
															    <div class="d-flex align-items-center justify-content-between price">
															        <span><?php echo $row->quantity; ?> pcs</span>
															        <p><i class="fa-solid fa-indian-rupee-sign"></i><?php echo number_format($row->unit_price, 2); ?></p>
															    </div>
															</div>
										                </div>
										        <?php }
										        } else {
										            echo "<p>No products found</p>";
										        } ?>
										    </div>
										</div>

										<div class="tab_content" data-tab="Computers">
										    <div class="row">
										        <?php if (!empty($laptop)) {
										            foreach ($laptop as $row) { ?>
										                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
										                    <div class="product-info card select-product"
															     data-id="<?php echo $row->id; ?>"
															     data-name="<?php echo $row->product_name; ?>"
															     data-image="<?php echo base_url($row->image); ?>"
															     data-price="<?php echo $row->unit_price; ?>">
															    <a href="javascript:void(0);" class="pro-img">
															        <img src="<?php echo $row->image; ?>" alt="Product" width="100">
															        <span><i class="ti ti-circle-check-filled"></i></span>
															    </a>
															    <h6 class="cat-name"><?php echo $row->category; ?></h6>
															    <h6 class="product-name"><?php echo $row->product_name; ?></h6>
															    <div class="d-flex align-items-center justify-content-between price">
															        <span><?php echo $row->quantity; ?> pcs</span>
															        <p><i class="fa-solid fa-indian-rupee-sign"></i><?php echo number_format($row->unit_price, 2); ?></p>
															    </div>
															</div>
										                </div>
										        <?php }
										        } else {
										            echo "<p>No products found</p>";
										        } ?>
										    </div>
										</div>

									</div>
								</div>
							</div>
						</div>
						<!-- /Products -->

						<!-- Order Details -->
						<div class="col-md-12 col-lg-5 col-xl-4 ps-0 theiaStickySidebar">
							<aside class="product-order-list">
								<div class="customer-info block-section">
								  <h4 class="mb-3">Customer Information</h4>
								  
								  <div class="input-block d-flex align-items-center">
								    <div class="flex-grow-1">
								      <select class="form-select" id="customer-select">
								        <option value="0" data-phone="" data-city="">Walk in Customer</option>
								        <?php
								          $customers = $this->db->get('customer')->result();
								          foreach ($customers as $cust) {
								            echo '<option value="' . $cust->id . '" 
								                        data-phone="' . $cust->contact . '" 
								                        data-city="' . $cust->city . '" 
								                        data-id="' . $cust->id . '" 
								                        data-creationDate="' . $cust->creationDate . '">' . 
								                 htmlspecialchars($cust->name) . 
								                 '</option>';
								          }
								        ?>
								      </select>
								    </div>
								    <a href="#" class="btn btn-primary btn-icon" data-bs-toggle="modal" data-bs-target="#create">
								      <i data-feather="user-plus"></i>
								    </a>
								  </div>

								  <!-- Auto-filled Fields -->

								  <div class="input-block mt-3">
								    <label>Phone</label>
								    <input type="text" id="customer-phone" class="form-control" readonly>
								  </div>

								  <div class="input-block mt-2">
								    <label>City</label>
								    <input type="text" id="customer-city" class="form-control" readonly>
								  </div>
								</div>

								<div class="product-added block-section">
								  <div class="head-text d-flex align-items-center justify-content-between">
								    <h5 class="d-flex align-items-center mb-0">
								      Product Added <span class="count">0</span>
								    </h5>
								    <a href="javascript:void(0);" class="d-flex align-items-center link-danger" id="clear-cart">
								      <span class="me-2"><i data-feather="x" class="feather-16"></i></span>Clear all
								    </a>
								  </div>

								  <div class="product-wrap">
								    <div class="empty-cart">
								      <div class="fs-24 mb-1"><i class="ti ti-shopping-cart"></i></div>
								      <p class="fw-bold">No Products Selected</p>
								    </div>
								    <!-- Products will be appended here -->
								  </div>
								</div>


								<div class="block-section">
									<div class="selling-info">
										<div class="row g-3">
										<!-- GST Select -->
										  <div class="col-12 col-sm-4">
										    <label class="form-label">Order Tax</label>
										    <select id="gst-select" class="form-select">
										      <option value="select">Select</option>
										      <option value="5">GST 5%</option>
										      <option value="10">GST 10%</option>
										      <option value="15">GST 15%</option>
										      <option value="20">GST 20%</option>
										      <option value="25">GST 25%</option>
										      <option value="30">GST 30%</option>
										    </select>
										  </div>

										  <!-- Shipping Select -->
										  <div class="col-12 col-sm-4">
										    <label class="form-label">Shipping</label>
										    <select id="shipping-select" class="form-select">
										      <option value="0">0</option>
										      <option value="15">15</option>
										      <option value="20">20</option>
										      <option value="25">25</option>
										      <option value="30">30</option>
										    </select>
										  </div>

										  <!-- Discount Select -->
										  <div class="col-12 col-sm-4">
										    <label class="form-label">Discount</label>
										    <select id="discount-select" class="form-select">
										      <option value="0%">0%</option>
										      <option value="5">5%</option>
										      <option value="10">10%</option>
										      <option value="15">15%</option>
										      <option value="20">20%</option>
										      <option value="25">25%</option>
										      <option value="30">30%</option>
										    </select>
										  </div>
										</div>
									</div>
									<div class="order-total">
										<table class="table table-responsive table-borderless">
											<tr>
											    <td>Sub Total</td>
											    <td class="text-end">₹<span id="sub-total">0.00</span></td>
											  </tr>
											  <tr>
											    <td id="gst-label">Tax (GST 0%)</td>
											    <td class="text-end">₹<span id="gst-amount">0.00</span></td>
											  </tr>
											  <tr>
											    <td>Shipping</td>
											    <td class="text-end">₹<span id="shipping-amount">0.00</span></td>
											  </tr>
											  <tr>
											    <td class="text-danger">Discount</td>
											    <td class="text-danger text-end">- ₹<span id="discount-amount">0.00</span></td>
											  </tr>
											  <tr>
											    <td><h2>Grand Total</h2></td>
											    <td class="text-end">₹<span id="grand-total">0.00</span></td>
											  </tr>
										</table>
									</div>
								</div>
								<div class="block-section payment-method">
									<h4>Payment Method</h4>
									<div class="row align-items-center justify-content-center methods g-3">
										<div class="col-sm-6 col-md-4">
											<a href="javascript:void(0);" class="payment-item" data-bs-toggle="modal" data-bs-target="#payment-cash">
												<img src="<?php echo base_url(); ?>modules/assets/img/icons/cash-icon.svg" class="me-2" alt="img">
												<span>Cash</span>
											</a>
										</div>
										<div class="col-sm-6 col-md-4">
											<a href="javascript:void(0);" class="payment-item" data-bs-toggle="modal" data-bs-target="#payment-card">
												<img src="<?php echo base_url(); ?>modules/assets/img/icons/card.svg" class="me-2" alt="img">
												<span>Debit Card</span>
											</a>
										</div>
										<div class="col-sm-6 col-md-4">
											<a href="javascript:void(0);" class="payment-item" data-bs-toggle="modal" data-bs-target="#scan-payment">
												<img src="<?php echo base_url(); ?>modules/assets/img/icons/scan-icon.svg" class="me-2" alt="img">
												<span>Scan</span>
											</a>
										</div>
									</div>
								</div>
								<div class="btn-row d-sm-flex align-items-center justify-content-between">
									<a href="javascript:void(0);" class="btn btn-purple d-flex align-items-center justify-content-center flex-fill" data-bs-toggle="modal" data-bs-target="#hold-order"><i  class="ti ti-player-pause me-1"></i>Hold</a>
									<a href="javascript:void(0);" class="btn btn-danger d-flex align-items-center justify-content-center flex-fill"><i  class="ti ti-trash me-1"></i>Void</a>
									<a href="javascript:void(0);" class="btn btn-success d-flex align-items-center justify-content-center flex-fill" data-bs-toggle="modal" data-bs-target="#payment-completed"><i  class="ti ti-cash-banknote me-1"></i>Payment</a>
								</div>
							</aside>
						</div>
						<!-- /Order Details -->

					</div>
				</div>
			</div>

		</div>
		<!-- /Main Wrapper -->

		<!-- Payment Completed -->
		<div class="modal fade modal-default" id="payment-completed" aria-labelledby="payment-completed">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body p-0">
						<div class="success-wrap text-center">
							<form action="<?php echo base_url('Pointofsales') ?>">
								<div class="icon-success bg-success text-white mb-2">
									<i class="ti ti-check"></i>
								</div>
								<h3 class="mb-2">Payment Completed</h3>
								<p class="mb-3">Do you want to Print Receipt for the Completed Order</p>
								<div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
<button type="button" class="btn btn-md btn-secondary"
    onclick="generateInvoiceNumber(); showReceipt(); saveOrderFromReceipt();">
    Print Receipt <i class="feather-arrow-right-circle icon-me-5"></i>
</button>

									<button type="submit" class="btn btn-md btn-primary">Next Order</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Payment Completed -->

		<!-- Print Receipt -->
		<div class="modal fade modal-default" id="print-receipt" aria-labelledby="print-receipt">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
      	<div id="print-section">
        <div class="icon-head text-center">
          <a href="javascript:void(0);">
            <img src="<?php echo base_url(); ?>modules/assets/img/logo.svg" width="100" height="30" alt="Receipt Logo">
          </a>
        </div>
        <div class="text-center info text-center">
          <h6>Dreamguys Technologies Pvt Ltd.,</h6>
          <p class="mb-0"><strong>Phone Number:</strong> <span id="receipt-phone">-</span></p>
          <p class="mb-0">Email: support@example.com</p>
        </div>
        <div class="tax-invoice">
          <h6 class="text-center">Tax Invoice</h6>
          <div class="row">
<div class="col-sm-12 col-md-6">
  <div class="invoice-user-name"><span>Name: </span><span id="receipt-customer">Walk-in</span></div>
  <div class="invoice-user-name"><span>Invoice No: </span><span id="receipt-transaction">#00000</span></div>
</div>
            <div class="col-sm-12 col-md-6">
			  <div class="invoice-user-name"><span>Customer Id: </span>#CUS00<span id="receipt-id"></span></div>
			  <div class="invoice-user-name"><span>Contact: </span><span id="receipt-contact"></span></div>
			  <div class="invoice-user-name"><span>Date: </span><span id="receipt-date"></span></div>
			</div>
          </div>
        </div>
        <table class="table-borderless w-100 table-fit">
          <thead>
            <tr>
              <th># Item</th>
              <th>Price</th>
              <th>Qty</th>
              <th class="text-end">Total</th>
            </tr>
          </thead>
          <tbody id="receipt-products">
          </tbody>
          <tr>
            <td colspan="4">
              <table class="table-borderless w-100 table-fit">
                <tr>
                  <td class="fw-bold">Sub Total :</td>
                  <td class="text-end">₹<span id="receipt-subtotal">0.00</span></td>
                </tr>
                <tr>
                  <td class="fw-bold">Discount :</td>
                  <td class="text-end">- ₹<span id="receipt-discount">0.00</span></td>
                </tr>
                <tr>
                  <td class="fw-bold">Shipping :</td>
                  <td class="text-end">₹<span id="receipt-shipping">0.00</span></td>
                </tr>
                <tr>
                  <td class="fw-bold">Tax :</td>
                  <td class="text-end">₹<span id="receipt-tax">0.00</span></td>
                </tr>
                <tr>
                  <td class="fw-bold">Total Payable :</td>
                  <td class="text-end">₹<span id="receipt-grandtotal">0.00</span></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
    </div>
        <div class="text-center invoice-bar">
          <div class="border-bottom border-dashed">
            <p>**VAT against this challan is payable through central registration. Thank you for your business!</p>
          </div>
          <a href="javascript:void(0);">
            <img src="<?php echo base_url(); ?>modules/assets/img/barcode/barcode-03.jpg" alt="Barcode">
          </a>
          <p class="text-dark fw-bold">Sale</p>
          <p>Thank You For Shopping With Us. Please Come Again</p>
          
        </div>
        <div class="text-center invoice-bar">
          
          <a href="javascript:void(0);" id="printReceiptBtn" class="btn btn-md btn-primary" onclick="printReceipt()">Print Receipt</a>
        </div>
      </div>
    </div>
  </div>
</div>
		<!-- /Print Receipt -->

		

		<div class="modal fade" id="create" tabindex="-1" aria-labelledby="create"  aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" >Create Customer</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<form action="<?php echo base_url('createCustomer') ?>" method="POST" enctype="multipart/form-data">
						<div class="modal-body pb-1">
							<div class="row">
								<div class="col-lg-6 col-sm-12 col-12">
									<div class="mb-3">
										<label class="form-label">Customer Name <span class="text-danger">*</span></label>
										<input type="text" id="cus_name" name="customerName" class="form-control">
									</div>
								</div>
								<div class="col-lg-6 col-sm-12 col-12">
									<div class="mb-3">
										<label class="form-label">Phone <span class="text-danger">*</span></label>
										<input type="number" id="contact" name="Contact" class="form-control" onkeypress="if(this.value.length === 10)return false;">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Address</label>
										<input type="text" id="address" name="Address" class="form-control">
									</div>
								</div>
								<div class="col-lg-6 col-sm-12 col-12">
									<div class="mb-3">
										<label class="form-label">City</label>
										<input type="text" id="city" name="City" class="form-control">
									</div>
								</div>
								<div class="col-lg-6 col-sm-12 col-12">
									<div class="mb-3">
										<label class="form-label">Country</label>
										<input type="text" id="country" name="Country" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer d-flex justify-content-end gap-2 flex-wrap">
							<button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" name="addCustomer" class="btn btn-md btn-primary">Submit</button>
						</div>
					</form>					
				</div>
			</div>
		</div>



		<!-- Edit Product -->
		<div class="modal fade modal-default pos-modal" id="edit-product" aria-labelledby="edit-product">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Product</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<form action="pos-2.html">
						<div class="modal-body pb-1">
							<div class="row">
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Product Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" value="Red Nike Laser Show" disabled>
									</div>
								</div>
								<div class="col-lg-6 col-sm-12 col-12">
									<div class="mb-3">
										<label class="form-label">Product Price <span class="text-danger">*</span></label>
										<div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="fa-solid fa-indian-rupee-sign"></i>
											</span>
											<input type="text" class="form-control" value="1800">
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-12 col-12">
									<div class="mb-3">
										<label class="form-label">Tax Type <span class="text-danger">*</span></label>
										<select class="select">
											<option>Exclusive</option>
											<option>Inclusive</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6 col-sm-12 col-12">
									<div class="mb-3">
										<label class="form-label">Tax <span class="text-danger">*</span></label>
										<div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="ti ti-percentage"></i>
											</span>
											<input type="text" class="form-control" value="15">
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-12 col-12">
									<div class="mb-3">
										<label class="form-label">Discount Type <span class="text-danger">*</span></label>
										<select class="select">
											<option>Percentage</option>
											<option>Early payment discounts</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6 col-sm-12 col-12">
									<div class="mb-3">
										<label class="form-label">Discount <span class="text-danger">*</span></label>
										<input type="text" class="form-control" value="15">
									</div>
								</div>
								<div class="col-lg-6 col-sm-12 col-12">
									<div class="mb-3">
										<label class="form-label">Sale Unit <span class="text-danger">*</span></label>
										<select class="select">
											<option>Kilogram</option>
											<option>Grams</option>
										</select>
									</div>
								</div>
							</div>	
						</div>										
						<div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
							<button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
						   <button type="submit" class="btn btn-md btn-primary">Submit</button>
					   </div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Edit Product -->

		<!-- Delete Product -->
		<div class="modal fade modal-default" id="delete" aria-labelledby="payment-completed">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body p-0">
						<div class="success-wrap text-center">
							<form action="pos-2.html">
								<div class="icon-success bg-danger-transparent text-danger mb-2">
									<i class="ti ti-trash"></i>
								</div>
								<h3 class="mb-2">Are you Sure!</h3>
								<p class="fs-16 mb-3">The current order will be deleted as no payment has been made so far.
								</p>
								<div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
									<button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">No, Cancel</button>
									<button type="submit" class="btn btn-md btn-primary">Yes, Delete</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Delete Product -->

		<!-- Reset -->
		<div class="modal fade modal-default" id="reset" aria-labelledby="payment-completed">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body p-0">
						<div class="success-wrap text-center">
							<form action="pos-2.html">
								<div class="icon-success bg-purple-transparent text-purple mb-2">
									<i class="ti ti-transition-top"></i>
								</div>
								<h3 class="mb-2">Confirm Your Action</h3>
								<p class="fs-16 mb-3">The current order will be cleared. But not deleted if it's persistent. Would you like to proceed ?</p>
								<div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
									<button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">No, Cancel</button>
									<a href="<?php echo base_url('Pointofsales') ?>" type="submit" class="btn btn-md btn-primary">Yes, Proceed</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Reset -->

		<!-- Scan -->
		<div class="modal fade modal-default" id="scan-payment">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body p-0">
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<div class="success-wrap scan-wrap text-center">
							<h5><span class="text-gray-6">Amount to Pay : ₹ <span id="scanner-total">0.00</span></span> </h5>
							<div class="scan-img">
								<img src="<?php echo base_url(); ?>modules/assets/img/icons/scan-img.svg" alt="img">
							</div>
							<p class="mb-3">Scan your Phone or UPI App to Complete the payment</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Scan -->

		<!-- Payment Cash -->
		<div class="modal fade modal-default" id="payment-cash">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Cash Payment</h5>
					   <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						   <span aria-hidden="true">×</span>
					   </button>
				   </div>
					<form action="<?php echo base_url('Pointofsales')?>">
					  <div class="modal-body pb-1">
					    <div class="row">
					      <!-- Received Amount -->
					      <div class="col-md-4">
					        <div class="mb-3">
					          <label class="form-label">Received Amount <span class="text-danger">*</span></label>
					          <div class="input-icon-start position-relative">
					            <span class="input-icon-addon text-gray-9">
					              <i class="fa-solid fa-indian-rupee-sign"></i>
					            </span>
					            <input type="number" class="form-control" id="received-amount" placeholder="Enter amount received">
					          </div>
					        </div>
					      </div>

					      <!-- Paying Amount -->
					      <div class="col-md-4">
					        <div class="mb-3">
					          <label class="form-label">Paying Amount <span class="text-danger">*</span></label>
					          <div class="input-icon-start position-relative">
					            <span class="input-icon-addon text-gray-9">
					              <i class="fa-solid fa-indian-rupee-sign"></i>
					            </span>
					            <input type="text" class="form-control" id="cashpay-total" value="0.00" readonly>
					          </div>
					        </div>
					      </div>

					      <!-- Change / Balance -->
					      <div class="col-md-4">
					        <div class="mb-3">
					          <label class="form-label">Change</label>
					          <div class="input-icon-start position-relative">
					            <span class="input-icon-addon text-gray-9">
					              <i class="fa-solid fa-indian-rupee-sign"></i>
					            </span>
					            <input type="text" class="form-control" id="balance-amount" value="0.00" readonly>
					          </div>
					        </div>
					      </div>
					    </div>
					  </div>

					  <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
					    <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
					    <button type="button" class="btn btn-md btn-primary" onclick="handleSubmit()">Submit</button>

					  </div>
					</form>

				</div>
			</div>
		</div>
		<!-- /Payment Cash  -->

		<!-- Payment Card  -->
		<div class="modal fade modal-default" id="payment-card">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Finalize Sale</h5>
					   <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						   <span aria-hidden="true">×</span>
					   </button>
				   </div>
				   <form action="pos-2.html">
						<div class="modal-body pb-1">
							<div class="row">
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label">Received Amount <span class="text-danger">*</span></label>
										<div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="fa-solid fa-indian-rupee-sign"></i>
											</span>
											<input type="text" class="form-control" value="1800">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="mb-3">
										<label class="form-label">Paying Amount <span class="text-danger">*</span></label>
										<div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="fa-solid fa-indian-rupee-sign"></i>
											</span>
											<input type="text" class="form-control" value="1800">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="change-item mb-3">
										<label class="form-label">Change</label>
										<div class="input-icon-start position-relative">
											<span class="input-icon-addon text-gray-9">
												<i class="fa-solid fa-indian-rupee-sign"></i>
											</span>
											<input type="text" class="form-control" value="0.00">
										</div>
									</div>
									<div class="point-item mb-3">
										<label class="form-label">Balance Point</label>
										<input type="text" class="form-control" value="200">
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Payment Type <span class="text-danger">*</span></label>
										<select class="select select-payment">
											<option value="credit" selected>Credit Card</option>
											<option value="cash">Cash</option>
											<option value="cheque">Cheque</option>
											<option value="deposit">Deposit</option>
											<option value="points">Points</option>
										</select>
									</div>
									<div class="quick-cash payment-content bg-light  mb-3">
										<div class="d-flex align-items-center flex-wra gap-4">
											<h5 class="text-nowrap">Quick Cash</h5>
											<div class="d-flex align-items-center flex-wrap gap-3">
												<div class="form-check">
													<input type="radio" class="btn-check" name="cash" id="cash11" checked>
													<label class="btn btn-white" for="cash11">10</label>
												</div>
												<div class="form-check">
													<input type="radio" class="btn-check" name="cash" id="cash12">
													<label class="btn btn-white" for="cash12">20</label>
												</div>
												<div class="form-check">
													<input type="radio" class="btn-check" name="cash" id="cash13">
													<label class="btn btn-white" for="cash13">50</label>
												</div>
												<div class="form-check">
													<input type="radio" class="btn-check" name="cash" id="cash14">
													<label class="btn btn-white" for="cash14">100</label>
												</div>
												<div class="form-check">
													<input type="radio" class="btn-check" name="cash" id="cash15">
													<label class="btn btn-white" for="cash15">500</label>
												</div>
												<div class="form-check">
													<input type="radio" class="btn-check" name="cash" id="cash16">
													<label class="btn btn-white" for="cash16">1000</label>
												</div>
											</div>
										</div>
									</div>
									<div class="point-wrap payment-content mb-3">
										<div class=" bg-success-transparent d-flex align-items-center justify-content-between flex-wrap p-2 gap-2 br-5">
											<h6 class="fs-14 fw-bold text-success">You have 2000 Points to Use</h6>
											<a href="javascript:void(0);" class="btn btn-dark btn-md">Use for this Purchase</a>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Payment Receiver</label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Payment Note</label>
										<textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Sale Note</label>
										<textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label">Staff Note</label>
										<textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
									</div>
								</div>
							</div>							
						</div>
						<div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
							<button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-md btn-primary">Submit</button>
						</div>
				   </form>
				</div>
			</div>
		</div>
		<!-- /Payment Card  -->

		 <!-- Calculator -->
		<div class="modal fade pos-modal" id="calculator" tabindex="-1"  aria-hidden="true">
			<div class="modal-dialog modal-md modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body p-0">
						<div class="calculator-wrap">
							<div class="p-3">
								<div class="d-flex align-items-center">
									<h3>Calculator</h3>
									<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>							
								<div>
									<input class="input" type="text" placeholder="0" readonly>
								</div>
							</div>
							<div class="calculator-body d-flex justify-content-between">
								<div class="text-center">
									<button class="btn btn-clear" onclick="if (!window.__cfRLUnblockHandlers) return false; clr()" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">C</button>
									<button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('7')" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">7</button>
									<button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('4')" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">4</button>
									<button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('1')" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">1</button>
									<button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis(',')" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">,</button>
								</div>
								<div class="text-center">
									<button class="btn btn-expression" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('/')" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">÷</button>
									<button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('8')" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">8</button>
									<button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('5')" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">5</button>
									<button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('2')" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">2</button>
									<button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('0')" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">0</button>									
								</div>
								<div class="text-center">
									<button class="btn btn-expression" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('%')" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">%</button>
									<button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('9')" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">9</button>
									<button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('6')" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">6</button>
									<button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('3')" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">3</button>
									<button class="btn btn-number" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('.')" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">.</button>									
								</div>
								<div class="text-center">
									<button class="btn btn-clear" onclick="if (!window.__cfRLUnblockHandlers) return false; back()" data-cf-modified-f19eba6cac2c5bdf6aa2d583-=""><i class="ti ti-backspace"></i></button>
									<button class="btn btn-expression" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('*')" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">x</button>
									<button class="btn btn-expression" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('-')" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">-</button>
									<button class="btn btn-expression" onclick="if (!window.__cfRLUnblockHandlers) return false; dis('+')" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">+</button>
									<button class="btn btn-clear" onclick="if (!window.__cfRLUnblockHandlers) return false; solve()" data-cf-modified-f19eba6cac2c5bdf6aa2d583-="">=</button>									
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Calculator -->

		<!-- Cash Register Details -->
		<div class="modal fade pos-modal" id="cash-register" tabindex="-1"  aria-hidden="true">
			<div class="modal-dialog modal-md modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						 <h5 class="modal-title">Cash Register Details</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="table-responsive">
							<table class="table table-striped border">
								<tr>
									<td>Cash in Hand</td>
									<td class="text-gray-9 fw-medium text-end">$45689</td>
								</tr>
								<tr>
									<td>Total Sale Amount</td>
									<td class="text-gray-9 fw-medium text-end">$565597.88</td>
								</tr>
								<tr>
									<td>Total Payment</td>
									<td class="text-gray-9 fw-medium text-end">$566867.97</td>
								</tr>
								<tr>
									<td>Cash Payment</td>
									<td class="text-gray-9 fw-medium text-end">$3355.84</td>
								</tr>
								<tr>
									<td>Total Sale Return</td>
									<td class="text-gray-9 fw-medium text-end">$1959</td>
								</tr>
								<tr>
									<td>Total Expense</td>
									<td class="text-gray-9 fw-medium text-end">$0</td>
								</tr>
								<tr>
									<td class="text-gray-9 fw-bold bg-secondary-transparent">Total Cash</td>
									<td class="text-gray-9 fw-bold text-end bg-secondary-transparent">$587130.97</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="modal-footer d-flex justify-content-end gap-2 flex-wrap">
						<button type="button" class="btn btn-md btn-primary" data-bs-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /Cash Register Details -->

		<!-- Today's Sale -->
		<div class="modal fade pos-modal" id="today-sale" tabindex="-1"  aria-hidden="true">
			<div class="modal-dialog modal-md modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						 <h5 class="modal-title">Today's Sale</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="table-responsive">
							<table class="table table-striped border">
								<tr>
									<td>Total Sale Amount</td>
									<td class="text-gray-9 fw-medium text-end">$565597.88</td>
								</tr>
								<tr>
									<td>Cash Payment</td>
									<td class="text-gray-9 fw-medium text-end">$3355.84</td>
								</tr>
								<tr>
									<td>Credit Card Payment</td>
									<td class="text-gray-9 fw-medium text-end">$1959</td>
								</tr>
								<tr>
									<td>Cheque Payment:</td>
									<td class="text-gray-9 fw-medium text-end">$0</td>
								</tr>
								<tr>
									<td>Deposit Payment</td>
									<td class="text-gray-9 fw-medium text-end">$565597.88</td>
								</tr>
								<tr>
									<td>Points Payment</td>
									<td class="text-gray-9 fw-medium text-end">$3355.84</td>
								</tr>
								<tr>
									<td>Gift Card Payment</td>
									<td class="text-gray-9 fw-medium text-end">$565597.88</td>
								</tr>
								<tr>
									<td>Scan & Pay</td>
									<td class="text-gray-9 fw-medium text-end">$3355.84</td>
								</tr>
								<tr>
									<td>Pay Later</td>
									<td class="text-gray-9 fw-medium text-end">$3355.84</td>
								</tr>
								<tr>
									<td>Total Payment</td>
									<td class="text-gray-9 fw-medium text-end">$565597.88</td>
								</tr>
								<tr>
									<td>Total Sale Return</td>
									<td class="text-gray-9 fw-medium text-end">$565597.88</td>
								</tr>
								<tr>
									<td>Total Expense:</td>
									<td class="text-gray-9 fw-medium text-end">$565597.88</td>
								</tr>
								<tr>
									<td class="text-gray-9 fw-bold bg-secondary-transparent">Total Cash</td>
									<td class="text-gray-9 fw-bold text-end bg-secondary-transparent">$587130.97</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="modal-footer d-flex justify-content-end gap-2 flex-wrap">
						<button type="button" class="btn btn-md btn-primary" data-bs-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /Today's Sale -->

		<!-- Today's Profit -->
		<div class="modal fade pos-modal" id="today-profit" tabindex="-1"  aria-hidden="true">
			<div class="modal-dialog modal-md modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						 <h5 class="modal-title">Today's Profit</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row justify-content-center g-3 mb-3">
							<div class="col-lg-4 col-md-6 d-flex">
								<div class="border border-success bg-success-transparent br-8 p-3 flex-fill">
									<p class="fs-16 text-gray-9 mb-1">Total Sale</p>
									<h3 class="text-success">$89954</h3>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 d-flex">
								<div class="border border-danger bg-danger-transparent br-8 p-3 flex-fill">
									<p class="fs-16 text-gray-9 mb-1">Expense</p>
									<h3 class="text-danger">$89954</h3>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 d-flex">
								<div class="border border-info bg-info-transparent br-8 p-3 flex-fill">
									<p class="fs-16 text-gray-9 mb-1">Total Profit	</p>
									<h3 class="text-info">$2145</h3>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-striped border">
								<tr>
									<td>Product Revenue</td>
									<td class="text-gray-9 fw-medium text-end">$565597.88</td>
								</tr>
								<tr>
									<td>Product Cost</td>
									<td class="text-gray-9 fw-medium text-end">$3355.84</td>
								</tr>
								<tr>
									<td>Expense</td>
									<td class="text-gray-9 fw-medium text-end">$1959</td>
								</tr>
								<tr>
									<td>Total Stock Adjustment</td>
									<td class="text-gray-9 fw-medium text-end">$0</td>
								</tr>
								<tr>
									<td>Deposit Payment</td>
									<td class="text-gray-9 fw-medium text-end">$565597.88</td>
								</tr>
								<tr>
									<td>Total Purchase Shipping Cost</td>
									<td class="text-gray-9 fw-medium text-end">$3355.84</td>
								</tr>
								<tr>
									<td>Total Sell Discount</td>
									<td class="text-gray-9 fw-medium text-end">$565597.88</td>
								</tr>
								<tr>
									<td>Total Sell Return</td>
									<td class="text-gray-9 fw-medium text-end">$3355.84</td>
								</tr>
								<tr>
									<td>Closing Stock</td>
									<td class="text-gray-9 fw-medium text-end">$3355.84</td>
								</tr>
								<tr>
									<td>Total Sales</td>
									<td class="text-gray-9 fw-medium text-end">$565597.88</td>
								</tr>
								<tr>
									<td>Total Sale Return</td>
									<td class="text-gray-9 fw-medium text-end">$565597.88</td>
								</tr>
								<tr>
									<td>Total Expense</td>
									<td class="text-gray-9 fw-medium text-end">$565597.88</td>
								</tr>
								<tr>
									<td class="text-gray-9 fw-bold bg-secondary-transparent">Total Cash</td>
									<td class="text-gray-9 fw-bold text-end bg-secondary-transparent">$587130.97</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="modal-footer d-flex justify-content-end gap-2 flex-wrap">
						<button type="button" class="btn btn-md btn-primary" data-bs-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /Today's Profit -->
		
		<!-- jQuery -->
		<!-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
		<script src="<?php echo base_url(); ?>modules/assets/js/jquery-3.7.1.min.js" type="f19eba6cac2c5bdf6aa2d583-text/javascript"></script>

		<!-- Feather Icon JS -->
		<script src="<?php echo base_url(); ?>modules/assets/js/feather.min.js" type="f19eba6cac2c5bdf6aa2d583-text/javascript"></script>

		<!-- Slimscroll JS -->
		<script src="<?php echo base_url(); ?>modules/assets/js/jquery.slimscroll.min.js" type="f19eba6cac2c5bdf6aa2d583-text/javascript"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="<?php echo base_url(); ?>modules/assets/js/bootstrap.bundle.min.js" type="f19eba6cac2c5bdf6aa2d583-text/javascript"></script>

		<!-- Datatable JS -->
		<script src="<?php echo base_url(); ?>modules/assets/js/jquery.dataTables.min.js" type="f19eba6cac2c5bdf6aa2d583-text/javascript"></script>
		<script src="<?php echo base_url(); ?>modules/assets/js/dataTables.bootstrap5.min.js" type="f19eba6cac2c5bdf6aa2d583-text/javascript"></script>

		<!-- Daterangepikcer JS -->
		<script src="<?php echo base_url(); ?>modules/assets/js/moment.min.js" type="f19eba6cac2c5bdf6aa2d583-text/javascript"></script>
		<script src="<?php echo base_url(); ?>modules/assets/plugins/daterangepicker/daterangepicker.js" type="f19eba6cac2c5bdf6aa2d583-text/javascript"></script>

		<!-- Owl JS -->
		<script src="<?php echo base_url(); ?>modules/assets/plugins/owlcarousel/owl.carousel.min.js" type="f19eba6cac2c5bdf6aa2d583-text/javascript"></script>

		<!-- Select2 JS -->
		<script src="<?php echo base_url(); ?>modules/assets/plugins/select2/js/select2.min.js" type="f19eba6cac2c5bdf6aa2d583-text/javascript"></script>

		<!-- Sticky-sidebar -->
		<script src="<?php echo base_url(); ?>modules/assets/plugins/theia-sticky-sidebar/ResizeSensor.js" type="f19eba6cac2c5bdf6aa2d583-text/javascript"></script>
		<script src="<?php echo base_url(); ?>modules/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js" type="f19eba6cac2c5bdf6aa2d583-text/javascript"></script>

		<!-- Color Picker JS -->
		<script src="<?php echo base_url(); ?>modules/assets/plugins/@simonwep/pickr/pickr.es5.min.js" type="f19eba6cac2c5bdf6aa2d583-text/javascript"></script>
		
		<!-- Custom JS -->
		<script src="<?php echo base_url(); ?>modules/assets/js/theme-colorpicker.js" type="f19eba6cac2c5bdf6aa2d583-text/javascript"></script>
		<script src="<?php echo base_url(); ?>modules/assets/js/calculator.js" type="f19eba6cac2c5bdf6aa2d583-text/javascript"></script>
		<script>const saveOrderUrl = "<?= base_url('save_order_with_items') ?>";</script>
		<script src="<?php echo base_url(); ?>modules/assets/js/script.js" type="f19eba6cac2c5bdf6aa2d583-text/javascript"></script>
	
	<script src="<?php echo base_url(); ?>modules/assets/js/rocket-loader.min.js" data-cf-settings="f19eba6cac2c5bdf6aa2d583-|49" defer></script>

<script>
	

document.addEventListener('DOMContentLoaded', () => {
  const paymentBtn = document.querySelector('[data-bs-target="#payment-completed"]');

  if (paymentBtn) {
    paymentBtn.addEventListener('click', function (e) {
      const productEls = document.querySelectorAll('.product-list');

      if (productEls.length === 0) {
        e.preventDefault();
        alert("No products added to the order.");
        window.location.href = "<?php echo base_url('Pointofsales'); ?>"; // Adjust if needed
        return;
      }

      // Generate Invoice Number
      const invoiceNumber = generateInvoiceNumber();

      // Get customer and totals
      const customerSelect = document.getElementById('customer-select');
      const selectedOption = customerSelect.options[customerSelect.selectedIndex];
      const customerName = selectedOption.text;
      const customerPhone = document.getElementById('customer-phone').value;
      const customerCity = document.getElementById('customer-city').value;

      // Fetch from data attributes
      const customerId = selectedOption.getAttribute('data-id');
      const customerCreated = selectedOption.getAttribute('data-created') || new Date().toLocaleDateString();

      const subTotal = parseFloat(document.getElementById('sub-total').innerText) || 0;
      const tax = parseFloat(document.getElementById('gst-amount').innerText) || 0;
      const shipping = parseFloat(document.getElementById('shipping-amount').innerText) || 0;
      const discount = parseFloat(document.getElementById('discount-amount').innerText) || 0;
      const grandTotal = parseFloat(document.getElementById('grand-total').innerText) || 0;


      document.getElementById('receipt-customer').innerText = customerName;
      document.getElementById('receipt-phone').innerText = customerPhone;
      document.getElementById('receipt-id').innerText = customerId;
      document.getElementById('receipt-contact').innerText = customerPhone;
      document.getElementById('receipt-date').innerText = new Date(customerCreated).toLocaleDateString();
      document.getElementById('receipt-subtotal').innerText = subTotal.toFixed(2);
      document.getElementById('receipt-discount').innerText = discount.toFixed(2);
      document.getElementById('receipt-shipping').innerText = shipping.toFixed(2);
      document.getElementById('receipt-tax').innerText = tax.toFixed(2);
      document.getElementById('receipt-grandtotal').innerText = grandTotal.toFixed(2);
      document.getElementById('receipt-due').innerText = '0.00';
      document.getElementById('receipt-transaction').innerText = data.invoice_number;

      // Show receipt modal
      const receiptModal = new bootstrap.Modal(document.getElementById('print-receipt'));
      receiptModal.show();

      // Prepare order data
const orderData = {
  invoice_number: invoiceNumber,  // This should be passed correctly
  customer_id: customerId,
  customer_name: customerName,
  customer_phone: customerPhone,
  customer_city: customerCity,
  products: products,
  subtotal: subTotal,
  discount: discount,
  shipping: shipping,
  tax: tax,
  grand_total: grandTotal
};

console.log('Order Data:', orderData);  // Log the data before sending

// Send the data to the backend (AJAX request)
fetch("<?php echo base_url('Pointofsales/save_invoice'); ?>", {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
  },
  body: JSON.stringify(orderData)
})
.then(response => response.json())
.then(data => {
  if (data.success) {
    console.log('Invoice saved successfully');
    document.getElementById('receipt-transaction').innerText = data.invoice_number; // Display invoice number in modal
  } else {
    console.error('Error saving invoice:', data.message);
  }
})
.catch(error => console.error('Error:', error));
    });
  }

  // Generate Invoice Number (Format: INV-YYYYMMDD-XXXX)
  function generateInvoiceNumber() {
  const date = new Date();
  const yyyy = date.getFullYear();
  const mm = String(date.getMonth() + 1).padStart(2, '0');
  const dd = String(date.getDate()).padStart(2, '0');
  const randomNum = Math.floor(Math.random() * 9000) + 1000; // Random 4-digit number

  const invoiceNumber = `INV-${yyyy}${mm}${dd}-${randomNum}`;
  console.log('Generated Invoice Number:', invoiceNumber); // Log here
  return invoiceNumber;
}

  // Populate phone and city when customer is selected
  const customerSelect = document.getElementById('customer-select');
  const phoneInput = document.getElementById('customer-phone');
  const cityInput = document.getElementById('customer-city');

  if (customerSelect) {
    customerSelect.addEventListener('change', function () {
      const selectedOption = customerSelect.options[customerSelect.selectedIndex];
      const phone = selectedOption.getAttribute('data-phone');
      const city = selectedOption.getAttribute('data-city');
      const customerId = selectedOption.getAttribute('data-id');
      const customerCreated = selectedOption.getAttribute('data-created');

      phoneInput.value = phone || '';
      cityInput.value = city || '';

      // Optional: Update customer information on selection (for display in receipt or other parts)
      document.getElementById('receipt-id').innerText = customerId || "N/A";
      document.getElementById('receipt-contact').innerText = phone || "N/A";
      document.getElementById('receipt-date').innerText = customerCreated ? new Date(customerCreated).toLocaleDateString() : new Date().toLocaleDateString();
    });
  }
});

</script>

</body>
</html>