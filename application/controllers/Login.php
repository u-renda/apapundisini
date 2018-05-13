<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('member_model');
    }

    function check_password($password, $email)
    {
        $result = $this->member_model->info(array('email' => $email, 'password' => md5($password)));
		
        if ($result->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_password', 'Email atau Password Salah.');
            return FALSE;
        }
    }

    function check_email()
    {
        $selfemail = $this->input->post('selfemail');
		$email = $this->input->post('email');
		$get = $this->member_model->info(array('email' => $email));
		
        if ($get->num_rows() > 0 && $selfemail != $email)
        {
            $this->form_validation->set_message('check_email', '%s sudah terdaftar');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function index()
	{
		if ($this->session->userdata('is_login_web') == TRUE) { redirect(base_url()); }
		
        $data = array();
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_message('valid_email', 'Format %s harus benar.');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|callback_check_password['.$this->input->post('email').']');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['error_login'] = validation_errors();
			}
			else
			{
				$query = $this->member_model->info(array('email' => $this->input->post('email')));

				if ($query->num_rows() > 0)
				{
					$admin = $query->row();
						
					$cached = array(
						'id_member'=> $admin->id_member,
						'email'=> $admin->email,
						'name'=> $admin->name,
						'is_login_web' => TRUE
					);
					
					// Set session
					$this->session->set_userdata($cached);
					
					redirect(base_url());
				}
			}
		}
		
		$data['view_content'] = 'web/login/index';
		$this->display_view('web/templates/frame', $data);
	}

    function logout()
    {
        //$this->session->sess_destroy();
		$this->session->unset_userdata('id_member');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('is_login_web');
		
        redirect(base_url());
    }

    function register()
	{
		$data = array();
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_message('valid_email', 'Format %s harus benar.');
			$this->form_validation->set_message('numeric', 'Format %s harus angka.');
			$this->form_validation->set_message('matches', '%s tidak sesuai dengan password.');
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('phone', 'Telp', 'required|numeric');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
			$this->form_validation->set_rules('re_password', 'Ulangi password', 'required|matches[password]|min_length[6]');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['error_register'] = validation_errors();
			}
			else
			{
				$param = array();
				$param['name'] = $this->input->post('name');
				$param['email'] = $this->input->post('email');
				$param['phone'] = $this->input->post('phone');
				$param['password'] = md5($this->input->post('password'));
				$param['created_date'] = date('Y-m-d H:i:s');
				$param['updated_date'] = date('Y-m-d H:i:s');
				$query = $this->member_model->create($param);
				
				if ($query > 0)
				{
					redirect($this->config->item('link_register_success'));
				}
			}
		}
		
		$data['view_content'] = 'web/login/index';
		$this->display_view('web/templates/frame', $data);
	}
	
	function register_success()
	{
		$data = array();
		
		$data['view_content'] = 'web/login/register_success';
		$this->display_view('web/templates/frame', $data);
	}
}
