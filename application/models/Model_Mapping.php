<?php 

class Model_Mapping extends CI_Model {

    public function getAllMapping()
    {
        return $this->db->get('mapping')->result_array();
    }

    public function getMapping()
    {
        return $this->db->get('barang_masuk')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('barang_masuk', ['id' => $id])->row_array();
    }

    public function tambahLokasi()
    {
        $data = [
            'lokasi' =>$this->input->post('lokasi', true)
        ];

        $this->db->insert('lokasi', $data);
    }

    public function getLokasi()
    {
        return $this->db->get('lokasi')->result_array();
    }

    public function getPalletId()
    {
        $this->db->select('RIGHT(mapping.pallet_id,2) as pallet_id',FALSE);
        $this->db->order_by('pallet_id','DESC');
        $this->db->limit(1);
        $query = $this->db->get('mapping');

        if($query->num_rows() <> 0 ){
            $data = $query->row();
            $pallet_id =intval($data->pallet_id)+1;
        }else{
            $pallet_id = 1;
        }

        $batas = str_pad($pallet_id, 9, "0", STR_PAD_LEFT);
        $id = "P".$batas;
        return $id;
    }

    public function tambahData()
    {
        $data = [
            'pallet_id' => $this->input->post('pallet_id', true),
            'kode_barang' => $this->input->post('kode_barang', true),
            'nama_barang' => $this->input->post('nama_barang', true),
            'jenis_barang' => $this->input->post('jenis_barang', true),
            'qty' => $this->input->post('qty', true),
            'lokasi' => $this->input->post('lokasi', true)
        ];

        $this->db->insert('mapping', $data);
    }

    public function getDataById($pallet_id)
    {
        return $this->db->get_where('mapping', ['pallet_id' => $pallet_id])->row_array();
    }

    public function editData()
    {
        $data = [
            'qty' => $this->input->post('qty', true),
            'lokasi' => $this->input->post('lokasi')
        ];

        $this->db->where('pallet_id', $this->input->post('pallet_id'));
        $this->db->update('mapping', $data);
    }

    public function hapusData($pallet_id)
    {
        $this->db->where('pallet_id', $pallet_id);
        $this->db->delete('Mapping');
    }
}