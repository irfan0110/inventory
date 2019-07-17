<?php 

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_login');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Login';

        // mengecek validasi form jika kosong
        $this->form_validation->set_rules('username', 'Username','required');
        $this->form_validation->set_rules('password', 'Password','required');
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/head', $data);
            $this->load->view('login/login');
        }
        else
        {
            // jika ada data yang diinputkan maka
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            // ambil data password pada database
            $pass= $this->model_login->getAllData($username)->row();

            // data inputan form yang akan di cek
            $data = [
                'username' => $username,
                'password' => $password
            ];

            // cek password hash sesuai dan username pada database
            if(password_verify($password, $pass->password) && $username == $pass->username ){
                $data_session = [
                    'nama' => $this->input->post('username'),
                    'id' => $pass->id,
                    'name' => $pass->name,
                    'avatar' => $pass->avatar,
                    'roles' => $pass->roles,
                    'keterangan' => "login"
                ];
                $this->session->set_userdata($data_session);
                redirect('home');

            }else {
                $this->session->set_flashdata('flash', 'Salah !');
                redirect('login');
            }

            // $cek = $this->model_login->cekLogin($data)->num_rows();
            // var_dump($cek);
            // if($cek > 0 ){
            //         $data_session = [
            //             'nama' => $this->input->post('username'),
            //             'keterangan' => "login"
            //         ];

            //         $this->session->set_userdata($data_session);
            //         redirect('home');
                    
            // }else{
            //     echo "Username dan password salah !";
            // }
        
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}