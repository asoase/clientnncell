<?php

class Beranda extends CI_Controller
{

	public function index()
	{
		$this->load->view('sbtemplates/header.php');
		$this->load->view('sbtemplates/sidebar.php');
		$this->load->view('sbtemplates/topbar.php');
		$this->load->view('awal/sbadmin2.php');
		$this->load->view('sbtemplates/footer.php');
	}

}
