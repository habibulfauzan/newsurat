<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HalamanDashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Akun', 'Akun');
        if (!$this->session->userdata('nik')) {
            redirect('HalamanLogin/tampil');
        }
    }

    public function admin()
    {
        $data['title'] = 'Dashboard Admin';
        $data['user'] = $this->Akun->getUser();
        // $data['user'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();

        // echo 'Selamat datang ' . $data['user']['nama'];

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        $this->load->view('administrator/HalamanDashboard', $data);
        $this->load->view('templates/footer');
    }

    public function lurah()
    {
        $data['title'] = 'Dashboard Lurah';
        $data['user'] = $this->Akun->getUser();

        // echo 'Selamat datang ' . $data['user']['nama'];

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        $this->load->view('lurah/HalamanDashboard', $data);
        $this->load->view('templates/footer');
    }

    public function masyarakat()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->Akun->getUser();

        // echo 'Selamat datang ' . $data['user']['nama'];

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        $this->load->view('masyarakat/HalamanDashboard', $data);
        $this->load->view('templates/footer');
    }
}
