<?php 


class User extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('keterangan') != 'login'){
            redirect('login');
        }else if($this->session->userdata('roles') != 'ADMIN'){
            $this->session->set_flashdata('flash','Anda Tidak ada akses silahkan login kembali');
            redirect('login');
        }
        $this->load->model('model_user');   
        $this->load->library(['upload','image_lib']);
        
    }


    public function index()
    {
        $data['judul'] = 'Halaman User';
        $data['users'] = $this->model_user->getAllUser();
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header');
        $this->load->view('templates/leftbar', $data);
        $this->load->view('users/user', $data);
        $this->load->view('templates/footer');
        
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah User';
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('roles[]', 'Roles', 'required');

        if($this->form_validation->run() == FALSE ){
            $this->load->view('templates/head',$data);
            $this->load->view('templates/header');
            $this->load->view('templates/leftbar');
            $this->load->view('users/tambah');
            $this->load->view('templates/footer');
        }else {
            $config['upload_path'] = './gambar';
            $config['allowed_types'] = 'gif|jpg|png';
        
            $this->upload->initialize($config);

            if( !$this->upload->do_upload('avatar')){
                $error = ['error' => $this->upload->display_errors()];
                $this->load->view('templates/head',$data);
                $this->load->view('templates/header');
                $this->load->view('templates/leftbar');
                $this->load->view('users/tambah', $error);
                $this->load->view('templates/footer');
            }else{
                $gbr = $this->upload->data();
                // compress
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/'.$gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['width'] = 300;
                $config['height'] = 300;
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                $gambar = $gbr['file_name'];

                $this->model_user->tambahDataUser($gambar);
                $this->session->set_flashdata('flash', 'ditambahkan');
                redirect('user');
            }
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Form Edit User';
        $data['users'] = $this->model_user->getAllUserId($id);
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('roles[]', 'Roles', 'required');

        if($this->form_validation->run() == FALSE ){
            $this->load->view('templates/head',$data);
            $this->load->view('templates/header');
            $this->load->view('templates/leftbar');
            $this->load->view('users/edit', $data);
            $this->load->view('templates/footer');
        }else {

            $config['upload_path'] = './gambar';
            $config['allowed_types'] = 'gif|jpg|png';

            $this->upload->initialize($config);

            if( !$this->upload->do_upload('avatar')){

                $data = [
                    "name" => $this->input->post('name', true),
                    "username" => $this->input->post('username', true),
                    "roles" => implode(',', $this->input->post('roles', true)),
                    "status" => implode(',', $this->input->post('status', true))
                ];  

                $this->model_user->editDatauser($data);
                $this->session->set_flashdata('flash', 'diedit');
                redirect('user');

            }else{
                $gbr = $this->upload->data();
                // compress
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/'.$gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['width'] = 300;
                $config['height'] = 300;
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                $gambar = $gbr['file_name'];

                $data = [
                    "name" => $this->input->post('name', true),
                    "username" => $this->input->post('username', true),
                    "avatar" => $gambar,
                    "roles" => implode(',', $this->input->post('roles', true)),
                    "status" => implode(',', $this->input->post('status', true))
                ];

                $this->model_user->editDataUser($data);
                $this->session->set_flashdata('flash', 'diedit');
                redirect('user');
            }
        }
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail User';
        $data['users'] = $this->model_user->getAllUserId($id);
        
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/leftbar');
        $this->load->view('users/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubahpas($id)
    {
        $data['judul'] = 'Form Ubah Password';
        $data['users'] = $this->model_user->getAllUserId($id);
        $this->form_validation->set_rules('pas', 'Password', 'required');

        if($this->form_validation->run() == FALSE ){
            $this->load->view('templates/head',$data);
            $this->load->view('templates/header');
            $this->load->view('templates/leftbar');
            $this->load->view('users/ubahpas', $data);
            $this->load->view('templates/footer');
        }else {

            $this->model_user->ubahPas();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('user');

        }
    }

    public function hapus($id)
    {
        $this->model_user->hapusDataUser($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('user');
    }

    public function tes($id)
    {
        $avatar = $this->model_user->getAllUserId($id);
        var_dump($avatar);
    }


}
