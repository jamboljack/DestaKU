<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template_login');
        $this->load->model('login_m');
    }

    public function index()
    {
        $session          = $this->session->userdata('logged_in_destaku');
        $data['aktivasi'] = '';
        if ($session == false) {
            $data['kontak'] = $this->db->get_where('destaku_contact', array('contact_id' => 1))->row();
            $this->template_login->display('admin/login_v', $data);
        } else {
            if ($this->session->userdata('level') == 'Admin') {
                redirect(site_url('admin/home'));
            } elseif ($this->session->userdata('level') == 'Member') {
                redirect(site_url('member/home'));
            }
        }
    }

    public function validasi()
    {
        $username     = trim(stripHTMLtags($this->input->post('username', 'true')));
        $password     = trim(stripHTMLtags($this->input->post('password', 'true')));
        $temp_account = $this->login_m->check_user_account($username, sha1($password));
        $num_rows     = $temp_account->num_rows();
        if ($num_rows > 0) {
            $account    = $temp_account->row();
            $array_item = array(
                'username'          => trim($account->user_username),
                'pass'              => $account->user_password,
                'nama'              => strtoupper(trim($account->user_name)),
                'avatar'            => $account->user_avatar,
                'level'             => $account->user_level,
                'logged_in_destaku' => true,
            );

            $this->session->set_userdata($array_item);
            $response = ['status' => 'success'];
        } else {
            $response = ['status' => 'failed', 'msg' => 'Password Anda Salah.'];
        }

        echo json_encode($response);
    }

    private function login_exists($username)
    {
        $this->db->where('user_username', $username);
        $this->db->where('user_status', 'Aktif');
        $query = $this->db->get('destaku_users');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function check_login_exists()
    {
        if (array_key_exists('username', $_POST)) {
            if ($this->login_exists(stripHTMLtags($this->input->post('username', 'true'))) == true) {
                echo json_encode(false);
            } else {
                echo json_encode(true);
            }
        }
    }

    private function user_exists($new_username)
    {
        $this->db->where('user_username', $new_username);
        $query = $this->db->get('destaku_users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function register_user_exists()
    {
        if (array_key_exists('new_username', $_POST)) {
            if ($this->user_exists(stripHTMLtags($this->input->post('new_username', 'true'))) == true) {
                echo json_encode(false);
            } else {
                echo json_encode(true);
            }
        }
    }

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
            if ($this->email_exists(stripHTMLtags($this->input->post('email', 'true'))) == true) {
                echo json_encode(false);
            } else {
                echo json_encode(true);
            }
        }
    }

    public function register()
    {
        $kode_aktivasi = md5(uniqid(rand()));
        $data          = array(
            'user_name'        => strtoupper(trim(stripHTMLtags($this->input->post('name', 'true')))),
            'user_email'       => trim(stripHTMLtags($this->input->post('email', 'true'))),
            'user_username'    => trim(stripHTMLtags($this->input->post('new_username', 'true'))),
            'user_password'    => sha1(trim(stripHTMLtags($this->input->post('register_pass', 'true')))),
            'user_key'         => $kode_aktivasi,
            'user_level'       => 'Member',
            'user_date_create' => date('Y-m-d H:i:s'),
            'user_date_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_users', $data);
        // Email
        $username     = trim(stripHTMLtags($this->input->post('new_username', 'true')));
        $dataKontak   = $this->db->get_where('destaku_meta', array('meta_id' => 1))->row();
        $sender_email = $dataKontak->meta_email;
        $sender_name  = 'SILAU-KAK';
        $name         = strtoupper(trim(stripHTMLtags($this->input->post('name', 'true'))));
        $email        = trim(stripHTMLtags($this->input->post('email', 'true')));
        $subject      = "Pendaftaran Member";
        $message      = "<p>Kepada : " . $name . "<br>Username Anda : " . $username .
        "<br><p>Silahkan Klik Link untuk Aktivasi Akun Anda : <a href=" . base_url('aktivasi/kode/') . $kode_aktivasi . ">Link Aktivasi Anda</a></p><br><br><p>Hormat Kami,<br>Kantor Kecamatan Kota - Kabupaten Kudus</p>";
        $this->load->library('email');
        $this->email->set_mailtype("html");
        $this->email->from($sender_email, $sender_name);
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()) {
            $response = array('status' => 'success', 'msg' => 'Sukses, Silahkan Cek Email Anda untuk Aktivasi.');
        } else {
            $response = array('status' => 'failed', 'msg' => 'Register Berhasil, Proses Pengiriman Email Gagal.');
        }

        // echo $this->email->print_debugger();
        echo json_encode($response);
    }

    private function reset_email_exists($reset_email)
    {
        $this->db->where('user_email', $reset_email);
        $this->db->where('user_status', 'Aktif');
        $query = $this->db->get('destaku_users');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function check_email_exists()
    {
        if (array_key_exists('reset_email', $_POST)) {
            if ($this->reset_email_exists(stripHTMLtags($this->input->post('reset_email', 'true'))) == true) {
                echo json_encode(false);
            } else {
                echo json_encode(true);
            }
        }
    }

    public function reset()
    {
        $kode_reset = md5(uniqid(rand()));
        $email      = trim(stripHTMLtags($this->input->post('reset_email', 'true')));
        $data       = array(
            'user_reset' => $kode_reset,
        );

        $this->db->where('user_email', $email);
        $this->db->update('destaku_users', $data);

        // Kirim Email
        $dataKontak   = $this->db->get_where('destaku_meta', array('meta_id' => 1))->row();
        $sender_email = $dataKontak->meta_email;
        $sender_name  = 'SILAU-KAK';
        $subject      = "Reset Password";
        $message      = "<p>Silahkan Klik Link untuk Reset Password Anda : <a href=" . base_url('lupa-password/reset/') . $kode_reset . ">Link Reset Password</a></p><br><br><p>Hormat Kami,<br>Kantor Kecamatan Kota - Kabupaten Kudus</p>";
        $this->load->library('email');
        $this->email->set_mailtype("html");
        $this->email->from($sender_email, $sender_name);
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()) {
            $response = array('status' => 'success', 'msg' => 'Sukses, Email Reset telah dikirimkan ke alamat EMAIL ANDA.');
        } else {
            $response = array('status' => 'failed', 'msg' => 'Register Sukses, Proses Pengiriman Email Gagal.');
        }

        echo json_encode($response);
    }

    public function logout()
    {
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . 'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-chace');
        $this->session->sess_destroy();
        redirect(base_url());
    }
}

/* Location: ./application/controller/Login.php */
