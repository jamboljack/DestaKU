<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aktivasi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template_login');
    }

    public function kode($key)
    {
        $check    = $this->db->get_where('silau_users', array('user_key' => $key));
        $num_rows = $check->num_rows();
        if ($num_rows > 0) {
            $data = array(
                'user_status'        => 'Aktif',
                'user_date_aktivasi' => date('Y-m-d'),
                'user_date_update'   => date('Y-m-d H:i:s'),
            );

            $this->db->where('user_key', $key);
            $this->db->update('silau_users', $data);

            $data['aktivasi'] = 'sukses';
        } else {
            $data['aktivasi'] = 'gagal';
        }

        $data['kontak'] = $this->db->get_where('silau_contact', array('contact_id' => 1))->row();
        $this->template_login->display('admin/login_v', $data);
    }
}
/* Location: ./application/controller/Aktivasi.php */
