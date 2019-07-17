<?php 

class Model_Home extends CI_Model {

    public function getStock()
    {
        return $this->db->query("select sum(stock) as stock from stock_barang")->row_array();
    }

    public function getMasuk()
    {
        return $this->db->query("select sum(qty) as stock from barang_masuk")->row_array();
    }

    public function getKeluar()
    {
        return $this->db->query("select sum(qty) as stock from barang_keluar")->row_array();
    }

    public function getMapping()
    {
        return $this->db->query("select sum(qty) as stock from mapping")->row_array();
    }

}