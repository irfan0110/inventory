<?php

class Barang_keluar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('keterangan') != 'login'){
            redirect('login');
        }
        $this->load->model('Model_BarangKeluar');
        $this->load->library('pdf');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Barang Keluar';
        $data['barang'] = $this->Model_BarangKeluar->getAllData();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/leftbar');
        $this->load->view('barang_keluar/index', $data);
        $this->load->view('templates/footer');
    }

    public function cari()
    {
        $data['judul'] = 'Halaman Pilih Barang Keluar';
        $data['mapping'] = $this->Model_BarangKeluar->getMapping();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/leftbar');
        $this->load->view('barang_keluar/pilih', $data);
        $this->load->view('templates/footer');
    }

    public function tambah($pallet_id)
    {
        $data['judul'] = 'Halaman Barang Keluar';
        $data['barang'] = $this->Model_BarangKeluar->getById($pallet_id);
        $data['no_tran'] = $this->Model_BarangKeluar->noTransaksi();

        $this->form_validation->set_rules('qty', 'Quantity','required|greater_than[0]');
        $this->form_validation->set_rules('lokasi','Lokasi','required');
        $this->form_validation->set_rules('keterangan','Keterangan','required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/head', $data);
            $this->load->view('templates/header');
            $this->load->view('templates/leftbar');
            $this->load->view('barang_keluar/tambah', $data);
            $this->load->view('templates/footer');
        }else{

            $stock = $this->Model_BarangKeluar->getStock();
            
            if($this->input->post('qty') > $this->input->post('qty_lokasi') or ($this->input->post('qty') > $stock['stock'])){
                $this->session->set_flashdata('validasi','Tidak Mencukupi');
                $this->load->view('templates/head', $data);
                $this->load->view('templates/header');
                $this->load->view('templates/leftbar');
                $this->load->view('barang_keluar/tambah', $data);
                $this->load->view('templates/footer');
            }else{
                $this->Model_BarangKeluar->tambahData();
                $this->session->set_flashdata('flash','Ditambahkan');
                redirect('Barang_keluar');
            }
        }
        
    }

    public function laporan()
    {
        $data['judul'] = 'Laporan Barang Keluar';
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/leftbar');
        $this->load->view('barang_keluar/laporan');
        $this->load->view('templates/footer');
    }

    public function pdf_periodik()
    {
        $pdf= new FPDF();
        $pdf->AddPage();

        $pdf->SetFont('arial','B',16);
        $pdf->Cell(0,5,'PT.BARU DIBUKA','0','1','C',false);
        $pdf->SetFont('arial','I',8);
        $pdf->Cell(0,5,'Alamat : Jl. Baru Dibuka No.1 Tangerang','0','1','C',false);
        $pdf->Cell(0,2,'Tel. (+62 21) 555 7777 Fax (+62 21) 555 7777','0','1','C',false);
        $pdf->Ln(3);
        $pdf->Cell(190,0.6,'','0','1','C',true);
        $pdf->Ln(5);

        $pdf->SetFont('arial','B',9);
        $pdf->Cell(0,5,'LAPORAN BARANG KELUAR','0','1','L',false);
        $pdf->Ln(3);

        $pdf->SetFont('arial','B',7);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(26,6,'NO TRANSAKSI',1,0,'C');
        $pdf->Cell(25,6,'TANGGAL KELUAR',1,0,'C');
        $pdf->Cell(20,6,'KODE BARANG',1,0,'C');
        $pdf->Cell(25,6,'NAMA BARANG',1,0,'C');
        $pdf->Cell(20,6,'JENIS BARANG',1,0,'C');
        $pdf->Cell(10,6,'QTY',1,0,'C');
        $pdf->Cell(15,6,'LOKASI',1,0,'C');
        $pdf->Cell(15,6,'PALLET ID',1,0,'C');
        $pdf->Cell(25,6,'KETERANGAN',1,0,'C');
        $pdf->Ln(2);
        $no=0;
        
        $barang = $this->Model_BarangKeluar->lapPeriodik();
        foreach($barang as $brg ) {
            $no++;
            $pdf->Ln(4);
            $pdf->SetFont('arial','',7);
            $pdf->Cell(8,4,$no.".",1,0,'C');
            $pdf->Cell(26,4,$brg['no_transaksi'],1,0,'C');
            $pdf->Cell(25,4,$brg['created_at'],1,0,'C');
            $pdf->Cell(20,4,$brg['kode_barang'],1,0,'C');
            $pdf->Cell(25,4,$brg['nama_barang'],1,0,'C');
            $pdf->Cell(20,4,$brg['jenis_barang'],1,0,'C');
            $pdf->Cell(10,4,$brg['qty'],1,0,'C');
            $pdf->Cell(15,4,$brg['lokasi'],1,0,'C');
            $pdf->Cell(15,4,$brg['pallet_id'],1,0,'C');
            $pdf->Cell(25,4,$brg['keterangan'],1,0,'C');
        }
        $pdf->Output();
    }
    
    public function cetak()
    {
        $pdf= new FPDF();
        $pdf->AddPage();

        $pdf->SetFont('arial','B',16);
        $pdf->Cell(0,5,'PT.BARU DIBUKA','0','1','C',false);
        $pdf->SetFont('arial','I',8);
        $pdf->Cell(0,5,'Alamat : Jl. Baru Dibuka No.1 Tangerang','0','1','C',false);
        $pdf->Cell(0,2,'Tel. (+62 21) 555 7777 Fax (+62 21) 555 7777','0','1','C',false);
        $pdf->Ln(3);
        $pdf->Cell(190,0.6,'','0','1','C',true);
        $pdf->Ln(5);

        $pdf->SetFont('arial','B',9);
        $pdf->Cell(0,5,'LAPORAN BARANG KELUAR','0','1','L',false);
        $pdf->Ln(3);

        $pdf->SetFont('arial','B',7);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(26,6,'NO TRANSAKSI',1,0,'C');
        $pdf->Cell(25,6,'TANGGAL KELUAR',1,0,'C');
        $pdf->Cell(20,6,'KODE BARANG',1,0,'C');
        $pdf->Cell(25,6,'NAMA BARANG',1,0,'C');
        $pdf->Cell(20,6,'JENIS BARANG',1,0,'C');
        $pdf->Cell(10,6,'QTY',1,0,'C');
        $pdf->Cell(15,6,'LOKASI',1,0,'C');
        $pdf->Cell(15,6,'PALLET ID',1,0,'C');
        $pdf->Cell(25,6,'KETERANGAN',1,0,'C');
        $pdf->Ln(2);
        $no=0;
        
        $barang = $this->Model_BarangKeluar->getAllData();
        foreach($barang as $brg ) {
            $no++;
            $pdf->Ln(4);
            $pdf->SetFont('arial','',7);
            $pdf->Cell(8,4,$no.".",1,0,'C');
            $pdf->Cell(26,4,$brg['no_transaksi'],1,0,'C');
            $pdf->Cell(25,4,$brg['created_at'],1,0,'C');
            $pdf->Cell(20,4,$brg['kode_barang'],1,0,'C');
            $pdf->Cell(25,4,$brg['nama_barang'],1,0,'C');
            $pdf->Cell(20,4,$brg['jenis_barang'],1,0,'C');
            $pdf->Cell(10,4,$brg['qty'],1,0,'C');
            $pdf->Cell(15,4,$brg['lokasi'],1,0,'C');
            $pdf->Cell(15,4,$brg['pallet_id'],1,0,'C');
            $pdf->Cell(25,4,$brg['keterangan'],1,0,'C');
        }
        $pdf->Output();
    }

}