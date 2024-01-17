<?php
  $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $uri_segments = explode('/', $uri_path);
  $title = "";
  if ($uri_segments[2] == 'about.php') {
    $title = "About Us &mdash; SIMPATI";
  }elseif ($uri_segments[2] == 'pengguna.php') {
    $title = "Penggguna &mdash; SIMPATI";
  }elseif ($uri_segments[2] == 'guru.php') {
    $title = "Guru &mdash; SIMPATI";
  }elseif ($uri_segments[2] == 'siswa.php') {
    $title = "Siswa &mdash; SIMPATI";
  }elseif ($uri_segments[2] == 'surat_masuk.php' || $uri_segments[2] == 'tambah_surat_masuk.php' || $uri_segments[2] == 'ubah_surat_masuk.php') {
    $title = "Surat Masuk &mdash; SIMPATI";
  }elseif ($uri_segments[2] == 'surat_tugas.php' || $uri_segments[2] == 'tambah_surat_tugas.php' || $uri_segments[2] == 'ubah_surat_tugas.php') {
    $title = "Surat Tugas &mdash; SIMPATI";
  }elseif ($uri_segments[2] == 'surat_keterangan.php' || $uri_segments[2] == 'tambah_surat_keterangan.php' || $uri_segments[2] == 'ubah_surat_keterangan.php') {
    $title = "Surat Keterangan &mdash; SIMPATI";
  }elseif ($uri_segments[2] == 'permohonan.php' || $uri_segments[2] == 'tambah_permohonan.php' || $uri_segments[2] == 'ubah_permohonan.php') {
    $title = "Surat Surat Permohonan &mdash; SIMPATI";
  }elseif ($uri_segments[2] == 'laporan_st_perbulan.php') {
    $title = "Laporan Surat Tugas Perbulan &mdash; SIMPATI";
  }elseif ($uri_segments[2] == 'laporan_st_pertahun.php') {
    $title = "Laporan Surat Tugas Pertahun &mdash; SIMPATI";
  }elseif ($uri_segments[2] == 'laporan_sm_perbulan.php') {
    $title = "Laporan Surat Masuk Perbulan &mdash; SIMPATI";
  }elseif ($uri_segments[2] == 'laporan_sm_pertahun.php') {
    $title = "Laporan Surat Masuk Pertahun &mdash; SIMPATI";
  }elseif ($uri_segments[2] == 'laporan_sk_perbulan.php') {
    $title = "Laporan Surat Keterangan Perbulan &mdash; SIMPATI";
  }elseif ($uri_segments[2] == 'laporan_sk_pertahun.php') {
    $title = "Laporan Surat Keterangan Pertahun &mdash; SIMPATI";
  }elseif ($uri_segments[2] == 'laporan_sp_perbulan.php') {
    $title = "Laporan Surat Permohonan Perbulan &mdash; SIMPATI";
  }elseif ($uri_segments[2] == 'laporan_sp_pertahun.php') {
    $title = "Laporan Surat Permohonan Perbulan &mdash; SIMPATI";
  }else {
    $title = "Dashboard &mdash; SIMPATI";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="./assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/modules/fontawesome/css/all.min.css">
  <link rel="shortcut icon"  href="./assets/img/favicon.ico" />

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="./assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="./assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="./assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="./assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="./assets/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="./assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="./assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $username; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="proses/proseslogout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>