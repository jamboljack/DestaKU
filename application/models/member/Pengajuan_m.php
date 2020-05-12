<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Pengajuan_m extends CI_Model
{
    public $table        = 'v_pengajuan';
    public $column_order = array(null, null, null, 'pengajuan_tanggal', 'pengajuan_no_pendaftaran', 'nama_kec', 'nama_kel',
        'pengajuan_nilai', 'bobot_nama', 'pengajuan_status');
    public $column_search = array('pengajuan_no_pendaftaran', 'pengajuan_tanggal', 'nama_kec', 'nama_kel', 'pengajuan_nilai',
        'bobot_nama', 'pengajuan_status');
    public $order = array('pengajuan_tanggal' => 'desc');

    public $table1         = 'v_tenaga_kerja';
    public $column_order1  = array(null, null, null, null);
    public $column_search1 = array();
    public $order1         = array('tenaga_kerja_nama' => 'asc');

    public $table2         = 'v_pendidikan';
    public $column_order2  = array(null, null, null, null, null, null);
    public $column_search2 = array();
    public $order2         = array('pendidikan_nama' => 'asc');

    public $table3         = 'v_hiburan';
    public $column_order3  = array(null, null, null, null);
    public $column_search3 = array();
    public $order3         = array('sarana_hiburan_nama' => 'asc');

    public $table4         = 'v_olahraga';
    public $column_order4  = array(null, null, null, null);
    public $column_search4 = array();
    public $order4         = array('sarana_olahraga_nama' => 'asc');

    public $table5         = 'v_kesehatan';
    public $column_order5  = array(null, null, null, null);
    public $column_search5 = array();
    public $order5         = array('kesehatan_nama' => 'asc');

    public $table6         = 'v_ibadah';
    public $column_order6  = array(null, null, null, null);
    public $column_search6 = array();
    public $order6         = array('tempat_ibadah_nama' => 'asc');

    public $table7         = 'v_pertanian';
    public $column_order7  = array(null, null, null, null, null);
    public $column_search7 = array();
    public $order7         = array('pertanian_nama' => 'asc');

    public $table8         = 'destaku_pengajuan_palawija';
    public $column_order8  = array(null, null, null, null);
    public $column_search8 = array();
    public $order8         = array('pengajuan_palawija_nama' => 'asc');

    public $table9         = 'destaku_pengajuan_perkebunan';
    public $column_order9  = array(null, null, null, null);
    public $column_search9 = array();
    public $order9         = array('pengajuan_perkebunan_nama' => 'asc');

    public $table10         = 'destaku_pengajuan_peternakan';
    public $column_order10  = array(null, null, null, null);
    public $column_search10 = array();
    public $order10         = array('pengajuan_peternakan_nama' => 'asc');

    public $table11         = 'destaku_pengajuan_perikanan';
    public $column_order11  = array(null, null, null, null);
    public $column_search11 = array();
    public $order11         = array('pengajuan_perikanan_nama' => 'asc');

    public $table12         = 'v_industri';
    public $column_order12  = array(null, null, null, null, null);
    public $column_search12 = array();
    public $order12         = array('jenis_perusahaan_nama' => 'asc');

    public $table13         = 'destaku_pengajuan_air';
    public $column_order13  = array(null, null, null, null);
    public $column_search13 = array();
    public $order13         = array('pengajuan_air_nama' => 'asc');

    public $table14         = 'destaku_pengajuan_jalan';
    public $column_order14  = array(null, null, null, null);
    public $column_search14 = array();
    public $order14         = array('pengajuan_jalan_nama' => 'asc');

    public $table15         = 'v_angkutan';
    public $column_order15  = array(null, null, null, null);
    public $column_search15 = array();
    public $order15         = array('angkutan_darat_nama' => 'asc');

    public $table16         = 'v_telekomunikasi';
    public $column_order16  = array(null, null, null, null);
    public $column_search16 = array();
    public $order16         = array('telekomunikasi_nama' => 'asc');

    public $table17         = 'v_perdagangan';
    public $column_order17  = array(null, null, null, null);
    public $column_search17 = array();
    public $order17         = array('perdagangan_nama' => 'asc');

    public $table18         = 'destaku_pengajuan_wisata_alam';
    public $column_order18  = array(null, null, null, null, null);
    public $column_search18 = array();
    public $order18         = array('pengajuan_wisata_alam_nama' => 'asc');

    public $table19         = 'destaku_pengajuan_wisata_budaya';
    public $column_order19  = array(null, null, null, null, null);
    public $column_search19 = array();
    public $order19         = array('pengajuan_wisata_budaya_nama' => 'asc');

    public $table20         = 'destaku_pengajuan_wisata_buatan';
    public $column_order20  = array(null, null, null, null, null);
    public $column_search20 = array();
    public $order20         = array('pengajuan_wisata_buatan_nama' => 'asc');

    public $table21         = 'v_rtrw';
    public $column_order21  = array(null, null, null, null);
    public $column_search21 = array();
    public $order21         = array('rtrw_detail_nama' => 'asc');

    public $table22         = 'v_berkas';
    public $column_order22  = array(null, null, 'berkas_nama', null);
    public $column_search22 = array();
    public $order22         = array('berkas_nama' => 'asc');

    public $table23         = 'destaku_pengajuan_wisata_alam_foto';
    public $column_order23  = array(null, null, null);
    public $column_search23 = array();
    public $order23         = array('pengajuan_wisata_alam_foto_file' => 'asc');

    public $table24         = 'destaku_pengajuan_wisata_buatan_foto';
    public $column_order24  = array(null, null, null);
    public $column_search24 = array();
    public $order24         = array('pengajuan_wisata_buatan_foto_file' => 'asc');

    public $table25         = 'destaku_pengajuan_wisata_budaya_foto';
    public $column_order25  = array(null, null, null);
    public $column_search25 = array();
    public $order25         = array('pengajuan_wisata_budaya_foto_file' => 'asc');

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query()
    {
        $username = $this->session->userdata('username');
        $this->db->from($this->table);
        $this->db->where('user_username', $username);

        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $username = $this->session->userdata('username');
        $this->db->from($this->table);
        $this->db->where('user_username', $username);

        return $this->db->count_all_results();
    }

    public function getNoDaftar()
    {
        $this->db->select('COUNT(pengajuan_id) as total', false);
        $this->db->where('YEAR(pengajuan_tanggal)', date('Y'));
        $query = $this->db->get('destaku_pengajuan');
        if ($query->num_rows() != 0) {
            $data = $query->row();
            $kode = intval($data->total) + 1;
        } else {
            $kode = 1;
        }

        $bulan    = date('m');
        $NoUrut   = str_pad($kode, 5, "0", STR_PAD_LEFT);
        $NoDaftar = $NoUrut . '/' . $bulan . '/Deswita-KDS/' . date('Y');
        return $NoDaftar;
    }

    public function insert_data()
    {
        $NoPendaftaran = $this->getNoDaftar();
        $data          = array(
            'user_username'                 => $this->session->userdata('username'),
            'pengajuan_tanggal'             => date('Y-m-d'),
            'no_kec'                        => trim(stripHTMLtags($this->input->post('no_kec', 'true'))),
            'no_kel'                        => trim(stripHTMLtags($this->input->post('no_kel', 'true'))),
            'pengajuan_no_pendaftaran'      => $NoPendaftaran,
            'pengajuan_batas_utara'         => trim(strtoupper(stripHTMLtags($this->input->post('batas_utara', 'true')))),
            'pengajuan_batas_timur'         => trim(strtoupper(stripHTMLtags($this->input->post('batas_timur', 'true')))),
            'pengajuan_batas_selatan'       => trim(strtoupper(stripHTMLtags($this->input->post('batas_selatan', 'true')))),
            'pengajuan_batas_barat'         => trim(strtoupper(stripHTMLtags($this->input->post('batas_barat', 'true')))),
            'pengajuan_jarak_utara_selatan' => str_replace(",", "", $this->input->post('utara_selatan', 'true')),
            'pengajuan_jarak_barat_timur'   => str_replace(",", "", $this->input->post('barat_timur', 'true')),
            'pengajuan_jarak_kabupaten'     => str_replace(",", "", $this->input->post('jarak_kabupaten', 'true')),
            'pengajuan_jarak_provinsi'      => str_replace(",", "", $this->input->post('jarak_provinsi', 'true')),
            'pengajuan_tinggi'              => str_replace(",", "", $this->input->post('tinggi', 'true')),
            'pengajuan_iklim'               => trim(strtoupper(stripHTMLtags($this->input->post('iklim', 'true')))),
            'pengajuan_luas_sawah'          => str_replace(",", "", $this->input->post('tanah_sawah', 'true')),
            'pengajuan_luas_kering'         => str_replace(",", "", $this->input->post('tanah_kering', 'true')),
            'pengajuan_luas'                => (str_replace(",", "", $this->input->post('tanah_kering', 'true')) + str_replace(",", "", $this->input->post('tanah_sawah', 'true'))),
            'pengajuan_dusun'               => str_replace(",", "", $this->input->post('dusun', 'true')),
            'pengajuan_rt'                  => str_replace(",", "", $this->input->post('rt', 'true')),
            'pengajuan_rw'                  => str_replace(",", "", $this->input->post('rw', 'true')),
            'pengajuan_lk_aparat'           => str_replace(",", "", $this->input->post('aparat_lk', 'true')),
            'pengajuan_pr_aparat'           => str_replace(",", "", $this->input->post('aparat_pr', 'true')),
            'pengajuan_tps'                 => str_replace(",", "", $this->input->post('tps', 'true')),
            'pengajuan_pemilih_lk'          => str_replace(",", "", $this->input->post('pemilih_lk', 'true')),
            'pengajuan_pemilih_pr'          => str_replace(",", "", $this->input->post('pemilih_pr', 'true')),
            'pengajuan_nikah'               => str_replace(",", "", $this->input->post('nikah', 'true')),
            'pengajuan_cerai_gugat'         => str_replace(",", "", $this->input->post('cerai_gugat', 'true')),
            'pengajuan_cerai_talak'         => str_replace(",", "", $this->input->post('cerai_talak', 'true')),
            'pengajuan_lk_warga'            => str_replace(",", "", $this->input->post('warga_lk', 'true')),
            'pengajuan_pr_warga'            => str_replace(",", "", $this->input->post('warga_pr', 'true')),
            'pengajuan_kb'                  => str_replace(",", "", $this->input->post('kb', 'true')),
            'pengajuan_update'              => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan', $data);
        $pengajuan_id = $this->db->insert_id();
        $response     = ['status' => 'success', 'id' => $pengajuan_id];
        echo json_encode($response);
    }

    public function update_data()
    {
        $pengajuan_id = $this->input->post('id', 'true');
        $data         = array(
            'pengajuan_batas_utara'         => trim(strtoupper(stripHTMLtags($this->input->post('batas_utara', 'true')))),
            'pengajuan_batas_timur'         => trim(strtoupper(stripHTMLtags($this->input->post('batas_timur', 'true')))),
            'pengajuan_batas_selatan'       => trim(strtoupper(stripHTMLtags($this->input->post('batas_selatan', 'true')))),
            'pengajuan_batas_barat'         => trim(strtoupper(stripHTMLtags($this->input->post('batas_barat', 'true')))),
            'pengajuan_jarak_utara_selatan' => str_replace(",", "", $this->input->post('utara_selatan', 'true')),
            'pengajuan_jarak_barat_timur'   => str_replace(",", "", $this->input->post('barat_timur', 'true')),
            'pengajuan_jarak_kabupaten'     => str_replace(",", "", $this->input->post('jarak_kabupaten', 'true')),
            'pengajuan_jarak_provinsi'      => str_replace(",", "", $this->input->post('jarak_provinsi', 'true')),
            'pengajuan_tinggi'              => str_replace(",", "", $this->input->post('tinggi', 'true')),
            'pengajuan_iklim'               => trim(strtoupper(stripHTMLtags($this->input->post('iklim', 'true')))),
            'pengajuan_luas_sawah'          => str_replace(",", "", $this->input->post('tanah_sawah', 'true')),
            'pengajuan_luas_kering'         => str_replace(",", "", $this->input->post('tanah_kering', 'true')),
            'pengajuan_luas'                => (str_replace(",", "", $this->input->post('tanah_kering', 'true')) + str_replace(",", "", $this->input->post('tanah_sawah', 'true'))),
            'pengajuan_dusun'               => str_replace(",", "", $this->input->post('dusun', 'true')),
            'pengajuan_rt'                  => str_replace(",", "", $this->input->post('rt', 'true')),
            'pengajuan_rw'                  => str_replace(",", "", $this->input->post('rw', 'true')),
            'pengajuan_lk_aparat'           => str_replace(",", "", $this->input->post('aparat_lk', 'true')),
            'pengajuan_pr_aparat'           => str_replace(",", "", $this->input->post('aparat_pr', 'true')),
            'pengajuan_tps'                 => str_replace(",", "", $this->input->post('tps', 'true')),
            'pengajuan_pemilih_lk'          => str_replace(",", "", $this->input->post('pemilih_lk', 'true')),
            'pengajuan_pemilih_pr'          => str_replace(",", "", $this->input->post('pemilih_pr', 'true')),
            'pengajuan_nikah'               => str_replace(",", "", $this->input->post('nikah', 'true')),
            'pengajuan_cerai_gugat'         => str_replace(",", "", $this->input->post('cerai_gugat', 'true')),
            'pengajuan_cerai_talak'         => str_replace(",", "", $this->input->post('cerai_talak', 'true')),
            'pengajuan_lk_warga'            => str_replace(",", "", $this->input->post('warga_lk', 'true')),
            'pengajuan_pr_warga'            => str_replace(",", "", $this->input->post('warga_pr', 'true')),
            'pengajuan_kb'                  => str_replace(",", "", $this->input->post('kb', 'true')),
            'pengajuan_update'              => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_id', $pengajuan_id);
        $this->db->update('destaku_pengajuan', $data);
    }

    public function update_data_wisatawan()
    {
        $pengajuan_id = $this->input->post('id_wisatawan', 'true');
        $data         = array(
            'pengajuan_wisatawan_mancanegara'  => str_replace(",", "", $this->input->post('mancanegara', 'true')),
            'pengajuan_wisatawan_nusantara'    => str_replace(",", "", $this->input->post('nusantara', 'true')),
            'pengajuan_wisatawan_nama_desa'    => trim(strtoupper(stripHTMLtags($this->input->post('nama_desa', 'true')))),
            'pengajuan_wisatawan_alamat_desa'  => trim(strtoupper(stripHTMLtags($this->input->post('alamat_desa', 'true')))),
            'pengajuan_wisatawan_nama_lembaga' => trim(strtoupper(stripHTMLtags($this->input->post('nama_kelompok', 'true')))),
            'pengajuan_wisatawan_alamat'       => trim(strtoupper(stripHTMLtags($this->input->post('alamat', 'true')))),
            'pengajuan_wisatawan_no_sk'        => trim(strtoupper(stripHTMLtags($this->input->post('no_sk', 'true')))),
            'pengajuan_wisatawan_ketua'        => trim(strtoupper(stripHTMLtags($this->input->post('nama_ketua', 'true')))),
            'pengajuan_wisatawan_wakil_ketua'  => trim(strtoupper(stripHTMLtags($this->input->post('nama_wakil_ketua', 'true')))),
            'pengajuan_wisatawan_sekretaris'   => trim(strtoupper(stripHTMLtags($this->input->post('nama_sekretaris', 'true')))),
            'pengajuan_wisatawan_anggota_1'    => trim(strtoupper(stripHTMLtags($this->input->post('nama_anggota_1', 'true')))),
            'pengajuan_wisatawan_anggota_2'    => trim(strtoupper(stripHTMLtags($this->input->post('nama_anggota_2', 'true')))),
            'pengajuan_wisatawan_anggota_3'    => trim(strtoupper(stripHTMLtags($this->input->post('nama_anggota_3', 'true')))),
            'pengajuan_wisatawan_anggota_4'    => trim(strtoupper(stripHTMLtags($this->input->post('nama_anggota_4', 'true')))),
            'pengajuan_wisatawan_anggota_5'    => trim(strtoupper(stripHTMLtags($this->input->post('nama_anggota_5', 'true')))),
            'pengajuan_wisatawan_update'       => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_id', $pengajuan_id);
        $this->db->update('destaku_pengajuan_wisatawan', $data);
    }

    public function update_data_proposal()
    {
        $pengajuan_id = $this->input->post('id_proposal', 'true');
        $data         = array(
            'pengajuan_file_proposal' => $this->upload->file_name,
            'pengajuan_update'        => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_id', $pengajuan_id);
        $this->db->update('destaku_pengajuan', $data);
    }

    public function delete_data($id)
    {
        $this->db->where('pengajuan_id', $id);
        $this->db->delete('destaku_pengajuan');
    }

    // Tenaga Kerja
    private function _get_tenaga_kerja_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table1);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search1 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search1) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order1[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order1)) {
            $order = $this->order1;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_tenaga_kerja_datatables($pengajuan_id)
    {
        $this->_get_tenaga_kerja_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_tenaga_kerja_filtered($pengajuan_id)
    {
        $this->_get_tenaga_kerja_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_tenaga_kerja_all($pengajuan_id)
    {
        $this->db->from($this->table1);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_tenaga_kerja()
    {
        $data = array(
            'pengajuan_id'                  => trim(stripHTMLtags($this->input->post('pengajuan_id_tenaga_kerja', 'true'))),
            'tenaga_kerja_id'               => trim(stripHTMLtags($this->input->post('lstTenagaKerja', 'true'))),
            'pengajuan_tenaga_kerja_jumlah' => str_replace(",", "", $this->input->post('jumlah_tenaga', 'true')),
            'pengajuan_tenaga_kerja_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_tenaga_kerja', $data);
    }

    public function update_data_tenaga_kerja()
    {
        $pengajuan_tenaga_kerja_id = $this->input->post('pengajuan_tenaga_kerja_id', 'true');
        $data                      = array(
            'tenaga_kerja_id'               => trim(stripHTMLtags($this->input->post('lstTenagaKerja', 'true'))),
            'pengajuan_tenaga_kerja_jumlah' => str_replace(",", "", $this->input->post('jumlah_tenaga', 'true')),
            'pengajuan_tenaga_kerja_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_tenaga_kerja_id', $pengajuan_tenaga_kerja_id);
        $this->db->update('destaku_pengajuan_tenaga_kerja', $data);
    }

    public function delete_data_tenaga_kerja($id)
    {
        $this->db->where('pengajuan_tenaga_kerja_id', $id);
        $this->db->delete('destaku_pengajuan_tenaga_kerja');
    }

    // Pendidikan
    private function _get_pendidikan_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table2);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search2 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search2) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order2)) {
            $order = $this->order2;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_pendidikan_datatables($pengajuan_id)
    {
        $this->_get_pendidikan_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_pendidikan_filtered($pengajuan_id)
    {
        $this->_get_pendidikan_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_pendidikan_all($pengajuan_id)
    {
        $this->db->from($this->table2);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_pendidikan()
    {
        $data = array(
            'pengajuan_id'                => trim(stripHTMLtags($this->input->post('pengajuan_id_pendidikan', 'true'))),
            'pendidikan_id'               => trim(stripHTMLtags($this->input->post('lstPendidikan', 'true'))),
            'pengajuan_pendidikan_sarana' => str_replace(",", "", $this->input->post('jumlah_sarana', 'true')),
            'pengajuan_pendidikan_siswa'  => str_replace(",", "", $this->input->post('jumlah_siswa', 'true')),
            'pengajuan_pendidikan_guru'   => str_replace(",", "", $this->input->post('jumlah_guru', 'true')),
            'pengajuan_pendidikan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_pendidikan', $data);
    }

    public function update_data_pendidikan()
    {
        $pengajuan_pendidikan_id = $this->input->post('pengajuan_pendidikan_id', 'true');
        $data                    = array(
            'pendidikan_id'               => trim(stripHTMLtags($this->input->post('lstPendidikan', 'true'))),
            'pengajuan_pendidikan_sarana' => str_replace(",", "", $this->input->post('jumlah_sarana', 'true')),
            'pengajuan_pendidikan_siswa'  => str_replace(",", "", $this->input->post('jumlah_siswa', 'true')),
            'pengajuan_pendidikan_guru'   => str_replace(",", "", $this->input->post('jumlah_guru', 'true')),
            'pengajuan_pendidikan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_pendidikan_id', $pengajuan_pendidikan_id);
        $this->db->update('destaku_pengajuan_pendidikan', $data);
    }

    public function delete_data_pendidikan($id)
    {
        $this->db->where('pengajuan_pendidikan_id', $id);
        $this->db->delete('destaku_pengajuan_pendidikan');
    }

    // Hiburan
    private function _get_hiburan_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table3);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search3 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search3) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order3[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order3)) {
            $order = $this->order3;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_hiburan_datatables($pengajuan_id)
    {
        $this->_get_hiburan_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_hiburan_filtered($pengajuan_id)
    {
        $this->_get_hiburan_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_hiburan_all($pengajuan_id)
    {
        $this->db->from($this->table3);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_hiburan()
    {
        $data = array(
            'pengajuan_id'             => trim(stripHTMLtags($this->input->post('pengajuan_id_hiburan', 'true'))),
            'sarana_hiburan_id'        => trim(stripHTMLtags($this->input->post('lstHiburan', 'true'))),
            'pengajuan_hiburan_jumlah' => str_replace(",", "", $this->input->post('jumlah_hiburan', 'true')),
            'pengajuan_hiburan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_hiburan', $data);
    }

    public function update_data_hiburan()
    {
        $pengajuan_hiburan_id = $this->input->post('pengajuan_hiburan_id', 'true');
        $data                 = array(
            'sarana_hiburan_id'        => trim(stripHTMLtags($this->input->post('lstHiburan', 'true'))),
            'pengajuan_hiburan_jumlah' => str_replace(",", "", $this->input->post('jumlah_hiburan', 'true')),
            'pengajuan_hiburan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_hiburan_id', $pengajuan_hiburan_id);
        $this->db->update('destaku_pengajuan_hiburan', $data);
    }

    public function delete_data_hiburan($id)
    {
        $this->db->where('pengajuan_hiburan_id', $id);
        $this->db->delete('destaku_pengajuan_hiburan');
    }

    // Olahraga
    private function _get_olahraga_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table4);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search4 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search4) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order4[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order4)) {
            $order = $this->order4;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_olahraga_datatables($pengajuan_id)
    {
        $this->_get_olahraga_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_olahraga_filtered($pengajuan_id)
    {
        $this->_get_olahraga_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_olahraga_all($pengajuan_id)
    {
        $this->db->from($this->table4);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_olahraga()
    {
        $data = array(
            'pengajuan_id'              => trim(stripHTMLtags($this->input->post('pengajuan_id_olahraga', 'true'))),
            'sarana_olahraga_id'        => trim(stripHTMLtags($this->input->post('lstOlahraga', 'true'))),
            'pengajuan_olahraga_jumlah' => str_replace(",", "", $this->input->post('jumlah_olahraga', 'true')),
            'pengajuan_olahraga_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_olahraga', $data);
    }

    public function update_data_olahraga()
    {
        $pengajuan_olahraga_id = $this->input->post('pengajuan_olahraga_id', 'true');
        $data                  = array(
            'sarana_olahraga_id'        => trim(stripHTMLtags($this->input->post('lstOlahraga', 'true'))),
            'pengajuan_olahraga_jumlah' => str_replace(",", "", $this->input->post('jumlah_olahraga', 'true')),
            'pengajuan_olahraga_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_olahraga_id', $pengajuan_olahraga_id);
        $this->db->update('destaku_pengajuan_olahraga', $data);
    }

    public function delete_data_olahraga($id)
    {
        $this->db->where('pengajuan_olahraga_id', $id);
        $this->db->delete('destaku_pengajuan_olahraga');
    }

    // Kesehatan
    private function _get_kesehatan_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table5);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search5 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search5) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order5[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order5)) {
            $order = $this->order5;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_kesehatan_datatables($pengajuan_id)
    {
        $this->_get_kesehatan_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_kesehatan_filtered($pengajuan_id)
    {
        $this->_get_kesehatan_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_kesehatan_all($pengajuan_id)
    {
        $this->db->from($this->table5);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_kesehatan()
    {
        $data = array(
            'pengajuan_id'               => trim(stripHTMLtags($this->input->post('pengajuan_id_kesehatan', 'true'))),
            'kesehatan_id'               => trim(stripHTMLtags($this->input->post('lstKesehatan', 'true'))),
            'pengajuan_kesehatan_jumlah' => str_replace(",", "", $this->input->post('jumlah_kesehatan', 'true')),
            'pengajuan_kesehatan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_kesehatan', $data);
    }

    public function update_data_kesehatan()
    {
        $pengajuan_kesehatan_id = $this->input->post('pengajuan_kesehatan_id', 'true');
        $data                   = array(
            'kesehatan_id'               => trim(stripHTMLtags($this->input->post('lstKesehatan', 'true'))),
            'pengajuan_kesehatan_jumlah' => str_replace(",", "", $this->input->post('jumlah_kesehatan', 'true')),
            'pengajuan_kesehatan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_kesehatan_id', $pengajuan_kesehatan_id);
        $this->db->update('destaku_pengajuan_kesehatan', $data);
    }

    public function delete_data_kesehatan($id)
    {
        $this->db->where('pengajuan_kesehatan_id', $id);
        $this->db->delete('destaku_pengajuan_kesehatan');
    }

    // Ibadah
    private function _get_ibadah_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table6);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search6 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search6) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order6[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order6)) {
            $order = $this->order6;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_ibadah_datatables($pengajuan_id)
    {
        $this->_get_ibadah_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_ibadah_filtered($pengajuan_id)
    {
        $this->_get_ibadah_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_ibadah_all($pengajuan_id)
    {
        $this->db->from($this->table6);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_ibadah()
    {
        $data = array(
            'pengajuan_id'            => trim(stripHTMLtags($this->input->post('pengajuan_id_ibadah', 'true'))),
            'tempat_ibadah_id'        => trim(stripHTMLtags($this->input->post('lstIbadah', 'true'))),
            'pengajuan_ibadah_jumlah' => str_replace(",", "", $this->input->post('jumlah_ibadah', 'true')),
            'pengajuan_ibadah_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_ibadah', $data);
    }

    public function update_data_ibadah()
    {
        $pengajuan_ibadah_id = $this->input->post('pengajuan_ibadah_id', 'true');
        $data                = array(
            'tempat_ibadah_id'        => trim(stripHTMLtags($this->input->post('lstIbadah', 'true'))),
            'pengajuan_ibadah_jumlah' => str_replace(",", "", $this->input->post('jumlah_ibadah', 'true')),
            'pengajuan_ibadah_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_ibadah_id', $pengajuan_ibadah_id);
        $this->db->update('destaku_pengajuan_ibadah', $data);
    }

    public function delete_data_ibadah($id)
    {
        $this->db->where('pengajuan_ibadah_id', $id);
        $this->db->delete('destaku_pengajuan_ibadah');
    }

    // Pertanian
    private function _get_pertanian_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table7);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search7 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search7) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order7[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order7)) {
            $order = $this->order7;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_pertanian_datatables($pengajuan_id)
    {
        $this->_get_pertanian_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_pertanian_filtered($pengajuan_id)
    {
        $this->_get_pertanian_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_pertanian_all($pengajuan_id)
    {
        $this->db->from($this->table7);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_pertanian()
    {
        $data = array(
            'pengajuan_id'                 => trim(stripHTMLtags($this->input->post('pengajuan_id_pertanian', 'true'))),
            'pertanian_id'                 => trim(stripHTMLtags($this->input->post('lstPertanian', 'true'))),
            'pengajuan_pertanian_panen'    => str_replace(",", "", $this->input->post('jumlah_panen', 'true')),
            'pengajuan_pertanian_produksi' => str_replace(",", "", $this->input->post('jumlah_produksi', 'true')),
            'pengajuan_pertanian_update'   => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_pertanian', $data);
    }

    public function update_data_pertanian()
    {
        $pengajuan_pertanian_id = $this->input->post('pengajuan_pertanian_id', 'true');
        $data                   = array(
            'pertanian_id'                 => trim(stripHTMLtags($this->input->post('lstPertanian', 'true'))),
            'pengajuan_pertanian_panen'    => str_replace(",", "", $this->input->post('jumlah_panen', 'true')),
            'pengajuan_pertanian_produksi' => str_replace(",", "", $this->input->post('jumlah_produksi', 'true')),
            'pengajuan_pertanian_update'   => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_pertanian_id', $pengajuan_pertanian_id);
        $this->db->update('destaku_pengajuan_pertanian', $data);
    }

    public function delete_data_pertanian($id)
    {
        $this->db->where('pengajuan_pertanian_id', $id);
        $this->db->delete('destaku_pengajuan_pertanian');
    }

    // Palawija
    private function _get_palawija_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table8);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search8 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search8) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order8[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order8)) {
            $order = $this->order8;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_palawija_datatables($pengajuan_id)
    {
        $this->_get_palawija_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_palawija_filtered($pengajuan_id)
    {
        $this->_get_palawija_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_palawija_all($pengajuan_id)
    {
        $this->db->from($this->table8);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_palawija()
    {
        $data = array(
            'pengajuan_id'              => trim(stripHTMLtags($this->input->post('pengajuan_id_palawija', 'true'))),
            'pengajuan_palawija_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama_palawija', 'true')))),
            'pengajuan_palawija_jumlah' => str_replace(",", "", $this->input->post('jumlah_palawija', 'true')),
            'pengajuan_palawija_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_palawija', $data);
    }

    public function update_data_palawija()
    {
        $pengajuan_palawija_id = $this->input->post('pengajuan_palawija_id', 'true');
        $data                  = array(
            'pengajuan_palawija_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama_palawija', 'true')))),
            'pengajuan_palawija_jumlah' => str_replace(",", "", $this->input->post('jumlah_palawija', 'true')),
            'pengajuan_palawija_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_palawija_id', $pengajuan_palawija_id);
        $this->db->update('destaku_pengajuan_palawija', $data);
    }

    public function delete_data_palawija($id)
    {
        $this->db->where('pengajuan_palawija_id', $id);
        $this->db->delete('destaku_pengajuan_palawija');
    }

    // Perkebunan
    private function _get_perkebunan_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table9);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search9 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search9) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order9[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order9)) {
            $order = $this->order9;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_perkebunan_datatables($pengajuan_id)
    {
        $this->_get_perkebunan_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_perkebunan_filtered($pengajuan_id)
    {
        $this->_get_perkebunan_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_perkebunan_all($pengajuan_id)
    {
        $this->db->from($this->table9);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_perkebunan()
    {
        $data = array(
            'pengajuan_id'                => trim(stripHTMLtags($this->input->post('pengajuan_id_perkebunan', 'true'))),
            'pengajuan_perkebunan_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama_perkebunan', 'true')))),
            'pengajuan_perkebunan_jumlah' => str_replace(",", "", $this->input->post('jumlah_perkebunan', 'true')),
            'pengajuan_perkebunan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_perkebunan', $data);
    }

    public function update_data_perkebunan()
    {
        $pengajuan_perkebunan_id = $this->input->post('pengajuan_perkebunan_id', 'true');
        $data                    = array(
            'pengajuan_perkebunan_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama_perkebunan', 'true')))),
            'pengajuan_perkebunan_jumlah' => str_replace(",", "", $this->input->post('jumlah_perkebunan', 'true')),
            'pengajuan_perkebunan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_perkebunan_id', $pengajuan_perkebunan_id);
        $this->db->update('destaku_pengajuan_perkebunan', $data);
    }

    public function delete_data_perkebunan($id)
    {
        $this->db->where('pengajuan_perkebunan_id', $id);
        $this->db->delete('destaku_pengajuan_perkebunan');
    }

    // Peternakan
    private function _get_peternakan_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table10);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search10 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search10) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order10[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order10)) {
            $order = $this->order10;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_peternakan_datatables($pengajuan_id)
    {
        $this->_get_peternakan_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_peternakan_filtered($pengajuan_id)
    {
        $this->_get_peternakan_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_peternakan_all($pengajuan_id)
    {
        $this->db->from($this->table10);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_peternakan()
    {
        $data = array(
            'pengajuan_id'                => trim(stripHTMLtags($this->input->post('pengajuan_id_peternakan', 'true'))),
            'pengajuan_peternakan_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama_peternakan', 'true')))),
            'pengajuan_peternakan_jumlah' => str_replace(",", "", $this->input->post('jumlah_peternakan', 'true')),
            'pengajuan_peternakan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_peternakan', $data);
    }

    public function update_data_peternakan()
    {
        $pengajuan_peternakan_id = $this->input->post('pengajuan_peternakan_id', 'true');
        $data                    = array(
            'pengajuan_peternakan_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama_peternakan', 'true')))),
            'pengajuan_peternakan_jumlah' => str_replace(",", "", $this->input->post('jumlah_peternakan', 'true')),
            'pengajuan_peternakan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_peternakan_id', $pengajuan_peternakan_id);
        $this->db->update('destaku_pengajuan_peternakan', $data);
    }

    public function delete_data_peternakan($id)
    {
        $this->db->where('pengajuan_peternakan_id', $id);
        $this->db->delete('destaku_pengajuan_peternakan');
    }

    // Perikanan
    private function _get_perikanan_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table11);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search11 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search11) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order11[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order11)) {
            $order = $this->order11;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_perikanan_datatables($pengajuan_id)
    {
        $this->_get_perikanan_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_perikanan_filtered($pengajuan_id)
    {
        $this->_get_perikanan_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_perikanan_all($pengajuan_id)
    {
        $this->db->from($this->table11);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_perikanan()
    {
        $data = array(
            'pengajuan_id'               => trim(stripHTMLtags($this->input->post('pengajuan_id_perikanan', 'true'))),
            'pengajuan_perikanan_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama_perikanan', 'true')))),
            'pengajuan_perikanan_jumlah' => str_replace(",", "", $this->input->post('jumlah_perikanan', 'true')),
            'pengajuan_perikanan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_perikanan', $data);
    }

    public function update_data_perikanan()
    {
        $pengajuan_perikanan_id = $this->input->post('pengajuan_perikanan_id', 'true');
        $data                   = array(
            'pengajuan_perikanan_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama_perikanan', 'true')))),
            'pengajuan_perikanan_jumlah' => str_replace(",", "", $this->input->post('jumlah_perikanan', 'true')),
            'pengajuan_perikanan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_perikanan_id', $pengajuan_perikanan_id);
        $this->db->update('destaku_pengajuan_perikanan', $data);
    }

    public function delete_data_perikanan($id)
    {
        $this->db->where('pengajuan_perikanan_id', $id);
        $this->db->delete('destaku_pengajuan_perikanan');
    }

    // Industri
    private function _get_industri_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table12);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search12 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search12) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order12[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order12)) {
            $order = $this->order12;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_industri_datatables($pengajuan_id)
    {
        $this->_get_industri_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_industri_filtered($pengajuan_id)
    {
        $this->_get_industri_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_industri_all($pengajuan_id)
    {
        $this->db->from($this->table12);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_industri()
    {
        $data = array(
            'pengajuan_id'              => trim(stripHTMLtags($this->input->post('pengajuan_id_industri', 'true'))),
            'jenis_perusahaan_id'       => trim(stripHTMLtags($this->input->post('lstIndustri', 'true'))),
            'pengajuan_industri_jumlah' => str_replace(",", "", $this->input->post('jumlah_industri', 'true')),
            'pengajuan_industri_orang'  => str_replace(",", "", $this->input->post('jumlah_orang', 'true')),
            'pengajuan_industri_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_industri', $data);
    }

    public function update_data_industri()
    {
        $pengajuan_industri_id = $this->input->post('pengajuan_industri_id', 'true');
        $data                  = array(
            'jenis_perusahaan_id'       => trim(stripHTMLtags($this->input->post('lstIndustri', 'true'))),
            'pengajuan_industri_jumlah' => str_replace(",", "", $this->input->post('jumlah_industri', 'true')),
            'pengajuan_industri_orang'  => str_replace(",", "", $this->input->post('jumlah_orang', 'true')),
            'pengajuan_industri_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_industri_id', $pengajuan_industri_id);
        $this->db->update('destaku_pengajuan_industri', $data);
    }

    public function delete_data_industri($id)
    {
        $this->db->where('pengajuan_industri_id', $id);
        $this->db->delete('destaku_pengajuan_industri');
    }

    // Air
    private function _get_air_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table13);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search13 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search13) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order13[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order13)) {
            $order = $this->order13;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_air_datatables($pengajuan_id)
    {
        $this->_get_air_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_air_filtered($pengajuan_id)
    {
        $this->_get_air_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_air_all($pengajuan_id)
    {
        $this->db->from($this->table13);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_air()
    {
        $data = array(
            'pengajuan_id'         => trim(stripHTMLtags($this->input->post('pengajuan_id_air', 'true'))),
            'pengajuan_air_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama_air', 'true')))),
            'pengajuan_air_jumlah' => str_replace(",", "", $this->input->post('jumlah_air', 'true')),
            'pengajuan_air_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_air', $data);
    }

    public function update_data_air()
    {
        $pengajuan_air_id = $this->input->post('pengajuan_air_id', 'true');
        $data             = array(
            'pengajuan_air_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama_air', 'true')))),
            'pengajuan_air_jumlah' => str_replace(",", "", $this->input->post('jumlah_air', 'true')),
            'pengajuan_air_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_air_id', $pengajuan_air_id);
        $this->db->update('destaku_pengajuan_air', $data);
    }

    public function delete_data_air($id)
    {
        $this->db->where('pengajuan_air_id', $id);
        $this->db->delete('destaku_pengajuan_air');
    }

    // Jalan
    private function _get_jalan_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table14);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search14 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search14) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order14[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order14)) {
            $order = $this->order14;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_jalan_datatables($pengajuan_id)
    {
        $this->_get_jalan_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_jalan_filtered($pengajuan_id)
    {
        $this->_get_jalan_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_jalan_all($pengajuan_id)
    {
        $this->db->from($this->table14);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_jalan()
    {
        $data = array(
            'pengajuan_id'            => trim(stripHTMLtags($this->input->post('pengajuan_id_jalan', 'true'))),
            'pengajuan_jalan_nama'    => trim(strtoupper(stripHTMLtags($this->input->post('nama_jalan', 'true')))),
            'pengajuan_jalan_panjang' => str_replace(",", "", $this->input->post('jumlah_panjang', 'true')),
            'pengajuan_jalan_lebar'   => str_replace(",", "", $this->input->post('jumlah_lebar', 'true')),
            'pengajuan_jalan_update'  => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_jalan', $data);
    }

    public function update_data_jalan()
    {
        $pengajuan_jalan_id = $this->input->post('pengajuan_jalan_id', 'true');
        $data               = array(
            'pengajuan_jalan_nama'    => trim(strtoupper(stripHTMLtags($this->input->post('nama_jalan', 'true')))),
            'pengajuan_jalan_panjang' => str_replace(",", "", $this->input->post('jumlah_panjang', 'true')),
            'pengajuan_jalan_lebar'   => str_replace(",", "", $this->input->post('jumlah_lebar', 'true')),
            'pengajuan_jalan_update'  => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_jalan_id', $pengajuan_jalan_id);
        $this->db->update('destaku_pengajuan_jalan', $data);
    }

    public function delete_data_jalan($id)
    {
        $this->db->where('pengajuan_jalan_id', $id);
        $this->db->delete('destaku_pengajuan_jalan');
    }

    // Angkutan
    private function _get_angkutan_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table15);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search15 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search15) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order15[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order15)) {
            $order = $this->order15;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_angkutan_datatables($pengajuan_id)
    {
        $this->_get_angkutan_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_angkutan_filtered($pengajuan_id)
    {
        $this->_get_angkutan_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_angkutan_all($pengajuan_id)
    {
        $this->db->from($this->table15);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_angkutan()
    {
        $data = array(
            'pengajuan_id'              => trim(stripHTMLtags($this->input->post('pengajuan_id_angkutan', 'true'))),
            'angkutan_darat_id'         => trim(stripHTMLtags($this->input->post('lstAngkutan', 'true'))),
            'pengajuan_angkutan_jumlah' => str_replace(",", "", $this->input->post('jumlah_angkutan', 'true')),
            'pengajuan_angkutan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_angkutan', $data);
    }

    public function update_data_angkutan()
    {
        $pengajuan_angkutan_id = $this->input->post('pengajuan_angkutan_id', 'true');
        $data                  = array(
            'angkutan_darat_id'         => trim(stripHTMLtags($this->input->post('lstAngkutan', 'true'))),
            'pengajuan_angkutan_jumlah' => str_replace(",", "", $this->input->post('jumlah_angkutan', 'true')),
            'pengajuan_angkutan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_angkutan_id', $pengajuan_angkutan_id);
        $this->db->update('destaku_pengajuan_angkutan', $data);
    }

    public function delete_data_angkutan($id)
    {
        $this->db->where('pengajuan_angkutan_id', $id);
        $this->db->delete('destaku_pengajuan_angkutan');
    }

    // Telekomunikasi
    private function _get_telekomunikasi_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table16);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search16 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search16) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order16[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order16)) {
            $order = $this->order16;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_telekomunikasi_datatables($pengajuan_id)
    {
        $this->_get_telekomunikasi_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_telekomunikasi_filtered($pengajuan_id)
    {
        $this->_get_telekomunikasi_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_telekomunikasi_all($pengajuan_id)
    {
        $this->db->from($this->table16);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_telekomunikasi()
    {
        $data = array(
            'pengajuan_id'                    => trim(stripHTMLtags($this->input->post('pengajuan_id_telekomunikasi', 'true'))),
            'telekomunikasi_id'               => trim(stripHTMLtags($this->input->post('lstTelekomunikasi', 'true'))),
            'pengajuan_telekomunikasi_jumlah' => str_replace(",", "", $this->input->post('jumlah_telekomunikasi', 'true')),
            'pengajuan_telekomunikasi_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_telekomunikasi', $data);
    }

    public function update_data_telekomunikasi()
    {
        $pengajuan_telekomunikasi_id = $this->input->post('pengajuan_telekomunikasi_id', 'true');
        $data                        = array(
            'telekomunikasi_id'               => trim(stripHTMLtags($this->input->post('lstTelekomunikasi', 'true'))),
            'pengajuan_telekomunikasi_jumlah' => str_replace(",", "", $this->input->post('jumlah_telekomunikasi', 'true')),
            'pengajuan_telekomunikasi_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_telekomunikasi_id', $pengajuan_telekomunikasi_id);
        $this->db->update('destaku_pengajuan_telekomunikasi', $data);
    }

    public function delete_data_telekomunikasi($id)
    {
        $this->db->where('pengajuan_telekomunikasi_id', $id);
        $this->db->delete('destaku_pengajuan_telekomunikasi');
    }

    // Perdagangan
    private function _get_perdagangan_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table17);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search17 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search17) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order17[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order17)) {
            $order = $this->order17;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_perdagangan_datatables($pengajuan_id)
    {
        $this->_get_perdagangan_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_perdagangan_filtered($pengajuan_id)
    {
        $this->_get_perdagangan_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_perdagangan_all($pengajuan_id)
    {
        $this->db->from($this->table17);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_perdagangan()
    {
        $data = array(
            'pengajuan_id'                 => trim(stripHTMLtags($this->input->post('pengajuan_id_perdagangan', 'true'))),
            'perdagangan_id'               => trim(stripHTMLtags($this->input->post('lstPerdagangan', 'true'))),
            'pengajuan_perdagangan_jumlah' => str_replace(",", "", $this->input->post('jumlah_perdagangan', 'true')),
            'pengajuan_perdagangan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_perdagangan', $data);
    }

    public function update_data_perdagangan()
    {
        $pengajuan_perdagangan_id = $this->input->post('pengajuan_perdagangan_id', 'true');
        $data                     = array(
            'perdagangan_id'               => trim(stripHTMLtags($this->input->post('lstPerdagangan', 'true'))),
            'pengajuan_perdagangan_jumlah' => str_replace(",", "", $this->input->post('jumlah_perdagangan', 'true')),
            'pengajuan_perdagangan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_perdagangan_id', $pengajuan_perdagangan_id);
        $this->db->update('destaku_pengajuan_perdagangan', $data);
    }

    public function delete_data_perdagangan($id)
    {
        $this->db->where('pengajuan_perdagangan_id', $id);
        $this->db->delete('destaku_pengajuan_perdagangan');
    }

    // Wisata Alam
    private function _get_wisata_alam_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table18);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search18 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search18) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order18[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order18)) {
            $order = $this->order18;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_wisata_alam_datatables($pengajuan_id)
    {
        $this->_get_wisata_alam_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_wisata_alam_filtered($pengajuan_id)
    {
        $this->_get_wisata_alam_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_wisata_alam_all($pengajuan_id)
    {
        $this->db->from($this->table18);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_alam()
    {
        $data = array(
            'pengajuan_id'                 => trim(stripHTMLtags($this->input->post('pengajuan_id_alam', 'true'))),
            'pengajuan_wisata_alam_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama_alam', 'true')))),
            'pengajuan_wisata_alam_tema'   => trim(strtoupper(stripHTMLtags($this->input->post('tema_alam', 'true')))),
            'pengajuan_wisata_alam_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_wisata_alam', $data);
    }

    public function insert_data_foto_alam()
    {
        $data = array(
            'pengajuan_wisata_alam_id'          => trim(stripHTMLtags($this->input->post('pengajuan_wisata_alam_id', 'true'))),
            'pengajuan_wisata_alam_foto_file'   => $this->upload->file_name,
            'pengajuan_wisata_alam_foto_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_wisata_alam_foto', $data);
    }

    public function update_data_alam()
    {
        $pengajuan_wisata_alam_id = $this->input->post('pengajuan_wisata_alam_id', 'true');
        $data                     = array(
            'pengajuan_wisata_alam_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama_alam', 'true')))),
            'pengajuan_wisata_alam_tema'   => trim(strtoupper(stripHTMLtags($this->input->post('tema_alam', 'true')))),
            'pengajuan_wisata_alam_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_wisata_alam_id', $pengajuan_wisata_alam_id);
        $this->db->update('destaku_pengajuan_wisata_alam', $data);
    }

    public function delete_data_alam($id)
    {
        $this->db->where('pengajuan_wisata_alam_id', $id);
        $this->db->delete('destaku_pengajuan_wisata_alam');
    }

    public function delete_data_foto_alam($id)
    {
        $this->db->where('pengajuan_wisata_alam_foto_id', $id);
        $this->db->delete('destaku_pengajuan_wisata_alam_foto');
    }

    // Wisata Budaya
    private function _get_wisata_budaya_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table19);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search19 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search19) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order19[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order19)) {
            $order = $this->order19;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_wisata_budaya_datatables($pengajuan_id)
    {
        $this->_get_wisata_budaya_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_wisata_budaya_filtered($pengajuan_id)
    {
        $this->_get_wisata_budaya_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_wisata_budaya_all($pengajuan_id)
    {
        $this->db->from($this->table19);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_budaya()
    {
        $data = array(
            'pengajuan_id'                   => trim(stripHTMLtags($this->input->post('pengajuan_id_budaya', 'true'))),
            'pengajuan_wisata_budaya_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama_budaya', 'true')))),
            'pengajuan_wisata_budaya_tema'   => trim(strtoupper(stripHTMLtags($this->input->post('tema_budaya', 'true')))),
            'pengajuan_wisata_budaya_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_wisata_budaya', $data);
    }

    public function insert_data_foto_budaya()
    {
        $data = array(
            'pengajuan_wisata_budaya_id'          => trim(stripHTMLtags($this->input->post('pengajuan_wisata_budaya_id', 'true'))),
            'pengajuan_wisata_budaya_foto_file'   => $this->upload->file_name,
            'pengajuan_wisata_budaya_foto_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_wisata_budaya_foto', $data);
    }

    public function update_data_budaya()
    {
        $pengajuan_wisata_budaya_id = $this->input->post('pengajuan_wisata_budaya_id', 'true');
        $data                       = array(
            'pengajuan_wisata_budaya_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama_budaya', 'true')))),
            'pengajuan_wisata_budaya_tema'   => trim(strtoupper(stripHTMLtags($this->input->post('tema_budaya', 'true')))),
            'pengajuan_wisata_budaya_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_wisata_budaya_id', $pengajuan_wisata_budaya_id);
        $this->db->update('destaku_pengajuan_wisata_budaya', $data);
    }

    public function delete_data_budaya($id)
    {
        $this->db->where('pengajuan_wisata_budaya_id', $id);
        $this->db->delete('destaku_pengajuan_wisata_budaya');
    }

    public function delete_data_foto_budaya($id)
    {
        $this->db->where('pengajuan_wisata_budaya_foto_id', $id);
        $this->db->delete('destaku_pengajuan_wisata_budaya_foto');
    }

    // Wisata Buatan
    private function _get_wisata_buatan_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table20);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search20 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search20) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order20[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order20)) {
            $order = $this->order20;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_wisata_buatan_datatables($pengajuan_id)
    {
        $this->_get_wisata_buatan_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_wisata_buatan_filtered($pengajuan_id)
    {
        $this->_get_wisata_buatan_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_wisata_buatan_all($pengajuan_id)
    {
        $this->db->from($this->table20);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function insert_data_buatan()
    {
        $data = array(
            'pengajuan_id'                   => trim(stripHTMLtags($this->input->post('pengajuan_id_buatan', 'true'))),
            'pengajuan_wisata_buatan_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama_buatan', 'true')))),
            'pengajuan_wisata_buatan_tema'   => trim(strtoupper(stripHTMLtags($this->input->post('tema_buatan', 'true')))),
            'pengajuan_wisata_buatan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_wisata_buatan', $data);
    }

    public function insert_data_foto_buatan()
    {
        $data = array(
            'pengajuan_wisata_buatan_id'          => trim(stripHTMLtags($this->input->post('pengajuan_wisata_buatan_id', 'true'))),
            'pengajuan_wisata_buatan_foto_file'   => $this->upload->file_name,
            'pengajuan_wisata_buatan_foto_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_pengajuan_wisata_buatan_foto', $data);
    }

    public function update_data_buatan()
    {
        $pengajuan_wisata_buatan_id = $this->input->post('pengajuan_wisata_buatan_id', 'true');
        $data                       = array(
            'pengajuan_wisata_buatan_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama_buatan', 'true')))),
            'pengajuan_wisata_buatan_tema'   => trim(strtoupper(stripHTMLtags($this->input->post('tema_buatan', 'true')))),
            'pengajuan_wisata_buatan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_wisata_buatan_id', $pengajuan_wisata_buatan_id);
        $this->db->update('destaku_pengajuan_wisata_buatan', $data);
    }

    public function delete_data_buatan($id)
    {
        $this->db->where('pengajuan_wisata_buatan_id', $id);
        $this->db->delete('destaku_pengajuan_wisata_buatan');
    }

    public function delete_data_foto_buatan($id)
    {
        $this->db->where('pengajuan_wisata_buatan_foto_id', $id);
        $this->db->delete('destaku_pengajuan_wisata_buatan_foto');
    }

    // RTRW
    private function _get_rtrw_datatables_query($pengajuan_id, $rtrw_grup_id)
    {
        $this->db->from($this->table21);
        $this->db->where('pengajuan_id', $pengajuan_id);
        $this->db->where('rtrw_grup_id', $rtrw_grup_id);

        $i = 0;
        foreach ($this->column_search21 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search21) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order21[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order21)) {
            $order = $this->order21;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_rtrw_datatables($pengajuan_id, $rtrw_grup_id)
    {
        $this->_get_rtrw_datatables_query($pengajuan_id, $rtrw_grup_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_rtrw_filtered($pengajuan_id, $rtrw_grup_id)
    {
        $this->_get_rtrw_datatables_query($pengajuan_id, $rtrw_grup_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_rtrw_all($pengajuan_id, $rtrw_grup_id)
    {
        $this->db->from($this->table21);
        $this->db->where('pengajuan_id', $pengajuan_id);
        $this->db->where('rtrw_grup_id', $rtrw_grup_id);

        return $this->db->count_all_results();
    }

    // Berkas
    private function _get_berkas_datatables_query($pengajuan_id)
    {
        $this->db->from($this->table22);
        $this->db->where('pengajuan_id', $pengajuan_id);

        $i = 0;
        foreach ($this->column_search22 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search22) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order22[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order22)) {
            $order = $this->order22;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_berkas_datatables($pengajuan_id)
    {
        $this->_get_berkas_datatables_query($pengajuan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_berkas_filtered($pengajuan_id)
    {
        $this->_get_berkas_datatables_query($pengajuan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_berkas_all($pengajuan_id)
    {
        $this->db->from($this->table22);
        $this->db->where('pengajuan_id', $pengajuan_id);

        return $this->db->count_all_results();
    }

    public function update_data_berkas()
    {
        $pengajuan_berkas_id = $this->input->post('pengajuan_berkas_id', 'true');
        $data                = array(
            'pengajuan_berkas_file'   => $this->upload->file_name,
            'pengajuan_berkas_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('pengajuan_berkas_id', $pengajuan_berkas_id);
        $this->db->update('destaku_pengajuan_berkas', $data);
    }

    // Foto Alam
    private function _get_wisata_alam_foto_datatables_query($pengajuan_wisata_alam_id)
    {
        $this->db->from($this->table23);
        $this->db->where('pengajuan_wisata_alam_id', $pengajuan_wisata_alam_id);

        $i = 0;
        foreach ($this->column_search23 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search23) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order23[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order23)) {
            $order = $this->order23;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_wisata_alam_foto_datatables($pengajuan_wisata_alam_id)
    {
        $this->_get_wisata_alam_foto_datatables_query($pengajuan_wisata_alam_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_wisata_alam_foto_filtered($pengajuan_wisata_alam_id)
    {
        $this->_get_wisata_alam_foto_datatables_query($pengajuan_wisata_alam_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_wisata_alam_foto_all($pengajuan_wisata_alam_id)
    {
        $this->db->from($this->table23);
        $this->db->where('pengajuan_wisata_alam_id', $pengajuan_wisata_alam_id);

        return $this->db->count_all_results();
    }

    // Foto Budaya
    private function _get_wisata_budaya_foto_datatables_query($pengajuan_wisata_budaya_id)
    {
        $this->db->from($this->table25);
        $this->db->where('pengajuan_wisata_budaya_id', $pengajuan_wisata_budaya_id);

        $i = 0;
        foreach ($this->column_search25 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search25) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order25[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order25)) {
            $order = $this->order25;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_wisata_budaya_foto_datatables($pengajuan_wisata_budaya_id)
    {
        $this->_get_wisata_budaya_foto_datatables_query($pengajuan_wisata_budaya_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_wisata_budaya_foto_filtered($pengajuan_wisata_budaya_id)
    {
        $this->_get_wisata_budaya_foto_datatables_query($pengajuan_wisata_budaya_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_wisata_budaya_foto_all($pengajuan_wisata_budaya_id)
    {
        $this->db->from($this->table25);
        $this->db->where('pengajuan_wisata_budaya_id', $pengajuan_wisata_budaya_id);

        return $this->db->count_all_results();
    }

    // Foto Buatan
    private function _get_wisata_buatan_foto_datatables_query($pengajuan_wisata_buatan_id)
    {
        $this->db->from($this->table24);
        $this->db->where('pengajuan_wisata_buatan_id', $pengajuan_wisata_buatan_id);

        $i = 0;
        foreach ($this->column_search24 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search24) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order24[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order24)) {
            $order = $this->order24;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_wisata_buatan_foto_datatables($pengajuan_wisata_buatan_id)
    {
        $this->_get_wisata_buatan_foto_datatables_query($pengajuan_wisata_buatan_id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_wisata_buatan_foto_filtered($pengajuan_wisata_buatan_id)
    {
        $this->_get_wisata_buatan_foto_datatables_query($pengajuan_wisata_buatan_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_wisata_buatan_foto_all($pengajuan_wisata_buatan_id)
    {
        $this->db->from($this->table24);
        $this->db->where('pengajuan_wisata_buatan_id', $pengajuan_wisata_buatan_id);

        return $this->db->count_all_results();
    }
}
/* Location: ./application/model/member/Pengajuan_m.php */
