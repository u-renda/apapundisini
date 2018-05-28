<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {

    var $table = 'comment';
	var $table_id = 'id_comment';
    
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
        if (isset($param['id_comment']) == TRUE)
        {
            $where += array($this->table_id => $param['id_comment']);
        }
        
        $this->db->select($this->table_id.', '.$this->table.'.id_product, '.$this->table.'.id_member,
						  message, '.$this->table.'.created_date, '.$this->table.'.updated_date,
						  member.name AS member_name');
        $this->db->from($this->table);
        $this->db->join('product', $this->table.'.id_product = product.id_product');
        $this->db->join('member', $this->table.'.id_member = member.id_member');
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    
    function lists($param)
    {
        $where = array();
        if (isset($param['id_product']) == TRUE)
        {
            $where += array('id_product' => $param['id_product']);
        }
        
        $this->db->select($this->table_id.', id_product, id_member, message, created_date,
						  updated_date');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by($param['order'], $param['sort']);
        $this->db->limit($param['limit'], $param['offset']);
        $query = $this->db->get();
        return $query;
    }
}