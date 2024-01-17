<?php 
require_once('koneksi.php');

$id = $_GET['id'];

$eksekusi = mysqli_query($konek, "DELETE FROM surat_permohonan WHERE id = '$id' ");

header('location: ../permohonan.php');

?>