<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    var $global_data = array();

    function __construct()
    {
        parent::__construct();
    }

    function display_view($view, $local_data = array())
    {
        $this->load->model('product_category_model');
        
		// PRODUCT CATEGORY	
		$param = array();
		$param['limit'] = 10;
		$param['offset'] = 0;
		$param['order'] = 'name';
		$param['sort'] = 'asc';
        $query7 = $this->product_category_model->lists($param);
        
        if ($query7->num_rows() > 0)
        {
			$this->global_data['global_product_category'] = $query7->result();
        }
        
        $data = array_merge($this->global_data, $local_data);
        
        return $this->load->view($view, $data);
    }
}
