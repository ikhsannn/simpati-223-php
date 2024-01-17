<?php 
require_once('koneksi.php');
session_start();
$id = $_SESSION['id'];
mysqli_query($konek, "UPDATE users SET last_logout= now() WHERE id = '$id'");
unset($id);
header('location: ../login.php');
?>