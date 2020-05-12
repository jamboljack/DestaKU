<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rtrw_m extends CI_Model
{
    public $table         = 'destaku_rtrw_grup';
    public $column_order  = array(null, null, null, 'rtrw_grup_nama');
    public $column_search = array('rtrw_grup_nama');
    public $order         = array('rtrw_grup_nama' => 'asc');

    public $table1         = 'destaku_rtrw_detail';
    public $column_order1  = array(null, null, 'rtrw_detail_nama');
    public $column_search1 = array('rtrw_detail_nama');
    public $order1         = array('rtrw_detail_nama' => 'asc');

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
            'rtrw_grup_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'rtrw_grup_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_rtrw_grup', $data);
    }

    public function update_data()
    {
        $rtrw_grup_id = $this->input->post('id', 'true');
        $data         = array(
            'rtrw_grup_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'rtrw_grup_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('rtrw_grup_id', $rtrw_grup_id);
        $this->db->update('destaku_rtrw_grup', $data);
    }

    public function delete_data($id)
    {
        $this->db->where('rtrw_grup_id', $id);
        $this->db->delete('destaku_rtrw_grup');
    }

    // Detail
    private function _get_detail_datatables_query($id)
    {
        $this->db->from($this->table1);
        $this->db->where('rtrw_grup_id', $id);

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
        $this->db->where('rtrw_grup_id', $id);

        return $this->db->count_all_results();
    }

    public function insert_data_detail()
    {
        $data = array(
            'rtrw_grup_id'       => stripHTMLtags($this->input->post('rtrw_grup_id', 'true')),
            'rtrw_detail_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'rtrw_detail_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_rtrw_detail', $data);
    }

    public function update_data_detail()
    {
        $rtrw_detail_id = $this->input->post('id', 'true');
        $data           = array(
            'rtrw_detail_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'rtrw_detail_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('rtrw_detail_id', $rtrw_detail_id);
        $this->db->update('destaku_rtrw_detail', $data);
    }

    public function delete_data_detail($id)
    {
        $this->db->where('rtrw_detail_id', $id);
        $this->db->delete('destaku_rtrw_detail');
    }
}
/* Location: ./application/models/admin/Rtrw_m.php */
