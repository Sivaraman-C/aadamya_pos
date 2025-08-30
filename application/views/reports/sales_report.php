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
							$query = $this->db->query("SELECT SUM(total) AS total_sales FROM order_items");
							$totalsales = $query->row()->total_sales;
							$totalSales = number_format($totalsales, 2);
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
											<h3><i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $totalSales; ?></h3>
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
								<li>
									<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf" onclick="exportTableToPDF()">
									  <img src="modules/assets/img/icons/pdf.svg" alt="img">
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" onclick="exportAllPagesToExcel('sales-report')" title="Export All to Excel">
									  <img src="modules/assets/img/icons/excel.svg" alt="Excel">
									</a>
								</li>
								<li>
									<a data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="ti ti-printer"></i></a>
								</li>
							</ul>
						</div>
						<div class="card-body p-0">
							<div class="table-responsive">
								<table id="sales-report" class="table datatable">
									<thead class="thead-light">
										<tr>
											<th>Id</th>
											<th>Product Name</th>
											<th>Price</th>
											<th>Sold Qty</th>
											<th>Sold Amount</th>
											<!-- <th>Instock Qty</th> -->
										</tr>
									</thead>
									<tbody>
							        	<?php 
							        	$fetchMyProducts = $this->db->query("SELECT * FROM order_items");
							        	foreach ($fetchMyProducts->result() as $row) { ?>
							            <tr>
							                <td><?php echo $row->id; ?></td>
							                <td><?php echo $row->product_name; ?></td>
							                <td><?php echo $row->price; ?></td>
							                <td><?php echo $row->quantity; ?></td>
							                <td><?php echo $row->total; ?></td>
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

		<script>
		// PDF and EXCEL Generation

		async function exportTableToPDF() {
		const { jsPDF } = window.jspdf;
		const doc = new jsPDF('l', 'pt', 'a4');
		const table = $('#sales-report').DataTable();

		// Extract headers (excluding the last "Action" column)
		const headers = $('#sales-report thead th').toArray()
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
		doc.text("Sales Report", 40, 40);

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

		doc.save("sales_report.pdf");
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

		function exportAllPagesToExcel(tableID, filename = 'sales_report.xlsx') {
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