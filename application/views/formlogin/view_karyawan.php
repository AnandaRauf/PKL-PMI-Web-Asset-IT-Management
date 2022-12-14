<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="navbar navbar-default">
        <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('');?>"><strong>Palang Merah Indonesia</strong></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url('login');?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                <li class="active"><a href="<?php echo site_url('login/view_karyawan');?>"><i class="glyphicon glyphicon-user"></i> Karyawan</a></li>
            </ul>
            <div class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-right" role="search" action="<?php echo site_url('login/search_karyawan');?>" method="post">
                    <div class="form-group">
                        <input type="text" name="cari_karyawan" class="form-control" placeholder="Cari Data Karyawan">
                    </div>
                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
                </form>
            </div>
        </div><!--/.nav-collapse -->
        </div>
    </div>
    <!-- end navbar -->
    
    <!-- line-height -->
    <br /><br />




<div class="container">
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-lock"></span> <strong>MASUK</strong>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" action="<?php echo site_url('login');?>" method="post">
                    <?php echo $this->session->flashdata('message');?>
                    <div class="form-group">
                        <p class="col-sm-3">Nama Pengguna </p>
                        
                        <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Nama Pengguna" >
                        </div>
                    </div>
                    <div class="form-group">
                    <p class="col-sm-3">Kata Sandi </p>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Kata Sandi" >
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"/>
                                    Remember me
                                </label>
                            </div>
                        </div>
                    </div> -->
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
        <h4> <?php echo $title; ?></h4><hr class="line-title"> 
        <?php 
        if($karyawan->num_rows() > 0) {
        ?>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Foto</td>
                    <td>NIK</td>
                    <td>Nama</td>
                    <td>Tanggal Lahir</td>
                    <td>Bagian</td>
                </tr>
            </thead>
            <?php 
                $no=0; 
                foreach($karyawan->result() as $row): 
                $no++;
            ?>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php if($row->gambar != "") { ?>
                    <img src="<?php echo base_url('assets/img/karyawan/'.$row->gambar);?>" width="100px" height="100px">
                <?php }else{ ?>
                    <img src="<?php echo base_url('assets/img/karyawan/images.jpg');?>" width="100px" height="100px">
                <?php } ?> 
                </td>
                <td><?php echo $row->nik;?></td>
                <td><?php echo $row->nama;?></td>
                <td><?php echo $row->ttl;?></td>
                <td><?php echo $row->bagian;?></td>
            </tr>
            <?php endforeach;?>
        </table>
        <?php
        echo "$pagination";

        }else{
            echo "Maaf data belum ada";    
        }
        ?>
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
