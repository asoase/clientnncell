<?php 
use GuzzleHttp\Client;

class Data extends CI_model
{

	private function createClient()
	{
		$_client = new Client([
			'base_uri' => 'http://localhost/servernncell/',
			'auth' => ['noericell', 'admindandangan']
		]);
		return $_client;
	}

	public function dataOneWeek($tanggal){
		$this->load->library('adminberandalib');
		$_client = $this->createClient();
		$query = [
			'query' => [
				'apikey' => 'jamah',
				'tanggal' => $tanggal] 
			];
			$response = $_client->request('GET', 'data/oneweek', $query);
			$result = json_decode($response->getBody()->getContents(), true);
			$result = $result['data'];
			$result['narko'] = $this->adminberandalib->getBonus($result, 'narko');
			$result['sis'] = $this->adminberandalib->getBonus($result, 'sis');
			$result['allday'] = $this->adminberandalib->getAllday($result);
			$result['dayname'] = $this->adminberandalib->getDayName();
			$result['shortbydate'] = $this->adminberandalib->shortByDate($result);
			$result['rekapitem'] = Array('HP Masuk', 'HP Terjual', 'Servis Selesai', 'Servis Return', 'Accesoris');
			$result['encoded'] = json_encode($result);
			return $result;
		}

}