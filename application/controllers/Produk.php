<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('comment_model');
		$this->load->model('member_model');
		$this->load->model('product_category_model');
		$this->load->model('product_model');
    }

    function index()
	{
		if ($this->uri->segment(3) == FALSE) // produk slug
		{
			$this->produk_kategori_lists($this->uri->segment(2));
		}
		else
		{
			$this->produk_detail($this->uri->segment(3));
		}
	}
	
	function produk_detail($slug)
	{
		$data = array();
		$comment = array();
		
		$query = $this->product_model->info(array('slug' => $slug));
		
		if ($query->num_rows() > 0)
		{
			$data['product'] = $query->row();
			
			// Produk Lainnya
			$param = array();
			$param['limit'] = 4;
			$param['offset'] = 0;
			$param['order'] = 'rand()';
			$param['sort'] = 'desc';
			$param['id_seller'] = $query->row()->id_seller;
			$query2 = $this->product_model->lists($param);
			
			if ($query2->num_rows() > 0)
			{
				$product_lists = array();
				foreach ($query2->result() as $row)
				{
					$query3 = $this->product_category_model->info(array('id_product_category' => $row->id_product_category));
					$explode = explode('.', $row->photo);
					
					if (is_bool(LOCALHOST) || LOCALHOST == 'localhost')
					{
						$photo_small = $explode[0].'_261x261.'.$explode[1];
					}
					else
					{
						$photo_small = $explode[0].'.'.$explode[1].'_261x261.'.$explode[2];
					}
					
					$temp = array();
					$temp['slug'] = $row->slug;
					$temp['name'] = ucwords($row->name);
					$temp['photo'] = $photo_small;
					$temp['price'] = 'Rp '.number_format($row->price,0,',','.');
					$temp['product_category_slug'] = $query3->row()->slug;
					$product_lists[] = $temp;
				}
				
				$data['product_lists'] = $product_lists;
			}
			
			// Komentar
			$param2 = array();
			$param2['limit'] = 4;
			$param2['offset'] = 0;
			$param2['order'] = 'rand()';
			$param2['sort'] = 'desc';
			$param2['id_product'] = $query->row()->id_product;
			$query4 = $this->comment_model->lists($param2);
			
			if ($query4->num_rows() > 0)
			{
				foreach ($query4->result() as $row)
				{
					$query5 = $this->member_model->info(array('id_member' => $row->id_member));
					
					$temp2 = array();
					$temp2['member_name'] = $query5->row()->name;
					$temp2['message'] = $row->message;
					$comment[] = $temp2;
				}
			}
		}
		
		$data['comment'] = $comment;
		$data['view_content'] = 'web/produk/produk_detail';
		$this->display_view('web/templates/frame', $data);
	}
	
	function produk_kategori_lists($slug)
	{
		$data = array();
		$offset = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
		
		$query = $this->product_category_model->info(array('slug' => $slug));
		
		if ($query->num_rows() > 0)
		{
			$product_category = $query->row();
			
			$param = array();
			$param['limit'] = 8;
			$param['offset'] = $offset;
			$param['order'] = 'created_date';
			$param['sort'] = 'desc';
			$param['id_product_category'] = $product_category->id_product_category;
			$query2 = $this->product_model->lists($param);
			
			if ($query2->num_rows() > 0)
			{
				$data['count'] = count($query2->result()) + $offset;
				$data['offset'] = $offset + 1;
				
				$product = array();
				foreach ($query2->result() as $row)
				{
					$explode = explode('.',$row->photo);
					
					if (is_bool(LOCALHOST) || LOCALHOST == 'localhost')
					{
						$photo_small = $explode[0].'_261x261.'.$explode[1];
					}
					else
					{
						$photo_small = $explode[0].'.'.$explode[1].'_261x261.'.$explode[2];
					}
					
					$temp = array();
					$temp['photo'] = $photo_small;
					$temp['slug'] = $row->slug;
					$temp['name'] = $row->name;
					$temp['price'] = $row->price;
					$product[] = $temp;
				}
				
				// Total
				$query3 = $this->product_model->lists_count(array('id_product_category' => $product_category->id_product_category));
				
				// Pagination
				$this->load->library('pagination');
		
				$config['base_url'] = $this->config->item('link_produk').'/'.$slug;
				$config['total_rows'] = $query3;
				$config['per_page'] = $param['limit'];
				
				$this->pagination->initialize($config);
				
				$data['total'] = $query3;
				$data['product'] = $product;
				$data['product_category'] = $product_category;
				$data['view_content'] = 'web/produk/produk_kategori_lists';
				$this->display_view('web/templates/frame', $data);
			}
			else
			{
				redirect(base_url());
			}
		}
		else
		{
			redirect(base_url());
		}
	}
}
