<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a  href="<?php echo base_url('pengembalian'); ?>">Transaksi</a></li>
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
                <form class="form-horizontal" action="" method="post">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-3 ">No. Transaksi</label>
                            <div class="col-lg-5">
                                <input type="text" name="no_transaksi" id="no_transaksi" class="form-control">
                                <span class="text-danger">*) tekan enter</span>
                            </div>
                            
                            <div class="col-lg-2">
                                <a href="#" class="btn btn-success" id="cari_nik"> Cari &nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</a>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 ">Tgl. Pinjam</label>
                            <div class="col-lg-8">
                                <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-3 ">Tgl. Kembali</label>
                            <div class="col-lg-8">
                                <input type="text" name="tgl_kembali" id="tgl_kembali" class="form-control" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-4 ">NIK</label>
                            <div class="col-lg-8">
                                <input type="text" name="nik" id="nik" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-4 ">Nama</label>
                            <div class="col-lg-8">
                                <input type="text" name="nama" id="nama" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        <input type="hidden" name="kode_barang" id="kode_barang">
                        

            <!-- tampil barang -->
            <div id="tampilbarang"></div>
            <!-- end tampil barang -->
            
            </div>
            
            <div class="panel-footer">
                <button id="simpan_transaksi" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
            </div>
        </div><!-- end panel -->

    </div> <!-- end lg -->
</div> <!-- end row -->



 

<!-- Modal Cari barang -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><strong>Transaksi Pengembalian</strong></h4>
        </div>
        <div class="modal-body"><br />
            
            <input type="text" name="carinik" id="carinik" class="form-control" placeholder="Masukkan NIK Karyawan">

            <div id="tampilnik"></div>

        </div>

        <br /><br />
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      
        </div>
    </div>
    </div>
</div>






<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

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

    //show modal nik
    $("#cari_nik").click(function(){
        $("#myModal3").modal("show");
    });

    //cari by nik
    $("#carinik").keyup(function(){
        var nik = $("#carinik").val();
        
        $.ajax({
            url:"<?php echo site_url('pengembalian/cari_nik');?>",
            type:"POST",
            data:"nik="+nik,
            cache:false,
            success:function(hasil){
                // console.log(hasil);
                $("#tampilnik").html(hasil);
            }
        })
    })


    //tambahkan data dari modal ke form berdasarkan id_transaksi
    $('body').on('click', '.tambahkan', function(){

        var id_transaksi = $(this).attr("no_transaksi");
        // console.log(id_transaksi);
        $("#no_transaksi").val(id_transaksi);
        $("#myModal3").modal("hide");
        $("#no_transaksi").focus();

          var no_transaksi = $("#no_transaksi").val();
            
            $.ajax({
                url:"<?php echo site_url('pengembalian/cari_transaksi');?>",
                type:"POST",
                data:"no_transaksi="+no_transaksi,
                cache:false,
                success:function(hasil){
                //split digunakan untuk memecah string    
                  
                   if(hasil=="") {
                       //alert("Data tidak ditemukan");
                   }
                   else{
                    //    console.log(hasil);
                       data = hasil.split("|");
                       $("#nik").val(data[0]);  
                       $("#tgl_pinjam").val(data[1]);
                       $("#tgl_kembali").val(data[2]);
                       $("#nama").val(data[3]); 
                       $("#kode_barang").val(data[4]);

                       $("#tampilbarang").load("<?php echo site_url('pengembalian/tampil_barang') ?>",
                       "no_transaksi="+no_transaksi);
                   }

                  
                }
            }) 

    });
    

    

    //keypress no_transaksi
    $("#no_transaksi").keyup(function(){



            var no_transaksi = $("#no_transaksi").val();
            
            $.ajax({
                url:"<?php echo site_url('pengembalian/cari_transaksi');?>",
                type:"POST",
                data:"no_transaksi="+no_transaksi,
                cache:false,
                success:function(hasil){
                //split digunakan untuk memecah string    
                  
                   if(hasil=="") {
                       //alert("Data tidak ditemukan");
                   }
                   else{
                    //    console.log(hasil);
                       data = hasil.split("|");
                       $("#nik").val(data[0]);  
                       $("#tgl_pinjam").val(data[1]);
                       $("#tgl_kembali").val(data[2]);
                       $("#nama").val(data[3]); 
                       $("#kode_barang").val(data[4]);


                    //    $("#denda").attr("disabled", false);
                    //    $("#denda").focus();

                       $("#tampilbarang").load("<?php echo site_url('pengembalian/tampil_barang') ?>",
                       "no_transaksi="+no_transaksi);
                   }

                   //console.log(data);
                }
            }) //end ajax



    }) //end keypress


    $("#simpan_transaksi").click(function(){

        var no_transaksi = $("#no_transaksi").val();
        var nik          = $("#nik").val();  
        var kode_barang  = $("#kode_barang").val();  

        if(no_transaksi == "" || nik == ""){
            alert("Pilih ID Transaksi");
            $("#no_transaksi").focus();
            return false;
        }
        
        else {
            $.ajax({
                url:"<?php echo site_url('pengembalian/simpan_transaksi');?>",
                type:"POST",
                data:"no_transaksi="+no_transaksi+"&kode_barang="+kode_barang,
                cache:false,
                success:function(){
                    alert("Transaksi berhasil disimpan");
                    location.reload();
                }
            })//end ajax
        }
       
     

    }) //end simpan_transaksai

    

    
   


  

});
</script>



