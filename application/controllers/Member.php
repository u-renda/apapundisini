<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('cart_checkout_model');
		$this->load->model('cart_model');
		$this->load->model('member_model');
		$this->load->model('product_model');
    }
	
	function konfirmasi()
	{
		
	}
	
	function profil()
	{
		$data = array();
		$cart_checkout = array();
		
		$param = array();
		$param['limit'] = 20;
		$param['offset'] = 0;
		$param['order'] = 'created_date';
		$param['sort'] = 'desc';
		$param['id_member'] = $this->session->userdata('id_member');
		$query = $this->cart_checkout_model->lists($param);
		
		if ($query->num_rows() > 0)
		{
			$code_cart_status = $this->config->item('code_cart_status');
			
			$i = 1;
			foreach ($query->result() as $row)
			{
				$param2 = array();
				$param2['limit'] = 20;
				$param2['offset'] = 0;
				$param2['order'] = 'created_date';
				$param2['sort'] = 'desc';
				$param2['id_cart_checkout'] = $row->id_cart_checkout;
				$query2 = $this->cart_model->lists($param2);
				
				$product = array();
				if ($query2->num_rows() > 0)
				{
					foreach ($query2->result() as $row2)
					{
						$query3 = $this->product_model->info(array('id_product' => $row2->id_product));
						
						$explode = explode('.', $query3->row()->photo);
						
						if (is_bool(LOCALHOST) || LOCALHOST == 'localhost')
						{
							$photo_small = $explode[0].'_165x165.'.$explode[1];
						}
						else
						{
							$photo_small = $explode[0].'.'.$explode[1].'_165x165.'.$explode[2];
						}
						
						$temp2 = array();
						$temp2['product_name'] = $query3->row()->name;
						$temp2['product_image'] = $photo_small;
						$temp2['product_slug'] = $query3->row()->slug;
						$temp2['product_quantity'] = $row2->quantity;
						$product[] = $temp2;
					}
				}
				
				$temp = array();
				$temp['no'] = $i;
				$temp['id_cart_checkout'] = $row->id_cart_checkout;
				$temp['address'] = $row->id_cart_checkout;
				$temp['created_date'] = date('d M Y', strtotime($row->created_date));
				$temp['status'] = $code_cart_status[$row->status];
				$temp['total'] = 'Rp ' . number_format($row->total, 0, ',', '.');
				$temp['subtotal'] = 'Rp ' . number_format($row->subtotal, 0, ',', '.');
				$temp['shipment_cost'] = 'Rp ' . number_format($row->shipment_cost, 0, ',', '.');
				$temp['product'] = $product;
				$cart_checkout[] = $temp;
				$i++;
			}
		}
		
		$data['cart_checkout'] = $cart_checkout;
		$data['view_content'] = 'web/member/profil';
		$this->display_view('web/templates/frame', $data);
	}
}
