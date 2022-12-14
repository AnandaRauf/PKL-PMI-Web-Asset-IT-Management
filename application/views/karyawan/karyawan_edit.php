<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('karyawan/edit/'.$edit['nik']); ?>">Karyawan</a></li>
            <li class="active">Ubah Data Karyawan</li>
        </ol>

        <?php
            echo validation_errors();
            //buat message nik
            if(!empty($message)) {
            echo $message;
            }
        ?>

    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">

            <div class="panel-heading">
                Ubah Data Karyawan
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <?php
                //validasi error upload
                if(!empty($error)) {
                    echo $error;
                }
            ?>
            <?php echo form_open_multipart('karyawan/update', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>

                <div class="form-group">
                    <p class="col-sm-2 text-left">NIK </p>

                    <div class="col-sm-10">
                        <input type="text" name="nik" class="form-control" placeholder="NIK" value="<?php echo $edit['nik']; 
                        ?>" readonly="readonly">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Nama </p>

                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $edit['nama'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Jenis Kelamin </p>

                    <div class="col-sm-10">
                    <?php 
                    $jenis_kelamin = array('L' => 'Laki-Laki', 'P' => 'Perempuan'); 
                    echo form_dropdown('jenis',$jenis_kelamin,$edit['jk'],"class='form-control'");    
                    ?>
                   
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Tanggal Lahir </p>

                    <div class="col-sm-10">
                        <input type="text" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" id="tanggal"  value="<?php echo $edit['ttl'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Bagian </p>

                    <div class="col-sm-10">
                        <input type="text" name="bagian" class="form-control" placeholder="Bagian"  value="<?php echo $edit['bagian']; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <p class="col-sm-2 text-left">Foto</p>

                    <div class="col-sm-10">
                        <?php if($edit['gambar'] != '') { ?>
                            <img src="<?php echo base_url('assets/img/karyawan/'.$edit['gambar']);?>" width="100px" height="100px">
                        <?php }else{ ?>
                            <img src="<?php echo base_url('assets/img/karyawan/images.jpg');?>" width="100px" height="100px">
                        <?php } ?> <br /><br />
                        <input type="file" name="userfile" class="form-control btn-file"  value="<?php echo set_value('userfile'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="btn-group pull-left">
                            <?php echo anchor('karyawan', 'Batal', array('class' => 'btn btn-danger btn-sm')); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group pull-right">
                            <input type="submit" name="update" value="Ubah" class="btn btn-success btn-sm">
                        </div>
                    </div>
                </div>
            <?php echo form_close(); ?>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>


<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/bootstrap-datepicker.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>



<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>


<script type="text/javascript">              
$(document).ready(function() {
    $("#tanggal1").datepicker({
        format:'yyyy-mm-dd'
    });
    
    $("#tanggal2").datepicker({
        format:'yyyy-mm-dd'
    });
    
    $("#tanggal").datepicker({
        format:'yyyy-mm-dd'
    });
})
</script>