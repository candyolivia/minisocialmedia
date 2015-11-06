<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {
	public function getUser() {
		$data = $this->db->query('select * from registered_user');
		return $data->result_array();
	}

	public function getSpesificUser($username) {
		$this->db->select('*')->from('registered_user')->where('username',$username);
		$query = $this->db->get();
		if ( $query->num_rows() > 0 )
	    {
	        $row = $query->row_array();
	        return $row;
	    }
	}	

	public function searchUsername($key) {
		$this->db->select('*')->from('registered_user')->like('username', $key, 'both');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getAdmin($username) {
		$this->db->select('*')->from('administrator')->where('username',$username);
		$query = $this->db->get();
		if ( $query->num_rows() > 0 )
	    {
	        $row = $query->row_array();
	        return $row;
	    }
	}

	public function getFriendOf() {
		$data = $this->db->query('select * from friendof');
		return $data->result_array();
	}

	public function insertData($tableName,$data) {
		$res = $this->db->insert($tableName,$data);
		return $res;
	}

	public function updateData($tableName,$data,$where) {
		$res = $this->db->update($tableName,$data,$where);
		return $res;
	}

	public function deleteData($tableName,$where) {
		$res = $this->db->delete($tableName,$where);
		return $res;
	}
}
