<?php

//untuk database
function select($query){
    //panggil koneksi database
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

//fungsi menambahkan barang
function create_barang($post){
    global $db;

    $nama       = $post['nama'];
    $jumlah     = $post['jumlah'];
    $harga      = $post['harga'];

    //query tambah data
    $query = "INSERT INTO barang VALUES(null,'$nama','$jumlah','$harga', current_timestamp())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi ubah barang
function update_barang($post){
    global $db;

    $id_barang = $post['id_barang'];
    $nama = $post['nama'];
    $jumlah = $post['jumlah'];
    $harga = $post['harga'];

    //query tambah data
    $query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

//hapus barang
function delete_barang($id_barang){
    global $db;

    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//tambah mahasiswa
function create_mahasiswa($post){
    global $db;

    $nama = strip_tags($post['nama']); //biar script tidak terbaca atau hacker masuk
    $prodi = $post['prodi'];
    $jk = $post['jk'];
    $telepon = $post['telepon'];
    $email = $post['email'];
    $foto = upload_file();

    //check upload file
    if(!$foto){
        return false;
    }

    $query = "INSERT INTO mahasiswa VALUES(null,'$nama','$prodi','$jk','$telepon','$email','$foto')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi upload file
function upload_file(){
 $namaFile = $_FILES['foto']['name'];
 $ukuranFile = $_FILES['foto']['size'];
 $error = $_FILES['foto']['error'];
 $tmpName = $_FILES['foto']['tmp_name'];

 //check file yg diupload
 $extensiFileValid = ['jpg','jpeg','png'];
 $extensiFile = explode('.', $namaFile);
 $extensiFile = strtolower(end($extensiFile));

 //check format extensi file
 if(!in_array($extensiFile, $extensiFileValid)){
    //pesan gagal
    echo "<script>
        alert('Format File Tidak Valid');
        document.location.href = 'tambah-mahasiswa.php'
    </script>";
    die();
 }
 //check ukuran file 2mb
 if($ukuranFile > 2048000){
    //pesan gagal
    echo "<script>
        alert('Format File Max 2 MB');
        document.location.href = 'tambah-mahasiswa.php'
    </script>";
    die();
 }
 
 //generate nama file baru
 $namaFileBaru = uniqid();
 $namaFileBaru .= '.';
 $namaFileBaru .= $extensiFile;

 //pindah ke folder local
 move_uploaded_file($tmpName, 'asset/img/'. $namaFileBaru);
 return $namaFileBaru;

}

//hapus data mahasiswa
function delete_mahasiswa($id_mahasiswa){
    global $db;

    //fitur penghapus gambar di foldernya
    $foto = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
    unlink("asset/img/". $foto['foto']);

    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi ubah mahasiswa
function update_mahasiswa($post){
    global $db;

    $id_mahasiswa = $post['id_mahasiswa'];
    $nama = $post['nama'];
    $prodi = $post['prodi'];
    $jk = $post['jk'];
    $telepon = $post['telepon'];
    $email = $post['email'];
    $fotoLama = strip_tags($post['fotoLama']);

    

     //check upload file
     if($_FILES['foto']['error'] == 4){
        $foto = $fotoLama;
    } else {
        $foto = upload_file();
    }

    //query tambah data
    $query = "UPDATE mahasiswa SET nama = '$nama', prodi = '$prodi', jk = '$jk', telepon = '$telepon', email = '$email', foto = '$foto' WHERE id_mahasiswa = $id_mahasiswa";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

function create_akun($post){
    global $db;

    $nama           = $post['nama'];
    $username       = $post['username'];
    $email          = $post['email'];
    $password       = $post['password'];
    $level          = $post['level'];

    //enkripsi password
    $password       = password_hash($password, PASSWORD_DEFAULT);
    //query tambah data
    $query = "INSERT INTO modal VALUES(null,'$nama','$username','$email','$password', '$level')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function delete_akun($id_akun){
    global $db;


    $query = "DELETE FROM modal WHERE no = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function update_akun($post){
    global $db;

    $id_akun        = $post['no'];
    $nama           = $post['nama'];
    $username       = $post['username'];
    $email          = $post['email'];
    $password       = $post['password'];
    $level          = $post['level'];

    $password       = password_hash($password, PASSWORD_DEFAULT);
    
    //query tambah data
    $query = "UPDATE modal SET nama = '$nama', username = '$username', email = '$email', password = '$password', level = '$level' WHERE no = $id_akun";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}