<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('product_category_model');
		$this->load->model('product_model');
		$this->load->model('seller_model');
		$this->load->model('slider_model');
    }

    function index()
	{
		$data = array();
		
		// SLIDER
		$param = array();
		$param['limit'] = 3;
		$param['offset'] = 0;
		$param['order'] = 'created_date';
		$param['sort'] = 'desc';
		$query = $this->slider_model->lists($param);
		
		$slider = array();
		if ($query->num_rows() > 0)
		{
			 $slider = $query->result();
		}
		
		// PRODUCT
		$param2 = array();
		$param2['limit'] = 6;
		$param2['offset'] = 0;
		$param2['order'] = 'rand()';
		$param2['sort'] = 'desc';
		$query2 = $this->product_model->lists($param2);
		
		if ($query2->num_rows() > 0)
		{
			 $product = $query2->result();
			 
			 $result = array();
			 foreach ($product as $row)
			 {
				$query4 = $this->product_category_model->info(array('id_product_category' => $row->id_product_category));
				
				if ($query4->num_rows() > 0)
				{
					$product_category = $query4->row();
					$explode = explode('.',$row->photo);
					
					if (is_bool(LOCALHOST) || LOCALHOST == 'localhost')
					{
						$photo_small = $explode[0].'_165x165.'.$explode[1];
					}
					else
					{
						$photo_small = $explode[0].'.'.$explode[1].'_165x165.'.$explode[2];
					}
					
					$result[] = array(
						'id_product' => $row->id_product,
						'name' => $row->name,
						'slug' => $row->slug,
						'price' => $row->price,
						'photo' => $row->photo,
						'stock' => $row->stock,
						'description' => $row->description,
						'created_date' => $row->created_date,
						'updated_date' => $row->updated_date,
						'photo_small' => $photo_small,
						'product_category' => array(
							'name' => $product_category->name,
							'slug' => $product_category->slug
						)
					);
				}
				
			 }
		}
		
		// SELLER'S LOGO
		$param3 = array();
		$param3['limit'] = 6;
		$param3['offset'] = 0;
		$param3['order'] = 'rand()';
		$param3['sort'] = 'desc';
		$param3['logo_not'] = '';
		$query3 = $this->seller_model->lists($param3);
		
		$seller = array();
		if ($query3->num_rows() > 0)
		{
			 $seller = $query3->result();
		}
		
		$data['slider'] = $slider;
		$data['product'] = $result;
		$data['seller'] = $seller;
		$data['view_content'] = 'web/beranda/index';
		$this->display_view('web/templates/frame', $data);
	}
}
