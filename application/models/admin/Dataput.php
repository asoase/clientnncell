<?php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Dataput extends CI_model
{
  private function createClient()
  {
    $_client = new Client([
      'base_uri'        => $this->config->item('server_url'),
      'auth'            => ['noericell', 'admindandangan'],
      'timeout'         => 5, // Response timeout
      'connect_timeout' => 5, // Connection timeout
    ]);
    return $_client;
  }

  private function getformparamsbyid($id, $dataput)
  {
    $data = [
      'apikey'  => 'jamah',
      'id'      => $id,
      'dataput' => $dataput,
    ];
    return $data;
  }

  public function putHpin($id, $dataput)
  {
    $_client    = $this->createClient();
    $formparams = $this->getformparamsbyid($id, $dataput);
    try {
      $response = $_client->request('PUT', 'transaksiadmin/hpin/item',
        [
          'form_params' => $formparams,
          'http_errors' => true,
        ]);
      $result = json_decode($response->getBody()->getContents(), true);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result['message'] = $re->getMessage();
      } else {
        $result['message'] = 'server tidak menanggapi';
      }
    }
    return $result;
  }

  public function putHpout($id, $dataput)
  {
    $_client    = $this->createClient();
    $formparams = $this->getformparamsbyid($id, $dataput);
    try {
      $response = $_client->request('PUT', 'transaksiadmin/hpout/item',
        [
          'form_params' => $formparams,
          'http_errors' => true,
        ]);
      $result = json_decode($response->getBody()->getContents(), true);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result['message'] = $re->getMessage();
      } else {
        $result['message'] = 'server tidak menanggapi';
      }
    }
    return $result;
  }

  public function putServisout($id, $dataput)
  {
    $_client    = $this->createClient();
    $formparams = $this->getformparamsbyid($id, $dataput);
    try {
      $response = $_client->request('PUT', 'transaksiadmin/servisout/item',
        [
          'form_params' => $formparams,
          'http_errors' => true,
        ]);
      $result = json_decode($response->getBody()->getContents(), true);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result['message'] = $re->getMessage();
      } else {
        $result['message'] = 'server tidak menanggapi';
      }
    }
    return $result;
  }

  public function putServisreturn($id, $dataput)
  {
    $_client    = $this->createClient();
    $formparams = $this->getformparamsbyid($id, $dataput);
    try {
      $response = $_client->request('PUT', 'transaksiadmin/servisreturn/item',
        [
          'form_params' => $formparams,
          'http_errors' => true,
        ]);
      $result = json_decode($response->getBody()->getContents(), true);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result['message'] = $re->getMessage();
      } else {
        $result['message'] = 'server tidak menanggapi';
      }
    }
    return $result;
  }

  public function putAccesoris($id, $dataput)
  {
    $_client    = $this->createClient();
    $formparams = $this->getformparamsbyid($id, $dataput);
    try {
      $response = $_client->request('PUT', 'transaksiadmin/accesoris/item',
        [
          'form_params' => $formparams,
          'http_errors' => true,
        ]);
      $result = json_decode($response->getBody()->getContents(), true);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result['message'] = $re->getMessage();
      } else {
        $result['message'] = 'server tidak menanggapi';
      }
    }
    return $result;
  }

}
