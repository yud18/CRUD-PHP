<?php

session_start();
include 'layout/batas.php';

$title = 'Barang';
include 'layout/header.php';

$data_barang = select("SELECT * FROM barang ORDER BY tanggal desc ");

//membatasi hak akses 
if ($_SESSION["level"] != 1 and $_SESSION["level"] != 2) {
  echo "<script> 
    document.location.href = 'akun.php'
    </script>";
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              // Menjalankan query untuk menghitung jumlah barang
              $query = "SELECT COUNT(*) as total_barang FROM barang";
              $result = select($query);

              // Mengambil hasil dari array yang dikembalikan oleh fungsi select
              $total_barang = $result[0]['total_barang'];
              ?>
              <h3><?= $total_barang; ?></h3>
              <p>Data Barang</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              // Menjalankan query untuk menghitung jumlah barang
              $query = "SELECT COUNT(*) as total_mahasiswa FROM mahasiswa";
              $result = select($query);

              // Mengambil hasil dari array yang dikembalikan oleh fungsi select
              $total_mahasiswa = $result[0]['total_mahasiswa'];
              ?>
              <h3><?= $total_mahasiswa; ?></h3>
              <p>Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              // Menjalankan query untuk menghitung jumlah barang
              $query = "SELECT COUNT(*) as total_pengguna FROM modal";
              $result = select($query);

              // Mengambil hasil dari array yang dikembalikan oleh fungsi select
              $total_pengguna = $result[0]['total_pengguna'];
              ?>
              <h3><?= $total_pengguna; ?></h3>
              <p>Data Pengguna</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>79</h3>

              <p>Jumlah Pengunjung</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
    </div>
    </div>
</div>
<!-- /.content-wrapper -->

<?php include 'layout/footer.php'; ?>