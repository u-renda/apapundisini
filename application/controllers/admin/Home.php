<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		//$this->load->model('product_type_detail_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_admin_login')); }
    }
	
	function check_product_type_lists()
	{
		$id_product_type = $this->input->post('id_product_type');
		
		$param = array();
		$param['limit'] = 20;
		$param['offset'] = 0;
		$param['order'] = 'created_date';
		$param['sort'] = 'desc';
		$param['id_product_type'] = $id_product_type;
		$result = $this->product_type_detail_model->lists($param);
	
		if ($result->num_rows() > 0)
		{
			$data = array();
			$data['product_type_detail_lists'] = $result->result();
			$this->load->view('admin/select_options_product_type_detail', $data);
		}
		else
		{
			echo ''; // gak ditampilin
		}
	}

    function index()
	{
		$data = array();
		
		$data['view_content'] = 'admin/home/index';
		$this->load->view('admin/templates/frame', $data);
	}
}
