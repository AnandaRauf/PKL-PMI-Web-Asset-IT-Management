<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_pengembalian');
        $this->load->model('Mod_barang');
    }


    public function index()
    {
        $data['title'] = "Pengembalian barang";
        $this->template->load('layoutbackend', 'pengembalian/pengembalian_data', $data);
    }

    public function cari_nik()
    {
        $nik = $this->input->post('nik');
        // $nik = 121210;
        $data['pencarian'] = $this->Mod_pengembalian->SearchNik($nik);
        // print_r($data['pencarian']);
        $this->load->view('pengembalian/pengembalian_pencarian', $data);
        
         
    }

    public function cari_transaksi()
    {
        $no_transaksi = $this->input->get_post('no_transaksi');
        // $no_transaksi = 20180411002;
        $hasil = $this->Mod_pengembalian->SearchTransaksi($no_transaksi);
        if($hasil->num_rows() > 0) {
            $dtrans = $hasil->row_array();
            echo $dtrans['nik']."|".$dtrans['tanggal_pinjam']."|".$dtrans['tanggal_kembali']."|".$dtrans['nama']."|".$dtrans['kode_barang'];
        }
    }

    public function tampil_barang()
    {
        
        $no_transaksi = $this->input->get('no_transaksi');
        $data['barang'] = $this->Mod_pengembalian->showBarang($no_transaksi)->result();
        $this->load->view('pengembalian/pengembalian_tampil_barang', $data);
        
    }

    public function simpan_transaksi()
    {
        $id_petugas = $this->session->userdata['id_petugas'];

        $simpan = array(
            'id_transaksi'     => $this->input->post('no_transaksi'),
            'tgl_pengembalian' => date('Y-m-d'),
            'id_petugas'       => $id_petugas
        );
        $this->Mod_pengembalian->insertPengembalian($simpan);

        //update status peminjaman dari N menjadi Y
        $no_transaksi = $this->input->post('no_transaksi');
        $data = array(
            'status' => "Y"
        );
        $this->Mod_barang->kembalikan($this->input->post('kode_barang'));

        $this->Mod_pengembalian->UpdateStatus($no_transaksi, $data);
    }

}

/* End of file Pengembalian.php */








