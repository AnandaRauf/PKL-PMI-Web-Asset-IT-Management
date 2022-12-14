<?php if($hasil_search->num_rows() > 0) { ?>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>No.</td>
            <td>ID Transaksi</td>
            <td>Tanggal Pinjam</td>
            <td>Tanggal Kembali</td>
            <td>Status</td>
            <td>NIK</td>
        </tr>
    </thead>
        <?php $no=0; foreach($hasil_search->result() as $row): $no++;?>
        <input type="hidden" name="id_transaksi[]" value="<?=$row->id_transaksi?>">
        <input type="hidden" name="tanggal_pinjam[]" value="<?=$row->tanggal_pinjam?>">
        <input type="hidden" name="tanggal_kembali[]" value="<?=$row->tanggal_kembali?>">
        <input type="hidden" name="status_pinjam[]" value="<?=$row->status_pinjam?>">
        <input type="hidden" name="nik[]" value="<?=$row->nik?>">
        <tr>
            <td><?php echo $no;?></td>
            <td><a class="show-modal" kode="<?php echo $row->id_transaksi ?>" href="#"><?php echo $row->id_transaksi;?></a></td>
            <td><?php echo $row->tanggal_pinjam;?></td>
            <td><?php echo $row->tanggal_kembali;?></td>
            <td><?php echo $row->status_pinjam; ?></td>
            <td><?php echo $row->nik;?></td>
        </tr>
        <?php endforeach;?>
</table>

<?php }else{ ?>
<p class="text-center"><strong> ~ Maaf Data Belum Tersedia ~ </strong></p>
<?php } ?>