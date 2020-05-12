<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Indikator_m extends CI_Model
{
    public $table         = 'destaku_indikator';
    public $column_order  = array(null, null, null, 'indikator_no', 'indikator_nama', null);
    public $column_search = array('indikator_nama');
    public $order         = array('indikator_no' => 'asc');

    public $table1         = 'destaku_indikator_detail';
    public $column_order1  = array(null, null, 'indikator_detail_nama', null);
    public $column_search1 = array('indikator_detail_nama');
    public $order1         = array('indikator_detail_nama' => 'asc');

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
            'indikator_no'     => trim(stripHTMLtags($this->input->post('no', 'true'))),
            'indikator_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'indikator_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_indikator', $data);
    }

    public function update_data()
    {
        $indikator_id = $this->input->post('id', 'true');
        $data         = array(
            'indikator_no'     => trim(stripHTMLtags($this->input->post('no', 'true'))),
            'indikator_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'indikator_status' => trim(stripHTMLtags($this->input->post('lstStatus', 'true'))),
            'indikator_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('indikator_id', $indikator_id);
        $this->db->update('destaku_indikator', $data);
    }

    public function delete_data($id)
    {
        $this->db->where('indikator_id', $id);
        $this->db->delete('destaku_indikator');
    }

    // Detail
    private function _get_detail_datatables_query($id)
    {
        $this->db->from($this->table1);
        $this->db->where('indikator_id', $id);

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
        $this->db->from($this->table1);
        $this->db->where('indikator_id', $id);

        return $this->db->count_all_results();
    }

    public function insert_data_detail()
    {
        $data = array(
            'indikator_id'            => stripHTMLtags($this->input->post('indikator_id', 'true')),
            'indikator_detail_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'indikator_detail_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_indikator_detail', $data);
    }

    public function update_data_detail()
    {
        $indikator_detail_id = $this->input->post('id', 'true');
        $data                = array(
            'indikator_detail_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'indikator_detail_status' => trim(stripHTMLtags($this->input->post('lstStatus', 'true'))),
            'indikator_detail_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('indikator_detail_id', $indikator_detail_id);
        $this->db->update('destaku_indikator_detail', $data);
    }

    public function delete_data_detail($id)
    {
        $this->db->where('indikator_detail_id', $id);
        $this->db->delete('destaku_indikator_detail');
    }
}
/* Location: ./application/models/admin/Indikator_m.php */
