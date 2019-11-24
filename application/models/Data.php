<?php 
use GuzzleHttp\Client;

class Data extends CI_model
{

	private function createClient()
	{
		$_client = new Client([
			'base_uri' => $this->config->item('server_url'),
			'auth' => ['noericell', 'admindandangan']
		]);
		return $_client;
	}

	public function dataOneWeek($tanggal){
		$this->load->library('adminBerandaLib', 'adminberandalib');
		$_client = $this->createClient();
		$query = [
			'query' => [
				'apikey' => 'jamah',
				'tanggal' => $tanggal] 
			];
			$response = $_client->request('GET', 'data/oneweek', $query);
			$result = json_decode($response->getBody()->getContents(), true);
			$result = $result['data'];
			$result['totaltransaksi'] = $this->adminberandalib->getAllTransaksi($result);
			$result['narko'] = $this->adminberandalib->getBonus($result, 'narko');
			$result['sis'] = $this->adminberandalib->getBonus($result, 'sis');
			$result['bose'] = $this->adminberandalib->getBonus($result, 'bose');
			$result['allday'] = $this->adminberandalib->getAllday($result);
			$result['dayname'] = $this->adminberandalib->getDayName();
			$result['shortbydate'] = $this->adminberandalib->shortByDate($result);
			$result['rekapitem'] = Array('HP Masuk', 'HP Terjual', 'Servis Selesai', 'Servis Return', 'Accesoris');
			$result['page'] = Array(base_url('admin/beranda/'.$result['day']['lastweek']), base_url('admin/beranda/'.$result['day']['nextweek']), base_url('admin/beranda/'.date("Ymd")));
			$result['sales'] = ['sis', 'narko'];
			$result['encoded'] = json_encode($result);
			// var_dump($result['bose']['bservis']['bservistotal']);
			return $result;
		}

}