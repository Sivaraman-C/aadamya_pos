<?php 

defined('BASEPATH') OR exit('no direct script access allowed');

/**
 * 
 */
class InventoryController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	// Add products
	public function loadProductsPage()
	{
		$this->load->view('inventory/add_product');
	}
	public function loadProducts()
	{
		$this->load->model('InventoryModel');
		$this->InventoryModel->addData();
	}

	//Display products
	public function displayProduct()
	{
	    $this->load->view('inventory/product_list', $data);
	}

	public function viewDetails()
	{
	    $id = $this->input->get('id');

	    $this->load->model('InventoryModel');
	    $data['product'] = $this->InventoryModel->viewDetails($id);

	    $this->load->view('inventory/product_details', $data);
	}

	public function showEditingProducts()
	{
		$this->load->view('inventory/edit_product');
	}

	public function UpdateProduct()
	{
	    $this->load->model('InventoryModel');
	    $this->InventoryModel->updateProduct();
	    
	}

	public function deleteProduct()
	{
	    $this->load->model('InventoryModel');
	    $this->InventoryModel->productDelete();
	    redirect(base_url('product_list'));
	}





	
}

?>