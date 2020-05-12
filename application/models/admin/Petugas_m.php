<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select_detail($petugas_id = 1)
    {
        $this->db->select('*');
        $this->db->from('destaku_petugas');
        $this->db->where('petugas_id', $petugas_id);

        return $this->db->get();
    }

    public function update_data()
    {
        $data = array(
            'petugas_nip_ketua'          => trim(strtoupper(stripHTMLtags($this->input->post('nip_ketua', 'true')))),
            'petugas_jabatan_ketua'      => trim(stripHTMLtags($this->input->post('jabatan_ketua', 'true'))),
            'petugas_nama_ketua'         => trim(stripHTMLtags($this->input->post('nama_ketua', 'true'))),
            'petugas_nip_sekretaris'     => trim(strtoupper(stripHTMLtags($this->input->post('nip_sekretaris', 'true')))),
            'petugas_jabatan_sekretaris' => trim(stripHTMLtags($this->input->post('jabatan_sekretaris', 'true'))),
            'petugas_nama_sekretaris'    => trim(stripHTMLtags($this->input->post('nama_sekretaris', 'true'))),
            'petugas_nip_anggota_1'      => trim(strtoupper(stripHTMLtags($this->input->post('nip_anggota_1', 'true')))),
            'petugas_jabatan_anggota_1'  => trim(stripHTMLtags($this->input->post('jabatan_anggota_1', 'true'))),
            'petugas_nama_anggota_1'     => trim(stripHTMLtags($this->input->post('nama_anggota_1', 'true'))),
            'petugas_nip_anggota_2'      => trim(strtoupper(stripHTMLtags($this->input->post('nip_anggota_2', 'true')))),
            'petugas_jabatan_anggota_2'  => trim(stripHTMLtags($this->input->post('jabatan_anggota_2', 'true'))),
            'petugas_nama_anggota_2'     => trim(stripHTMLtags($this->input->post('nama_anggota_2', 'true'))),
            'petugas_nip_anggota_3'      => trim(strtoupper(stripHTMLtags($this->input->post('nip_anggota_3', 'true')))),
            'petugas_jabatan_anggota_3'  => trim(stripHTMLtags($this->input->post('jabatan_anggota_3', 'true'))),
            'petugas_nama_anggota_3'     => trim(stripHTMLtags($this->input->post('nama_anggota_3', 'true'))),
            'petugas_update'             => date('Y-m-d H:i:s'),
        );

        $this->db->where('petugas_id', 1);
        $this->db->update('destaku_petugas', $data);
    }
}
/* Location: ./application/models/admin/Petugas_m.php */
