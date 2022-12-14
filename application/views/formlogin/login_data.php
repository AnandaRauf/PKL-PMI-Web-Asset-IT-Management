<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="IT Asset Management PMI">
    <meta name="author" content="Palang Merah Indoesia">

    <title>Management IT Asset Kantor PMI</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Isi CSS -->
    <link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/css/custom.css" rel="stylesheet">

    <!-- Custom Login CSS -->
    <link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/css/customlogin.css" rel="stylesheet"> 

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>template/backend/sbadmin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>
    <style> body { background-color:lightgrey;
    background-image: url('assets/img/banner/background-pmi.jpg');
     }
     </style>
    <div class="navbar navbar-default">
        <div class="container">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('');?>"><strong>Palang Merah Indonesia</strong></a>
            </div>
        </div><!--/.nav-collapse -->
        </div>
    </div>
    <!-- end navbar -->
    
    <!-- line-height -->
    <br />
    <div class="container">
    <div class="row">
    <div class="col-md-12">      
    <?php
    if(!empty($pesan)) {
        echo $pesan;
    }
    ?>
    </div>
    </div>
    </div>       
    <br />


<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center><span class="glyphicon glyphicon-lock" ></span> <strong>MASUK</strong></center>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" action="        <?php echo site_url('login');?>" method="post">
                    <?php echo $this->session->flashdata('message');?>
                    <div class="form-group">
                    <center><font color="black"> <p class="col-sm-3">Nama Pengguna </p></font></center>
                        
                        <div class="col-sm-9">
                           <?php echo form_error('username'); ?>
                            <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Nama Pengguna" value="<?php echo set_value('username'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                    <center><font color="black"><p class="col-sm-3">Kata Sandi </p></font></center>
                        <div class="col-sm-9">
                            <?php echo form_error('password'); ?>
                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Kata Sandi" value="<?php echo set_value('password'); ?>">
                        </div>
                    </div>
                   
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" name="proses" class="btn btn-success btn-sm">
                                Masuk</button>
                                 <button type="reset" class="btn btn-default btn-sm">
                                Atur Ulang</button>
                        </div>
                    </div>
                </form>
            </div>
           
        </div>
    </div>
    <div class="col-md-8 ">
    
        
    </div>
</div>
</div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>

</body>

</html>
