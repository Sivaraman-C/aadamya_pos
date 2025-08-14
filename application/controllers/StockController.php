<?php 

defined('BASEPATH') OR exit ('no direct script access allowed');


/**
 * 
 */
class StockController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function manageStock()
	{
		$this->load->model('PosModel');
		$data['product'] = $this->PosModel->display_record();
		$this->load->view('stock/manage-stock', $data);
	}

	public function EditingStocks()
	{
		$this->load->model('StockModel');
		$this->StockModel->editStock();
	}

	public function updateStocks()
	{
	    $this->load->model('StockModel');
	    $this->StockModel->stockUpdate();
	    
	}

	public function deleteStock()
	{
	    $this->load->model('StockModel');
	    $this->StockModel->stockDelete();
	    redirect(base_url('manage-stock'));
	}

	public function stockAdjustment()
	{
		$this->load->view('stock/stock-adjustment');
	}

	public function stockTransfer()
	{
		$this->load->view('stock/stock-transfer');
	}

}


?>