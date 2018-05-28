<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('order_model');
		
		if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_admin_login')); }
    }

    function order_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->order_model->info(array('id_order' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete') == TRUE)
            {
                $query = $this->order_model->delete($data['id']);

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

	function order_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'updated_date';
        $sort = 'desc';

        $query = $this->order_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());

        foreach ($query->result() as $row)
        {
            $action = '<a title="Edit" href="'.$this->config->item('link_admin_order_update').'?id='.$row->id_order.'"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_order.'" class="delete '.$row->id_order.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			$entry = array(
				'No' => $i,
				'Nama' => $row->name,
				'Kategori' => ucwords($query2->row()->name),
				'Keterangan' => $row->description,
				'Harga' => number_format($row->price,0,',','.'),
				'Stok' => number_format($row->stock,0,',','.'),
				'Foto' => $foto,
				'Aksi' => $action
			);
	
			$jsonData['results'][] = $entry;
			$i++;
        }

        echo json_encode($jsonData);
	}

    function order_lists()
	{
		$data = array();
		
		$data['type'] = $this->input->get('type');
		$data['msg'] = $this->input->get('msg');
		$data['view_content'] = 'admin/order/order_lists';
		$this->load->view('admin/templates/frame', $data);
	}
	
	function produk_kategori_create()
	{
		$data = array();
		
		if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			$this->form_validation->set_message('required', '%s harus diisi');
			$this->form_validation->set_rules('name', 'nama', 'required');
			
			if ($this->form_validation->run() == TRUE)
			{
				$url_title = url_title(strtolower($this->input->post('name')));
			
				if (check_product_category_slug($url_title) == FALSE)
				{
					$counter = random_string('numeric',5);
					$slug = url_title(strtolower(''.$this->input->post('name').'-'.$counter.''));
				}
				else
				{
					$slug = $url_title;
				}
				
				$param = array();
				$param['name'] = $this->input->post('name');
				$param['slug'] = $slug;
				$param['created_date'] = date('Y-m-d H:i:s');
				$param['updated_date'] = date('Y-m-d H:i:s');
				$query = $this->product_category_model->create($param);
				
				if ($query > 0)
				{
					redirect($this->config->item('link_admin_produk_kategori').'?msg=success&type=create');
				}
				else
				{
					redirect($this->config->item('link_admin_produk_kategori').'?msg=error&type=create');
				}
			}
		}
		
		$data['view_content'] = 'admin/produk/produk_kategori_create';
		$this->load->view('admin/templates/frame', $data);
	}

    function produk_kategori_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->product_category_model->info(array('id_product_category' => $data['id']));

        if ($get->num_rows() > 0)
        {
            if ($this->input->post('delete') == TRUE)
            {
                $query = $this->product_category_model->delete($data['id']);

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

	function produk_kategori_get()
	{
		$page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'name';
        $sort = 'asc';

        $query = $this->product_category_model->lists(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $query->num_rows(), 'results' => array());
		
        foreach ($query->result() as $row)
        {
            $action = '<a title="Edit" href="'.$this->config->item('link_admin_produk_kategori_update').'?id='.$row->id_product_category.'"><i class="fa fa-pencil h4"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_product_category.'" class="delete '.$row->id_product_category.'-delete" href="#"><i class="fa fa-times h4 text-danger"></i></a>';
			
            $entry = array(
                'No' => $i,
                'Nama' => ucwords($row->name),
                'Aksi' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
	}

    function produk_kategori_lists()
	{
		$data = array();
		
		$data['type'] = $this->input->get('type');
		$data['msg'] = $this->input->get('msg');
		$data['view_content'] = 'admin/produk/produk_kategori_lists';
		$this->load->view('admin/templates/frame', $data);
	}

    function produk_kategori_update()
    {
		$data = array();
        $data['id'] = $this->input->get_post('id');
		
		if ($data['id'] != '')
		{
			$get = $this->product_category_model->info(array('id_product_category' => $data['id']));

			if ($get->num_rows() > 0)
			{
				if ($this->input->post('submit') == TRUE)
				{
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
					$this->form_validation->set_message('required', '%s harus diisi');
					$this->form_validation->set_rules('name', 'nama', 'required');
					
					if ($this->form_validation->run() == TRUE)
					{
						$param = array();
						$param['name'] = $this->input->post('name');
						$param['updated_date'] = date('Y-m-d H:i:s');
						$query = $this->product_category_model->update($data['id'], $param);
	
						if ($query > 0)
						{
							redirect($this->config->item('link_admin_produk_kategori').'?msg=success&type=edit');
						}
						else
						{
							redirect($this->config->item('link_admin_produk_kategori').'?msg=error&type=edit');
						}
					}
				}
				
				$data['result'] = $get->row();
				$data['view_content'] = 'admin/produk/produk_kategori_update';
			}
		}
        else
        {
            $data['view_content'] = 'admin/data_not_found';
        }
		
        $this->load->view('admin/templates/frame', $data);
    }

    function produk_update()
    {
		$data = array();
        $data['id'] = $this->input->get_post('id');
		
		if ($data['id'] != '')
		{
			$get = $this->product_model->info(array('id_product' => $data['id']));

			if ($get->num_rows() > 0)
			{
				if ($this->input->post('submit') == TRUE)
				{
					$this->load->library('form_validation');
					$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
					$this->form_validation->set_message('required', '%s harus diisi');
					$this->form_validation->set_message('numeric', '%s harus berisi angka');
					$this->form_validation->set_rules('id_product_type_detail', 'tipe produk', 'required');
					$this->form_validation->set_rules('name', 'nama', 'required');
					$this->form_validation->set_rules('description', 'keterangan', 'required');
					
					if ($this->input->post('change_media') == TRUE)
					{
						$this->form_validation->set_rules('produk_url', 'foto', 'callback_check_media');
					}
	
					if ($this->form_validation->run() == TRUE)
					{
						$param = array();
						$param['id_product_type_detail'] = $this->input->post('id_product_type_detail');
						$param['name'] = $this->input->post('name');
						$param['description'] = $this->input->post('description');
						
						if ($this->input->post('change_media') == TRUE)
						{
							$param['url'] = $this->processMedia;
						}
						
						$param['updated_date'] = date('Y-m-d H:i:s');
						$query = $this->product_model->update($data['id'], $param);
	
						if ($query > 0)
						{
							redirect($this->config->item('link_admin_produk').'?msg=success&type=edit');
						}
						else
						{
							redirect($this->config->item('link_admin_produk').'?msg=error&type=edit');
						}
					}
				}
		
				$query3 = $this->product_type_detail_model->lists(array('limit' => 20, 'offset' => 0, 'order' => 'number', 'sort' => 'asc'));
				
				if ($query3->num_rows() > 0)
				{
					$data['product_type_detail_lists'] = $query3->result();
				}
		
				$query4 = $this->product_type_model->lists(array('limit' => 20, 'offset' => 0, 'order' => 'number', 'sort' => 'asc'));
				
				if ($query4->num_rows() > 0)
				{
					$data['product_type_lists'] = $query4->result();
				}
		
				$query5 = $this->product_type_detail_model->info(array('id_product_type_detail' => $get->row()->id_product_type_detail));
				
				if ($query5->num_rows() > 0)
				{
					$data['product_type_detail'] = $query5->row();
				}
				
				$data['result'] = $get->row();
				$data['view_content'] = 'admin/produk/produk_update';
			}
		}
        else
        {
            $data['view_content'] = 'admin/data_not_found';
        }
		
        $this->display_view('admin/templates/frame', $data);
    }
}
