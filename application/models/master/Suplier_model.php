<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Suplier_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function insert($table, $data)
    {
        $this->db->trans_start();
        $this->db->insert($table, $data);
        $this->db->trans_complete();
    }

    public function update($table, $data, $where)
    {
        $this->db->trans_start();
        $this->db->update($table, $data, $where);
        $this->db->trans_complete();
    }

    public function delete($table, $where)
    {
        $this->db->trans_start();
        $this->db->delete($table, $where);
        $this->db->trans_complete();
    }

    public function getData($table, $where)
    {
        return $this->db->select('*')->from($table)->where($where)->get();
    }

    public function getDataAll($table)
    {
        return $this->db->select('*')->from($table)->get();
    }



    public function querySuplierDtTb()
    {
        $column_order = array(null, 'name', 'name_company', 'jenis_supplier', 'address', 'city', 'province');
        $column_search = array('name', 'name_company', 'jenis_supplier', 'address', 'city', 'province');
        $order = array('id' => 'DESC');

        $this->db->select('*')->from('supliers')->where('is_deleted', 0);

        $i = 0;

        foreach ($column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // Jika datatable mengirimkan pencarian dengan metode POST
            {
                if ($i == 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($order)) {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function dataSuplier()
    {
        $this->querySuplierDtTb();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function countDataSuplier()
    {
        $this->querySuplierDtTb();
        $query = $this->db->get();
        return $query->num_rows();
    }
}
