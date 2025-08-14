<?php 

defined('BASEPATH') OR exit('no direct script access allowed');

/**
 * 
 */
class ReportController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function salesReport()
	{
		$this->load->view('reports/sales_report');
	}

	function purchaseReport()
	{
		$this->load->view('reports/purchase_report');
	}

	function inventoryReport()
	{
		$this->load->view('reports/inventory_report');
	}

	function profitlossReport()
	{
		$this->load->view('reports/profit_loss_report');
	}
	
}
?>