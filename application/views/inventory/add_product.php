
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
              <h4 class="fw-bold">Create Product</h4>
              <h6>Create new product</h6>
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

        <form method="POST" id="addProductForm" action="<?= base_url('loadProducts'); ?>" class="add-product-form" enctype="multipart/form-data">
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
                          <input type="text" class="form-control" id="productName" name="productName" autocomplete="off" required>
                        </div>
                      </div>

                      <div class="col-lg-4 col-sm-6 col-12">
                        <div class="mb-3">
                          <label class="form-label">Category<span class="text-danger ms-1">*</span></label>
                          <select class="form-control" id="productCategory" name="productCategory" required>
                            <option value="">Select</option>
                            <option value="Laptop">Laptop</option>
                            <option value="Mobile">Mobile</option>
                            <option value="Headset">Headset</option>
                            <option value="Watch">Watch</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-lg-4 col-sm-6 col-12">
                        <div class="mb-3">
                          <label class="form-label">Brand<span class="text-danger ms-1">*</span></label>
                          <select class="form-control" id="productBrand" name="productBrand" required>
                            <option value="">Select</option>
                          </select>
                        </div>
                      </div>
                        
                    </div>     
                    
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
                              <input type="text" class="form-control" id="productQty" name="productQty" min="1" autocomplete="off" required>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-6 col-12">
                            <div class="mb-3">
                              <label class="form-label">Cost Price<span class="text-danger ms-1">*</span></label>
                              <input type="number" class="form-control" id="costPrice" name="costPrice" oninput="calcuTotalUnitPrice()" min="1" required>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-6 col-12">
                            <div class="mb-3">
                              <label class="form-label">Unit Price<span class="text-danger ms-1">*</span></label>
                              <input type="number" class="form-control" id="productPrice" name="productPrice" oninput="" min="1" required>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-6 col-12">
                            <div class="mb-3">
                              <label class="form-label">Total Unit Price<span class="text-danger ms-1">*</span></label>
                              <input type="number" class="form-control" id="totalunitPrice" name="totalunitPrice" min="1">
                            </div>
                          </div>
                  
                          <div class="col-lg-4 col-sm-6 col-12">
                            <div class="mb-3">
                              <label class="form-label">Discount %<span class="text-danger ms-1">*</span></label>
                              <input type="text" class="form-control" id="discountPercentage" name="discountPercentage" autocomplete="off" oninput="calcuDiscount()" required>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-6 col-12">
                            <div class="mb-3">
                              <label class="form-label">Discount Amount<span class="text-danger ms-1">*</span></label>
                              <input class="form-control" type="text" id="discountAmount" name="discountAmount" readonly>
                            </div>
                          </div>
                          <div class="col-lg-4 col-sm-6 col-12">
                            <div class="mb-3">
                              <label class="form-label">Final Price<span class="text-danger ms-1">*</span></label>
                              <input class="form-control" type="text" id="finalPrice" name="finalPrice" readonly>
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
                <h2 class="accordion-header" id="headingSpacingThree">
                  <div class="accordion-button collapsed bg-white" data-bs-toggle="collapse" data-bs-target="#SpacingThree" aria-expanded="true" aria-controls="SpacingThree">
                    <div class="d-flex align-items-center justify-content-between flex-fill">
                    <h5 class="d-flex align-items-center"><i data-feather="image" class="text-primary me-2"></i><span>Images</span></h5>
                    </div>
                  </div>
                </h2>
                <div id="SpacingThree" class="accordion-collapse collapse show" aria-labelledby="headingSpacingThree">
                  <div class="accordion-body border-top">
                    <div class="text-editor add-list add">
                      <div class="col-lg-12">
                        <div class="add-choosen">
                          <div class="mb-3">
                          <div class="image-upload image-upload-two">
                              <input type="file" id="productImage" name="productImage" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" required>
                              <div class="image-uploads">
                                <i data-feather="plus-circle" class="plus-down-add me-0"></i>
                                <h4>Add Images</h4>
                              </div>
                            </div> 
                          </div>
                          <div class="phone-img">
                            <img src="" id="image">
                            
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
              <button type="submit" name="addProduct" class="btn btn-primary">Add Product</button>
            </div>
          </div>
        </form>
      </div>
    </div>
   </div>
    <!-- /Main Wrapper -->

<script>
$(document).ready(function () {
  console.log("jQuery is loaded");

  $('#addProductForm').on('addProduct', function (e) {
    e.preventDefault();
    console.log("Form submit triggered");

    var formData = new FormData(this);

    $.ajax({
      url: $(this).attr('action'),
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log("Response:", response);
        $('body').append(response); // will show your alert and redirect
      },
      error: function (xhr) {
        console.error(xhr.responseText);
        alert("AJAX error occurred.");
      }
    });
  });
});
</script>
<?php
    $this->load->view('master_pages/footer');
?>
