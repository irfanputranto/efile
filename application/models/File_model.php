<?php
defined('BASEPATH') or exit('No direct script access allowed');

class File_model extends CI_Model
{
    public function getArsipAgenda($id)
    {
        $query = $this->db->query("SELECT * FROM arsip RIGHT JOIN agenda ON
            arsip.id_agenda = agenda.id_agenda where agenda.menu_id = $id")->result_array();
        return $query;
    }

    public function getAllMenuc($menuId)
    {
        $query = $this->db->get_where('arsip', ['menu_id' => $menuId])->result_array();
        return $query;
    }

    public function menuName($menu_id)
    {
        $query = $this->db->get_where('menu', ['menu_id' => $menu_id])->row_array();
        return $query;
    }

    public function getArsipMenu($menuid)
    {
        $query = $this->db->get_where('menu', ['menu_id' => $menuid])->row_array();
        return $query;
    }

    public function getAllParentMenu($menu_id)
    {
        $sql = "SELECT M1.menu_name as Child, parent_id AS ParentID, menu_id as idmenu, (
        SELECT menu_name
        FROM menu
        WHERE menu_id = M1.parent_id) AS Parent
        FROM menu AS M1
        WHERE menu_id =" . $menu_id;
        $data = $this->db->query($sql);
        return $data->row();
    }

    public function addFileArsip()
    {
        $iddm = htmlspecialchars($this->input->post('id_menu', true));
        $fileftp = htmlspecialchars($this->input->post('select_file_ftp', true));
        $desk = htmlspecialchars($this->input->post('deskripsi', true));
        $nosurat = htmlspecialchars($this->input->post('nosurat', true));
        $user = htmlspecialchars($this->input->post('user', true));

        $images = $this->session->userdata('filename');
        if ($images) {
            $img = $images['name'];
            $tandabaca = array(
                ' ',
                ',',
                '(',
                ')',
                '/',
                '<',
                '>',
            );
            $image = str_replace($tandabaca, '_', $img);
            rename('./upload/' . $img, './upload/' . $image);
            $data = [
                'menu_id' => $iddm,
                'loc_file' => $image,
                'desc_file' => $desk,
                'nama_file' => $nosurat,
                'log_user' => $user
            ];
        } elseif ($fileftp != null) {
            $tandabaca = array(
                ' ',
                ',',
                '(',
                ')',
                '/',
                '<',
                '>',
            );
            $filename = str_replace($tandabaca, '_', $fileftp);
            rename('./ftp/' . $fileftp, './upload/' . $filename);
            $data = [
                'menu_id' => $iddm,
                'loc_file' => $filename,
                'desc_file' => $desk,
                'nama_file' => $nosurat,
                'log_user' => $user
            ];
        } else {
            $error = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>File</strong> Gagal Ditambahkan.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            $this->session->set_flashdata('img_gagal', $error);
            redirect('file_arsip/tampilfile' . '?menuId=' . $iddm);
        }
        $this->db->insert('arsip', $data);
        $this->session->unset_userdata('filename');
    }

    public function ubahFileArsip($id)
    {
        $query = $this->db->get_where('arsip', ['id_arsip' => $id])->row_array();
        $iddm = $this->input->post('id_menu', true);
        $fileftp = htmlspecialchars($this->input->post('select_file_ftp', true));
        $user = $this->input->post('user', true);
        $desk = $this->input->post('deskripsi', true);
        $nosurat = $this->input->post('nosurat', true);
        $images = $this->session->userdata('filename');
        $img = $images['name'];
        // $image_new = '';
        $file = $query['loc_file'];

        if ($img != '') {
            if (@unlink(FCPATH . 'upload/' . $file) == TRUE) {
                $tandabaca = array(
                    ' ',
                    ',',
                    '(',
                    ')',
                    '/',
                    '<',
                    '>',
                );
                $image = str_replace($tandabaca, '_', $img);
                rename('./upload/' . $img, './upload/' . $image);
                $data = [
                    // 'menu_id' => $iddm,
                    'loc_file' => $image,
                    'desc_file' => $desk,
                    'nama_file' => $nosurat,
                    'log_user' => $user
                ];
                $this->db->where('id_arsip', $id);
                $this->db->update('arsip', $data);
            }
        } elseif ($fileftp != '') {
            if (@unlink(FCPATH . 'upload/' . $file) == TRUE) {
                $tandabaca = array(
                    ' ',
                    ',',
                    '(',
                    ')',
                    '/',
                    '<',
                    '>',
                );
                $filename = str_replace($tandabaca, '_', $fileftp);
                rename('./ftp/' . $fileftp, './upload/' . $filename);
                $data = [
                    'menu_id' => $iddm,
                    'loc_file' => $filename,
                    'desc_file' => $desk,
                    'nama_file' => $nosurat,
                    'log_user' => $user
                ];
                $this->db->where('id_arsip', $id);
                $this->db->update('arsip', $data);
            }
        } else {
            $data = [
                'menu_id' => $iddm,
                // 'loc_file' => $filename,
                'desc_file' => $desk,
                'nama_file' => $nosurat,
                'log_user' => $user
            ];
            $this->db->where('id_arsip', $id);
            $this->db->update('arsip', $data);
            $this->session->unset_userdata('filename');
        }
    }

    public function cariArsip($cari)
    {
        $this->db->like('desc_file', $cari);
        $this->db->or_like('nama_file', $cari);
        $query = $this->db->get('arsip')->result_array();
        return $query;
    }
}
