<!DOCTYPE html>
<html>
  
<!-- Mirrored from coderthemes.com/ubold_2.2/light/components-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Mar 2017 14:09:04 GMT -->
<head>

    <title>Management IT Asset Kantor PMI</title>
     <!-- Bootstrap Core CSS -->
     <link href="http://localhost/inventarisasi_alat_kantor/template/backend/sbadmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
     <link href="http://localhost/inventarisasi_alat_kantor/template/backend/sbadmin/vendor/bootstrap/css/core.css" rel="stylesheet" type="text/css">
     <link href="http://localhost/inventarisasi_alat_kantor/template/backend/sbadmin/vendor/bootstrap/css/component.css" rel="stylesheet" type="text/css">
     <link href="http://localhost/inventarisasi_alat_kantor/template/backend/sbadmin/vendor/bootstrap/css/icons.css" rel="stylesheet" type="text/css">
     <link href="http://localhost/inventarisasi_alat_kantor/template/backend/sbadmin/vendor/bootstrap/css/pages.css" rel="stylesheet" type="text/css">
     <link href="http://localhost/inventarisasi_alat_kantor/template/backend/sbadmin/vendor/bootstrap/css/responsive.css" rel="stylesheet" type="text/css">
  
  </head>
  <body onload="window.print();">
    <div class="row">
        <div class="col-sm-3" align="center">  
            <img src="<?php echo base_url('assets/img/logo/LogoPMI.jpg');?>" width="768px" height="100px">
        </div>
                <div class="col-sm-12">
                    <div class="card-box">
                    <h4 class="m-t-0 header-title" style="text-align: center;"><b>LAPORAN INVENTARIS BARANG</b></h4>
                    <p class="text-muted m-b-30 font-13" style="text-align: center;">
                        BERBASIS WEB
                    </p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Id Transaksi</td>
                            <td>Tanggal Pinjam</td>
                            <td>Tanggal Kembali</td>
                            <td>Status</td>
                            <td>NIK</td>
                        </tr>
                    </thead>
                    <?php for($i=0; $i<sizeof($object->id_transaksi); $i++):?>
                    <tr>
                        <td><?php echo $i+1;?></td>
                        <td><a class="show-modal" kode="<?php echo $object->id_transaksi[$i] ?>" href="#"><?php echo $object->id_transaksi[$i];?></a></td>
                        <td><?php echo $object->tanggal_pinjam[$i];?></td>
                        <td><?php echo $object->tanggal_kembali[$i];?></td>
                        <td><?php echo $object->status_pinjam[$i]; ?></td>
                        <td><?php echo $object->nik[$i];?></td>
                    </tr>
                    <?php endfor;?>
                </table>
                <p class="mr-2" align="right">Jakarta,<?php
                echo date('d-m-Y');
                ?></p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <p align='right'>.........................</p>
                </div>
              </div>
            </div>
  </body>
</html>