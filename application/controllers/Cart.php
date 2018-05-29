<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('cart_checkout_model');
		$this->load->model('cart_model');
		$this->load->model('member_address_model');
		$this->load->model('product_category_model');
		$this->load->model('product_model');
		$this->load->model('provinsi_model');
		
		if ($this->session->userdata('is_login_web') == FALSE)
		{
			$response = array();
			$response['title'] = 'Keranjang Belanja';
			$response['type'] = 'info';
			$response['text'] = 'Mohon login terlebih dahulu';
			$response['redirect'] = $this->config->item('link_login');
			
			echo json_encode($response);
			exit();
		}
    }
	
	function cart_create()
	{
		if ($this->input->post('quantity') == 0)
		{
			$response = array('title' => 'Keranjang Belanja', 'type' => 'error', 'text' => 'Kuantitas barang tidak bisa kosong.');
		}
		else
		{
			$id_product = $this->input->post('id_product');
			
			$param3 = array();
			$param3['id_member'] = $this->session->userdata('id_member');
			$param3['status'] = 1;
			$query4 = $this->cart_model->info($param3);
			
			if ($query4->num_rows() > 0)
			{
				$id_cart_checkout = $query4->row()->id_cart_checkout;
			}
			else
			{
				// create id_cart_checkout
				$param2 = array();
				$param2['subtotal'] = 0;
				$param2['shipment_cost'] = 0;
				$param2['total'] = 0;
				$param2['status'] = 1;
				$param2['created_date'] = date('Y-m-d H:i:s');
				$param2['updated_date'] = date('Y-m-d H:i:s');
				$query = $this->cart_checkout_model->create($param2);
				
				if ($query != 0 || $query != '')
				{
					$id_cart_checkout = $query;
				}
			}
			
			$param = array();
			$param['id_product'] = $id_product;
			$param['id_member'] = $this->session->userdata('id_member');
			$param['id_cart_checkout'] = $id_cart_checkout;
			$param['quantity'] = $this->input->post('quantity');
			$param['total'] = $this->input->post('quantity') * $this->input->post('price');
			$param['status'] = 1;
			$param['created_date'] = date('Y-m-d H:i:s');
			$param['updated_date'] = date('Y-m-d H:i:s');
			$query2 = $this->cart_model->create($param);
			
			// Kurangi stok
			$stok_sisa = $this->input->post('stock') - $this->input->post('quantity');
			$query3 = $this->product_model->update($id_product, array('stock' => $stok_sisa));
			
			if ($query2 > 0)
			{
				$response = array('title' => 'Keranjang Belanja', 'type' => 'success', 'text' => 'Barang berhasil dimasukkan ke keranjang belanja.');
			}
			else
			{
				$response = array('title' => 'Keranjang Belanja', 'type' => 'error', 'text' => 'Barang gagal dimasukkan ke keranjang belanja.');
			}
		}
		
		echo json_encode($response);
		exit();
	}

    function cart_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = '';

        $get = $this->cart_model->info(array('id_cart' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete'))
            {
                $query = $this->cart_model->delete($data['id']);

                if ($query > 0)
                {
                    $response = array('title' => 'Keranjang Belanja', 'type' => 'success', 'text' => 'Berhasil hapus keranjang belanja.');
                }
                else
                {
                    $response = array('title' => 'Keranjang Belanja', 'type' => 'error', 'text' => 'Gagal hapus keranjang belanja.');
                }

                echo json_encode($response);
                exit();
            }
            else
            {
                $this->display_view('delete_confirm', $data);
            }
        }
        else
        {
            echo "Data Not Found";
        }
    }
	
	function cart_shipment()
	{
		$query2 = $this->member_address_model->info(array('id_member' => $this->session->userdata('id_member')));
		
		if ($query2->num_rows() > 0)
		{
			$param2 = array();
			$param2['id_provinsi'] = $this->input->post('id_provinsi');
			$param2['address'] = $this->input->post('address');
			$param2['updated_date'] = date('Y-m-d H:i:s');
			$query3 = $this->member_address_model->update($query2->row()->id_member_address, $param2);
			
			$shipment_cost = $query2->row()->price;
		}
		else
		{
			$param = array();
			$param['id_provinsi'] = $this->input->post('id_provinsi');
			$param['id_member'] = $this->session->userdata('id_member');
			$param['address'] = $this->input->post('address');
			$param['created_date'] = date('Y-m-d H:i:s');
			$param['updated_date'] = date('Y-m-d H:i:s');
			$query = $this->member_address_model->create($param);
			
			$query6 = $this->provinsi_model->info(array('id_provinsi' => $this->input->post('id_provinsi')));
			$shipment_cost = $query6->row()->price;
		}
		
		$param3 = array();
		$param3['id_member'] = $this->session->userdata('id_member');
		$param3['status'] = 1;
		$query4 = $this->cart_model->info($param3);
		
		$param4 = array();
		$param4['shipment_cost'] = $shipment_cost;
		$param4['total'] = $shipment_cost + $this->input->post('subtotal');
		$query5 = $this->cart_checkout_model->update($query4->row()->id_cart_checkout, $param4);
		
		$response = array();
		$response['title'] = 'Pengiriman';
		$response['type'] = 'success';
		$response['text'] = 'Data pengiriman berhasil di update.';
		$response['shipping'] = 'Rp '.number_format($shipment_cost,0,',','.');
		$response['total_order'] = 'Rp '.number_format($param4['total'],0,',','.');
		
		echo json_encode($response);
		exit();
	}

    function index()
	{
		$data = array();
		
		$param3 = array();
		$param3['limit'] = 20;
		$param3['offset'] = 0;
		$param3['order'] = 'created_date';
		$param3['sort'] = 'desc';
		$param3['id_member'] = $this->session->userdata('id_member');
		$param3['status'] = 1;
		$query3 = $this->cart_model->lists($param3);
		
		$cart = array();
		$cart_checkout = array();
		$subtotal = 0;
		if ($query3->num_rows() > 0)
		{
			foreach ($query3->result() as $row)
			{
				$query = $this->product_model->info(array('id_product' => $row->id_product));
				$query2 = $this->product_category_model->info(array('id_product_category' => $query->row()->id_product_category));
				$subtotal += $row->total;
				
				$temp = array();
				$temp['id_cart'] = $row->id_cart;
				$temp['quantity'] = $row->quantity;
				$temp['total'] = 'Rp '.number_format($row->total,0,',','.');
				$temp['product'] = array(
					'name' => ucwords($query->row()->name),
					'slug' => $query->row()->slug,
					'photo' => $query->row()->photo,
					'price' => 'Rp '.number_format($query->row()->price,0,',','.')
				);
				$temp['product_category'] = array(
					'slug' => $query2->row()->slug
				);
				
				$cart[] = $temp;
			}
			
			// checkout
			$query6 = $this->cart_checkout_model->info(array('id_cart_checkout' => $query3->row()->id_cart_checkout));
			
			if ($query6->num_rows() > 0)
			{
				$cart_checkout = $query6->row_array();
			}
		}
		
		// shipment
		$member_address = array();
		$query5 = $this->member_address_model->info(array('id_member' => $this->session->userdata('id_member')));
		
		if ($query5->num_rows() > 0)
		{
			$member_address = $query5->row_array();
		}
			
		// provinsi
		$param = array();
		$param['limit'] = 20;
		$param['offset'] = 0;
		$param['order'] = 'name';
		$param['sort'] = 'asc';
		$query4 = $this->provinsi_model->lists($param);
		
		if ($query4->num_rows() > 0)
		{
			$data['provinsi_lists'] = $query4->result();
		}
		//print_r($cart_checkout);die();
		$data['cart_checkout'] = $cart_checkout;
		$data['member_address'] = $member_address;
		$data['subtotal'] = $subtotal;
		$data['cart'] = $cart;
		$data['view_content'] = 'web/cart/index';
		$this->display_view('web/templates/frame', $data);
	}
	
	function order()
	{
		$data = array();
		$id_cart_checkout = $this->input->post('id_cart_checkout');
		
		$param = array();
		$param['subtotal'] = $this->input->post('subtotal');
		$param['status'] = 2;
		$query = $this->cart_checkout_model->update($id_cart_checkout, $param);
		
		$param3 = array();
		$param3['limit'] = 20;
		$param3['offset'] = 0;
		$param3['order'] = 'created_date';
		$param3['sort'] = 'desc';
		$param3['id_cart_checkout'] = $id_cart_checkout;
		$param3['status'] = 1;
		$query3 = $this->cart_model->lists($param3);
		
		if ($query3->num_rows() > 0)
		{
			foreach ($query3->result() as $row)
			{
				$param2 = array();
				$param2['status'] = 2;
				$query2 = $this->cart_model->update($row->id_cart, $param2);
			}
		}
				
		$data['view_content'] = 'web/cart/order';
		$this->display_view('web/templates/frame', $data);
	}
}
