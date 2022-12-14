<style>
    div#loader {
        text-align: center;
        z-index: 9999;
    }
</style>
<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a  href="<?php echo base_url('laporan/pengembalian'); ?>">Laporan</a></li>
            <li class="active">Pengembalian</li>
        </ol>

    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $title;?>
            </div>
            <div class="panel-body">
               <br />
               <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-2">Tanggal Awal</label>
                        <div class="col-lg-5">
                            <input type="text" id="tanggal1" class="form-control">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-lg-2">Tanggal Akhir</label>
                        <div class="col-lg-5">
                            <input type="text" id="tanggal2" class="form-control">
                        </div>
                        <div class="col-lg-4">
                            <button id="tampilkan" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Tampilkan</button>
                        </div>
                    </div>    
               
               </div><br />
               <div id="loader"></div>
               <form action="<?=base_url('laporan/cetakPengembalian')?>" method='post' id="form_cetakPengembalian">
                
                <a id="cetakPengembalian" onclick="cetak()" class="btn btn-info"><i class="glyphicon glyphicon-print"></i> Cetak</a>
                        
               <div id="tampil"></div>
            
            </div> <!-- end panel body -->
        
        </div><!-- end panel -->

    </div> <!-- end lg -->
</div> <!-- end row -->

<!-- Modal Cari Barang -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <!-- <h4 class="modal-title"><strong>Detail Pengembalian</strong></h4> -->
        </div>
        <div class="modal-body"><br />
            <!--<label class="col-lg-4 control-label"></label>-->
          

            <div id="tampildetail"></div>

        </div>

        <br /><br />
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <!--<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>-->
        </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End Modal Cari Barang -->



<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/bootstrap-datepicker.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {

    //alert('');

    //load datatable
    $('#dataTables-example').DataTable({
        responsive: true
    });

    $('#cetakPengembalian').hide();

    //datepicker
    $("#tanggal1").datepicker({
        format:'yyyy-mm-dd'
    });
    
    $("#tanggal2").datepicker({
        format:'yyyy-mm-dd'
    });
    
    $("#tanggal").datepicker({
        format:'yyyy-mm-dd'
    });


    //get data via ajax 
    $("#tampilkan").click(function(){

        var tanggal1 = $("#tanggal1").val();
        var tanggal2 = $("#tanggal2").val();

        

        if(tanggal1 == "") {
            alert("Silahkan isi periode tanggal awal")
            $("#tanggal1").focus();
            return false;
        }
        else if(tanggal2 == ""){
            alert("Silahkan isi periode tanggal akhir")
            $("#tanggal2").focus();
            return false;
        }
        else{

            $('#loader').html('<img src="<?php echo base_url('assets/img/loader/loader1.gif') ?>"> ');

            $.ajax({
                url:"<?php echo site_url('laporan/cari_pengembalian');?>",
                type:"POST",
                data:"tanggal1="+tanggal1+"&tanggal2="+tanggal2,
                cache:false,
                success:function(hasil){
                    // console.log(hasil);
                    $("#tampil").html(hasil);

                     $('#loader').html("").hide();
                     $('#cetakPengembalian').show();
                }
            })

            //  $('#loader').html("").hide();

        }

    }) //end tampilkan 

    $('body').on('click', '.show-kembali', function(){
        
        var id_transaksi = $(this).attr("kode");
        //alert(id_transaksi);        
        // $("#myModal3").modal("show");
        $.ajax({
                url:"<?php echo site_url('laporan/detail_pengembalian');?>",
                type:"POST",
                data:"id_transaksi="+id_transaksi,
                cache:false,
                success:function(hasil){
                    //console.log(hasil);
                    
                    $("#tampildetail").html(hasil);
                    $("#myModal3").modal("show");
                    //  $('#loader').html("").hide();
                }
            })
     
     });
    

}); //end document
</script>
<script>
    function cetak(){
        var head = document.getElementsByTagName('head')[0].innerHTML;
        var print = document.getElementById('print-area').innerHTML;
        


        var doc = window.open();
        doc.document.write('<head>'+head+'</head>');
        doc.document.write(`
        <body onload="window.print()">
        <div class="row">
        <div class="col-sm-3" align="center">  
            <img src="<?php echo base_url('assets/img/logo/logo.jpg');?>" width="768px" height="100px">
        </div>
                <div class="col-sm-12">
                    <div class="card-box">
                    <h4 class="m-t-0 header-title" style="text-align: center;"><b>LAPORAN INVENTARIS BARANG</b></h4>
                    <p class="text-muted m-b-30 font-13" style="text-align: center;">
                        BERBASIS WEB
                    </p>
                <table class="table table-bordered">
        `);
        
        doc.document.write(print);
        doc.document.write(`
        </table>
                <p class="mr-2" align="right">Sukabumi,<?php
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
            </div></body>
        `);
    }
</script>



