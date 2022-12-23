<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HalamanSuratKeteranganKematian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('Akun', 'Akun');
        $this->load->model('Surat', 'Surat');
        if (!$this->session->userdata('nik')) {
            redirect('HalamanLogin/tampil');
        }
    }
    public function tampil()
    {
        $data['title'] = 'SURAT KETERANGAN KEMATIAN';
        $data['user'] = $this->Akun->getUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/masyarakat', $data);
        $this->load->view('HalamanSuratKeteranganKematian', $data);
        $this->load->view('templates/footer');
    }

    public function simpanSurat()
    {
        $cek = $this->Surat->showSurat3();
        if (!empty($cek)) {
            foreach ($cek as $aw) {
                $aw->status;
            }
            if ($aw->status == 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> SURAT SUDAH PERNAH DIREQUEST, SURAT SEDANG MENUNGGU PROSES ADMIN! </div>');
                redirect('HalamanSuratKeteranganKematian/tampil');
                var_dump($cek);
            }
        }
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('nama_pemohon', 'Nama Pemohon', 'required|trim|min_length[3]');
            // $this->form_validation->set_rules('ktp_pemohon', 'KTP Pemohon', 'required');
            $this->form_validation->set_rules('nama_jenazah', 'Nama Jenazah', 'required');
            $this->form_validation->set_rules('t_jenazah', 'Tempat Lahir', 'required');
            $this->form_validation->set_rules('tl_jenazah', 'Tanggal Lahir', 'required');
            $this->form_validation->set_rules('tm_jenazah', 'Tanggal Meninggal', 'required');
            $this->form_validation->set_rules('agama_jenazah', 'Agama', 'required');
            // $this->form_validation->set_rules('ktp_jenazah', 'KTP Jenazah', 'required');
            // $this->form_validation->set_rules('kk_jenazah', 'Kartu Keluarga', 'required');
            // $this->form_validation->set_rules('lptb_jenazah', 'Tanda Lunas PBB Tahun Berjalan', 'required');

            if ($this->form_validation->run() == false) {
                $data['title'] = 'SURAT KETERANGAN KEMATIAN';
                $data['user'] = $this->Akun->getUser();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/masyarakat', $data);
                $this->load->view('HalamanSuratKeteranganKematian', $data);
                $this->load->view('templates/footer');
            } else {
                $jenissurat = [
                    1 => 'SKTM',
                    2 => 'SKD',
                    3 => 'SKK',
                ];
                $x = $this->Akun->getUser();
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'jpg|png|jpeg';

                // $this->load->library('upload', $config);

                if (!empty($_FILES['ktp_pemohon'])) {
                    $config['file_name'] = $jenissurat[3] . '-' . $x['nama'] . '-KTP_PEMOHON' . date('Ymdhis');
                    $this->load->library('upload', $config);
                    $this->upload->do_upload('ktp_pemohon');
                    $data_ktp_pemohon = $this->upload->data();
                    $file_ktp_pemohon = $data_ktp_pemohon['file_name'];
                }
                if (!empty($_FILES['ktp_jenazah'])) {
                    $config['file_name'] = $jenissurat[3] . '-' . $x['nama'] . '-KTP_JENAZAH' . date('Ymdhis');
                    $this->upload->initialize($config);
                    $this->upload->do_upload('ktp_jenazah');
                    $data_ktp_jenazah = $this->upload->data();
                    $file_ktp_jenazah = $data_ktp_jenazah['file_name'];
                }
                if (!empty($_FILES['kk_jenazah'])) {
                    $config['file_name'] = $jenissurat[3] . '-' . $x['nama'] . '-KK_JENAZAH' . date('Ymdhis');
                    $this->upload->initialize($config);
                    $this->upload->do_upload('kk_jenazah');
                    $data_kk_jenazah = $this->upload->data();
                    $file_kk_jenazah = $data_kk_jenazah['file_name'];
                }

                if (!empty($_FILES['lptb_jenazah'])) {
                    $config['file_name'] = $jenissurat[3] . '-' . $x['nama'] . '-LPTB_JENAZAH' . date('Ymdhis');
                    $this->upload->initialize($config);
                    $this->upload->do_upload('lptb_jenazah');
                    $data_lptb_jenazah = $this->upload->data();
                    $file_lptb_jenazah = $data_lptb_jenazah['file_name'];
                }
                //status 0 = pending, 1 = acc
                // jenissurat 1 = 'SKTM', 2 = 'SKD', 3 = 'SKK'
                $data = [
                    'nikPemohon ' => htmlspecialchars($this->input->post('nik', true)),
                    'namaJenazah' => htmlspecialchars($this->input->post('nama_jenazah', true)),
                    'tempatLahirJenazah' => htmlspecialchars($this->input->post('t_jenazah', true)),
                    'tanggalLahirJenazah' => htmlspecialchars($this->input->post('tl_jenazah', true)),
                    'tanggakKematian' => htmlspecialchars($this->input->post('tm_jenazah', true)),
                    'agamaJenazah' => htmlspecialchars($this->input->post('agama_jenazah', true)),


                    'ktpPemohon' => $file_ktp_pemohon,
                    'ktpJenazah' => $file_ktp_jenazah,
                    'kkJenazah' => $file_kk_jenazah,
                    'lptb' => $file_lptb_jenazah,
                    'status' => 0,
                    'date' => date('Y-m-d'),
                    'jenissurat' => 3,
                ];


                $this->Surat->submitSurat('suratketerangankematian', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Request Surat Permohonan! </div>');
                redirect('HalamanSuratKeteranganKematian/tampil');
            }
        }
    }
}
