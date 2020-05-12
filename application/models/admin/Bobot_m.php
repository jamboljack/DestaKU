<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bobot_m extends CI_Model
{
    public $table         = 'destaku_bobot';
    public $column_order  = array(null, null, 'bobot_nama', 'bobot_minimal', 'bobot_maksimal');
    public $column_search = array('bobot_nama');
    public $order         = array('bobot_nama' => 'asc');

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
            'bobot_nama'     => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'bobot_minimal'  => str_replace(",", "", $this->input->post('minimal', 'true')),
            'bobot_maksimal' => str_replace(",", "", $this->input->post('maksimal', 'true')),
            'bobot_update'   => date('Y-m-d H:i:s'),
        );

        $this->db->insert('destaku_bobot', $data);
    }

    public function update_data()
    {
        $bobot_id = $this->input->post('id', 'true');
        $data     = array(
            'bobot_nama'     => trim(strtoupper(stripHTMLtags($this->input->post('nama', 'true')))),
            'bobot_minimal'  => str_replace(",", "", $this->input->post('minimal', 'true')),
            'bobot_maksimal' => str_replace(",", "", $this->input->post('maksimal', 'true')),
            'bobot_update'   => date('Y-m-d H:i:s'),
        );

        $this->db->where('bobot_id', $bobot_id);
        $this->db->update('destaku_bobot', $data);
    }

    public function delete_data($id)
    {
        $this->db->where('bobot_id', $id);
        $this->db->delete('destaku_bobot');
    }
}
/* Location: ./application/models/admin/Bobot_m.php */
