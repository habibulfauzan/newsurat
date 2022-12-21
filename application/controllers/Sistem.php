<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sistem extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Akun', 'Akun');
        $this->load->model('Surat', 'Surat');
    }
    public function index()
    {
    }
    public function logout()
    {
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('roleId');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Logout Berhasil! </div>');
        redirect('HalamanLogin/tampil');
    }

    public function cetakSurat($id)
    {
        $data['dataSktm'] = $this->Surat->cetakSktm($id);
        $data['dataSkd'] = $this->Surat->cetakSkd($id);
        // $data['dataSktm'] = $this->Surat->cetakSktm($id);
        $this->load->view('surat/surat', $data);
    }
}
