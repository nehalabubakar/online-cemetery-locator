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

	public function cemeteryList($user_details)
	{
		$this->db->select('*');
		if($user_details['userStatus'] == 'visitor'){
			$this->db->where('user_id', $user_details['id']);
		}
		$this->db->from('cemetery');
		$query = $this->db->get();
		return $query->result();
	}

	public function cemeteryListFront()
	{
		$this->db->select('*');
		/*if($user_details['userStatus'] == 'visitor'){
			$this->db->where('user_id', $user_details['id']);
		}*/
		$this->db->from('cemetery');
		$query = $this->db->get();
		return $query->result();
	}

	public function obituary_list($user_details){
		$this->db->select('*');
		if($user_details['userStatus'] == 'visitor'){
			$this->db->where('user_id', $user_details['id']);
		}
		$this->db->from('obituary');
		$query = $this->db->get();
		return $query->result();
	}

	public function obituary_list_Fornt(){
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

	public function update_obituary($updatedObituary){
		$this->db->where('id', $updatedObituary['id']);
		$updatedObituarydata = $this->db->update('obituary', array(
			'person_name'	=>	$updatedObituary['person_name'],
			'dates'			=>	$updatedObituary['dates'],
			'prayers'		=>	$updatedObituary['prayers']
		));

		if($updatedObituarydata){
			if(isset($updatedObituary['image'])){
				$this->db->where('id', $updatedObituary['id']);
				$updateImage = $this->db->update('obituary', array(
					'image' =>	$updatedObituary['image']
				));

				if($updateImage){
					return true;
				}
				else{
					return 'Image Can\'t be uploaded';
				}
			}
			else{
				return true;
			}
		}
		else{
			return 'Cemetery Data Not Updated';
		}
	}
}
