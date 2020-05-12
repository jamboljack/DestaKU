<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendidikan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth_admin();
        $this->load->library('template');
        $this->load->model('admin/pendidikan_m');
    }

    public function index()
    {
        $this->template->display('admin/master/pendidikan_v');
    }

    public function data_list()
    {
        $List = $this->pendidikan_m->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row           = array();
            $pendidikan_id = $r->pendidikan_id;
            $row[]         = '<a title="Edit Data" href="javascript:void(0)" onclick="edit_data(' . "'" . $pendidikan_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                        <a href="javascript:;" onclick="hapusData(' . $pendidikan_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->pendidikan_nama;
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pendidikan_m->count_all(),
            "recordsFiltered" => $this->pendidikan_m->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    private function nama_exists($nama)
    {
        $this->db->where('pendidikan_nama', $nama);
        $query = $this->db->get('destaku_pendidikan');
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
        $this->pendidikan_m->insert_data();
    }

    public function get_data($id)
    {
        $data = $this->db->get_where('destaku_pendidikan', array('pendidikan_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedata()
    {
        $this->pendidikan_m->update_data();
    }

    public function deletedata($id)
    {
        $this->pendidikan_m->delete_data($id);
    }
}
/* Location: ./application/controller/admin/Pendidikan.php */
