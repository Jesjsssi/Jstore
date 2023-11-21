<!DOCTYPE html>

<html>
    <head>
    </head>
    <body>
        <form action="<?php echo base_url()."index.php/hal_admin/tambah_Data"; ?>" method="POST">
            No: <input type="number" name="no"><br><br>
            Nama: <input type="text" name="nama_barang"><br><br>
            Harga: <input type="text" name="harga_barang"><br><br>
            Jumlah: <input type="text" name="jumlah"><br><br><br>
            <input type="submit"> <input type="reset">
        </form>
    </body>
</html>