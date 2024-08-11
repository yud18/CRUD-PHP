<?php

session_start();
include 'layout/batas.php';

$title = 'Tambah Mahasiswa';
include 'layout/header.php';

//cek apakah tombol tambah di tekan
if (isset($_POST['tambah'])){
    if (create_mahasiswa($_POST) > 0){
        echo "<script> 
            alert('Data Mahasiswa Berhasil Ditambahkan');
            document.location.href = 'mahasiswa.php';
        </script>";
    } else {
        echo "<script> 
            alert('Data Mahasiswa Gagal Ditambahkan');
            document.location.href = 'mahasiswa.php';
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
              
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama ..." required>
        </div>
    
        <div class="row">
        <div class="mb-3 col-6">
        <label for="prodi" class="form-label">Prodi Studi</label>
        <select name="prodi" id="prodi" class="form-control" required>
            <option value="">--Pilih Prodi--</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Teknik Komputer">Teknik Komputer</option>
        </select>
        </div>
        

        <div class="mb-3 col-6">
        <label for="jk" class="form-label">Jenis Kelamin</label>
        <select name="jk" id="prodi" class="form-control" required>
            <option value="">--Pilih Jenis Kelamin--</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        </div>
        </div>
        

        <div class="mb-3">
        <label for="telepon" class="form-label">Telepon</label>
        <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon ..." required>
        </div>

        <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea name="alamat" id="alamat"></textarea>
        </div>

        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Email ..." required>
        </div>

        <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto" onchange="previewImg()">
        
        <img src="" alt="" class="img-thumbnail img-preview mt-3" width="100px">

        </div>
        
        <button type="submit" name="tambah" class="btn btn-primary" style = "float: right;">Tambah</button>
        <button class="btn btn-secondary" onclick="window.location.href='mahasiswa.php'" style="float: right; margin-right: 10px;">Kembali</button>


        </form>

        

    
                  
      
       </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
  
  <?php include 'layout/footer.php'; ?>