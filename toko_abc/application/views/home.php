<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home - TOKO ABC</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="<?php echo base_url()."assets/css/styles.css" ?>" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?php echo base_url()."index.php/hal_admin/"; ?>">TOKO ABC</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <div class="navbar">
                <ul class="bg-dark text-white nav navbar-nav navbar-right ">
                    <li>
                        <?php
                        $keranjang = 'Keranjang Belanja: ' .$this->cart->total_items()
                        ?>

                        <?php echo anchor('dashboard/detail_keranjang', $keranjang) ?>
                    </li>
                </ul>
            </div>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->

            <ul class="na navbar-nav navbar-right">
                <?php if($this->session->userdata('username')) { ?>
                    <li><div>Selamat Datang <?php echo $this->session->userdata('username') ?></div></li>
                    <li><?php echo anchor('auth/logout', 'Logout') ?></li>
                    <?php } else { ?>
                        <li><?php echo anchor('auth/login', 'Login') ?></li>
                    <?php } ?>

            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?php echo base_url()."index.php/hal_admin/"; ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Authentication</div>
                            <a class="nav-link" href="<?php echo base_url()."index.php/hal_utama/aksi_login/"; ?>">
                                    Login
                            </a>
                            <a class="nav-link" href="<?php echo base_url()."index.php/hal_utama/daftar/"; ?>">
                                    Daftar
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Home</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url()."index.php/hal_admin/"; ?>">Home</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">

                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                            <br>
                                <table class="table table-bordered" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($dataMu as $dat){ ?>
                                            <tr>
                                                <td><?php echo $dat['no']; ?></td>
                                                <td><?php echo $dat['nama_barang']; ?></td>
                                                <td>Rp <?php echo number_format($dat['harga_barang'], 0, ',','.'); ?></td>
                                                <td><?php echo $dat['jumlah']; ?></td>
                                                <td><?php echo anchor('dashboard/tambah_ke_keranjang/' .$dat['no'], '<div class="btn-sm btn-primary"><center>Tambah ke Keranjang</center></div>')?></td>
                                                <!-- <td align="middle"><a href="#" class="btn btn-primary">Masukkan keranjang</a></td> -->
                                                <!-- <td>
                                                    <a href="<?php echo base_url()."index.php/hal_admin/hapus_data/".$dat['no']; ?>">Hapus</a> |
                                                    <a href="<?php echo base_url()."index.php/hal_admin/ambil_Datawhere/".$dat['no']; ?>">Update</a>
                                                </td> -->
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-header">
                                    <!-- <a href="<?php echo base_url(). "index.php/hal_admin/baca_form"; ?>">Nambah Data</a><br> -->
                                    <a href="<?php echo base_url(). "index.php/hal_admin/form_daftarAPI"; ?>">Daftarkan Autentifikasi API</a>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url()."assets/js/scripts.js" ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="<?php echo base_url()."js/datatables-simple-demo.js" ?>"></script>
    </body>
</html>
