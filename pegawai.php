<?php

session_start();
include 'layout/batas.php';

$title = 'Pegawai';
include 'layout/header.php';

//membatasi hak akses 
if ($_SESSION["level"] != 1 and $_SESSION["level"] != 3) {
    echo "<script> 
    alert('Anda Tidak Memiliki Hak Akses');
    document.location.href = 'akun.php'
    </script>";
}


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title; ?></h1>
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

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel <?= $title; ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered table-striped">


                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>

                        <tbody id="live_data">


                        </tbody>

                    </table>

                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    $('document').ready(function() {
        setInterval(function() {
            getPegawai()
        }, 200) //requers data muncul
    });

    function getPegawai() {
        $.ajax({
            url: "realtime-pegawai.php",
            type: "GET",
            success: function(response) {
                $('#live_data').html(response)
            }
        });
    }
</script>

<?php include 'layout/footer.php'; ?>