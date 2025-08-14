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
    $this->db->trans_start(); // Begin transaction

    $raw = file_get_contents('php://input');
    $data = json_decode($raw, true);

    if (empty($data['order']) || empty($data['items']) || !is_array($data['items'])) {
        echo json_encode(['status' => 'error', 'message' => 'Missing or invalid order or items']);
        $this->db->trans_complete(); // Rollback on failure
        return;
    }

    // Prepare order data
    $orderData = [
        'customer_id'    => $data['order']['customer_id'],
        'customer_name'  => $data['order']['customer_name'],
        'contact'        => $data['order']['contact'],
        'order_date'     => date('Y-m-d H:i:s'),
        'subtotal'       => $data['order']['subtotal'],
        'discount'       => $data['order']['discount'],
        'shipping'       => $data['order']['shipping'],
        'tax'            => $data['order']['tax'],
        'grand_total'    => $data['order']['grand_total'],
        'invoice_number' => $data['order']['invoice_number']
    ];

    // Insert order into orders table
    $this->db->insert('orders', $orderData);
    $orderId = $this->db->insert_id();

    if (!$orderId) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to insert order']);
        $this->db->trans_complete(); // Rollback on failure
        return;
    }

    // Prepare and validate order items
    $orderItems = [];
    foreach ($data['items'] as $item) {
        if (empty($item['product_name']) || !isset($item['quantity'], $item['price'], $item['total'])) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid item data', 'item' => $item]);
            $this->db->trans_complete(); // Rollback on failure
            return;
        }

        // Lookup product ID by product_name
        $this->db->where('product_name', $item['product_name']);
        $product = $this->db->get('product')->row();

        if (!$product) {
            echo json_encode(['status' => 'error', 'message' => "Product not found: {$item['product_name']}"]);
            $this->db->trans_complete(); // Rollback on failure
            return;
        }

        // Prepare order item data
        $orderItems[] = [
            'order_id'   => $orderId,
            'product_id' => $product->id,
            'product_name'=> $product->product_name,
            'quantity'   => $item['quantity'],
            'price'      => $item['price'],
            'total'      => $item['total']
        ];
    }

    // Insert order items into order_items table
    $inserted = $this->db->insert_batch('order_items', $orderItems);
    if (!$inserted) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to insert order items']);
        $this->db->trans_complete(); // Rollback on failure
        return;
    }

    // Update product quantities after the order is placed
    foreach ($orderItems as $item) {
        $this->db->where('id', $item['product_id']);
        $product = $this->db->get('product')->row();

        if ($product) {
            $newQuantity = (int)$product->quantity - (int)$item['quantity'];
            $newQuantity = max(0, $newQuantity);  // Prevent negative stock

            // Update the product's quantity
            $this->db->where('id', $item['product_id']);
            $this->db->update('product', ['quantity' => $newQuantity]);
        }
    }

    // Commit transaction if everything is successful
    $this->db->trans_complete(); // Finalize transaction

    // Check if transaction was successful
    if ($this->db->trans_status() === FALSE) {
        echo json_encode(['status' => 'error', 'message' => 'Transaction failed']);
    } else {
        echo json_encode(['status' => 'success', 'order_id' => $orderId]);
    }
}



}


?>