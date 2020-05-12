<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth_admin();
        $this->load->library('template');
    }

    public function index()
    {
        $data['TotalBaru']       = $this->db->get_where('destaku_pengajuan', array('pengajuan_status' => 'B'))->result();
        $data['TotalKonfirmasi'] = $this->db->get_where('destaku_pengajuan', array('pengajuan_status' => 'K'))->result();
        $data['TotalPenilaian']  = $this->db->get_where('destaku_pengajuan', array('pengajuan_status' => 'N'))->result();
        $data['Total']           = $this->db->get('destaku_pengajuan')->result();
        $this->template->display('admin/home_v', $data);
    }
}
/* Location: ./application/controller/admin/Home.php */
