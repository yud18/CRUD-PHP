<?php 
session_start();
include 'layout/batas.php';

$title = 'Detail Mahasiswa';
include 'layout/header.php';

$id_mahasiswa = (int)$_GET['id_mahasiswa'];

$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
?>

<div class="container mt-5">
        <h1>Data <?= $mahasiswa['nama']; ?></h1>
        <br>

        <table class="table table-bordered table-striped mt-3">
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
                    <img src="asset/img/<?= $mahasiswa['foto']; ?>" alt="foto" width="50">
                    </a>
                    
            </td>
            </tr>
        </table>
        <a href="mahasiswa.php" class="btn btn-warning" style="float:right;">Kembali</a>
    </div>

<?php include 'layout/footer.php'; ?>
