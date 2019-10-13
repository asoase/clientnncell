<?php

class Rekap extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AllData_model', 'alldata');
	}
	public function index()
	{
		$this->rekap1hari();
	}
	private function rekap1hari()
	{
		$data['title'] = 'halaman awal';
		$username = $this->input->post("username");
		if($username != 'jamah1001') redirect('main/ncell/beranda');
		$tanggal = $this->input->post("tanggal");
		$datainput = $this->input->post("datainput");
		$this->removehass($datainput, $tanggal);

		$data = ['datainput'=>$datainput, 'apikey' => 'jamah'];
		$response = $this->alldata->addrekap($data);
		redirect('main/ncell/rekapdata');
	}
	private function removehass(&$datainput, $tanggal){
		$datatemp = json_decode($datainput, true);
		if((sizeof($datatemp['vhpin'])) > 0){
			foreach ($datatemp['vhpin'] as &$value) {
				$value['tanggal'] = $tanggal;
				unset($value['$$hashKey']);
			}
		}
		if((sizeof($datatemp['vhpout'])) > 0){
			foreach ($datatemp['vhpout'] as &$value) {
				$value['tanggal'] = $tanggal;
				unset($value['$$hashKey']);
			}
		}
		if((sizeof($datatemp['vservisreturn'])) > 0){
			foreach ($datatemp['vservisreturn'] as &$value) {
				$value['tanggal'] = $tanggal;
				unset($value['$$hashKey']);
			}
		}
		if((sizeof($datatemp['vservisdone'])) > 0){
			foreach ($datatemp['vservisdone'] as &$value) {
				$value['tanggal'] = $tanggal;
				unset($value['$$hashKey']);
			}
		}
		if((sizeof($datatemp['vacc'])) > 0){
			foreach ($datatemp['vacc'] as &$value) {
				$value['tanggal'] = $tanggal;
				unset($value['$$hashKey']);
			}
		}
		$datainput = json_encode($datatemp);
	}

}

?>
