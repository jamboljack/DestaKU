<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select_detail()
    {
        $username = $this->session->userdata('username');
        $this->db->select('*');
        $this->db->from('destaku_users');
        $this->db->where('user_username', $username);

        return $this->db->get();
    }

    public function update_data()
    {
        $user_username = $this->session->userdata('username');
        if (!empty($_FILES['foto']['name'])) {
            $data = array(
                'user_name'        => strtoupper(stripHTMLtags($this->input->post('name', 'true'))),
                'user_email'       => trim(stripHTMLtags($this->input->post('email', 'true'))),
                'user_phone'       => trim(stripHTMLtags($this->input->post('phone', 'true'))),
                'user_avatar'      => $this->upload->file_name,
                'user_date_update' => date('Y-m-d H:i:s'),
            );
        } else {
            $data = array(
                'user_name'        => strtoupper(stripHTMLtags($this->input->post('name', 'true'))),
                'user_email'       => trim(stripHTMLtags($this->input->post('email', 'true'))),
                'user_phone'       => trim(stripHTMLtags($this->input->post('phone', 'true'))),
                'user_date_update' => date('Y-m-d H:i:s'),
            );
        }

        $this->db->where('user_username', $user_username);
        $this->db->update('destaku_users', $data);
    }

    public function update_password()
    {
        $user_username = $this->session->userdata('username');
        $password      = trim($this->input->post('newpassword', 'true'));

        $data = array(
            'user_password'    => sha1($password),
            'user_date_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('user_username', $user_username);
        $this->db->update('destaku_users', $data);
    }
}
/* Location: ./application/model/admin/Profil_m.php */
