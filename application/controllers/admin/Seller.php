<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {

	private $processMedia;
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('seller_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_admin_login')); }
    }
	
	function check_media()
	{
		if ($_FILES["seller_url"]["error"] == 0)
		{
			$this->load->helper('my');
			$photo = upload_image($_FILES["seller_url"], 'seller');
			
			if (is_array($photo) == FALSE)
			{
				$this->processMedia = $photo;
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('check_media', $photo[0]);
				return FALSE;
			}
		}
		else
		{
			return TRUE;
		}
	}
	
	function seller_create()
	{
		$data = array();
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_message('required', '%s harus diisi');
			$this->form_validation->set_message('min_length', '%s min 6 karakter');
			$this->form_validation->set_rules('name', 'nama', 'required');
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
			$this->form_validation->set_rules('seller_url', 'logo', 'callback_check_media');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['name'] = $this->input->post('name');
				$param['logo'] = $this->processMedia;
				$param['created_date'] = date('Y-m-d H:i:s');
				$param['updated_date'] = date('Y-m-d H:i:s');
				$query = $this->seller_model->create($param);
				
				if ($query != 0 || $query != '')
				{
					// create admin
					$param2 = array();
					$param2['id_seller'] = $query;
					$param2['name'] = $this->input->post('name');
					$param2['username'] = $this->input->post('username');
					$param2['password'] = md5($this->input->post('password'));
					$param2['created_date'] = date('Y-m-d H:i:s');
					$param2['updated_date'] = date('Y-m-d H:i:s');
					$query2 = $this->admin_model->create($param2);
					
					redirect($this->config->item('link_admin_seller').'?msg=success&type=create');
				}
				else
				{
					redirect($this->config->item('link_admin_seller').'?msg=error&type=create');
				}
			}
		}
		
		$data['view_content'] = 'admin/seller/seller_create';
		$this->load->view('admin/templates/frame', $data);
	}

    function seller_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->seller_model->info(array('id_seller' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete') == TRUE)
            {
                $query = $this->seller_model->delete($data['id']);

                if ($query > 0)
                {
                    $response = array('text' => 'Success', 'type' => 'success', 'title' => 'Delete');
                }
                else
                {
                    $response = array('text' => 'Failed', 'type' => 'error', 'title' => 'Delete');
                }

                echo json_encode($response);
                exit();
            }
            else
            {
                $this->load->view('admin/delete_confirm', $data);
            }
        }
        else
        {
            echo "Data Not Found";
        }
    }

	function seller_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'created_date';
        $sort = 'desc';

        $query = $this->seller_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
			$query2 = $this->admin_model->info(array('id_seller' => $row->id_seller));
			
			$username = '';
			if ($query2->num_rows() > 0)
			{
				$username = $query2->row()->username;
			}
			
            $action = '<a title="Edit" href="'.$this->config->item('link_admin_seller_update').'?id_seller='.$row->id_seller.'"><i class="fa fa-pencil h4"></i></a>&nbsp;&nbsp;
						<a title="Delete" id="'.$row->id_seller.'" class="delete '.$row->id_seller.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>&nbsp;&nbsp;
						<a title="Tambah Produk" href="'.$this->config->item('link_admin_produk_create').'?id_seller='.$row->id_seller.'"><i class="fa fa-plus h4 text-warning"></i></a>';
			$logo = '<img src="'.$row->logo.'" width="50%">';
			
            $entry = array(
                'No' => $i,
                'Nama' => $row->name,
                'Username' => $username,
                'Logo' => $logo,
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

    function seller_lists()
	{
		$data = array();
		
		$data['type'] = $this->input->get('type');
		$data['msg'] = $this->input->get('msg');
		$data['view_content'] = 'admin/seller/seller_lists';
		$this->load->view('admin/templates/frame', $data);
	}

    function seller_update()
    {
		$data = array();
        $data['id'] = $this->input->get_post('id_seller');
		
		if ($data['id'] != '')
		{
			$get = $this->seller_model->info(array('id_seller' => $data['id']));

			if ($get->num_rows() > 0)
			{
				$query2 = $this->admin_model->info(array('id_seller' => $data['id']));
				
				$result = array();
				$result['name'] = $get->row()->name;
				$result['username'] = '';
				
				if ($query2->num_rows() > 0)
				{
					$result['username'] = $query2->row()->username;
				}
				
				if ($this->input->post('submit') == TRUE)
				{
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
					$this->form_validation->set_message('required', '%s harus diisi');
					$this->form_validation->set_message('min_length', '%s min 6 karakter');
					$this->form_validation->set_rules('name', 'nama', 'required');
					$this->form_validation->set_rules('username', 'username', 'required');
					$this->form_validation->set_rules('password', 'password', 'min_length[6]');
					$this->form_validation->set_rules('seller_url', 'logo', 'callback_check_media');
					
					if ($this->form_validation->run() == TRUE)
					{
						// admin
						$param = array();
						if ($this->input->post('password') == TRUE)
						{
							$param['password'] = md5($this->input->post('password'));
						}
						
						$param['name'] = $this->input->post('name');
						$param['username'] = $this->input->post('username');
						$param['updated_date'] = date('Y-m-d H:i:s');
						
						if ($query2->num_rows() > 0)
						{
							$query = $this->admin_model->update($query2->row()->id_admin, $param);
						}
						else
						{
							$param['id_seller'] = $data['id'];
							$param['created_date'] = date('Y-m-d H:i:s');
							$query = $this->admin_model->create($param);
						}
						
						// seller
						$param2 = array();
						if ($this->processMedia != '')
						{
							$param2['logo'] = $this->processMedia;
						}
						
						$param2['name'] = $this->input->post('name');
						$param2['updated_date'] = date('Y-m-d H:i:s');
						$query3 = $this->seller_model->update($data['id'], $param2);
						
						if ($query3 > 0)
						{
							redirect($this->config->item('link_admin_seller').'?msg=success&type=edit');
						}
						else
						{
							redirect($this->config->item('link_admin_seller').'?msg=error&type=edit');
						}
					}
				}
				
				$data['result'] = $result;
				$data['view_content'] = 'admin/seller/seller_update';
			}
		}
        else
        {
            $data['view_content'] = 'admin/data_not_found';
        }
		
        $this->load->view('admin/templates/frame', $data);
    }
}
