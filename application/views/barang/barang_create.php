<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('barang/create'); ?>">Barang</a></li>
            <li class="active">Masukkan Data Barang</li>
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
                Masukkan Data Barang 
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <?php
                //validasi error upload
                if(!empty($error)) {
                    echo $error;
                }
            ?>
            <?php echo form_open_multipart('barang/insert', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Kode Barang </p>

                    <div class="col-sm-10">
                        <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" value="<?php echo set_value('kode_barang'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Nama Barang </p>

                    <div class="col-sm-10">
                        <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?php echo set_value('nama_barang'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Jenis Barang </p>

                    <div class="col-sm-10">
                        <input type="text" name="jenis_barang" class="form-control" placeholder="Jenis Barang" value="<?php echo set_value('jenis_barang'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Jumlah </p>

                     <div class="col-sm-10">
                        <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" value="<?php echo set_value('jumlah'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Keterangan </p>

                    <div class="col-sm-10">
                        <textarea name="keterangan"><?php echo set_value('keterangan'); ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <p class="col-sm-2 text-left">Gambar</p>

                    <div class="col-sm-10">
                        <input type="file" name="userfile" class="form-control btn-file"  value="<?php echo set_value('userfile'); ?>">
                    </div>
                </div>
z
                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="btn-group pull-left">
                            <?php echo anchor('barang', 'Batal', array('class' => 'btn btn-danger btn-sm')); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group pull-right">
                            <input type="submit" name="save" value="Simpan" class="btn btn-success btn-sm">
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

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/tinymce/tinymce.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>



<script type="text/javascript">

tinymce.init({selector:'textarea'});

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