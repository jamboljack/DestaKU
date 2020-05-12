<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitigasi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth_admin();
        $this->load->library('template');
        $this->load->model('admin/mitigasi_m');
    }

    public function index()
    {
        $this->template->display('admin/master/mitigasi_v');
    }

    public function data_list()
    {
        $List = $this->mitigasi_m->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row         = array();
            $mitigasi_id = $r->mitigasi_id;
            $link        = site_url('admin/mitigasi/listpilihan/' . $mitigasi_id);
            $row[]       = '<a title="Edit Data" href="javascript:void(0)" onclick="edit_data(' . "'" . $mitigasi_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                        <a href="javascript:;" onclick="hapusData(' . $mitigasi_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = '<a href="' . $link . '" title="List Pilihan"><i class="flaticon2-list-1"></i></a>';
            $row[]  = $no;
            $row[]  = $r->mitigasi_nama;
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->mitigasi_m->count_all(),
            "recordsFiltered" => $this->mitigasi_m->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    private function nama_exists($nama)
    {
        $this->db->where('mitigasi_nama', $nama);
        $query = $this->db->get('destaku_mitigasi');
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
        $this->mitigasi_m->insert_data();
    }

    public function get_data($id)
    {
        $data = $this->db->get_where('destaku_mitigasi', array('mitigasi_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedata()
    {
        $this->mitigasi_m->update_data();
    }

    public function deletedata($id)
    {
        $this->mitigasi_m->delete_data($id);
    }

    // Pilihan
    public function listpilihan($id)
    {
        $data['detail'] = $this->db->get_where('destaku_mitigasi', array('mitigasi_id' => $id))->row();
        $this->template->display('admin/master/listpilihanmitigasi_v', $data);
    }

    public function data_pilihan_list($id)
    {
        $List = $this->mitigasi_m->get_pilihan_datatables($id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                 = array();
            $mitigasi_pilihan_id = $r->mitigasi_pilihan_id;
            $link                = site_url('admin/mitigasi/listdetail/' . $mitigasi_pilihan_id);
            $row[]               = '<a title="Edit Data" href="javascript:void(0)" onclick="edit_data(' . "'" . $mitigasi_pilihan_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                        <a href="javascript:;" onclick="hapusData(' . $mitigasi_pilihan_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = '<a href="' . $link . '" title="List Detail"><i class="flaticon2-list-1"></i></a>';
            $row[]  = $no;
            $row[]  = $r->mitigasi_pilihan_nama;
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->mitigasi_m->count_pilihan_all($id),
            "recordsFiltered" => $this->mitigasi_m->count_pilihan_filtered($id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedatapilihan()
    {
        $this->mitigasi_m->insert_data_pilihan();
    }

    public function get_data_pilihan($id)
    {
        $data = $this->db->get_where('destaku_mitigasi_pilihan', array('mitigasi_pilihan_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedatapilihan()
    {
        $this->mitigasi_m->update_data_pilihan();
    }

    public function deletedatapilihan($id)
    {
        $this->mitigasi_m->delete_data_pilihan($id);
    }

    // Detail
    public function listdetail($id)
    {
        $data['detail'] = $this->db->get_where('v_mitigasi', array('mitigasi_pilihan_id' => $id))->row();
        $this->template->display('admin/master/listdetailmitigasi_v', $data);
    }

    public function data_detail_list($id)
    {
        $List = $this->mitigasi_m->get_detail_datatables($id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                = array();
            $mitigasi_detail_id = $r->mitigasi_detail_id;
            $row[]              = '<a title="Edit Data" href="javascript:void(0)" onclick="edit_data(' . "'" . $mitigasi_detail_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                        <a href="javascript:;" onclick="hapusData(' . $mitigasi_detail_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->mitigasi_detail_nama;
            $row[]  = ($r->mitigasi_detail_tipe=='P'?'<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--square">PILIHAN</span>':'<span class="kt-badge kt-badge--primary kt-badge--inline kt-badge--square">TANYA</span>');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->mitigasi_m->count_detail_all($id),
            "recordsFiltered" => $this->mitigasi_m->count_detail_filtered($id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedatadetail()
    {
        $this->mitigasi_m->insert_data_detail();
    }

    public function get_data_detail($id)
    {
        $data = $this->db->get_where('destaku_mitigasi_detail', array('mitigasi_detail_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedatadetail()
    {
        $this->mitigasi_m->update_data_detail();
    }

    public function deletedatadetail($id)
    {
        $this->mitigasi_m->delete_data_detail($id);
    }
}
/* Location: ./application/controller/admin/Mitigasi.php */
