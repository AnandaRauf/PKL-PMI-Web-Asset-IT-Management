<?php if($pencarian->num_rows() > 0) { ?>
<br /><br />
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>No. Transaksi</td>
            <td>NIK</td>
            <td>Tgl. Peminjaman</td>
            <td></td>
        </tr>
    </thead>
    <?php foreach($pencarian->result() as $row):?>
    <tr>
        <td><?php echo $row->id_transaksi;?></td>
        <td><?php echo $row->nik;?></td>
        <td><?php echo $row->tanggal_pinjam;?></td>
        <td><a href="#" class="tambahkan" no_transaksi="<?php echo $row->id_transaksi;?>">
            <i class="glyphicon glyphicon-plus"></i>
        </a></td>
    </tr>
    <?php endforeach;?>
</table>
<?php }else{ ?>
<br />
<strong>NIK Tidak Ada</strong>

<?php } ?>
