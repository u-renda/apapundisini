<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	private $processMedia;
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('slider_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_admin_login')); }
    }
	
	function check_media()
	{
		if ($_FILES["slider_url"]["error"] == 0)
		{
			$this->load->helper('my');
			$photo = upload_image($_FILES["slider_url"], 'slider');
			
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
			$this->form_validation->set_message('check_media', '%s tidak boleh kosong');
			return FALSE;
		}
	}
	
	function slider_create()
	{
		$data = array();
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_rules('slider_url', 'foto', 'callback_check_media');
			
			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['photo'] = $this->processMedia;
				$param['created_date'] = date('Y-m-d H:i:s');
				$param['updated_date'] = date('Y-m-d H:i:s');
				$query = $this->slider_model->create($param);
				
				if ($query > 0)
				{
					redirect($this->config->item('link_admin_slider').'?msg=success&type=create');
				}
				else
				{
					redirect($this->config->item('link_admin_slider').'?msg=error&type=create');
				}
			}
		}
		
		$data['view_content'] = 'admin/slider/slider_create';
		$this->load->view('admin/templates/frame', $data);
	}

    function slider_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->slider_model->info(array('id_slider' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete') == TRUE)
            {
                $query = $this->slider_model->delete($data['id']);

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

	function slider_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'created_date';
        $sort = 'desc';

        $query = $this->slider_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="Delete" id="'.$row->id_slider.'" class="delete '.$row->id_slider.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			$foto = '<img src="'.$row->photo.'" width="50%">';
			
            $entry = array(
                'No' => $i,
                'Foto' => $foto,
                'URL' => $row->photo,
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

    function slider_lists()
	{
		$data = array();
		
		$data['type'] = $this->input->get('type');
		$data['msg'] = $this->input->get('msg');
		$data['view_content'] = 'admin/slider/slider_lists';
		$this->load->view('admin/templates/frame', $data);
	}
}
