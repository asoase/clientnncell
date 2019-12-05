<?php
use GuzzleHttp\Client;

class Submitinput extends CI_model
{

  public function __construct()
  {

  }
  private function createClient()
  {
    $_client = new Client([
      'base_uri'        => 'http://localhost/noericelladmin/',
      'auth'            => ['noericell', 'admindandangan'],
      'timeout'         => 5, // Response timeout
      'connect_timeout' => 5, // Connection timeout
    ]);
    return $_client;
  }

  public function getAllMahasiswa()
  {
    // return $this->db->get('mahasiswa')->result_array();
    $response = $this->_client->request('GET', 'restsubmit',
      [
        'query' => [
          'apikey' => 'jamah',
        ],
      ]);
    $result = json_decode($response->getBody()->getContents(), true);
    return $result['data'];
  }

  public function rekap($data)
  {
    $_client  = $this->createClient();
    $response = $_client->request('POST', 'restsubmit/rekap1hari',
      [
        'form_params' => $data,
        'http_errors' => true,
      ]);
  }

}
