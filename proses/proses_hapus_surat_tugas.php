<?php 
require_once('koneksi.php');

$id = $_GET['id'];

$eksekusi = mysqli_query($konek, "DELETE FROM surat_tugas WHERE id = '$id' ");

header('location: ../surat_tugas.php');

?>