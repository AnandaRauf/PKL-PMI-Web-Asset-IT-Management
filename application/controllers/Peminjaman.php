<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_peminjaman','Mod_karyawan','Mod_barang'));
    }

    public function index()
    {
        $data['tglpinjam']  = date('Y-m-d');
        $data['tglkembali'] = date('Y-m-d', strtotime('+7 day', strtotime($data['tglpinjam'])));
        $data['autonumber'] = $this->Mod_peminjaman->AutoNumbering();
        $data['karyawan']    = $this->Mod_karyawan->getKaryawan()->result();
        $this->template->load('layoutbackend', 'peminjaman/peminjaman_data', $data);
    }

    public function tampil_tmp()
    {
        $data['tmp']       = $this->Mod_peminjaman->getTmp()->result();
        $data['jumlahTmp'] = $this->Mod_peminjaman->jumlahTmp();
        $this->load->view('peminjaman/peminjaman_tampil_tmp',$data);
    }

    public function cari_karyawan()
    {
        $nik = $this->input->post('nik');
        $cari = $this->Mod_karyawan->cekKaryawan($nik);
        //jika ada data karyawan
        if($cari->num_rows() > 0) {
            $dkaryawan = $cari->row_array();
            echo $dkaryawan['nama'];
        }
    }

    public function cari_barang()
    {
        $caribarang = $this->input->post('caribarang');
        $data['barang'] = $this->Mod_barang->barangSearch($caribarang);
        $this->load->view('peminjaman/peminjaman_searchbarang', $data);
        // foreach($data['barang'] as $d) {
        //     print_r($d); die();
        // }
    }

    public function cari_kode_barang()
    {
        //$kode_barang = 7611;
        $kode_barang = $this->input->post('kode_barang');
        $hasil = $this->Mod_barang->cekbarang($kode_barang);
        //jika ada barang dalam database
        if($hasil->num_rows() > 0) {
            $dbarang = $hasil->row_array();
            echo $dbarang['nama_barang']."|".$dbarang['jenis_barang'];
        }
    }

    public function save_tmp()
    {
            $kode_barang = $this->input->post('kode_barang');
            // echo $kode_barang; die();
            $cek = $this->Mod_peminjaman->cekTmp($kode_barang);
            //cek apakah data masih kosong di tabel tmp
            if($cek->num_rows() < 1) {
                $data = array( 
                    'kode_barang' => $this->input->post('kode_barang'),
                    'nama_barang' => $this->input->post('nama_barang'),
                    'jenis_barang' => $this->input->post('jenis_barang')
                );
                $this->Mod_peminjaman->InsertTmp($data);
            }
    
        //}


    }

    public function hapus_tmp()
    {
        $kode_barang = $this->input->post('kode_barang');
        $this->Mod_peminjaman->deleteTmp($kode_barang);
    }

    public function simpan_transaksi()
    {
        $id_petugas = $this->session->userdata['id_petugas'];
        //ambil data tmp lakukan looping . setelah looping lakukan insert ke table transaksi
        $table_tmp = $this->Mod_peminjaman->getTmp()->result();
        foreach($table_tmp as $data){

            $kode_barang = $data->kode_barang; 
            
            $data = array(
                'id_transaksi'     => $this->input->post('no_transaksi'),
                'nik'              => $this->input->post('nik'),
                'kode_barang'       => $data->kode_barang,
                'tanggal_pinjam'   => $this->input->post('tgl_pinjam'),
                'tanggal_kembali'  => $this->input->post('tgl_kembali'),
                'status'           => "N",
                'id_petugas'       => $id_petugas
            );
           // print_r($data);
           
            //insert data ke table transaksi
            $this->Mod_peminjaman->InsertTransaksi($data); 
            $this->Mod_barang->pinjam($kode_barang);


            //hapus table tmp
            $this->Mod_peminjaman->deleteTmp($kode_barang);
           
        }

        
    }


}

/* End of file Peminjaman.php */
