<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    var $table = 'product';
	var $table_id = 'id_product';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function create($param)
    {
        $this->db->set($this->table_id, 'UUID_SHORT()', FALSE);
		$query = $this->db->insert($this->table, $param);
		return $query;
    }
    
    function delete($id)
    {
        $this->db->where($this->table_id, $id);
        $query = $this->db->delete($this->table);
        return $query;
    }
    
    function info($param)
    {
        $where = array();
        if (isset($param['id_product']) == TRUE)
        {
            $where += array($this->table_id => $param['id_product']);
        }
        if (isset($param['slug']) == TRUE)
        {
            $where += array($this->table.'.slug' => $param['slug']);
        }
        
        $this->db->select($this->table_id.', '.$this->table.'.id_product_category,
						  '.$this->table.'.name, '.$this->table.'.slug, price, photo, stock,
						  description, '.$this->table.'.created_date, '.$this->table.'.updated_date,
						  product_category.name AS product_category_name,
						  product_category.slug AS product_category_slug');
        $this->db->from($this->table);
        $this->db->join('product_category', $this->table.'.id_product_category = product_category.id_product_category');
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    
    function lists($param)
    {
        $where = array();
        if (isset($param['id_product_category']) == TRUE)
        {
            $where += array('id_product_category' => $param['id_product_category']);
        }
		
        $this->db->select($this->table_id.', id_product_category, name, slug, price, photo, stock,
						  description, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}