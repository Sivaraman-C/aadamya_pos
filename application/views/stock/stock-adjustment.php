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
								<h4>Stock Adjustment</h4>
								<h6>Manage your stock adjustment</h6>
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
								<a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i class="ti ti-chevron-up"></i></a>
							</li>
						</ul>
						<div class="page-btn">
							<a href="stock-adjustment.html#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-stock-adjustment"><i class="ti ti-circle-plus me-1"></i>Add Adjustment</a>
						</div>
					</div>
					
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
										Warehouse
									</a>
									<ul class="dropdown-menu  dropdown-menu-end p-3">
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Lavish Warehouse</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Quaint Warehouse </a>
										</li>
										<li>
											<a href="javascript:void(0);" class="dropdown-item rounded-1">Cool Warehouse</a>
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
											<th>Warehouse</th>
											<th>Store</th>
											<th>Product</th>
											<th>Date</th>
											<th>Person</th>
											<th>Qty</th>
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
											<td>Electro Mart </td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/products/stock-img-01.png" alt="product">
													</a>
													<a href="javascript:void(0);">Lenovo IdeaPad 3</a>
												</div>												
											</td>
											<td>24 Dec 2024</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/users/user-30.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">James Kirwin</a>
												</div>
											</td>
											<td>100</td>
											<td class="d-flex">
												<div class="d-flex align-items-center edit-delete-action">
													<a class="me-2 border rounded d-flex align-items-center p-2" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#view-notes">
														<i data-feather="file-text" class="feather-file-text"></i>
													</a>
													<a class="me-2 border rounded d-flex align-items-center p-2" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-adjustment">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 border rounded d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
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
											<td>Quantum Gadgets</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/products/stock-img-06.png" alt="product">
													</a>
													<a href="javascript:void(0);">Beats Pro</a>
												</div>												
											</td>
											<td>10 Dec 2024</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/users/user-13.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">Francis Chang</a>
												</div>
											</td>
											<td>140</td>
											<td class="d-flex">
												<div class="d-flex align-items-center justify-content-between edit-delete-action">
													<a class="me-2 border rounded d-flex align-items-center p-2" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#view-notes">
														<i data-feather="file-text" class="feather-file-text"></i>
													</a>
													<a class="me-2 p-2 border rounded d-flex align-items-center" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-adjustment">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 border rounded d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
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
											<td>Prime Bazaar</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/products/stock-img-02.png" alt="product">
													</a>
													<a href="javascript:void(0);">Nike Jordan</a>
												</div>												
											</td>
											<td>25 Jul 2023</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/users/user-08.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">Antonio Engle</a>
												</div>
											</td>
											<td>120</td>
											<td class="d-flex">
												<div class="d-flex align-items-center justify-content-between edit-delete-action">
													<a class="me-2 border rounded d-flex align-items-center p-2" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#view-notes">
														<i data-feather="file-text" class="feather-file-text"></i>
													</a>
													<a class="me-2 p-2 border rounded d-flex align-items-center" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-adjustment">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 border rounded d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
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
											<td>Gadget World</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/products/stock-img-03.png" alt="product">
													</a>
													<a href="javascript:void(0);">Apple Series 5 Watch</a>
												</div>												
											</td>
											<td>28 Jul 2023</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/users/user-04.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">Leo Kelly</a>
												</div>
											</td>
											<td>130</td>
											<td class="d-flex">
												<div class="d-flex align-items-center justify-content-between edit-delete-action">
													<a class="me-2 border rounded d-flex align-items-center p-2" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#view-notes">
														<i data-feather="file-text" class="feather-file-text"></i>
													</a>
													<a class="me-2 p-2 border rounded d-flex align-items-center" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-adjustment">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 border rounded d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
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
											<td>Volt Vault</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/products/stock-img-04.png" alt="product">
													</a>
													<a href="javascript:void(0);">Amazon Echo Dot</a>
												</div>												
											</td>
											<td>24 Jul 2023</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/users/user-09.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">Annette Walker</a>
												</div>
											</td>
											<td>140</td>
											<td class="d-flex">
												<div class="d-flex align-items-center justify-content-between edit-delete-action">
													<a class="me-2 border rounded d-flex align-items-center p-2" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#view-notes">
														<i data-feather="file-text" class="feather-file-text"></i>
													</a>
													<a class="me-2 p-2 border rounded d-flex align-items-center" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-adjustment">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 border rounded d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
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
											<td>Elite Retail</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/products/stock-img-05.png" alt="product">
													</a>
													<a href="javascript:void(0);">Lobar Handy</a>
												</div>												
											</td>
											<td>15 Jul 2023</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/users/user-10.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">John Weaver</a>
												</div>
											</td>
											<td>150</td>
											<td class="d-flex">
												<div class="d-flex align-items-center justify-content-between edit-delete-action">
													<a class="me-2 border rounded d-flex align-items-center p-2" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#view-notes">
														<i data-feather="file-text" class="feather-file-text"></i>
													</a>
													<a class="me-2 p-2 border rounded d-flex align-items-center" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-adjustment">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 border rounded d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
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
											<td>Retail Supply Hub </td>
											<td>Prime Mart</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/products/expire-product-01.png" alt="product">
													</a>
													<a href="javascript:void(0);">Red Premium Satchel</a>
												</div>												
											</td>
											<td>14 Oct 2024</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/users/user-08.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">Gary Hennessy</a>
												</div>
											</td>
											<td>700</td>
											<td class="d-flex">
												<div class="d-flex align-items-center justify-content-between edit-delete-action">
													<a class="me-2 border rounded d-flex align-items-center p-2" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#view-notes">
														<i data-feather="file-text" class="feather-file-text"></i>
													</a>
													<a class="me-2 p-2 border rounded d-flex align-items-center" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-adjustment">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 border rounded d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
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
											<td>EdgeWare Solutions </td>
											<td>NeoTech Store</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/products/expire-product-02.png" alt="product">
													</a>
													<a href="javascript:void(0);">Iphone 14 Pro</a>
												</div>												
											</td>
											<td>03 Oct 2024</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/users/user-04.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">Eleanor Panek</a>
												</div>
											</td>
											<td>630</td>
											<td class="d-flex">
												<div class="d-flex align-items-center justify-content-between edit-delete-action">
													<a class="me-2 border rounded d-flex align-items-center p-2" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#view-notes">
														<i data-feather="file-text" class="feather-file-text"></i>
													</a>
													<a class="me-2 p-2 border rounded d-flex align-items-center" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-adjustment">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 border rounded d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
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
											<td>North Zone Warehouse </td>
											<td>Urban Mart</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/products/expire-product-03.png" alt="product">
													</a>
													<a href="javascript:void(0);">Gaming Chair</a>
												</div>												
											</td>
											<td>20 Sep 2024</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/users/user-13.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">William Levy</a>
												</div>
											</td>
											<td>410</td>
											<td class="d-flex">
												<div class="d-flex align-items-center justify-content-between edit-delete-action">
													<a class="me-2 border rounded d-flex align-items-center p-2" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#view-notes">
														<i data-feather="file-text" class="feather-file-text"></i>
													</a>
													<a class="me-2 p-2 border rounded d-flex align-items-center" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-adjustment">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 border rounded d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
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
											<td>Fulfillment Hub </td>
											<td>Travel Mart</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/products/expire-product-04.png" alt="product">
													</a>
													<a href="javascript:void(0);">Borealis Backpack</a>
												</div>												
											</td>
											<td>10 Sep 2024</td>
											<td>
												<div class="d-flex align-items-center">
													<a href="javascript:void(0);" class="avatar avatar-md me-2">
														<img src="modules/assets/img/users/user-16.jpg" alt="product">
													</a>
													<a href="javascript:void(0);">Charlotte Klotz</a>
												</div>
											</td>
											<td>550</td>
											<td class="d-flex">
												<div class="d-flex align-items-center justify-content-between edit-delete-action">
													<a class="me-2 border rounded d-flex align-items-center p-2" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#view-notes">
														<i data-feather="file-text" class="feather-file-text"></i>
													</a>
													<a class="me-2 p-2 border rounded d-flex align-items-center" href="stock-adjustment.html#" data-bs-toggle="modal" data-bs-target="#edit-stock-adjustment">
														<i data-feather="edit" class="feather-edit"></i>
													</a>
													<a class="p-2 border rounded d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
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

		<!-- Add Adjustment -->
		<div class="modal fade" id="add-stock-adjustment">
			<div class="modal-dialog modal-dialog-centered stock-adjust-modal">
				<div class="modal-content">
					<div class="modal-header">
						<div class="page-title">
							<h4>Add Adjustment</h4>
						</div>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="stock-adjustment.html">
						<div class="modal-body">
							<div class="search-form mb-3">
								<label class="form-label">Product<span class="text-danger ms-1">*</span></label>
								<div class="position-relative">
									<input type="text" class="form-control" placeholder="Search Product">
									<i data-feather="search" class="feather-search"></i>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label">Warehouse<span class="text-danger ms-1">*</span></label>
										<select class="select">
											<option>Select</option>
											<option>Lavish Warehouse</option>
											<option>Quaint Warehouse</option>
											<option>Cool Warehouse</option>
											<option>Retail Supply Hub</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label">Reference Number<span class="text-danger ms-1">*</span></label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Store<span class="text-danger ms-1">*</span></label>
										<select class="select">
											<option>Select</option>
											<option>Electro Mart</option>
											<option>Quantum Gadgets</option>
											<option>Prime Bazaar</option>
											<option>Gadget World</option>
										</select>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Responsible Person<span class="text-danger ms-1">*</span></label>
										<select class="select">
											<option>Select</option>
											<option>James Kirwin</option>
											<option>Francis Chang</option>
											<option>Gary Hennessy</option>
											<option>Eleanor Panek</option>
										</select>
									</div>
								</div>
							</div>
							
							<div class="col-lg-12">
								<div>
									<label class="form-label">Notes<span class="text-danger ms-1">*</span></label>
									<textarea class="form-control"></textarea>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Create Adjustment</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /Add Adjustment -->

		<!-- Edit Adjustment -->
		<div class="modal fade" id="edit-stock-adjustment">
			<div class="modal-dialog modal-dialog-centered stock-adjust-modal">
				<div class="modal-content">
					<div class="modal-header">
						<div class="page-title">
							<h4>Edit Adjustment</h4>
						</div>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="stock-adjustment.html">
					<div class="modal-body">
						<div class="mb-3 search-form">
							<label class="form-label">Product<span class="text-danger ms-1">*</span></label>
							<div class="position-relative">
								<input type="text" class="form-control" value="Nike Jordan">
								<i data-feather="search" class="feather-search"></i>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="mb-3">
									<label class="form-label">Warehouse<span class="text-danger ms-1">*</span></label>
									<select class="select">
										<option>Select</option>
										<option selected>Lavish Warehouse</option>
										<option>Quaint Warehouse</option>
										<option>Cool Warehouse</option>
										<option>Retail Supply Hub</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="mb-3">
									<label class="form-label">Reference Number<span class="text-danger ms-1">*</span></label>
									<input type="text" class="form-control" value="PT003">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="p-3 border bg-light rounded mb-3">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th>Product</th>
													<th>SKU</th>
													<th>Category</th>
													<th>Qty</th>
													<th>Type</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<div class="d-flex align-items-center">
															<a href="javascript:void(0);" class="avatar avatar-md me-2">
																<img src="modules/assets/img/products/stock-img-02.png" alt="product">
															</a>
															<a href="javascript:void(0);">Nike Jordan</a>
														</div>												
													</td>
													<td>PT002</td>
													<td>Nike</td>
													<td>
														<div class="product-quantity border-0 bg-gray-transparent">
															<span class="quantity-btn"><i data-feather="minus-circle" class="feather-search"></i></span>
															<input type="text" class="quntity-input bg-transparent" value="2">
															<span class="quantity-btn">+<i data-feather="plus-circle" class="plus-circle"></i></span>
														</div>
													</td>
													<td>
														<select class="select">
															<option>Addition</option>
															<option>Addition</option>
															<option>Addition</option>
														</select>
													</td>
													<td>
														<div class="edit-delete-action d-flex align-items-center">
															<a class="p-2 border rounded d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
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
								<div class="mb-3">
									<label class="form-label">Store<span class="text-danger ms-1">*</span></label>
									<select class="select">
										<option>Select</option>
										<option selected>Electro Mart</option>
										<option>Quantum Gadgets</option>
										<option>Prime Bazaar</option>
										<option>Gadget World</option>
									</select>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="mb-3">
									<label class="form-label">Responsible Person<span class="text-danger ms-1">*</span></label>
									<select class="select">
										<option>Select</option>
										<option selected>James Kirwin</option>
										<option>Francis Chang</option>
										<option>Gary Hennessy</option>
										<option>Eleanor Panek</option>
									</select>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="mb-3">
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
		<!-- /Edit Adjustment -->

		<!-- View Notes -->
		<div class="modal fade" id="view-notes">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<div class="page-title">
							<h4>Notes</h4>
						</div>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>The Jordan brand is owned by Nike (owned by the Knight family), as, at the time, the company was building its strategy to work with athletes to launch shows that could inspire consumers.Although Jordan preferred Converse and Adidas, they simply could not match the offer Nike made. Jordan also signed with Nike because he loved the way they wanted to market him with the banned colored shoes. Nike promised to cover the fine Jordan would receive from the NBA.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- /View Notes -->

		<!-- Delete -->
		<div class="modal fade modal-default" id="delete">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body p-0">
						<div class="success-wrap text-center">
							<form action="<?php echo base_url('stock-adjustment'); ?>">
								<div class="icon-success bg-danger-transparent text-danger mb-2">
									<i class="ti ti-trash"></i>
								</div>
								<h3 class="mb-2">Delete Stock Adjustment</h3>
								<p class="fs-16 mb-3">Are you sure you want to delete stock adjustment?</p>
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