<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_category_model extends CI_Model {

    var $table = 'product_category';
	var $table_id = 'id_product_category';
    
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
        if (isset($param['id_product_category']) == TRUE)
        {
            $where += array($this->table_id => $param['id_product_category']);
        }
        if (isset($param['slug']) == TRUE)
        {
            $where += array('slug' => $param['slug']);
        }
        
        $this->db->select($this->table_id.', name, slug, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    
    function lists($param)
    {
        $where = array();
        
        $this->db->select($this->table_id.', name, slug, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
    
    function update($id, $param)
    {
        $this->db->where($this->table_id, $id);
        $query = $this->db->update($this->table, $param);
        return $query;
    }
}