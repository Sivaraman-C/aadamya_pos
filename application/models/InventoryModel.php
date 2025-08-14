<?php 

defined('BASEPATH') OR exit('no direct script access allowed');

/**
 * 
 */
class InventoryModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

public function addData()
{
    // Collect form data
    $productName = $_POST['productName'];
    $category = $_POST['productCategory'];
    $brand = $_POST['productBrand'];
    $quantity = $_POST['productQty'];
    $price = $_POST['productPrice'];
    $totalprice = $_POST['totalunitPrice'];
    $discount = $_POST['discountPercentage'];
    $discAmount = $_POST['discountAmount'];
    $finalPrice = $_POST['finalPrice'];

    // Configure image upload
    $config['upload_path'] = 'modules/gallery/';
    $config['file_name'] = uniqid() . "_" . preg_replace('/\s+/', '_', $_FILES['productImage']['name']);
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['overwrite'] = FALSE;
    $config['remove_spaces'] = TRUE;

    // Load the upload library
    $this->load->library('upload', $config);

    // Only proceed if the "Add Product" button was clicked
    if (isset($_POST['addProduct'])) {
        if (!empty($_FILES['productImage']['name'])) {
            // Attempt to upload
            if ($this->upload->do_upload('productImage')) {
                // Success: get uploaded file details
                $uploadData = $this->upload->data();
                $imageAddress = base_url() . $config['upload_path'] . $uploadData['file_name'];

                // Prepare data for DB
                $productData = array(
                    'product_name' => $productName,
                    'category' => $category,
                    'brand' => $brand,
                    'quantity' => $quantity,
                    'unit_price' => $price,
                    'total_unit_price' => $totalprice,
                    'discount' => $discount,
                    'discount_amount' => $discAmount,
                    'final_price' => $finalPrice,
                    'image' => $imageAddress
                );

                // Insert into DB
                $this->db->insert('product', $productData);

                echo "<script>alert('Product uploaded successfully'); window.location.href='" . base_url('product_list') . "'</script>";
            } else {
                // Upload failed — show error
                $error = $this->upload->display_errors('', '');
                echo "<script>alert('Image upload failed: $error');</script>";
            }
        } else {
            echo "<script>alert('No image selected');</script>";
        }
    }
}

	public function editProductview()
	{
	    return $this->db->get_where('product', ['id' => $id])->row();
	}

	public function updateProduct()
	{
	    $pid = $_GET['id'];

	    $productName  = $_POST['productName'];
	    $category     = $_POST['productCategory'];
	    $brand        = $_POST['productBrand'];
	    $quantity     = $_POST['productQty'];
	    $price        = $_POST['productPrice'];
    	$totalprice   = $_POST['totalunitPrice'];
	    $discount     = $_POST['discountPercentage'];
	    $discAmount   = $_POST['discountAmount'];
	    $finalPrice   = $_POST['finalPrice'];

	    $query = $this->db->query("SELECT image FROM product WHERE id = '$pid'");
	    $row = $query->row();
	    $existingImage = ($row) ? $row->image : '';

	    $config['upload_path'] = 'modules/gallery/';
	    $config['file_name'] = uniqid() . "_" . preg_replace('/\s+/', '_', $_FILES['productImage']['name']);
	    $config['allowed_types'] = 'jpg|jpeg|png';
	    $config['overwrite'] = FALSE;
	    $config['remove_spaces'] = TRUE;

	    $this->load->library('upload', $config);

	    $imageAddress = $existingImage;

	    if (!empty($_FILES['productImage']['name']))
	    {
	        if ($this->upload->do_upload('productImage'))
	        {
	            $imageAddress = base_url() . $config['upload_path'] . $config['file_name'];
	        }
	        else
	        {
	            echo "<script>alert('Image upload failed: " . $this->upload->display_errors('', '') . "');</script>";
	        }
	    }


	    if (isset($_POST['updateProduct']))
	    {
	        $this->db->query("UPDATE product SET product_name = '$productName', category = '$category', brand = '$brand', quantity = '$quantity', unit_price = '$price', total_unit_price = '$totalprice', discount = '$discount', discount_amount = '$discAmount', final_price = '$finalPrice', image = '$imageAddress' WHERE id = '$pid'");

	        echo "<script>alert('Product Updated successfully');window.location.href='" . base_url('product_list') . "'</script>";
	    }
	    else
	    {
	        echo "<script>alert('Product Update Failed');window.location.href='" . base_url('edit_product' . $pid) . "'</script>";
	    }
	}

	public function productDelete()
	{
		$pid = $_GET['id'];
	    return $this->db->where('id', $pid)->delete('product');
	}

	public function viewDetails()
{
	$pid = $_GET['id'];
    return $this->db->get_where('product', ['id' => $pid])->row();
}



}

?>