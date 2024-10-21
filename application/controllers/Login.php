<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'email', 'required trim');
        $this->form_validation->set_rules('password', 'Password', 'required trim');
        $this->load->view('login/index');
    }
}