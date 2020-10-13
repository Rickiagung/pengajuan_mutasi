<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statusmutasi extends CI_Controller {
    public  function __construct()
    {
        parent::__construct();
        cek_login();
    }
    
    public function index()
    {
        $data['mutasi'] = $this->db->get_where('mutasi',['id' => $this->session->userdata('id')])->row();
        
        $data['_view']= "pegawai/statusmutasi";
        $this->load->view('template/index', $data);
    }
    
}