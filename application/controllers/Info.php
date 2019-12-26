<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
        login();
    }
    public function akun()
    {
        $data['title'] = 'Akun User';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['akun'] = $this->Menu_model->getAllAkun();
        $this->load->view('template/header', $data);
        $this->load->view('template/side_menu', $data);
        $this->load->view('info/akun');
        $this->load->view('template/footer');
    }

    public function tambahakun()
    {
        $data['title'] = 'Tambah Akun';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['akun'] = $this->Menu_model->getAllAkun();
        $data['lev'] = $this->db->get('level')->result_array();
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]', ['required' => 'Username Harus Diisi', 'is_unique' => 'Username Sudah Terpakai']);
        $this->form_validation->set_rules('password', 'Username', 'trim|required|min_length[3]', ['required' => 'Password Harus Diisi', 'min_length' => 'Password Terlalu Pendek']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/side_menu', $data);
            $this->load->view('info/tambah_akun');
            $this->load->view('template/footer');
        } else {
            $data = [
                'id_level' => $this->input->post('level', true),
                'username' => $this->input->post('username', true),
                'password' => $this->input->post('password', true)
            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('akun', 'Tambahkan');
            redirect('info/akun');
        }
    }

    public function editakun($id)
    {
        $data['title'] = 'Edit Akun';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['akun'] = $this->Menu_model->getAllAkun();
        $data['us'] = $this->db->get_where('users', ['id_user' => $id])->row_array($id);
        $data['lev'] = $this->db->get('level')->result_array();
        $this->form_validation->set_rules('username', 'Username', 'trim|required', ['required' => 'Username Harus Diisi']);
        $this->form_validation->set_rules('password', 'Username', 'trim|required|min_length[4]', ['required' => 'Password Harus Diisi', 'min_length' => 'Password Terlalu Pendek']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/side_menu', $data);
            $this->load->view('info/edit_akun');
            $this->load->view('template/footer');
        } else {
            $data = [
                'id_level' => $this->input->post('level', true),
                'username' => $this->input->post('username', true),
                'password' => $this->input->post('password', true)
            ];
            $this->db->where('id_user', $id);
            $this->db->update('users', $data);
            $this->session->set_flashdata('akun', 'Ubah');
            redirect('info/akun');
        }
    }

    public function hapusakun($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('users');
        $this->session->set_flashdata('akun', 'Hapus');
        redirect('info/akun');
    }

    public function gantipass()
    {
        $data['title'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('curentpassword', 'Curent Password', 'required|trim|min_length[4]', ['required' => 'Curent Password Tidak Boleh Kosong', 'min_length' => 'Password Terlalu Pendek']);
        $this->form_validation->set_rules('newpassword', 'New Password', 'required|trim|min_length[4]|matches[repeatpassword]', ['required' => 'New Password Tidak Boleh Kosong', 'min_length' => 'Password Terlalu Pendek', 'matches' => 'Password Tidak Sama']);
        $this->form_validation->set_rules('repeatpassword', 'Repeat Password', 'required|trim', ['required' => 'Repeat Password Tidak Boleh Kosong']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/side_menu', $data);
            $this->load->view('info/edit_password');
            $this->load->view('template/footer');
        } else {
            $curentpass = $this->input->post('curentpassword');
            $newpass = $this->input->post('newpassword');
            if ($curentpass != $data['user']['password']) {
                $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
				Current Password Salah!
				</div>');
                redirect('info/gantipass');
            } else {
                if ($curentpass == $newpass) {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
                    Password Baru Tidak Boleh Sama
                    </div>');
                    redirect('info/gantipass');
                } else {
                    $this->db->set('password', $newpass);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('users');
                    $this->session->set_flashdata('error', '<div class="alert alert-success" role="alert">
                    Password Berhasil Diubah
                    </div>');
                    redirect('info/gantipass');
                }
            }
        }
    }
}
