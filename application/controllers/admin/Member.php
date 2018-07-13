<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	private $processMedia;
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('member_address_model');
		$this->load->model('member_model');
		$this->load->model('provinsi_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_admin_login')); }
    }

    function member_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->member_model->info(array('id_member' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete') == TRUE)
            {
                $query = $this->member_model->delete($data['id']);

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

	function member_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'created_date';
        $sort = 'desc';

        $query = $this->member_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
			$address = '';
			$query2 = $this->member_address_model->info(array('id_member' => $row->id_member));
			
			if ($query2->num_rows() > 0)
			{
				$address = $query2->row()->address;
			}
			
			$action = '<a title="Edit" href="'.$this->config->item('link_admin_member_update').'?id_member='.$row->id_member.'"><i class="fa fa-pencil h4"></i></a>&nbsp;&nbsp;
						<a title="Delete" id="'.$row->id_member.'" class="delete '.$row->id_member.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			
            $entry = array(
                'No' => $i,
                'Nama' => $row->name,
                'Email' => $row->email,
                'Telp' => $row->phone,
                'Alamat' => $address,
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

    function member_lists()
	{
		$data = array();
		
		$data['type'] = $this->input->get('type');
		$data['msg'] = $this->input->get('msg');
		$data['view_content'] = 'admin/member/member_lists';
		$this->load->view('admin/templates/frame', $data);
	}

    function member_update()
    {
		$data = array();
        $data['id'] = $this->input->get_post('id_member');
		
		if ($data['id'] != '')
		{
			$get = $this->member_model->info(array('id_member' => $data['id']));

			if ($get->num_rows() > 0)
			{
				$member = $get->row();
				$query2 = $this->member_address_model->info(array('id_member' => $data['id']));
				$query4 = $this->provinsi_model->lists(array('order' => 'name', 'sort' => 'asc', 'limit' => 50, 'offset' => 0));
				
				$result = array();
				$result['name'] = $member->name;
				$result['email'] = $member->email;
				$result['phone'] = $member->phone;
				$result['address'] = $query2->row()->address;
				$result['id_provinsi'] = $query2->row()->id_provinsi;
				
				if ($this->input->post('submit') == TRUE)
				{
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
					$this->form_validation->set_message('required', '%s harus diisi');
					$this->form_validation->set_rules('name', 'nama', 'required');
					$this->form_validation->set_rules('email', 'email', 'required|valid_email');
					$this->form_validation->set_rules('phone', 'phone', 'required');
					
					if ($this->form_validation->run() == TRUE)
					{
						$param = array();
						$param['name'] = $this->input->post('name');
						$param['email'] = $this->input->post('email');
						$param['phone'] = $this->input->post('phone');
						$param['updated_date'] = date('Y-m-d H:i:s');
						$query3 = $this->member_model->update($data['id'], $param);
						
						if ($query3 > 0)
						{
							if ($this->input->post('address') !== '')
							{
								$param2 = array();
								$param2['id_provinsi'] = $this->input->post('id_provinsi');
								$param2['address'] = $this->input->post('address');
								$param2['updated_date'] = date('Y-m-d H:i:s');
								$query = $this->member_address_model->update($query2->row()->id_member_address, $param2);
							}
							
							redirect($this->config->item('link_admin_member').'?msg=success&type=edit');
						}
						else
						{
							redirect($this->config->item('link_admin_member').'?msg=error&type=edit');
						}
					}
				}
				
				$data['result'] = $result;
				$data['provinsi_lists'] = $query4->result();
				$data['view_content'] = 'admin/member/member_update';
			}
		}
        else
        {
            $data['view_content'] = 'admin/data_not_found';
        }
		
        $this->load->view('admin/templates/frame', $data);
    }
}
