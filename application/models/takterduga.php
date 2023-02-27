<?php 

class takterduga extends CI_model
{
    public function getMasuk()
    {
        return $this->db->get('tbl_daftar_takterduga_masuk')->result_array();
    }

    public function getKeluar()
    {
        $this->db->select('*');
        $this->db->from('tbl_daftar_takterduga_keluar');
        $this->db->join('tbl_takterduga_keluar','tbl_daftar_takterduga_keluar.id_takterduga_keluar = tbl_takterduga_keluar.id_takterduga_keluar');
        return $this->db->get()->result_array();
    }

    public function getKeluarJenis()
    {
        return $this->db->get('tbl_takterduga_keluar')->result_array();
    }
    public function tambahMasuk($data)
    {
        if (empty($data['uraian']) || empty($data['jumlah'])) {
            return false;
        }
        $data['waktu'] = date($this->session->userdata('tahun')."/".$this->session->userdata('bulan')."/".$this->session->userdata('hari'));
        $data['id_daftar_takterduga_masuk'] = '';
        $data['jumlah'] = str_replace('.','',$data['jumlah']);
        $this->db->insert('tbl_daftar_takterduga_masuk', $data);
        return true;
    }

    public function tambahKeluar($data)
    {
        if (empty($data['keterangan']) || empty($data['id_takterduga_keluar']) || empty($data['jumlah'])) {
            return false;
        }
        $data['waktu'] = date($this->session->userdata('tahun')."/".$this->session->userdata('bulan')."/".$this->session->userdata('hari'));
        $data['id_daftar_takterduga_keluar'] = '';
        $data['jumlah'] = str_replace('.','',$data['jumlah']);
        $this->db->insert('tbl_daftar_takterduga_keluar', $data);
        return true;
    }
    public function editMasuk($id, $data)
    {
        if (empty($id) || empty($data['uraian']) || empty($data['jumlah'])) {
            return false;
        }
        $this->db->set('uraian', $data['uraian']);
        $this->db->set('jumlah', str_replace('.','',$data['jumlah']));
        $this->db->where('id_daftar_takterduga_masuk',$id);
        $this->db->update('tbl_daftar_takterduga_masuk');
        return true;
    }
    public function editKeluar($id, $data)
    {
        if (empty($data['keterangan']) || empty($data['id_takterduga_keluar']) || empty($data['jumlah'])) {
            return false;
        }
        $this->db->set('keterangan', $data['keterangan']);
        $this->db->set('id_takterduga_keluar', $data['id_takterduga_keluar']);
        $this->db->set('jumlah', str_replace('.','',$data['jumlah']));
        $this->db->where('id_daftar_takterduga_keluar',$id);
        $this->db->update('tbl_daftar_takterduga_keluar');
        return true;
    }
    public function hapusMasuk($id)
    {
        if (empty($id)) {
            return false;
        }
        $this->db->where('id_daftar_takterduga_masuk',$id);
        $this->db->delete('tbl_daftar_takterduga_masuk');
        return true;
    }
    public function hapusKeluar($id)
    {
        if (empty($id)) {
            return false;
        }
        $this->db->where('id_daftar_takterduga_keluar',$id);
        $this->db->delete('tbl_daftar_takterduga_keluar');
        return true;
    }
}