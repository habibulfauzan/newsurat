<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HalamanDomisili extends CI_Controller
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
    public function index()
    {
        $data['title'] = 'SURAT KETERANGAN DOMISILI';
        $data['user'] = $this->Akun->getUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/masyarakat', $data);
        $this->load->view('HalamanDomisili', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $cek = $this->Surat->showSurat2();
        foreach ($cek as $aw) {
            $aw->status;
        }
        if ($aw->status == 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> SURAT SUDAH PERNAH DIREQUEST, SURAT SEDANG MENUNGGU PROSES ADMIN! </div>');
            redirect('HalamanDomisili');
        } else {
            if (isset($_POST['submit'])) {
                $this->form_validation->set_rules('nama_lengkap', 'Nama', 'required|trim|min_length[3]');

                if ($this->form_validation->run()) {
                    $data['title'] = 'SURAT KETERANGAN DOMISILI';
                    $data['user'] = $this->Akun->getUser();
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/masyarakat', $data);
                    $this->load->view('HalamanDomisili', $data);
                    $this->load->view('templates/footer');

                    $jenissurat = [
                        1 => 'SKTM',
                        2 => 'SKD',
                        3 => 'SKK',
                    ];
                    $x = $this->Akun->getUser();
                    $config['upload_path']          = './uploads/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    // $config['file_name'] = $jenissurat[2] . $x['nama'];

                    // $this->load->library('upload', $config);

                    if (!empty($_FILES['suratpernyataan'])) {
                        $config['file_name'] = $jenissurat[2] . '-' . $x['nama'] . '-SURAT_PERNYATAAN' . date('Ymdhis');
                        $this->load->library('upload', $config);
                        $this->upload->do_upload('suratpernyataan');
                        $data_suratpernyataan = $this->upload->data();
                        $file_suratpernyataan = $data_suratpernyataan['file_name'];
                    }
                    if (!empty($_FILES['ktp'])) {
                        $config['file_name'] = $jenissurat[2] . '-' . $x['nama'] . '-KTP' . date('Ymdhis');
                        // $this->upload->do_upload('ktp');
                        $this->upload->initialize($config);
                        $this->upload->do_upload('ktp');
                        $data_ktp = $this->upload->data();
                        $file_ktp = $data_ktp['file_name'];
                    }
                    if (!empty($_FILES['kk'])) {
                        $config['file_name'] = $jenissurat[2] . '-' . $x['nama'] . '-KK' . date('Ymdhis');
                        // $this->upload->do_upload('ktp');
                        $this->upload->initialize($config);
                        $this->upload->do_upload('kk');
                        $data_kk = $this->upload->data();
                        $file_kk = $data_kk['file_name'];
                    }

                    if (!empty($_FILES['lptb'])) {
                        $config['file_name'] = $jenissurat[2] . '-' . $x['nama'] . '-LPTB' . date('Ymdhis');
                        // $this->upload->do_upload('ktp');
                        $this->upload->initialize($config);
                        $this->upload->do_upload('lptb');
                        $data_lptb = $this->upload->data();
                        $file_lptb = $data_lptb['file_name'];
                    }

                    $nik = htmlspecialchars($this->input->post('nik', true));
                    $date = date('Y-m-d');

                    //status 0 = pending, 1 = acc 
                    // jenissurat 1 = 'SKTM', 2 = 'SKD', 3 = 'SKK'
                    $data = [
                        'nik' => $nik,
                        'suratpernyataan' => $file_suratpernyataan,
                        'ktp' => $file_ktp,
                        'kk' => $file_kk,
                        'lptb' => $file_lptb,
                        'status' => 0,
                        'date' => $date,
                        'jenissurat' => 2,
                    ];


                    $this->Surat->submitSurat('suratketerangandomisili', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Request Surat Permohonan! </div>');
                    redirect('HalamanDomisili');
                }
            } else {
                $this->index();
            }
        }
    }
}
