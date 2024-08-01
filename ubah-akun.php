<?php 

session_start();
include 'layout/batas.php';

$title = 'Ubah Akun';
include 'layout/header.php';

//ubah
$id_akun = (int)$_GET['no'];
$akun = select("SELECT * FROM modal WHERE no = $id_akun")[0];

//cek apakah tombol tambah di tekan
if (isset($_POST['ubah'])){
    if (update_akun($_POST) > 0){
        echo "<script> 
            alert('Data Akun Berhasil Diubah');
            document.location.href = 'akun.php';
        </script>";
    } else {
        echo "<script> 
            alert('Data Akun Gagal DiUbah');
            document.location.href = 'akun.php';
        </script>";
    }
}

?>

<?php
include 'layout/footer.php';
?>