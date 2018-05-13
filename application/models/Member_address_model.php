<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member_address_model extends CI_Model {

    var $table = 'member_address';
	var $table_id = 'id_member_address';
    
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
        if (isset($param['id_member_address']) == TRUE)
        {
            $where += array($this->table_id => $param['id_member_address']);
        }
        if (isset($param['id_member']) == TRUE)
        {
            $where += array($this->table.'.id_member' => $param['id_member']);
        }
        
        $this->db->select($this->table_id.', '.$this->table.'.id_member, '.$this->table.'.id_provinsi,
						  address, '.$this->table.'.created_date, '.$this->table.'.updated_date,
						  provinsi.name AS provinsi_name, price, member.name AS member_name, email,
						  phone');
        $this->db->from($this->table);
        $this->db->join('provinsi', $this->table.'.id_provinsi = provinsi.id_provinsi');
        $this->db->join('member', $this->table.'.id_member = member.id_member');
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }
    
    function lists($param)
    {
        $where = array();
        
        $this->db->select($this->table_id.', id_member, id_provinsi, address, created_date,
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