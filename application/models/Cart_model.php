<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

    var $table = 'cart';
	var $table_id = 'id_cart';
    
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
        if (isset($param['id_cart']) == TRUE)
        {
            $where += array($this->table_id => $param['id_cart']);
        }
        if (isset($param['id_member']) == TRUE)
        {
            $where += array('id_member' => $param['id_member']);
        }
        if (isset($param['status']) == TRUE)
        {
            $where += array('status' => $param['status']);
        }
        
        $this->db->select($this->table_id.', id_product, id_member, id_cart_checkout, quantity, total,
						  status, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    
    function lists($param)
    {
        $where = array();
        if (isset($param['id_member']) == TRUE)
        {
            $where += array('id_member' => $param['id_member']);
        }
        if (isset($param['status']) == TRUE)
        {
            $where += array('status' => $param['status']);
        }
        
        $this->db->select($this->table_id.', id_product, id_member, id_cart_checkout, quantity, total,
						  status, created_date, updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}