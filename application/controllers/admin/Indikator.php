<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Indikator extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth_admin();
        $this->load->library('template');
        $this->load->model('admin/indikator_m');
    }

    public function index()
    {
        $this->template->display('admin/master/indikator_v');
    }

    public function data_list()
    {
        $List = $this->indikator_m->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row          = array();
            $indikator_id = $r->indikator_id;
            $link         = site_url('admin/indikator/listdetail/' . $indikator_id);
            $row[]        = '<a title="Edit Data" href="javascript:void(0)" onclick="edit_data(' . "'" . $indikator_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                        <a href="javascript:;" onclick="hapusData(' . $indikator_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = '<a href="' . $link . '" title="List Detail"><i class="flaticon2-list-1"></i></a>';
            $row[]  = $no;
            $row[]  = $r->indikator_no;
            $row[]  = $r->indikator_nama;
            $row[]  = ($r->indikator_status=='A'?'<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--square">AKTIF</span>':'<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--square">TIDAK AKTIF</span>');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->indikator_m->count_all(),
            "recordsFiltered" => $this->indikator_m->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    private function nama_exists($nama)
    {
        $this->db->where('indikator_nama', $nama);
        $query = $this->db->get('destaku_indikator');
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
        $this->indikator_m->insert_data();
    }

    public function get_data($id)
    {
        $data = $this->db->get_where('destaku_indikator', array('indikator_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedata()
    {
        $this->indikator_m->update_data();
    }

    public function deletedata($id)
    {
        $this->indikator_m->delete_data($id);
    }

    // Detail
    public function listdetail($id)
    {
        $data['detail'] = $this->db->get_where('destaku_indikator', array('indikator_id' => $id))->row();
        $this->template->display('admin/master/listdetailindikator_v', $data);
    }

    public function data_detail_list($id)
    {
        $List = $this->indikator_m->get_detail_datatables($id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                 = array();
            $indikator_detail_id = $r->indikator_detail_id;
            $row[]               = '<a title="Edit Data" href="javascript:void(0)" onclick="edit_data(' . "'" . $indikator_detail_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                        <a href="javascript:;" onclick="hapusData(' . $indikator_detail_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->indikator_detail_nama;
            $row[]  = ($r->indikator_detail_status=='A'?'<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--square">AKTIF</span>':'<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--square">TIDAK AKTIF</span>');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->indikator_m->count_detail_all($id),
            "recordsFiltered" => $this->indikator_m->count_detail_filtered($id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedatadetail()
    {
        $this->indikator_m->insert_data_detail();
    }

    public function get_data_detail($id)
    {
        $data = $this->db->get_where('destaku_indikator_detail', array('indikator_detail_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedatadetail()
    {
        $this->indikator_m->update_data_detail();
    }

    public function deletedatadetail($id)
    {
        $this->indikator_m->delete_data_detail($id);
    }
}
/* Location: ./application/controller/admin/Indikator.php */
