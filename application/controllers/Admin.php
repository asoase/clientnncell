<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Dataget', 'dataget');
        $this->load->model('admin/Dataput', 'dataput');
        $this->load->model('admin/Datadelete', 'datadelete');
        date_default_timezone_set("Asia/Bangkok");
    }

    public function index()
    {
        redirect('admin/beranda/' . date("Ymd"));
    }
    public function beranda($date = null)
    {
        if ($this->input->get('ketanggal') == null) {
            if ($date == null) {
                redirect('admin/beranda/' . date("Ymd"));
            }
        } else {
            redirect('admin/beranda/' . $this->input->get('ketanggal'));
        }
        $data['CSSPATHS'] = array(
            base_url() . 'assets/css/templates/navbar.css',
            base_url() . 'assets/css/admin/adminberanda.css',
        );
        $data['JSPATHS'] = array(
            base_url() . 'assets/js/autoNumeric-1.9.26/autoNumeric.js',
            base_url() . 'assets/js/admin/closingjs.js',
            base_url() . 'assets/js/admin/adminberanda.js',
        );
        $data['IMGPATH'] = base_url() . 'assets/img/';
        $data['judul'] = 'Admin';
        $data['headeraktif'] = 3;
        $data['data'] = $this->dataget->dataOneWeek($date);
        if ($data['data']['status']) {
            $this->load->view('templates/navbar', $data);
            $this->load->view('admin/navbar/adminnavbar', $data);
            $this->load->view('admin/adminberanda', $data);
            $this->load->view('templates/closing', $data);
        } else {
            $message = $data['data']['message'];
            echo $message;
        }
    }
    public function login()
    {
        $data['CSSPATHS'] = array(
            base_url() . 'assets/css/templates/navbar.css',
            base_url() . 'assets/css/admin/adminlogin.css',
        );
        $data['JSPATHS'] = array(
            base_url() . 'assets/js/admin/adminlogin.js',
        );
        $data['IMGPATH'] = base_url() . 'assets/img/';
        $data['judul'] = 'Login';
        $data['headeraktif'] = 3;
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/adminlogin', $data);
        $this->load->view('templates/closing', $data);
    }
    public function isidetail($transaksitype = null, $iditem = null)
    {
        $username = $this->input->post('username');
        if ($username != 'isidetail9009') {
            echo 'kamu tidak diijinkan mengakses halaman ini';
        } else {
            switch ($transaksitype) {
                case '0':
                    $data['namatransaksi'] = 'HP MASUK';
                    $data['detailitem'] = $this->dataget->getHpin($iditem);
                    if ($data['detailitem']['status']) {
                        $data['tipetransaksi'] = $transaksitype;
                        $data['iditem'] = $iditem;
                        $this->load->view('admin/detailitemtransaksi/detailhpmasuk', $data);
                    } else {
                        $message = $data['detailitem']['message'];
                        echo $message;
                    }
                    break;
                case '1':
                    $data['namatransaksi'] = 'HP TERJUAL';
                    $data['detailitem'] = $this->dataget->getHpout($iditem);
                    if ($data['detailitem']['status']) {
                        $data['tipetransaksi'] = $transaksitype;
                        $data['iditem'] = $iditem;
                        $this->load->view('admin/detailitemtransaksi/detailhpterjual', $data);
                    } else {
                        $message = $data['detailitem']['message'];
                        echo $message;
                    }
                    break;
                case '2':
                    $data['namatransaksi'] = 'SERVIS SELESAI';
                    $data['detailitem'] = $this->dataget->getServisout($iditem);
                    if ($data['detailitem']['status']) {
                        $data['tipetransaksi'] = $transaksitype;
                        $data['iditem'] = $iditem;
                        $this->load->view('admin/detailitemtransaksi/detailservisselesai', $data);
                    } else {
                        $message = $data['detailitem']['message'];
                        echo $message;
                    }
                    break;
                case '3':
                    $data['namatransaksi'] = 'SERVIS RETURN';
                    $data['detailitem'] = $this->dataget->getServisreturn($iditem);
                    if ($data['detailitem']['status']) {
                        $data['tipetransaksi'] = $transaksitype;
                        $data['iditem'] = $iditem;
                        $this->load->view('admin/detailitemtransaksi/detailservisreturn', $data);
                    } else {
                        $message = $data['detailitem']['message'];
                        echo $message;
                    }
                    break;
                case '4':
                    $data['namatransaksi'] = 'ACCESORIS';
                    $data['detailitem'] = $this->dataget->getAccesoris($iditem);
                    if ($data['detailitem']['status']) {
                        $data['tipetransaksi'] = $transaksitype;
                        $data['iditem'] = $iditem;
                        $this->load->view('admin/detailitemtransaksi/detailaccesoris', $data);
                    } else {
                        $message = $data['detailitem']['message'];
                        echo $message;
                    }
                    break;
                default:
                    break;
            }
        }
    }
    public function editdetail($transaksitype = null, $iditem = null)
    {
        $username = $this->input->post('username');
        if ($username != 'editdetail9009') {
            echo 'kamu tidak diijinkan mengakses halaman ini';
        } else {
            $this->load->library('adminBerandaLib', 'adminberandalib');
            switch ($transaksitype) {
                case '0':
                    $data['namatransaksi'] = 'HP MASUK';
                    $data['menuadmin'] = $this->dataget->getmenu('hp');
                    $data['detailitem'] = $this->dataget->getHpin($iditem);
                    if ($data['menuadmin']['status'] && $data['detailitem']['status']) {
                        $data['selectmenuindex'] = $this->adminberandalib->getselectindex($data, 'hp');
                        $data['tipetransaksi'] = $transaksitype;
                        $data['iditem'] = $iditem;
                        $this->load->view('admin/edititemtransaksi/edithpmasuk', $data);
                    } else {
                        $message = '';
                        if (!$data['menuadmin']['status']) {
                            $message = $data['menuadmin']['message'];
                        }
                        if (!$data['detailitem']['status']) {
                            $message = $data['detailitem']['message'];
                        }
                        echo $message;
                    }
                    break;
                case '1':
                    $data['namatransaksi'] = 'HP TERJUAL';
                    $data['menuadmin'] = $this->dataget->getmenu('hp');
                    $data['detailitem'] = $this->dataget->getHpout($iditem);
                    if ($data['menuadmin']['status'] && $data['detailitem']['status']) {
                        $data['selectmenuindex'] = $this->adminberandalib->getselectindex($data, 'hp');
                        $data['tipetransaksi'] = $transaksitype;
                        $data['iditem'] = $iditem;
                        $this->load->view('admin/edititemtransaksi/edithpterjual', $data);
                    } else {
                        $message = '';
                        if (!$data['menuadmin']['status']) {
                            $message = $data['menuadmin']['message'];
                        }
                        if (!$data['detailitem']['status']) {
                            $message = $data['detailitem']['message'];
                        }
                        echo $message;
                    }
                    break;
                case '2':
                    $data['namatransaksi'] = 'SERVIS SELESAI';
                    $data['menuadmin'] = $this->dataget->getmenu('servis');
                    $data['detailitem'] = $this->dataget->getServisout($iditem);
                    if ($data['menuadmin']['status'] && $data['detailitem']['status']) {
                        $data['selectmenuindex'] = $this->adminberandalib->getselectindex($data, 'servis');
                        $data['tipetransaksi'] = $transaksitype;
                        $data['iditem'] = $iditem;
                        $this->load->view('admin/edititemtransaksi/editservisselesai', $data);
                    } else {
                        $message = '';
                        if (!$data['menuadmin']['status']) {
                            $message = $data['menuadmin']['message'];
                        }
                        if (!$data['detailitem']['status']) {
                            $message = $data['detailitem']['message'];
                        }
                        echo $message;
                    }
                    break;
                case '3':
                    $data['namatransaksi'] = 'SERVIS RETURN';
                    $data['menuadmin'] = $this->dataget->getmenu('servis');
                    $data['detailitem'] = $this->dataget->getServisreturn($iditem);
                    if ($data['menuadmin']['status'] && $data['detailitem']['status']) {
                        $data['selectmenuindex'] = $this->adminberandalib->getselectindex($data, 'servis');
                        $data['tipetransaksi'] = $transaksitype;
                        $data['iditem'] = $iditem;
                        $this->load->view('admin/edititemtransaksi/editservisselesai', $data);
                    } else {
                        $message = '';
                        if (!$data['menuadmin']['status']) {
                            $message = $data['menuadmin']['message'];
                        }
                        if (!$data['detailitem']['status']) {
                            $message = $data['detailitem']['message'];
                        }
                        echo $message;
                    }
                    break;
                case '4':
                    $data['namatransaksi'] = 'ACCESORIS';
                    $data['detailitem'] = $this->dataget->getAccesoris($iditem);
                    if ($data['detailitem']['status']) {
                        $data['tipetransaksi'] = $transaksitype;
                        $data['iditem'] = $iditem;
                        $this->load->view('admin/edititemtransaksi/editaccesoris', $data);
                    } else {
                        $message = '';
                        if (!$data['menuadmin']['status']) {
                            $message = $data['menuadmin']['message'];
                        }
                        if (!$data['detailitem']['status']) {
                            $message = $data['detailitem']['message'];
                        }
                        echo $message;
                    }
                    break;
                default:
                    break;
            }
        }
    }
    public function submitedit($transaksitype = null, $iditem = null)
    {
        $username = $this->input->post('username', true);
        if ($username != 'submitedit9009') {
            echo 'kamu tidak diijinkan mengakses halaman ini';
        } else {
            switch ($transaksitype) {
                case '0':
                    $dataput = $this->input->post('dataput', true);
                    $result = $this->dataput->putHpin($iditem, $dataput);
                    echo $result['message'];
                    break;
                case '1':
                    $dataput = $this->input->post('dataput', true);
                    $result = $this->dataput->putHpout($iditem, $dataput);
                    echo $result['message'];
                    break;
                case '2':
                    $dataput = $this->input->post('dataput', true);
                    $result = $this->dataput->putServisout($iditem, $dataput);
                    echo $result['message'];
                    break;
                case '3':
                    $dataput = $this->input->post('dataput', true);
                    $result = $this->dataput->putServisreturn($iditem, $dataput);
                    echo $result['message'];
                    break;
                case '4':
                    $dataput = $this->input->post('dataput', true);
                    $result = $this->dataput->putAccesoris($iditem, $dataput);
                    echo $result['message'];
                    break;
                default:
                    break;
            }
        }
    }
    public function dialogdeleteitem($transaksitype = null, $iditem = null)
    {
        $username = $this->input->post('username', true);
        if ($username != 'dialogdelete9009') {
            echo 'kamu tidak diijinkan mengakses halaman ini';
        } else {
            switch ($transaksitype) {
                case '0':
                    $data['namatransaksi'] = 'hp masuk';
                    $data['detailitem'] = $this->dataget->getHpin($iditem);
                    if ($data['detailitem']['status']) {
                        $data['tipetransaksi'] = $transaksitype;
                        $data['iditem'] = $iditem;
                        $data['namaitem'] = $data['detailitem']['merk'] . ' ' . $data['detailitem']['tipe'] . ' (' . $data['detailitem']['imei'] . ')';
                        $this->load->view('admin/dialog/deletedialogitem', $data);
                    } else {
                        echo "koneksi error";
                    }
                    break;
                case '1':
                    $data['namatransaksi'] = 'hp terjual';
                    $data['detailitem'] = $this->dataget->getHpout($iditem);
                    if ($data['detailitem']['status']) {
                        $data['tipetransaksi'] = $transaksitype;
                        $data['iditem'] = $iditem;
                        $data['namaitem'] = $data['detailitem']['merk'] . ' ' . $data['detailitem']['tipe'] . ' (' . $data['detailitem']['imei'] . ')';
                        $this->load->view('admin/dialog/deletedialogitem', $data);
                    } else {
                        echo "koneksi error";
                    }
                    break;
                case '2':
                    $data['namatransaksi'] = 'servis selesai';
                    $data['detailitem'] = $this->dataget->getServisout($iditem);
                    if ($data['detailitem']['status']) {
                        $data['tipetransaksi'] = $transaksitype;
                        $data['iditem'] = $iditem;
                        $data['namaitem'] = $data['detailitem']['merk'] . ' ' . $data['detailitem']['tipe'] . ' (' . $data['detailitem']['kerusakan'] . ')';
                        $this->load->view('admin/dialog/deletedialogitem', $data);
                    } else {
                        echo "koneksi error";
                    }
                    break;
                case '3':
                    $data['namatransaksi'] = 'servis return';
                    $data['detailitem'] = $this->dataget->getServisreturn($iditem);
                    if ($data['detailitem']['status']) {
                        $data['tipetransaksi'] = $transaksitype;
                        $data['iditem'] = $iditem;
                        $data['namaitem'] = $data['detailitem']['merk'] . ' ' . $data['detailitem']['tipe'] . ' (' . $data['detailitem']['kerusakan'] . ')';
                        $this->load->view('admin/dialog/deletedialogitem', $data);
                    } else {
                        echo "koneksi error";
                    }
                    break;
                case '4':
                    $data['namatransaksi'] = 'Accesoris';
                    $data['detailitem'] = $this->dataget->getAccesoris($iditem);
                    if ($data['detailitem']['status']) {
                        $data['tipetransaksi'] = $transaksitype;
                        $data['iditem'] = $iditem;
                        $data['namaitem'] = $data['detailitem']['nama'] . ' (Rp. ' . number_format($data['detailitem']['harga'], 2, ',', '.') . ')';
                        $this->load->view('admin/dialog/deletedialogitem', $data);
                    } else {
                        echo "koneksi error";
                    }
                    break;
            }
        }
    }
    public function deleteitem($transaksitype = null, $iditem = null)
    {
        $username = $this->input->post('username', true);
        if ($username != 'deleteitem9009') {
            echo 'kamu tidak diijinkan mengakses halaman ini';
        } else {
            switch ($transaksitype) {
                case '0':
                    $result = $this->datadelete->deleteHpin($iditem);
                    $result = json_encode($result);
                    echo $result;
                    break;
                case '1':
                    $result = $this->datadelete->deleteHpout($iditem);
                    $result = json_encode($result);
                    echo $result;
                    break;
                case '2':
                    $result = $this->datadelete->deleteServisout($iditem);
                    $result = json_encode($result);
                    echo $result;
                    break;
                case '3':
                    $result = $this->datadelete->deleteServisreturn($iditem);
                    $result = json_encode($result);
                    echo $result;
                    break;
                case '4':
                    $result = $this->datadelete->deleteAccesoris($iditem);
                    $result = json_encode($result);
                    echo $result;
                    break;
                default:
                    break;
            }
        }
    }
    public function tambahadmin()
    {
        echo FCPATH();
    }
    private function pagetemplate($page, $data, $addlibrary = [])
    {
        $this->load->view('sbtemplates/header', $data);
        $this->load->view('sbtemplates/sidebar', $data);
        $this->load->view('sbtemplates/topbar', $data);
        $this->load->view($page, $data);
        $this->load->view('sbtemplates/footer', $data);
        if (sizeof($addlibrary) > 0) {
            foreach ($addlibrary as $value) {
                $this->load->view($value, $data);
            }
        }
        $this->load->view('sbtemplates/closetag');
    }
    public function index1()
    {
        $nowdate = date("Ymd");
        redirect('admin/beranda/' . $nowdate);
    }
    public function beranda1($nowdate = null)
    {
        if ($nowdate == null) {
            redirect('admin/beranda/' . date("Ymd"));
        }
        $data['transaksi'] = $this->alldata->getallData($nowdate);
        $data['judul'] = 'Beranda';
        $libraryadd = ['jsextends/libberanda', 'jsextends/libberanda1'];
        $this->pagetemplate('sbmain/sbberanda', $data, $libraryadd);
    }
    public function detailberanda()
    {
        $password = $this->input->post('password');
        if ($password == 'jamah0110') {
            $tanggal = $this->input->post('tanggal');
            $data['transaksi'] = $this->alldata->getallData(date($tanggal));
            $this->load->view('sbmain/berandadetail', $data);
        }
    }
    public function bodydialog()
    {
        $password = $this->input->post('password');
        if ($password == 'jamah0110') {
            $id = $this->input->post('id');
            $code = $this->input->post('code');
            $isremove = $this->input->post('isremove');
            switch ($code) {
                case 'hin':
                    $data['hpin'] = $this->alldata->getHpin($id);
                    $data['selection'] = $this->getselected($data['hpin']);
                    $this->load->view('sbmain/bodyform/formhpin', $data);
                    break;
                case 'hout':
                    echo "hp out";
                    break;
                case 'servout':
                    echo "servis out";
                    break;
                case 'servreturn':
                    echo "servis return";
                    break;
                case 'acc':
                    echo "accesoris";
                    break;
                default:
                    break;
            }
        }
    }
    private function getselected($inputdata)
    {
        $allselect['jaringan'][0] = '';
        $allselect['jaringan'][1] = '';
        $allselect['jaringan'][2] = '';
        $allselect['jaringan'][3] = '';
        $allselect['jaringan'][4] = '';
        switch ($inputdata['jaringan']) {
            case '5G':
                $allselect['jaringan'][0] = 'selected';
                break;
            case '4G':
                $allselect['jaringan'][1] = 'selected';
                break;
            case '3G':
                $allselect['jaringan'][2] = 'selected';
                break;
            case 'E':
                $allselect['jaringan'][3] = 'selected';
                break;
            case 'TANPA SIM':
                $allselect['jaringan'][4] = 'selected';
                break;
        }

        $allselect['garansi'][0] = '';
        $allselect['garansi'][1] = '';
        $allselect['garansi'][2] = '';
        switch ($inputdata['garansi']) {
            case 'tidak ada':
                $allselect['garansi'][0] = 'selected';
                break;
            case 'distributor':
                $allselect['garansi'][1] = 'selected';
                break;
            case 'resmi':
                $allselect['garansi'][2] = 'selected';
                break;
        }

        $allselect['ram'][0] = '';
        $allselect['ram'][1] = '';
        $allselect['ram'][2] = '';
        $allselect['ram'][3] = '';
        $allselect['ram'][4] = '';
        $allselect['ram'][5] = '';
        $allselect['ram'][6] = '';
        switch ($inputdata['ram']) {
            case '0.25':
                $allselect['ram'][0] = 'selected';
                break;
            case '0.5':
                $allselect['ram'][1] = 'selected';
                break;
            case '1':
                $allselect['ram'][2] = 'selected';
                break;
            case '1.5':
                $allselect['ram'][3] = 'selected';
                break;
            case '2':
                $allselect['ram'][4] = 'selected';
                break;
            case '3':
                $allselect['ram'][5] = 'selected';
                break;
            case '4':
                $allselect['ram'][6] = 'selected';
                break;
        }

        $allselect['rom'][0] = '';
        $allselect['rom'][1] = '';
        $allselect['rom'][2] = '';
        $allselect['rom'][3] = '';
        $allselect['rom'][4] = '';
        switch ($inputdata['rom']) {
            case '4':
                $allselect['rom'][0] = 'selected';
                break;
            case '8':
                $allselect['rom'][1] = 'selected';
                break;
            case '16':
                $allselect['rom'][2] = 'selected';
                break;
            case '32':
                $allselect['rom'][3] = 'selected';
                break;
            case '64':
                $allselect['rom'][4] = 'selected';
                break;
        }

        $allselect['kelengkapan'][0] = '';
        $allselect['kelengkapan'][1] = '';
        $allselect['kelengkapan'][2] = '';
        $allselect['kelengkapan'][3] = '';
        $allselect['kelengkapan'][4] = '';
        switch ($inputdata['kelengkapan']) {
            case 'hp dus cas headset':
                $allselect['kelengkapan'][0] = 'selected';
                break;
            case 'hp dus cas':
                $allselect['kelengkapan'][1] = 'selected';
                break;
            case 'hp dus':
                $allselect['kelengkapan'][2] = 'selected';
                break;
            case 'hp cas':
                $allselect['kelengkapan'][3] = 'selected';
                break;
            case 'hp':
                $allselect['kelengkapan'][4] = 'selected';
                break;
        }
        return $allselect;
    }
    public function cari($type = null, $kw1 = null, $kw2 = null, $kw3 = null)
    {
        $data['judul'] = 'Cari';
        $data['CSSPATHS'] = array(
            base_url() . 'assets/css/templates/navbar.css',
        );
        $data['JSPATHS'] = array(
            base_url() . 'assets/js/autoNumeric-1.9.26/autoNumeric.js',
            base_url() . 'assets/js/admin/closingjs.js',
            base_url() . 'assets/js/admin/cari.js',
        );
        $data['IMGPATH'] = base_url() . 'assets/img/';
        $data['judul'] = 'Cari';
        $data['headeraktif'] = 3;
        $data['namaitem'] = ['HP MASUK', 'HP TERJUAL', 'SERVIS SELESAI', 'SERVIS RETURN', 'ACCESORIS'];
        $data['tipeitem'] = ['hp_in', 'hp_out', 'servis_out', 'servis_return', 'accesoris'];
        $data['hasil'] = $this->dataget->getCari($type, $kw1, $kw2, $kw3);
        $data['type'] = $type;
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/navbar/adminnavbar', $data);
        $this->load->view('admin/cari/isicari', $data);
        $this->load->view('templates/closing', $data);
    }
    public function servis($type = null, $kw1 = null, $kw2 = null, $kw3 = null)
    {
        $data['CSSPATHS'] = array(
            base_url() . 'assets/css/templates/navbar.css',
        );
        $data['JSPATHS'] = array(
            base_url() . 'assets/js/autoNumeric-1.9.26/autoNumeric.js',
            base_url() . 'assets/js/admin/closingjs.js',
            base_url() . 'assets/js/admin/cari.js',
        );
        $data['IMGPATH'] = base_url() . 'assets/img/';
        $data['judul'] = 'Servis';
        $data['headeraktif'] = 3;
        $data['namaitem'] = ['HP MASUK', 'HP TERJUAL', 'SERVIS SELESAI', 'SERVIS RETURN', 'ACCESORIS'];
        $data['tipeitem'] = ['hp_in', 'hp_out', 'servis_out', 'servis_return', 'accesoris'];
        $data['hasil'] = $this->dataget->getCari($type, $kw1, $kw2, $kw3);
        $data['type'] = $type;
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/navbar/adminnavbar', $data);
        $this->load->view('admin/cari/isicari', $data);
        $this->load->view('templates/closing', $data);
    }
    public function servisproses()
    {
        $data['judul'] = 'Servis';
        $data['CSSPATHS'] = array(
            base_url() . 'assets/css/templates/navbar.css',
        );
        $data['JSPATHS'] = array(
            base_url() . 'assets/js/autoNumeric-1.9.26/autoNumeric.js',
            base_url() . 'assets/js/admin/closingjs.js',
            base_url() . 'assets/js/admin/cari.js',
        );
        $data['IMGPATH'] = base_url() . 'assets/img/';
        $data['judul'] = 'Cari';
        $data['headeraktif'] = 3;
        $data['namaitem'] = ['HP MASUK', 'HP TERJUAL', 'SERVIS SELESAI', 'SERVIS RETURN', 'ACCESORIS'];
        $data['tipeitem'] = ['hp_in', 'hp_out', 'servis_out', 'servis_return', 'accesoris'];
        $data['hasil'] = $this->dataget->getCari($type, $kw1, $kw2, $kw3);
        $data['type'] = $type;
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/navbar/adminnavbar', $data);
        $this->load->view('admin/cari/isicari', $data);
        $this->load->view('templates/closing', $data);
    }
    public function servisselesai()
    {
        $data['judul'] = 'Servis Selesai';
        $this->pagetemplate('sbmain/servisselesai', $data);
    }
    public function rekapdata()
    {
        $data['judul'] = 'Rekap Data';
        $libraryadd = ['jsextends/librekap'];
        $this->pagetemplate('sbmain/sbrekap', $data, $libraryadd);
    }
    public function tambahdata()
    {
        $data['judul'] = 'Tambah Data';
        $this->pagetemplate('sbmain/sbtambah', $data);
    }
}
