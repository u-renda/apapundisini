<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_checkout_model extends CI_Model {

    var $table = 'cart_checkout';
	var $table_id = 'id_cart_checkout';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function create($param)
    {
        $this->db->set($this->table_id, 'UUID_SHORT()', FALSE);
		$query = $this->db->insert($this->table, $param);
		$id = $this->db->insert_id();
		return $id;
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
        if (isset($param['id_cart_checkout']) == TRUE)
        {
            $where += array($this->table_id => $param['id_cart_checkout']);
        }
        
        $this->db->select($this->table_id.', subtotal, shipment_cost, total, status, created_date,
						  updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    
    function lists($param)
    {
        $where = array();
        if (isset($param['status_not']) == TRUE)
        {
            $where += array('status != ' => $param['status_not']);
        }
        
        $this->db->select($this->table_id.', subtotal, shipment_cost, total, status, created_date,
						  updated_date');
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