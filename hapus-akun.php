<?php
session_start();
include 'layout/batas.php';

$title = 'Hapus Akun';
include 'layout/header.php';

$id_akun = (int)$_GET['no'];

if (delete_akun($id_akun) > 0) {
    echo "<script> 
        alert('Data Akun Berhasil Dihapus');
        document.location.href = 'akun.php';
    </script>";
} else {
    echo "<script> 
        alert('Data Akun Gagal Dihapus');
        document.location.href = 'akun.php';
    </script>";
}

include 'layout/footer.php';