<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pembelian_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data = array(
            'title' => 'View Data Pembelian',
            'userlog' => infoLogin(),
            'pembelian' => $this->Pembelian_model->getAll(),
            'content' => 'pembelian/index'
        );
        $this->load->view('template/main', $data);
    }
    public function add()
    {
        $data = array(
            'title' => 'Tambah Data Pembelian',
            'supplier' => $this->db->get('supplier')->result_array(),
            'content' => 'pembelian/add_form',

        );
        $this->load->view('template/main', $data);
    }

    public function save()
    {
        $this->Pembelian_model->save();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data pembelian Berhasil DiSimpan");
        }
        redirect('pembelian');
    }

    public function edit()
    {
        $this->Pembelian_model->editData();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data pembelian Berhasil Diupdate");
        }
        redirect('pembelian');
    }

    public function getedit($id)
    {
        $data = array(
            'title' => 'Update Data Kategori',
            'supplier' => $this->db->get('supplier')->result_array(),
            'pembelian' => $this->Pembelian_model->getById($id),
            'content' => 'pembelian/edit_form'
        );
        $this->load->view('template/main', $data);
    }

    function delete($id)
    {
        $this->Pembelian_model->delete($id);
        redirect('pembelian');
    }

    public function laporan()
    {
        $data = array(
            'title' => 'Tambah Laporan Data Pembelian',
            'content' => 'pembelian/laporan'
        );
        $this->load->view(
            "template/main",
            $data
        );

    }

}