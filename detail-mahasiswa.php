<?php
session_start();
include 'layout/batas.php';

$title = 'Detail Mahasiswa';
include 'layout/header.php';

$id_mahasiswa = (int)$_GET['id_mahasiswa'];

$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tabel Data Barang</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <td>Nama</td>
                                        <td>: <?= $mahasiswa['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Program Studi</td>
                                        <td>: <?= $mahasiswa['prodi']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>: <?= $mahasiswa['jk']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>: <?= $mahasiswa['telepon']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>: <?= $mahasiswa['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>: <?= $mahasiswa['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Foto</td>
                                        <td>
                                            <a href="asset/img/<?= $mahasiswa['foto']; ?>">
                                                <img src="asset/img/<?= $mahasiswa['foto']; ?>" alt="foto" width="100">
                                            </a>

                                        </td>
                                    </tr>

                                </table>
                                <br>
                                <a href="mahasiswa.php" class="btn btn-warning" style="float:right;">Kembali</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->
        </section>
    </div>

</div>
<?php include 'layout/footer.php'; ?>