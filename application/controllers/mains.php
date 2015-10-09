<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mains extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('main');
		// $this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->library('form_validation');
		$this->load->view('index');
	}

	public function register()
	{
		$this->main->register($this->input->post());
		redirect('/');
	}

	public function login()
	{
		$this->main->login($this->input->post());
		$user = $this->main->login($this->input->post());
		if($user)
		{
			$this->session->set_userdata('user', $user);
			redirect('/travels');
		}
		else{
			redirect('/');
		}
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function travels()
	{
		$user_info = $this->session->userdata('user');
		$alltripinfo = $this->main->fetch_all_trips($this->session->userdata['user']['id']);
		$mytripinfo = $this->main->fetch_my_trips($this->session->userdata['user']['id']);
		$this->load->view('travels', array('user' =>$user_info,
											'all_tripinfo' => $alltripinfo,
											'my_tripinfo' => $mytripinfo));
	}

	public function add()
	{
		$this->load->view('add');
	}

	public function add_trip()
	{
		$this->main->add_trip($this->input->post());
		redirect('/travels');
	}

	public function destination($id)
	{
		$trip = $this->main->fetch_trip_by_id($id);
		$tripzzz = $this->main->fetch_trip_by_idzzz($id);
		$this->load->view('destination', array('trips'=>$trip,
												'tripzzz' => $tripzzz));
	}

	public function join($id)
	{
		$this->main->add_to_trip($id);
		$trip = $this->main->fetch_trip_by_id($id);
		redirect('travels');
	}
}
?>