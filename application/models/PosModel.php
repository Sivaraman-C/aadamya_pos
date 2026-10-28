<?php 

defined('BASEPATH') OR exit('no direct script access allowed');

/**
 * 
 */
class PosModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function addCustomer()
	{
		$customerName = $_POST['customerName'];
		$contact = $_POST['Contact'];
		$address = $_POST['Address'];
		$city = $_POST['City'];
		$country = $_POST['Country'];

		if(isset($_POST['addCustomer']))
		{
				$productData = array(
					'name' => $customerName,
					'contact' => $contact,
					'address' => $address,
					'city' => $city,
					'country' => $country);
				$this->db->insert('customer',$productData);
				
				echo "<script>alert('Customer added successfully');window.location.href='" . base_url('Pointofsales') . "'</script>";
			
		}else
			{
				echo "<script>alert('Failed Customer Creation')</script>";
			}
	}

	public function getCategoryCounts()
    {
        $this->db->select('category, COUNT(*) as count');
        $this->db->from('product');
        $this->db->group_by('category');
        $query = $this->db->get();

        $counts = ['All' => 0];
        foreach ($query->result_array() as $row) {
            $category = trim($row['category']);
            $counts[$category] = (int) $row['count'];
            $counts['All'] += (int) $row['count'];
        }

        return $counts;
    }

public function save_order_and_update_stock($data) {
        // Start transaction
        $this->db->trans_start();

        // Insert the order into the 'orders' table
        $order = [
            'customer_id'   => $data['customer_id'],
            'invoice_number' => $data['invoice_number'],
            'subtotal'      => $data['subtotal'],
            'gst'           => $data['tax'],
            'shipping'      => $data['shipping'],
            'discount'      => $data['discount'],
            'grand_total'   => $data['grand_total'],
            'created_at'    => date('Y-m-d H:i:s')
        ];
        $this->db->insert('orders', $order);
        $order_id = $this->db->insert_id(); // Get the inserted order ID

        // Insert the order items into the 'order_items' table
        foreach ($data['products'] as $product) {
            $orderItem = [
                'order_id'     => $order_id,
                'product_id'   => $product['product_id'],
                'product_name' => $product['name'],
                'qty'          => $product['qty'],
                'price'        => $product['price'],
            ];
            $this->db->insert('order_items', $orderItem);

            // Update product quantity in the 'products' table
            $this->db->set('quantity', 'quantity - ' . (int)$product['qty'], FALSE);
            $this->db->where('id', $product['product_id']);
            $this->db->update('product');
        }

        // Complete the transaction
        $this->db->trans_complete();

        // Check if the transaction was successful
        if ($this->db->trans_status() === FALSE) {
            return ['success' => false, 'message' => 'Error processing the order'];
        }

        return ['success' => true, 'message' => 'Invoice saved and stock updated successfully'];
    }


    public function reduceStock($productId, $qty)
{
    if ($qty <= 0 || $productId <= 0) return;

    $this->db->where('id', $productId);
    $this->db->where('quantity >=', $qty); // prevent negative stock
    $this->db->set('quantity', 'quantity - ' . (int)$qty, false);
    $this->db->update('product');
}


	public function display_record()
	{
		$query = $this->db->get('product');
		return $query->result();
	}
	public function Pos_Elect()
	{
	    $this->db->where('category', 'Headset');
	    $query = $this->db->get('product');
	    return $query->result();
	}
	public function Pos_phone()
	{
	    $this->db->where('category', 'Mobile');
	    $query = $this->db->get('product');
	    return $query->result();
	}
	public function Pos_laptop()
	{
	    $this->db->where('category', 'Laptop');
	    $query = $this->db->get('product');
	    return $query->result();
	}
	public function Pos_watch()
	{
	    $this->db->where('category', 'Watch');
	    $query = $this->db->get('product');
	    return $query->result();
	}

	public function save_order($data, $items)
    {
        $this->db->insert('orders', $data);
        $order_id = $this->db->insert_id();

        foreach ($items as $item) {
            $item['order_id'] = $order_id;
            $this->db->insert('order_items', $item);
        }

        return $order_id;
    }

    public function saveCheckoutCustomer($data)
    {
        $name = trim((string) ($data['name'] ?? ''));
        $contact = trim((string) ($data['contact'] ?? ''));

        if ($name === '' || $contact === '') {
            return ['status' => 'error', 'message' => 'Enter customer name and phone number.'];
        }

        $customerData = [
            'name' => $name,
            'contact' => $contact,
            'address' => trim((string) ($data['address'] ?? '')),
            'city' => trim((string) ($data['city'] ?? '')),
            'country' => trim((string) ($data['country'] ?? ''))
        ];

        if (!$this->db->insert('customer', $customerData)) {
            return ['status' => 'error', 'message' => 'Could not save customer information.'];
        }

        return ['status' => 'success', 'customer_id' => (int) $this->db->insert_id(), 'customer_name' => $name];
    }

    public function saveCheckout($data)
    {
        if (!is_array($data) || empty($data['order']) || empty($data['items']) || !is_array($data['items'])) {
            return ['status' => 'error', 'message' => 'Order and at least one item are required.'];
        }

        $order = $data['order'];
        $this->db->trans_begin();

        $customerId = (int) ($order['customer_id'] ?? 0);
        $customerName = 'Walk-in Customer';
        $contact = '';

        if (!empty($data['customer']) && is_array($data['customer'])) {
            $newCustomer = $data['customer'];
            $customerName = trim((string) ($newCustomer['name'] ?? ''));
            $contact = trim((string) ($newCustomer['contact'] ?? ''));

            if ($customerName === '' || $contact === '') {
                $this->db->trans_rollback();
                return ['status' => 'error', 'message' => 'Enter the new customer name and phone number.'];
            }

            if ($customerId > 0) {
                $savedCustomer = $this->db->get_where('customer', ['id' => $customerId])->row();
                if (!$savedCustomer) {
                    $this->db->trans_rollback();
                    return ['status' => 'error', 'message' => 'The newly saved customer could not be found.'];
                }
                $customerName = $savedCustomer->name;
                $contact = $savedCustomer->contact;
            } else {
                $customerData = [
                    'name' => $customerName,
                    'contact' => $contact,
                    'address' => trim((string) ($newCustomer['address'] ?? '')),
                    'city' => trim((string) ($newCustomer['city'] ?? '')),
                    'country' => trim((string) ($newCustomer['country'] ?? ''))
                ];

                if (!$this->db->insert('customer', $customerData)) {
                    $this->db->trans_rollback();
                    return ['status' => 'error', 'message' => 'Could not save customer information.'];
                }

                $customerId = (int) $this->db->insert_id();
            }
        } elseif ($customerId > 0) {
            $customer = $this->db->get_where('customer', ['id' => $customerId])->row();
            if (!$customer) {
                $this->db->trans_rollback();
                return ['status' => 'error', 'message' => 'Selected customer was not found.'];
            }
            $customerName = $customer->name;
            $contact = $customer->contact;
        }

        $orderData = [
            'customer_id' => $customerId,
            'customer_name' => $customerName,
            'contact' => $contact,
            'order_date' => date('Y-m-d H:i:s'),
            'subtotal' => (string) (float) ($order['subtotal'] ?? 0),
            'discount' => (string) (float) ($order['discount'] ?? 0),
            'shipping' => (string) (float) ($order['shipping'] ?? 0),
            'tax' => (string) (float) ($order['tax'] ?? 0),
            'grand_total' => (string) (float) ($order['grand_total'] ?? 0),
            'invoice_number' => trim((string) ($order['invoice_number'] ?? ''))
        ];

        if ($orderData['invoice_number'] === '' || !$this->db->insert('orders', $orderData)) {
            $this->db->trans_rollback();
            return ['status' => 'error', 'message' => 'Could not save the order.'];
        }

        $orderId = (int) $this->db->insert_id();
        $orderItems = [];

        foreach ($data['items'] as $item) {
            $productId = (int) ($item['product_id'] ?? 0);
            $quantity = (int) ($item['quantity'] ?? 0);
            if ($productId <= 0 || $quantity <= 0) {
                $this->db->trans_rollback();
                return ['status' => 'error', 'message' => 'An order item has an invalid product or quantity.'];
            }

            $product = $this->db->get_where('product', ['id' => $productId])->row();
            if (!$product) {
                $this->db->trans_rollback();
                return ['status' => 'error', 'message' => 'A selected product could not be found.'];
            }

            if ((int) $product->quantity < $quantity) {
                $this->db->trans_rollback();
                return ['status' => 'error', 'message' => 'Insufficient stock for ' . $product->product_name . '.'];
            }

            $price = (float) $product->unit_price;
            $orderItems[] = [
                'order_id' => $orderId,
                'product_id' => $productId,
                'product_name' => $product->product_name,
                'price' => (string) $price,
                'quantity' => $quantity,
                'total' => round($price * $quantity, 2)
            ];
        }

        if (!$this->db->insert_batch('order_items', $orderItems)) {
            $this->db->trans_rollback();
            return ['status' => 'error', 'message' => 'Could not save the order items.'];
        }

        foreach ($orderItems as $item) {
            $this->db->set('quantity', 'quantity - ' . (int) $item['quantity'], false);
            $this->db->where('id', $item['product_id']);
            $this->db->where('quantity >=', (int) $item['quantity']);
            $this->db->update('product');

            if ($this->db->affected_rows() !== 1) {
                $this->db->trans_rollback();
                return ['status' => 'error', 'message' => 'Stock changed during checkout. Please try again.'];
            }
        }

        $paymentData = [
            'customer_id' => $customerId,
            'order_id' => (string) $orderId,
            'payment_id' => 'POS-' . $orderData['invoice_number'],
            'amount' => (float) $orderData['grand_total'],
            'status' => 'completed',
            'created_at' => date('Y-m-d H:i:s')
        ];

        if (!$this->db->insert('payments', $paymentData)) {
            $this->db->trans_rollback();
            return ['status' => 'error', 'message' => 'Could not save the payment record.'];
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return ['status' => 'error', 'message' => 'Checkout failed; no order was saved.'];
        }

        $this->db->trans_commit();
        return ['status' => 'success', 'order_id' => $orderId, 'customer_id' => $customerId];
    }

    public function handleOrder($data)
    {
        if (empty($data['products']) || !is_array($data['products'])) {
            return ['success' => false, 'message' => 'Invalid order data'];
        }

        $this->load->model('Product_model');

        // Generate Invoice Number
        $invoiceNo = 'INV' . date('YmdHis');

        // Prepare order data
        $orderData = [
            'customer_id'    => $data['customer_id'] ?? 0,
            'subtotal'       => $data['subtotal'] ?? 0,
            'gst'            => $data['gst'] ?? 0,
            'shipping'       => $data['shipping'] ?? 0,
            'discount'       => $data['discount'] ?? 0,
            'grand_total'    => $data['grand_total'] ?? 0,
            'order_date'     => date('Y-m-d H:i:s'),
            'invoice_number' => $invoiceNo
        ];

        // Insert into orders table
        $this->db->insert('orders', $orderData);
        $orderId = $this->db->insert_id();

        // Update stock for each product
        foreach ($data['products'] as $product) {
            $productId = (int) $product['id'];
            $qty       = (int) $product['qty'];

            if ($productId > 0 && $qty > 0) {
                $this->Product_model->reduceStock($productId, $qty);
            }
        }

        // Return response
        return [
            'success'     => true,
            'invoice_no'  => $invoiceNo,
            'date'        => date('d M Y, h:i A'),
            'order_id'    => $orderId
        ];
    }

        public function save_order_items($data) {
        return $this->db->insert_batch('order_items', $data);
    }

}

?>