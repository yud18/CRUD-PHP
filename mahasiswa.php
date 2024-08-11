<?php 

session_start();
include 'layout/batas.php';

$title = 'Mahasiswa';
include 'layout/header.php';

//membatasi hak akses 
if ($_SESSION["level"] != 1 AND $_SESSION["level"] != 3 ){
    echo "<script> 
    alert('Anda Tidak Memiliki Hak Akses');
    document.location.href = 'akun.php'
    </script>";
}

$data_mahasiswa = select("SELECT * FROM mahasiswa");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title; ?></h1>
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
                <h3 class="card-title">Tabel <?= $title; ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">

            <a href="tambah-mahasiswa.php" class="btn btn-primary mb-1 mr-2"><i class="fas fa-plus-circle"></i> Tambah</a>
            <a href="download-excel-mahasiswa.php" class="btn btn-success mb-1 mr-2"><i class="fas fa-file-excel"></i> Download Excel</a>
            <a href="download-pdf-mahasiswa.php" class="btn btn-danger mb-1 mr-2"><i class="fas fa-file-pdf"></i> Download PDF</a>
   
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Jenis Kelamin</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_mahasiswa as $mahasiswa) :?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $mahasiswa['nama']; ?></td>
                    <td><?= $mahasiswa['prodi']; ?></td>
                    <td><?= $mahasiswa['jk']; ?></td>
                    <td><?= $mahasiswa['telepon']; ?></td>
                    <td width="25%" class="text-center">
                    <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-warning"><i class="fas fa-info-circle"></i> Detail</a>
                        <a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-success"><i class="fas fa-edit"></i> Ubah</a>
                        <a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Hapus Data ini?')"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </td>
                </td>
                </tr>
                <?php endforeach ?>
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
  
  <?php include 'layout/footer.php'; ?>