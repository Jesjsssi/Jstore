<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
            foreach($dataMu as $dat){
        ?>
        <form action="<?php echo base_url()."index.php/hal_admin/update_data"; ?>" method="POST">
            No: <input type="number" name="no" readonly value="<?php echo $dat['no']; ?>"><br><br>
            Nama: <input type="text" name="nama_barang" value="<?php echo $dat['nama_barang']; ?>"><br><br>
            Harga: <input type="text" name="harga_barang" readonly value="<?php echo $dat['harga_barang']; ?>"><br><br>
            Jumlah: <input type="text" name="jumlah" value="<?php echo $dat['jumlah']; ?>"><br><br><br>
            <input type="submit"> <input type="reset">
        </form>

        <?php } ?>
    </body>
</html>