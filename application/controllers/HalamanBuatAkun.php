<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HalamanBuatAkun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Akun', 'Akun');
    }
    public function tampil()
    {
        //rules nik
        $this->form_validation->set_rules(
            'nik',
            'NIK',
            'required|trim|is_unique[akun.nik]|exact_length[16]|numeric',
            [
                'is_unique' => 'NIK sudah terdaftar!'
            ]
        );
        //rules password
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');
        //rules email
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        //form_dropdown
        $data['options'] = [
            'islam' => 'Islam',
            'kristen' => 'Kristen',
            'hindu' => 'Hindu',
            'budha' => 'Budha'
        ];


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pendaftaran Akun';
            $this->load->view('templates/sistem_header', $data);
            $this->load->view('HalamanBuatAkun');
            $this->load->view('templates/sistem_footer');
        } else {
            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => htmlspecialchars($this->input->post('password', true)),
                // 'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'tempatlahir' => htmlspecialchars($this->input->post('tempatlahir', true)),
                'tanggallahir' => htmlspecialchars($this->input->post('tanggallahir', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'agama' => htmlspecialchars($this->input->post('agama', true)),
                'roleId' => 3,
            ];

            // $this->db->insert('akun', $data);
            $this->Akun->simpanAkun($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Daftar! </div>');
            redirect('HalamanLogin/tampil');
        }
    }
}
