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

						<!-- /product list -->
						<div class="card no-search">
							<div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
								<div>
									<h4>Purchase Report</h4>
								</div>
								<ul class="table-top-head">
									<li class="me-2">
										<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf" onclick="exportTableToPDF()">
									  <img src="modules/assets/img/icons/pdf.svg" alt="img">
									</a>
									</li>
									<li class="me-2">
										<a href="javascript:void(0);" onclick="exportAllPagesToExcel('purchase-report')" title="Export All to Excel">
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
									<table id="purchase-report" class="table datatable">
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
		// PDF and EXCEL Generation

		async function exportTableToPDF() {
		const { jsPDF } = window.jspdf;
		const doc = new jsPDF('l', 'pt', 'a4');
		const table = $('#purchase-report').DataTable();

		// Extract headers (excluding the last "Action" column)
		const headers = $('#purchase-report thead th').toArray()
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
		doc.text("Purchase Report", 40, 40);

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

		doc.save("purchase_report.pdf");
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

		function exportAllPagesToExcel(tableID, filename = 'purchase_report.xlsx') {
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

<!-- <script>
	new DataTable('#example');
</script> -->

<?php 
	$this->load->view('master_pages/footer');
?>