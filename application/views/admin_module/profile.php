<?php 
	$this->load->view('master_pages/header');
	$this->load->view('master_pages/sidebar');
 ?>

<!-- Main Wrapper -->
<div class="main-wrapper">
	<div class="page-wrapper">
		<div class="content">
			<div class="page-header">
				<div class="page-title">
					<h4>
						Profile
					</h4>
					<h6>
						User Profile
					</h6>
				</div>
			</div>
			<!-- /product list -->
				<div class="card">
					<div class="card-header">
						<h4>
							Profile
						</h4>
					</div>
					<div class="card-body profile-body">
						<h5 class="mb-2">
							<i class="ti ti-user text-primary me-1">
							</i>
							Basic Information
						</h5>
						<div class="profile-pic-upload image-field">
							<div id="ImageUpload" class="accordion-collapse collapse show" aria-labelledby="headingSpacingThree">
								<div class="accordion-body border-top">
									<div class="text-editor add-list add">
										<div class="col-lg-12">
											<div class="add-choosen">
												<div class="mb-3">
													<div class="image-upload image-upload-two">
														<input type="file" id="productImage" name="productImage" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
														<div class="image-uploads">
															<i data-feather="plus-circle" class="plus-down-add me-0">
															</i>
															<h4>
																Add Images
															</h4>
														</div>
													</div>
												</div>
												<div class="phone-img">
													<img src="">
													<a href="javascript:void(0);">
														<i data-feather="x" class="x-square-add remove-product">
														</i>
													</a>
												</div>
												<div class="phone-img">
													<img src="" id="image">
													<a href="javascript:void(0);">
														<i data-feather="x" class="x-square-add remove-product">
														</i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-sm-12">
								<div class="mb-3">
									<label class="form-label">
										Name
										<span class="text-danger ms-1">
											*
										</span>
									</label>
									<input type="text" class="form-control" value="Jeffry">
								</div>
							</div>
							<div class="col-lg-6 col-sm-12">
								<div class="mb-3">
									<label>
										Email
										<span class="text-danger ms-1">
											*
										</span>
									</label>
									<input type="email" class="form-control" value="jeffry@example.com">
								</div>
							</div>
							<div class="col-lg-6 col-sm-12">
								<div class="mb-3">
									<label class="form-label">
										Phone Number
										<span class="text-danger ms-1">
											*
										</span>
									</label>
									<input type="text" value=""class="form-control">
								</div>
							</div>
							<div class="col-12 d-flex justify-content-end">
								<a href="javascript:void(0);" class="btn btn-secondary me-2 shadow-none">
									Cancel
								</a>
								<a href="javascript:void(0);" class="btn btn-primary shadow-none">
									Save Changes
								</a>
							</div>
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