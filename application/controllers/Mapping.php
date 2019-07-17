<?php

Class Mapping Extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('keterangan') != 'login'){
            redirect('login');
        }
        $this->load->model('Model_Mapping');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Mapping';
        $data['mapping'] = $this->Model_Mapping->getAllMapping();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/leftbar');
        $this->load->view('mapping/index', $data);
        $this->load->view('templates/footer');
    }

    public function cari()
    {
        $data['judul'] = 'Halaman Pilih Mapping';
        $data['mapping'] = $this->Model_Mapping->getMapping();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/leftbar');
        $this->load->view('mapping/pilih', $data);
        $this->load->view('templates/footer');
    }

    public function tambah($id)
    {
        $data['judul'] = 'Form Tambah Mapping';
        $data['barang'] = $this->Model_Mapping->getById($id);
        $data['lokasi'] = $this->Model_Mapping->getLokasi();
        $data['palletId'] = $this->Model_Mapping->getPalletId();

        $this->form_validation->set_rules('qty','Quantity','required');
        $this->form_validation->set_rules('lokasi','Lokasi','required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/head', $data);
            $this->load->view('templates/header');
            $this->load->view('templates/leftbar');
            $this->load->view('mapping/tambah', $data);
            $this->load->view('templates/footer');
        }else{
            $this->Model_Mapping->tambahData();
            $this->session->set_flashdata('flash','Ditambahkan');
            redirect('Mapping');
        }
    }

    public function lokasi()
    {
        $this->form_validation->set_rules('lokasi','Lokasi','is_unique[lokasi.lokasi]');
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('validasi','Sudah Ada');
            redirect('Mapping');
        }else{
            $this->Model_Mapping->tambahLokasi();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Mapping');
        }
    }

    public function edit($pallet_id)
    {
        $data['judul'] = 'Form Edit Mapping';
        $data['barang'] = $this->Model_Mapping->getDataById($pallet_id);
        $data['lokasi'] = $this->Model_Mapping->getLokasi();

        $this->form_validation->set_rules('qty','Quantity','required');
        $this->form_validation->set_rules('lokasi','Lokasi','required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/head', $data);
            $this->load->view('templates/header');
            $this->load->view('templates/leftbar');
            $this->load->view('mapping/edit', $data);
            $this->load->view('templates/footer');
        }else {
            $this->Model_Mapping->editData();
            $this->session->set_flashdata('flash', 'Diedit');
            redirect('Mapping');
        }
    }

    public function hapus($pallet_id)
    {
        $this->Model_Mapping->hapusData($pallet_id);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('Mapping');
    }

}