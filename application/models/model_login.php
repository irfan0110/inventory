<?php 

class Model_login extends CI_Model {
    

    // public function cekLogin($data)
    // {
    //     // $query = $this->db->query('Select username,password from users');
    //     // $pass = $query->row();

    //     // $username = $this->input->post('username');
    //     // $password = $this->input->post('password');

    //     // $data = [
    //     //     'username' => $username,
    //     //     'password' => $password
    //     // ];
        
    //         return $this->db->get_where('users', $data);
        
    // }

    public function getAllData($username)
    {
        // mengambil data username dan password
        return $this->db->query("Select * from users where username='$username' ");
        
    }

}