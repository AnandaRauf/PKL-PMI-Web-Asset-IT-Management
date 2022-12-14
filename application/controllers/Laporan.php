<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_laporan','Mod_barang','Mod_karyawan'));
    }

    
    public function karyawan()
    {
        $data['karyawan']      = $this->Mod_karyawan->getAll();
        $this->template->load('layoutbackend', 'laporan/karyawan_data', $data);
    }

    public function barang()
    {
        $data['barang']      = $this->Mod_barang->getAll();
        $this->template->load('layoutbackend', 'laporan/barang_data', $data);
    }

    public function peminjaman()
    {
        $data['title']="Laporan Peminjaman";
        $this->template->load('layoutbackend', 'laporan/peminjaman_data', $data);
    }
    public function cetak_karyawan()
    {
        $data['karyawan'] = $this->Mod_karyawan->getAll();
        $this->load->view('laporan/laporan_print_karyawan', $data);
    }
    public function cetak_barang()
    {

        $data['barang'] = $this->Mod_barang->getAll();
        $this->load->view('laporan/laporan_print_barang', $data);
    }

    public function cetak()
    {

        $object = new stdClass();
        $object->id_transaksi = $this->input->post('id_transaksi');
        $object->tanggal_pinjam = $this->input->post('tanggal_pinjam');
        $object->tanggal_kembali = $this->input->post('tanggal_kembali');
        $object->status_pinjam = $this->input->post('status_pinjam');
        $object->nik = $this->input->post('nik');
        $data['object'] = $object;
        // var_dump($data); 
        $this->load->view('laporan/laporan_print', $data);
    }
    public function cetakPengembalian()
    {

        $object = new stdClass();
        $object->id_transaksi = $this->input->post('id_transaksi');
        $object->tanggal_kembali = $this->input->post('tanggal_kembali');
        $object->status_pinjam = $this->input->post('status_pinjam');
        $object->full_name = $this->input->post('full_name');
        $data['object'] = $object;
        // var_dump($data); 
        $this->load->view('laporan/laporan_print_pengembalian', $data);
    }

    public function cari_pinjaman()
    {
        
        $tanggal1 = $this->input->post('tanggal1');
        $tanggal2 = $this->input->post('tanggal2');
        $data['hasil_search'] = $this->Mod_laporan->searchPinjaman($tanggal1,$tanggal2);
        $this->load->view('laporan/peminjaman_search', $data);
    }

    public function detail_pinjam()
    {
        
        $id_transaksi = $this->input->post('id_transaksi');
        
        $data['title']        = "Detail Peminjaman";
        $data['pinjam']       = $this->Mod_laporan->detailPinjaman($id_transaksi)->row_array(); 
        $data['detailpinjam'] = $this->Mod_laporan->detailPinjaman($id_transaksi)->result();
        $this->load->view('laporan/peminjaman_detail', $data);


    }

    public function pengembalian()
    {
        $data['title']="Laporan Pengembalian";
        $this->template->load('layoutbackend', 'laporan/pengembalian_data', $data);
    }

    public function cari_pengembalian()
    {

        $tanggal1 = $this->input->post('tanggal1');
        $tanggal2 = $this->input->post('tanggal2');
        $data['hasil_search'] = $this->Mod_laporan->searchPengembalian($tanggal1,$tanggal2);
        $this->load->view('laporan/pengembalian_search', $data);
        
    }

    public function detail_pengembalian()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $data['title']               = "Detail Pengembalian";
        $data['pengembalian']        = $this->Mod_laporan->detailPengembalian($id_transaksi)->row_array(); 
        $data['detailjpengembalian'] = $this->Mod_laporan->detailPengembalian($id_transaksi)->result();
        $this->load->view('laporan/pengembalian_detail', $data);

    }

   

}

/* End of file Laporan.php */
