<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_barang');
    }

    public function index()
    {
        $data['barang']      = $this->Mod_barang->getAll();
        if($this->uri->segment(3)=="create-success") {
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
            $this->template->load('layoutbackend', 'barang/barang_data', $data); 
        }
        else if($this->uri->segment(3)=="update-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Diubah...!</p></div>"; 
            $this->template->load('layoutbackend', 'barang/barang_data', $data);
        }
        else if($this->uri->segment(3)=="delete-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
            $this->template->load('layoutbackend', 'barang/barang_data', $data);
        }
        else{
            $data['message'] = "";
            $this->template->load('layoutbackend', 'barang/barang_data', $data);
        } 
    }

    public function create()
    {
        $this->template->load('layoutbackend', 'barang/barang_create');
    }

    public function insert()
    {
        if(isset($_POST['save'])) {

            //function validasi
            $this->_set_rules();

            //apabila user mengkosongkan form input
            if($this->form_validation->run()==true){
                // echo "masuk"; die();
                $kode_barang = $this->input->post('kode_barang');
                $cek = $this->Mod_barang->cekbarang($kode_barang);
                //cek nik yg sudah digunakan
                if($cek->num_rows() > 0){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>Kode barang</strong> Sudah Digunakan...!</p></div>"; 
                    $this->template->load('layoutbackend', 'barang/barang_create', $data); 
                }
                else{
                    $nama_barang = slug($this->input->post('nama_barang'));
                    $config['upload_path']   = './assets/img/barang/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']	     = '1000';
                    $config['max_width']     = '2000';
                    $config['max_height']    = '1024';
                    $config['file_name']     = $nama_barang; 
                            
                    $this->upload->initialize($config);

                     //apabila ada gambar yg diupload
                    if ($this->upload->do_upload('userfile')){
                        
                        $gambar = $this->upload->data();

                        $save  = array(
                            'kode_barang'   => $this->input->post('kode_barang'),
                            'nama_barang'   => $this->input->post('nama_barang'),
                            'jenis_barang'  => $this->input->post('jenis_barang'),
                            'jumlah'        => $this->input->post('jumlah'),
                            'keterangan'    => $this->input->post('keterangan'),
                            'gambar'        => $gambar['file_name']
                        );
                        $this->simpan($this->input->post('nama_barang'));
                        
                        $this->Mod_barang->insertbarang("barang", $save);
                        // echo "berhasil"; die();
                        redirect('barang/index/create-success');

                    }
                    //apabila tidak ada gambar yg diupload
                    else{
                        $data['message'] = "<div class='alert alert-block alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>"; 
                        $this->template->load('layoutbackend', 'barang/barang_create', $data);
                    } 
                }
            
            }
            //jika tidak mengkosongkan form
            else{
                $data['message'] = "";
                $this->template->load('layoutbackend', 'barang/barang_create', $data);
            }

        }
    }   

    public function simpan($nama_barang)
    {
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/img/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name= $nama_barang.'.png'; //buat name dari qr code sesuai dengan kode_barang

        $params['data'] = $nim; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE


        // $this->Mod_barang->simpan_barang($kode_barang,$nama_barang,$jenis_barang,$jumlah,$keterangan,$gambar); //simpan ke database
        // redirect('barang'); //redirect ke barang usai simpan data
    }

    public function edit()
    {
        $kode_barang = $this->uri->segment(3);
        $data['edit']    = $this->Mod_barang->cekbarang($kode_barang)->row_array();
        $this->template->load('layoutbackend', 'barang/barang_edit', $data);
    }

    public function update()
    {
        if(isset($_POST['update'])) {

            //apabila ada gambar yg diupload
            if(!empty($_FILES['userfile']['name'])) {

                $this->_set_rules();

                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){
                    
                    $kode_barang = $this->input->post('kode_barang');
                    
                    $nama_barang = slug($this->input->post('nama_barang'));
                    $config['upload_path']   = './assets/img/barang/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']	     = '1000';
                    $config['max_width']     = '2000';
                    $config['max_height']    = '1024';
                    $config['file_name']     = $nama_barang; 
                            
                    $this->upload->initialize($config);

                        //apabila ada gambar yg diupload
                    if ($this->upload->do_upload('userfile')){
                        
                        $gambar = $this->upload->data();

                        $save  = array(
                            'kode_barang'   => $this->input->post('kode_barang'),
                            'nama_barang'   => $this->input->post('nama_barang'),
                            'jenis_barang'  => $this->input->post('jenis_barang'),
                            'jumlah'        => $this->input->post('jumlah'),
                            'keterangan'    => $this->input->post('keterangan'),
                            'gambar'        => $gambar['file_name']
                        );

                        $g = $this->Mod_barang->getGambar($kode_barang)->row_array();
                        
                        //hapus gambar yg ada diserver
                        unlink('assets/img/barang/'.$g['gambar']);

                        $this->Mod_barang->updatebarang($kode_barang, $save);
                        redirect('barang/index/update-success');

                    }
                    //apabila tidak ada gambar yg diupload
                    else{
                        $data['message'] = "<div class='alert alert-block alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>"; 
                        $this->template->load('layoutbackend', 'barang/barang_edit', $data);
                    } 
                        
                    
                }
                //jika tidak mengkosongkan
                else{

                    $kode_barang = $this->input->post('kode_barang');
                    $data['edit']    = $this->Mod_barang->cekbarang($kode_barang)->row_array();
                    $data['message'] = "";
                    $this->template->load('layoutbackend', 'barang/barang_edit', $data);
                }
            
            }
            //jika tidak ada gambar yg diupload
            else{
                $this->_set_rules();
                
                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){
                    
                    $kode_barang = $this->input->post('kode_barang');
                    
                    $save  = array(
                        'kode_barang'   => $this->input->post('kode_barang'),
                        'nama_barang'   => $this->input->post('nama_barang'),
                        'jenis_barang'  => $this->input->post('jenis_barang'),
                        'jumlah'        => $this->input->post('jumlah'),
                        'keterangan'    => $this->input->post('keterangan')
                    );
                    $this->Mod_barang->updatebarang($kode_barang, $save);

                    redirect('barang/index/update-success');      
                }
                //jika tidak mengkosongkan
                else{
                    $kode_barang = $this->input->post('kode_barang');
                    $data['edit']    = $this->Mod_barang->cekbarang($kode_barang)->row_array();
                    $data['message'] = "";
                    $this->template->load('layoutbackend', 'barang/barang_edit', $data);
                }

            } //end empty $_FILES

        } // end $_POST['update']
    
    }

    public function delete()
    {

        $kode_barang = $this->input->post('kode_barang');
          
        $g = $this->Mod_barang->getGambar($kode_barang)->row_array();
        
        //hapus gambar yg ada diserver
        unlink('assets/img/barang/'.$g['gambar']);

        $this->Mod_barang->deletebarang($kode_barang, 'barang');

        redirect('barang/index/delete-success');
    }

    //function global buat validasi input
    public function _set_rules()
    {
        $this->form_validation->set_rules('kode_barang','Kode Barang','required|max_length[5]');
        $this->form_validation->set_rules('nama_barang','Nama Narang','required|max_length[100]');
        $this->form_validation->set_rules('jenis_barang','Jenis Barang','required|max_length[50]');
        $this->form_validation->set_rules('jumlah','Jumlah','required|max_length[200]'); 
        $this->form_validation->set_rules('keterangan','Keterangan','required|max_length[200]');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }




}

/* End of file Controllername.php */
 ?>