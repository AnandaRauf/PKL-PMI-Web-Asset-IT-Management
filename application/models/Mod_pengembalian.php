<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_pengembalian extends CI_Model {

    private $table_transaksi    = 'transaksi';
    private $table_pengembalian = 'pengembalian';
    private $table_karyawan      = 'karyawan';  
    private $table_barang         = 'barang';    

    public function SearchNik($nik)
    {
        $data = $this->db->query("SELECT * FROM $this->table_transaksi WHERE id_transaksi 
                                  NOT IN(SELECT id_transaksi FROM $this->table_pengembalian)
                                  AND nik LIKE '%$nik%' GROUP BY nik");
        return $data;
    }

    public function SearchTransaksi($no_transaksi)
    {
        $query = $this->db->query("SELECT a.*, b.nama FROM $this->table_transaksi a, $this->table_karyawan                             b WHERE a.id_transaksi = '$no_transaksi' AND a.id_transaksi 
                                   NOT IN(SELECT c.id_transaksi FROM $this->table_pengembalian c)
                                   AND a.nik = b.nik");
        return $query;
    }

    public function showBarang($no_transaksi)
    {
        $query = $this->db->query("SELECT a.*, b.nama_barang,b.jenis_barang 
                                   FROM $this->table_transaksi a, $this->table_barang b 
                                   WHERE a.id_transaksi = '$no_transaksi' AND a.id_transaksi 
                                   NOT IN(SELECT c.id_transaksi FROM $this->table_pengembalian c)
                                   AND a.kode_barang = b.kode_barang");
        return $query;
    }

    public function insertPengembalian($data)
    {
        $this->db->insert($this->table_pengembalian, $data);
    }

    public function UpdateStatus($no_transaksi, $data)
    {
        $this->db->where("id_transaksi", $no_transaksi);
        $this->db->update($this->table_transaksi, $data);
        
    }


}

/* End of file Mod_pengembalian.php */
