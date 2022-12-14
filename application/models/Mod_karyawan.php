<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_karyawan extends CI_Model {

    function getKaryawan()
    {
        return $this->db->get('karyawan');
    }

    function getAll()
    {
        $this->db->order_by('karyawan.nik desc');
        return $this->db->get('karyawan');
    }

    function insertKaryawan($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function cekKaryawan($kode)
    {
        $this->db->where("nik", $kode);
        return $this->db->get("karyawan");
    }

    function updateKaryawan($nik, $data)
    {
        $this->db->where('nik', $nik);
		$this->db->update('karyawan', $data);
    }

    function getDataKaryawan($limit, $offset)
    {
        // return $this->db->get_where('post', array('category_id' => $category_id));
        $this->db->select('*');
        $this->db->from('karyawan a');
        // $this->db->where('a.nik', $nik);
        $this->db->limit($limit, $offset);
        $this->db->order_by('a.nik desc');
        return $this->db->get();
    }

    function getGambar($nik)
    {
        $this->db->select('gambar');
        $this->db->from('karyawan');
        $this->db->where('nik', $nik);
        return $this->db->get();
    }

    function totalRows($table)
	{
		return $this->db->count_all_results($table);
    }
    
    function searchKaryawan($cari, $limit, $offset)
    {
        $this->db->like("nik",$cari);
        $this->db->or_like("nama",$cari);
        $this->db->limit($limit, $offset);
        return $this->db->get('karyawan');
    }

    function deleteKaryawan($kode, $table)
    {
        $this->db->where('nik', $kode);
        $this->db->delete($table);
    }

}

/* End of file ModelName.php */
