<?php
  $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $uri_segments = explode('/', $uri_path);
?>
<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php">SIMPATI</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SP</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Starter</li>
            <li class="<?= ($uri_segments[2] == 'index.php') ? 'active' : ''; ?>"><a class="nav-link" href="index.php"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="<?= ($uri_segments[2] == 'about.php') ? 'active' : ''; ?>"><a class="nav-link" href="about.php"><i class="fas fa-users"></i> <span>About Us</span></a></li>
            <li class="menu-header">Data Master</li>
            <li class="<?= ($uri_segments[2] == 'pengguna.php') ? 'active' : ''; ?>"><a class="nav-link" href="pengguna.php"><i class="fas fa-user"></i> <span>Pengguna</span></a></li>
            <li class="<?= ($uri_segments[2] == 'guru.php') ? 'active' : ''; ?>"><a class="nav-link" href="guru.php"><i class="fas fa-chalkboard-teacher"></i> <span>Guru</span></a></li>
            <li class="<?= ($uri_segments[2] == 'siswa.php') ? 'active' : ''; ?>"><a class="nav-link" href="siswa.php"><i class="fas fa-user-graduate"></i> <span>Siswa</span></a></li>
            <li class="menu-header">Transaksi</li>
            <li class="<?= ($uri_segments[2] == 'surat_masuk.php') ? 'active' : ''; ?>"><a class="nav-link" href="surat_masuk.php"><i class="fas fa-envelope"></i> <span>Surat Masuk</span></a></li>
            <li class="dropdown <?= ($uri_segments[2] == 'surat_tugas.php' || $uri_segments[2] == 'surat_keterangan.php' || $uri_segments[2] == 'permohonan.php') ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-envelope-open"></i> <span>Surat Keluar</span></a>
              <ul class="dropdown-menu">
                <li class="<?= ($uri_segments[2] == 'surat_tugas.php') ? 'active' : ''; ?>"><a class="nav-link" href="surat_tugas.php">Surat Tugas</a></li>
                <li class="<?= ($uri_segments[2] == 'surat_keterangan.php') ? 'active' : ''; ?>"><a class="nav-link" href="surat_keterangan.php">Surat Keterangan</a></li>
                <li class="<?= ($uri_segments[2] == 'permohonan.php') ? 'active' : ''; ?>"><a class="nav-link" href="permohonan.php">Surat Permohonan</a></li>
              </ul>
            </li>
            <li class="menu-header">Laporan</li>
            <li class="dropdown <?= ($uri_segments[2] == 'laporan_sm_perbulan.php' || $uri_segments[2] == 'laporan_sm_pertahun.php') ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-inbox"></i> <span>Surat Masuk</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="laporan_sm_perbulan.php">Laporan Perbulan</a></li>
                <li><a class="nav-link" href="laporan_sm_pertahun.php">Laporan Pertahun</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-tasks"></i> <span>Surat Tugas</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="laporan_st_perbulan.php">Laporan Perbulan</a></li>
                <li><a class="nav-link" href="laporan_st_pertahun.php">Laporan Pertahun</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-stamp"></i> <span>Surat Keterangan</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="laporan_sk_perbulan.php">Laporan Perbulan</a></li>
                <li><a class="nav-link" href="laporan_sk_pertahun.php">Laporan Pertahun</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-mail-bulk"></i> <span>Surat Permohonan</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="laporan_sp_perbulan.php">Laporan Perbulan</a></li>
                <li><a class="nav-link" href="laporan_sp_pertahun.php">Laporan Pertahun</a></li>
              </ul>
            </li>
          </ul>
       </aside>
      </div>