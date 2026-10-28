<?php 

defined('BASEPATH') OR exit ('no direct script access allowed');
require_once APPPATH . '../vendor/autoload.php';

use Razorpay\Api\Api;

/**
 * 
 */
class PosController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function createCustomer()
	{
		$this->load->model('PosModel');
		$this->PosModel->addCustomer();
	}

    public function saveCheckoutCustomer()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->load->model('PosModel');
        $response = $this->PosModel->saveCheckoutCustomer($data);

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

	public function Pointofsales()
	{
		$this->load->model('PosModel');
		
		$data['categoryCounts'] = $this->PosModel->getCategoryCounts();
		$data['allproduct'] = $this->PosModel->display_record();
		$data['electronic'] = $this->PosModel->Pos_Elect();
		$data['phone'] = $this->PosModel->Pos_phone();
		$data['laptop'] = $this->PosModel->Pos_laptop();
		$data['watch'] = $this->PosModel->Pos_watch();

	    $this->load->view('admin_module/pos', $data);
	}
	
public function paymentComplete()
{
    $this->load->model('PosModel');
    
    $data = json_decode(file_get_contents('php://input'), true);

    // Call model function and return its response
    $response = $this->PosModel->handleOrder($data);

    // Send JSON response
    return $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
}


public function save_order_with_items()
{
    $data = json_decode(file_get_contents('php://input'), true);
    $this->load->model('PosModel');
    $response = $this->PosModel->saveCheckout($data);

    return $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
}

// RazorPay

public function createOrder()
{
    $amount = $this->input->post('amount');

    $key = "rzp_test_Sx1LMQsP69j8Lg";
    $secret = "ch6y7QXKbKXjA5Jq7XIKC9F4";

    $api = new Api($key, $secret);

    $order = $api->order->create([
        'receipt' => 'INV' . time(),
        'amount' => $amount * 100,
        'currency' => 'INR'
    ]);

    echo json_encode([
        'order_id' => $order['id'],
        'amount' => $order['amount'],
        'key' => $key
    ]);
}

public function paymentSuccess()
{
    $paymentData = [
        'order_id'   => $this->input->post('order_id'),
        'payment_id' => $this->input->post('payment_id'),
        'amount'     => $this->input->post('amount'),
        'status'     => 'Paid',
        'created_at' => date('Y-m-d H:i:s')
    ];

    $this->db->insert('payments', $paymentData);

    echo json_encode([
        'status' => true
    ]);
}

// Test
public function testRazorpay()
{
    $api = new Api('test', 'test');

    echo "Razorpay SDK Loaded Successfully";
}

}


?>