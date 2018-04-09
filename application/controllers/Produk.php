<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MY_Controller {

	function __construct()
    {
        parent::__construct();
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
		
		$query = $this->product_model->info(array('slug' => $slug));
		
		if ($query->num_rows() > 0)
		{
			$data['product'] = $query->row();
		}
		
		$data['view_content'] = 'web/produk/produk_detail';
		$this->display_view('web/templates/frame', $data);
	}
	
	function produk_kategori_lists($slug)
	{
		$data = array();
		
		$query = $this->product_category_model->info(array('slug' => $slug));
		
		if ($query->num_rows() > 0)
		{
			$product_category = $query->row();
			
			$param = array();
			$param['limit'] = 20;
			$param['offset'] = 0;
			$param['order'] = 'created_date';
			$param['sort'] = 'desc';
			$param['id_product_category'] = $product_category->id_product_category;
			$query2 = $this->product_model->lists($param);
			
			if ($query2->num_rows() > 0)
			{
				$data['product'] = $query2->result();
			}
			
			$data['product_category'] = $product_category;
		}
		
		$data['view_content'] = 'web/produk/produk_kategori_lists';
		$this->display_view('web/templates/frame', $data);
	}
}
