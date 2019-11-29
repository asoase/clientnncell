<?php 
use GuzzleHttp\Client;

class Menu_admin extends CI_model
{
	public function createClient()
	{
		$_client = new Client([
			'base_uri' => $this->config->item('server_url'),
			'auth' => ['noericell', 'admindandangan']
		]);
		return $_client;
	}
	public function getquerymenu(){
		$query = [
			'query' => [
				'apikey' => 'jamah']
			];
			return $query;
		}

		public function getmenu(){
			$_client = $this->createClient();
			$query = $this->getquerymenu();
			$response = $_client->request('GET', 'adminmenu/menu', $query);
			$result = json_decode($response->getBody()->getContents(), true);
			$result = $result['data'];
			return $result;
		}
	}