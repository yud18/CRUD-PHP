<?php

session_start();
include 'layout/batas.php';

$title = 'Tambah Barang';
include 'layout/header.php';

//cek apakah tombol tambah di tekan
if (isset($_POST['tambah'])) {
  if (create_barang($_POST) > 0) {
    echo "<script> 
            alert('Data Barang Berhasil Ditambahkan');
            document.location.href = 'barang.php';
        </script>";
  } else {
    echo "<script> 
            alert('Data Barang Gagal Ditambahkan');
            document.location.href = 'barang.php';
        </script>";
  }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">DATA BARANG</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?= $title; ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->


  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Formulir <?= $title; ?></h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">

              <form action="" method="post">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Barang</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang ..." required>
                </div>

                <div class="mb-3">
                  <label for="jumlah" class="form-label">Jumlah</label>
                  <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Barang ..." required>
                </div>

                <div class="mb-3">
                  <label for="harga" class="form-label">Harga</label>
                  <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Barang ..." required>
                </div>

                <!-- CONTOH MENARIK TABEL BERBEDA -->
                <!--<div class="mb-3">
        <label for="mahasiswa" class="form-label">Nama Mahasiswa</label>
        <select id="mahasiswa" name="mahasiswa" class="form-control" required>
        <option value="">- Pilih Mahasiswa -</option> -->
                <?php
                // Panggil fungsi select untuk mendapatkan data mahasiswa
                // $query = "SELECT id_mahasiswa, nama FROM mahasiswa ORDER BY nama ASC";
                // $mahasiswa = select($query);

                // Tampilkan data dalam dropdown
                // foreach ($mahasiswa as $row) {
                //     echo "<option value='{$row['id_mahasiswa']}'>{$row['nama']}</option>";
                // }
                ?>
                </select>
            <!-- </div> -->





            <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
            <button class="btn btn-secondary" onclick="window.location.href='barang.php'" style="float: right; margin-right: 10px;">Kembali</button>


            </form>






          </div>
        </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Inisialisasi Select2 -->
<script>
  $(document).ready(function() {
    $('#mahasiswa').select2({
      placeholder: "- Pilih Mahasiswa -",
      width: '100%'
    });
  });
</script>

<?php include 'layout/footer.php'; ?>