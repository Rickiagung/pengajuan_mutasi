<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi extends CI_Controller {
    public  function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $query = "SELECT `mutasi`.`id`, `mutasi`.`pegawai_id`, `pegawai`.`nip`,                
                    `pegawai`.`nama`, `pegawai`.`alamat` FROM `mutasi`, `pegawai`
                    WHERE `mutasi`.`pegawai_id` = `pegawai`.`id`";
        $data['mutasi'] = $this->db->query($query)->result();

        $data['_view']= "admin/mutasi/index";
        $this->load->view('template/index', $data);
    }

    public function cekdata($id)
    {
        $query = "SELECT `mutasi`.*, `pegawai`.*
                    FROM `mutasi`, `pegawai`
                    WHERE `mutasi`.`pegawai_id` = `pegawai`.`id` AND `mutasi`.`id` = $id";

        $data['mutasi'] = $this->db->query($query)->row();

        $data['_view']= "admin/mutasi/cekdata";
        $this->load->view('template/index', $data);
    }

    public function cekdatasave($id)
    {
        $cek = $this->db->get_where('file',['pegawai_id' => $id, 'status' => 1, 'jenis' => 2])->num_rows();
        
        if($cek >= 11 ){
            
            $data = [
                'pengembalian_inventaris' => 1,
                'status' => 1,
            ];
            $this->db->where('pegawai_id', $id);
            $this->db->update('mutasi', $data);
        }
        
        redirect('admin/mutasi');
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
            $this->db->update('mutasi', $data);
        }

        $data = [
            'status' => $status,
        ];
        $this->db->where('id', $id);
        $this->db->update('file', $data);

        $this->session->set_flashdata('flash',"Divalidasi");

        // cek apakah sudah tervalidasi benar semua ?
        $cek = $this->db->get_where('file',['pegawai_id' => $file->pegawai_id, 'jenis' => 2, 'status' => 1])->num_rows();
        
        if($cek >= 6 ){
            
            $data = [
                'pengembalian_inventaris' => 1,
                'status' => 1,
            ];
            $this->db->where('pegawai_id', $file->pegawai_id);
            $this->db->update('mutasi', $data);
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function hapus($id)
    {
        $mutasi = $this->db->get_where('mutasi',['id' => $id])->row();

        $this->db->delete('keluarga', ['pegawai_id' => $mutasi->pegawai_id]);
        $this->db->delete('file', ['pegawai_id' => $mutasi->pegawai_id]);

        $guru = $this->db->get_where('guru',['id' => $mutasi->pegawai_id])->row();

        array_map('unlink', glob(FCPATH."./upload_berkas/".$guru->nama."/*"));

        $this->db->delete('mutasi', ['id' => $id]);

        $this->session->set_flashdata('flash',"Dihapus");

        redirect($_SERVER['HTTP_REFERER']);
    }

}