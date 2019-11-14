<?php 
use GuzzleHttp\Client;

class Admin_beranda extends CI_model
{

	private function createClient()
	{
		$_client = new Client([
			'base_uri' => 'http://localhost/servernncell/',
			'auth' => ['noericell', 'admindandangan']
		]);
		return $_client;
	}
	
}