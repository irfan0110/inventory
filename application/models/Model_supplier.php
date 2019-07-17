<?php 

class Model_supplier extends CI_Model{

    public function getAllSupplier()
    {
        return $this->db->get('suppliers')->result_array();
    }

    public function tambahDataSupplier()
    {
        $data = [
            'kode_suppliers' => $this->input->post('kode_supplier', true),
            'nama_suppliers' => $this->input->post('nama_supplier', true),
            'alamat' => $this->input->post('alamat', true),
            'no_tlp' => $this->input->post('no_tlp', true)
        ];

        $this->db->insert('suppliers', $data);
    }

    public function getAllSupplierId($id)
    {
        return $this->db->get_where('suppliers', ['id' => $id])->row_array();
    }

    public function editDataSupplier()
    {
        $data = [
            'nama_suppliers' => $this->input->post('nama_supplier', true),
            'alamat' => $this->input->post('alamat', true),
            'no_tlp' => $this->input->post('no_tlp', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('suppliers', $data);
    }

    public function hapusDataSupplier($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('suppliers');
    }
}