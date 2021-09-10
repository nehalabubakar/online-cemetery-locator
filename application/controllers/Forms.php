<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/main
	 *	- or -
	 * 		http://example.com/index.php/main/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/main/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index(){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required');

		if($this->form_validation->run()){
			$post = $this->input->post();
			$message = '<html><body>';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message = '<html><body>';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			foreach ($post as $key => $value) {
				$message .= "<tr style='background: #eee;'><td><strong>".ucwords(str_replace('_', ' ', $key)).":</strong> </td><td>".$value."</td></tr>";
			}
			$message .= "</table>";
			$message .= "</body></html>";
			$message .= "</table>";
			$message .= "</body></html>";

			$this->email->from($this->input->post('email'), $this->input->post('name'));
			$this->email->to('heavenlylovescemetery@gmail.com');
			$this->email->subject('Contact Form Received On Heavenly Loves Cemetery');
			$this->email->message($message);

			if($this->email->send()){
				$data['message'] = 'Thank you for submitting the form, We will contact you shortly.';
				$data['class'] = 'alert-success';
			}
			else{
				$data['message'] = $this->email->print_debugger();
				$data['class'] = 'alert-danger';
			}
		}
		else{
			$errors = $this->form_validation->error_array();
			$errorsKeys = array_keys($errors);
			$data['message']     = $errors[$errorsKeys[0]];
			$data['class'] = 'alert-danger';
		}
		echo json_encode($data);
	}
}