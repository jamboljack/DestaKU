<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tenaga_kerja extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth_admin();
        $this->load->library('template');
        $this->load->model('admin/tenaga_kerja_m');
    }

    public function index()
    {
        $this->template->display('admin/master/tenaga_kerja_v');
    }

    public function data_list()
    {
        $List = $this->tenaga_kerja_m->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row             = array();
            $tenaga_kerja_id = $r->tenaga_kerja_id;
            $row[]           = '<a title="Edit Data" href="javascript:void(0)" onclick="edit_data(' . "'" . $tenaga_kerja_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                        <a href="javascript:;" onclick="hapusData(' . $tenaga_kerja_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->tenaga_kerja_nama;
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->tenaga_kerja_m->count_all(),
            "recordsFiltered" => $this->tenaga_kerja_m->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    private function nama_exists($nama)
    {
        $this->db->where('tenaga_kerja_nama', $nama);
        $query = $this->db->get('destaku_tenaga_kerja');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function register_nama_exists()
    {
        if (array_key_exists('nama', $_POST)) {
            if ($this->nama_exists(stripHTMLtags($this->input->post('nama', 'true'))) == true) {
                echo json_encode(false);
            } else {
                echo json_encode(true);
            }
        }
    }

    public function savedata()
    {
        $this->tenaga_kerja_m->insert_data();
    }

    public function get_data($id)
    {
        $data = $this->db->get_where('destaku_tenaga_kerja', array('tenaga_kerja_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedata()
    {
        $this->tenaga_kerja_m->update_data();
    }

    public function deletedata($id)
    {
        $this->tenaga_kerja_m->delete_data($id);
    }
}
/* Location: ./application/controller/admin/Tenaga_kerja.php */
