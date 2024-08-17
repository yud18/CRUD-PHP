<?php
session_start();
include 'layout/batas.php';

$title = 'Kirim Email';
include 'layout/header.php';

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

//Server settings
$mail->SMTPDebug = 0;                                  // Non-verbose debug output
$mail->isSMTP();                                       // Send using SMTP
$mail->Host       = 'smtp.gmail.com';                  // Set the SMTP server to send through
$mail->SMTPAuth   = true;                              // Enable SMTP authentication
$mail->Username   = 'yudaprass18@gmail.com';           // SMTP username
$mail->Password   = 'tes';                       // SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;       // Enable implicit TLS encryption
$mail->Port       = 465;                               // TCP port to connect to

// Cek apakah tombol kirim ditekan
if (isset($_POST['kirim'])) {
    try {
        $mail->setFrom('yudaprass18@gmail.com', 'YUDA PRASETIA');
        $mail->addAddress($_POST['email_penerima']);   // Add a recipient
        $mail->addReplyTo('yudaprass18@gmail.com', 'YUDA PRASETIA');
    
        $mail->Subject = $_POST['subject'];
        $mail->Body    = $_POST['pesan'];
    
        if ($mail->send()) {
            echo "<script> 
                    alert('Email Berhasil Dikirim');
                    document.location.href = 'email.php';
                </script>";
        } else {
            echo "<script> 
                    alert('Email Gagal Dikirim');
                    document.location.href = 'email.php';
                </script>";
        }
    } catch (Exception $e) {
        echo "<script> 
                alert('Email Gagal Dikirim. Mailer Error: {$mail->ErrorInfo}');
                document.location.href = 'email.php';
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
          <h1 class="m-0">KIRIM EMAIL</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?= $title; ?></li>
          </ol>
        </div>
      </div>
    </div>
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

              <form action="" method="post">
                <div class="mb-3">
                  <label for="email_penerima" class="form-label">Email Penerima</label>
                  <input type="email" class="form-control" id="email_penerima" name="email_penerima" placeholder="Email Penerima ..." required>
                </div>

                <div class="mb-3">
                  <label for="subject" class="form-label">Subject</label>
                  <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject ..." required>
                </div>

                <div class="mb-3">
                  <label for="pesan" class="form-label">Pesan</label>
                  <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <button type="submit" name="kirim" class="btn btn-primary" style="float: right;">Tambah</button>
                <button class="btn btn-secondary" onclick="window.location.href='barang.php'" style="float: right; margin-right: 10px;">Kembali</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->

<?php include 'layout/footer.php'; ?>
