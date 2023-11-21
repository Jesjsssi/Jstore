<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h2>Halaman Daftar</h2>

        <form action="<?php echo base_url()."index.php/hal_admin/aksi_daftarAPI"; ?>" method="POST">
            Nama: <input type="text" name="nama"><br><br>
            Kode Autentifikasi: <input type="text" name="kode"><br><br>
            <input type="submit"> <input type="reset">
        </form>
        <a href="<?php echo base_url()."index.php/hal_admin/"; ?>">Menu</a>
    </body>
</html>