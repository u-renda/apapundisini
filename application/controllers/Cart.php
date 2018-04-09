<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('product_model');
    }

    function index()
	{
		$data = array();
		
		$data['view_content'] = 'web/cart/index';
		$this->display_view('web/templates/frame', $data);
	}
}
