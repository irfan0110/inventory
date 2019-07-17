<?php

Class Model_StockBarang extends CI_Model{

    public function getAllStock()
    {
        return $this->db->get_where('stock_barang', 'stock > 0' )->result_array();
    }

    public function cetakCostum()
    {
        $cari = $this->input->post('cari', true);

        return $this->db->query("select * from stock_barang where kode_barang like '%$cari%' or nama_barang like '%$cari%' or jenis_barang like '%$cari%' ")->result_array();
    }
}