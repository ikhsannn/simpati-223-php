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
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
              <i class="fas fa-envelope"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Surat Masuk</h4>
            </div>
            <div class="card-body">
              <?= $getsm['jumlah']; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
          <i class="fas fa-tasks"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Surat Tugas</h4>
            </div>
            <div class="card-body">
              <?= $getst['jumlah']; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
          <i class="fas fa-stamp"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Surat Keterangan</h4>
            </div>
            <div class="card-body">
            <?= $getsk['jumlah']; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
          <i class="fas fa-mail-bulk"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Surat Permohonan</h4>
            </div>
            <div class="card-body">
            <?= $getsp['jumlah']; ?>
            </div>
          </div>
        </div>
      </div>                  
    </div>
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-body">
            <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators3" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators3" data-slide-to="3"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="assets/img/meet1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/img/meet2.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/img/meet3.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/img/meet4.jpg" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php require_once("layout/footer.php"); ?>
      