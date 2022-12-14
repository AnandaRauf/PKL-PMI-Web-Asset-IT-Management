<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a  href="<?php echo base_url('peminjaman'); ?>">Transaksi</a></li>
            <li class="active">Peminjaman</li>
        </ol>

        <?php
            
            if(!empty($message)) {
                echo $message;
            }
        ?>

    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        
    <!-- <legend>Transaksi</legend> -->
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo site_url('peminjaman/simpan');?>" method="post">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-4 ">No. Transaksi</label>
                            <div class="col-lg-7">
                                <input type="text" id="no_transaksi" name="no_transaksi" class="form-control" value="<?php echo $autonumber ?>" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-4 ">Tgl Pinjam</label>
                            <div class="col-lg-7">
                                <input type="text" id="tgl_pinjam" name="tgl_pinjam" class="form-control" value="<?php 
                                echo $tglpinjam; ?>" readonly="readonly">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-4 ">Tgl Kembali</label>
                            <div class="col-lg-7">
                                <input type="text" id="tgl_kembali" name="tgl_kembali" class="form-control" value="<?php echo $tglkembali; ?>" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-4 ">NIK</label>
                            <div class="col-lg-7">
                                <select name="nik" class="form-control" id="nik">
                                    <option> </option>
                                    <?php foreach($karyawan as $da): ?> 
                                    <option  value="<?php echo $da->nik ?>"><?php echo $da->nik ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-4 ">Nama Karyawan</label>
                            <div class="col-lg-7">
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- data barang -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Data Barang</strong>
            </div>
            
            <div class="panel-body">
                <div class="form-inline">
                    <div class="form-group">
                        <label>Kode barang</label>
                        <input type="text" class="form-control"  id="kode_barang" >
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control"  id="nama_barang" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label >Jenis Barang</label>
                        <input type="text" class="form-control"  id="jenis_barang" readonly="readonly">
                    </div>
                    <div class="form-group ">
                        <label class="sr-only">Tombol Tambah Barang</label>
                        <button id="tambah_barang" class="btn btn-primary"> Tambah Barang <i class="glyphicon glyphicon-plus"></i></button>
                    </div>
                    <div class="form-group">
                        <label class="sr-only">Tombol Cari Barang</label>
                        <button id="cari" class="btn btn-success"> Cari Barang <i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
                <br /><br />

                <!-- buat tampil tabel tmp     -->
                <div id="tampil"></div>
            </div>
            
            
            
            <div class="panel-footer">
                <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
            </div>
        </div>
        <!-- end data barang -->

        
    </div>
    <!-- /.col-lg-12 -->

</div>
<!-- /.end row -->

 

<!-- Modal Cari barang -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><strong>Cari Barang</strong></h4>
        </div>
        <div class="modal-body"><br />
            <!--<label class="col-lg-4 control-label">Cari Nama Barang</label>-->
            <input type="text" name="caribarang" id="caribarang" class="form-control" placeholder="Masukkan Kode Barang atau Nama Barang">

            <div id="tampilbarang"></div>

        </div>

        <br /><br />
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <!--<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>-->
        </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End Modal Cari barang -->





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

    $('#dataTables-example').DataTable({
        responsive: true
    });


    //load data tmp 
    function loadData()
    {
        $("#tampil").load("<?php echo site_url('peminjaman/tampil_tmp') ?>");
    }
    loadData();

    //function buat mengkosong form data barang setelah di tambah ke tmp
    function EmptyData()
    {
        $("#kode_barang").val("");
        $("#nama_barang").val("");
        $("#jenis_barang").val("");
    }

    //ambil data karyawan berdasarkan nik
    // $("#nik").click(function(){
    $("#nik").change(function(){    
        var nik = $("#nik").val();
        
        $.ajax({
            url:"<?php echo site_url('peminjaman/cari_karyawan');?>",
            type:"POST",
            data:"nik="+nik,
            cache:false,
            success:function(html){
                $("#nama").val(html);
                // document.write(html)
            }
        })
        
    });

    //show modal search barang
    $("#cari").click(function(){
        $("#myModal2").modal("show");
        //return false;  biar gk langsung ilang
    })

    //search barang
    $("#caribarang").keyup(function(){
        var caribarang = $('#caribarang').val();

         $.ajax({
            url:"<?php echo site_url('peminjaman/cari_barang');?>",
            type:"POST",
            data:"caribarang="+caribarang,
            cache:false,
            success:function(hasil){
                $("#tampilbarang").html(hasil);
                
            }
        })
        
    })


    //tambah barang dari modal ke form
    
    // $(".tambah").live("click", function(){
    $('body').on('click', '.tambah', function(){
        
        var kode_barang = $(this).attr("kode_barang");
        var nama_barang     = $(this).attr("nama_barang");
        var jenis_barang = $(this).attr("jenis_barang");
        
        $("#kode_barang").val(kode_barang);
        $("#nama_barang").val(nama_barang);
        $("#jenis_barang").val(jenis_barang);

        $("#myModal2").modal("hide");
        //console.log(kode_barang);
       
    });


    //event keypress cari kode
    $("#kode_barang").keypress(function(){
        
    
        if(event.which == 13) {
            var kode_barang = $("#kode_barang").val();

            $.ajax({
                url:"<?php echo site_url('peminjaman/cari_kode_barang');?>",
                type:"POST",
                data:"kode_barang="+kode_barang,
                cache:false,
                success:function(hasil){
                //split digunakan untuk memecah string    
                   data = hasil.split("|");
                   if(data==0) {
                       alert("Kode Barang " + kode_barang + " Tidak Ada");
                       $("#nama_barang").val("");
                       $("#jenis_barang").val("");
                   }
                   else{
                       $("#nama_barang").val(data[0]);
                       $("#jenis_barang").val(data[1]);
                       $("#tambah_barang").focus();
                   }

                   //console.log(data);
                }
            })
            
        } 

    }) //end event keypress

    //tambah_barang ke tmp
    $("#tambah_barang").click(function(){
        
        var kode_barang = $("#kode_barang").val();
        var nama_barang     = $("#nama_barang").val();
        var jenis_barang = $("#jenis_barang").val();

        if(kode_barang == "") {
            alert("Kode " + kode_barang + " Masih Kosong ");
            $("#kode_barang").focus();
            return false;
        }
        else if(nama_barang == ""){
            alert("Nama " + nama_barang + " Masih Kosong ");
            return false;
        }
        else{
            $.ajax({
                url:"<?php echo site_url('peminjaman/save_tmp');?>",
                type:"POST",
                data:"kode_barang="+kode_barang+"&nama_barang="+nama_barang+"&jenis_barang="+jenis_barang,
                cache:false,
                success:function(hasil){
                    loadData();
                    EmptyData();
                   
                }
            })
        }

    }) //end tambahbarang 

    // //delete tabel tmp
    $('body').on('click', '.hapus', function(){
        
        //ambil dulu atribute kodenya
        var kode_barang = $(this).attr('kode_barang');
        $.ajax({
            url:"<?php echo site_url('peminjaman/hapus_tmp');?>",
            type:"POST",
            data:"kode_barang="+kode_barang,
            cache:false,
            success:function(hasil){
                // alert(hasil);
                loadData();
            }
        })
        

    }); //end delete table tmp

    //simpan transaksi 
    //$("#simpan").click(function(){
    $('body').on('click', '#simpan', function(){    
        
        //tampung data dari form buat dikirim 
        var no_transaksi = $("#no_transaksi").val();
        var tgl_pinjam   = $("#tgl_pinjam").val();
        var tgl_kembali  = $("#tgl_kembali").val();
        var nik          = $("#nik").val();
        var jumlah_tmp   = parseInt($("#jumlahTmp").val(), 10);

        //cek nik jika kosong 
        if(nik == "") {
            alert("Pilih NIK Karyawan");
            $("#nik").focus();
            return false;
        }
        else if(jumlah_tmp == 0){
            alert("Pilih barang yang di pinjam");
            return false;
        }
        else{
            $.ajax({
                url:"<?php echo site_url('peminjaman/simpan_transaksi');?>",
                type:"POST",
                data:"no_transaksi="+no_transaksi+"&tgl_pinjam="+tgl_pinjam+"&tgl_kembali="+tgl_kembali+
                "&nik="+nik+"&jumlah_tmp="+jumlah_tmp,
                cache:false,
                success:function(hasil){
                  //console.log(hasil);
                 
                  alert("Transaksi Peminjaman Berhasil");
                  
                  location.reload();
                }
            })
        }
        
    })


  

});
</script>



