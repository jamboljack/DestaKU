<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth_admin();
        $this->load->library('template');
        $this->load->model('admin/petugas_m');
    }

    public function index()
    {
        $data['detail'] = $this->petugas_m->select_detail()->row();
        $this->template->display('admin/petugas_v', $data);
    }

    public function updatedata()
    {
        $this->petugas_m->update_data();
    }
}

/* Location: ./application/controller/admin/Petugas.php */
