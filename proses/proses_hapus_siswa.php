<?php 
require_once('koneksi.php');

$id = $_GET['id'];

$eksekusi = mysqli_query($konek, "DELETE FROM siswa WHERE id = '$id' ");

header('location: ../siswa.php');

?>