<?php

class Surat extends CI_Model
{
    public function submitSurat($surat, $data)
    {
        return $this->db->insert($surat, $data);
    }

    //START GET SURAT BY SESSION
    public function showSurat()
    {
        $this->db->select('*');
        $this->db->where('akun.nik', $this->session->userdata('nik'));
        $this->db->join('akun', 'akun.nik=suratketerangantidakmampu.nik');
        return $this->db->get('suratketerangantidakmampu')->result();
    }
    public function showSurat2()
    {
        $this->db->select('*');
        $this->db->where('akun.nik', $this->session->userdata('nik'));
        $this->db->join('akun', 'akun.nik=suratketerangandomisili.nik');
        return $this->db->get('suratketerangandomisili')->result();

        // $query = $this->db->get_where('pengajuan_surat', ['id' => $id])->row_array();
    }
    public function showSurat3()
    {
        $this->db->select('*');
        $this->db->where('akun.nik', $this->session->userdata('nik'));
        $this->db->join('akun', 'akun.nik=suratketerangankematian.nikPemohon');
        return $this->db->get('suratketerangankematian')->result();

        // $query = $this->db->get_where('pengajuan_surat', ['id' => $id])->row_array();
    }
    //END SURAT BY SESSION

    //START GET ALL SURAT
    public function getSktm()
    {
        $this->db->select('*');
        $this->db->get_where('suratketerangantidakmampu');
        $this->db->join('akun', 'akun.nik=suratketerangantidakmampu.nik');
        return $this->db->get('suratketerangantidakmampu')->result();
    }
    public function getSkd()
    {
        $this->db->select('*');
        $this->db->get_where('suratketerangandomisili');
        $this->db->join('akun', 'akun.nik=suratketerangandomisili.nik');
        return $this->db->get('suratketerangandomisili')->result();
    }
    public function getSkk()
    {
        $this->db->select('*');
        $this->db->get_where('suratketerangankematian');
        $this->db->join('akun', 'akun.nik=suratketerangankematian.nikPemohon');
        return $this->db->get('suratketerangankematian')->result();
    }

    //END GET ALL SURAT
    public function cetakSktm($id)
    {
        $this->db->select('*');
        // $this->db->from('suratketerangantidakmampu');
        $this->db->where(['id' => $id]);
        $this->db->join('akun', 'akun.nik=suratketerangantidakmampu.nik');
        return $this->db->get('suratketerangantidakmampu')->result();
    }

    public function cetakSkd($id)
    {
        $this->db->select('*');
        // $this->db->from('suratketerangandomisili');
        $this->db->where(['id' => $id]);
        $this->db->join('akun', 'akun.nik=suratketerangandomisili.nik');
        return $this->db->get('suratketerangandomisili')->result();
    }

    public function updateSktm($id)
    {
        $status = $this->input->post('status');
        $this->db->set('status', $status);
        $this->db->where(['id' => $id]);
        $this->db->update('suratketerangantidakmampu');
    }

    public function updateSkd($id)
    {
        $status = $this->input->post('status');
        $this->db->set('status', $status);
        $this->db->where(['id' => $id]);
        $this->db->update('suratketerangandomisili');
    }

    public function updateSkk($id)
    {
        $status = $this->input->post('status');
        $this->db->set('status', $status);
        $this->db->where(['id' => $id]);
        $this->db->update('suratketerangankematian');
    }
}
