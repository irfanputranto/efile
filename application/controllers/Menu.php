<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
        login();
    }
    public function index()
    {
        $data['title'] = 'Menu';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        // if ($this->input->post('cari')) {
        //     $data['keyword'] = $this->input->post('keyword');
        //     $this->session->set_userdata('keyword', $data['keyword']);
        // } else {
        //     $data['keyword'] = NULL;
        // }

        // $this->db->like('menu_name', $data['keyword']);
        // $this->db->from('menu');

        $data['total_rows'] = $this->Menu_model->countAllMenu();
        // $config['total_rows'] = $this->db->count_all_results();
        // $data['total_rows'] =  $config['total_rows'];
        // $config['per_page'] = 10;

        // $this->pagination->initialize($config);
        // $data['start'] = $this->uri->segment(3);
        // $data['menu'] = $this->Menu_model->getMenu($data['start'], $config['per_page']);
        $data['menu'] = $this->Menu_model->getMenuAll();
        $this->load->view('template/header', $data);
        $this->load->view('template/side_menu', $data);
        $this->load->view('menu/home', $data);
        $this->load->view('template/footer');
    }

    public function tambahmenu()
    {
        $data['title'] = 'Tambah Menu';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $db = $this->get_menu_option(0);
        $data['menu'] = $db;
        $this->load->view('template/header', $data);
        $this->load->view('template/side_menu', $data);
        $this->load->view('menu/tambah_menu', $data);
        $this->load->view('template/footer');
    }

    public function form_menu_option()
    {
        $id      = $this->input->post('id');
        $tes     = $this->input->post('tes');
        $data    = $this->get_menu_option($id);
        $output  = "";
        $output .= '
		<select name="menuTree" class="form-control menuTree mb-3" id="' . $tes . '">
		<option value="">Select</option>';

        // $id2 .= $id2 . $id;
        // echo $id2;
        foreach ($data as $r) {
            $output .= '<option value="' . $r['menu_id'] . '">' . $r['Menu'] . '</option>';
        }
        $output .= '</select>';
        echo $output;
    }

    public function get_menu_option($parent_id)
    {
        $data = $this->Menu_model->get_menu_tree($parent_id);
        return $data;
    }

    public function addmenu()
    {
        // $idAwal = 0;
        $namaSubject = $this->input->post('menu_name');
        $parentSubject = $this->input->post('parent_id');
        $data = [
            'menu_name' => $namaSubject,
            'parent_id' => $parentSubject,
            // 'parent_link' => $parentSubject,

            'link' => "#",
            'status' => "1"
        ];
        $this->db->insert('menu', $data);
    }

    public function editmenu($id)
    {
        $data['title'] = 'Edit Menu';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->Menu_model->getAllMenuById($id);

        $this->form_validation->set_rules('namamenu', 'Menu', 'required', ['required' => 'Menu Tidak Boleh Kosong Harus Diisi']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/side_menu', $data);
            $this->load->view('menu/ubah_menu', $data);
            $this->load->view('template/footer');
        } else {
            $this->Menu_model->ubahMenu($id);
            $this->session->set_flashdata('menu', 'Menu Berhasil diubah');
            redirect('menu');
        }
    }

    public function hapusmenu($id)
    {
        $this->db->where('menu_id', $id);
        $this->db->delete('menu');
        $this->session->set_flashdata('menu', 'Menu Berhasil dihapus');
        redirect('menu');
    }
}
