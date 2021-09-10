 <?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Login_model extends CI_Model
	{

		public function user_info($email)
		{
			$this->db->select('id, first_name, last_name, user_status');
			$this->db->where('email', $email);
			$user = $this->db->get('user');

			foreach ($user->result() as $row) {
				return array(
					'id'		=> $row->id,
					'firstName' => $row->first_name,
					'lastName' => $row->last_name,
					'userStatus' => $row->user_status
				);
			}
		}

		public function edit_user_info($user_id)
		{
			$this->db->select('id, first_name, last_name, email, user_status');
			$this->db->where('id', $user_id);
			$user = $this->db->get('user');

			foreach ($user->result() as $row) {
				return array(
					'id' => $row->id,
					'first_name' => $row->first_name,
					'last_name' => $row->last_name,
					'email' => $row->email,
					'user_status' => $row->user_status

				);
			}
		}

		public function edit_cemetery_info($cemetery_id)
		{
			$this->db->select('*');
			$this->db->where('id', $cemetery_id);
			$cemetery = $this->db->get('cemetery');

			foreach ($cemetery->result() as $row) {
				return array(
					'id'		=>	$row->id,
					'user_id'	=>	$row->user_id,
					'title'		=>	$row->title,
					'street'	=>	$row->street,
					'zip'		=>	$row->zip,
					'longitude'	=>	$row->longitude,
					'latitude'	=>	$row->latitude,
					'phone'		=>	$row->phone,
					'image'		=>	$row->image
				);
			}
		}

		public function fetch_single_data($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get('obituary');

			foreach ($query->result() as $row) {
				return array(
					'id' => $row->id,
					'person_name' => $row->person_name,
					'dates' => $row->dates,
					'prayers' => $row->prayers,
					'image' => $row->image

				);
			}
		}

		public function updateUser($dataUser)
		{
			$this->db->where('id', $dataUser['id']);
			$update = $this->db->update('user', array('first_name' => $dataUser['first_name'], 'last_name' => $dataUser['last_name'], 'user_status' => $dataUser['user_status']));
			if ($update) {
				return true;
			} else {
				return false;
			}
		}

		public function updateCemetery($updateCemetery)
		{
			$this->db->where('id', $updateCemetery['id']);
			$updatedCemetery = $this->db->update('cemetery', array(
				'title'		=>	$updateCemetery['title'],
				'street'	=>	$updateCemetery['street'],
				'zip'		=>	$updateCemetery['zip'],
				'latitude'	=>	$updateCemetery['latitude'],
				'longitude'	=>	$updateCemetery['longitude'],
				'phone'		=>	$updateCemetery['phone'],
			));

			if ($updatedCemetery) {
				if (isset($updateCemetery['image'])) {
					$this->db->where('id', $updateCemetery['id']);
					$updateImage = $this->db->update('cemetery', array(
						'image' => $updateCemetery['image']
					));
					if ($updateImage) {
						return true;
					} else {
						return 'Image Can\'t be uploaded';
					}
				} else {
					return true;
				}
			} else {
				return 'Cemetery Data Not Updated';
			}
		}

		public function delete_data($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('user');
		}

		public function delete_cemetery($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('cemetery');
		}

		public function delete_obituary($id)
		{
			$this->db->where('id', $id);
			if ($this->db->delete('obituary')) {
				return true;
			} else {
				return false;
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


		public function resetPassword($contactData)
		{
			$this->db->where('pwd_reset_token', $contactData['token']);
			$update = $this->db->update('user', array('password' => $contactData['password']));
			if ($update) {
				$this->db->where('pwd_reset_token', $contactData['token']);
				$this->db->update('user', array('pwd_reset_token' => ''));
				return true;
			} else {
				return false;
			}
		}
	}
