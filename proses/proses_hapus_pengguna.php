<?php 
require_once('koneksi.php');

$id = $_GET['id'];

$eksekusi = mysqli_query($konek, "DELETE FROM users WHERE id = '$id' ");

header('location: ../pengguna.php');

?>