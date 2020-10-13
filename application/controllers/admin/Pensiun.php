<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pensiun extends CI_Controller {
    public  function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $query = "SELECT `pengajuan`.`id`, `pengajuan`.`_id`, ``.`nip`,                
                    ``.`nama`, ``.`alamat`, 
                    ``.`pensiun` FROM `pengajuan`, ``
                    WHERE `pengajuan`.`_id` = ``.`id`";
        $data['pengajuan'] = $this->db->query($query)->result();

        $data['_view']= "admin/pensiun/index";
        $this->load->view('template/index', $data);
    }

    public function cekdata($id)
    {
        $query = "SELECT `pengajuan`.*, ``.*
                    FROM `pengajuan`, ``
                    WHERE `pengajuan`.`_id` = ``.`id` AND `pengajuan`.`id` = $id";

        $data['pengajuan'] = $this->db->query($query)->row();

        $data['_view']= "admin/pensiun/cekdata";
        $this->load->view('template/index', $data);
    }

    public function cekdatasave($id)
    {
        $cek = $this->db->get_where('file',['_id' => $id, 'jenis' => 1, 'status' => 1])->num_rows();
        
        if($cek >= 11 ){
            
            $data = [
                'pengembalian_inventaris' => 1,
                'status' => 1,
            ];
            $this->db->where('_id', $id);
            $this->db->update('pengajuan', $data);
        }
        
        redirect('admin/pensiun');
    }

    public function validasi($status, $id)
    {
        $file = $this->db->get_where('file',['id'=>$id])->row();

        if($status == 2){
            
            $data = [
                'pengembalian_inventaris' => 0,
                'status' => 2,
            ];
            $this->db->where('_id', $file->_id);
            $this->db->update('pengajuan', $data);
        }

        $data = [
            'status' => $status,
        ];
        $this->db->where('id', $id);
        $this->db->update('file', $data);

        $this->session->set_flashdata('flash',"Divalidasi");

        // cek apakah sudah tervalidasi benar semua ?
        $cek = $this->db->get_where('file',['_id' => $file->_id, 'jenis' => 1, 'status' => 1])->num_rows();
        
        if($cek >= 11 ){
            
            $data = [
                'pengembalian_inventaris' => 1,
                'status' => 1,
            ];
            $this->db->where('_id', $file->_id);
            $this->db->update('pengajuan', $data);
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function hapus($id)
    {
        $pengajuan = $this->db->get_where('pengajuan',['id' => $id])->row();

        $this->db->delete('keluarga', ['_id' => $pengajuan->_id]);
        $this->db->delete('file', ['_id' => $pengajuan->_id]);

        $ = $this->db->get_where('',['id' => $pengajuan->_id])->row();

        array_map('unlink', glob(FCPATH."./upload_berkas/".$->nama."/*"));

        $this->db->delete('pengajuan', ['id' => $id]);

        $this->session->set_flashdata('flash',"Dihapus");

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function cetak($id)
    {
        $data['pensiun'] = $this->db->get_where('',['id' => $id])->row();

        $this->load->library('pdf');

        // $customPaper = array(0,0,360,360);
        // $this->pdf->set_paper($customPaper);

        $this->pdf->setPaper('legal', 'potrait');
        $this->pdf->filename = "permohonan pensiun.pdf";
        $this->pdf->load_view('pdf/permohonan_pensiun', $data);
    }

}