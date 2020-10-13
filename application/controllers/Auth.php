<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('role_id') == 1){
            redirect('admin/home');
        } else if($this->session->userdata('role_id') == 2){
            redirect('pegawai/home');
        } 
        
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            // menuju fungsi Login
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password');

        $user = $this->db->get_where('user',['username' => $username])->row();
        $pegawai = $this->db->get_where('pegawai',['id' => $user->pegawai_id])->row();

        // jika username ada
        if($user) {
            // cek password
            if(md5($password, $user->password)) {
                $data = [
                    'id' => $pegawai->id,
                    'nama' => $user->nama,
                    'username' => $user->username,
                    'gambar' => $user->gambar,
                    'role_id' => $user->role_id,
                ];
                $this->session->set_userdata($data);
                
                if($user->role_id == 1){
                    redirect('admin/home');
                } else if($user->role_id == 2){
                    redirect('pegawai/home');
                } else if($user->role_id == 3){
                    redirect('pimpinan/home');
                }

            } else {
                // pesan
                $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Password Salah!</div>');
                redirect('auth');
            }
        } else {
            // pesan 
            $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Username tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function forbidden()
    {
        $this->load->view('auth/403');
    }

    public function register()
    {
        $this->load->model('Jabatan_model');
        $this->load->model('Pegawai_model');

        $data['jabatan'] = $this->Jabatan_model->getAll();

        
      
     
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
       
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]',[
            'matches' => 'Password tidak sama',
            'min_length' => 'Password harus lebih dari 4 karakter',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'matches[password1]');

        if ($this->form_validation->run() == FALSE)
        {
		    $this->load->view('auth/register', $data);
        }
        else
        {
            $this->Pegawai_model->insert_user();

            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Registrasi Berhasil!</div>');
            
            redirect('auth');
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Logout Berhasil</div>');
        redirect('/');
    }
    
}