<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_barang extends CI_Model {

    private $table   = "barang";
    private $primary = "kode_barang";

    function searchBarang($cari, $limit, $offset)
    {
        $this->db->like($this->primary,$cari);
        $this->db->or_like("nama_barang",$cari);
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table);
    }

    function totalRows($table)
	{
		return $this->db->count_all_results($table);
    }

    
    function getAll()
    {
        $this->db->order_by('barang.kode_barang desc');
        return $this->db->get('barang');
    }

    function insertBarang($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
        $data = array(
            'kode_barang'       => $kode_barang,
            'nama_barang'      => $nama_barang,
            'jenis_barang'     => $jenis_barang,
 	        'jumlah'     	=> $jumlah,
	        'keterangan'     => $keterangan,			
	        'gambar'     => $gambar,

            'qr_code'   => $image_name
        );
        $this->db->insert('barang',$data);
    }

    function cekBarang($kode)
    {
        $this->db->where("kode_barang", $kode);
        return $this->db->get("barang");
    }

    function updateBarang($kode_barang, $data)
    {
        $this->db->where('kode_barang', $kode_barang);
		$this->db->update('barang', $data);
    }

    function getGambar($kode_barang)
    {
        $this->db->select('gambar');
        $this->db->from('barang');
        $this->db->where('kode_barang', $kode_barang);
        return $this->db->get();
    }

    function deleteBarang($kode, $table)
    {
        $this->db->where('kode_barang', $kode);
        $this->db->delete($table);
    }

    function barangSearch($cari)
    {
        $this->db->like($this->primary,$cari);
        $this->db->or_like("nama_barang",$cari);
        $this->db->where('jumlah >', 0);
        $this->db->limit(10);
        return $this->db->get($this->table);
    }

    function pinjam($kode)
    {
        $this->db->select('jumlah');
        $this->db->from('barang');
        $this->db->where('kode_barang', $kode);
        $barang = $this->db->get()->result();
        $data = array('jumlah' => $barang[0]->jumlah-1);
       
        $this->db->where('kode_barang', $kode);
        $this->db->update('barang', $data);
    }
    
    function kembalikan($kode)
    {
        $this->db->select('jumlah');
        $this->db->from('barang');
        $this->db->where('kode_barang', $kode);
        $barang = $this->db->get()->result();
        $data = array('jumlah' => $barang[0]->jumlah+1);
        //var_dump($data);
        $this->db->where('kode_barang', $kode);
        $this->db->update('barang', $data);
    }



}

/* End of file ModelName.php */
