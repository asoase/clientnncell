<?php

class Servis extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['CSSPATH'] = base_url().'assets/css/servis/beranda.css';
		$data['JSPATH'] = base_url().'assets/js/servis/beranda.js';
		$data['IMGPATH'] = base_url().'assets/img/';
		$data['title'] = 'Servis';
		$data['headeraktif'] = 1;
		$this->load->view('templates/navbar', $data);
		$this->load->view('servis/beranda', $data);
		$this->load->view('templates/closing', $data);
	}

}
