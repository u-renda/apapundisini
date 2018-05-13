<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
    }

    function check_password($password, $username)
    {
        $result = $this->admin_model->info(array('username' => $username, 'password' => md5($password)));
		
        if ($result->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_password', 'Username atau Password Salah');
            return FALSE;
        }
    }

    function index()
	{
		if ($this->session->userdata('is_login') == TRUE) { redirect($this->config->item('link_admin_home')); }
		
        $data = array();
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required|callback_check_password['.$this->input->post('username').']');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['error'] = validation_errors();
			}
			else
			{
				$query = $this->admin_model->info(array('username' => $this->input->post('username')));

				if ($query->num_rows() > 0)
				{
					$admin = $query->row();
						
					$cached = array(
						'id_admin'=> $admin->id_admin,
						'admin_username'=> $admin->username,
						'admin_email'=> $admin->email,
						'admin_name'=> $admin->name,
						'is_login' => TRUE,
						'admin_role_name' => $admin->role_name,
						'id_admin_role' => $admin->id_admin_role
					);
					
					// Set session
					$this->session->set_userdata($cached);
					
					redirect($this->config->item('link_admin_home'));
				}
			}
		}
		
		$this->load->view('admin/login/index', $data);
	}

    function logout()
    {
        //$this->session->sess_destroy();
		$this->session->unset_userdata('id_admin');
		$this->session->unset_userdata('admin_username');
		$this->session->unset_userdata('admin_name');
		$this->session->unset_userdata('admin_email');
		$this->session->unset_userdata('is_login');
		$this->session->unset_userdata('admin_role_name');
		$this->session->unset_userdata('id_admin_role');
		
        redirect($this->config->item('link_admin_login'));
    }
}
