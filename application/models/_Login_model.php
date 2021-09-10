<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    
    public function user_info($email){
		$this->db->select('first_name, last_name, user_status');
		$this->db->where('email', $email);
		$user = $this->db->get('user');

		foreach($user->result() as $row){
			return array(
				'firstName'	=>	$row->first_name,
				'lastName'	=>	$row->last_name,
				'userStatus'=>	$row->user_status
			);
		}
	}

	public function insert_contact($contactData)
	{
		$this->db->insert('user', $contactData);
		return $this->db->insert_id();
	}

	public function login($user_login_credentials)
	{

		$this->db->where('email', $user_login_credentials['email']);
		$can_login = $this->db->get('user');
		if ($can_login->num_rows() > 0) {
			foreach ($can_login->result() as $user) {
				$encrypted_password = $this->encryption->decrypt($user->password);
				if ($user_login_credentials['password'] == $encrypted_password) {
					return true;
				} else {
					return false;
				}
			}
		} else {
			return false;
		}
	}

	public function ForgotPassword($email)
	{
		$this->db->select('email');
		$this->db->from('user');
		$this->db->where('email', $email);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function GenerateToken($update_user)
	{
		$email = $update_user['email'];
		$token = array('pwd_reset_token' => $update_user['Token']);
		$query = $this->db->query("SELECT *  from user where email = '" . $email . "'");
		$row = $query->result_array();
		if ($query->num_rows() > 0) {
			$this->db->where('email', $email);
			$update = $this->db->update('user', $token);
			if ($update) {
				return true;
			} else {
				return false;
			}
		}
	}

	public function checkToken($token)
	{
		$this->db->where('pwd_reset_token', $token);
		$query = $this->db->get('user');
//		return $query->result();
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function checkEmailExist($email)
	{
		$this->db->select('id');
		$this->db->where('email', $email);
		$query = $this->db->get('user');

		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}


	public function resetPassword($contactData){
		$this->db->where('pwd_reset_token', $contactData['token']);
		$update = $this->db->update('user', array('password' => $contactData['password']));
		if($update) {
			$this->db->where('pwd_reset_token', $contactData['token']);
			$this->db->update('user', array('pwd_reset_token' => ''));
			return true;
		}else{
			return false;
		}
	}
}
