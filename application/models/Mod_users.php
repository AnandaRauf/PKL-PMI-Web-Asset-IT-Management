<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_users extends CI_Model {

    function getAll()
    {
        $this->db->order_by('user.id_petugas desc');
        return $this->db->get('user');
    }

    function cekUsername($username)
    {
        $this->db->where("username",$username);
        return $this->db->get("user");
    }

    function insertUsers($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function getUsers($id_petugas)
    {
        $this->db->where("id_petugas", $id_petugas);
        return $this->db->get("user");
    }

    function updateUsers($id_petugas, $data)
    {
        $this->db->where('id_petugas', $id_petugas);
		$this->db->update('user', $data);
    }
    

    function deleteUsers($id, $table)
    {
        $this->db->where('id_petugas', $id);
        $this->db->delete($table);
    }


}

/* End of file Mod_users.php */
