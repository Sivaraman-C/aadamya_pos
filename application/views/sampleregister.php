<!DOCTYPE html>
<html>
<head>
    <title>Balance Amount Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        label { display: inline-block; width: 120px; margin-bottom: 10px; }
        input[type="number"] { width: 120px; padding: 4px; }
        .result { font-weight: bold; margin-top: 10px; }
    </style>
</head>
<body>
    <h2>Balance Amount Calculator</h2>
    <form>
        <label for="payAmount">Pay Amount:</label>
        <input type="number" id="payAmount" value="1000" min="0" step="0.01" readonly><br>

        <label for="receivedAmount">Received Amount:</label>
        <input type="number" id="receivedAmount" min="0" step="0.01" autocomplete="off"><br>

        <label for="balanceAmount">Balance:</label>
        <input type="number" id="balanceAmount" readonly><br>
    </form>
    <div id="message" class="result"></div>




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
                                                                 data-price="<?= $row->price; ?>">
                                                                <a href="javascript:void(0);" class="pro-img">
                                                                    <img src="<?= $row->image; ?>" alt="Product" width="100">  <!-- Use base_url here too -->
                                                                    <span><i class="ti ti-circle-check-filled"></i></span>
                                                                </a>
                                                                <h6 class="cat-name"><?= $row->category; ?></h6>
                                                                <h6 class="product-name"><?= $row->product_name; ?></h6>
                                                                <div class="d-flex align-items-center justify-content-between price">
                                                                    <span><?= $row->quantity; ?> pcs</span>
                                                                    <p>$<?= number_format($row->price, 2); ?></p>
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
                                                                 data-price="<?php echo $row->price; ?>">
                                                                <a href="javascript:void(0);" class="pro-img">
                                                                    <img src="<?php echo $row->image; ?>" alt="Product" width="100">
                                                                    <span><i class="ti ti-circle-check-filled"></i></span>
                                                                </a>
                                                                <h6 class="cat-name"><?php echo $row->category; ?></h6>
                                                                <h6 class="product-name"><?php echo $row->product_name; ?></h6>
                                                                <div class="d-flex align-items-center justify-content-between price">
                                                                    <span><?php echo $row->quantity; ?> pcs</span>
                                                                    <p>$<?php echo number_format($row->price, 2); ?></p>
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
                                                                 data-price="<?php echo $row->price; ?>">
                                                                <a href="javascript:void(0);" class="pro-img">
                                                                    <img src="<?php echo $row->image; ?>" alt="Product" width="100">
                                                                    <span><i class="ti ti-circle-check-filled"></i></span>
                                                                </a>
                                                                <h6 class="cat-name"><?php echo $row->category; ?></h6>
                                                                <h6 class="product-name"><?php echo $row->product_name; ?></h6>
                                                                <div class="d-flex align-items-center justify-content-between price">
                                                                    <span><?php echo $row->quantity; ?> pcs</span>
                                                                    <p><i class="fa-solid fa-indian-rupee-sign"></i><?php echo number_format($row->price, 2); ?></p>
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
                                                                 data-price="<?php echo $row->price; ?>">
                                                                <a href="javascript:void(0);" class="pro-img">
                                                                    <img src="<?php echo $row->image; ?>" alt="Product" width="100">
                                                                    <span><i class="ti ti-circle-check-filled"></i></span>
                                                                </a>
                                                                <h6 class="cat-name"><?php echo $row->category; ?></h6>
                                                                <h6 class="product-name"><?php echo $row->product_name; ?></h6>
                                                                <div class="d-flex align-items-center justify-content-between price">
                                                                    <span><?php echo $row->quantity; ?> pcs</span>
                                                                    <p><i class="fa-solid fa-indian-rupee-sign"></i><?php echo number_format($row->price, 2); ?></p>
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
                                                                 data-price="<?php echo $row->price; ?>">
                                                                <a href="javascript:void(0);" class="pro-img">
                                                                    <img src="<?php echo $row->image; ?>" alt="Product" width="100">
                                                                    <span><i class="ti ti-circle-check-filled"></i></span>
                                                                </a>
                                                                <h6 class="cat-name"><?php echo $row->category; ?></h6>
                                                                <h6 class="product-name"><?php echo $row->product_name; ?></h6>
                                                                <div class="d-flex align-items-center justify-content-between price">
                                                                    <span><?php echo $row->quantity; ?> pcs</span>
                                                                    <p><i class="fa-solid fa-indian-rupee-sign"></i><?php echo number_format($row->price, 2); ?></p>
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





                        

    <script>
        const payAmount = document.getElementById('payAmount');
        const receivedAmount = document.getElementById('receivedAmount');
        const balanceAmount = document.getElementById('balanceAmount');
        const message = document.getElementById('message');

        function updateBalance() {
            const pay = parseFloat(payAmount.value) || 0;
            const received = parseFloat(receivedAmount.value) || 0;
            const balance = received - pay;
            balanceAmount.value = balance.toFixed(2);

            if(receivedAmount.value === '') {
                message.textContent = '';
            } else if(balance < 0) {
                message.textContent = 'Insufficient amount received!';
                message.style.color = 'red';
            } else {
                message.textContent = 'Change to return: ₹' + balance.toFixed(2);
                message.style.color = 'green';
            }
        }

        receivedAmount.addEventListener('input', updateBalance);

        // Optional: Update balance if pay amount is editable
        // payAmount.addEventListener('input', updateBalance);
    </script>
</body>
</html>