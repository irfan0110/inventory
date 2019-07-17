<?php 

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('keterangan') != 'login'){
            redirect('login');
        }
        $this->load->model('Model_Home');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Utama';
        $data['stock'] = $this->Model_Home->getStock();
        $data['barang_masuk'] = $this->Model_Home->getMasuk();
        $data['barang_keluar'] = $this->Model_Home->getKeluar();
        $data['mapping'] = $this->Model_Home->getMapping();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/leftbar');
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}
