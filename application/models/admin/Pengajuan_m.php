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
    public $column_order1  = array(null, null, null);
    public $column_search1 = array();
    public $order1         = array('tenaga_kerja_nama' => 'asc');

    public $table2         = 'v_pendidikan';
    public $column_order2  = array(null, null, null, null, null);
    public $column_search2 = array();
    public $order2         = array('pendidikan_nama' => 'asc');

    public $table3         = 'v_hiburan';
    public $column_order3  = array(null, null, null);
    public $column_search3 = array();
    public $order3         = array('sarana_hiburan_nama' => 'asc');

    public $table4         = 'v_olahraga';
    public $column_order4  = array(null, null, null);
    public $column_search4 = array();
    public $order4         = array('sarana_olahraga_nama' => 'asc');

    public $table5         = 'v_kesehatan';
    public $column_order5  = array(null, null, null);
    public $column_search5 = array();
    public $order5         = array('kesehatan_nama' => 'asc');

    public $table6         = 'v_ibadah';
    public $column_order6  = array(null, null, null);
    public $column_search6 = array();
    public $order6         = array('tempat_ibadah_nama' => 'asc');

    public $table7         = 'v_pertanian';
    public $column_order7  = array(null, null, null, null);
    public $column_search7 = array();
    public $order7         = array('pertanian_nama' => 'asc');

    public $table8         = 'destaku_pengajuan_palawija';
    public $column_order8  = array(null, null, null);
    public $column_search8 = array();
    public $order8         = array('pengajuan_palawija_nama' => 'asc');

    public $table9         = 'destaku_pengajuan_perkebunan';
    public $column_order9  = array(null, null, null);
    public $column_search9 = array();
    public $order9         = array('pengajuan_perkebunan_nama' => 'asc');

    public $table10         = 'destaku_pengajuan_peternakan';
    public $column_order10  = array(null, null, null);
    public $column_search10 = array();
    public $order10         = array('pengajuan_peternakan_nama' => 'asc');

    public $table11         = 'destaku_pengajuan_perikanan';
    public $column_order11  = array(null, null, null);
    public $column_search11 = array();
    public $order11         = array('pengajuan_perikanan_nama' => 'asc');

    public $table12         = 'v_industri';
    public $column_order12  = array(null, null, null, null);
    public $column_search12 = array();
    public $order12         = array('jenis_perusahaan_nama' => 'asc');

    public $table13         = 'destaku_pengajuan_air';
    public $column_order13  = array(null, null, null);
    public $column_search13 = array();
    public $order13         = array('pengajuan_air_nama' => 'asc');

    public $table14         = 'destaku_pengajuan_jalan';
    public $column_order14  = array(null, null, null);
    public $column_search14 = array();
    public $order14         = array('pengajuan_jalan_nama' => 'asc');

    public $table15         = 'v_angkutan';
    public $column_order15  = array(null, null, null);
    public $column_search15 = array();
    public $order15         = array('angkutan_darat_nama' => 'asc');

    public $table16         = 'v_telekomunikasi';
    public $column_order16  = array(null, null, null);
    public $column_search16 = array();
    public $order16         = array('telekomunikasi_nama' => 'asc');

    public $table17         = 'v_perdagangan';
    public $column_order17  = array(null, null, null);
    public $column_search17 = array();
    public $order17         = array('perdagangan_nama' => 'asc');

    public $table18         = 'destaku_pengajuan_wisata_alam';
    public $column_order18  = array(null, null, null, null);
    public $column_search18 = array();
    public $order18         = array('pengajuan_wisata_alam_nama' => 'asc');

    public $table19         = 'destaku_pengajuan_wisata_budaya';
    public $column_order19  = array(null, null, null, null);
    public $column_search19 = array();
    public $order19         = array('pengajuan_wisata_budaya_nama' => 'asc');

    public $table20         = 'destaku_pengajuan_wisata_buatan';
    public $column_order20  = array(null, null, null, null);
    public $column_search20 = array();
    public $order20         = array('pengajuan_wisata_buatan_nama' => 'asc');

    public $table21         = 'v_rtrw';
    public $column_order21  = array(null, null, null);
    public $column_search21 = array();
    public $order21         = array('rtrw_detail_nama' => 'asc');

    public $table22         = 'v_berkas';
    public $column_order22  = array(null, null, 'berkas_nama', null);
    public $column_search22 = array();
    public $order22         = array('berkas_nama' => 'asc');

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query()
    {
        if ($this->input->post('tgl_dari', 'true')) {
            $dari = date('Y-m-d', strtotime($this->input->post('tgl_dari', 'true')));
            $this->db->where('pengajuan_tanggal >=', $dari);
        }
        if ($this->input->post('tgl_sampai', 'true')) {
            $sampai = date('Y-m-d', strtotime($this->input->post('tgl_sampai', 'true')));
            $this->db->where('pengajuan_tanggal <=', $sampai);
        }
        if ($this->input->post('lstStatus', 'true')) {
            $this->db->where('pengajuan_status', $this->input->post('lstStatus', 'true'));
        }
        if ($this->input->post('lstBobot', 'true')) {
            $this->db->where('bobot_id', $this->input->post('lstBobot', 'true'));
        }

        $this->db->from($this->table);
        $this->db->where('pengajuan_status !=', 'D');

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
        $this->db->from($this->table);
        $this->db->where('pengajuan_status !=', 'D');

        return $this->db->count_all_results();
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
}
/* Location: ./application/model/member/Pengajuan_m.php */
