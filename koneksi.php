<?php 
// isi nama host, username mysql, dan password mysql anda
$host = "localhost";
$username = "root";
$password = "";
$database = "crud";

// Create connection
$koneksi = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
