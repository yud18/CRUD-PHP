<?php 

session_start();
include 'layout/batas.php';

$title = 'Ubah Data Mahasiswa';
include 'layout/header.php';

//ubah

//cek apakah tombol tambah di tekan
if (isset($_POST['ubah'])){
    if (update_mahasiswa($_POST) > 0){
        echo "<script> 
            alert('Data Mahasiswa Berhasil Diubah');
            document.location.href = 'mahasiswa.php';
        </script>";
    } else {
        echo "<script> 
            alert('Data Mahasiswa Gagal DiUbah');
            document.location.href = 'mahasiswa.php';
        </script>";
    }
}
$id_mahasiswa = (int)$_GET['id_mahasiswa'];
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

?>

    <div class="container mt-5">
        <h1>Ubah Data Mahasiswa</h1>
        <br>
        
        <form action="" method="post" enctype="multipart/form-data">
            
        <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">
        <input type="hidden" name="fotoLama" value="<?= $mahasiswa['foto']; ?>">

        <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama']; ?> " placeholder="Nama ..." required>
        </div>

        <div class="row">
        <div class="mb-3 col-6">
        <label for="prodi" class="form-label">Prodi Studi</label>
        <select name="prodi" id="prodi" class="form-control" required>
            <?php $prodi = $mahasiswa['prodi']; ?>
            <option value="Teknik Informatika" <?= $prodi == 'Teknik Informatika' ? 'selected' : null ?>>Teknik Informatika</option>
            <option value="Sistem Informasi"<?= $prodi == 'Sistem Informasi' ? 'selected' : null ?>>Sistem Informasi</option>
            <option value="Teknik Komputer"<?= $prodi == 'Teknik Komputer' ? 'selected' : null ?>>Teknik Komputer</option>
        </select>
        </div>
        

        <div class="mb-3 col-6">
        <label for="jk" class="form-label">Jenis Kelamin</label>
        <select name="jk" id="prodi" class="form-control" required>
            <?php $jk = $mahasiswa['jk']; ?>
            <option value="Laki-Laki" <?= $jk == 'Laki-Laki' ? 'selected' : null ?>>Laki-Laki</option>
            <option value="Perempuan" <?= $jk == 'Perempuan' ? 'selected' : null ?>>Perempuan</option>
        </select>
        </div>
        </div>

        <div class="mb-3">
        <label for="telepon" class="form-label">Telepon</label>
        <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $mahasiswa['telepon'];?>">
        </div>

        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $mahasiswa['email']; ?>">
        </div>

        <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto ...." onchange="previewImg()">
        
        <br>
        <img src="asset/img/<?= $mahasiswa['foto']; ?>" alt="foto" class="img-thumbnail img-preview mt-3" width="100px">
        </div>



        <button type="submit" name="ubah" class="btn btn-primary" style = "float: right;">Ubah</button>



        </form>
    </div>

    <script>
    function previewImg(){
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e){
                imgPreview.src = e.target.result;
        } 
    }

</script>

<?php
include 'layout/footer.php';
?>