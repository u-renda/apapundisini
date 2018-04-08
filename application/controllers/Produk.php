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
			$this->produk_lists($this->uri->segment(3));
		}
	}
	
	function produk_kategori_lists($slug)
	{
		$data = array();
		
		$query = $this->product_category_model->info(array('slug' => $slug));
		
		if ($query->num_rows() > 0)
		{
			$data['product_category'] = $query->row();
		}
		
		$data['view_content'] = 'web/produk/produk_kategori_lists';
		$this->display_view('web/templates/frame', $data);
	}
	
	function produk_lists($slug)
	{
		
	}
}
