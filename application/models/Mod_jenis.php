<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_jenis extends CI_Model {

    function getAll()
    {
        $this->db->order_by('jenis.id_jenis desc');
        return $this->db->get('jenis');
    }

    function cekNamaJenis($nama_jenis)
    {
        $this->db->where("nama_jenis",$nama_jenis);
        return $this->db->get("jenis");
    }

    function insertJenis($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function getJenis($id_jenis)
    {
        $this->db->where("id_jenis", $id_jenis);
        return $this->db->get("jenis");
    }

    function updateJenis($id_jenis, $data)
    {
        $this->db->where('id_jenis', $id_jenis);
		$this->db->update('jenis', $data);
    }
    

    function deleteJenis($id, $table)
    {
        $this->db->where('id_jenis', $id);
        $this->db->delete($table);
    }

    function totalRows($table)
	{
		return $this->db->count_all_results($table);
    }
}

/* End of file Mod_users.php */