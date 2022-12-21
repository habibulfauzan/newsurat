<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HalamanPengajuanSurat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Akun', 'Akun');
        $this->load->model('Surat', 'Surat');
    }
    public function tampil()
    {
        $data['title'] = 'Pengajuan Surat';
        $data['user'] = $this->Akun->getUser();
        if (!$this->session->userdata('nik')) {
            redirect('HalamanLogin/tampil');
        }

        // echo 'Selamat datang ' . $data['user']['nama'];
        $role = $this->session->userdata('roleId');
        //admin
        if ($role == 1) {
            $data['dataSktm'] = $this->Surat->getSktm();
            $data['dataSkd'] = $this->Surat->getSkd();
            $data['dataSkk'] = $this->Surat->getSkk();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/administrator', $data);
            $this->load->view('administrator/HalamanPengajuanSurat', $data);
            $this->load->view('templates/footer');
        }
        // lurah 
        elseif ($role == 2) {
            $data['dataSktm'] = $this->Surat->getSktm();
            $data['dataSkd'] = $this->Surat->getSkd();
            $data['dataSkk'] = $this->Surat->getSkk();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/lurah', $data);
            $this->load->view('lurah/HalamanPengajuanSurat', $data);
            $this->load->view('templates/footer');
        }
        // masyarakat
        else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/masyarakat', $data);
            $this->load->view('masyarakat/HalamanPengajuanSurat', $data);
            $this->load->view('templates/footer');
        }
    }

    public function updateSktm($id)
    {
        $this->Surat->updateSktm($id);
        $this->session->set_flashdata('success', 'Status Pengajuan SKTM dengan ID: ' . $id . ' telah diupdate!');
        redirect(base_url('HalamanPengajuanSurat/tampil'));
    }

    public function updateSkd($id)
    {
        $this->Surat->updateSkd($id);
        $this->session->set_flashdata('success', 'Status Pengajuan SKD dengan ID: ' . $id . ' telah diupdate!');
        redirect(base_url('HalamanPengajuanSurat/tampil'));
    }

    public function updateSkk($id)
    {
        $this->Surat->updateSkk($id);
        $this->session->set_flashdata('success', 'Status Pengajuan SKK dengan ID: ' . $id . ' telah diupdate!');
        redirect(base_url('HalamanPengajuanSurat/tampil'));
    }
}
