<?php 
require_once('koneksi.php');

$id = $_GET['id'];

$sql = mysqli_query($konek, "SELECT nama_berkas FROM surat_masuk WHERE id = '$id' ");
$b = mysqli_fetch_assoc($sql);

unlink("uploads/".$b['nama_berkas']);

$eksekusi = mysqli_query($konek, "DELETE FROM surat_masuk WHERE id = '$id' ");

header('location: ../surat_masuk.php');

?>