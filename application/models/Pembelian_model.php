<?php defined('BASEPATH') or exit('No direct script access allowed');
class pembelian_model extends CI_Model
{
    protected $_table = "pembelian";
    protected $primary = "id";
    public function getAll()
    {

        $sql = "SELECT tpembelian.id, tsupplier.name AS supplier, tpembelian.invoice, tpembelian.total, tpembelian.bayar, tpembelian.diskripsi, tpembelian.tanggal FROM (pembelian tpembelian LEFT JOIN supplier tsupplier ON tpembelian.supplier_id = tsupplier.id);";
        return $this->db->query($sql)->result();
    }

    public function save()
    {
        $data = array(
            'invoice' => htmlspecialchars($this->input->post('invoice'), true),
            'total' => htmlspecialchars($this->input->post('total'), true),
            'bayar' => htmlspecialchars($this->input->post('bayar'), true),
            'diskripsi' => htmlspecialchars($this->input->post('diskripsi'), true),
            'tanggal' => htmlspecialchars($this->input->post('tanggal'), true),
            'supplier_id' => htmlspecialchars($this->input->post('supplier'), true),
            'user_id' => $this->session->userdata("id"),
            //$this->session->userdata("userid')
        );
        return $this->db->insert($this->_table, $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }


    public function editData()
    {
        $id = $this->input->post('id');
        $data = array(
            'invoice' => htmlspecialchars($this->input->post('invoice'), true),
            'total' => htmlspecialchars($this->input->post('total'), true),
            'bayar' => htmlspecialchars($this->input->post('bayar'), true),
            'diskripsi' => htmlspecialchars($this->input->post('diskripsi'), true),
            'tanggal' => htmlspecialchars($this->input->post('tanggal'), true),
            'supplier_id' => htmlspecialchars($this->input->post('supplier'), true),
            'user_id' => $this->session->userdata("id"),
            //$this->session->userdata("userid')
        );
        return $this->db->set($data)->where($this->primary, $id)->update($this->_table);
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete($this->_table);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Kategori Berhasil DiDelete");
        }
    }
}