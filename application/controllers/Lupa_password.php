<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lupa_password extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template_login');
    }

    public function index()
    {
        redirect(site_url('my_error'));
    }

    public function reset($key)
    {
        $check    = $this->db->get_where('destaku_users', array('user_reset' => $key));
        $num_rows = $check->num_rows();
        if ($num_rows > 0) {
            $data['kontak'] = $this->db->get_where('destaku_contact', array('contact_id' => 1))->row();
            $data['detail'] = $this->db->get_where('destaku_users', array('user_reset' => $key))->row();
            $this->template_login->display('admin/lupa_password_v', $data);
        } else {
            redirect(site_url('my_error'));
        }
    }

    public function updatepassword()
    {
        $username = $this->input->post('key', 'true');
        $data     = array(
            'user_password' => sha1(trim(stripHTMLtags($this->input->post('password', 'true')))),
        );

        $this->db->where('user_username', $username);
        $this->db->update('destaku_users', $data);
    }
}
/* Location: ./application/controller/Lupa_password.php */
