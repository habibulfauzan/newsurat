<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HalamanLogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Akun', 'Akun');
    }

    public function tampil()
    {
        //rules
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        //gagal
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/sistem_header', $data);
            $this->load->view('HalamanLogin');
            $this->load->view('templates/sistem_footer');
        } else {
            //validasi lolos
            $this->cekAkun();
        }
    }

    public function cekAkun()
    {
        $nik = $this->input->post(null, true);
        $password = $this->input->post('password');

        $cek = $this->Akun->cekUser($nik['nik']);

        if ($cek) {
            //cek password
            if ($password == $cek['password']) {
                $data = [
                    'nik' => $cek['nik'],
                    'roleId' => $cek['roleId']
                ];
                $this->session->set_userdata($data);
                //cek role 1 == admin, 2 == lurah, 3 == masyarakat
                if ($cek['roleId'] == 1) {
                    redirect('HalamanDashboard/admin');
                } elseif ($cek['roleId'] == 2) {
                    redirect('HalamanDashboard/lurah');
                } else {
                    redirect('HalamanDashboard/masyarakat');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Salah! </div>');
                redirect('HalamanLogin/tampil');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> NIK belum terdaftar! </div>');
            redirect('HalamanLogin/tampil');
        }
    }
}
