<?php

Class Stock_barang extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('keterangan') != 'login'){
            redirect('login');
        }
        $this->load->model('Model_StockBarang');
        $this->load->library('pdf');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Stock Barang';
        $data['barang'] = $this->Model_StockBarang->getAllStock();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/leftbar');
        $this->load->view('stock_barang/index', $data);
        $this->load->view('templates/footer');
    }

    public function laporan()
    {
        $data['judul'] = 'Laporan Stock Barang';
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/leftbar');
        $this->load->view('stock_barang/laporan');
        $this->load->view('templates/footer');
    }

    public function cetakCostum()
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
        $pdf->Cell(0,5,'LAPORAN STOCK BARANG','0','1','L',false);
        $pdf->Ln(3);

        $pdf->SetFont('arial','B',7);
        $pdf->Cell(10,6,'No.',1,0,'C');
        $pdf->Cell(45,6,'KODE BARANG',1,0,'C');
        $pdf->Cell(45,6,'NAMA BARANG',1,0,'C');
        $pdf->Cell(45,6,'JENIS BARANG',1,0,'C');
        $pdf->Cell(45,6,'STOCK BARANG',1,0,'C');
        $pdf->Ln(2);
        $no=0;

        $barang = $this->Model_StockBarang->cetakCostum();
        foreach ($barang as $brg){
            $no++;
            $pdf->Ln(4);
            $pdf->SetFont('arial','',7);
            $pdf->Cell(10,4,$no.".",1,0,'C');
            $pdf->Cell(45,4,$brg['kode_barang'],1,0,'C');
            $pdf->Cell(45,4,$brg['nama_barang'],1,0,'C');
            $pdf->Cell(45,4,$brg['jenis_barang'],1,0,'C');
            $pdf->Cell(45,4,$brg['stock'],1,0,'C');
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
        $pdf->Cell(0,5,'LAPORAN STOCK BARANG','0','1','L',false);
        $pdf->Ln(3);

        $pdf->SetFont('arial','B',7);
        $pdf->Cell(10,6,'No.',1,0,'C');
        $pdf->Cell(45,6,'KODE BARANG',1,0,'C');
        $pdf->Cell(45,6,'NAMA BARANG',1,0,'C');
        $pdf->Cell(45,6,'JENIS BARANG',1,0,'C');
        $pdf->Cell(45,6,'STOCK BARANG',1,0,'C');
        $pdf->Ln(2);
        $no=0;

        $barang = $this->Model_StockBarang->getAllStock();
        foreach ($barang as $brg){
            $no++;
            $pdf->Ln(4);
            $pdf->SetFont('arial','',7);
            $pdf->Cell(10,4,$no.".",1,0,'C');
            $pdf->Cell(45,4,$brg['kode_barang'],1,0,'C');
            $pdf->Cell(45,4,$brg['nama_barang'],1,0,'C');
            $pdf->Cell(45,4,$brg['jenis_barang'],1,0,'C');
            $pdf->Cell(45,4,$brg['stock'],1,0,'C');
        }
        $pdf->Output();
    }
}