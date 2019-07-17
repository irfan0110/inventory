<?php 

class Supplier extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('keterangan') != 'login'){
            redirect('login');
        }
        $this->load->model('Model_supplier');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Supplier';
        $data['suppliers'] = $this->Model_supplier->getAllSupplier();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/leftbar');
        $this->load->view('supplier/index', $data);
        $this->load->view('templates/footer');

    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Supplier'; 
        $this->form_validation->set_rules('kode_supplier','Kode supplier', 'required|is_unique[suppliers.kode_suppliers]');
        $this->form_validation->set_rules('nama_supplier', 'Nama supplier', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlp', 'Telephone', 'required');

        if($this->form_validation->run() == False){
            $this->load->view('templates/head', $data);
            $this->load->view('templates/header');
            $this->load->view('templates/leftbar');
            $this->load->view('supplier/tambah');
            $this->load->view('templates/footer');
        } else{
            $this->Model_supplier->tambahDataSupplier();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Supplier');
        }

    }

    public function edit($id)
    {
        $data['judul'] = 'Form Edit Data Supplier';
        $data['suppliers'] = $this->Model_supplier->getAllSupplierId($id);
        // $this->form_validation->set_rules('kode_supplier','Kode supplier', 'required|is_unique[suppliers.kode_suppliers]');
        $this->form_validation->set_rules('nama_supplier', 'Nama supplier', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlp', 'Telephone', 'required');

        if($this->form_validation->run() == False){
            $this->load->view('templates/head', $data);
            $this->load->view('templates/header');
            $this->load->view('templates/leftbar');
            $this->load->view('supplier/edit', $data);
            $this->load->view('templates/footer');
        } else{
            $this->Model_supplier->editDataSupplier();
            $this->session->set_flashdata('flash', 'Diedit');
            redirect('Supplier');
        }
    }

    public function hapus($id)
    {
        $this->Model_supplier->hapusDataSupplier($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Supplier');
    }
}