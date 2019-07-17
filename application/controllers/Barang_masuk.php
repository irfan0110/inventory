<?php

class Barang_masuk extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('keterangan') != 'login'){
            redirect('login');
        }
        $this->load->model('Model_BarangMasuk');
        $this->load->library('pdf');
    }

    public function index()
    {
        $data['judul']= 'Halaman Barang Masuk';
        $data['barang_masuk'] = $this->Model_BarangMasuk->getAllData();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/leftbar');
        $this->load->view('barang_masuk/index', $data);
        $this->load->view('templates/footer');
    }

    public function get_autocomplete()
    {
        $kode_barang = $_GET['kode_barang'];
        $result = $this->Model_BarangMasuk->cari_kode($kode_barang);
        if(count($result) > 0 ){
            foreach($result as $row)
            $arr_result[] = [
                'kode_barang' => $row->kode_barang,
                'nama_barang' => $row->nama_barang,
                'jenis_barang' => $row->jenis_barang
            ];
            
            echo json_encode($arr_result);
        }
    }

    public function tambah()
    {
        $data['judul'] = 'Form Barang Masuk';
        $data['no_transaksi'] = $this->Model_BarangMasuk->no_transaksi(); 
        $data['supplier'] = $this->Model_BarangMasuk->getSupplier();
        $this->form_validation->set_rules('kode_barang','Kode Barang', 'required');
        $this->form_validation->set_rules('nama_barang','Nama Barang', 'required');
        $this->form_validation->set_rules('jenis_barang','Jenis Barang', 'required');
        $this->form_validation->set_rules('qty','Quantity', 'required|greater_than[0]');
        $this->form_validation->set_rules('supplier','Supplier', 'required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/head', $data);
            $this->load->view('templates/header');
            $this->load->view('templates/leftbar');
            $this->load->view('barang_masuk/tambah', $data);
            $this->load->view('templates/footer');
        }else{
            $this->Model_BarangMasuk->tambahData();
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('Barang_masuk');
        }
    }

    public function laporan()
    {
        $data['judul'] = 'Laporan Barang Masuk';
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/leftbar');
        $this->load->view('barang_masuk/laporan');
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
        $pdf->Cell(0,5,'LAPORAN BARANG MASUK','0','1','L',false);
        $pdf->Ln(3);

        $pdf->SetFont('arial','B',7);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(25,6,'NO TRANSAKSI',1,0,'C');
        $pdf->Cell(25,6,'TANGGAL MASUK',1,0,'C');
        $pdf->Cell(25,6,'KODE BARANG',1,0,'C');
        $pdf->Cell(25,6,'NAMA BARANG',1,0,'C');
        $pdf->Cell(25,6,'JENIS BARANG',1,0,'C');
        $pdf->Cell(25,6,'QTY',1,0,'C');
        $pdf->Cell(25,6,'SUPPLIER',1,0,'C');
        $pdf->Ln(2);
        $no=0;
        
        $barang = $this->Model_BarangMasuk->lapPeriodik();
        foreach($barang as $brg ) {
            
            $no++;
            $pdf->Ln(4);
            $pdf->SetFont('arial','',7);
            $pdf->Cell(8,4,$no.".",1,0,'C');
            $pdf->Cell(25,4,$brg['no_transaksi'],1,0,'C');
            $pdf->Cell(25,4,$brg['created_at'],1,0,'C');
            $pdf->Cell(25,4,$brg['kode_barang'],1,0,'C');
            $pdf->Cell(25,4,$brg['nama_barang'],1,0,'C');
            $pdf->Cell(25,4,$brg['jenis_barang'],1,0,'C');
            $pdf->Cell(25,4,$brg['qty'],1,0,'C');
            $pdf->Cell(25,4,$brg['supplier'],1,0,'C');
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
        $pdf->Cell(0,5,'LAPORAN BARANG MASUK','0','1','L',false);
        $pdf->Ln(3);

        $pdf->SetFont('arial','B',7);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(25,6,'NO TRANSAKSI',1,0,'C');
        $pdf->Cell(25,6,'TANGGAL MASUK',1,0,'C');
        $pdf->Cell(25,6,'KODE BARANG',1,0,'C');
        $pdf->Cell(25,6,'NAMA BARANG',1,0,'C');
        $pdf->Cell(25,6,'JENIS BARANG',1,0,'C');
        $pdf->Cell(25,6,'QTY',1,0,'C');
        $pdf->Cell(25,6,'SUPPLIER',1,0,'C');
        $pdf->Ln(2);
        $no=0;
        
        $barang = $this->Model_BarangMasuk->getAllData();
        foreach($barang as $brg ) {
            
            $no++;
            $pdf->Ln(4);
            $pdf->SetFont('arial','',7);
            $pdf->Cell(8,4,$no.".",1,0,'C');
            $pdf->Cell(25,4,$brg['no_transaksi'],1,0,'C');
            $pdf->Cell(25,4,$brg['created_at'],1,0,'C');
            $pdf->Cell(25,4,$brg['kode_barang'],1,0,'C');
            $pdf->Cell(25,4,$brg['nama_barang'],1,0,'C');
            $pdf->Cell(25,4,$brg['jenis_barang'],1,0,'C');
            $pdf->Cell(25,4,$brg['qty'],1,0,'C');
            $pdf->Cell(25,4,$brg['supplier'],1,0,'C');
            }
        $pdf->Output();
    }

    public function test()
    {
        $dari = $this->input->post('dari', true);
        $sampai = $this->input->post('sampai', true);

        $barang = $this->db->query("select * from barang_masuk where created_at between '$dari' and '$sampai'")->result();
        // $barang = $this->Model_BarangMasuk->lapPeriodik($dari, $sampai);
        var_dump($barang);
    }
}