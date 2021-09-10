<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
		$this->load->model('Cemetery_model');
	}

	public function index()
	{
		$data['title'] = 'Grief and Healing, Flowers Delivery, Funeral Services in USA';
		$data['description'] = 'Heavenly Loves Cemetery provides care to your loved ones that have passed, by visiting their plots. funeral services, fresh and silk flower delivery, create your family tomb, memorial park page, grief, and healing.';
		$data['keywords'] = 'healing after loss, grief and healing, flowers delivery, flowers by grace, grace flowers, heavenly loves, Cemetery';

		$this->load->view('common/header', $data);
		$this->load->view('common/menu');
		$this->load->view('home');
		$this->load->view('common/footer');
	}

	public function about_us()
	{
		$data['title'] = 'About Us | To Find Your Loved Ones';
		$data['description'] = 'Heavenly Loves Cemetery\'s mission is to help others so that no one ever feels like they cannot visit their Heavenly Loves who\'ve died. We\'re here to make it simple, TO FIND YOUR LOVED ONES!';
		$data['keywords'] = 'gate of heaven cemetery, memorial park cemetery, memorial services, graveyard, virtual cemetery';

		$this->load->view('common/header', $data);
		$this->load->view('common/menu');
		$this->load->view('about-us');
		$this->load->view('common/footer');
	}

	public function contact()
	{
		$data['title'] = 'Funeral in Ohio, USA | Contact Us | Memorial Park Funeral Cemetery';
		$data['description'] = 'Memorial Park Funeral Cemetery in Ohio, USA. To send flowers to memorial park funeral home please visit our website Heavenly Loves Cemetery.';
		$data['keywords'] = 'heavenly loves, funeral in Ohio, memorial services, cemeteries, memorial park';

		$this->load->view('common/header', $data);
		$this->load->view('common/menu');
		$this->load->view('contact');
		$this->load->view('common/footer');
	}

	public function obituaries()
	{
		$data['title'] = 'Find Obituaries in Ohio, USA | Preserve Loved One’s Memories';
		$data['description'] = 'Heavenly Loves Cemetery find obituaries in Ohio, USA from thousands of locations. You can search by first or last name, state, and publication date. Celebrate and remember the lives we have lost in the US.';
		$data['keywords'] = 'find obituaries, obituaries, obituaries in Ohio, obituaries usa, online obituary';

		$data['obituaries'] = $this->Cemetery_model->obituary_list_Fornt();

		$this->load->view('common/header', $data);
		$this->load->view('common/menu');
		$this->load->view('obituaries');
		$this->load->view('home_obituaries', $data);
		$this->load->view('common/footer');
	}

	public function flowerAndGift()
	{
		$data['title'] = 'Flowers Delivery of Heavenly Flowers by Grace';
		$data['description'] = 'Order fresh flowers and gift sets flowers from a Heavenly Loves Cemetery. Just like a traditional cemetery, the Heavenly Loves Cemetery allows you to leave a flower or a small token on the virtual tombstone of your loved ones.';
		$data['keywords'] = 'flower of grace, flower delivery services, flowers for grace, flowers delivery';

		$this->load->view('common/header', $data);
		$this->load->view('common/menu');
		$this->load->view('flower_and_gift');
		$this->load->view('common/footer');
	}

	public function OurServices()
	{
		$data['title'] = 'Funeral Services, Flowers Delivery & Online Obituaries in Ohio, USA';
		$data['description'] = 'Heavenly Loves Cemetery provides an online obituary search tool, funeral services, create your family tomb, and allows you to leave a flower or a small token on the virtual tombstone of your loved ones.';
		$data['keywords'] = 'funeral services, funeral, funerals near me, funeral services near me, memorial services, graveyard';

		$this->load->view('common/header', $data);
		$this->load->view('common/menu');
		$this->load->view('our_services');
		$this->load->view('common/footer');
	}

	public function funeralServices()
	{
		$data['title'] = 'Funeral Services & Cemeteries in Ohio, USA';
		$data['description'] = 'Funeral Services & Cemeteries in Ohio, USA providing burials services, funeral and memorial services, buying and selling cemetery plots in Ohio, USA. Heavenly Loves Cemetery offers you to plan the Burial, Cremation, or Funeral services for your loved ones.';
		$data['keywords'] = 'funeral services, funeral, funerals near me, funeral services near me, funeral usa';

		$this->load->view('common/header', $data);
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

	public function CreateYourFamilyTomb()
	{
		$data['title'] = 'Create Your Family Tomb in Ohio, USA';
		$data['description'] = 'Heavenly Loves Cemetery\'s goal is to remedy that issue, so you never lose track of your family plots. Now our mission is to help others so that no one ever feels like they cannot visit their Heavenly Loves who\'ve died.';
		$data['keywords'] = 'family tomb in Ohio, family tomb usa, cemeteries, memorial services, grave';

		$this->load->view('common/header', $data);
		$this->load->view('common/menu');
		$this->load->view('create-your-family-tomb');
		$this->load->view('common/footer');
	}

	public function GriefAndHealing()
	{
		$data['title'] = 'Grief & Healing | Memorial Funeral';
		$data['description'] = 'Grieving the death of a loved one is a painful, still natural part of healing. We are here to support you navigate through that procedure. Whether you need support, advice, or only somebody to talk to, we are here for help.';
		$data['keywords'] = 'healing after loss, healing, grief, funeral, virtual cemetery, memorial services';

		$this->load->view('common/header', $data);
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


	public function login()
	{
		$this->load->view('login');
	}

	public function location()
	{
		$this->load->view('common/header');
		$this->load->library('googlemaps');
		$config['center'] = '40.4173, 82.9071';
		$config['zoom'] = 'auto';
		$config['apikey'] = ''; // Your google map API key
		$this->googlemaps->initialize($config);

		$marker = array(
			'position' => '40.4173, 82.9071'
		);
		$this->googlemaps->add_marker($marker);

		$data['map'] = $this->googlemaps->create_map();

		$this->load->view('common/header', $data);
		$this->load->view('common/menu');
		$this->load->view('cemetery', $data);
		$this->load->view('common/footer');
	}

	// public function location()
	// {
	// 	$data['title'] = 'Memorial Park Cemetery – Locations in Ohio, USA';
	// 	$data['description'] = 'Looking to find memorial park cemetery locations in Ohio, USA? Use our easy cemetery locator tool to browse our list of cemeteries within our heavenlylovescemetery.com';
	// 	$data['keywords'] = 'cemetery near me, find a grave memorial, find a cemetery, memorial park, famous cemeteries, nearest cemetery, cemetery park, cemetery memorials, locate cemetery';

	// 	$data['all_list'] = $this->Cemetery_model->cemeteryListFront();

	// 	$this->load->view('common/header', $data);
	// 	$this->load->view('common/menu');
	// 	$this->load->view('cemetery', $data);
	// 	$this->load->view('common/footer');
	// 	//$data['cemetery_cards'] = $this->cemetery_model->cemeteryList();
	// }

	public function fetch_cemetery_data()
	{
		$output = '';
		$query = '';
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
		}
		$data = $this->Cemetery_model->fetch_cemetery_data($query);
		if ($data->num_rows() > 0) {
			foreach ($data->result() as $row) {
				$output .= '<div class="col-sm-6 col-md-4 col-lg-3 mt-4 card-padding">
							<div class="card">
								<img class="card-img-top" src="' . base_url() . 'assets/cemetery/' . $row->image . '">
								<div class="card-block">
									<h4 class="card-title"><a href="http://maps.google.com/?q=' . preg_replace('/\s+&/', ' and', $row->title) . ' ' . preg_replace('/\s+&/', ' ', $row->street) . '" target="_blank">' . $row->title . '</a></h4>
									<div class="meta">
										<p>' . $row->street . ', ' . $row->zip . '</p>
									</div>
									<div class="card-text">'
					. $row->phone .
					'</div>
								</div>
							</div>
						</div>';
			}
		} else {
			$output .= 'No Data Found';
		}
		echo $output;
		// print_r($data);
	}

	public function googlemap()
	{
		$this->load->view('googlemap');
	}
}
