<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

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
		$newpass = array('pwd_reset_token' => $update_user['Token']);
		$query = $this->db->query("SELECT *  from user where email = '" . $email . "'");
		$row = $query->result_array();
		if ($query->num_rows() > 0) {
			$this->db->where('email', $email);
			$update = $this->db->update('user', $newpass);
			if ($update) {
				return true;
			} else {
				return false;
			}
		}
	}

	public function checkEmailExist($email)
	{
		$this->db->select('id');
		$this->db->where('email', $email);
		$query = $this->db->get('user');

		if ($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}
	}


}
