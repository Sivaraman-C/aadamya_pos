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