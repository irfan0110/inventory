<?php

class Model_BarangKeluar extends CI_Model {

    public function getAllData()
    {
        return $this->db->get('barang_keluar')->result_array();
    }

    public function getMapping()
    {
        return $this->db->get('mapping')->result_array();
    }

    public function getById($pallet_id)
    {
        return $this->db->get_where('mapping', ['pallet_id' => $pallet_id])->row_array();
    }

    public function noTransaksi()
    {
        $q = $this->db->query('select max(right(no_transaksi, 4)) as no_tran from barang_keluar where date(created_at) =CURDATE()');
        $no_tran = '';
        if($q->num_rows() > 0){
            foreach($q->result() as $no){
                $tmp = ((int)$no->no_tran)+1;
                $no_tran = sprintf("%04s", $tmp);
            }
        }else{
            $no_tran = '0001';
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy').$no_tran;
    }

    public function getStock()
    {
        return $this->db->get_where('stock_barang', ['kode_barang' => $this->input->post('kode_barang')])->row_array();
    }

    public function tambahData()
    {
        $data = [
            'no_transaksi' => $this->input->post('no_transaksi',true),
            'kode_barang' => $this->input->post('kode_barang', true),
            'nama_barang' => $this->input->post('nama_barang', true),
            'jenis_barang' => $this->input->post('jenis_barang', true),
            'qty' => $this->input->post('qty', true),
            'lokasi' => $this->input->post('lokasi', true),
            'pallet_id' => $this->input->post('pallet_id', true),
            'keterangan' => $this->input->post('keterangan', true)
        ];

        $no_tran = $this->input->post('no_transaksi', true);
        $pallet_id = $this->input->post('pallet_id', true);
        $qty = $this->input->post('qty', true);
        
        $this->db->insert('barang_keluar', $data);
        $this->db->query("update barang_keluar, stock_barang set stock=stock_barang.stock-barang_keluar.qty where stock_barang.kode_barang=barang_keluar.kode_barang and barang_keluar.no_transaksi='$no_tran'");
        $this->db->query("update barang_keluar, mapping set mapping.qty=mapping.qty-barang_keluar.qty where mapping.kode_barang=barang_keluar.kode_barang and mapping.pallet_id='$pallet_id' and barang_keluar.qty='$qty'");
    }

    public function lapPeriodik()
    {
        $dari = $this->input->post('dari', true);
        $sampai = $this->input->post('sampai', true);

        return $this->db->query("select * from barang_keluar where created_at between '$dari' and '$sampai' order by no_transaksi asc ")->result_array();
    }
}