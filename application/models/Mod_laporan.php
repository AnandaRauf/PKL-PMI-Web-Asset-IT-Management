<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_laporan extends CI_Model {

    public function searchPinjaman($tanggal1, $tanggal2)
    {
        // $this->db->select('*');
        // $this->db->from('transaksi');
        // $this->db->where('tanggal_pinjam <','$tanggal1');
        // $this->db->where('tanggal_kembali >','$tanggal2');

        // return $this->db->get();
        return $this->db->query("SELECT a.*,  
                                 CASE 
                                    WHEN a.status = 'N' THEN 'Masih Dipinjam'
                                 ELSE 'Sudah Dikembalikan' 
                                 END AS status_pinjam
                                 FROM transaksi a WHERE a.tanggal_pinjam  BETWEEN '$tanggal1' AND '$tanggal2' GROUP BY a.id_transaksi");
    }   
    
    public function detailPinjaman($id_transaksi)
    {
        
        return $this->db->query("SELECT a.*,b.kode_barang,b.nama_barang, b.jenis_barang, 
                                 CASE 
                                    WHEN a.status = 'N' THEN 'Masih di pinjam'
                                 ELSE 'Sudah Dikembalikan' 
                                 END AS status_pinjam
                                 FROM transaksi a, barang b 
                                 WHERE a.id_transaksi = '$id_transaksi' 
                                 AND a.kode_barang = b.kode_barang");
    }

    public function searchPengembalian($tanggal1, $tanggal2)
    {
        return $this->db->query("SELECT a.*, b.id_petugas, b.full_name, c.status,
                                 CASE 
                                    WHEN c.status = 'N' THEN 'Masih di pinjam'
                                 ELSE 'Sudah Dikembalikan' 
                                 END AS status_pinjam
                                 FROM pengembalian a, user b, transaksi c 
                                 WHERE a.tgl_pengembalian BETWEEN '$tanggal1' AND '$tanggal2'
                                 AND a.id_petugas = b.id_petugas AND a.id_transaksi = c.id_transaksi
                                 GROUP BY a.id_transaksi");
    }

    public function detailPengembalian($id_transaksi)
    {
        return $this->db->query("SELECT a.*, b.status, c.kode_barang, c.nama_barang, c.jenis_barang, 
                                CASE 
                                    WHEN b.status = 'N' THEN 'Masih di pinjam'
                                ELSE 'Sudah Dikembalikan' 
                                END AS status_pinjam
                                FROM pengembalian a, transaksi b, barang c
                                WHERE a.id_transaksi = '$id_transaksi'
                                AND a.id_transaksi = b.id_transaksi
                                AND b.kode_barang = c.kode_barang");
    }

    
}

/* End of file Mod_laporan.php */
