<?php 

defined('BASEPATH') OR exit ('no direct script access allowed');


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
    $raw = file_get_contents('php://input');
    $data = json_decode($raw, true);

    log_message('debug', 'Incoming Save Request: ' . print_r($data, true));

    if (empty($data['order']) || empty($data['items'])) {
        echo json_encode(['status' => 'error', 'message' => 'Missing order or items']);
        return;
    }

    // Map to actual DB columns
    $orderData = [
        'customer_id'    => $data['order']['customer_id'],
        'customer_name'  => $data['order']['customer_name'],
        'phone'          => $data['order']['phone'],
        'contact'        => $data['order']['contact'],
        'order_date'     => date('Y-m-d H:i:s'), // Use server date
        'subtotal'       => $data['order']['subtotal'],
        'discount'       => $data['order']['discount'],
        'shipping'       => $data['order']['shipping'],
        'tax'            => $data['order']['tax'],
        'grand_total'    => $data['order']['grand_total'],
        'invoice_number' => $data['order']['invoice_number']
    ];

    $insertOrder = $this->db->insert('orders', $orderData);
    $orderId = $this->db->insert_id();

    if (!$insertOrder || !$orderId) {
        log_message('error', 'Failed to insert order: ' . $this->db->last_query());
        echo json_encode(['status' => 'error', 'message' => 'Failed to insert order']);
        return;
    }

    // Prepare order_items
    foreach ($data['items'] as &$item) {
        $item['order_id'] = $orderId;
    }

    $insertItems = $this->db->insert_batch('order_items', $data['items']);

    if (!$insertItems) {
        log_message('error', 'Failed to insert order items: ' . $this->db->last_query());
        echo json_encode(['status' => 'error', 'message' => 'Failed to insert items']);
        return;
    }

    echo json_encode(['status' => 'success', 'order_id' => $orderId]);
}




}


?>