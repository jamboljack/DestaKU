<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Meta_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select_detail($meta_id = 1)
    {
        $this->db->select('*');
        $this->db->from('destaku_meta');
        $this->db->where('meta_id', $meta_id);

        return $this->db->get();
    }

    public function update_data()
    {
        $data = array(
            'meta_name'        => stripHTMLtags($this->input->post('name', 'true')),
            'meta_desc'        => trim($this->input->post('desc', 'true')),
            'meta_keyword'     => stripHTMLtags($this->input->post('keyword', 'true')),
            'meta_author'      => stripHTMLtags($this->input->post('author', 'true')),
            'meta_developer'   => stripHTMLtags($this->input->post('developer', 'true')),
            'meta_robots'      => stripHTMLtags($this->input->post('lstRobot', 'true')),
            'meta_googlebots'  => stripHTMLtags($this->input->post('lstGoogle', 'true')),
            'meta_email'       => stripHTMLtags($this->input->post('email', 'true')),
            'meta_wa'          => stripHTMLtags($this->input->post('no_wa', 'true')),
            'meta_title'       => trim($this->input->post('title', 'true')),
            'meta_nama_kepala' => trim($this->input->post('nama_kepala', 'true')),
            'meta_jabatan'     => trim($this->input->post('jabatan', 'true')),
            'meta_pangkat'    => trim($this->input->post('pangkat', 'true')),
            'meta_nip'         => trim($this->input->post('nip', 'true')),
            'meta_keterangan'  => trim($this->input->post('keterangan', 'true')),
            'meta_update'      => date('Y-m-d H:i:s'),
        );

        $this->db->where('meta_id', 1);
        $this->db->update('destaku_meta', $data);
    }
}
/* Location: ./application/models/admin/Meta_m.php */
