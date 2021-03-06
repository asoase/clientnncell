<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data');
        $this->load->model('Menu_admin', 'menuadmin');
        date_default_timezone_set("Asia/Bangkok");
    }

    public function index()
    {
        redirect('admin/beranda/' . date("Ymd"));
    }
    public function beranda($date = null)
    {
        if($this->input->get('ketanggal') == null){
            if ($date == null)
                redirect('admin/beranda/' . date("Ymd"));
        }
        else {
            redirect('admin/beranda/'.$this->input->get('ketanggal'));
        }
        $data['CSSPATH'] = base_url() . 'assets/css/admin/adminberanda.css';
        $data['JSPATH']  = base_url() . 'assets/js/admin/adminberanda.js';
        $data['IMGPATH'] = base_url() . 'assets/img/';
        $data['title']   = 'Admin';
        $data['headeraktif'] = 3;
        $data['data'] = $this->Data->dataOneWeek($date);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/adminberanda', $data);
        $this->load->view('templates/closing', $data);
    }
    public function login()
    {
        $data['CSSPATH'] = base_url() . 'assets/css/admin/adminlogin.css';
        $data['JSPATH']  = base_url() . 'assets/js/admin/adminlogin.js';
        $data['IMGPATH'] = base_url() . 'assets/img/';
        $data['title']   = 'Login';
        $data['headeraktif'] = 3;
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/adminlogin', $data);
        $this->load->view('templates/closing', $data);
    }
    public function isidetail($transaksitype = null, $iditem = null){
        $username = $this->input->post('username');
        if($username != 'isidetail9009'){
            echo 'kamu tidak diijinkan mengakses halaman ini';
        } else{
            switch ($transaksitype) {
                case '0':
                $data['namatransaksi'] = 'HP MASUK';
                $data['detailitem'] = $this->Data->getHpin($iditem);
                $data['tipetransaksi'] = $transaksitype;
                $data['iditem'] = $iditem;
                $this->load->view('admin/detailitemtransaksi/detailhpmasuk', $data);
                break;
                case '1':
                $data['namatransaksi'] = 'HP TERJUAL';
                $data['detailitem'] = $this->Data->getHpout($iditem);
                $data['tipetransaksi'] = $transaksitype;
                $data['iditem'] = $iditem;
                $this->load->view('admin/detailitemtransaksi/detailhpterjual', $data);
                break;
                case '2':
                $data['namatransaksi'] = 'SERVIS SELESAI';
                $data['detailitem'] = $this->Data->getServisout($iditem);
                $data['tipetransaksi'] = $transaksitype;
                $data['iditem'] = $iditem;
                $this->load->view('admin/detailitemtransaksi/detailservisselesai', $data);
                break;
                case '3':
                $data['namatransaksi'] = 'SERVIS RETURN';
                $data['detailitem'] = $this->Data->getServisreturn($iditem);
                $data['tipetransaksi'] = $transaksitype;
                $data['iditem'] = $iditem;
                $this->load->view('admin/detailitemtransaksi/detailservisreturn', $data);
                break;
                case '4':
                $data['namatransaksi'] = 'ACCESORIS';
                $data['detailitem'] = $this->Data->getAccesoris($iditem);
                $data['tipetransaksi'] = $transaksitype;
                $data['iditem'] = $iditem;
                $this->load->view('admin/detailitemtransaksi/detailaccesoris', $data);
                break;
                default:
                break;
            }
        }
    }
    public function editdetail($transaksitype = null, $iditem = null){
        $username = $this->input->post('username');
        if($username != 'editdetail9009'){
            echo 'kamu tidak diijinkan mengakses halaman ini';
        } else{
            switch ($transaksitype) {
                case '0':
                $this->load->library('adminBerandaLib', 'adminberandalib');
                $data['namatransaksi'] = 'HP MASUK';
                $data['detailitem'] = $this->Data->getHpin($iditem);
                $data['menuadmin'] = $this->menuadmin->getmenu();
                $data['selectmenuindex'] = $this->adminberandalib->getselectindex($data);
                $data['tipetransaksi'] = $transaksitype;
                $data['iditem'] = $iditem;
                $this->load->view('admin/edititemtransaksi/edithpmasuk', $data);
                break;
                case '1':
                $data['namatransaksi'] = 'HP TERJUAL';
                $data['detailitem'] = $this->Data->getHpout($iditem);
                $data['tipetransaksi'] = $transaksitype;
                $data['iditem'] = $iditem;
                $this->load->view('admin/detailitemtransaksi/detailhpterjual', $data);
                break;
                case '2':
                $data['namatransaksi'] = 'SERVIS SELESAI';
                $data['detailitem'] = $this->Data->getServisout($iditem);
                $data['tipetransaksi'] = $transaksitype;
                $data['iditem'] = $iditem;
                $this->load->view('admin/detailitemtransaksi/detailservisselesai', $data);
                break;
                case '3':
                $data['namatransaksi'] = 'SERVIS RETURN';
                $data['detailitem'] = $this->Data->getServisreturn($iditem);
                $data['tipetransaksi'] = $transaksitype;
                $data['iditem'] = $iditem;
                $this->load->view('admin/detailitemtransaksi/detailservisreturn', $data);
                break;
                case '4':
                $data['namatransaksi'] = 'ACCESORIS';
                $data['detailitem'] = $this->Data->getAccesoris($iditem);
                $data['tipetransaksi'] = $transaksitype;
                $data['iditem'] = $iditem;
                $this->load->view('admin/detailitemtransaksi/detailaccesoris', $data);
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
        $data['judul']     = 'Beranda';
        $libraryadd        = ['jsextends/libberanda', 'jsextends/libberanda1'];
        $this->pagetemplate('sbmain/sbberanda', $data, $libraryadd);
    }
    public function detailberanda()
    {
        $password = $this->input->post('password');
        if ($password == 'jamah0110') {
            $tanggal           = $this->input->post('tanggal');
            $data['transaksi'] = $this->alldata->getallData(date($tanggal));
            $this->load->view('sbmain/berandadetail', $data);
        }
    }
    public function bodydialog()
    {
        $password = $this->input->post('password');
        if ($password == 'jamah0110') {
            $id       = $this->input->post('id');
            $code     = $this->input->post('code');
            $isremove = $this->input->post('isremove');
            switch ($code) {
                case 'hin':
                $data['hpin']      = $this->alldata->getHpin($id);
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
    public function cari($keyword = null)
    {
        $data['judul'] = 'Cari';
        $getout = $this->input->get('cari');
        echo $getout;
        // $this->pagetemplate('sbmain/sbcari', $data);
    }
    public function servisproses()
    {
        $data['judul'] = 'Servis dalam Proses';
        $this->pagetemplate('sbmain/servisproses', $data);
    }
    public function servisselesai()
    {
        $data['judul'] = 'Servis Selesai';
        $this->pagetemplate('sbmain/servisselesai', $data);
    }
    public function rekapdata()
    {
        $data['judul'] = 'Rekap Data';
        $libraryadd    = ['jsextends/librekap'];
        $this->pagetemplate('sbmain/sbrekap', $data, $libraryadd);
    }
    public function tambahdata()
    {
        $data['judul'] = 'Tambah Data';
        $this->pagetemplate('sbmain/sbtambah', $data);
    }
}
