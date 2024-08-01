<?php

session_start();
include 'layout/batas.php';

//kosongkan session user login
$_SESSION = [];

session_unset();
session_destroy();
header("Location: login.php");