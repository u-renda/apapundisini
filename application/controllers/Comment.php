<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('comment_model');
		
		if ($this->session->userdata('is_login_web') == FALSE)
		{
			$response = array();
			$response['title'] = 'Komentar';
			$response['type'] = 'info';
			$response['text'] = 'Mohon login terlebih dahulu';
			$response['redirect'] = $this->config->item('link_login');
			
			echo json_encode($response);
			exit();
		}
    }
	
	function comment_create()
	{
		$param = array();
		$param['id_product'] = $this->input->post('id_product');
		$param['id_member'] = $this->session->userdata('id_member');
		$param['message'] = $this->input->post('message');
		$param['created_date'] = date('Y-m-d H:i:s');
		$param['updated_date'] = date('Y-m-d H:i:s');
		
		$query2 = $this->comment_model->create($param);
		
		if ($query2 > 0)
		{
			$response = array('title' => 'Komentar', 'type' => 'success', 'text' => 'Komentar berhasil dikirim.');
		}
		else
		{
			$response = array('title' => 'Komentar', 'type' => 'error', 'text' => 'Komentar gagal dikirim.');
		}
		
		echo json_encode($response);
		exit();
	}
}
