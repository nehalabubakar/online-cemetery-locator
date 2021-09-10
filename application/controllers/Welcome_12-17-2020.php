<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
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
		$this->load->model('Cemetery_model');
	}

	public function index(){
		$this->load->view('common/header');
		$this->load->view('common/menu');
		$this->load->view('home');
		$this->load->view('common/footer');
	}

	public function about_us(){
		$this->load->view('common/header');
		$this->load->view('common/menu');
		$this->load->view('about-us');
		$this->load->view('common/footer');
	}
	
	public function contact(){
		$this->load->view('common/header');
		$this->load->view('common/menu');
		$this->load->view('contact');
		$this->load->view('common/footer');
	}
	
	public function obituaries(){
		$data['obituaries'] = $this->Cemetery_model->obituary_list_Fornt();
//		print_r($data['obituaries']);
		$this->load->view('common/header');
		$this->load->view('common/menu');
		$this->load->view('obituaries');
		$this->load->view('home_obituaries', $data);
		$this->load->view('common/footer');
	}
	
	public function flowerAndGift(){
		$this->load->view('common/header');
		$this->load->view('common/menu');
		$this->load->view('flower_and_gift');
		$this->load->view('common/footer');
	}
	
	public function OurServices(){
		$this->load->view('common/header');
		$this->load->view('common/menu');
		$this->load->view('our_services');
		$this->load->view('common/footer');
	}
	
	public function funeralServices()
	{
		$this->load->view('common/header');
		$this->load->view('common/menu');
		$this->load->view('funeral_services');
		$this->load->view('common/footer');
	}
	
	public function Funeral()
	{
		$this->load->view('common/header');
		$this->load->view('common/menu');
		$this->load->view('funeral services/funeral');
		$this->load->view('common/footer');
	}

	public function Burial()
	{
		$this->load->view('common/header');
		$this->load->view('common/menu');
		$this->load->view('funeral services/burial');
		$this->load->view('common/footer');
	}

	public function Cremation()
	{
		$this->load->view('common/header');
		$this->load->view('common/menu');
		$this->load->view('funeral services/cremation');
		$this->load->view('common/footer');
	}

    public function CreateYourFamilyTomb(){
		$this->load->view('common/header');
		$this->load->view('common/menu');
		$this->load->view('create-your-family-tomb');
		$this->load->view('common/footer');
	}
	
	public function GiftAndHealing()
	{
		$this->load->view('common/header');
		$this->load->view('common/menu');
		$this->load->view('gift_and_healing');
		$this->load->view('common/footer');
	}

	public function PlanAhead()
	{
		$this->load->view('common/header');
		$this->load->view('common/menu');
		$this->load->view('plan_ahead');
		$this->load->view('common/footer');
	}
	

	public function login(){
		$this->load->view('login');
	}
	
	// public function location(){
	// 	// $this->load->view('common/header');
	// 	// $this->load->library('googlemaps');
	// 	// $config['center'] = '40.4173, 82.9071';
	// 	// $config['zoom'] = 'auto';
	// 	// $config['apikey'] = 'AIzaSyDyZC9am8yBjeoBuuJ6Q5yEKRlN2VZLClk';
	// 	// $this->googlemaps->initialize($config);

	// 	// $marker = array(
	// 	// 	'position' => '40.4173, 82.9071'
	// 	// );
	// 	// $this->googlemaps->add_marker($marker);

	// 	// $data['map'] = $this->googlemaps->create_map();

	// 	// $this->load->view('cemetery', $data);
	// 	$this->load->view('cemetery');
	// 	// $this->load->view('common/footer');
	// }

	public function location(){
		$data['all_list'] = $this->Cemetery_model->cemeteryListFront();
		$this->load->view('common/header');
		$this->load->view('common/menu');
		// $this->load->library('googlemaps');
		// $config['center'] = '40.4173, 82.9071';
		// $config['zoom'] = 'auto';
		// $config['apikey'] = 'AIzaSyDC5O5p-9bEJjGldmdr1r07SdaT-OUWfxo';
		// $this->googlemaps->initialize($config);

		// $marker = array(
		// 	'position' => '40.4173, 82.9071'
		// );
		// $this->googlemaps->add_marker($marker);

		// $data['map'] = $this->googlemaps->create_map();

		// $this->load->view('cemetery', $data);

		$this->load->view('cemetery', $data);
		$this->load->view('common/footer');
		//$data['cemetery_cards'] = $this->cemetery_model->cemeteryList();
	}

	public function fetch_cemetery_data(){
		$output = '';
		$query = '';
		if($this->input->post('query')){
			$query = $this->input->post('query');
		}
		$data = $this->Cemetery_model->fetch_cemetery_data($query);
		if($data->num_rows() > 0){
			foreach ($data->result() as $row) {
				$output .= '<div class="col-sm-6 col-md-4 col-lg-3 mt-4 card-padding">
							<div class="card">
								<img class="card-img-top" src="' . base_url() . 'assets/cemetery/' . $row->image .'">
								<div class="card-block">
									<h4 class="card-title"><a href="http://maps.google.com/?q=' . $row->title . '" target="_blank">' . $row->title . '</a></h4>
									<div class="meta">
										<p>' . $row->street . ', ' . $row->zip .'</p>
									</div>
									<div class="card-text">'
										. $row->phone .
									'</div>
								</div>
							</div>
						</div>';
			}
		}
		else{
			$output .= 'No Data Found';
		}
		echo $output;
		// print_r($data);
	}

	public function googlemap(){
		$this->load->view('googlemap');
	}
}
