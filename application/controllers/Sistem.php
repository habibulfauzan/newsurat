<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sistem extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
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
        redirect('sistem/halamanLogin');
    }

    public function cetakSurat($id)
    {
        $data['dataSktm'] = $this->Surat->cetakSktm($id);
        $data['dataSkd'] = $this->Surat->cetakSkd($id);
        $data['dataSkk'] = $this->Surat->cetakSkk($id);
        // $data['dataSktm'] = $this->Surat->cetakSktm($id);
        $this->load->view('surat/surat', $data);
    }




    public function halamanBuatAkun()
    {
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
            redirect('sistem/halamanLogin');
        }
    }


    public function halamanLogin()
    {
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
                        redirect('sistem/halamanDashboard');
                    } elseif ($cek['roleId'] == 2) {
                        redirect('sistem/halamanDashboard');
                    } else {
                        redirect('sistem/halamanDashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Salah! </div>');
                    redirect('sistem/halamanLogin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> NIK belum terdaftar! </div>');
                redirect('sistem/halamanLogin');
            }
        }
    }
    public function halamanDashboard()
    {
        $role = $this->session->userdata('roleId');
        if ($role == 1) {
            $data['title'] = 'Dashboard Admin';
            $data['user'] = $this->Akun->getUser();

            $this->load->view('templates/header', $data);
            $this->load->view('administrator/HalamanDashboard', $data);
            $this->load->view('templates/footer');
        } elseif ($role == 2) {
            $data['title'] = 'Dashboard Lurah';
            $data['user'] = $this->Akun->getUser();

            $this->load->view('templates/header', $data);
            $this->load->view('lurah/HalamanDashboard', $data);
            $this->load->view('templates/footer');
        } else {
            $data['title'] = 'My Profile';
            $data['user'] = $this->Akun->getUser();

            $this->load->view('templates/header', $data);
            $this->load->view('masyarakat/HalamanDashboard', $data);
            $this->load->view('templates/footer');
        }
    }

    // START HALAMAN PENGAJUAN SURAT
    public function halamanPengajuanSurat()
    {
        $data['title'] = 'Pengajuan Surat';
        $data['user'] = $this->Akun->getUser();
        if (!$this->session->userdata('nik')) {
            redirect('sistem/halamanLogin');
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
        redirect(base_url('sistem/halamanPengajuanSurat'));
    }

    public function updateSkd($id)
    {
        $this->Surat->updateSkd($id);
        $this->session->set_flashdata('success', 'Status Pengajuan SKD dengan ID: ' . $id . ' telah diupdate!');
        redirect(base_url('sistem/halamanPengajuanSurat'));
    }

    public function updateSkk($id)
    {
        $this->Surat->updateSkk($id);
        $this->session->set_flashdata('success', 'Status Pengajuan SKK dengan ID: ' . $id . ' telah diupdate!');
        redirect(base_url('sistem/halamanPengajuanSurat'));
    }

    // END HALAMAN PENGAJUAN SURAT



    public function halamanSuratKeteranganTidakMampu()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[3]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'SURAT KETERANGAN TIDAK MAMPU';
            $data['user'] = $this->Akun->getUser();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/masyarakat', $data);
            $this->load->view('HalamanSuratKeteranganTidakMampu', $data);
            $this->load->view('templates/footer');
        } else {
            $cek = $this->Surat->showSurat();
            if (!empty($cek)) {
                foreach ($cek as $aw) {
                    $aw->status;
                }
                if ($aw->status == 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> SURAT SUDAH PERNAH DIREQUEST, SURAT SEDANG MENUNGGU PROSES ADMIN! </div>');
                    redirect('sistem/halamanSuratKeteranganTidakMampu');
                    var_dump($cek);
                }
            }
            // $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[3]');

            // if ($this->form_validation->run()) {
            $data['title'] = 'SURAT KETERANGAN TIDAK MAMPU';
            $data['user'] = $this->Akun->getUser();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/masyarakat', $data);
            $this->load->view('HalamanSuratKeteranganTidakMampu', $data);
            $this->load->view('templates/footer');

            $jenissurat = [
                1 => 'SKTM',
                2 => 'SKD',
                3 => 'SKK',
            ];
            $x = $this->Akun->getUser();
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'jpg|png|jpeg';

            // $this->load->library('upload', $config);

            if (!empty($_FILES['suratpernyataan'])) {
                $config['file_name'] = $jenissurat[1] . '-' . $x['nama'] . '-SURAT_PERNYATAAN' . date('Ymdhis');
                $this->load->library('upload', $config);
                $this->upload->do_upload('suratpernyataan');
                $data_suratpernyataan = $this->upload->data();
                $file_suratpernyataan = $data_suratpernyataan['file_name'];
            }
            if (!empty($_FILES['ktp'])) {
                $config['file_name'] = $jenissurat[1] . '-' . $x['nama'] . '-KTP' . date('Ymdhis');
                $this->upload->initialize($config);
                $this->upload->do_upload('ktp');
                $data_ktp = $this->upload->data();
                $file_ktp = $data_ktp['file_name'];
            }
            if (!empty($_FILES['kk'])) {
                $config['file_name'] = $jenissurat[1] . '-' . $x['nama'] . '-KK' . date('Ymdhis');
                $this->upload->initialize($config);
                $this->upload->do_upload('kk');
                $data_kk = $this->upload->data();
                $file_kk = $data_kk['file_name'];
            }
            if (!empty($_FILES['kip'])) {
                $config['file_name'] = $jenissurat[1] . '-' . $x['nama'] . '-KIP' . date('Ymdhis');
                $this->upload->initialize($config);
                $this->upload->do_upload('kip');
                $data_kip = $this->upload->data();
                $file_kip = $data_kip['file_name'];
            }

            if (!empty($_FILES['lptb'])) {
                $config['file_name'] = $jenissurat[1] . '-' . $x['nama'] . '-LPTB' . date('Ymdhis');
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
                'kip' => $file_kip,
                'lptb' => $file_lptb,
                'status' => 0,
                'date' => $date,
                'jenissurat' => 1,
            ];


            $this->Surat->submitSurat('suratketerangantidakmampu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Request Surat Permohonan! </div>');
            redirect('sistem/halamanSuratKeteranganTidakMampu');
        }
    }

    public function halamanSuratKeteranganDomisili()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama', 'required|trim|min_length[3]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'SURAT KETERANGAN DOMISILI';
            $data['user'] = $this->Akun->getUser();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/masyarakat', $data);
            $this->load->view('HalamanSuratKeteranganDomisili', $data);
            $this->load->view('templates/footer');
        } else {
            $cek = $this->Surat->showSurat2();
            if (!empty($cek)) {
                foreach ($cek as $aw) {
                    $aw->status;
                }
                if ($aw->status == 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> SURAT SUDAH PERNAH DIREQUEST, SURAT SEDANG MENUNGGU PROSES ADMIN! </div>');
                    redirect('sistem/halamanSuratKeteranganDomisili');
                    var_dump($cek);
                }
            }
            $data['title'] = 'SURAT KETERANGAN DOMISILI';
            $data['user'] = $this->Akun->getUser();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/masyarakat', $data);
            $this->load->view('HalamanSuratKeteranganDomisili', $data);
            $this->load->view('templates/footer');

            $jenissurat = [
                1 => 'SKTM',
                2 => 'SKD',
                3 => 'SKK',
            ];
            $x = $this->Akun->getUser();
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

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
            redirect('sistem/halamanSuratKeteranganDomisili');
        }
    }

    public function halamanSuratKeteranganKematian()
    {
        $this->form_validation->set_rules('nama_pemohon', 'Nama Pemohon', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('nama_jenazah', 'Nama Jenazah', 'required');
        $this->form_validation->set_rules('t_jenazah', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tl_jenazah', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('tm_jenazah', 'Tanggal Meninggal', 'required');
        $this->form_validation->set_rules('agama_jenazah', 'Agama', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SURAT KETERANGAN KEMATIAN';
            $data['user'] = $this->Akun->getUser();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/masyarakat', $data);
            $this->load->view('HalamanSuratKeteranganKematian', $data);
            $this->load->view('templates/footer');
        } else {
            $cek = $this->Surat->showSurat3();
            if (!empty($cek)) {
                foreach ($cek as $aw) {
                    $aw->status;
                }
                if ($aw->status == 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> SURAT SUDAH PERNAH DIREQUEST, SURAT SEDANG MENUNGGU PROSES ADMIN! </div>');
                    redirect('sistem/halamanSuratKeteranganKematian');
                    var_dump($cek);
                }
            }
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
            redirect('sistem/halamanSuratKeteranganKematian');
        }
    }

    public function riwayatPengajuanSurat()
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
