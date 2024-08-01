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

<div class="container mt-5">
        <h1><i class="fas fa-university"></i> Data Mahasiswa</h1>
        <hr>
        <a href="tambah-mahasiswa.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i> Tambah</a>

        <table class="table table-bordered table-striped mt-3" id="example">
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

<?php include 'layout/footer.php'; ?>
