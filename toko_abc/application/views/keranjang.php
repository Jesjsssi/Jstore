<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Barang</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="<?php echo base_url()."assets/css/styles.css" ?>" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <div class="sidebar-brand-icon"><i class="fa-solid fa-store"></i></div>
            <a class="navbar-brand ps-3" href="<?php echo base_url()."index.php/hal_admin/"; ?>">ADMIN</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
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
                    <br>
                    <div class="container-fluid">
                        <h4>Keranjang Belanja</h4>

                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Sub-Total</th>
                            </tr>

                            <?php
                            $no = 1;
                            foreach ($this->cart->contents() as $items) : ?>

                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $items['name'] ?></td>
                                    <td><?php echo $items['qty'] ?></td>
                                    <td align="right">Rp <?php echo number_format($items['price'], 0, ',','.') ?></td>
                                    <td align="right">Rp <?php echo number_format($items['subtotal'], 0, ',','.') ?></td>
                                </tr>

                            <?php endforeach; ?>
                                <tr>
                                    <td colspan="4"></td>
                                    <td align="right">Rp <?php echo number_format($this->cart->total(), 0, ',','.')?></td>
                                </tr>

                        </table>

                        <div align="right">
                            <a href="<?php echo base_url('index.php/dashboard/hapus_keranjang')?>"><div class="btn btn-sm btn-danger">Hapus Keranjang</div></a>
                            <a href="<?php echo base_url('index.php/hal_admin')?>"><div class="btn btn-sm btn-primary">Lanjutkan Belanja</div></a>
                            <a href="<?php echo base_url('index.php/dashboard/pembayaran')?>"><div class="btn btn-sm btn-success">Pembayaran</div></a>
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

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'index.php/admin/data_barang/tambah_aksi'; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Harga Barang</label>
            <input type="text" name="harga_barang" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Stok</label>
            <input type="text" name="jumlah" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>