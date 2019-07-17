<?php 

class Master_barang extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('keterangan') != 'login'){
            redirect('login');
        }
        $this->load->model('Model_MasterBarang');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Master Barang';
        $data['jenis_barang'] = ['Tas','Dompet','Sandal','Sepatu','Jam Tangan','Kaca Mata'];
        $data['barang'] = $this->Model_MasterBarang->getAllBarang();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/leftbar');
        $this->load->view('master_barang/index', $data);
        $this->load->view('templates/footer'); 
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Barang';
        $data['jenis_barang'] = ['Tas','Dompet','Sandal','Sepatu','Jam Tangan','Kaca Mata'];
        $this->form_validation->set_rules('kode_barang', 'Kode barang', 'required|is_unique[master_barang.kode_barang]');
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');
        $this->form_validation->set_rules('jenis_barang', 'Jenis barang', 'required');
        
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/head', $data);
            $this->load->view('templates/header');
            $this->load->view('templates/leftbar');
            $this->load->view('master_barang/tambah', $data);
            $this->load->view('templates/footer');
        }else {
            $this->Model_MasterBarang->tambahDataBarang();
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('Master_barang');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Form Edit Barang';
        $data['barang'] = $this->Model_MasterBarang->getBarangId($id);
        $data['jenis_barang'] = ['Tas','Dompet','Sandal','Sepatu','Jam Tangan','Kaca Mata'];
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');
        $this->form_validation->set_rules('jenis_barang', 'Jenis barang', 'required');
        
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/head', $data);
            $this->load->view('templates/header');
            $this->load->view('templates/leftbar');
            $this->load->view('master_barang/edit', $data);
            $this->load->view('templates/footer');
        }else {
            $this->Model_MasterBarang->editDataBarang();
            $this->session->set_flashdata('flash', 'Diedit');
            redirect('Master_barang');
        }
    }

    public function hapus($id)
    {
        $this->Model_MasterBarang->hapusDataBarang($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('master_barang');
    }

}
