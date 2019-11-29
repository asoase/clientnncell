<?php 

class AdminBerandaLib{

	private $rekapitem = array('vhpin', 'vhpout', 'vservisdone', 'vservisreturn', 'vacc');
	private $itemtoselect = array('jaringan', 'garansi', 'ram', 'rom', 'kelengkapan', 'sales');

	function getDayName(){
		$dayname = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
		return $dayname;
	}

	function getAllday($data){
		$allday = array();
		for($i = 0; $i < 7; $i++){
			$nowday = strtotime('+'.$i.' day', strtotime($data['day']['fromday']));
			$nowday = date ('d-M-Y', $nowday); // sabtu minggu ini
			array_push($allday, $nowday);
		}
		return $allday;
	}

	function shortByDate($data){
		$resultsort = Array();
		for ($i=0; $i < 7; $i++) {
			$day = Array();
			for ($j=0; $j < 5; $j++) {
				$item = Array();
				foreach ($data['weeknow'][$this->rekapitem[$j]] as $value) {
					if(strtotime($value['tanggal']) == strtotime($data['allday'][$i])){
						array_push($item, $value);
					}
				}
				array_push($day, $item);
			}
			array_push($resultsort, $day);
		}
		return $resultsort;
	}

	function getAllTransaksi($data){
		$totaltransaksi = array();
		$totaltransaksi['hpin'] = array(0, 0);
		$totaltransaksi['hpout'] = array(0, 0);
		$totaltransaksi['servis'] = array(0, 0);

		foreach ($data['weeknow']['vhpin'] as $hpin) {
			$isreturnextist = false;
			$totaltransaksi['hpin'][0] += 1;
			$tanggal = strtotime($hpin['tanggal']);
			$sampai = strtotime('-7 day', strtotime($hpin['tanggal']));

			foreach ($data['weeknow']['vhpout'] as $hpout) {
				if(!$isreturnextist){
					$compare1 = strtotime($hpout['tanggal']) < $tanggal;
					$compare2 = strtotime($hpout['tanggal']) >= $sampai;
					if ( $compare1 && $compare2){
						$pregmatch1 = preg_match('/'.$hpin['tipe'].'/', $hpout['tipe']);
						$pregmatch2 = preg_match('/'.$hpout['tipe'].'/', $hpin['tipe']);
						$compareimei = $hpin['imei'] == $hpout['imei'];
						if( ($pregmatch1 || $pregmatch2) && $compareimei ){
							$totaltransaksi['hpin'][1] += 1;
							$isreturnextist = true;
						}
					}
				}
			}

			if(!$isreturnextist){
				foreach ($data['weeklast']['vhpout'] as $hpout) {
					$compare1 = strtotime($hpout['tanggal']) < $tanggal;
					$compare2 = strtotime($hpout['tanggal']) >= $sampai;
					if( $compare1 && $compare2){
						$pregmatch1 = preg_match('/'.$hpin['tipe'].'/', $hpout['tipe']);
						$pregmatch2 = preg_match('/'.$hpout['tipe'].'/', $hpin['tipe']);
						$compareimei = $hpin['imei'] == $hpout['imei'];
						if( ($pregmatch1 || $pregmatch2) && $compareimei ){
							$totaltransaksi['hpin'][1] += 1;
						}
					}
				}
			}
		}

		foreach ($data['weeknow']['vhpout'] as $hpout) {
			$isreturnextist = false;
			$totaltransaksi['hpout'][0] += 1;
			$tanggal = strtotime($hpout['tanggal']);
			$sampai = strtotime('+7'.' day', strtotime($hpout['tanggal']));

			foreach ($data['weeknow']['vhpin'] as $hpin) {
				if(!$isreturnextist){
					$compare1 = strtotime($hpin['tanggal']) > $tanggal;
					$compare2 = strtotime($hpin['tanggal']) <= $sampai;
					if($compare1 && $compare2){
						$pregmatch1 = preg_match('/'.$hpin['tipe'].'/', $hpout['tipe']);
						$pregmatch2 = preg_match('/'.$hpout['tipe'].'/', $hpin['tipe']);
						$compareimei = $hpin['imei'] == $hpout['imei'];
						if( ($pregmatch1 || $pregmatch2) && $compareimei ) {
							$totaltransaksi['hpout'][1] += 1;
							$isreturnextist = true;
						}
					}
				}
			}

			if (!$isreturnextist) {
				foreach ($data['weeknext']['vhpin'] as $hpin) {
					$compare1 = strtotime($hpin['tanggal']) > $tanggal;
					$compare2 = strtotime($hpin['tanggal']) <= $sampai;
					if($compare1 && $compare2){
						$pregmatch1 = preg_match('/'.$hpin['tipe'].'/', $hpout['tipe']);
						$pregmatch2 = preg_match('/'.$hpout['tipe'].'/', $hpin['tipe']);
						$compareimei = $hpin['imei'] == $hpout['imei'];
						if( ($pregmatch1 || $pregmatch2) && $compareimei ) {
							$totaltransaksi['hpout'][1] += 1;
						}
					}
				}
			}
		}

		foreach ($data['weeknow']['vservisdone'] as $servisdone) {
			$isreturnextist = false;
			$totaltransaksi['servis'][0] += 1;
			$tanggal = strtotime($servisdone['tanggal']);
			$sampai = strtotime('+7'.' day', strtotime($servisdone['tanggal']));

			foreach ($data['weeknow']['vservisreturn'] as $servisreturn) {
				if(!$isreturnextist){
					$compare1 = strtotime($servisreturn['tanggal']) > $tanggal;
					$compare2 = strtotime($servisreturn['tanggal']) <= $sampai;
					if($compare1 && $compare2){
						$pregmatch1 = preg_match('/'.$servisreturn['tipe'].'/', $servisdone['tipe']);
						$pregmatch2 = preg_match('/'.$servisdone['tipe'].'/', $servisreturn['tipe']);
						if( $pregmatch1 || $pregmatch2 ) {
							$totaltransaksi['servis'][1] += 1;
							$isreturnextist = true;
						}
					}
				}
			}

			if(!$isreturnextist) {
				foreach ($data['weeknext']['vservisreturn'] as $servisreturn) {
					$compare1 = strtotime($servisreturn['tanggal']) > $tanggal;
					$compare2 = strtotime($servisreturn['tanggal']) <= $sampai;
					if($compare1 && $compare2){
						$pregmatch1 = preg_match('/'.$servisreturn['tipe'].'/', $servisdone['tipe']);
						$pregmatch2 = preg_match('/'.$servisdone['tipe'].'/', $servisreturn['tipe']);
						if( $pregmatch1 || $pregmatch2 ) {
							$totaltransaksi['servis'][1] += 1;
						}
					}
				}
			}
		}
		return $totaltransaksi;
	}

	function getBonus($data, $nama){
		$bhpintotal = 0;
		$bhpinreturn = 0;
		$ballin = array();
		$ballin['return'] = array();
		$ballin['bonus'] = array();
		
		$bhpouttotal = 0;
		$bhpoutreturn = 0;
		$ballout = array();
		$ballout['return'] = array();
		$ballout['bonus'] = array();
		
		$bservistotal = 0;
		$bservisreturn = 0;
		$ballserv = array();
		$ballserv['return'] = array();
		$ballserv['bonus'] = array();

		foreach ($data['weeknow']['vhpin'] as $hpin) {
			if(preg_match('/'.$nama.'/', $hpin['sales'])) {
				$isreturn = false;
				$itemreturn = null;
				$bhpintotal++;
				$data['totaltransaksi']['hpin'][0] += 1;
				$tanggal = strtotime($hpin['tanggal']);
				$sampai = strtotime('-7 day', strtotime($hpin['tanggal']));

				foreach ($data['weeknow']['vhpout'] as $hpout) {
					if(!$isreturn){
						$compare1 = strtotime($hpout['tanggal']) < $tanggal;
						$compare2 = strtotime($hpout['tanggal']) >= $sampai;
						if ( $compare1 && $compare2){
							$pregmatch1 = preg_match('/'.$hpin['tipe'].'/', $hpout['tipe']);
							$pregmatch2 = preg_match('/'.$hpout['tipe'].'/', $hpin['tipe']);
							$compareimei = $hpin['imei'] == $hpout['imei'];
							if( ($pregmatch1 || $pregmatch2) && $compareimei ){
								$bhpinreturn++;
								$data['totaltransaksi']['hpin'][1] += 1;
								$isreturn = true;
								$itemreturn = $hpout;
							}
						}
					}
				}

				if (!$isreturn) {
					foreach ($data['weeklast']['vhpout'] as $hpout) {
						$compare1 = strtotime($hpout['tanggal']) < $tanggal;
						$compare2 = strtotime($hpout['tanggal']) >= $sampai;
						if( $compare1 && $compare2){
							$pregmatch1 = preg_match('/'.$hpin['tipe'].'/', $hpout['tipe']);
							$pregmatch2 = preg_match('/'.$hpout['tipe'].'/', $hpin['tipe']);
							$compareimei = $hpin['imei'] == $hpout['imei'];
							if( ($pregmatch1 || $pregmatch2) && $compareimei ){
								$bhpinreturn++;
								$data['totaltransaksi']['hpin'][1] += 1;
								$isreturn = true;
								$itemreturn = $hpout;
							}
						}
					}
				}
				if($isreturn){
					array_push($ballin['return'], $hpin['merk'].' '.$hpin['tipe'].' ('.$hpin['tanggal'].')<br/>'.'(return '.$itemreturn['tanggal'].')');
				}
				else{
					array_push($ballin['bonus'], $hpin['merk'].' '.$hpin['tipe'].' ('.$hpin['tanggal'].')');
				}
			}
		}

		foreach ($data['weeknow']['vhpout'] as $hpout) {
			if(preg_match('/'.$nama.'/', $hpout['sales'])) {
				$isreturn = false;
				$itemreturn = null;
				$data['totaltransaksi']['hpout'][0] += 1;
				$bhpouttotal++;
				$tanggal = strtotime($hpout['tanggal']);
				$sampai = strtotime('+7'.' day', strtotime($hpout['tanggal']));

				foreach ($data['weeknow']['vhpin'] as $hpin) {
					if(!$isreturn){
						$compare1 = strtotime($hpin['tanggal']) > $tanggal;
						$compare2 = strtotime($hpin['tanggal']) <= $sampai;
						if($compare1 && $compare2){
							$pregmatch1 = preg_match('/'.$hpin['tipe'].'/', $hpout['tipe']);
							$pregmatch2 = preg_match('/'.$hpout['tipe'].'/', $hpin['tipe']);
							$compareimei = $hpin['imei'] == $hpout['imei'];
							if( ($pregmatch1 || $pregmatch2) && $compareimei ) {
								$bhpoutreturn++;
								$data['totaltransaksi']['hpout'][1] += 1;
								$isreturn = true;
								$itemreturn = $hpin;
							}
						}
					}
				}
				
				if($isreturn){
					array_push($ballout['return'], $hpout['merk'].' '.$hpout['tipe'].' ('.$hpout['tanggal'].')<br/>'.
						'(return '.$itemreturn['tanggal'].')');
				} else{
					array_push($ballout['bonus'], $hpout['merk'].' '.$hpout['tipe'].' ('.$hpout['tanggal'].')');
				}
			}
		}

		foreach ($data['weeknow']['vservisdone'] as $servisdone) {
			if(preg_match('/'.$nama.'/', $servisdone['teknisi'])) {
				$isreturn = false;
				$itemreturn = null;
				$data['totaltransaksi']['servis'][0] += 1;
				$bservistotal++;
				$tanggal = strtotime($servisdone['tanggal']);
				$sampai = strtotime('+7'.' day', strtotime($servisdone['tanggal']));

				foreach ($data['weeknow']['vservisreturn'] as $servisreturn) {
					if(!$isreturn){
						$compare1 = strtotime($servisreturn['tanggal']) > $tanggal;
						$compare2 = strtotime($servisreturn['tanggal']) <= $sampai;
						if($compare1 && $compare2){
							$pregmatch1 = preg_match('/'.$servisreturn['tipe'].'/', $servisdone['tipe']);
							$pregmatch2 = preg_match('/'.$servisdone['tipe'].'/', $servisreturn['tipe']);
							if( $pregmatch1 || $pregmatch2 ) {
								$bservisreturn++;
								$data['totaltransaksi']['servis'][1] += 1;
							}
						}
					}
				}
				if($isreturn){
					array_push($ballserv['return'], $servisdone['merk'].' '.$servisdone['tipe'].' ('.$servisdone['tanggal'].')<br/>'.
						'(return '.$itemreturn['tanggal']);
				} else{
					array_push($ballserv['bonus'], $servisdone['merk'].' '.$servisdone['tipe'].' ('.$servisdone['tanggal'].')');
				}
			}
		}

		$bhpin['bhpintotal'] = $bhpintotal; // jumlah hp masuk
		$bhpin['bhpinreturn'] = $bhpinreturn; // jumlah hp return
		$bhpin['ballin'] = $ballin; 

		$bhpout['bhpouttotal'] = $bhpouttotal;
		$bhpout['bhpoutreturn'] = $bhpoutreturn;
		$bhpout['ballout'] = $ballout;

		$bservis['bservistotal'] = $bservistotal;
		$bservis['bservisreturn'] = $bservisreturn;
		$bservis['ballserv'] = $ballserv;

		$bonus['bhpin'] = $bhpin;
		$bonus['bhpout'] = $bhpout;
		$bonus['bservis'] = $bservis;
		return $bonus;
	}

	function getselectindex($data){
		$returndata = array(0, 0, 0, 0, 0, 0); // jaringan garansi ram rom kelengkapan sales
		for ($i= 0; $i < 6; $i++) {
			$index = 0;
			$ismatch = false;
			foreach ($data['menuadmin'][$this->itemtoselect[$i]] as $value) {
				if (!$ismatch) {
					if($data['detailitem'][$this->itemtoselect[$i]] == $value[$this->itemtoselect[$i]])
					{
						$returndata[$i] = $index;
						$ismatch = true;
					}
				}
				$index += 1;
			}
		}
		return $returndata;
	}
}

?>
