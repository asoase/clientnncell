<?php
use GuzzleHttp\Client;

class Datapost extends CI_model
{

  public function createClient()
  {
    $_client = new Client([
      'base_uri' => $this->config->item('server_url'),
      'auth'     => ['noericell', 'admindandangan'],
      'timeout'  => 3, // Response timeout
      // 'connect_timeout' => 5, // Connection timeout
    ]);
    return $_client;
  }
  public function getquerybytanggal($tanggal)
  {
    $query = [
      'query' => [
        'apikey'  => 'jamah',
        'tanggal' => $tanggal],
    ];
    return $query;
  }
  public function getquerybyid($id)
  {
    $query = [
      'query' => [
        'apikey' => 'jamah',
        'id'     => $id],
    ];
    return $query;
  }

  public function dataOneWeek($tanggal)
  {
    $this->load->library('adminBerandaLib', 'adminberandalib');
    $_client                  = $this->createClient();
    $query                    = $this->getquerybytanggal($tanggal);
    $response                 = $_client->request('GET', 'transaksiadmin/data/oneweek', $query);
    $result                   = json_decode($response->getBody()->getContents(), true);
    $result                   = $result['data'];
    $result['totaltransaksi'] = $this->adminberandalib->getAllTransaksi($result);
    $result['narko']          = $this->adminberandalib->getBonus($result, 'narko');
    $result['sis']            = $this->adminberandalib->getBonus($result, 'sis');
    $result['bose']           = $this->adminberandalib->getBonus($result, 'bose');
    $result['allday']         = $this->adminberandalib->getAllday($result);
    $result['dayname']        = $this->adminberandalib->getDayName();
    $result['shortbydate']    = $this->adminberandalib->shortByDate($result);
    $result['rekapitem']      = array('HP Masuk', 'HP Terjual', 'Servis Selesai', 'Servis Return', 'Accesoris');
    $result['page']           = array(base_url('admin/beranda/' . $result['day']['lastweek']), base_url('admin/beranda/' . $result['day']['nextweek']), base_url('admin/beranda/' . date("Ymd")));
    $result['sales']          = ['sis', 'narko'];
    $result['encoded']        = json_encode($result);
    return $result;
  }

  public function getHpin($id)
  {
    $_client  = $this->createClient();
    $query    = $this->getquerybyid($id);
    $response = $_client->request('GET', 'transaksiadmin/hpin/item', $query);
    $result   = json_decode($response->getBody()->getContents(), true);
    $result   = $result['data'][0];
    return $result;
  }

  public function getHpout($id)
  {
    $_client  = $this->createClient();
    $query    = $this->getquerybyid($id);
    $response = $_client->request('GET', 'transaksiadmin/hpout/item', $query);
    $result   = json_decode($response->getBody()->getContents(), true);
    $result   = $result['data'][0];
    return $result;
  }

  public function getServisout($id)
  {
    $_client  = $this->createClient();
    $query    = $this->getquerybyid($id);
    $response = $_client->request('GET', 'transaksiadmin/servisout/item', $query);
    $result   = json_decode($response->getBody()->getContents(), true);
    $result   = $result['data'][0];
    return $result;
  }

  public function getServisreturn($id)
  {
    $_client  = $this->createClient();
    $query    = $this->getquerybyid($id);
    $response = $_client->request('GET', 'transaksiadmin/servisreturn/item', $query);
    $result   = json_decode($response->getBody()->getContents(), true);
    $result   = $result['data'][0];
    return $result;
  }

  public function getAccesoris($id)
  {
    $_client  = $this->createClient();
    $query    = $this->getquerybyid($id);
    $response = $_client->request('GET', 'transaksiadmin/accesoris/item', $query);
    $result   = json_decode($response->getBody()->getContents(), true);
    $result   = $result['data'][0];
    return $result;
  }

}
