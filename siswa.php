<?php session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username'];}
require_once("proses/koneksi.php");
require_once("layout/header.php");
require_once("layout/sidebar.php");
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Siswa</h1>
    </div>
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
              <div class="card">  
              <div class="card-header justify-content-end">
                  <a href="tambah_siswa.php" class="btn btn-primary">Tambah Siswa</a>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                              <th>#</th>
                              <th>NIPD</th>
                              <th>NISN</th>
                              <th>Nama</th>
                              <th>Kelas</th>
                              <th>Tahun Ajaran</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                              $query = mysqli_query($konek, "SELECT * FROM siswa");
                              $no = 0;
                              while ($data = mysqli_fetch_assoc($query)) {
                              $no++;
                          ?>
                          <tr>
                              <td><?= $no; ?></td>
                              <td><?= $data['nipd']; ?></td>
                              <td><?= $data['nisn']; ?></td>
                              <td><?= $data['nama']; ?></td>
                              <td><?= $data['kelas']; ?></td>
                              <td><?= $data['tahun_ajaran']; ?></td>
                              <td>
                                  <a href="ubah_siswa.php?id=<?= $data['id']; ?>" class="btn btn-warning">Ubah</a>
                                  <a href="proses/proses_hapus_siswa.php?id=<?= $data['id']; ?>" class="btn btn-danger" onclick="confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                              </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                  </div>
              </div>
              </div>
          </div>
    </div>
  </section>
</div>
<?php require_once("layout/footer.php"); ?>