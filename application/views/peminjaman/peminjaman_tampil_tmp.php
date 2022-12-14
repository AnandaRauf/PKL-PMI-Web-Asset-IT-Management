<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Kode Barang</td>
            <td>Nama Barang</td>
            <td>Jenis Barang</td>
            <td></td>
        </tr>
    </thead>
    <?php foreach($tmp as $tmp):?>
    <tr>
        <td><?php echo $tmp->kode_barang;?></td>
        <td><?php echo $tmp->nama_barang;?></td>
        <td><?php echo $tmp->jenis_barang;?></td>
        <td><a href="#" class="hapus" kode_barang="<?php echo $tmp->kode_barang;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>
    <?php endforeach;?>
    <tr>
        <td colspan="2" align="center">Total Barang</td>
        <td colspan="2"><input type="text" id="jumlahTmp" readonly="readonly" value="<?php echo $jumlahTmp;?>" class="form-control"></td>
    </tr>
</table>