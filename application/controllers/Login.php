<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('member_model');
    }

    function index()
	{
		$data = array();
		
		$data['view_content'] = 'web/login/index';
		$this->display_view('web/templates/frame', $data);
	}

    function register()
	{
		$data = array();
		
		$data['view_content'] = 'web/login/regis';
		$this->display_view('web/templates/frame', $data);
	}
}
