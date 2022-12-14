<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_karyawan');
    }


    public function index()
    {
        $data['karyawan']      = $this->Mod_karyawan->getAll();
        // print_r($data['countkaryawan']); die();

        if($this->uri->segment(3)=="create-success") {
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
            $this->template->load('layoutbackend', 'karyawan/karyawan_data', $data); 
        }
        else if($this->uri->segment(3)=="update-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>"; 
            $this->template->load('layoutbackend', 'karyawan/karyawan_data', $data);
        }
        else if($this->uri->segment(3)=="delete-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
            $this->template->load('layoutbackend', 'karyawan/karyawan_data', $data);
        }
        else{
            $data['message'] = "";
            $this->template->load('layoutbackend', 'karyawan/karyawan_data', $data);
        }
        
    }

    public function create()
    {
        $this->template->load('layoutbackend', 'karyawan/karyawan_create');
    }

    public function insert()
    {
        if(isset($_POST['save'])) {
            
            $this->_set_rules();

            //apabila user mengkosongkan form input
            if($this->form_validation->run()==true){
               
                $nik = $this->input->post('nik');
                $cek = $this->Mod_karyawan->cekKaryawan($nik);
                //cek nik yg sudah digunakan
                if($cek->num_rows() > 0){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>NIK</strong> Sudah Digunakan...!</p></div>"; 
                    $this->template->load('layoutbackend', 'karyawan/karyawan_create', $data); 
                }
                else{
                    $nama = slug($this->input->post('nama'));
                    $config['upload_path']   = './assets/img/karyawan/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png'; //mencegah upload backdor
                    $config['max_size']	     = '1000';
                    $config['max_width']     = '2000';
                    $config['max_height']    = '1024';
                    $config['file_name']     = $nama; 
                            
                    $this->upload->initialize($config);

                     //apabila ada gambar yg diupload
                    if ($this->upload->do_upload('userfile')){
                        
                        $gambar = $this->upload->data();

                        $save  = array(
                            'nik'   => $this->input->post('nik'),
                            'nama'  => $this->input->post('nama'),
                            'jk'    => $this->input->post('jenis'),
                            'ttl'   => $this->input->post('tgl_lahir'),
                            'bagian' => $this->input->post('bagian'),
                            'gambar' => $gambar['file_name']
                        );
                        $this->Mod_karyawan->insertKaryawan("karyawan", $save);
                        
                        redirect('karyawan/index/create-success');

                    }
                    //apabila tidak ada gambar yg diupload
                    else{
                        $data['message'] = "<div class='alert alert-block alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>"; 
                        $this->template->load('layoutbackend', 'karyawan/karyawan_create', $data);
                    } 
                }
            }
            //jika tidak mengkosongkan
            else{
                $data['message'] = "";
                $this->template->load('layoutbackend', 'karyawan/karyawan_create', $data);
            }
        }
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $data['edit']    = $this->Mod_karyawan->cekKaryawan($id)->row_array();
        
        $this->template->load('layoutbackend', 'karyawan/karyawan_edit', $data);
    }

    public function update()
    {
        if(isset($_POST['update'])) {

            //apabila ada gambar yg diupload
            if(!empty($_FILES['userfile']['name'])) {
                

                $this->_set_rules();

                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){
                    
                    $nik = $this->input->post('nik');
                    
                    $nama = slug($this->input->post('nama'));
                    $config['upload_path']   = './assets/img/karyawan/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']	     = '1000';
                    $config['max_width']     = '2000';
                    $config['max_height']    = '1024';
                    $config['file_name']     = $nama; 
                            
                    $this->upload->initialize($config);

                        //apabila ada gambar yg diupload
                    if ($this->upload->do_upload('userfile')){
                        
                        $gambar = $this->upload->data();

                        $save  = array(
                            'nik'   => $this->input->post('nik'),
                            'nama'  => $this->input->post('nama'),
                            'jk'    => $this->input->post('jenis'),
                            'ttl'   => $this->input->post('tgl_lahir'),
                            'bagian' => $this->input->post('bagian'),
                            'gambar' => $gambar['file_name']
                        );

                        $g = $this->Mod_karyawan->getGambar($nik)->row_array();
                        
                        //hapus gambar yg ada diserver
                        unlink('assets/img/karyawan/'.$g['gambar']);

                        $this->Mod_karyawan->updateKaryawan($nik, $save);
                        
                        redirect('karyawan/index/update-success');

                    }
                    //apabila tidak ada gambar yg diupload
                    else{
                        $data['message'] = "<div class='alert alert-block alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>"; 
                        $this->template->load('layoutbackend', 'karyawan/karyawan_create', $data);
                    } 
                        
                    
                }
                //jika tidak mengkosongkan
                else{
                    $nik = $this->input->post('nik');
                    $data['edit']    = $this->Mod_karyawan->cekAnggotKaryawan($nik)->row_array();
                    $data['message']="";
                    $this->template->load('layoutbackend', 'karyawan/karyawan_edit', $data);
                }

            }else{
                $this->_set_rules();
                
                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){

                    
                    $nik = $this->input->post('nik');
                    
                    

                        $save  = array(
                            'nik'   => $this->input->post('nik'),
                            'nama'  => $this->input->post('nama'),
                            'jk'    => $this->input->post('jenis'),
                            'ttl'   => $this->input->post('tgl_lahir'),
                            'bagian' => $this->input->post('bagian')
                        );
                        $this->Mod_karyawan->updateKaryawan($nik, $save);
                        // echo "berhasil"; die();
                        redirect('karyawan/index/update-success');

                   
                        
                    
                }
                //jika tidak mengkosongkan
                else{
                    $nik = $this->input->post('nik');
                    $data['edit']    = $this->Mod_karyawan->cekKaryawan($nik)->row_array();
                    $data['message']="";
                    $this->template->load('layoutbackend', 'karyawan/karyawan_edit', $data);
                }

            }    

        } //end post update

    }//end function update

    public function delete()
    {

        $nik = $this->input->post('kode');

       

        $g = $this->Mod_karyawan->getGambar($nik)->row_array();
        
        //hapus gambar yg ada diserver
        unlink('assets/img/karyawan/'.$g['gambar']);

        $this->Mod_karyawan->deleteKaryawan($nik, 'karyawan');
        // echo "berhasil"; die();
        redirect('karyawan/index/delete-success');
        
    }

    //function global buat validasi input
    public function _set_rules()
    {
        $this->form_validation->set_rules('nik','NIK','required|max_length[10]');
        $this->form_validation->set_rules('nama','Nama','required|max_length[50]');
        $this->form_validation->set_rules('jenis','Jenis Kelamin','required|max_length[2]');
        $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required'); 
        $this->form_validation->set_rules('bagian','Bagian','required|max_length[10]');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }



}

/* End of file karyawan.php */
 