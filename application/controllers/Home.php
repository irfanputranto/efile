<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
        login();
    }
    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/side_menu', $data);
        // $this->load->view('template/top_bar', $data);
        $this->load->view('home/home', $data);
        $this->load->view('template/footer');
    }
}
