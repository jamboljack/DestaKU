<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_perusahaan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth_admin();
        $this->load->library('template');
        $this->load->model('admin/jenis_perusahaan_m');
    }

    public function index()
    {
        $this->template->display('admin/master/jenis_perusahaan_v');
    }

    public function data_list()
    {
        $List = $this->jenis_perusahaan_m->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row                 = array();
            $jenis_perusahaan_id = $r->jenis_perusahaan_id;
            $row[]               = '<a title="Edit Data" href="javascript:void(0)" onclick="edit_data(' . "'" . $jenis_perusahaan_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                        <a href="javascript:;" onclick="hapusData(' . $jenis_perusahaan_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->jenis_perusahaan_nama;
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->jenis_perusahaan_m->count_all(),
            "recordsFiltered" => $this->jenis_perusahaan_m->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    private function nama_exists($nama)
    {
        $this->db->where('jenis_perusahaan_nama', $nama);
        $query = $this->db->get('destaku_jenis_perusahaan');
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
        $this->jenis_perusahaan_m->insert_data();
    }

    public function get_data($id)
    {
        $data = $this->db->get_where('destaku_jenis_perusahaan', array('jenis_perusahaan_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedata()
    {
        $this->jenis_perusahaan_m->update_data();
    }

    public function deletedata($id)
    {
        $this->jenis_perusahaan_m->delete_data($id);
    }
}
/* Location: ./application/controller/admin/Jenis_perusahaan.php */
