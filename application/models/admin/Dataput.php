<?php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Resthttpcode\code\RESTHTTPCode;

require APPPATH . 'libraries/RESTHTTPCode.php';

class Dataput extends CI_model
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

  private function getformparamsbyid($id, $dataput)
  {
    $data = [
      'apikey'  => 'jamah',
      'id'      => $id,
      'dataput' => $dataput,
    ];
    return $data;
  }

  private function getputresult($response)
  {
    $result     = null;
    $statuscode = $response->getStatusCode();
    switch ($statuscode) {
      case RESTHTTPCode::HTTP_OK:
        $result = 'data sukses diupdate';
        break;
      case RESTHTTPCode::HTTP_NO_CONTENT:
        $result = 'data gagal diupdate / data sama';
        break;
      case RESTHTTPCode::HTTP_NOT_FOUND:
        $result = 'data tidak ada';
        break;
      default:
        break;
    }
    return $result;
  }

  public function putHpin($id, $dataput)
  {
    $_client    = $this->createClient();
    $formparams = $this->getformparamsbyid($id, $dataput);
    try {
      $response = $_client->request('PUT', 'transaksiadmin/hpin/item',
        [
          'form_params' => $formparams,
        ]);
      $result['message'] = $this->getputresult($response);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result['message'] = $re->getMessage();
      } else {
        try {
          $response = $_client->request('POST', 'transaksiadmin/hpin/alternateput',
            [
              'form_params' => $formparams,
            ]);
          $result['message'] = $this->getputresult($response);
        } catch (RequestException $re) {
          $result['message'] = $this->getputresult($re->getResponse());
        }
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
        ]);
      $result['message'] = $this->getputresult($response);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result['message'] = $re->getMessage();
      } else {
        try {
          $response = $_client->request('POST', 'transaksiadmin/hpout/alternateput',
            [
              'form_params' => $formparams,
            ]);
          $result['message'] = $this->getputresult($response);
        } catch (RequestException $re) {
          $result['message'] = $this->getputresult($re->getResponse());
        }
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
        ]);
      $result['message'] = $this->getputresult($response);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result['message'] = $re->getMessage();
      } else {
        try {
          $response = $_client->request('POST', 'transaksiadmin/servisout/alternateput',
            [
              'form_params' => $formparams,
            ]);
          $result['message'] = $this->getputresult($response);
        } catch (RequestException $re) {
          $result['message'] = $this->getputresult($re->getResponse());
        }
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
        ]);
      $result['message'] = $this->getputresult($response);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result['message'] = $re->getMessage();
      } else {
        try {
          $response = $_client->request('POST', 'transaksiadmin/servisreturn/alternateput',
            [
              'form_params' => $formparams,
            ]);
          $result['message'] = $this->getputresult($response);
        } catch (RequestException $re) {
          $result['message'] = $this->getputresult($re->getResponse());
        }
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
        ]);
      $result['message'] = $this->getputresult($response);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result['message'] = $re->getMessage();
      } else {
        try {
          $response = $_client->request('POST', 'transaksiadmin/accesoris/alternateput',
            [
              'form_params' => $formparams,
            ]);
          $result['message'] = $this->getputresult($response);
        } catch (RequestException $re) {
          $result['message'] = $this->getputresult($re->getResponse());
        }
      }
    }
    return $result;
  }

}
