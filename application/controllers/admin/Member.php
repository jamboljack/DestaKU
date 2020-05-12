<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth_admin();
        $this->load->library('template');
        $this->load->model('admin/member_m');
    }

    public function index()
    {
        $this->template->display('admin/member/view');
    }

    public function data_list()
    {
        $List = $this->member_m->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row   = array();
            $link  = site_url('admin/member/editdata/' . $r->user_username);
            $row[] = '<a href="' . $link . '" title="Edit Data"><i class="flaticon2-edit"></i></a>';
            $row[] = $no;
            $row[] = $r->user_username;
            $row[] = $r->user_name;
            $row[] = $r->nama_kec;
            $row[] = $r->nama_kel;
            $row[] = $r->user_email;
            $row[] = $r->user_level;
            if ($r->user_status == 'Aktif') {
                $row[] = '<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--square">Aktif</span>';
            } else {
                $row[] = '<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--square">Tidak Aktif</span>';
            }

            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->member_m->count_all(),
            "recordsFiltered" => $this->member_m->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function select_desa_change($no_kec, $no_kab, $no_prov)
    {
        $query = $this->db->order_by('nama_kel', 'asc')->get_where('setup_kel', array('no_kec' => $no_kec, 'no_kab' => $no_kab, 'no_prov' => $no_prov));
        $data  = "<option value=''> - Pilih Desa/Kelurahan - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->no_kel . "'>" . strtoupper($value->nama_kel) . "</option>";
        }
        echo $data;
    }

    public function select_desa_edit($no_kel, $no_kec, $no_kab, $no_prov)
    {
        $query = $this->db->order_by('nama_kel', 'asc')->get_where('setup_kel', array('no_kec' => $no_kec, 'no_kab' => $no_kab, 'no_prov' => $no_prov));
        $data  = "<option value=''> - Pilih Desa/Kelurahan - </option>";
        foreach ($query->result() as $value) {
            if ($value->no_kel == $no_kel) {
                $data .= "<option value='" . $value->no_kel . "' selected>" . strtoupper($value->nama_kel) . "</option>";
            } else {
                $data .= "<option value='" . $value->no_kel . "'>" . strtoupper($value->nama_kel) . "</option>";
            }
        }
        echo $data;
    }

    public function adddata()
    {
        $data['listKecamatan'] = $this->db->order_by('nama_kec', 'asc')->get('setup_kec')->result();
        $this->template->display('admin/member/add', $data);
    }

    // Username
    private function user_exists($username)
    {
        $this->db->where('user_username', $username);
        $query = $this->db->get('destaku_users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function register_user_exists()
    {
        if (array_key_exists('username', $_POST)) {
            if ($this->user_exists($this->input->post('username', 'true')) == true) {
                echo json_encode(false);
            } else {
                echo json_encode(true);
            }
        }
    }

    // Email
    private function email_exists($email)
    {
        $this->db->where('user_email', $email);
        $query = $this->db->get('destaku_users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function register_email_exists()
    {
        if (array_key_exists('email', $_POST)) {
            if ($this->email_exists($this->input->post('email', 'true')) == true) {
                echo json_encode(false);
            } else {
                echo json_encode(true);
            }
        }
    }

    // No. HP
    private function hp_exists($no_hp)
    {
        $this->db->where('user_phone', $no_hp);
        $query = $this->db->get('destaku_users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function register_hp_exists()
    {
        if (array_key_exists('no_hp', $_POST)) {
            if ($this->hp_exists($this->input->post('no_hp', 'true')) == true) {
                echo json_encode(false);
            } else {
                echo json_encode(true);
            }
        }
    }

    public function savedata()
    {
        $this->member_m->insert_data();
    }

    public function editdata($user_username)
    {
        $data['listKecamatan'] = $this->db->order_by('nama_kec', 'asc')->get('setup_kec')->result();
        $data['detail']        = $this->member_m->select_by_id($user_username)->row();
        $this->template->display('admin/member/edit', $data);
    }

    public function updatedata()
    {
        $this->member_m->update_data();
    }
}
/* Location: ./application/controller/admin/Member.php */
