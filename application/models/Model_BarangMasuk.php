<?php

Class Model_BarangMasuk extends CI_Model{

    public function no_transaksi()
    {
        $q = $this->db->query('select max(right(no_transaksi,4)) as no_tran from barang_masuk where date(created_at) =CURDATE()');
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

    public function getAllData()
    {
        return $this->db->get('barang_masuk')->result_array();
    }

    public function cari_kode($kode_barang)
    {
        return $this->db->get_where('master_barang', ['kode_barang' => $kode_barang])->result();
    }

    public function getSupplier()
    {
        return $this->db->get('suppliers')->result_array();
    }

    public function tambahData()
    {
        $data = [
            'no_transaksi' => $this->input->post('no_transaksi', true),
            'kode_barang' => $this->input->post('kode_barang', true),
            'nama_barang' => $this->input->post('nama_barang', true),
            'jenis_barang' => $this->input->post('jenis_barang', true),
            'qty' => $this->input->post('qty', true),
            'supplier' => $this->input->post('supplier', true)
        ];
        
        $no_tran = $this->input->post('no_transaksi',true);

        $this->db->insert('barang_masuk', $data);
        $this->db->query("update barang_masuk, stock_barang set stock=stock_barang.stock+barang_masuk.qty where stock_barang.kode_barang=barang_masuk.kode_barang and barang_masuk.no_transaksi='$no_tran'");
    }

    public function lapPeriodik()
    {
        $dari = $this->input->post('dari', true);
        $sampai = $this->input->post('sampai', true);

        return $this->db->query("select * from barang_masuk where created_at between '$dari' and '$sampai' order by no_transaksi asc ")->result_array();
        
    }

}