<?php 
require_once('koneksi.php');

$id = $_GET['id'];

$eksekusi = mysqli_query($konek, "DELETE FROM guru WHERE id = '$id' ");

header('location: ../guru.php');

?>