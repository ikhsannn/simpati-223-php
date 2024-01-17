<?php session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username'];}
require_once("proses/koneksi.php");
require_once("layout/header.php");
require_once("layout/sidebar.php");
$sm = mysqli_query($konek,"SELECT COUNT(*) as jumlah FROM surat_masuk");
$getsm = mysqli_fetch_array($sm);
$st = mysqli_query($konek,"SELECT COUNT(*) as jumlah FROM surat_tugas");
$getst = mysqli_fetch_array($st);
$sk = mysqli_query($konek,"SELECT COUNT(*) as jumlah FROM surat_keterangan");
$getsk = mysqli_fetch_array($sk);
$sp = mysqli_query($konek,"SELECT COUNT(*) as jumlah FROM surat_permohonan");
$getsp = mysqli_fetch_array($sp);
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>About Us</h1>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card">
                <img src="assets/img/ikhsan.jpg" class="card-img-top" alt="ikhsan" height="400">
                <div class="card-body">
                    <h6 class="card-title">202043500674 / Ikhsan Abdillah</h6>
                    <p class="card-text">Tugas : </p>
                    <ul>
                        <li class="card-text">Membuat Feature Login</li>
                        <li class="card-text">Membuat Feature Pengguna</li>
                        <li class="card-text">Membuat Feature Guru</li>
                        <li class="card-text">Membuat Feature Laporan Surat Masuk Perbulan</li>
                        <li class="card-text">Membuat Feature Laporan Surat Masuk Pertahun</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card">
                <img src="assets/img/cahya.jpg" class="card-img-top" alt="cahya" height="400">
                <div class="card-body">
                    <h6 class="card-title">202043500685 / Nur Cahya Mega Pertiwi</h6>
                    <p class="card-text">Tugas : </p>
                    <ul>
                        <li class="card-text">Membuat Feature Surat Keterangan</li>
                        <li class="card-text">Membuat Feature Laporan Surat Keterangan Perbulan</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card">
                <img src="assets/img/maul.jpg" class="card-img-top" alt="maul" height="400">
                <div class="card-body">
                    <h6 class="card-title">202043500639 / Maulana Yusuf </h6>
                    <p class="card-text">Tugas : </p>
                    <ul>
                        <li class="card-text">Membuat Feature Surat Masuk</li>
                        <li class="card-text">Membuat Feature Laporan Surat Permohonan Perbulan</li>
                    </ul>
                </div>
            </div>
        </div>         
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card">
                <img src="assets/img/prasetyo.jpg" class="card-img-top" alt="ikhsan" height="400">
                <div class="card-body">
                    <h6 class="card-title">202043500605 / Prasetyo Sungkowo </h6>
                    <p class="card-text">Tugas : </p>
                    <ul>
                        <li class="card-text">Membuat Feature Surat Tugas</li>
                        <li class="card-text">Membuat Feature Laporan Surat Tugas Pertahun</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card">
                <img src="assets/img/ica.jpg" class="card-img-top" alt="ikhsan" height="400">
                <div class="card-body">
                    <h6 class="card-title">202043500638 / Khairunnisa Afifah</h6>
                    <p class="card-text">Tugas : </p>
                    <ul>
                        <li class="card-text">Membuat Feature Surat Keterangan</li>
                        <li class="card-text">Membuat Feature Laporan Surat Keterangan Pertahun</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card">
                <img src="assets/img/ade.jpg" class="card-img-top" alt="ikhsan" height="400">
                <div class="card-body">
                    <h6 class="card-title">202043500623 / Ade Wibowo Utomo</h6>
                    <p class="card-text">Tugas : </p>
                    <ul>
                        <li class="card-text">Membuat Feature Siswa</li>
                        <li class="card-text">Membuat Feature Laporan Surat Tugas Perbulan</li>
                    </ul>
                </div>
            </div>
        </div>         
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card">
                <img src="assets/img/amos1.jpg" class="card-img-top" alt="ikhsan" height="400">
                <div class="card-body">
                    <h6 class="card-title">202043500640 / Amos Tavares </h6>
                    <p class="card-text">Tugas : </p>
                    <ul>
                        <li class="card-text">Membuat Feature Surat Permohonan</li>
                        <li class="card-text">Membuat Feature Laporan Surat Permohonan Pertahun</li>
                    </ul>
                </div>
            </div>
        </div>         
    </div>
  </section>
</div>

<?php require_once("layout/footer.php"); ?>
      