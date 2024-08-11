<?php 

session_start();
include 'layout/batas.php';

$title = 'Data Akun';

include 'layout/header.php';

// Mengambil data akun dari database
$data_akun = select("SELECT * FROM modal");

//tampil data berdasarkan user
$id_akun = $_SESSION['no'];
$data_bylogin = select("SELECT * FROM modal where no = $id_akun");

if (isset($_POST['tambah'])){
    if (create_akun($_POST) > 0){
        echo "<script> 
            alert('Data Akun Berhasil Ditambahkan');
            document.location.href = 'akun.php';
        </script>";
    } else {
        echo "<script> 
            alert('Data Akun Gagal Ditambahkan');
            document.location.href = 'akun.php';
        </script>";
    }
}

if (isset($_POST['ubah'])){
    if (update_akun($_POST) > 0){
        echo "<script> 
            alert('Data Akun Berhasil Diubah');
            document.location.href = 'akun.php';
        </script>";
    } else {
        echo "<script> 
            alert('Data Akun Gagal Diubah');
            document.location.href = 'akun.php';
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

  <section class="content">
    <div class="container-fluid">
    <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Data Barang</h3>
              <?php if ($_SESSION['level'] == 1):?>
                
            </div>
            <div class="card-body">
            <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus-circle"></i> Tambah</button>
                <?php endif; ?>

    <table class="table table-bordered table-striped mt-3" id="example2">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php $no = 1; ?>
        <!-- tampil seluruh data -->
         <?php if ($_SESSION['level'] == 1) : ?>
            <?php foreach ($data_akun as $akun) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $akun['nama']; ?></td>
                <td><?= $akun['username']; ?></td>
                <td><?= $akun['email']; ?></td>
                <td>Password Terenkripsi</td>
                <td width="18%" class="text-center">
                    <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['no']; ?>"><i class="fas fa-edit"></i> Ubah</button>
                    <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['no']; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
                <?php foreach ($data_bylogin as $akun) : ?>
            
                    <tr>
                <td><?= $no++; ?></td>
                <td><?= $akun['nama']; ?></td>
                <td><?= $akun['username']; ?></td>
                <td><?= $akun['email']; ?></td>
                <td>Password Terenkripsi</td>
                <td width="18%" class="text-center">
                    <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['no']; ?>"><i class="fas fa-edit"></i> Ubah</button>
                    
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required minlength="6">
                    </div>
                    
                    <div class="mb-3">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control" required>
                        <option value="">--Pilih Level--</option>
                        <option value="1">Admin</option>
                        <option value="2">Operator</option>
                        <option value="3">Mahasiswa</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus-->
<?php foreach ($data_akun as $akun) : ?>
<div class="modal fade" id="modalHapus<?= $akun['no']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p>Yakin Ingin Menghapus Data Akun : <?= $akun['nama']; ?> .?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="hapus-akun.php?no=<?= $akun['no'];?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Modal Ubah-->
<?php foreach ($data_akun as $akun) : ?>
    <div class="modal fade" id="modalUbah<?= $akun['no']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="" method="post">
                <input type="hidden" name="no" value="<?= $akun['no']; ?>">
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $akun['nama']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $akun['username']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= $akun['email']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="password">Password <small>(Masukan Password Lama/Baru)</small></label>
                        <input type="password" name="password" id="password" class="form-control" required minlength="6">
                    </div>

                    <?php if ($_SESSION['level'] == 1) : ?>
                    <div class="mb-3">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control" required>
                        <?php $level = $akun['level']; ?>
                        <option value="1" <?= $level == '1' ? 'selected' : null ?>>Admin</option>
                        <option value="2" <?= $level == '2' ? 'selected' : null ?>>Operator</option>
                        <option value="3" <?= $level == '3' ? 'selected' : null ?>>Mahasiswa</option>
                        </select>
                    </div>
                    <?php else : ?>
                        <input type="hidden" name="level" value="<?= $akun['level']; ?>">
                    <?php endif; ?>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
        </div>
</div>
</div>
</section>
</div>
<?php endforeach; ?>

<?php include 'layout/footer.php'; ?>
    