<?php 

defined('BASEPATH') OR exit('no direct script access allowed');

/**
 * 
 */
class TestController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function showMsg()
	{
		$this->load->model('TestModel');
		$this->TestModel->writeModel();
	}

	public function sample()
	{
		$this->load->view('sampleregister');
		// $this->TestModel->writeModel();
	}
}
?>