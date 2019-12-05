<?php

class Ncell extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AllData_model', 'alldata');
        date_default_timezone_set("Asia/Bangkok");
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
    public function index()
    {
        $nowdate = date("Ymd");
        redirect('main/ncell/beranda/' . $nowdate);
    }
    public function beranda($nowdate = null)
    {
        if ($nowdate == null) {
            redirect('main/ncell/beranda/' . date("Ymd"));
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
        $this->pagetemplate('sbmain/sbcari', $data);
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
