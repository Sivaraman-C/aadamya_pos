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
						<h4>Manage Stock</h4>
						<h6>Manage your stock</h6>
					</div>							
				</div>
				<ul class="table-top-head">
					<li>
						<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf" onclick="exportTableToPDF()">
						  <img src="modules/assets/img/icons/pdf.svg" alt="img">
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" onclick="exportAllPagesToExcel('manage-stock')" title="Export All to Excel">
						  <img src="modules/assets/img/icons/excel.svg" alt="Excel">
						</a>
					</li>
					<li>
						<a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i class="ti ti-refresh"></i></a>
					</li>
					<li>
						<a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i class="ti ti-chevron-up"></i></a>
					</li>
				</ul>
				<div class="page-btn">
					<a href="manage-stocks.html#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-stock"><i class="ti ti-circle-plus me-1"></i>Add Stock</a>
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
						
					</div>
				</div>
				<div class="card-body p-0">
							<div class="table-responsive">
								<table id="manage-stock" class="table datatable">
									<thead class="thead-light">
										<tr>
											<th>ID</th>
											<th>Product Name</th>
											<th>Category</th>
											<th>Brand</th>
											<th>Quantity</th>
											<th>Image</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										 <?php if (!empty($product)) {
    											foreach ($product as $row) {
	                            echo "<tr>";
	                            echo "<td>" . $row->id . "</td>";
	                            echo "<td>" . $row->product_name . "</td>";
	                            echo "<td>" . $row->category . "</td>";
	                            echo "<td>" . $row->brand . "</td>";
	                            echo "<td>" . $row->quantity . "</td>";
	                            echo "<td><img src='$row->image' width='50' height='50' alt='Product Image'></td>";

	                            echo '<td class="action-table-data">
																			<div class="edit-delete-action">
																				<a class="me-2 p-2 border rounded d-flex align-items-center" href="' . base_url('editStock?id=' . $row->id) . '" data-bs-toggle="modal" data-bs-target="#edit-stock">
																					<i data-feather="edit" class="feather-edit"></i>
																				</a>
																				<a href="' . base_url('deleteStock?id=' . $row->id) . '" class="p-2" 
																           onclick="return confirm(\'Are you sure you want to delete this product?\')">
																           <i data-feather="trash-2" class="feather-trash-2 text-danger"></i>
																        </a>

																			</div>
																		</td>';
														  echo "</tr>";
						                        }
												} 
												?>

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
<div class="modal fade" id="add-stock">
	<div class="modal-dialog modal-dialog-centered stock-adjust-modal">
		<div class="modal-content">
			<div class="modal-header">
				<div class="page-title">
					<h4>Add Stock</h4>
				</div>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="manage-stocks.html">
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="mb-3">
								<label class="form-label">Warehouse <span class="text-danger ms-1">*</span></label>
								<select class="select">
									<option>Select</option>
									<option>Warehouse</option>
									<option>Quaint Warehouse</option>
									<option>Traditional Warehouse</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-3">
								<label class="form-label">Store <span class="text-danger ms-1">*</span></label>
								<select class="select">
									<option>Select</option>
									<option>Electro Mart</option>
									<option>Quantum Gadgets</option>
									<option>Prime Bazaar</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-3">
								<label class="form-label">Responsible Person <span class="text-danger ms-1">*</span></label>
								<select class="select">
									<option>Select</option>
									<option>James Kirwin</option>
									<option>Francis Chang</option>
									<option>Antonio Engle</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="search-form mb-0">
								<label class="form-label">Product <span class="text-danger ms-1">*</span></label>
								<div class="position-relative">
									<input type="text" class="form-control" placeholder="Select Product">
									<i data-feather="search" class="feather-search"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Add Stock</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /Add Stock -->

<!-- Edit Stock -->
<div class="modal fade" id="edit-stock">
	<div class="modal-dialog modal-dialog-centered stock-adjust-modal">
		<div class="modal-content">
			<div class="modal-header">
				<div class="page-title">
					<h4>Edit Stock</h4>
				</div>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
                      
        <form method="POST" action="<?php echo base_url('updateStocks?id='.$row->id); ?>" class="add-product-form" enctype="multipart/form-data">
          <div class="add-product">
            <div class="accordions-items-seperate" id="accordionSpacingExample">
              <div class="accordion-item border mb-4">
                <h2 class="accordion-header" id="headingSpacingOne">
                  <div class="accordion-button collapsed bg-white" data-bs-toggle="collapse" data-bs-target="#SpacingOne" aria-expanded="true" aria-controls="SpacingOne">
                    <div class="d-flex align-items-center justify-content-between flex-fill">
                    <h5 class="d-flex align-items-center"><i data-feather="info" class="text-primary me-2"></i><span>Product Information</span></h5>
                    </div>
                  </div>
                </h2>
                <div id="SpacingOne" class="accordion-collapse collapse show" aria-labelledby="headingSpacingOne">
                  <div class="accordion-body border-top">

                    <div class="row">
                      <div class="col-lg-4 col-sm-6 col-12">
                        <div class="mb-3">
                          <label class="form-label">Product Name<span class="text-danger ms-1">*</span></label>
                          <input type="text" class="form-control" id="productName" name="productName" value="<?php echo $row->product_name; ?>" required>
                        </div>
                      </div>

                      <div class="col-lg-4 col-sm-6 col-12">
                      <label class="form-label">Category<span class="text-danger">*</span></label>
                      <select name="productCategory" class="select form-control productCategory" required>
                        <option>Select</option>
                        <?php
                        $categories = ['Laptop', 'Mobile', 'Headset', 'Watch'];
                        foreach ($categories as $cat) {
                          $selected = ($row->category == $cat) ? 'selected' : '';
                          echo "<option value='$cat' $selected>$cat</option>";
                        }
                        ?>
                      </select>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-12">
                      <label class="form-label">Brand<span class="text-danger">*</span></label>
                      <select name="productBrand" class="select form-control productBrand" required>
                        <option>Select</option>
                        <?php
                          $brands = ['Lenevo', 'hp', 'Dell', 'Leaf', 'Oppo', 'Apple', 'Samsung', 'OnePlus', 'Skullcandy', "Rolex", "Omega", "Rado", "Titan"];
                          foreach ($brands as $brand) {
                            $selected = ($row->brand == $brand) ? 'selected' : '';
                            echo "<option value='$brand' $selected>$brand</option>";
                          }
                          ?>
                      </select>
                    </div>

                      <div class="col-lg-4 col-sm-6 col-12">
                            <div class="mb-3">
                              <label class="form-label">Quantity<span class="text-danger ms-1">*</span></label>
                              <input type="text" class="form-control" id="productQty" name="productQty" value="<?php echo $row->quantity; ?>" min="1" required>
                            </div>
                          </div>


                    </div>     
                    <div id="ImageUpload" class="accordion-collapse collapse show" aria-labelledby="headingSpacingThree">
                  <div class="accordion-body border-top">
                    <div class="text-editor add-list add">
                      <div class="col-lg-12">
                        <div class="add-choosen">
                          <div class="mb-3">
                          <div class="image-upload image-upload-two">
                              <input type="file" id="productImage" name="productImage" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                              <div class="image-uploads">
                                <i data-feather="plus-circle" class="plus-down-add me-0"></i>
                                <h4>Add Images</h4>
                              </div>
                            </div> 
                          </div>
                          <div class="phone-img">
                            <img src="<?php echo $row->image; ?>">
                            <a href="javascript:void(0);"><i data-feather="x" class="x-square-add remove-product"></i></a>
                          </div>
                          <div class="phone-img">
                            <img src="" id="image">
                            <a href="javascript:void(0);"><i data-feather="x" class="x-square-add remove-product"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
            <div class="d-flex align-items-center justify-content-end mb-4">
              <button type="submit" name="updateStock" class="btn btn-primary">Update Stock</button>
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
</div>
<!-- /Edit Stock -->

<!-- Delete -->
<div class="modal fade modal-default" id="delete">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body p-0">
				<div class="success-wrap text-center">
					<form action="manage-stocks.html">
						<div class="icon-success bg-danger-transparent text-danger mb-2">
							<i class="ti ti-trash"></i>
						</div>
						<h3 class="mb-2">Delete Stock</h3>
						<p class="fs-16 mb-3">Are you sure you want to delete product from stock?</p>
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

<script>
	 // PDF and EXCEL Generation

async function exportTableToPDF() {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF('l', 'pt', 'a4');
  const table = $('#manage-stock').DataTable();

  // Extract headers (excluding the last "Action" column)
  const headers = $('#manage-stock thead th').toArray()
    .slice(0, -1)
    .map(th => $(th).text().trim());

  const body = [];
  const data = table.rows().data().toArray();

  // Process each row
  for (const row of data) {
    const rowData = [];

    for (let i = 0; i < row.length - 1; i++) {
      const cellHTML = $('<div>').html(row[i]);
      const img = cellHTML.find('img');

      if (img.length > 0) {
        const base64 = await toDataURL(img.attr('src'));
        rowData.push({ imageBase64: base64 });
      } else {
        rowData.push(cellHTML.text().trim());
      }
    }

    body.push(rowData);
  }

  // Generate PDF
  doc.setFontSize(14);
  doc.text("Manage Stock", 40, 40);

  await doc.autoTable({
    head: [headers],
    body: body,
    startY: 60,
    theme: 'grid',
    headStyles: {
      fillColor: [52, 73, 94],
      textColor: [255, 255, 255],
      fontSize: 10
    },
    bodyStyles: { fontSize: 9 },
    margin: { top: 60, bottom: 40 },

    // Prevent object object showing
    didParseCell(data) {
      if (typeof data.cell.raw === 'object' && data.cell.raw?.imageBase64) {
        data.cell.text = '';
      }
    },

    // Draw image manually
    didDrawCell(data) {
      const cell = data.cell.raw;
      if (typeof cell === 'object' && cell.imageBase64) {
        doc.addImage(
          cell.imageBase64,
          'JPEG',
          data.cell.x + 9,
          data.cell.y + 1,
          25, // width
          20  // height
        );
      }
    },

    // Page footer
    didDrawPage(data) {
      const { width, height } = doc.internal.pageSize;
      doc.setFontSize(10);
      doc.text(`Page ${doc.internal.getNumberOfPages()}`, width - 60, height - 20);
    }
  });

  doc.save("manage_stock_table.pdf");
}

// Convert image URL to base64
function toDataURL(url) {
  return new Promise((resolve) => {
    const img = new Image();
    img.crossOrigin = "anonymous";
    img.onload = function () {
      const canvas = document.createElement("canvas");
      canvas.width = this.naturalWidth;
      canvas.height = this.naturalHeight;
      canvas.getContext("2d").drawImage(this, 0, 0);
      resolve(canvas.toDataURL("image/jpeg"));
    };
    img.onerror = () => resolve(null);
    img.src = url;
  });
}


// Excel

  function exportAllPagesToExcel(tableID, filename = 'manage_stock.xlsx') {
  const table = $('#' + tableID).DataTable();
  const allRows = table.rows().data().toArray();

  const originalTable = document.getElementById(tableID);
  const exportTable = document.createElement('table');

  // Clone header and remove "Action" column (last <th>)
  const clonedThead = originalTable.querySelector('thead').cloneNode(true);
  clonedThead.querySelectorAll('tr').forEach(tr => {
    const lastTh = tr.lastElementChild;
    if (lastTh) lastTh.remove(); // remove Action column
  });
  exportTable.appendChild(clonedThead);

  const tbody = document.createElement('tbody');

  allRows.forEach(row => {
    const tr = document.createElement('tr');
    for (let i = 0; i < row.length - 1; i++) { // skip last cell (Action column)
      const td = document.createElement('td');
      const tempDiv = document.createElement('div');
      tempDiv.innerHTML = row[i];
      const img = tempDiv.querySelector('img');
      td.textContent = img ? img.src : tempDiv.textContent || '';
      tr.appendChild(td);
    }
    tbody.appendChild(tr);
  });

  exportTable.appendChild(tbody);

  // Convert to SheetJS workbook
  const workbook = XLSX.utils.table_to_book(exportTable, { sheet: "Products" });
  const worksheet = workbook.Sheets["Products"];

  // Auto-adjust column widths
  const colWidths = [];
  const rows = [...exportTable.querySelectorAll('tr')].map(tr =>
    [...tr.children].map(td => td.textContent.trim())
  );

  const numCols = rows[0]?.length || 0;

  for (let col = 0; col < numCols; col++) {
    let maxLength = 10;
    rows.forEach(row => {
      const cellText = row[col] || "";
      maxLength = Math.max(maxLength, cellText.length);
    });
    colWidths.push({ wch: maxLength + 2 });
  }

  worksheet['!cols'] = colWidths;

  XLSX.writeFile(workbook, filename);
}

</script>

<?php
	$this->load->view('master_pages/footer');
?>