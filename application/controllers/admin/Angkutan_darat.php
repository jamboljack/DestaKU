<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Angkutan_darat extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth_admin();
        $this->load->library('template');
        $this->load->model('admin/angkutan_darat_m');
    }

    public function index()
    {
        $this->template->display('admin/master/angkutan_darat_v');
    }

    public function data_list()
    {
        $List = $this->angkutan_darat_m->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row               = array();
            $angkutan_darat_id = $r->angkutan_darat_id;
            $row[]             = '<a title="Edit Data" href="javascript:void(0)" onclick="edit_data(' . "'" . $angkutan_darat_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                        <a href="javascript:;" onclick="hapusData(' . $angkutan_darat_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->angkutan_darat_nama;
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->angkutan_darat_m->count_all(),
            "recordsFiltered" => $this->angkutan_darat_m->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    private function nama_exists($nama)
    {
        $this->db->where('angkutan_darat_nama', $nama);
        $query = $this->db->get('destaku_angkutan_darat');
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
        $this->angkutan_darat_m->insert_data();
    }

    public function get_data($id)
    {
        $data = $this->db->get_where('destaku_angkutan_darat', array('angkutan_darat_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedata()
    {
        $this->angkutan_darat_m->update_data();
    }

    public function deletedata($id)
    {
        $this->angkutan_darat_m->delete_data($id);
    }
}
/* Location: ./application/controller/admin/Angkutan_darat.php */
