<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_jenis');
    }


    public function index()
    {
        $data['jenis'] = $this->Mod_jenis->getAll()->result();

        if($this->uri->segment(3)=="create-success") {
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
            $this->template->load('layoutbackend', 'jenis/jenis_data', $data);
        }
        else if($this->uri->segment(3)=="update-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Diperbarui...!</p></div>"; 
            $this->template->load('layoutbackend', 'jenis/jenis_data', $data);
        }
        else if($this->uri->segment(3)=="delete-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
            $this->template->load('layoutbackend', 'jenis/jenis_data', $data);
        }
        else{
            $this->template->load('layoutbackend', 'jenis/jenis_data', $data);
        }

       
    }

    public function create()
    {
        $this->template->load('layoutbackend', 'jenis/jenis_create');
    }

    public function insert()
    {
        if(isset($_POST['save'])) {
        
            //function validasi
            $this->_set_rules();

            //apabila users mengisi form
            if($this->form_validation->run()==true){
                $username = $this->input->post('nama_jenis');
                $cek = $this->Mod_jenis->cekNamaJenis($nama_jenis);
                //cek nis yg sudah digunakan
                if($cek->num_rows() > 0){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>Nama Jenis</strong> Sudah Digunakan...!</p></div>"; 
                    $this->template->load('layoutbackend', 'jenis/jenis_create', $data); 
                }
                //kalo blm digunakan lakukan insert data kedatabase
                else{
                    
                    $save  = array(
                        'nama_jenis'   => $this->input->post('nama_jenis'),
                        'deskripsi'  => $this->input->post('deskripsi')
                    );
                    $this->Mod_jenis->insertJenis("jenis", $save);
                    // echo "berhasil"; die();
                    redirect('jenis/index/create-success');
                }
            }
            //jika users mengkosongkan form input
            else{
                $this->template->load('layoutbackend', 'jenis/jenis_create');
            } 

        } //end $_POST['save']
    }

    public function edit($id)
    {
         
        $data['edit']    = $this->Mod_jenis->getJenis($id)->row_array();
        // $data['karyawan'] =  $this->Mod_karyawan->getAll()->result_array();
        // print_r($data['edit']); die();
        $this->template->load('layoutbackend', 'jenis/jenis_edit', $data);
    }

    public function update()
    {
        if(isset($_POST['update'])) {
        
            $this->_set_rules();

            //apabila user apabila user mengisi form input
            if($this->form_validation->run()==true){

                // //apabila password diganti
                 if($this->input->post('deskripsi') != "") {
                //     $id_jenis      = $this->input->post('id_jenis');
                    
                //     $save  = array(
                //         'id_jenis' => $this->input->post('id_jenis'),
                //         'nama_jenis'   => $this->input->post('nama_jenis'),
                //         'deskripsi'   => ($this->input->post('deskripsi')
                //     );
                //     $this->Mod_jenis->updateJenis($id_jenis, $save);
                //     // echo "berhasil"; die();
                //     redirect('jenis/index/update-success'); 

                //jika password tidak diganit    
                //}
                    $id_jenis      = $this->input->post('id_jenis');
                    
                    $save  = array(
                        'id_jenis' => $this->input->post('id_jenis'),
                        'nama_jenis'   => $this->input->post('nama_jenis'),
                        'deskripsi'  => $this->input->post('deskripsi')
                    );
                    $this->Mod_jenis->updateJenis($id_jenis, $save);
                    // echo "berhasil"; die();
                    redirect('jenis/index/update-success'); 
                }
                
                
                 

            }
            //jika mengkosongkan
            else{
                $id_jenis      = $this->input->post('id_jenis');
                $data['edit']    = $this->Mod_jenis->getJenis($id_jenis)->row_array();
                $this->template->load('layoutbackend', 'jenis/jenis_edit', $data);
            }
        
        }
    }

    public function delete()
    {
        $id_jenis = $this->input->post('id_jenis');

        $this->Mod_jenis->deleteJenis($id_jenis, 'jenis');
        // echo "berhasil"; die();
        redirect('jenis/index/delete-success');
    }

    public function _set_rules(){
        $this->form_validation->set_rules('nama_jenis','Nama Jenis','required|trim');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required|trim');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }

}

/* End of file Users.php */
