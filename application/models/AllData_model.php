<?php 
use GuzzleHttp\Client;

class AllData_model extends CI_model
{

	private function createClient()
	{
		$_client = new Client([
			'base_uri' => 'http://localhost/servernncell/',
			'auth' => ['noericell', 'admindandangan']
		]);
		return $_client;
	}

	public function addrekap($data)
	{
		$_client = $this->createClient();
		$response = $_client->request('POST', 'datarekap',
			[
				'form_params' => $data,
				'http_errors' => true
			]);
		return $response;
	}

	public function getallData($tanggal)
	{
		$_client = $this->createClient();
		$response = $_client->request('GET', 'datarekap',
			[
				'query' => [
					'apikey' => 'jamah',
					'tanggal' => $tanggal
				]
			]);
		$result = json_decode($response->getBody()->getContents(), true);
		$result = $result['data'];
		$result['narko'] = $this->getBonus($result, 'narko');
		$result['sis'] = $this->getBonus($result, 'sis');
		$result['allday'] = $this->getAllday($result);
		$result['encoded'] = json_encode($result);
		return $result;
	}

	private function getBonus($data, $nama){
		//hp in
		$bhpinfix = 0;
		$bhpintotal = 0;
		$bhpinreturn = 0;
		$ballin = array();
		$ballinret = array();
		//hp out
		$bhpoutfix = 0;
		$bhpouttotal = 0;
		$bhpoutreturn = 0;
		$ballout = array();
		$balloutret = array();
		//servis
		$bservisfix = 0;
		$bservistotal = 0;
		$bservisreturn = 0;
		$ballserv = array();
		$ballservret = array();

		// bonus hp in
		foreach ($data['weeknow']['vhpin'] as $hpin) {
			if(preg_match('/'.$nama.'/', $hpin['sales'])) {
				$bhpinfix++;
				$bhpintotal++;
				array_push($ballin, $hpin['merk'].' '.$hpin['tipe'].' ('.$hpin['tanggal'].')');
				$tanggal = strtotime($hpin['tanggal']);
				$sampai = strtotime('-7 day', strtotime($hpin['tanggal']));

				foreach ($data['weeknow']['vhpout'] as $hpout) {
					$compare1 = strtotime($hpout['tanggal']) < $tanggal; // tanggal hpout lebih kecil dari hp out
					$compare2 = strtotime($hpout['tanggal']) >= $sampai; // tanggal hpout lebih besar dari sampai
					if ( $compare1 && $compare2){
						$pregmatch1 = preg_match('/'.$hpin['tipe'].'/', $hpout['tipe']);
						$pregmatch2 = preg_match('/'.$hpout['tipe'].'/', $hpin['tipe']);
						$compareimei = $hpin['imei'] == $hpout['imei'];
						if( ($pregmatch1 || $pregmatch2) && $compareimei ){
							$bhpinfix--;
							$bhpinreturn++;
							array_push($ballinret, $hpout['merk'].' '.$hpout['tipe'].' ('.$hpout['tanggal'].')');
						}
					}
				}

				foreach ($data['weeklast']['vhpout'] as $hpout) {
					$compare1 = strtotime($hpout['tanggal']) < $tanggal;
					$compare2 = strtotime($hpout['tanggal']) >= $sampai;
					if( $compare1 && $compare2){
						$pregmatch1 = preg_match('/'.$hpin['tipe'].'/', $hpout['tipe']);
						$pregmatch2 = preg_match('/'.$hpout['tipe'].'/', $hpin['tipe']);
						$compareimei = $hpin['imei'] == $hpout['imei'];
						if( ($pregmatch1 || $pregmatch2) && $compareimei ){
							$bhpinfix--;
							$bhpinreturn++;
							array_push($ballinret, $hpout['merk'].' '.$hpout['tipe'].' ('.$hpout['tanggal'].')');
						}
					}
				}

			}
		}
		// bonus hp out
		foreach ($data['weeknow']['vhpout'] as $hpout) {
			if(preg_match('/'.$nama.'/', $hpout['sales'])) {
				$bhpoutfix++;
				$bhpouttotal++;
				array_push($ballout, $hpout['merk'].' '.$hpout['tipe'].' ('.$hpout['tanggal'].')');
				$tanggal = strtotime($hpout['tanggal']);
				$sampai = strtotime('+7'.' day', strtotime($hpout['tanggal']));
				foreach ($data['weeknow']['vhpin'] as $hpin) {
					$compare1 = strtotime($hpin['tanggal']) > $tanggal;
					$compare2 = strtotime($hpin['tanggal']) <= $sampai;
					if($compare1 && $compare2){
						$pregmatch1 = preg_match('/'.$hpin['tipe'].'/', $hpout['tipe']);
						$pregmatch2 = preg_match('/'.$hpout['tipe'].'/', $hpin['tipe']);
						$compareimei = $hpin['imei'] == $hpout['imei'];
						if( ($pregmatch1 || $pregmatch2) && $compareimei ) {
							$bhpoutfix--;
							$bhpoutreturn++;
							array_push($balloutret, $hpin['merk'].' '.$hpin['tipe'].' ('.$hpin['tanggal'].')');
						}
					}
				}
			}
		}
		// bonus servis
		foreach ($data['weeknow']['vservisdone'] as $servisdone) {
			if(preg_match('/'.$nama.'/', $servisdone['teknisi'])) {
				$bservisfix++;
				$bservistotal++;
				array_push($ballserv, $servisdone['merk'].' '.$servisdone['tipe'].' ('.$servisdone['tanggal'].')');
				$tanggal = strtotime($servisdone['tanggal']);
				$sampai = strtotime('+7'.' day', strtotime($servisdone['tanggal']));

				foreach ($data['weeknow']['vservisreturn'] as $servisreturn) {
					$compare1 = strtotime($servisreturn['tanggal']) > $tanggal;
					$compare2 = strtotime($servisreturn['tanggal']) <= $sampai;
					if($compare1 && $compare2){
						$pregmatch1 = preg_match('/'.$servisreturn['tipe'].'/', $servisdone['tipe']);
						$pregmatch2 = preg_match('/'.$servisdone['tipe'].'/', $servisreturn['tipe']);
						if( $pregmatch1 || $pregmatch2 ) {
							$bservisfix--;
							$bservisreturn++;
							array_push($ballservret, $servisdone['merk'].' '.$servisdone['tipe'].' ('.$servisdone['tanggal'].')');
						}
					}
				}
			}
		}
		$bhpin['bhpinfix'] = $bhpinfix;
		$bhpin['bhpintotal'] = $bhpintotal;
		$bhpin['bhpinreturn'] = $bhpinreturn;
		$bhpin['ballin'] = $ballin;
		$bhpin['ballinret'] = $ballinret;

		$bhpout['bhpoutfix'] = $bhpoutfix;
		$bhpout['bhpouttotal'] = $bhpouttotal;
		$bhpout['bhpoutreturn'] = $bhpoutreturn;
		$bhpout['ballout'] = $ballout;
		$bhpout['balloutret'] = $balloutret;

		$bservis['bservisfix'] = $bservisfix;
		$bservis['bservistotal'] = $bservistotal;
		$bservis['bservisreturn'] = $bservisreturn;
		$bservis['ballserv'] = $ballserv;
		$bservis['ballservret'] = $ballservret;

		$bonus['bhpin'] = $bhpin;
		$bonus['bhpout'] = $bhpout;
		$bonus['bservis'] = $bservis;
		return $bonus;
	}

	private function getAllday($data){
		$allday = array();
		for($i = 0; $i < 7; $i++){
			$nowday = strtotime('+'.$i.' day', strtotime($data['day']['fromday']));
			$nowday = date ('d-M-Y', $nowday); // sabtu minggu ini
			array_push($allday, $nowday);
		}
		return $allday;
	}

	public function getHpin($id){
		$_client = $this->createClient();
		$response = $_client->request('GET', 'alldata/hpin',
			[
				'query' => [
					'apikey' => 'jamah',
					'id' => $id
				]
			]);
		$result = json_decode($response->getBody()->getContents(), true);
		$result = $result['data'][0];
		return $result;
	}

}

?>