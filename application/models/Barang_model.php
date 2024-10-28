<?php defined('BASEPATH') or exit('No direct script access allowed');
class Barang_model extends CI_Model
{
    protected $_table = "barang";
    protected $primary = "id";
    public function getAll()
    {

        $sql = "SELECT a.id, a.barcode, a.name, b.name AS satuan, c.name AS kategori, a.harga_beli, a.harga_jual, a.stok FROM ((barang a LEFT JOIN satuan b ON a.
        satuan_id = b.id) LEFT JOIN kategori c ON a.kategori_id = c.id)";
        return $this->db->query($sql)->result();
    }

    public function save()
    {
        $data = array(
            'barkode' => htmlspecialchars($this->input->post('barkode'), true),
            'name' => htmlspecialchars($this->input->post('name'), true),
            'harga_bell' => htmlspecialchars($this->input->post('harga_beli'), true),
            'harga_jual' => htmlspecialchars($this->input->post('harga_jual'), true),
            'stok' => htmlspecialchars($this->input->post('stok'), true),
            'kategori_id' => htmlspecialchars($this->input->post('kategori'), true),
            'satuan_id' => htmlspecialchars($this->input->post('satuan'), true),
            'supplier_id' => htmlspecialchars($this->input->post('supplier'), true),
            'user_id' => $this->session->userdata("id"),
            //$this->session->userdata("userid')
        );
        return $this->db->insert($this->_table, $data);
    }
}