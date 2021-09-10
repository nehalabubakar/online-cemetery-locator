<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *        http://example.com/index.php/welcome
	 *    - or -
	 *        http://example.com/index.php/welcome/index
	 *    - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('string');
		$this->load->model('Login_model');
		$this->load->model('cemetery_model');
	}

	public function login()
	{
		$this->load->view('dashboard/admin_common/header');
		$this->load->view('dashboard/login');
		$this->load->view('dashboard/admin_common/footer');

	}

	public function login_validation()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run()) {
	
			$user_login_credentials = array(
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			);

			if ($this->Login_model->login($user_login_credentials)) {
				$user_session = array(
					'email' => $this->input->post('email')
				);
				$this->session->set_userdata($user_session);
				echo json_encode($user_session);
			} else {
				$data['message'] = 'Email or password is incorrect';
				$data['password'] = $this->Login_model->login($user_login_credentials);
				echo json_encode($data);
			}
		} else {
			$error = array(
				'message' => 'Error in one or more feilds',
				'emailError' => form_error('email'),
				'passwordError' => form_error('password')
			);
			echo json_encode($error);
		}
	}

	public function create_account()
	{
		$this->load->view('dashboard/admin_common/header');
		$this->load->view('dashboard/signup');
		$this->load->view('dashboard/admin_common/footer');
	}

	public function contactSubmit()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstName', 'First Name', 'required|alpha|trim');
		$this->form_validation->set_rules('lastName', 'Last Name', 'required|alpha|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$response = array(
				'status' => 'error',
				'message' => validation_errors()
			);
		} else {
			$contactData = array(
				'first_name' => $this->input->post('firstName', true),
				'last_name' => $this->input->post('lastName', true),
				'email' => $this->input->post('email', true),
				'password' => $this->encryption->encrypt($this->input->post('password')),
			);

			$id = $this->Login_model->insert_contact($contactData);

			$response = array(
				'status' => 'success',
				'message' => "<h3>User added successfully.</h3>"
			);
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}


	public function welcome()
	{
		if ($this->session->userdata('email') != '') {
			$data['user_details'] = $this->Login_model->user_info($this->session->userdata('email'));
			$this->load->view('dashboard/common/header');
			$this->load->view('dashboard/common/sidebar', $data);
			$this->load->view('dashboard/common/top-navigation', $data);
			$this->load->view('dashboard/common/dashboard');
			$this->load->view('dashboard/common/footer');
		} else {
			redirect(base_url() . 'login');
		}
	}

	public function add_cemetery()
	{
	    if ($this->session->userdata('email') != '') {
			$data['user_details'] = $this->Login_model->user_info($this->session->userdata('email'));
        		$this->load->view('dashboard/common/header');
        		$this->load->view('dashboard/common/sidebar', $data);
        		$this->load->view('dashboard/common/top-navigation', $data);
        		$this->load->view('dashboard/add-cemetery');
        		$this->load->view('dashboard/common/footer');
	    } else {
			redirect(base_url() . 'login');
		}
	}

	public function cemetery()
	{
		$this->load->library('form_validation');
//		$this->form_validation->set_rules('image', 'image', 'required');
		$this->form_validation->set_rules('title', 'tilte', 'required');
		$this->form_validation->set_rules('phone', 'phone', 'required');
		$this->form_validation->set_rules('street', 'street', 'required');
		$this->form_validation->set_rules('zip', 'zip', 'required');
		$this->form_validation->set_rules('longitude', 'longitude', 'required');
		$this->form_validation->set_rules('latitude', 'latitude', 'required');

		if ($this->form_validation->run() == false) {
			$response = array(
				'status' => 'error',
				'message' => validation_errors()
			);
			echo json_encode($response);
		} else {
			if (isset($_FILES['image']['name'])) {
//				print_r($_FILES['image']);
				$config['upload_path'] = 'assets/cemetery/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				//$filename = $_FILES['file']['name'];
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$data = $this->upload->data();
					$cemeteryData = array(
						'title' => $this->input->post('title', true),
						'phone' => $this->input->post('phone', true),
						'street' => $this->input->post('street', true),
						'zip' => $this->input->post('zip', true),
						'longitude' => $this->input->post('longitude', true),
						'latitude' => $this->input->post('latitude', true),
						'image' => $data['file_name']
					);

					$id = $this->cemetery_model->insert_cemetery($cemeteryData);
					$response = array(
						'status' => 'success',
						'message' => "<h3>Cemetery added successfully.</h3>"
					);
//					echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';;
				} else {

					$data['message'] = $this->upload->display_errors();
				}
			} else {
				$data['message'] = "Image File Not set";
			}
			echo json_encode($response);
		}
	}

    public function list_cemetery()
	{
		if ($this->session->userdata('email') != '') {
			$data['user_details'] = $this->Login_model->user_info($this->session->userdata('email'));
			$data['cemetery_list'] = $this->cemetery_model->cemeteryList();
			$this->load->view('dashboard/common/header');
			$this->load->view('dashboard/common/sidebar', $data);
			$this->load->view('dashboard/common/top-navigation', $data);
			$this->load->view('dashboard/cemetery_list', $data);
			$this->load->view('dashboard/common/footer');
		} else {
			redirect(base_url() . 'login');
		}

	}

	public function UsersList()
	{
		if ($this->session->userdata('email') != '') {
			$data['user_details'] = $this->Login_model->user_info($this->session->userdata('email'));
			$data['users_list'] = $this->cemetery_model->usersList();
			$this->load->view('dashboard/common/header');
			$this->load->view('dashboard/common/sidebar', $data);
			$this->load->view('dashboard/common/top-navigation', $data);
			$this->load->view('dashboard/user_list', $data);
			$this->load->view('dashboard/common/footer');
		} else {
			redirect(base_url() . 'login');
		}

	}

	public function add_obituary(){
		if($this->session->userdata('email') != ''){
			$data['user_details'] = $this->Login_model->user_info($this->session->userdata('email'));

			$this->load->view('dashboard/common/header');
			$this->load->view('dashboard/common/sidebar', $data);
			$this->load->view('dashboard/common/top-navigation', $data);
			$this->load->view('dashboard/add-obituary', $data);
			$this->load->view('dashboard/common/footer', $data);
		}
		else{
			redirect(base_url() . 'login');
		}
	}

	public function add_obituary_db(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Person Name', 'required|trim');
		$this->form_validation->set_rules('dates', 'Birth & Death Dates', 'required');
		$this->form_validation->set_rules('prayers', 'Prayers', 'required');

		if($this->form_validation->run()){
			if(isset($_FILES['image']['name'])){
				$config['upload_path'] = 'assets/obituaries';
				$config['allowed_types'] = 'jpg|jpeg|png';

				$this->load->library('upload', $config);
				if($this->upload->do_upload('image')){
					$image_data = $this->upload->data();

					$obituary_data = array(
						'person_name' => $this->input->post('name'),
						'dates' => $this->input->post('dates'),
						'prayers' => $this->input->post('prayers'),
						'image' => $image_data['file_name'] 
					);

					if($this->cemetery_model->insert_obituary($obituary_data)){
						$data['class'] = 'alert-success';
						$data['message'] = 'Obituary Added Succcessfully';

					}
					else{
						$data['class'] = 'alert-danger';
						$data['message'] = 'An Error Occured';
					}
				}
				else{
					$data['class'] = 'alert-danger';
					$data['message'] = $this->upload->display_errors();
				}
			}
			else{
				$data['message'] = 'Please select a file to upload';
			}
		}
		else{
			$errors = $this->form_validation->error_array();
			$errorsKeys = array_keys($errors);
			$data = array(
				'class' => 'alert-danger',
				'message' => $errors[$errorsKeys[0]],
			);
		}
		echo json_encode($data);
	}

	public function obituary_list(){
		if ($this->session->userdata('email') != '') {
			$data['user_details'] = $this->Login_model->user_info($this->session->userdata('email'));
			$data['obituary_list'] = $this->cemetery_model->obituary_list();
			$this->load->view('dashboard/common/header');
			$this->load->view('dashboard/common/sidebar', $data);
			$this->load->view('dashboard/common/top-navigation', $data);
			$this->load->view('dashboard/obituaries_list', $data);
			$this->load->view('dashboard/common/footer');
		} else {
			redirect(base_url() . 'login');
		}

	}
	
	public function forgot()
	{
		$this->load->view('dashboard/admin_common/header');
		$this->load->view('dashboard/forgot');
		$this->load->view('dashboard/admin_common/footer');
	}

	public function ForgotPassword()
	{
		$email = $this->input->post('email');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run()) {
			$findemail = $this->Login_model->ForgotPassword($email);
			if ($findemail['email'] == $email) {
				$passwordplain = random_string('alnum', 16);
				$update_user = array('email' => $email, 'Token' => $passwordplain);
				if ($this->Login_model->GenerateToken($update_user)) {
					$message = '<html>
									<body style="background-color: #e1e1e1; margin: 0 !important; padding: 0 !important;">
    								<!-- HIDDEN PREHEADER TEXT -->
									<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: \'Lato\', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We\'re thrilled to have you here! Get ready to dive into your new account. </div>
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<!-- LOGO -->
										<tr>
											<td bgcolor="#1746e0" align="center">
												<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
													<tr>
														<td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> 
														<img src="' . base_url() . 'assets/website/images/logo.png" width="250" height="100" style="display: block; border: 0px;" />
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td bgcolor="#1746e0" align="center" style="padding: 0px 10px 0px 10px;">
												<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
													<tr>
														<td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
															<h1 style="font-size: 48px; font-weight: 400; margin: 2;">Reset Password</h1>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td bgcolor="#e1e1e1" align="center" style="padding: 0px 10px 0px 10px;">
												<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
													<tr>
														<td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
															<p style="margin: 0;">We\'re excited to have you get started. First, you need to confirm your account. Just press the button below.</p>
														</td>
													</tr>
													 <tr>
														<td bgcolor="#ffffff" align="left">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
																		<table border="0" cellspacing="0" cellpadding="0">
																			<tr>
																				<td align="center" style="border-radius: 3px;" bgcolor="#1746e0">
																				<a href="' . base_url() . "dashboard/confirmPassword/" . $update_user["Token"] . '" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #1746e0; display: inline-block;">Reset Password</a></td>
																			</tr>
																		</table>
																	</td>
																</tr>
															</table>
														</td>
													</tr>
													<tr>
														<td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
															<p style="margin: 0;">If you Didn\'t Send Request for Password Reset Please Ignore This Email.</p>
														</td>
													</tr> <!-- COPY -->											 
													 <tr>
														<td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
															<p style="margin: 0;"></p>
														</td>
													 </tr>
												
												</table>
											</td>
										</tr>
									</table>
								</body>
							</html>';
//					End of email template

					$this->load->library('email');
					$this->email->from('noreply@cemetery.com');
					$this->email->to($_REQUEST['email']);
					$this->email->subject('Password Reset Link');
					$this->email->message($message);
					if ($this->email->send()) {
						$data['message'] = 'Insturctions to change you password has been sent to your email';
						$data['class'] = 'alert-success';
					} else {
						$data['message'] = $this->email->print_debugger();
						$data['class'] = 'alert-danger';
					}
				}
			} else {
				$data['message'] = 'Email no found';
				$data['class'] = 'alert-danger';
			}
		} else {
			$errors = $this->form_validation->error_array();
			$errorsKeys = array_keys($errors);
			$data['message'] = $errors[$errorsKeys[0]];
			$data['class'] = 'alert-danger';
		}
		echo json_encode($data);
	}

	public function confirmPassword($Token)
	{
		$token = $this->uri->segment(3);
		$isTokenValid = $this->Login_model->checkToken($token);
		if ($isTokenValid) {
			$this->load->view('dashboard/admin_common/header');
			$this->load->view('confirm_password');
			$this->load->view('dashboard/admin_common/footer');
		} else {
			show_404();
		}
	}

	Public function passwordReset(){
		$password = $this->form_validation->set_rules('password', 'Password', 'required');
		$confirmPassword = $this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[password]');
		if ($this->form_validation->run()) {
			$token = $_POST['token'];
			$password = $this->encryption->encrypt($this->input->post('password'));

			$contactData = array(
				'password' => $password,
				'token'=> $token
			);
			$isPasswordReset = $this->Login_model->resetPassword($contactData);
			if($isPasswordReset){
				$data['message'] = "Password Updated";
				$data['class'] = 'alert-success';
			} else{
				$data['message'] = "An Error Occured";
				$data['class'] = 'alert-danger';
			}
		} else{
			$errors = $this->form_validation->error_array();
			$errorsKeys = array_keys($errors);
			$data['message'] = $errors[$errorsKeys[0]];
			$data['class'] = 'alert-danger';
		}
		echo json_encode($data);

	}


}
