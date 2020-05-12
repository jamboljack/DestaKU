<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitigasi_m extends CI_Model
{
    public $table         = 'destaku_mitigasi';
    public $column_order  = array(null, null, null, 'mitigasi_nama');
    public $column_search = array('mitigasi_nama');
    public $order         = array('mitigasi_nama' => 'asc');

    public $table1         = 'destaku_mitigasi_pilihan';
    public $column_order1  = array(null, null, null, 'mitigasi_pilihan_nama');
    public $column_search1 = array('mitigasi_pilihan_nama');
    public $order1         = array('mitigasi_pilihan_nama' => 'asc');

    public $table2         = 'v_mitigasi_detail';
    public $column_order2  = array(null, null, 'mitigasi_detail_nama', null);
    public $column_search2 = array('mitigasi_detail_nama');
    public $order2         = array('mitigasi_detail_id' => 'asc');

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query()
    {
        $this->db->from($this->table);

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
        return $this->db->count_all_results();
    }

    public function insert_data()
    {
        $data = array(
            'mitigasi_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'mitigasi_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_mitigasi', $data);
    }

    public function update_data()
    {
        $mitigasi_id = $this->input->post('id', 'true');
        $data        = array(
            'mitigasi_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'mitigasi_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('mitigasi_id', $mitigasi_id);
        $this->db->update('destaku_mitigasi', $data);
    }

    public function delete_data($id)
    {
        $this->db->where('mitigasi_id', $id);
        $this->db->delete('destaku_mitigasi');
    }

    // Pilihan
    private function _get_pilihan_datatables_query($id)
    {
        $this->db->from($this->table1);
        $this->db->where('mitigasi_id', $id);

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

    public function get_pilihan_datatables($id)
    {
        $this->_get_pilihan_datatables_query($id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_pilihan_filtered($id)
    {
        $this->_get_pilihan_datatables_query($id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_pilihan_all($id)
    {
        $this->db->from($this->table1);
        $this->db->where('mitigasi_id', $id);

        return $this->db->count_all_results();
    }

    public function insert_data_pilihan()
    {
        $data = array(
            'mitigasi_id'             => stripHTMLtags($this->input->post('mitigasi_id', 'true')),
            'mitigasi_pilihan_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'mitigasi_pilihan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_mitigasi_pilihan', $data);
    }

    public function update_data_pilihan()
    {
        $mitigasi_pilihan_id = $this->input->post('id', 'true');
        $data                = array(
            'mitigasi_pilihan_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'mitigasi_pilihan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('mitigasi_pilihan_id', $mitigasi_pilihan_id);
        $this->db->update('destaku_mitigasi_pilihan', $data);
    }

    public function delete_data_pilihan($id)
    {
        $this->db->where('mitigasi_pilihan_id', $id);
        $this->db->delete('destaku_mitigasi_pilihan');
    }

    // Detail
    private function _get_detail_datatables_query($id)
    {
        $this->db->from($this->table2);
        $this->db->where('mitigasi_pilihan_id', $id);

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

    public function get_detail_datatables($id)
    {
        $this->_get_detail_datatables_query($id);
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_detail_filtered($id)
    {
        $this->_get_detail_datatables_query($id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_detail_all($id)
    {
        $this->db->from($this->table2);
        $this->db->where('mitigasi_pilihan_id', $id);

        return $this->db->count_all_results();
    }

    public function insert_data_detail()
    {
        $data = array(
            'mitigasi_pilihan_id'    => stripHTMLtags($this->input->post('mitigasi_pilihan_id', 'true')),
            'mitigasi_detail_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'mitigasi_detail_tipe'   => $this->input->post('lstStatus', 'true'),
            'mitigasi_detail_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_mitigasi_detail', $data);
    }

    public function update_data_detail()
    {
        $mitigasi_detail_id = $this->input->post('id', 'true');
        $data               = array(
            'mitigasi_detail_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'mitigasi_detail_tipe'   => $this->input->post('lstStatus', 'true'),
            'mitigasi_detail_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('mitigasi_detail_id', $mitigasi_detail_id);
        $this->db->update('destaku_mitigasi_detail', $data);
    }

    public function delete_data_detail($id)
    {
        $this->db->where('mitigasi_detail_id', $id);
        $this->db->delete('destaku_mitigasi_detail');
    }
}
/* Location: ./application/models/admin/Mitigasi_m.php */
