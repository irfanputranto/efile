<?php
defined('BASEPATH') or exit('No direct script access allowed');

class File_arsip extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('File_model');
        $this->load->library('form_validation');
        login();
    }
    public function tampilfile()
    {
        $menuId = urldecode($this->input->get('menuId'));
        $user = $this->db->get_where('menu', ['menu_id' => $menuId])->row_array();
        $_user = get_instance();
        if ($user['class_id'] == 0) {
            echo $_user->menu0();
        } else if ($user['class_id'] == 1) {
            echo $_user->menu1();
        } else if ($user['class_id'] == 2) {
            echo $_user->menu2();
        }
    }

    public function get_row_arsip($menuid)
    {
        $row = $this->File_model->menuName($menuid);
        return $row['menu_name'];
    }

    public function getallparenmenu($menuid)
    {
        $row = $this->File_model->getAllParentMenu($menuid);
        if ($row == null) {
            $row == null;
        }
        return $row;
    }

    public function getidmenu($menuid)
    {
        $query = $this->File_model->getArsipMenu($menuid);
        return $query['menu_id'];
    }

    public function getmenuparent($menuid)
    {
        $a = array();
        $parent = "";
        // $cek;
        $id = $menuid;
        do {
            $id = $this->getallparenmenu($id);
            if ($id != null) {
                $par = $id->Child;
                $idmen = $id->idmenu;
                $id = $id->ParentID;

                $a[] = $idmen;
                $b[] = $par;
            }
        } while ($id != null);
        $x = count($a);
        $x--;
        for ($i = $x; $i >= 0; $i--) {
            $queryCount = $this->db->query(" SELECT COUNT(parent_id) AS jml_anak FROM menu WHERE parent_id = '$a[$i]'")->row();
            $jml =  $queryCount->jml_anak;

            if ($jml != 0) {
                $parent .= "<a href='" . base_url('file_arsip/exploler/') . $a[$i] . "' class='text-dark'> &nbsp;<i class='fa fa-folder'></i> " .  $b[$i] . "</a> <span>/</span>";
            } else {
                $parent .= "<a href='" . base_url('file_arsip/tampilfile?menuId=') . $a[$i] . "' class='text-dark' > &nbsp;<i class='fa fa-folder'></i> " .  $b[$i] . "</a><span>/</span>";
            }
        }
        return $parent;
    }

    function upload()
    {
        $output_dir = "./upload/";
        $fileName = $_FILES["file"];
        $this->session->set_userdata('filename', $fileName);
        if (isset($fileName)) {
            $ret = array();
            $error = $_FILES["file"]["error"];
            $name = $_FILES["file"];
            // if (file_exists("./upload/" . $name)) {
            //   unlink("./upload/" . $name);
            //   echo "<font face='Verdana' size='2' >Last Uploaded File has been removed from uploads folder<br>back to uploadform agian and upload your file<br>";
            // }
            if (!is_array($_FILES["file"]["name"])) //single file
            {
                $fileName = $_FILES["file"]["name"];
                move_uploaded_file($_FILES["file"]["tmp_name"], $output_dir . $fileName);
                $ret[] = $fileName;
            } else  //Multiple files, file[]
            {
                $fileCount = count($_FILES["file"]["name"]);
                for ($i = 0; $i < $fileCount; $i++) {
                    $fileName = $_FILES["file"]["name"][$i];
                    move_uploaded_file($_FILES["file"]["tmp_name"][$i], $output_dir . $fileName);
                    $ret[] = $fileName;
                }
            }
            echo json_encode($ret);
        }
    }

    public function delfile()
    {
        $output_dir = "./upload/";
        if (isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name'])) {
            $fileName = $_POST['name'];
            $fileName = str_replace("..", ".", $fileName); //required. if somebody is trying parent folder files	
            $filePath = $output_dir . $fileName;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $this->session->unset_userdata('filename');
            echo "Deleted File " . $fileName . "<br>";
        }
    }


    public function add_arsipa()
    {
        $data['title'] = 'Tambah Arsip';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $menuId = urldecode($this->input->get('menuId'));
        $idd = $this->getidmenu($menuId);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', ['required' => 'Deskripsi Harus Diisi']);
        // $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', ['required' => 'Deskripsi Harus Diisi']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/side_menu', $data);
            $this->load->view('file/tambah_arsipa', $data);
            $this->load->view('template/footer');
        } else {
            $this->File_model->addFileArsip();
            $this->session->set_flashdata('berhasil', 'Ditambahkan');
            redirect('file_arsip/tampilfile' . '?menuId=' . $idd);
        }
    }

    public function hapusarsipfile($id)
    {
        $user = $this->db->get_where('arsip', ['id_arsip' => $id])->row_array();
        $file = $user['loc_file'];
        $idd = $user['menu_id'];

        if (@unlink(FCPATH . 'upload/' . $file) == TRUE) {
            $this->db->where('id_arsip', $id);
            $this->db->delete('arsip');
        } else {
            $this->db->where('id_arsip', $id);
            $this->db->delete('arsip');
        }
        $this->session->set_flashdata('berhasil', 'Hapus');
        redirect('file_arsip/tampilfile' . '?menuId=' . $idd);
    }

    public function editarsipa($id)
    {
        $data['title'] = 'Edit Arsip';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->db->get_where('arsip', ['id_arsip' => $id])->row_array();
        $idd = $data['menu']['menu_id'];
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', ['required' => 'Deskripsi Harus Diisi']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/side_menu', $data);
            $this->load->view('file/edit_arsipa', $data);
            $this->load->view('template/footer');
        } else {
            $this->File_model->ubahFileArsip($id);
            $this->session->set_flashdata('berhasil', 'Ubah');
            redirect('file_arsip/tampilfile' . '?menuId=' . $idd);
        }
    }

    public function download($namafile)
    {
        $folder = 'upload/';
        force_download($folder . $namafile, null);
    }

    public function search()
    {
        $data['title'] = 'Cari File';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $cari = $this->input->post('search');
        $data['cari'] = $this->File_model->cariArsip($cari);
        $this->load->view('template/header', $data);
        $this->load->view('template/side_menu', $data);
        $this->load->view('file/cari_arsip', $data);
        $this->load->view('template/footer');
    }

    public function exploler($id)
    {
        $data['title'] = 'Explorer Menu';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['exploler'] = $this->db->get_where('menu', ['parent_id' => $id])->result_array();
        $data['menus'] = $this->getmenuparent($id);
        $this->load->view('template/header', $data);
        $this->load->view('template/side_menu', $data);
        $this->load->view('menu/exploler', $data);
        $this->load->view('template/footer');
    }

    public function searchfileftp()
    {
        $fileftp = array();
        $x = 0;
        $ambilfileftp = opendir("./ftp/");
        while (($entry = readdir($ambilfileftp)) !== false) {
            if ($entry != '.' && $entry != '..') {
                $fileftp[$x] = $entry;
                $x++;
            }
        }
        return $fileftp;
    }

    public function ambilisiftp()
    {
        $a = $this->searchfileftp();
        $length = count($a);
        $output = '';
        $output .= '
        <select name="select_file_ftp" class="form-control menuTree" id="">
        <option value="">Select</option>';
        foreach ($a as $r) {
            $output .= '<option value="' . $r . '">' . $r . '</option>';
        }
        $output .= '</select> ';
        echo $output;
    }
}
