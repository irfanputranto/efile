<?php
class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
}
class Superadmin_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //   echo 'This is from superadmin controller';
    }
}

class Public_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        // $this->load->view('template/side_menu');
    }

    function callMenu($parentId)
    {
        $data = $this->Menu_model->get_menu_tree($parentId);
        $result = json_decode(json_encode($data), true);
        $menuArsip = "";
        foreach ($result as $m) {
            if ($m['Child'] != '0') {
                $menuArsip .= "
                <li>
                    <a href='#' aria-expanded='true'><i class='fa fa-folder'></i><span>" . $m['Menu'] . "</span></a>
                    ";
            } else {
                $menuArsip .= "
                <li>
                    <a href='" . base_url('file_arsip/tampilfile?menuId=' . $m['menu_id']) . "'><i class='fa fa-file'></i><span>" . $m['Menu'] . "</a>
                    </span>
                </li>
                ";
            }
            $menuArsip .= "
            <ul class='collapse'>
                " . $this->callMenu($m['menu_id']) . "
            </ul>
            ";
            $menuArsip .= "</li>";
        }
        return $menuArsip;
    }

    function menu0()
    {
        $q = urldecode($this->input->get('q', true));
        // $start = intval($this->input->get('start'));
        $menuId = urldecode($this->input->get('menuId'));
        // var_dump($menuId);
        if ($q <> '') {
            $config['base_url'] = base_url() . 'file_arsip/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'file_arsip/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'file_arsip/index.html';
            $config['first_url'] = base_url() . 'file_arsip/index.html';
        }
        $data['title'] = 'Arsip';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['file'] = $this->File_model->getAllMenuc($menuId);
        $this->load->view('template/header', $data);
        $this->load->view('template/side_menu', $data);
        $this->load->view('file/menua', $data);
        $this->load->view('template/footer');
    }

    function menu1()
    {
        $q = urldecode($this->input->get('q', true));
        // $start = intval($this->input->get('start'));
        $menuId = urldecode($this->input->get('menuId'));
        // var_dump($menuId);
        if ($q <> '') {
            $config['base_url'] = base_url() . 'file_arsip/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'file_arsip/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'file_arsip/index.html';
            $config['first_url'] = base_url() . 'file_arsip/index.html';
        }
        $data['title'] = 'Arsip B';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        // $data['file'] = $this->File_model->getArsipAgenda($menuId);
        $data['file'] = $this->db->get_where('arsip', ['menu_id' => $menuId])->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/side_menu', $data);
        $this->load->view('file/menub', $data);
        $this->load->view('template/footer');
    }

    function menu2()
    {
        $q = urldecode($this->input->get('q', true));
        // $start = intval($this->input->get('start'));
        $menuId = urldecode($this->input->get('menuId'));
        // var_dump($menuId);
        if ($q <> '') {
            $config['base_url'] = base_url() . 'file_arsip/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'file_arsip/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'file_arsip/index.html';
            $config['first_url'] = base_url() . 'file_arsip/index.html';
        }
        $data['title'] = 'Arsip C';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['file'] = $this->File_model->getArsipAgenda($menuId);

        $this->load->view('template/header', $data);
        $this->load->view('template/side_menu', $data);
        $this->load->view('file/menuc', $data);
        $this->load->view('template/footer');
    }
}
