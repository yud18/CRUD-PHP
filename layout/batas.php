<?php
if (!isset($_SESSION["login"])){
    echo "<script> 
    alert('LOGIN DULU YA DEK YA');
    document.location.href = 'login.php'
    </script>";
}

