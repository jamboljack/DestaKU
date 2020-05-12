<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rtrw extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth_admin();
        $this->load->library('template');
        $this->load->model('admin/rtrw_m');
    }

    public function index()
    {
        $this->template->display('admin/master/rtrw_v');
    }

    public function data_list()
    {
        $List = $this->rtrw_m->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row          = array();
            $rtrw_grup_id = $r->rtrw_grup_id;
            $link         = site_url('admin/rtrw/listdetail/' . $rtrw_grup_id);
            $row[]        = '<a title="Edit Data" href="javascript:void(0)" onclick="edit_data(' . "'" . $rtrw_grup_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                        <a href="javascript:;" onclick="hapusData(' . $rtrw_grup_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = '<a href="' . $link . '" title="List Detail"><i class="flaticon2-list-1"></i></a>';
            $row[]  = $no;
            $row[]  = $r->rtrw_grup_nama;
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->rtrw_m->count_all(),
            "recordsFiltered" => $this->rtrw_m->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    private function nama_exists($nama)
    {
        $this->db->where('rtrw_grup_nama', $nama);
        $query = $this->db->get('destaku_rtrw_grup');
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
        $this->rtrw_m->insert_data();
    }

    public function get_data($id)
    {
        $data = $this->db->get_where('destaku_rtrw_grup', array('rtrw_grup_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedata()
    {
        $this->rtrw_m->update_data();
    }

    public function deletedata($id)
    {
        $this->rtrw_m->delete_data($id);
    }

    public function listdetail($id)
    {
        $data['detail'] = $this->db->get_where('destaku_rtrw_grup', array('rtrw_grup_id' => $id))->row();
        $this->template->display('admin/master/listdetailrtrw_v', $data);
    }

    public function data_detail_list($id)
    {
        $List = $this->rtrw_m->get_detail_datatables($id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row            = array();
            $rtrw_detail_id = $r->rtrw_detail_id;
            $row[]          = '<a title="Edit Data" href="javascript:void(0)" onclick="edit_data(' . "'" . $rtrw_detail_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                        <a href="javascript:;" onclick="hapusData(' . $rtrw_detail_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->rtrw_detail_nama;
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->rtrw_m->count_detail_all($id),
            "recordsFiltered" => $this->rtrw_m->count_detail_filtered($id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedatadetail()
    {
        $this->rtrw_m->insert_data_detail();
    }

    public function get_data_detail($id)
    {
        $data = $this->db->get_where('destaku_rtrw_detail', array('rtrw_detail_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedatadetail()
    {
        $this->rtrw_m->update_data_detail();
    }

    public function deletedatadetail($id)
    {
        $this->rtrw_m->delete_data_detail($id);
    }
}
/* Location: ./application/controller/admin/Rtrw.php */
