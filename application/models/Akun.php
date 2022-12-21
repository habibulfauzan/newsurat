<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Model
{
    public function cekUser($nik)
    {
        return $this->db->get_where('akun', ['nik' => $nik])->row_array();
    }

    public function simpanAkun($data)
    {
        return $this->db->insert('akun', $data);
    }

    public function getUser()
    {
        return $this->db->get_where('akun', ['nik' => $this->session->userdata('nik')])->row_array();
    }
}
