<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('cart_checkout_model');
		$this->load->model('cart_model');
		$this->load->model('member_address_model');
		$this->load->model('member_model');
		$this->load->model('product_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_admin_login')); }
    }

    function order_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->order_model->info(array('id_order' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete') == TRUE)
            {
                $query = $this->order_model->delete($data['id']);

                if ($query > 0)
                {
                    $response = array('text' => 'Success', 'type' => 'success', 'title' => 'Delete');
                }
                else
                {
                    $response = array('text' => 'Failed', 'type' => 'error', 'title' => 'Delete');
                }

                echo json_encode($response);
                exit();
            }
            else
            {
                $this->load->view('admin/delete_confirm', $data);
            }
        }
        else
        {
            echo "Data Not Found";
        }
    }
	
	function order_detail()
	{
		$data = array();
		$id_cart_checkout = $this->input->get('id_cart_checkout');
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_message('required', '%s harus diisi');
			$this->form_validation->set_message('numeric', '%s harus berisi angka');
			$this->form_validation->set_rules('id_product_category', 'kategori produk', 'required');
			$this->form_validation->set_rules('name', 'nama', 'required');
			$this->form_validation->set_rules('price', 'harga', 'required|numeric');
			$this->form_validation->set_rules('stock', 'stok', 'required|numeric');
			$this->form_validation->set_rules('description', 'keterangan', 'required');
			$this->form_validation->set_rules('produk_url', 'foto', 'callback_check_media');
			
			if ($this->form_validation->run() == TRUE)
			{
				$url_title = url_title(strtolower($this->input->post('name')));
				$query2 = $this->product_model->info(array('slug' => $url_title));
				
				if ($query2->num_rows() > 0)
				{
					$counter = random_string('numeric',5);
					$slug = url_title(strtolower(''.$this->input->post('name').'-'.$counter.''));
				}
				else
				{
					$slug = $url_title;
				}
				
				$param = array();
				$param['id_product_category'] = $this->input->post('id_product_category');
				$param['id_seller'] = $id_seller;
				$param['name'] = $this->input->post('name');
				$param['slug'] = $slug;
				$param['price'] = $this->input->post('price');
				$param['stock'] = $this->input->post('stock');
				$param['description'] = $this->input->post('description');
				$param['photo'] = $this->processMedia;
				$param['created_date'] = date('Y-m-d H:i:s');
				$param['updated_date'] = date('Y-m-d H:i:s');
				$query = $this->product_model->create($param);
				
				if ($query > 0)
				{
					redirect($this->config->item('link_admin_produk').'?msg=success&type=create');
				}
				else
				{
					redirect($this->config->item('link_admin_produk').'?msg=error&type=create');
				}
			}
		}
		
		// Cart checkout
		$code_cart_status = $this->config->item('code_cart_status');
		$query7 = $this->cart_checkout_model->info(array('id_cart_checkout' => $id_cart_checkout));
		
		$cart_checkout = array();
		$cart_checkout['subtotal'] = 'Rp '.number_format($query7->row()->subtotal,0,',','.');
		$cart_checkout['shipment_cost'] = 'Rp '.number_format($query7->row()->shipment_cost,0,',','.');
		$cart_checkout['total'] = 'Rp '.number_format($query7->row()->total,0,',','.');
		$cart_checkout['status'] = $code_cart_status[$query7->row()->status];
		$cart_checkout['status_raw'] = $query7->row()->status;
		
		// Cart lists
		$param2 = array();
		$param2['limit'] = 20;
		$param2['offset'] = 0;
		$param2['order'] = 'created_date';
		$param2['sort'] = 'desc';
		$param2['id_cart_checkout'] = $id_cart_checkout;
		$query3 = $this->cart_model->lists($param2);
		
		if ($query3->num_rows() > 0)
		{
			$id_member = $query3->row()->id_member;
			
			// member
			$query5 = $this->member_model->info(array('id_member' => $id_member));
			
			// member address
			$query4 = $this->member_address_model->info(array('id_member' => $id_member));
			
			$cart = array();
			foreach ($query3->result() as $row)
			{
				// product
				$query6 = $this->product_model->info(array('id_product' => $row->id_product));
				
				$temp = array();
				$temp['id_cart'] = $row->id_cart;
				$temp['quantity'] = $row->quantity;
				$temp['total'] = 'Rp '.number_format($row->total,0,',','.');
				$temp['product_name'] = $query6->row()->name;
				$temp['product_price'] = 'Rp '.number_format($query6->row()->price,0,',','.');
				$cart[] = $temp;
			}
			
			$data['cart'] = $cart;
			$data['member'] = $query5->row();
			$data['member_address'] = $query4->row();
		}
		
		$data['id_cart_checkout'] = $id_cart_checkout;
		$data['cart_checkout'] = $cart_checkout;
		$data['view_content'] = 'admin/order/order_detail';
		$this->load->view('admin/templates/frame', $data);
	}

	function order_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'updated_date';
        $sort = 'desc';
		$status_not = 1;

        $query = $this->cart_checkout_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort, 'status_not' => $status_not));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $query2 = $this->cart_model->info(array('id_cart_checkout' => $row->id_cart_checkout));
			
			$action = '<a title="Edit" href="'.$this->config->item('link_admin_order_update').'?id='.$row->id_cart_checkout.'"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_cart_checkout.'" class="delete '.$row->id_cart_checkout.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			$cart_detail = '<a title="Detail Pesanan" href="'.$this->config->item('link_admin_order_detail').'?id_cart_checkout='.$row->id_cart_checkout.'">#'.$row->id_cart_checkout.'</a>';
			
			$entry = array(
				'No' => $i,
				'Pemesan' => $query2->row()->member_name,
				'KodePemesanan' => $cart_detail,
				'TotalPembelian' => number_format($row->total,0,',','.'),
				'Aksi' => $action
			);
	
			$jsonData['results'][] = $entry;
			$i++;
        }

        echo json_encode($jsonData);
	}

    function order_lists()
	{
		$data = array();
		
		$data['type'] = $this->input->get('type');
		$data['msg'] = $this->input->get('msg');
		$data['view_content'] = 'admin/order/order_lists';
		$this->load->view('admin/templates/frame', $data);
	}
}
