<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require FCPATH . 'vendor/autoload.php';
class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Akun', 'Akun');
	}

	public function print()
	{
		$query = $this->db->get_where('akun', ['nik' => '1234567890123456'])->row_array();
		$data['user'] = $query;
		$this->db->select('*');
		$this->db->get_where('suratketerangankematian');
		$this->db->join('akun', 'akun.nik=suratketerangankematian.nikPemohon');
		$data['surat'] = $this->db->get('suratketerangankematian')->row_array();

		error_reporting(0);
		$this->load->view('html_to_pdf', $data);
		//$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
	}
}
