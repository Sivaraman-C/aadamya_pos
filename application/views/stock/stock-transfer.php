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
								<h4>Stock Transfer</h4>
								<h6>Manage your stock transfer</h6>
							</div>							
						</div>
						<ul class="table-top-head">
							<li>
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
							</li>
							<li>
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
							</li>
							<li>
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i class="ti ti-refresh"></i></a>
							</li>
							<li>
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i class="ti ti-chevron-up"></i></a>
							</li>
						</ul>
						<div class="page-btn">
							<a href="stock-transfer.html#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-stock-transfer"><i class="ti ti-circle-plus me-1"></i>Add New</a>
						</div>
						<div class="page-btn import">
							<a href="stock-transfer.html#" class="btn btn-secondary color" data-bs-toggle="modal" data-bs-target="#view-notes"><i
								data-feather="download" class="me-1"></i>Import Transfer</a>
						</div>
					</div>
					<!-- /product list -->
					<div class="card">
						<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
							<div class="search-set">
								<div class="search-input">
									<span class="btn-searchset"><i class="ti ti-search fs-14 feather-search"></i></span>
								</div>
							</div>
							<div class="d-flex table-dropdown my-xl-auto right-content align-items-center flex-wrap row-gap-3">
								<div class="dropdown me-2">
									<a href="javascript:void(0);" class="dropdown-toggle btn btn-white btn-md d-inline-flex align-items-center" data-bs-toggle="dropdown">
										From Warehouse
									</a>
									<ul class="dropdown-menu  dropdown-menu-end p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Lavish Warehouse</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Quaint Warehouse</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Traditional Warehouse</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Cool Warehouse</a>
										</li>
									</ul>
								</div>
								<div class="dropdown me-2">
									<a href="javascript:void(0);" class="dropdown-toggle btn btn-white btn-md d-inline-flex align-items-center" data-bs-toggle="dropdown">
										To Warehouse
									</a>
									<ul class="dropdown-menu  dropdown-menu-end p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">North Zone Warehouse</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Nova Storage Hub</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Cool Warehouse</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Retail Supply Hub</a>
										</li>
									</ul>
								</div>
								<div class="dropdown">
									<a href="javascript:void(0);" class="dropdown-toggle btn btn-white btn-md d-inline-flex align-items-center" data-bs-toggle="dropdown">
										Sort By : Last 7 Days
									</a>
									<ul class="dropdown-menu  dropdown-menu-end p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Recently Added</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Ascending</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Desending</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Last Month</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Last 7 Days</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="card-body p-0">
							<div class="table-responsive">
								<table class="table datatable">
									<thead class="thead-light">
										<tr>
											<th class="no-sort">
												<label class="checkboxs">
													<input type="checkbox" id="select-all">
													<span class="checkmarks"></span>
												</label>
											</th>
											<th>From Warehouse</th>
											<th>To Warehouse</th>
											<th>No of Products</th>
											<th>Quantity Transfered</th>
											<th>Ref Number</th>
											<th>Date</th>
											<th class="no-sort"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>Lavish Warehouse </td>
											<td>North Zone Warehouse </td>
											<td>
												20												
											</td>
											<td>
												15
											</td>
											<td>#458924</td>
											<td>24 Dec 2024</td>
											<td class="d-flex">
												<div class="edit-delete-action d-flex align-items-center justify-content-center">
													<a class="me-2 p-2 d-flex align-items-center justify-content-between border rounded" href="stock-transfer.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-transfer">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 d-flex align-items-center justify-content-between border rounded" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
												
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>Lobar Handy </td>
											<td>Nova Storage Hub</td>
											<td>
												04												
											</td>
											<td>
												14
											</td>
											<td>#145445</td>
											<td>25 Jul 2023</td>
											<td class="d-flex">
												<div class="edit-delete-action d-flex align-items-center justify-content-center">
													<a class="me-2 p-2 d-flex align-items-center justify-content-between border rounded" href="stock-transfer.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-transfer">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 d-flex align-items-center justify-content-between border rounded" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
												
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>Quaint Warehouse </td>
											<td>Cool Warehouse</td>
											<td>
												21										
											</td>
											<td>
												10
											</td>
											<td>#135478</td>
											<td>28 Jul 2023</td>
											<td class="d-flex">
												<div class="edit-delete-action d-flex align-items-center justify-content-center">
													<a class="me-2 p-2 d-flex align-items-center justify-content-between border rounded" href="stock-transfer.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-transfer">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 d-flex align-items-center justify-content-between border rounded" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
												
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>Traditional Warehouse </td>
											<td>Retail Supply Hub</td>
											<td>
												15											
											</td>
											<td>
												14
											</td>
											<td>#145124</td>
											<td>24 Jul 2023</td>
											<td class="d-flex">
												<div class="edit-delete-action d-flex align-items-center justify-content-center">
													<a class="me-2 p-2 d-flex align-items-center justify-content-between border rounded" href="stock-transfer.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-transfer">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 d-flex align-items-center justify-content-between border rounded" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
												
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>Cool Warehouse </td>
											<td>EdgeWare Solutions</td>
											<td>
												14												
											</td>
											<td>
												74
											</td>
											<td>#474541</td>
											<td>15 Jul 2023</td>
											<td class="d-flex">
												<div class="edit-delete-action d-flex align-items-center justify-content-center">
													<a class="me-2 p-2 d-flex align-items-center justify-content-between border rounded" href="stock-transfer.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-transfer">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 d-flex align-items-center justify-content-between border rounded" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
												
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>Overflow Warehouse</td>
											<td>Quaint Warehouse</td>
											<td>
												30												
											</td>
											<td>
												20
											</td>
											<td>#366713</td>
											<td>06 Nov 2024</td>
											<td class="d-flex">
												<div class="edit-delete-action d-flex align-items-center justify-content-center">
													<a class="me-2 p-2 d-flex align-items-center justify-content-between border rounded" href="stock-transfer.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-transfer">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 d-flex align-items-center justify-content-between border rounded" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
												
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>Nova Storage Hub</td>
											<td>Traditional Warehouse</td>
											<td>
												10												
											</td>
											<td>
												06
											</td>
											<td>#327814</td>
											<td>25 Oct 2024</td>
											<td class="d-flex">
												<div class="edit-delete-action d-flex align-items-center justify-content-center">
													<a class="me-2 p-2 d-flex align-items-center justify-content-between border rounded" href="stock-transfer.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-transfer">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 d-flex align-items-center justify-content-between border rounded" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
												
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>Retail Supply Hub</td>
											<td>Overflow Warehouse</td>
											<td>
												70												
											</td>
											<td>
												60
											</td>
											<td>#274509</td>
											<td>14 Oct 2024</td>
											<td class="d-flex">
												<div class="edit-delete-action d-flex align-items-center justify-content-center">
													<a class="me-2 p-2 d-flex align-items-center justify-content-between border rounded" href="stock-transfer.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-transfer">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 d-flex align-items-center justify-content-between border rounded" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
												
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>EdgeWare Solutions</td>
											<td>Lavish Warehouse</td>
											<td>
												35												
											</td>
											<td>
												30
											</td>
											<td>#239073</td>
											<td>03 Oct 2024</td>
											<td class="d-flex">
												<div class="edit-delete-action d-flex align-items-center justify-content-center">
													<a class="me-2 p-2 d-flex align-items-center justify-content-between border rounded" href="stock-transfer.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-transfer">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 d-flex align-items-center justify-content-between border rounded" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
												
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>North Zone Warehouse</td>
											<td>Fulfillment Hub</td>
											<td>
												15												
											</td>
											<td>
												10
											</td>
											<td>#187204</td>
											<td>20 Sep 2024</td>
											<td class="d-flex">
												<div class="edit-delete-action d-flex align-items-center justify-content-center">
													<a class="me-2 p-2 d-flex align-items-center justify-content-between border rounded" href="stock-transfer.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-transfer">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 d-flex align-items-center justify-content-between border rounded" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
												
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>Fulfillment Hub</td>
											<td>EdgeWare Solutions</td>
											<td>
												45												
											</td>
											<td>
												35
											</td>
											<td>#139064</td>
											<td>10 Sep 2024</td>
											<td class="d-flex">
												<div class="edit-delete-action d-flex align-items-center justify-content-center">
													<a class="me-2 p-2 d-flex align-items-center justify-content-between border rounded" href="stock-transfer.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-transfer">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="d-flex align-items-center justify-content-between border rounded p-2" href="javascript:void(0);">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
												
											</td>
										</tr>
										<tr>
											<td>
												<label class="checkboxs">
													<input type="checkbox">
													<span class="checkmarks"></span>
												</label>
											</td>
											<td>Retail Supply Hub</td>
											<td>Overflow Warehouse</td>
											<td>
												70												
											</td>
											<td>
												60
											</td>
											<td>#274509</td>
											<td>14 Oct 2024</td>
											<td class="d-flex">
												<div class="edit-delete-action d-flex align-items-center justify-content-center">
													<a class="me-2 d-flex align-items-center justify-content-between border rounded p-2" href="stock-transfer.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-transfer">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="d-flex align-items-center justify-content-between border rounded p-2" href="javascript:void(0);">
														<i data-feather="trash-2" class="feather-trash-2"></i>
													</a>
												</div>
												
											</td>
										</tr>
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

		<!-- Add Stock -->
		<div class="modal fade" id="add-stock-transfer">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<div class="page-title">
							<h4>Add Transfer</h4>
						</div>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="stock-transfer.html">
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label">Warehouse From <span class="text-danger ms-1">*</span></label>
										<select class="select">
											<option>Select</option>
											<option>Lobar Handy</option>
											<option>Quaint Warehouse</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label">Warehouse To <span class="text-danger ms-1">*</span></label>
										<select class="select">
											<option>Select</option>
											<option>Selosy</option>
											<option>Logerro</option>
										</select>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Reference Number <span class="text-danger ms-1">*</span></label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="search-form mb-3">
										<label class="form-label">Product<span class="text-danger ms-1">*</span></label>
										<div class="position-relative">
											<input type="text" class="form-control" placeholder="Search Product">
											<i data-feather="search" class="feather-search"></i>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="search-form mb-0">
										<label class="form-label">Notes <span class="text-danger ms-1">*</span></label>
										<textarea class="form-control"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Create</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Add Stock -->

		<!-- Edit Stock -->
		<div class="modal fade" id="edit-stock-transfer">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<div class="page-title">
							<h4>Edit Transfer</h4>
						</div>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="stock-transfer.html">
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label">Warehouse From<span class="text-danger ms-1">*</span></label>
										<select class="select">
											<option>Lobar Handy</option>
											<option>Quaint Warehouse</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label">Warehouse To<span class="text-danger ms-1">*</span></label>
										<select class="select">
											<option>Selosy</option>
											<option>Logerro</option>
										</select>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Reference No<span class="text-danger ms-1">*</span></label>
										<input type="text" class="form-control" value="32434545">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="mb-3 search-form">
										<label class="form-label">Product<span class="text-danger ms-1">*</span></label>
										<div class="position-relative">
											<input type="text" class="form-control" value="Nike Jordan">
											<i data-feather="search" class="feather-search"></i>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="modal-body-table">
										<div class="table-responsive">
											<table class="table  datanew">
												<thead>
													<tr>
														<th>Product</th>
														<th>SKU</th>
														<th>Category</th>
														<th>Qty</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<div class="d-flex align-items-center">
																<a href="javascript:void(0);" class="avatar avatar-md me-2">
																	<img src="assets/img/products/stock-img-02.png" alt="product">
																</a>
																<a href="javascript:void(0);">Nike Jordan</a>
															</div>												
														</td>
														<td>PT002</td>
														<td>Nike</td>
														<td>
															<div class="product-quantity bg-gray-transparent border-0">
																<span class="quantity-btn"><i data-feather="minus-circle" class="feather-search"></i></span>
																<input type="text" class="quntity-input bg-transparent" value="2">
																<span class="quantity-btn">+<i data-feather="plus-circle" class="plus-circle"></i></span>
															</div>
														</td>
														<td>
															<div class="edit-delete-action d-flex align-items-center justify-content-center">
																<a class="p-2 d-flex align-items-center justify-content-center border rounded" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
																	<i data-feather="trash-2" class="feather-trash-2"></i>
																</a>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="mb-3 search-form mb-0">
										<label class="form-label">Notes<span class="text-danger ms-1">*</span></label>
										<textarea class="form-control">The Jordan brand is owned by Nike (owned by the Knight family), as, at the time, the company was building its strategy to work with athletes to launch shows that could inspire consumers.Although Jordan preferred Converse and Adidas, they simply could not match the offer Nike made. </textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Save Changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Edit Stock -->

		<!-- Import Transfer -->
		<div class="modal fade" id="view-notes">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<div class="page-title">
							<h4>Import Transfer</h4>
						</div>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="stock-transfer.html">
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-4 col-sm-6 col-12">
									<div class="mb-3">
										<label class="form-label">From<span class="text-danger ms-1">*</span></label>
										<select class="select">
											<option>select</option>
											<option>Lavish Warehouse</option>
											<option>Lobar Handy</option>
											<option>Quaint Warehouse</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4 col-sm-6 col-12">
									<div class="mb-3">
										<label class="form-label">To<span class="text-danger ms-1">*</span></label>
										<select class="select">
											<option>Select</option>
											<option>North Zone Warehouse</option>
											<option>Nova Storage Hub</option>
											<option>Cool Warehouse</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4 col-sm-6 col-12">
									<div class="mb-3">
										<label class="form-label">Satus<span class="text-danger ms-1">*</span></label>
										<select class="select">
											<option>Select</option>
											<option>Sent</option>
											<option>Pending</option>
										</select>
									</div>
								</div>
								<div class="col-lg-12 col-sm-6 col-12">
									<div class="row">
										<div>
											<div class="modal-footer-btn download-file">
												<a href="javascript:void(0)" class="btn btn-submit">Download Sample File</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="mb-3 image-upload-down">
										<label class="form-label">	Upload CSV File</label>
										<div class="image-upload download">
											<input type="file">
											<div class="image-uploads">
												<img src="assets/img/download-img.png" alt="img">
												<h4>Drag and drop a <span>file to upload</span></h4>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-sm-6 col-12">
									<div class="mb-3">
										<label class="form-label">Shipping<span class="text-danger ms-1">*</span></label>
										<input type="text" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="mb-3">
									<label class="form-label">Description</label>
									<textarea class="form-control" rows="3"></textarea>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Import Transfer -->

		<!-- Delete -->
		<div class="modal fade modal-default" id="delete">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body p-0">
						<div class="success-wrap text-center">
							<form action="stock-transfer.html">
								<div class="icon-success bg-danger-transparent text-danger mb-2">
									<i class="ti ti-trash"></i>
								</div>
								<h3 class="mb-2">Delete Stock Transfer</h3>
								<p class="fs-16 mb-3">Are you sure you want to delete stock transfer?</p>
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
		<!-- /Delete -->
		  
		<?php
			$this->load->view('master_pages/footer');
		?>