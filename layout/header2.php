<?php

include 'config/app.php';


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap5.css">
    <title><?= $title; ?></title>
  </head>
  <body>
    <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">CRUD PHP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 2) : ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Barang</a>
        </li>
        <?php endif; ?>
        
        <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 3) : ?>
        <li class="nav-item">
          <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
        </li>
        <?php endif; ?>

        <li class="nav-item">
          <a class="nav-link" href="akun.php">Model</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="logout.php" onclick="return confirm('Yakin Ingin Keluar?')">Keluar</a>
        </li>
    
      </ul>
    </div>

    <div>
      <div class="navbar-brand" href="#"> <?= $_SESSION['nama']; ?> </div>
    </div>
  </div>
</nav>
    </div>