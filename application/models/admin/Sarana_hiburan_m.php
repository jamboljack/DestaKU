<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sarana_hiburan_m extends CI_Model
{
    public $table         = 'destaku_sarana_hiburan';
    public $column_order  = array(null, null, 'sarana_hiburan_nama');
    public $column_search = array('sarana_hiburan_nama');
    public $order         = array('sarana_hiburan_nama' => 'asc');

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
            'sarana_hiburan_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'sarana_hiburan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_sarana_hiburan', $data);
    }

    public function update_data()
    {
        $sarana_hiburan_id = $this->input->post('id', 'true');
        $data              = array(
            'sarana_hiburan_nama'   => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'sarana_hiburan_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('sarana_hiburan_id', $sarana_hiburan_id);
        $this->db->update('destaku_sarana_hiburan', $data);
    }

    public function delete_data($id)
    {
        $this->db->where('sarana_hiburan_id', $id);
        $this->db->delete('destaku_sarana_hiburan');
    }
}
/* Location: ./application/models/admin/Sarana_hiburan_m.php */
