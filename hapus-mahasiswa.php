<?php
session_start();
include 'layout/batas.php';

$title = 'Hapus Mahasiswa';
include 'layout/header.php';

$id_mahasiswa = (int)$_GET['id_mahasiswa'];

    if (delete_mahasiswa($id_mahasiswa) > 0){
        echo "<script> 
            alert('Data Mahasiswa Berhasil Dihapus');
            document.location.href = 'mahasiswa.php';
        </script>";
    } else {
        echo "<script> 
            alert('Data Mahasiswa Gagal Dihapus');
            document.location.href = 'mahasiswa.php';
        </script>";
    }
?>


<?php
include 'layout/footer.php';
?>