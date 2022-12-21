<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RiwayatPengajuanSurat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('Surat', 'Surat');
        $this->load->model('Akun', 'Akun');
        if (!$this->session->userdata('nik')) {
            redirect('HalamanLogin/tampil');
        }
    }
    public function index()
    {
        $data['title'] = 'RIWAYAT PENGAJUAN SURAT';
        $data['user'] = $this->Akun->getUser();
        // $data['user'] = $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();

        // $role = $this->session->userdata('roleId');
        $data['surat_user'] = $this->Surat->showSurat();
        $data['surat_user2'] = $this->Surat->showSurat2();
        $data['surat_user3'] = $this->Surat->showSurat3();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/masyarakat', $data);
        $this->load->view('RiwayatPengajuanSurat', $data);
        $this->load->view('templates/footer');
    }
}
