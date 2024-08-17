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

if (isset($_POST['filter'])) {
  $tgl_awal = strip_tags($_POST['tgl_awal'] . " 00:00:00");
  $tgl_akhir = strip_tags($_POST['tgl_akhir'] . " 23:59:59");

  // QUERY FILTER DATA
  $data_barang = select("SELECT * FROM barang WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY id_barang DESC");
} else {
  $data_barang = select("SELECT * FROM barang ORDER BY id_barang DESC");
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
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->



  <section class="content">
    <div class="container-fluid">
      
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Data Barang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <a href="tambah-barang.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i> Tambah</a>

            <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalFilter">
            <i class="fas fa-search"></i> Filter Data
            </button>
            
              <table id="example2" class="table table-bordered table-hover">
                
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Barcode</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($data_barang as $barang) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $barang['nama']; ?></td>
                      <td><?= $barang['jumlah']; ?></td>
                      <td>Rp.<?= number_format($barang['harga'], 0, ',', '.'); ?></td>
                      <td>
                        <img src="barcode.php?codetype=Code128&size=15&text=<?= $barang['barcode']; ?>&print=true" alt="barcode">
                      </td>

                      <td><?= date('d-m-Y | H:i:s', strtotime($barang['tanggal'])); ?></td>
                      <td width="20%" class="text-center">
                        <a href="ubah-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-success"><i class="fas fa-edit"></i> Ubah</a>
                        <a href="hapus-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Hapus Data ini?')"><i class="fas fa-trash-alt"></i> Hapus</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal filter -->
<!-- Modal -->
<div class="modal fade" id="modalFilter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-search"></i> Filter Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="tgl_awal">Tanggal Awal</label>
                        <input type="date" name="tgl_awal" id="tgl_awal" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="tgl_akhir">Tanggal Akhir</label>
                        <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary" name="filter">Simpan</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>