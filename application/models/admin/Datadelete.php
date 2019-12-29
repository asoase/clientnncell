<?php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Resthttpcode\code\RESTHTTPCode;

class Datadelete extends CI_model
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

  private function getformparamsbyid($id)
  {
    $data = [
      'apikey' => 'jamah',
      'id'     => $id,
    ];
    return $data;
  }

  private function getdeleteresult($response)
  {
    $result     = null;
    $statuscode = $response->getStatusCode();
    switch ($statuscode) {
      case RESTHTTPCode::HTTP_OK:
        $result['status']  = true;
        $result['message'] = 'data sukses dihapus';
        break;
      case RESTHTTPCode::HTTP_NO_CONTENT:
        $result['status']  = false;
        $result['message'] = 'data gagal dihapus';
        break;
      case RESTHTTPCode::HTTP_NOT_FOUND:
        $result['status']  = false;
        $result['message'] = 'data tidak ada';
        break;
      default:
        break;
    }
    return $result;
  }

  public function deleteHpin($iditem)
  {
    $_client    = $this->createClient();
    $formparams = $this->getformparamsbyid($iditem);
    try {
      $response = $_client->request('DELETE', 'transaksiadmin/hpin/item',
        [
          'form_params' => $formparams,
        ]);
      $result = $this->getdeleteresult($response);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result = $this->getdeleteresult($re->getResponse());
      } else {
        try {
          $response = $_client->request('POST', 'transaksiadmin/hpin/alternatedelete',
            [
              'form_params' => $formparams,
            ]);
          $result = $this->getdeleteresult($response);
        } catch (RequestException $re) {
          $result = $this->getdeleteresult($re->getResponse());
        }
      }
    }
    return $result;
  }

  public function deleteHpout($iditem)
  {
    $_client    = $this->createClient();
    $formparams = $this->getformparamsbyid($iditem);
    try {
      $response = $_client->request('DELETE', 'transaksiadmin/hpout/item',
        [
          'form_params' => $formparams,
        ]);
      $result = $this->getdeleteresult($response);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result = $this->getdeleteresult($re->getResponse());
      } else {
        try {
          $response = $_client->request('POST', 'transaksiadmin/hpout/alternatedelete',
            [
              'form_params' => $formparams,
            ]);
          $result = $this->getdeleteresult($response);
        } catch (RequestException $re) {
          $result = $this->getdeleteresult($re->getResponse());
        }
      }
    }
    return $result;
  }

  public function deleteServisout($iditem)
  {
    $_client    = $this->createClient();
    $formparams = $this->getformparamsbyid($iditem);
    try {
      $response = $_client->request('DELETE', 'transaksiadmin/servisout/item',
        [
          'form_params' => $formparams,
        ]);
      $result = $this->getdeleteresult($response);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result = $this->getdeleteresult($re->getResponse());
      } else {
        try {
          $response = $_client->request('POST', 'transaksiadmin/servisout/alternatedelete',
            [
              'form_params' => $formparams,
            ]);
          $result = $this->getdeleteresult($response);
        } catch (RequestException $re) {
          $result = $this->getdeleteresult($re->getResponse());
        }
      }
    }
    return $result;
  }

  public function deleteServisreturn($iditem)
  {
    $_client    = $this->createClient();
    $formparams = $this->getformparamsbyid($iditem);
    try {
      $response = $_client->request('DELETE', 'transaksiadmin/servisreturn/item',
        [
          'form_params' => $formparams,
        ]);
      $result = $this->getdeleteresult($response);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result = $this->getdeleteresult($re->getResponse());
      } else {
        try {
          $response = $_client->request('POST', 'transaksiadmin/servisreturn/alternatedelete',
            [
              'form_params' => $formparams,
            ]);
          $result = $this->getdeleteresult($response);
        } catch (RequestException $re) {
          $result = $this->getdeleteresult($re->getResponse());
        }
      }
    }
    return $result;
  }

  public function deleteAccesoris($iditem)
  {
    $_client    = $this->createClient();
    $formparams = $this->getformparamsbyid($iditem);
    try {
      $response = $_client->request('DELETE', 'transaksiadmin/accesoris/item',
        [
          'form_params' => $formparams,
        ]);
      $result = $this->getdeleteresult($response);
    } catch (RequestException $re) {
      if ($re->hasResponse()) {
        $result = $this->getdeleteresult($re->getResponse());
      } else {
        try {
          $response = $_client->request('POST', 'transaksiadmin/accesoris/alternatedelete',
            [
              'form_params' => $formparams,
            ]);
          $result = $this->getdeleteresult($response);
        } catch (RequestException $re) {
          $result = $this->getdeleteresult($re->getResponse());
        }
      }
    }
    return $result;
  }

}
