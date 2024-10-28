<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data = array(
            'title' => 'View Data Kategori',
            'userlog' => infoLogin(),
            'kategori' => $this->Kategori_model->getAll(),
            'content' => 'kategori/index'
        );
        $this->load->view('template/main', $data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Tambah Data Kategori',
            'content' => 'kategori/add_form'
        );
        $this->load->view('template/main', $data);
    }

    public function save()
    {
        $this->Kategori_model->save();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Kategori Berhasil DiSimpan");
        }
        redirect('kategori');
    }

    public function getedit($id)
    {
        $data = array(
            'title' => 'Update Data Kategori',
            'kategori' => $this->Kategori_model->getById($id),
            'content' => 'kategori/edit_form'
        );
        $this->load->view('template/main', $data);
    }

    public function edit()
    {
        $this->Kategori_model->editData();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data kategori Berhasil Diupdate");
        }
        redirect('kategori');
    }

    public function editData()
    {
        $id = $this->input->post('id');
        $data = array('name' => htmlspecialchars($this->input->post('name'), true));
        return $this->db->set($data)->where($this->primary, $id)->update($this->_table);
    }

    function delete($id)
    {
        $this->Kategori_model->delete($id);
        redirect('kategori');
    }

}