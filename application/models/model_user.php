<?php 


Class Model_user extends CI_Model {


    public function getAllUser()
    {
        return $this->db->get('users')->result_array();
    }

    public function tambahDataUser($gambar)
    {

        $data = [
            "name" => $this->input->post('name', true),
            "username" => $this->input->post('username', true),
            "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            "avatar" => $gambar,
            "roles" => implode(',', $this->input->post('roles', true)),
            "status" => ('active')
        ];  
        
        $this->db->insert('users', $data);
    }

    public function getAllUserId($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function editDatauser($data)
    {  
        $this->db->where('id', $this->input->post('id'));
        $query  = $this->db->get('users');
        $file = $query->row();
        unlink("./gambar/$file->avatar");
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);
    }

    public function hapusDataUser($id)
    {
        $this->db->where('id', $id);
        $query  = $this->db->get('users');
        $file = $query->row();
        unlink("./gambar/$file->avatar");
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

    public function getDataUser($username)
    {
        return $this->db->get_where('users', ['username' => $username])->result_array();
    }

    public function ubahPas()
    {
        $data = [
            "password" => password_hash($this->input->post('pas'), PASSWORD_DEFAULT)
        ];  

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);

    }
}