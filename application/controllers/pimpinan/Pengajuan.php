<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {
    public  function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $query = "SELECT `pengajuan`.`id`, `pegawai`.`nip`,                
                    `pegawai`.`nama`, `pegawai`.`alamat`, 
                    `pegawai`.`pensiun` FROM `pengajuan`, `pegawai`
                    WHERE `pengajuan`.`pegawai_id` = `pegawai`.`id` AND `pengajuan`.`status` = 0";
        $data['pengajuan'] = $this->db->query($query)->result();

        $data['_view']= "admin/pengajuan/index";
        $this->load->view('template/index', $data);
    }

    public function cekdata($id)
    {
        $query = "SELECT `pengajuan`.*, `pegawai`.*
                    FROM `pengajuan`, `pegawai`
                    WHERE `pengajuan`.`pegawai_id` = `pegawai`.`id` AND `pengajuan`.`id` = $id";

        $data['pengajuan'] = $this->db->query($query)->row();

        $data['_view']= "admin/pengajuan/cekdata";
        $this->load->view('template/index', $data);
    }

    public function validasi($status, $id)
    {
        $file = $this->db->get_where('file',['id'=>$id])->row();

        if($status == 2){
            
            $data = [
                'pengembalian_inventaris' => 0,
                'status' => 2,
            ];
            $this->db->where('pegawai_id', $file->pegawai_id);
            $this->db->update('pengajuan', $data);
        }

        $data = [
            'status' => $status,
        ];
        $this->db->where('id', $id);
        $this->db->update('file', $data);

        $this->session->set_flashdata('flash',"Divalidasi");

        // cek apakah sudah tervalidasi benar semua ?
        $cek = $this->db->get_where('file',['pegawai_id' => $file->pegawai_id, 'status' => 1])->num_rows();
        
        if($cek >= 11 ){
            
            $data = [
                'pengembalian_inventaris' => 1,
                'status' => 1,
            ];
            $this->db->where('pegawai_id', $file->pegawai_id);
            $this->db->update('pengajuan', $data);
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function hapus($id)
    {
        $pengajuan = $this->db->get_where('pengajuan',['id' => $id])->row();

        $this->db->delete('keluarga', ['pegawai_id' => $pengajuan->pegawai_id]);
        $this->db->delete('file', ['pegawai_id' => $pengajuan->pegawai_id]);

        $pegawai = $this->db->get_where('pegawai',['id' => $pengajuan->pegawai_id])->row();

        array_map('unlink', glob(FCPATH."./upload_berkas/".$pegawai->nama."/*"));

        $this->db->delete('pengajuan', ['id' => $id]);

        $this->session->set_flashdata('flash',"Dihapus");

        redirect($_SERVER['HTTP_REFERER']);
    }

}