<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
    public  function __construct()
    {
        parent::__construct();
        $this->load->model('Jabatan_model');
        $this->load->model('Pegawai_model');
        cek_login();
    }

    public function index()
    {
        $data['pegawai'] = $this->db->get('pegawai')->result();

        $data['_view']= "pimpinan/pegawai/index";
        $this->load->view('template/index', $data);
    }

    public function detail($id)
    {
        $data['pegawai'] = $this->Pegawai_model->get($id);

        $data['_view'] = "pimpinan/pegawai/detail";
		$this->load->view('template/index', $data);
    }

    public function tambah()
    {
        $data['status'] = ['PNS','HONORER'];
        $data['jabatan'] = $this->Jabatan_model->getAll();
        $data['agama'] = ['Islam','Kristen','Katolik','Hindu','Budha','Konghucu'];
        
        $this->form_validation->set_rules('nip_lama', 'NIP Lama', 'required|trim|min_length[12]|max_length[12]');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|min_length[12]|max_length[12]|is_unique[pegawai.nip]',[
            'is_unique' => 'NIP sudah terdaftar',
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jns_klmn', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('tamat_pangkat', 'Tamat Pangkat', 'required|trim');
        $this->form_validation->set_rules('tamat_jabatan', 'Tamat Jabatan', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required|trim');
        $this->form_validation->set_rules('th_lulus', 'Tahun Lulus', 'required|trim');
        $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $data['_view'] = "pimpinan/pegawai/tambah";
		    $this->load->view('template/index', $data);
        }
        else
        {
            $this->Pegawai_model->insert();
            $this->session->set_flashdata('flash',"Ditambahkan");
            redirect('pimpinan/pegawai');
        }
    }

    public function edit($id)
    {
        $data['pegawai'] = $this->Pegawai_model->get($id);
        $data['status'] = ['PNS','HONORER'];
        $data['jabatan'] = $this->Jabatan_model->getAll();
        $data['agama'] = ['Islam','Kristen','Katolik','Hindu','Budha','Konghucu'];
        
        $this->form_validation->set_rules('nip_lama', 'NIP Lama', 'required|trim|min_length[12]|max_length[12]');
        $this->form_validation->set_rules('nip', 'nip', 'required|trim|min_length[12]|max_length[12]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jns_klmn', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('tamat_pangkat', 'Tamat Pangkat', 'required|trim');
        $this->form_validation->set_rules('tamat_jabatan', 'Tamat Jabatan', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required|trim');
        $this->form_validation->set_rules('th_lulus', 'Tahun Lulus', 'required|trim');
        $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan Terakhir', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $data['_view'] = "pimpinan/pegawai/edit";
		    $this->load->view('template/index', $data);
        }
        else
        {
            $this->Pegawai_model->update();
            $this->session->set_flashdata('flash',"Diubah");
            redirect('pimpinan/pegawai');
        }
    }

    public function hapus($id)
    {
        $this->Pegawai_model->delete($id);
        $this->session->set_flashdata('flash',"Dihapus");
        redirect('pimpinan/pegawai');
    }

    // fungsi mengubah tanggal ke format Y-m-d
    private function tanggal_en($date){
		$tanggal = substr($date,0,2)-1;
		$bulan = substr($date,3,2);
		$tahun = substr($date,6,4);
		return $tahun.'-'.$bulan.'-'.$tanggal;		 
    }

}