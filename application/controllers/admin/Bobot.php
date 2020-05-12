<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bobot extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth_admin();
        $this->load->library('template');
        $this->load->model('admin/bobot_m');
    }

    public function index()
    {
        $this->template->display('admin/master/bobot_v');
    }

    public function data_list()
    {
        $List = $this->bobot_m->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row      = array();
            $bobot_id = $r->bobot_id;
            $row[]    = '<a title="Edit Data" href="javascript:void(0)" onclick="edit_data(' . "'" . $bobot_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                        <a href="javascript:;" onclick="hapusData(' . $bobot_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->bobot_nama;
            $row[]  = number_format($r->bobot_minimal, 0, '', ',');
            $row[]  = number_format($r->bobot_maksimal, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->bobot_m->count_all(),
            "recordsFiltered" => $this->bobot_m->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    private function nama_exists($nama)
    {
        $this->db->where('bobot_nama', $nama);
        $query = $this->db->get('destaku_bobot');
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
        $this->bobot_m->insert_data();
    }

    public function get_data($id)
    {
        $data = $this->db->get_where('destaku_bobot', array('bobot_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedata()
    {
        $this->bobot_m->update_data();
    }

    public function deletedata($id)
    {
        $this->bobot_m->delete_data($id);
    }
}
/* Location: ./application/controller/admin/Bobot.php */
