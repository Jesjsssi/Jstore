<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h2>Halaman Login</h2>
        <form action="<?php echo base_url()."index.php/hal_utama/aksi_login/"; ?>" method="POST">
            Username: <input type="text" name="username"><br><br>
            Password: <input type="password" name="password"><br><br>
            <input type="submit"> <input type="reset">
        </form>
        <a href="<?php echo base_url()."index.php/hal_utama/daftar/"; ?>">Daftar</a>
    </body>
</html>