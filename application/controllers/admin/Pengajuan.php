<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth_admin();
        $this->load->library('template');
        $this->load->model('admin/pengajuan_m');
    }

    public function index()
    {
        $data['listBobot'] = $this->db->order_by('bobot_id', 'asc')->get('destaku_bobot')->result();
        $this->template->display('admin/pengajuan/view', $data);
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
            $link         = site_url('admin/pengajuan/detaildata/' . $pengajuan_id);
            $surat        = site_url('admin/pengajuan/printsurat/' . $pengajuan_id);
            $print        = site_url('admin/pengajuan/printskor/' . $pengajuan_id);
            $nilai        = site_url('admin/pengajuan/penilaian/' . $pengajuan_id);
            if ($r->pengajuan_status == 'B') {
                $konfirm = '<a href="javascript:;" onclick="konfirmData(' . $pengajuan_id . ')" title="Konfirmasi Data"><i class="flaticon2-checkmark"></i></a>
                            <a href="javascript:;" onclick="undoDataDraft(' . $pengajuan_id . ')" title="Kirim Balik"><i class="flaticon-reply"></i></a>';
                $hapus = '<a href="javascript:;" onclick="hapusData(' . $pengajuan_id . ')" title="Hapus Data"><i class="flaticon-delete"></i></a>';
            } elseif ($r->pengajuan_status == 'K') {
                $konfirm = '<a href="' . $nilai . '" title="Penilaian"><i class="flaticon2-writing"></i></a>
                            <a href="javascript:;" onclick="undoDataDraft(' . $pengajuan_id . ')" title="Kirim Balik"><i class="flaticon-reply"></i></a>
                            <a href="' . $surat . '" title="Print Surat Keterangan" target="_blank"><i class="flaticon-technology"></i></a>';
                $hapus = '';
            } elseif ($r->pengajuan_status == 'N') {
                $konfirm = '<a href="javascript:;" onclick="undoData(' . $pengajuan_id . ')" title="Undo Data"><i class="flaticon-reply"></i></a>
                            <a href="' . $print . '" title="Print Hasil Penilaian" target="_blank"><i class="flaticon-technology"></i></a>';
                $hapus = '';
            }

            $row[] = '<a href="' . $link . '" title="Detail Data"><i class="flaticon2-edit"></i></a> ' . $konfirm . ' ' . $hapus;
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

    public function detaildata($id)
    {
        $data['listRTRWGrup']    = $this->db->order_by('rtrw_grup_nama', 'asc')->get('destaku_rtrw_grup')->result();
        $data['listMitigasi']    = $this->db->order_by('mitigasi_nama', 'asc')->get('destaku_mitigasi')->result();
        $data['detail']          = $this->db->get_where('v_pengajuan', array('pengajuan_id' => $id))->row();
        $data['detailwisatawan'] = $this->db->get_where('destaku_pengajuan_wisatawan', array('pengajuan_id' => $id))->row();
        $this->template->display('admin/pengajuan/detail', $data);
    }

    // public function get_data_wisatawan($id)
    // {
    //     $data = $this->db->get_where('destaku_pengajuan_wisatawan', array('pengajuan_wisatawan_id' => $id))->row();
    //     echo json_encode($data);
    // }

    // public function get_data_preview($id)
    // {
    //     $data['detail'] = $this->db->get_where('destaku_pengajuan_wisatawan', array('pengajuan_wisatawan_id' => $id))->row();
    //     $this->load->view('viewberkas_v', $data);
    // }

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

    public function get_data_proposal($id)
    {
        $data['detail'] = $this->db->get_where('destaku_pengajuan', array('pengajuan_id' => $id))->row();
        $this->load->view('viewproposal_v', $data);
    }

    public function deletedata($id)
    {
        $this->pengajuan_m->delete_data($id);
    }

    public function undodatadraft($id)
    {
        $data = array(
            'pengajuan_status' => 'D',
            'pengajuan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_id', $id);
        $this->db->update('destaku_pengajuan', $data);
    }

    public function undodata($id)
    {
        $data = array(
            'pengajuan_status' => 'K',
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
            $row    = array();
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

    // Pendidikan
    public function data_pendidikan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_pendidikan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row    = array();
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

    // Hiburan
    public function data_hiburan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_hiburan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row    = array();
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

    // Olahraga
    public function data_olahraga_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_olahraga_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row    = array();
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

    // Kesehatan
    public function data_kesehatan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_kesehatan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row    = array();
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

    // Ibadah
    public function data_ibadah_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_ibadah_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row    = array();
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

    // Pertanian
    public function data_pertanian_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_pertanian_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row    = array();
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

    // Palawija
    public function data_palawija_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_palawija_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row    = array();
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

    // Perkebunan
    public function data_perkebunan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_perkebunan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row    = array();
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

    // Peternakan
    public function data_peternakan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_peternakan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row    = array();
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

    // Perikanan
    public function data_perikanan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_perikanan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row    = array();
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

    // Industri
    public function data_industri_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_industri_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row    = array();
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

    // Air
    public function data_air_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_air_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row    = array();
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

    // Jalan
    public function data_jalan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_jalan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row    = array();
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

    // Angkutan
    public function data_angkutan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_angkutan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row    = array();
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

    // Telekomunikasi
    public function data_telekomunikasi_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_telekomunikasi_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row    = array();
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

    // Perdagangan
    public function data_perdagangan_list($pengajuan_id)
    {
        $List = $this->pengajuan_m->get_perdagangan_datatables($pengajuan_id);
        $data = array();
        $no   = $_POST['start'];
        foreach ($List as $r) {
            $no++;
            $row    = array();
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
            $row[]                    = $no;
            $row[]                    = $r->pengajuan_wisata_alam_nama;
            $row[]                    = $r->pengajuan_wisata_alam_tema;
            $listFoto                 = $this->db->get_where('destaku_pengajuan_wisata_alam_foto', array('pengajuan_wisata_alam_id' => $pengajuan_wisata_alam_id))->result();
            $row[]                    = count($listFoto) . ' Foto';
            $data[]                   = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_wisata_alam_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_wisata_alam_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
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
            $row[]                      = $no;
            $row[]                      = $r->pengajuan_wisata_budaya_nama;
            $row[]                      = $r->pengajuan_wisata_budaya_tema;
            $listFoto                   = $this->db->get_where('destaku_pengajuan_wisata_budaya_foto', array('pengajuan_wisata_budaya_id' => $pengajuan_wisata_budaya_id))->result();
            $row[]                      = count($listFoto) . ' Foto';
            $data[]                     = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_wisata_budaya_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_wisata_budaya_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
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
            $row[]                      = $no;
            $row[]                      = $r->pengajuan_wisata_buatan_nama;
            $row[]                      = $r->pengajuan_wisata_buatan_tema;
            $listFoto                   = $this->db->get_where('destaku_pengajuan_wisata_buatan_foto', array('pengajuan_wisata_buatan_id' => $pengajuan_wisata_buatan_id))->result();
            $row[]                      = count($listFoto) . ' Foto';
            $data[]                     = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->pengajuan_m->count_wisata_buatan_all($pengajuan_id),
            "recordsFiltered" => $this->pengajuan_m->count_wisata_buatan_filtered($pengajuan_id),
            "data"            => $data,
        );

        echo json_encode($output);
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
            $row[]  = $status;
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

    public function konfirmdata($id)
    {
        $data = array(
            'pengajuan_status' => 'K',
            'pengajuan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_id', $id);
        $this->db->update('destaku_pengajuan', $data);

        // Send Email
        $dataKontak   = $this->db->get_where('destaku_meta', array('meta_id' => 1))->row();
        $sender_email = $dataKontak->meta_email;
        $sender_name  = 'DestaKU | Dinas Pariwisata Kab. Kudus';
        $dataPemohon  = $this->db->get_where('v_pengajuan', array('pengajuan_id' => $id))->row();
        $nama         = 'DESA ' . $dataPemohon->nama_kel . ' KEC. ' . $dataPemohon->nama_kec;
        $nodaftar     = $dataPemohon->pengajuan_no_pendaftaran;
        $email        = $dataPemohon->user_email;
        $subject      = "Konfirmasi Permohonan";
        $message      = "<p>Kepada : " . $nama . "<br>No. Pendaftaran : " . $nodaftar .
            "<br><p>Status Permohonan anda telah kami Konfirmasi, menunggu proses selanjutnya.</p><br><br><p>Hormat Kami,<br>Dinas Pariwisata - Kabupaten Kudus</p>";
        $this->load->library('email');
        $this->email->set_mailtype("html");
        $this->email->from($sender_email, $sender_name);
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }

    public function penilaian($id)
    {
        // Indikator
        $checkIndikator = $this->db->get_where('destaku_pengajuan_nilai', array('pengajuan_id' => $id));
        $num_rows       = $checkIndikator->num_rows();
        if ($num_rows == 0) {
            $listIndikator = $this->db->order_by('indikator_id', 'asc')->get_where('destaku_indikator', array('indikator_status' => 'A'))->result();
            foreach ($listIndikator as $r) {
                $indikator_id  = $r->indikator_id;
                $dataIndikator = array(
                    'pengajuan_id'           => $id,
                    'indikator_id'           => $r->indikator_id,
                    'pengajuan_nilai_update' => date('Y-m-d H:i:s'),
                );

                $this->db->insert('destaku_pengajuan_nilai', $dataIndikator);
                $pengajuan_nilai_id = $this->db->insert_id();

                $listSub = $this->db->order_by('indikator_detail_id', 'asc')->get_where('destaku_indikator_detail', array('indikator_id' => $indikator_id, 'indikator_detail_status' => 'A'))->result();
                foreach ($listSub as $s) {
                    $dataSub = array(
                        'pengajuan_nilai_id'            => $pengajuan_nilai_id,
                        'indikator_detail_id'           => $s->indikator_detail_id,
                        'pengajuan_nilai_detail_update' => date('Y-m-d H:i:s'),
                    );

                    $this->db->insert('destaku_pengajuan_nilai_detail', $dataSub);
                }
            }
        }

        $data['listIndikatorNilai'] = $this->db->order_by('indikator_no', 'asc')->get_where('v_indikator_penilaian', array('pengajuan_id' => $id))->result();
        $data['detail']             = $this->db->get_where('v_pengajuan', array('pengajuan_id' => $id))->row();
        $this->template->display('admin/pengajuan/nilai', $data);
    }

    public function updatenilai()
    {
        $check_id = $this->input->post('id', 'true');
        for ($i = 0; $i < count($check_id); $i++) {
            $skor   = !isset($this->input->post('nama')[$check_id[$i]]) ? 0 : $this->input->post('nama')[$check_id[$i]];
            $update = date('Y-m-d H:i:s');
            $q      = "UPDATE destaku_pengajuan_nilai_detail SET pengajuan_nilai_detail_skor='" . $skor . "', pengajuan_nilai_detail_update='" . $update . "' WHERE pengajuan_nilai_detail_id= " . $check_id[$i];
            $this->db->query($q);
        }
    }

    public function konfirmnilai($id)
    {
        // Update Skor Pengajuan
        $dataNilai  = $this->db->select_sum('pengajuan_nilai_detail_skor', 'total')->get_where('v_indikator_penilaian_detail', array('pengajuan_id' => $id))->row();
        $dataUpdate = array(
            'pengajuan_status' => 'N',
            'pengajuan_nilai'  => $dataNilai->total,
            'pengajuan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_id', $id);
        $this->db->update('destaku_pengajuan', $dataUpdate);

        $nilai     = $dataNilai->total;
        $listBobot = $this->db->order_by('bobot_id', 'asc')->get('destaku_bobot')->result();
        foreach ($listBobot as $b) {
            $bobot_id = $b->bobot_id;
            $minimal  = $b->bobot_minimal;
            $maksimal = $b->bobot_maksimal;

            if ($nilai >= $minimal && $nilai <= $maksimal) {
                $dataBobot = array(
                    'bobot_id' => $bobot_id,
                );

                $this->db->where('pengajuan_id', $id);
                $this->db->update('destaku_pengajuan', $dataBobot);
            }
        }

        // Send Email
        $dataKontak   = $this->db->get_where('destaku_meta', array('meta_id' => 1))->row();
        $sender_email = $dataKontak->meta_email;
        $sender_name  = 'DestaKU | Dinas Pariwisata Kab. Kudus';
        $dataPemohon  = $this->db->get_where('v_pengajuan', array('pengajuan_id' => $id))->row();
        $nama         = 'DESA ' . $dataPemohon->nama_kel . ' KEC. ' . $dataPemohon->nama_kec;
        $nodaftar     = $dataPemohon->pengajuan_no_pendaftaran;
        $email        = $dataPemohon->user_email;
        $subject      = "Penilaian";
        $message      = "<p>Kepada : " . $nama . "<br>No. Pendaftaran : " . $nodaftar .
        "<br><p>Status Permohonan anda telah kami Nilai dengan Bobot Total : " . $dataNilai->total . " .</p><br><br><p>Hormat Kami,<br>Dinas Pariwisata - Kabupaten Kudus</p>";
        $this->load->library('email');
        $this->email->set_mailtype("html");
        $this->email->from($sender_email, $sender_name);
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }

    public function printsurat($id)
    {
        $data['detail']     = $this->db->get_where('v_pengajuan', array('pengajuan_id' => $id))->row();
        $data['meta']       = $this->db->get_where('destaku_meta', array('meta_id' => 1))->row();
        $data['detaildesa'] = $this->db->get_where('destaku_pengajuan_wisatawan', array('pengajuan_id' => $id))->row();
        $this->load->view('admin/pengajuan/printsurat_v', $data);
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

    public function printdata($tgl_dari = 'all', $tgl_sampai = 'all', $status = 'all', $bobot = 'all')
    {
        $data['kontak'] = $this->db->get_where('destaku_contact', array('contact_id' => 1))->row();
        $dari           = date('Y-m-d', strtotime($tgl_dari));
        $sampai         = date('Y-m-d', strtotime($tgl_sampai));
        if ($bobot == 'all') {
            $data['kelompok'] = '';
        } else {
            $dataBobot        = $this->db->get_where('destaku_bobot', array('bobot_id' => $bobot))->row();
            $data['kelompok'] = $dataBobot->bobot_nama;
        }

        if ($tgl_dari != 'all' && $tgl_sampai != 'all' && $status == 'all' && $bobot == 'all') {
            $data['listData'] = $this->db->order_by('pengajuan_tanggal', 'desc')->order_by('pengajuan_no_pendaftaran', 'desc')->get_where('v_pengajuan', array('pengajuan_tanggal >=' => $dari, 'pengajuan_tanggal <=' => $sampai))->result();
        } elseif ($tgl_dari == 'all' && $tgl_sampai == 'all' && $status != 'all' && $bobot == 'all') {
            $data['listData'] = $this->db->order_by('pengajuan_tanggal', 'desc')->order_by('pengajuan_no_pendaftaran', 'desc')->get_where('v_pengajuan', array('pengajuan_status' => $status))->result();
        } elseif ($tgl_dari != 'all' && $tgl_sampai != 'all' && $status != 'all' && $bobot == 'all') {
            $data['listData'] = $this->db->order_by('pengajuan_tanggal', 'desc')->order_by('pengajuan_no_pendaftaran', 'desc')->get_where('v_pengajuan', array('pengajuan_tanggal >=' => $dari, 'pengajuan_tanggal <=' => $sampai, 'pengajuan_status' => $status))->result();
        } elseif ($tgl_dari == 'all' && $tgl_sampai == 'all' && $status == 'all' && $bobot != 'all') {
            $data['listData'] = $this->db->order_by('pengajuan_tanggal', 'desc')->order_by('pengajuan_no_pendaftaran', 'desc')->get_where('v_pengajuan', array('bobot_id' => $bobot))->result();
        } elseif ($tgl_dari != 'all' && $tgl_sampai != 'all' && $status == 'all' && $bobot != 'all') {
            $data['listData'] = $this->db->order_by('pengajuan_tanggal', 'desc')->order_by('pengajuan_no_pendaftaran', 'desc')->get_where('v_pengajuan', array('pengajuan_tanggal >=' => $dari, 'pengajuan_tanggal <=' => $sampai, 'bobot_id' => $bobot))->result();
        } elseif ($tgl_dari == 'all' && $tgl_sampai == 'all' && $status != 'all' && $bobot != 'all') {
            $data['listData'] = $this->db->order_by('pengajuan_tanggal', 'desc')->order_by('pengajuan_no_pendaftaran', 'desc')->get_where('v_pengajuan', array('pengajuan_status' => $status, 'bobot_id' => $bobot))->result();
        } elseif ($tgl_dari != 'all' && $tgl_sampai != 'all' && $status != 'all' && $bobot != 'all') {
            $data['listData'] = $this->db->order_by('pengajuan_tanggal', 'desc')->order_by('pengajuan_no_pendaftaran', 'desc')->get_where('v_pengajuan', array('pengajuan_tanggal >=' => $dari, 'pengajuan_tanggal <=' => $sampai, 'pengajuan_status' => $status, 'bobot_id' => $bobot))->result();
        } else {
            $data['listData'] = $this->db->order_by('pengajuan_tanggal', 'desc')->order_by('pengajuan_no_pendaftaran', 'desc')->get('v_pengajuan')->result();
        }

        $this->load->view('admin/pengajuan/printdata_v', $data);
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

    public function get_data_preview($id)
    {
        $data['detail'] = $this->db->get_where('v_berkas', array('pengajuan_berkas_id' => $id))->row();
        $this->load->view('viewberkas_v', $data);
    }
}
/* Location: ./application/controller/admin/Pengajuan.php */
