<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        // not_login();
        // $this->load->library('form_validation');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'Username Harus Diisi']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password Harus Diisi']);
        $user = $this->db->get_where('users', ['username' => $username])->row_array();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            if ($user) {
                if ($password == $user['password']) {
                    if ($user['id_level'] == 1) {
                        $data = [
                            'id_user' => $user['id_user'],
                            'username' => $user['username'],
                            'id_level' => $user['id_level']
                        ];
                        $this->session->set_userdata($data);
                        redirect('home');
                    } else if ($user['id_level'] == 2) {
                        $data = [
                            'id_user' => $user['id_user'],
                            'username' => $user['username'],
                            'id_level' => $user['id_level']
                        ];
                        $this->session->set_userdata($data);
                        redirect('home');
                    } else if ($user['id_level'] == 3) {
                        $data = [
                            'id_user' => $user['id_user'],
                            'username' => $user['username'],
                            'id_level' => $user['id_level']
                        ];
                        $this->session->set_userdata($data);
                        redirect('home');
                    }
                } else {
                    $this->session->set_flashdata('login', 'Password Salah');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('login', 'Username Salah');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        // $this->session->sess_destroy();
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_level');

        $this->session->set_flashdata('login', 'Berhasil Logout');
        redirect('auth');
    }
}
