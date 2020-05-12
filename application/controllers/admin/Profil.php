<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth_login();
        $this->load->library('template');
        $this->load->model('admin/profil_m');
    }

    public function index()
    {
        $data['detail'] = $this->profil_m->select_detail()->row();
        $this->template->display('admin/profil_v', $data);
    }

    public function updatedata()
    {
        if (!empty($_FILES['foto']['name'])) {
            $jam                     = time();
            $username                = $this->session->userdata('username');
            $config['file_name']     = 'Avatar_' . $username . '_' . $jam . '.jpg';
            $config['upload_path']   = './img/icon/';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';
            $config['overwrite']     = true;
            $config['max_size']      = 0;
            $this->load->library('upload');
            $this->upload->initialize($config);
            // Resize
            $configThumb                   = array();
            $configThumb['image_library']  = 'gd2';
            $configThumb['source_image']   = '';
            $configThumb['maintain_ratio'] = true;
            $configThumb['overwrite']      = true;
            $configThumb['width']          = 150;
            $configThumb['height']         = 200;
            $this->load->library('image_lib');

            if (!$this->upload->do_upload('foto')) {
                $response['status'] = 'error';
            } else {
                $upload                      = $this->upload->do_upload('foto');
                $upload_data                 = $this->upload->data();
                $name_array[]                = $upload_data['file_name'];
                $configThumb['source_image'] = $upload_data['full_path'];
                $this->image_lib->initialize($configThumb);
                $this->image_lib->resize();
                $this->profil_m->update_data();
                $response['status'] = 'success';
            }
        } else {
            $this->profil_m->update_data();
            $response['status'] = 'success';
        }

        echo json_encode($response);
    }

    public function changepassword()
    {
        $this->template->display('admin/changepassword_v');
    }

    public function updatepassword()
    {
        $this->profil_m->update_password();
    }
}
/* Location: ./application/controller/admin/Profil.php */
