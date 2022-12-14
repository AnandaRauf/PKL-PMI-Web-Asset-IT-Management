<?php if($barang->num_rows() > 0) { ?>
<br /><br />
<table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Kode barang</td>
                <td>Nama Barang</td>
                <td>Jenis Barang</td>
                <td></td>
            </tr>
        </thead>
        <?php foreach($barang->result() as $data):?>
            <?php if($data->jumlah > 0):?>
                <tr>
                    <td><?php echo $data->kode_barang;?></td>
                    <td><?php echo $data->nama_barang;?></td>
                    <td><?php echo $data->jenis_barang;?></td>
                    <td><a href="#" class="tambah" 
                        kode_barang="<?php echo $data->kode_barang;?>"
                        nama_barang="<?php echo $data->nama_barang;?>"
                        jenis_barang="<?php echo $data->jenis_barang;?>"><i class="glyphicon glyphicon-plus"></i></a></td>
                </tr>
            <?php endif?>
        <?php endforeach;?>
    </table>
<?php }else{ ?>
<br />
<strong>Barang Tidak Tersedia</strong>

<?php } ?>
