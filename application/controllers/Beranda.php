<?php

class Beranda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['CSSPATH'] = base_url().'assets/css/beranda/beranda.css';
		$data['JSPATH'] = base_url().'assets/js/beranda/beranda.js';
		$data['IMGPATH'] = base_url().'assets/img/';
		$data['title'] = 'Beranda';
		$this->load->view('templates/navbar', $data);
		$this->load->view('beranda/berandaberanda', $data);
		$this->load->view('templates/closing', $data);
	}

}