    <?php 
 $this->load->view('master_pages/header');
 $this->load->view('master_pages/sidebar');

 $fetchListedId = $_GET['id'];
?>

 <!-- Main Wrapper -->
        <div class="main-wrapper">
      

      
      <div class="page-wrapper">
      <div class="content">
        <div class="page-header">
          <div class="add-item d-flex">
            <div class="page-title">
              <h4 class="fw-bold">Edit Product</h4>
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
          <?php 
                     $fetchMyProduct = $this->db->query("SELECT * FROM product WHERE id = '$fetchListedId'");
                     foreach ($fetchMyProduct->result() as $row) { ?>
                      
        <form method="POST" action="<?php echo base_url('updateProducts?id='.$row->id); ?>" class="add-product-form" enctype="multipart/form-data">
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
                        <select name="productCategory" class="select form-control" required>
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
                        <select name="productBrand" class="select form-control" required>
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


                    </div>     
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="accordion-item border mb-4"> 
                <h2 class="accordion-header" id="headingSpacingTwo">
                  <div class="accordion-button collapsed bg-white" data-bs-toggle="collapse" data-bs-target="#SpacingTwo" aria-expanded="true" aria-controls="SpacingTwo">
                    <div class="d-flex align-items-center justify-content-between flex-fill">
                    <h5 class="d-flex align-items-center"><i data-feather="life-buoy" class="text-primary me-2"></i><span>Pricing & Stocks</span></h5>
                    </div>
                  </div>
                </h2>
                <div id="SpacingTwo" class="accordion-collapse collapse show" aria-labelledby="headingSpacingTwo">
                  <div class="accordion-body border-top">
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="single-product">
                        <div class="row">
                          <div class="col-lg-4 col-sm-6 col-12">
                            <div class="mb-3">
                              <label class="form-label">Quantity<span class="text-danger ms-1">*</span></label>
                              <input type="text" class="form-control" id="productQty" name="productQty" value="<?php echo $row->quantity; ?>" oninput="calcuDiscount()" min="1" required>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-6 col-12">
                            <div class="mb-3">
                              <label class="form-label">Price<span class="text-danger ms-1">*</span></label>
                              <input type="number" class="form-control" id="productPrice" name="productPrice" value="<?php echo $row->unit_price; ?>" oninput="calcuDiscount()" min="1" required>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-6 col-12">
                            <div class="mb-3">
                              <label class="form-label">Total Price<span class="text-danger ms-1">*</span></label>
                              <input type="number" class="form-control" id="totalunitPrice" name="totalunitPrice" value="<?php echo $row->total_unit_price; ?>" min="1">
                            </div>
                          </div>
                  
                          <div class="col-lg-4 col-sm-6 col-12">
                            <div class="mb-3">
                              <label class="form-label">Discount %<span class="text-danger ms-1">*</span></label>
                              <input type="text" class="form-control" id="discountPercentage" name="discountPercentage" value="<?php echo $row->discount; ?>" oninput="calcuDiscount()" required>
                            </div>
                          </div>
                          <div class="col-sm-6 col-12">
                            <div class="mb-3">
                              <label class="form-label">Discount Amount<span class="text-danger ms-1">*</span></label>
                              <input class="form-control" type="text" id="discountAmount" name="discountAmount" value="<?php echo $row->discount_amount; ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-6 col-12">
                            <div class="mb-3">
                              <label class="form-label">Final Price<span class="text-danger ms-1">*</span></label>
                              <input class="form-control" type="text" id="finalPrice" name="finalPrice" value="<?php echo $row->final_price; ?>" readonly>
                            </div>
                          </div>
                        </div>
                      </div>    
                      </div>
                       
                    </div>
                  </div>
                </div>
              </div>
          <div class="accordion-item border mb-4">
            <h2 class="accordion-header">
              <div class="accordion-button bg-white" data-bs-toggle="collapse" data-bs-target="#ImageUpload">
                <h5><i data-feather="image" class="text-primary me-2"></i><span>Images</span></h5>
              </div>
            </h2>
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
          </div>
              
            </div>
          </div>
          <div class="col-lg-12">
            <div class="d-flex align-items-center justify-content-end mb-4">
              <button type="submit" name="updateProduct" class="btn btn-primary">Update Product</button>
            </div>
          </div>
        </form>
      </div>
    </div>
   </div>
    <!-- /Main Wrapper -->

    
  

<?php

    $this->load->view('master_pages/footer');

    ?>