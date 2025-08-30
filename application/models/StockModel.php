<?php 

defined('BASEPATH') OR exit('no direct script access allowed');

/**
 * 
 */
class StockModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function editStock()
	{
	    return $this->db->get_where('product', ['id' => $id])->row();
	}

	public function stockUpdate()
	{
	    $pid = $_GET['id'];

	    $productName  = $_POST['productName'];
	    $category     = $_POST['productCategory'];
	    $brand        = $_POST['productBrand'];
	    $quantity     = $_POST['productQty'];

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
	        $this->db->query("UPDATE product SET product_name = '$productName', category = '$category', brand = '$brand', quantity = '$quantity',image = '$imageAddress' WHERE id = '$pid'");

	        echo "<script>alert('Product Updated successfully');window.location.href='" . base_url('product_list') . "'</script>";
	    }
	    else
	    {
	        echo "<script>alert('Product Update Failed');window.location.href='" . base_url('edit_product' . $pid) . "'</script>";
	    }
	}

	public function stockDelete()
	{
	    $pid = $_GET['id'];

	    // Step 1: Delete the dependent order items first
	    $this->db->where('product_id', $pid);
	    $this->db->delete('order_items');

	    // Step 2: Delete the product
	    return $this->db->where('id', $pid)->delete('product');
	}




}

?>