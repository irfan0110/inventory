<?php

Class Model_MasterBarang extends CI_Model{

    public function getAllBarang()
    {
        return $this->db->get('master_barang')->result_array();
    }

    public function getBarangId($id)
    {
        return $this->db->get_where('master_barang', ['id' => $id])->row_array();
    }

    public function tambahDataBarang()
    {
        $data = [
            'kode_barang' => $this->input->post('kode_barang', true),
            'nama_barang' => $this->input->post('nama_barang', true),
            'jenis_barang' => $this->input->post('jenis_barang', true)
        ];

        $this->db->insert('master_barang', $data);
        $this->db->insert('stock_barang', $data);
    }

    public function editDataBarang()
    {
        $data = [
            'nama_barang' => $this->input->post('nama_barang', true),
            'jenis_barang' => $this->input->post('jenis_barang', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('master_barang', $data);
        $this->db->update('stock_barang', $data);
    }

    public function hapusDataBarang($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('master_barang');
        $this->db->delete('stock_barang');
    }
}