<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth_member();
        $this->load->library('template');
        $this->load->model('member/pengajuan_m');
    }

    public function index()
    {
        $this->template->display('member/pengajuan/view');
    }

    public function data_list()
    {
        $List = $this->pengajuan_m->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row          = array();
            $pengajuan_id = $r->pengajuan_id;
            $link         = site_url('member/pengajuan/editdata/' . $pengajuan_id);
            $print        = site_url('member/pengajuan/printskor/' . $pengajuan_id);
            if ($r->pengajuan_status == 'D') {
                $kirim = '<a href="javascript:;" onclick="kirimData(' . $pengajuan_id . ')" title="Kirim Data"><i class="flaticon2-checkmark"></i></a>';
                $hapus = '<a href="javascript:;" onclick="hapusData(' . $pengajuan_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            } elseif ($r->pengajuan_status == 'N') {
                $kirim = '<a href="' . $print . '" title="Print Hasil Penilaian" target="_blank"><i class="flaticon-technology"></i></a>';
                $hapus = '';
            } else {
                $kirim = '';
                $hapus = '';
            }
            $row[] = '<a href="' . $link . '" title="Edit Data"><i class="flaticon2-edit"></i></a> ' . $kirim . ' ' . $hapus;
            $row[] = $no;
            $row[] = date('Y', strtotime($r->pengajuan_tanggal));
            $row[] = date('d-m-Y', strtotime($r->pengajuan_tanggal));
            $row[] = $r->pengajuan_no_pendaftaran;
            $row[] = $r->nama_kec;
            $row[] = $r->nama_kel;
            $row[] = $r->pengajuan_nilai;
            $row[] = $r->bobot_nama;
            switch ($r->pengajuan_status) {
                case 'B':
                    $status = '<span class="kt-badge kt-badge--primary kt-badge--inline kt-badge--square">BARU</span>';
                    break;
                case 'K':
                    $status = '<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--square">KONFIRMASI</span>';
                    break;
                case 'N':
                    $status = '<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--square">PENILAIAN</span>';
                    break;
                default:
                    $status = '<span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--square">DRAFT</span>';
                    break;
            }
            $row[]  = $status;
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_all(),
            "recordsFiltered" => $this->pengajuan_m->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function adddata()
    {
        $username         = $this->session->userdata('username');
        $data['dataArea'] = $this->db->get_where('v_member', array('user_username' => $username))->row();
        $this->template->display('member/pengajuan/add', $data);
    }

    public function savedata()
    {
        $this->pengajuan_m->insert_data();
    }

    public function editdata($id)
    {
        // Wisatawan
        $checkWisata = $this->db->get_where('destaku_pengajuan_wisatawan', array('pengajuan_id' => $id));
        $hasilWisata = $checkWisata->num_rows();
        if ($hasilWisata == 0) {
            $dataWisata = array(
                'pengajuan_id'               => $id,
                'pengajuan_wisatawan_update' => date('Y-m-d H:i:s'),
            );

            $this->db->insert('destaku_pengajuan_wisatawan', $dataWisata);
        }
        // RTRW
        $checkRTRW = $this->db->get_where('destaku_pengajuan_rtrw', array('pengajuan_id' => $id));
        $hasilRTRW = $checkRTRW->num_rows();
        if ($hasilRTRW == 0) {
            $listRTRW = $this->db->order_by('rtrw_detail_id', 'asc')->get('destaku_rtrw_detail')->result();
            foreach ($listRTRW as $r) {
                $dataRTRW = array(
                    'pengajuan_id'          => $id,
                    'rtrw_detail_id'        => $r->rtrw_detail_id,
                    'pengajuan_rtrw_update' => date('Y-m-d H:i:s'),
                );

                $this->db->insert('destaku_pengajuan_rtrw', $dataRTRW);
            }
        }
        // Mitigasi Bencana
        $checkMitigasi = $this->db->get_where('destaku_pengajuan_mitigasi', array('pengajuan_id' => $id));
        $hasilMitigasi = $checkMitigasi->num_rows();
        if ($hasilMitigasi == 0) {
            $listDetailMitigasi = $this->db->order_by('mitigasi_detail_id', 'asc')->get('destaku_mitigasi_detail')->result();
            foreach ($listDetailMitigasi as $r) {
                $dataMitigasi = array(
                    'pengajuan_id'              => $id,
                    'mitigasi_detail_id'        => $r->mitigasi_detail_id,
                    'pengajuan_mitigasi_update' => date('Y-m-d H:i:s'),
                );

                $this->db->insert('destaku_pengajuan_mitigasi', $dataMitigasi);
            }
        }
        // Berkas
        $listBerkas = $this->db->order_by('berkas_id', 'asc')->get('destaku_berkas')->result();
        foreach ($listBerkas as $r) {
            $berkas_id   = $r->berkas_id;
            $checkBerkas = $this->db->get_where('destaku_pengajuan_berkas', array('pengajuan_id' => $id, 'berkas_id' => $berkas_id));
            $hasilBerkas = $checkBerkas->num_rows();
            if ($hasilBerkas == 0) {
                $dataBerkas = array(
                    'pengajuan_id'            => $id,
                    'berkas_id'               => $r->berkas_id,
                    'pengajuan_berkas_update' => date('Y-m-d H:i:s'),
                );

                $this->db->insert('destaku_pengajuan_berkas', $dataBerkas);
            }
        }

        $data['listTenagaKerja']     = $this->db->order_by('tenaga_kerja_nama', 'asc')->get('destaku_tenaga_kerja')->result();
        $data['listPendidikan']      = $this->db->order_by('pendidikan_nama', 'asc')->get('destaku_pendidikan')->result();
        $data['listHiburan']         = $this->db->order_by('sarana_hiburan_nama', 'asc')->get('destaku_sarana_hiburan')->result();
        $data['listOlahraga']        = $this->db->order_by('sarana_olahraga_nama', 'asc')->get('destaku_sarana_olahraga')->result();
        $data['listKesehatan']       = $this->db->order_by('kesehatan_nama', 'asc')->get('destaku_kesehatan')->result();
        $data['listIbadah']          = $this->db->order_by('tempat_ibadah_nama', 'asc')->get('destaku_tempat_ibadah')->result();
        $data['listPertanian']       = $this->db->order_by('pertanian_nama', 'asc')->get('destaku_pertanian')->result();
        $data['listJenisPerusahaan'] = $this->db->order_by('jenis_perusahaan_nama', 'asc')->get('destaku_jenis_perusahaan')->result();
        $data['listAngkutan']        = $this->db->order_by('angkutan_darat_nama', 'asc')->get('destaku_angkutan_darat')->result();
        $data['listTelekomunikasi']  = $this->db->order_by('telekomunikasi_nama', 'asc')->get('destaku_telekomunikasi')->result();
        $data['listPerdagangan']     = $this->db->order_by('perdagangan_nama', 'asc')->get('destaku_perdagangan')->result();
        $data['listRTRWGrup']        = $this->db->order_by('rtrw_grup_nama', 'asc')->get('destaku_rtrw_grup')->result();
        $data['listMitigasi']        = $this->db->order_by('mitigasi_nama', 'asc')->get('destaku_mitigasi')->result();
        $data['detail']              = $this->db->get_where('v_pengajuan', array('pengajuan_id' => $id))->row();
        $data['detailwisatawan']     = $this->db->get_where('destaku_pengajuan_wisatawan', array('pengajuan_id' => $id))->row();
        $this->template->display('member/pengajuan/edit', $data);
    }

    public function updatedata()
    {
        $this->pengajuan_m->update_data();
    }

    // public function get_data_profil($id)
    // {
    //     $data = $this->db->get_where('destaku_pengajuan', array('pengajuan_id' => $id))->row();
    //     echo json_encode($data);
    // }

    // public function get_data_peta($id)
    // {
    //     $data['detail'] = $this->db->get_where('destaku_pengajuan', array('pengajuan_id' => $id))->row();
    //     $this->load->view('viewpeta_v', $data);
    // }

    // public function get_data_proposal($id)
    // {
    //     $data['detail'] = $this->db->get_where('destaku_pengajuan', array('pengajuan_id' => $id))->row();
    //     $this->load->view('viewproposal_v', $data);
    // }

    public function updatedatawisatawan()
    {
        $this->pengajuan_m->update_data_wisatawan();
    }

    public function get_data_wisatawan($id)
    {
        $data = $this->db->get_where('destaku_pengajuan_wisatawan', array('pengajuan_wisatawan_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedataproposal()
    {
        $jam                     = time();
        $username                = $this->session->userdata('username');
        $config['file_name']     = 'Proposal_' . $username . '_' . $jam . '.pdf';
        $config['upload_path']   = './dokumen/';
        $config['allowed_types'] = 'pdf';
        $config['overwrite']     = true;
        $config['max_size']      = 0;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file_proposal')) {
            $response['status'] = 'error';
        } else {
            $this->pengajuan_m->update_data_proposal();
            $response['status'] = 'success';
        }

        echo json_encode($response);
    }

    public function deletedata($id)
    {
        $this->pengajuan_m->delete_data($id);
    }

    public function kirimdata($id)
    {
        $data = array(
            'pengajuan_status' => 'B',
            'pengajuan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_id', $id);
        $this->db->update('destaku_pengajuan', $data);
    }

    // Tenaga Kerja
    public function data_tenaga_kerja_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_tenaga_kerja_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                       = array();
            $pengajuan_tenaga_kerja_id = $r->pengajuan_tenaga_kerja_id;
            $row[]                     = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataTenagaKerja(' . "'" . $pengajuan_tenaga_kerja_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                            <a href="javascript:;" onclick="hapusDataTenagaKerja(' . $pengajuan_tenaga_kerja_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->tenaga_kerja_nama;
            $row[]  = number_format($r->pengajuan_tenaga_kerja_jumlah, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_tenaga_kerja_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_tenaga_kerja_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedatatenagakerja()
    {
        $this->pengajuan_m->insert_data_tenaga_kerja();
    }

    public function get_data_tenaga_kerja($id)
    {
        $data = $this->db->get_where('v_tenaga_kerja', array('pengajuan_tenaga_kerja_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedatatenagakerja()
    {
        $this->pengajuan_m->update_data_tenaga_kerja();
    }

    public function deletedatatenagakerja($id)
    {
        $this->pengajuan_m->delete_data_tenaga_kerja($id);
    }

    // Pendidikan
    public function data_pendidikan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_pendidikan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                     = array();
            $pengajuan_pendidikan_id = $r->pengajuan_pendidikan_id;
            $row[]                   = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataPendidikan(' . "'" . $pengajuan_pendidikan_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                        <a href="javascript:;" onclick="hapusDataPendidikan(' . $pengajuan_pendidikan_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->pendidikan_nama;
            $row[]  = number_format($r->pengajuan_pendidikan_sarana, 0, '', ',');
            $row[]  = number_format($r->pengajuan_pendidikan_siswa, 0, '', ',');
            $row[]  = number_format($r->pengajuan_pendidikan_guru, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_pendidikan_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_pendidikan_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedatapendidikan()
    {
        $this->pengajuan_m->insert_data_pendidikan();
    }

    public function get_data_pendidikan($id)
    {
        $data = $this->db->get_where('v_pendidikan', array('pengajuan_pendidikan_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedatapendidikan()
    {
        $this->pengajuan_m->update_data_pendidikan();
    }

    public function deletedatapendidikan($id)
    {
        $this->pengajuan_m->delete_data_pendidikan($id);
    }

    // Hiburan
    public function data_hiburan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_hiburan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                  = array();
            $pengajuan_hiburan_id = $r->pengajuan_hiburan_id;
            $row[]                = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataHiburan(' . "'" . $pengajuan_hiburan_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                        <a href="javascript:;" onclick="hapusDataHiburan(' . $pengajuan_hiburan_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->sarana_hiburan_nama;
            $row[]  = number_format($r->pengajuan_hiburan_jumlah, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_hiburan_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_hiburan_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedatahiburan()
    {
        $this->pengajuan_m->insert_data_hiburan();
    }

    public function get_data_hiburan($id)
    {
        $data = $this->db->get_where('v_hiburan', array('pengajuan_hiburan_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedatahiburan()
    {
        $this->pengajuan_m->update_data_hiburan();
    }

    public function deletedatahiburan($id)
    {
        $this->pengajuan_m->delete_data_hiburan($id);
    }

    // Olahraga
    public function data_olahraga_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_olahraga_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                   = array();
            $pengajuan_olahraga_id = $r->pengajuan_olahraga_id;
            $row[]                 = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataOlahraga(' . "'" . $pengajuan_olahraga_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                    <a href="javascript:;" onclick="hapusDataOlahraga(' . $pengajuan_olahraga_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->sarana_olahraga_nama;
            $row[]  = number_format($r->pengajuan_olahraga_jumlah, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_olahraga_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_olahraga_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedataolahraga()
    {
        $this->pengajuan_m->insert_data_olahraga();
    }

    public function get_data_olahraga($id)
    {
        $data = $this->db->get_where('v_olahraga', array('pengajuan_olahraga_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedataolahraga()
    {
        $this->pengajuan_m->update_data_olahraga();
    }

    public function deletedataolahraga($id)
    {
        $this->pengajuan_m->delete_data_olahraga($id);
    }

    // Kesehatan
    public function data_kesehatan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_kesehatan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                    = array();
            $pengajuan_kesehatan_id = $r->pengajuan_kesehatan_id;
            $row[]                  = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataKesehatan(' . "'" . $pengajuan_kesehatan_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                    <a href="javascript:;" onclick="hapusDataKesehatan(' . $pengajuan_kesehatan_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->kesehatan_nama;
            $row[]  = number_format($r->pengajuan_kesehatan_jumlah, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_kesehatan_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_kesehatan_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedatakesehatan()
    {
        $this->pengajuan_m->insert_data_kesehatan();
    }

    public function get_data_kesehatan($id)
    {
        $data = $this->db->get_where('v_kesehatan', array('pengajuan_kesehatan_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedatakesehatan()
    {
        $this->pengajuan_m->update_data_kesehatan();
    }

    public function deletedatakesehatan($id)
    {
        $this->pengajuan_m->delete_data_kesehatan($id);
    }

    // Ibadah
    public function data_ibadah_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_ibadah_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                 = array();
            $pengajuan_ibadah_id = $r->pengajuan_ibadah_id;
            $row[]               = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataIbadah(' . "'" . $pengajuan_ibadah_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                    <a href="javascript:;" onclick="hapusDataIbadah(' . $pengajuan_ibadah_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->tempat_ibadah_nama;
            $row[]  = number_format($r->pengajuan_ibadah_jumlah, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_ibadah_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_ibadah_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedataibadah()
    {
        $this->pengajuan_m->insert_data_ibadah();
    }

    public function get_data_ibadah($id)
    {
        $data = $this->db->get_where('v_ibadah', array('pengajuan_ibadah_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedataibadah()
    {
        $this->pengajuan_m->update_data_ibadah();
    }

    public function deletedataibadah($id)
    {
        $this->pengajuan_m->delete_data_ibadah($id);
    }

    // Pertanian
    public function data_pertanian_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_pertanian_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                    = array();
            $pengajuan_pertanian_id = $r->pengajuan_pertanian_id;
            $row[]                  = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataPertanian(' . "'" . $pengajuan_pertanian_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                    <a href="javascript:;" onclick="hapusDataPertanian(' . $pengajuan_pertanian_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->pertanian_nama;
            $row[]  = number_format($r->pengajuan_pertanian_panen, 3, '.', ',');
            $row[]  = number_format($r->pengajuan_pertanian_produksi, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_pertanian_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_pertanian_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedatapertanian()
    {
        $this->pengajuan_m->insert_data_pertanian();
    }

    public function get_data_pertanian($id)
    {
        $data = $this->db->get_where('v_pertanian', array('pengajuan_pertanian_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedatapertanian()
    {
        $this->pengajuan_m->update_data_pertanian();
    }

    public function deletedatapertanian($id)
    {
        $this->pengajuan_m->delete_data_pertanian($id);
    }

    // Palawija
    public function data_palawija_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_palawija_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                   = array();
            $pengajuan_palawija_id = $r->pengajuan_palawija_id;
            $row[]                 = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataPalawija(' . "'" . $pengajuan_palawija_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                    <a href="javascript:;" onclick="hapusDataPalawija(' . $pengajuan_palawija_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->pengajuan_palawija_nama;
            $row[]  = number_format($r->pengajuan_palawija_jumlah, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_palawija_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_palawija_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedatapalawija()
    {
        $this->pengajuan_m->insert_data_palawija();
    }

    public function get_data_palawija($id)
    {
        $data = $this->db->get_where('destaku_pengajuan_palawija', array('pengajuan_palawija_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedatapalawija()
    {
        $this->pengajuan_m->update_data_palawija();
    }

    public function deletedatapalawija($id)
    {
        $this->pengajuan_m->delete_data_palawija($id);
    }

    // Perkebunan
    public function data_perkebunan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_perkebunan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                     = array();
            $pengajuan_perkebunan_id = $r->pengajuan_perkebunan_id;
            $row[]                   = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataPerkebunan(' . "'" . $pengajuan_perkebunan_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                    <a href="javascript:;" onclick="hapusDataPerkebunan(' . $pengajuan_perkebunan_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->pengajuan_perkebunan_nama;
            $row[]  = number_format($r->pengajuan_perkebunan_jumlah, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_perkebunan_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_perkebunan_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedataperkebunan()
    {
        $this->pengajuan_m->insert_data_perkebunan();
    }

    public function get_data_perkebunan($id)
    {
        $data = $this->db->get_where('destaku_pengajuan_perkebunan', array('pengajuan_perkebunan_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedataperkebunan()
    {
        $this->pengajuan_m->update_data_perkebunan();
    }

    public function deletedataperkebunan($id)
    {
        $this->pengajuan_m->delete_data_perkebunan($id);
    }

    // Peternakan
    public function data_peternakan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_peternakan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                     = array();
            $pengajuan_peternakan_id = $r->pengajuan_peternakan_id;
            $row[]                   = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataPeternakan(' . "'" . $pengajuan_peternakan_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                    <a href="javascript:;" onclick="hapusDataPeternakan(' . $pengajuan_peternakan_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->pengajuan_peternakan_nama;
            $row[]  = number_format($r->pengajuan_peternakan_jumlah, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_peternakan_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_peternakan_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedatapeternakan()
    {
        $this->pengajuan_m->insert_data_peternakan();
    }

    public function get_data_peternakan($id)
    {
        $data = $this->db->get_where('destaku_pengajuan_peternakan', array('pengajuan_peternakan_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedatapeternakan()
    {
        $this->pengajuan_m->update_data_peternakan();
    }

    public function deletedatapeternakan($id)
    {
        $this->pengajuan_m->delete_data_peternakan($id);
    }

    // Perikanan
    public function data_perikanan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_perikanan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                    = array();
            $pengajuan_perikanan_id = $r->pengajuan_perikanan_id;
            $row[]                  = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataPerikanan(' . "'" . $pengajuan_perikanan_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                    <a href="javascript:;" onclick="hapusDataPerikanan(' . $pengajuan_perikanan_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->pengajuan_perikanan_nama;
            $row[]  = number_format($r->pengajuan_perikanan_jumlah, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_perikanan_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_perikanan_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedataperikanan()
    {
        $this->pengajuan_m->insert_data_perikanan();
    }

    public function get_data_perikanan($id)
    {
        $data = $this->db->get_where('destaku_pengajuan_perikanan', array('pengajuan_perikanan_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedataperikanan()
    {
        $this->pengajuan_m->update_data_perikanan();
    }

    public function deletedataperikanan($id)
    {
        $this->pengajuan_m->delete_data_perikanan($id);
    }

    // Industri
    public function data_industri_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_industri_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                   = array();
            $pengajuan_industri_id = $r->pengajuan_industri_id;
            $row[]                 = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataIndustri(' . "'" . $pengajuan_industri_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                    <a href="javascript:;" onclick="hapusDataIndustri(' . $pengajuan_industri_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->jenis_perusahaan_nama;
            $row[]  = number_format($r->pengajuan_industri_jumlah, 0, '', ',');
            $row[]  = number_format($r->pengajuan_industri_orang, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_industri_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_industri_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedataindustri()
    {
        $this->pengajuan_m->insert_data_industri();
    }

    public function get_data_industri($id)
    {
        $data = $this->db->get_where('destaku_pengajuan_industri', array('pengajuan_industri_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedataindustri()
    {
        $this->pengajuan_m->update_data_industri();
    }

    public function deletedataindustri($id)
    {
        $this->pengajuan_m->delete_data_industri($id);
    }

    // Air
    public function data_air_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_air_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row              = array();
            $pengajuan_air_id = $r->pengajuan_air_id;
            $row[]            = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataAir(' . "'" . $pengajuan_air_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                    <a href="javascript:;" onclick="hapusDataAir(' . $pengajuan_air_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->pengajuan_air_nama;
            $row[]  = number_format($r->pengajuan_air_jumlah, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_air_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_air_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedataair()
    {
        $this->pengajuan_m->insert_data_air();
    }

    public function get_data_air($id)
    {
        $data = $this->db->get_where('destaku_pengajuan_air', array('pengajuan_air_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedataair()
    {
        $this->pengajuan_m->update_data_air();
    }

    public function deletedataair($id)
    {
        $this->pengajuan_m->delete_data_air($id);
    }

    // Jalan
    public function data_jalan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_jalan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                = array();
            $pengajuan_jalan_id = $r->pengajuan_jalan_id;
            $row[]              = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataJalan(' . "'" . $pengajuan_jalan_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                    <a href="javascript:;" onclick="hapusDataJalan(' . $pengajuan_jalan_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->pengajuan_jalan_nama;
            $row[]  = number_format($r->pengajuan_jalan_panjang, 0, '', ',');
            $row[]  = number_format($r->pengajuan_jalan_lebar, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_jalan_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_jalan_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedatajalan()
    {
        $this->pengajuan_m->insert_data_jalan();
    }

    public function get_data_jalan($id)
    {
        $data = $this->db->get_where('destaku_pengajuan_jalan', array('pengajuan_jalan_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedatajalan()
    {
        $this->pengajuan_m->update_data_jalan();
    }

    public function deletedatajalan($id)
    {
        $this->pengajuan_m->delete_data_jalan($id);
    }

    // Angkutan
    public function data_angkutan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_angkutan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                   = array();
            $pengajuan_angkutan_id = $r->pengajuan_angkutan_id;
            $row[]                 = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataAngkutan(' . "'" . $pengajuan_angkutan_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                    <a href="javascript:;" onclick="hapusDataAngkutan(' . $pengajuan_angkutan_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->angkutan_darat_nama;
            $row[]  = number_format($r->pengajuan_angkutan_jumlah, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_angkutan_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_angkutan_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedataangkutan()
    {
        $this->pengajuan_m->insert_data_angkutan();
    }

    public function get_data_angkutan($id)
    {
        $data = $this->db->get_where('destaku_pengajuan_angkutan', array('pengajuan_angkutan_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedataangkutan()
    {
        $this->pengajuan_m->update_data_angkutan();
    }

    public function deletedataangkutan($id)
    {
        $this->pengajuan_m->delete_data_angkutan($id);
    }

    // Telekomunikasi
    public function data_telekomunikasi_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_telekomunikasi_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                         = array();
            $pengajuan_telekomunikasi_id = $r->pengajuan_telekomunikasi_id;
            $row[]                       = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataTelekomunikasi(' . "'" . $pengajuan_telekomunikasi_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                    <a href="javascript:;" onclick="hapusDataTelekomunikasi(' . $pengajuan_telekomunikasi_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->telekomunikasi_nama;
            $row[]  = number_format($r->pengajuan_telekomunikasi_jumlah, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_telekomunikasi_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_telekomunikasi_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedatatelekomunikasi()
    {
        $this->pengajuan_m->insert_data_telekomunikasi();
    }

    public function get_data_telekomunikasi($id)
    {
        $data = $this->db->get_where('destaku_pengajuan_telekomunikasi', array('pengajuan_telekomunikasi_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedatatelekomunikasi()
    {
        $this->pengajuan_m->update_data_telekomunikasi();
    }

    public function deletedatatelekomunikasi($id)
    {
        $this->pengajuan_m->delete_data_telekomunikasi($id);
    }

    // Perdagangan
    public function data_perdagangan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_perdagangan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                      = array();
            $pengajuan_perdagangan_id = $r->pengajuan_perdagangan_id;
            $row[]                    = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataPerdagangan(' . "'" . $pengajuan_perdagangan_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                    <a href="javascript:;" onclick="hapusDataPerdagangan(' . $pengajuan_perdagangan_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]  = $no;
            $row[]  = $r->perdagangan_nama;
            $row[]  = number_format($r->pengajuan_perdagangan_jumlah, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_perdagangan_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_perdagangan_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedataperdagangan()
    {
        $this->pengajuan_m->insert_data_perdagangan();
    }

    public function get_data_perdagangan($id)
    {
        $data = $this->db->get_where('destaku_pengajuan_perdagangan', array('pengajuan_perdagangan_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedataperdagangan()
    {
        $this->pengajuan_m->update_data_perdagangan();
    }

    public function deletedataperdagangan($id)
    {
        $this->pengajuan_m->delete_data_perdagangan($id);
    }

    // Wisata Alam
    public function data_wisata_alam_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_wisata_alam_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                      = array();
            $pengajuan_wisata_alam_id = $r->pengajuan_wisata_alam_id;
            $link                     = site_url('member/pengajuan/listfotoalam/' . $pengajuan_wisata_alam_id);
            $row[]                    = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataWisataAlam(' . "'" . $pengajuan_wisata_alam_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                        <a href="javascript:;" onclick="hapusDataWisataAlam(' . $pengajuan_wisata_alam_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>
                                        <a href="' . $link . '" title="List Foto"><i class="flaticon2-image-file"></i></a>';
            $row[]    = $no;
            $row[]    = $r->pengajuan_wisata_alam_nama;
            $row[]    = $r->pengajuan_wisata_alam_tema;
            $listFoto = $this->db->get_where('destaku_pengajuan_wisata_alam_foto', array('pengajuan_wisata_alam_id' => $pengajuan_wisata_alam_id))->result();
            $row[]    = count($listFoto) . ' Foto';
            $data[]   = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_wisata_alam_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_wisata_alam_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function listfotoalam($pengajuan_wisata_alam_id)
    {
        $data['detail'] = $this->db->get_where('destaku_pengajuan_wisata_alam', array('pengajuan_wisata_alam_id' => $pengajuan_wisata_alam_id))->row();
        $this->template->display('member/pengajuan/listfotoalam_v', $data);
    }

    // Foto Wisata Alam
    public function data_wisata_alam_foto_list($pengajuan_wisata_alam_id)
    {
        $List = $this->pengajuan_m->get_wisata_alam_foto_datatables($pengajuan_wisata_alam_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                           = array();
            $pengajuan_wisata_alam_foto_id = $r->pengajuan_wisata_alam_foto_id;
            $row[]                         = '<a href="javascript:;" onclick="hapusData(' . $pengajuan_wisata_alam_foto_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]                         = $no;
            $row[]                         = '<img src=' . base_url('img/potensi_folder/' . $r->pengajuan_wisata_alam_foto_file) . ' width="30%">';
            $data[]                        = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_wisata_alam_foto_all($pengajuan_wisata_alam_id),
            "recordsFiltered" => $this->pengajuan_m->count_wisata_alam_foto_filtered($pengajuan_wisata_alam_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedataalam()
    {
        $this->pengajuan_m->insert_data_alam();
    }

    public function get_data_alam($id)
    {
        $data = $this->db->get_where('destaku_pengajuan_wisata_alam', array('pengajuan_wisata_alam_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedataalam()
    {
        $this->pengajuan_m->update_data_alam();
    }

    public function deletedataalam($id)
    {
        $this->pengajuan_m->delete_data_alam($id);
    }

    public function savedatafotoalam()
    {
        $jam                     = time();
        $config['file_name']     = 'Wisata_Alam_' . $jam . '.jpg';
        $config['upload_path']   = './img/potensi_folder/';
        $config['allowed_types'] = 'jpg|png|jpeg';
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
        $configThumb['width']          = 1200;
        $configThumb['height']         = 500;
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
            $this->pengajuan_m->insert_data_foto_alam();
            $response['status'] = 'success';
        }

        echo json_encode($response);
    }

    public function deletedatafotoalam($id)
    {
        $this->pengajuan_m->delete_data_foto_alam($id);
    }

    // Wisata Budaya
    public function data_wisata_budaya_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_wisata_budaya_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                        = array();
            $pengajuan_wisata_budaya_id = $r->pengajuan_wisata_budaya_id;
            $link                       = site_url('member/pengajuan/listfotobudaya/' . $pengajuan_wisata_budaya_id);
            $row[]                      = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataWisataBudaya(' . "'" . $pengajuan_wisata_budaya_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                           <a href="javascript:;" onclick="hapusDataWisataBudaya(' . $pengajuan_wisata_budaya_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>
                                           <a href="' . $link . '" title="List Foto"><i class="flaticon2-image-file"></i></a>';
            $row[]    = $no;
            $row[]    = $r->pengajuan_wisata_budaya_nama;
            $row[]    = $r->pengajuan_wisata_budaya_tema;
            $listFoto = $this->db->get_where('destaku_pengajuan_wisata_budaya_foto', array('pengajuan_wisata_budaya_id' => $pengajuan_wisata_budaya_id))->result();
            $row[]    = count($listFoto) . ' Foto';
            $data[]   = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_wisata_budaya_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_wisata_budaya_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function listfotobudaya($pengajuan_wisata_budaya_id)
    {
        $data['detail'] = $this->db->get_where('destaku_pengajuan_wisata_budaya', array('pengajuan_wisata_budaya_id' => $pengajuan_wisata_budaya_id))->row();
        $this->template->display('member/pengajuan/listfotobudaya_v', $data);
    }

    // Foto Wisata Budaya
    public function data_wisata_budaya_foto_list($pengajuan_wisata_budaya_id)
    {
        $List = $this->pengajuan_m->get_wisata_budaya_foto_datatables($pengajuan_wisata_budaya_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                             = array();
            $pengajuan_wisata_budaya_foto_id = $r->pengajuan_wisata_budaya_foto_id;
            $row[]                           = '<a href="javascript:;" onclick="hapusData(' . $pengajuan_wisata_budaya_foto_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]                           = $no;
            $row[]                           = '<img src=' . base_url('img/potensi_folder/' . $r->pengajuan_wisata_budaya_foto_file) . ' width="30%">';
            $data[]                          = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_wisata_budaya_foto_all($pengajuan_wisata_budaya_id),
            "recordsFiltered" => $this->pengajuan_m->count_wisata_budaya_foto_filtered($pengajuan_wisata_budaya_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedatabudaya()
    {
        $this->pengajuan_m->insert_data_budaya();
    }

    public function savedatafotobudaya()
    {
        $jam                     = time();
        $config['file_name']     = 'Wisata_Budaya_' . $jam . '.jpg';
        $config['upload_path']   = './img/potensi_folder/';
        $config['allowed_types'] = 'jpg|png|jpeg';
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
        $configThumb['width']          = 1200;
        $configThumb['height']         = 500;
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
            $this->pengajuan_m->insert_data_foto_budaya();
            $response['status'] = 'success';
        }

        echo json_encode($response);
    }

    public function deletedatafotobudaya($id)
    {
        $this->pengajuan_m->delete_data_foto_budaya($id);
    }

    public function get_data_budaya($id)
    {
        $data = $this->db->get_where('destaku_pengajuan_wisata_budaya', array('pengajuan_wisata_budaya_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedatabudaya()
    {
        $this->pengajuan_m->update_data_budaya();
    }

    public function deletedatabudaya($id)
    {
        $this->pengajuan_m->delete_data_budaya($id);
    }

    // Wisata Buatan
    public function data_wisata_buatan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_wisata_buatan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                        = array();
            $pengajuan_wisata_buatan_id = $r->pengajuan_wisata_buatan_id;
            $link                       = site_url('member/pengajuan/listfotobuatan/' . $pengajuan_wisata_buatan_id);
            $row[]                      = '<a title="Edit Data" href="javascript:void(0)" onclick="editDataWisataBuatan(' . "'" . $pengajuan_wisata_buatan_id . "'" . ')"><i class="flaticon2-edit"></i></a>
                                          <a href="javascript:;" onclick="hapusDataWisataBuatan(' . $pengajuan_wisata_buatan_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>
                                          <a href="' . $link . '" title="List Foto"><i class="flaticon2-image-file"></i></a>';
            $row[]    = $no;
            $row[]    = $r->pengajuan_wisata_buatan_nama;
            $row[]    = $r->pengajuan_wisata_buatan_tema;
            $listFoto = $this->db->get_where('destaku_pengajuan_wisata_buatan_foto', array('pengajuan_wisata_buatan_id' => $pengajuan_wisata_buatan_id))->result();
            $row[]    = count($listFoto) . ' Foto';
            $data[]   = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_wisata_buatan_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_wisata_buatan_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function listfotobuatan($pengajuan_wisata_buatan_id)
    {
        $data['detail'] = $this->db->get_where('destaku_pengajuan_wisata_buatan', array('pengajuan_wisata_buatan_id' => $pengajuan_wisata_buatan_id))->row();
        $this->template->display('member/pengajuan/listfotobuatan_v', $data);
    }

    // Foto Wisata Budaya
    public function data_wisata_buatan_foto_list($pengajuan_wisata_buatan_id)
    {
        $List = $this->pengajuan_m->get_wisata_buatan_foto_datatables($pengajuan_wisata_buatan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                             = array();
            $pengajuan_wisata_buatan_foto_id = $r->pengajuan_wisata_buatan_foto_id;
            $row[]                           = '<a href="javascript:;" onclick="hapusData(' . $pengajuan_wisata_buatan_foto_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            $row[]                           = $no;
            $row[]                           = '<img src=' . base_url('img/potensi_folder/' . $r->pengajuan_wisata_buatan_foto_file) . ' width="30%">';
            $data[]                          = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_wisata_buatan_foto_all($pengajuan_wisata_buatan_id),
            "recordsFiltered" => $this->pengajuan_m->count_wisata_buatan_foto_filtered($pengajuan_wisata_buatan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedatabuatan()
    {
        $this->pengajuan_m->insert_data_buatan();
    }

    public function get_data_buatan($id)
    {
        $data = $this->db->get_where('destaku_pengajuan_wisata_buatan', array('pengajuan_wisata_buatan_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedatabuatan()
    {
        $this->pengajuan_m->update_data_buatan();
    }

    public function deletedatabuatan($id)
    {
        $this->pengajuan_m->delete_data_buatan($id);
    }

    public function savedatafotobuatan()
    {
        $jam                     = time();
        $config['file_name']     = 'Wisata_Buatan_' . $jam . '.jpg';
        $config['upload_path']   = './img/potensi_folder/';
        $config['allowed_types'] = 'jpg|png|jpeg';
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
        $configThumb['width']          = 1200;
        $configThumb['height']         = 500;
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
            $this->pengajuan_m->insert_data_foto_buatan();
            $response['status'] = 'success';
        }

        echo json_encode($response);
    }

    public function deletedatafotobuatan($id)
    {
        $this->pengajuan_m->delete_data_foto_buatan($id);
    }

    // RTRW
    public function data_rtrw_list($pengajuan_id, $rtrw_grup_id)
    {
        $List = $this->pengajuan_m->get_rtrw_datatables($pengajuan_id, $rtrw_grup_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row               = array();
            $pengajuan_rtrw_id = $r->pengajuan_rtrw_id;
            $row[]             = $no;
            $row[]             = ucwords(strtolower($r->rtrw_detail_nama));
            switch ($r->pengajuan_rtrw_status) {
                case 'Y':
                    $status = '<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--square">YA</span>';
                    break;
                case 'T':
                    $status = '<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--square">TIDAK</span>';
                    break;
                default:
                    $status = '<span class="kt-badge kt-badge--primary kt-badge--inline kt-badge--square">BELUM PILIH</span>';
                    break;
            }
            $row[] = $status;
            $row[] = '<a href="javascript:;" onclick="YaData(' . $pengajuan_rtrw_id . ')" title="Tidak"><i class="flaticon2-checkmark"></i></a>
                                 <a href="javascript:;" onclick="TidakData(' . $pengajuan_rtrw_id . ')" title="Tidak"><i class="flaticon2-cross"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_rtrw_all($pengajuan_id, $rtrw_grup_id),
            "recordsFiltered" => $this->pengajuan_m->count_rtrw_filtered($pengajuan_id, $rtrw_grup_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function pilihya($id)
    {
        $data = array(
            'pengajuan_rtrw_status' => 'Y',
            'pengajuan_rtrw_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_rtrw_id', $id);
        $this->db->update('destaku_pengajuan_rtrw', $data);
    }

    public function pilihtidak($id)
    {
        $data = array(
            'pengajuan_rtrw_status' => 'T',
            'pengajuan_rtrw_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_rtrw_id', $id);
        $this->db->update('destaku_pengajuan_rtrw', $data);
    }

    public function updatemitigasi()
    {
        $check_id = $this->input->post('id', 'true');
        for ($i = 0; $i < count($check_id); $i++) {
            $status     = !isset($this->input->post('check')[$check_id[$i]]) ? 0 : 1;
            $keterangan = !isset($this->input->post('nama')[$check_id[$i]]) ? '' : trim(strtoupper($this->input->post('nama')[$check_id[$i]]));
            $update     = date('Y-m-d H:i:s');
            $q          = "UPDATE destaku_pengajuan_mitigasi SET pengajuan_mitigasi_checked='" . $status . "', pengajuan_mitigasi_keterangan='" . $keterangan . "', pengajuan_mitigasi_update='" . $update . "' WHERE pengajuan_mitigasi_id= " . $check_id[$i];
            $this->db->query($q);
        }
    }

    public function printprofil($id)
    {
        $data['listTenagaKerja'] = $this->db->order_by('tenaga_kerja_nama', 'asc')->get_where('v_tenaga_kerja', array('pengajuan_id' => $id))->result();
        $data['listPendidikan']  = $this->db->order_by('pengajuan_pendidikan_sarana', 'asc')->get_where('v_pendidikan', array('pengajuan_id' => $id))->result();
        $data['listHiburan']     = $this->db->order_by('sarana_hiburan_nama', 'asc')->get_where('v_hiburan', array('pengajuan_id' => $id))->result();
        $data['listOlahraga']    = $this->db->order_by('sarana_olahraga_nama', 'asc')->get_where('v_olahraga', array('pengajuan_id' => $id))->result();
        $data['listKesehatan']   = $this->db->order_by('kesehatan_nama', 'asc')->get_where('v_kesehatan', array('pengajuan_id' => $id))->result();
        $data['listIbadah']      = $this->db->order_by('tempat_ibadah_nama', 'asc')->get_where('v_ibadah', array('pengajuan_id' => $id))->result();
        $data['listPertanian']   = $this->db->order_by('pertanian_nama', 'asc')->get_where('v_pertanian', array('pengajuan_id' => $id))->result();
        $data['listPalawija']    = $this->db->order_by('pengajuan_palawija_nama', 'asc')->get_where('destaku_pengajuan_palawija', array('pengajuan_id' => $id))->result();
        $data['listPerkebunan']  = $this->db->order_by('pengajuan_perkebunan_nama', 'asc')->get_where('destaku_pengajuan_perkebunan', array('pengajuan_id' => $id))->result();
        $data['listPeternakan']  = $this->db->order_by('pengajuan_peternakan_nama', 'asc')->get_where('destaku_pengajuan_peternakan', array('pengajuan_id' => $id))->result();
        $data['listPerikanan']   = $this->db->order_by('pengajuan_perikanan_nama', 'asc')->get_where('destaku_pengajuan_perikanan', array('pengajuan_id' => $id))->result();
        $data['listIndustri']    = $this->db->order_by('jenis_perusahaan_nama', 'asc')->get_where('v_industri', array('pengajuan_id' => $id))->result();
        $data['listAir']         = $this->db->order_by('pengajuan_air_nama', 'asc')->get_where('destaku_pengajuan_air', array('pengajuan_id' => $id))->result();
        $data['listJalan']       = $this->db->order_by('pengajuan_jalan_nama', 'asc')->get_where('destaku_pengajuan_jalan', array('pengajuan_id' => $id))->result();
        $data['listAngkutan']    = $this->db->order_by('angkutan_darat_nama', 'asc')->get_where('v_angkutan', array('pengajuan_id' => $id))->result();
        $data['listKomunikasi']  = $this->db->order_by('telekomunikasi_nama', 'asc')->get_where('v_telekomunikasi', array('pengajuan_id' => $id))->result();
        $data['listPerdagangan'] = $this->db->order_by('perdagangan_nama', 'asc')->get_where('v_perdagangan', array('pengajuan_id' => $id))->result();
        $data['detail']          = $this->db->get_where('v_pengajuan', array('pengajuan_id' => $id))->row();
        $this->load->view('print/printprofil_v', $data);
    }

    public function printpengelola($id)
    {
        $data['detail']          = $this->db->get_where('v_pengajuan', array('pengajuan_id' => $id))->row();
        $data['detailwisatawan'] = $this->db->get_where('destaku_pengajuan_wisatawan', array('pengajuan_id' => $id))->row();
        $this->load->view('print/printpengelola_v', $data);
    }

    public function printpotensiwisata($id)
    {
        $data['listWisataAlam']   = $this->db->order_by('pengajuan_wisata_alam_nama', 'asc')->get_where('destaku_pengajuan_wisata_alam', array('pengajuan_id' => $id))->result();
        $data['listWisataBudaya'] = $this->db->order_by('pengajuan_wisata_budaya_nama', 'asc')->get_where('destaku_pengajuan_wisata_budaya', array('pengajuan_id' => $id))->result();
        $data['listWisataBuatan'] = $this->db->order_by('pengajuan_wisata_buatan_nama', 'asc')->get_where('destaku_pengajuan_wisata_buatan', array('pengajuan_id' => $id))->result();
        $data['detail']           = $this->db->get_where('v_pengajuan', array('pengajuan_id' => $id))->row();
        $this->load->view('print/printpotensiwisata_v', $data);
    }

    public function printrtrw($id)
    {
        $data['listRTRWGrup'] = $this->db->order_by('rtrw_grup_nama', 'asc')->get('destaku_rtrw_grup')->result();
        $data['detail']       = $this->db->get_where('v_pengajuan', array('pengajuan_id' => $id))->row();
        $this->load->view('print/printrtrw_v', $data);
    }

    public function printmitigasi($id)
    {
        $data['listMitigasi'] = $this->db->order_by('mitigasi_nama', 'asc')->get('destaku_mitigasi')->result();
        $data['detail']       = $this->db->get_where('v_pengajuan', array('pengajuan_id' => $id))->row();
        $this->load->view('print/printmitigasi_v', $data);
    }

    public function printskor($id)
    {
        $data['listIndikatorNilai'] = $this->db->order_by('indikator_no', 'asc')->get_where('v_indikator_penilaian', array('pengajuan_id' => $id))->result();
        $data['listBobot']          = $this->db->order_by('bobot_id', 'asc')->get('destaku_bobot')->result();
        $data['detail']             = $this->db->get_where('v_pengajuan', array('pengajuan_id' => $id))->row();
        $data['detailwisatawan']    = $this->db->get_where('destaku_pengajuan_wisatawan', array('pengajuan_id' => $id))->row();
        $data['petugas']            = $this->db->get_where('destaku_petugas', array('petugas_id' => 1))->row();
        $this->load->view('print/printskor_v', $data);
    }

    // Berkas
    public function data_berkas_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_berkas_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row                 = array();
            $pengajuan_berkas_id = $r->pengajuan_berkas_id;
            $row[]               = '<a title="Edit Data" href="javascript:void(0)" onclick="edit_data(' . "'" . $pengajuan_berkas_id . "'" . ')"><i class="flaticon2-edit"></i></a>';
            $row[]               = $no;
            $row[]               = $r->berkas_nama;
            if ($r->pengajuan_berkas_file == '') {
                $row[] = '-';
            } else {
                $row[] = '<a href="javascript:;" onclick="viewBerkas(' . $pengajuan_berkas_id . ')" title="View Dokumen" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i> View</a>';
            }
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_berkas_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_berkas_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function get_data_berkas($id)
    {
        $data = $this->db->get_where('v_berkas', array('pengajuan_berkas_id' => $id))->row();
        echo json_encode($data);
    }

    public function uploadberkas()
    {
        $jam                     = time();
        $username                = $this->session->userdata('username');
        $config['file_name']     = 'Berkas_' . $username . '_' . $jam . '.pdf';
        $config['upload_path']   = './dokumen/';
        $config['allowed_types'] = 'pdf';
        $config['overwrite']     = true;
        $config['max_size']      = 0;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('pdf')) {
            $response['status'] = 'error';
        } else {
            $this->pengajuan_m->update_data_berkas();
            $response['status'] = 'success';
        }

        echo json_encode($response);
    }

    public function get_data_preview($id)
    {
        $data['detail'] = $this->db->get_where('v_berkas', array('pengajuan_berkas_id' => $id))->row();
        $this->load->view('viewberkas_v', $data);
    }
}
/* Location: ./application/controller/member/Pengajuan.php */
