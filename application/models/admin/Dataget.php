<?php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Resthttpcode\code\RESTHTTPCode;

class Dataget extends CI_model
{
  private function createClient()
  {
    $_client = new Client([
      'base_uri' => $this->config->item('server_url'),
      'auth'     => ['noericell', 'admindandangan'],
      'timeout'  => 3, // Response timeout
    ]);
    return $_client;
  }
  private function getquerybytanggal($tanggal)
  {
    $query = [
      'query' => [
        'apikey'  => 'jamah',
        'tanggal' => $tanggal],
    ];
    return $query;
  }
  private function getquerybyid($id)
  {
    $query = [
      'query' => [
        'apikey' => 'jamah',
        'id'     => $id],
    ];
    return $query;
  }
  // $tipeitem
  // 0 = hp
  // 1 = servis
  private function getquerymenu($tipeitem)
  {
    $query = [
      'query' => [
        'apikey'   => 'jamah',
        'tipeitem' => $tipeitem,
      ],
    ];
    return $query;
  }
  private function getquerycari($keyword)
  {
    $query = [
      'query' => [
        'apikey'  => 'jamah',
        'keyword' => $keyword,
      ],
    ];
    return $query;
  }

  private function getGetresult($response)
  {
    if (is_null($response) || $response == '') {
      $result['status']  = false;
      $result['message'] = 'server tidak merespon';
      return $result;
    }
    $result     = null;
    $statuscode = $response->getStatusCode();
    switch ($statuscode) {
      case RESTHTTPCode::HTTP_OK:
        $result            = json_decode($response->getBody()->getContents(), true);
        $result            = $result['data'];
        $result['status']  = true;
        $result['message'] = 'data sukses diambil';
        break;
      case RESTHTTPCode::HTTP_NOT_FOUND:
        $result['status']  = false;
        $result['message'] = 'data tidak ada';
        break;
      default:
        $result['status']  = false;
        $result['message'] = 'server tidak merespon';
        break;
    }
    return $result;
  }

  public function getmenu($tipeitem)
  {
    $_client = $this->createClient();
    $query   = $this->getquerymenu($tipeitem);
    try {
      $response = $_client->request('GET', 'transaksiadmin/adminmenu/menu', $query);
      $result   = $this->getGetresult($response);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result = $this->getGetresult($re->getResponse());
      } else {
        $result = $this->getGetresult($re->getResponse());
      }
    }
    return $result;
  }

  public function dataOneWeek($tanggal)
  {
    $this->load->library('adminBerandaLib', 'adminberandalib');
    $_client = $this->createClient();
    $query   = $this->getquerybytanggal($tanggal);
    try {
      $response                 = $_client->request('GET', 'transaksiadmin/data/oneweek', $query);
      $result                   = $this->getGetresult($response);
      $result['totaltransaksi'] = $this->adminberandalib->getAllTransaksi($result);
      foreach ($result['salesname'] as $sales) {
        $result['sales'][$sales['sales']] = $this->adminberandalib->getBonus($result, $sales['sales']);
      }
      $result['allday']      = $this->adminberandalib->getAllday($result);
      $result['dayname']     = $this->adminberandalib->getDayName();
      $result['shortbydate'] = $this->adminberandalib->shortByDate($result);
      $result['rekapitem']   = array('HP Masuk', 'HP Terjual', 'Servis Selesai', 'Servis Return', 'Accesoris');
      $result['page']        = array(base_url('admin/beranda/' . $result['day']['lastweek']), base_url('admin/beranda/' . $result['day']['nextweek']), base_url('admin/beranda/' . date("Ymd")));
      $result['encoded']     = json_encode($result);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result = $this->getGetresult($re->getResponse());
      } else {
        $result = $this->getGetresult($re->getResponse());
      }
    }
    return $result;
  }

  public function getHpin($id)
  {
    $_client = $this->createClient();
    $query   = $this->getquerybyid($id);
    try {
      $response = $_client->request('GET', 'transaksiadmin/hpin/item', $query);
      $result   = $this->getGetresult($response);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result = $this->getGetresult($re->getResponse());
      } else {
        $result = $this->getGetresult($re->getResponse());
      }
    }
    return $result;
  }

  public function getHpout($id)
  {
    $_client = $this->createClient();
    $query   = $this->getquerybyid($id);
    try {
      $response = $_client->request('GET', 'transaksiadmin/hpout/item', $query);
      $result   = $this->getGetresult($response);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result = $this->getGetresult($re->getResponse());
      } else {
        $result = $this->getGetresult($re->getResponse());
      }
    }
    return $result;
  }

  public function getServisout($id)
  {
    $_client = $this->createClient();
    $query   = $this->getquerybyid($id);
    try {
      $response = $_client->request('GET', 'transaksiadmin/servisout/item', $query);
      $result   = $this->getGetresult($response);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result = $this->getGetresult($re->getResponse());
      } else {
        $result = $this->getGetresult($re->getResponse());
      }
    }
    return $result;
  }

  public function getServisreturn($id)
  {
    $_client = $this->createClient();
    $query   = $this->getquerybyid($id);
    try {
      $response = $_client->request('GET', 'transaksiadmin/servisreturn/item', $query);
      $result   = $this->getGetresult($response);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result = $this->getGetresult($re->getResponse());
      } else {
        $result = $this->getGetresult($re->getResponse());
      }
    }
    return $result;
  }

  public function getAccesoris($id)
  {
    $_client = $this->createClient();
    $query   = $this->getquerybyid($id);
    try {
      $response = $_client->request('GET', 'transaksiadmin/accesoris/item', $query);
      $result   = $this->getGetresult($response);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result = $this->getGetresult($re->getResponse());
      } else {
        $result = $this->getGetresult($re->getResponse());
      }
    }
    return $result;
  }

  public function getCari($type = null, $key1 = null, $key2 = null, $key3 = null)
  {
    $type = $this->getkeyword($type);
    $key1 = $this->getkeyword($key1);
    $key2 = $this->getkeyword($key2);
    $key3 = $this->getkeyword($key3);

    $keyword = array('tipe' => $type, 'kw1' => $key1, 'kw2' => $key2, 'kw3' => $key3);
    $keyword = json_encode($keyword);
    $_client = $this->createClient();
    $query   = $this->getquerycari($keyword);
    try {
      $response = $_client->request('GET', 'transaksiadmin/cari/caridata', $query);
      $result   = $this->getGetresult($response);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result = $this->getGetresult($re->getResponse());
      } else {
        $result = $this->getGetresult($re->getResponse());
      }
    }
    return $result;
  }

  private function getkeyword($keyword)
  {
    if ($keyword == '_') {
      $keyword = null;
    } else {
      $keyword = explode("_", $keyword);
      $keyword = implode(" ", $keyword);
    }
    return $keyword;
  }

}
