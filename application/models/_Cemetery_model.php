<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cemetery_model extends CI_Model
{
	public function insert_cemetery($cemeteryData)
	{
		$this->db->insert('cemetery', $cemeteryData);
		return $this->db->insert_id();
	}

	public function insert_obituary($obituary_data){
		if($this->db->insert('obituary', $obituary_data)){
			return true;
		}
		else{
			return false;
		}

	}

	public function cemeteryList()
	{
		$this->db->select('*');
		$this->db->from('cemetery');
		$query = $this->db->get();
		return $query->result();
	}

	public function obituary_list(){
		$this->db->select('*');
		$this->db->from('obituary');
		$query = $this->db->get();
		return $query->result();
	}

	public function usersList()
	{
		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->get();
		return $query->result();
	}

	public function fetch_cemetery_data($query){
		$this->db->select('*');
		$this->db->from('cemetery');
		if($query != ''){
			$this->db->like('LOWER(title)', strtolower($query));
			$this->db->or_like('LOWER(street)', strtolower($query));
			$this->db->or_like('LOWER(zip)', strtolower($query));
		}
		// $this->db->order_by('title', 'ASC');
		return $this->db->get();
		// return $this->db->get()->result();
	}
}
