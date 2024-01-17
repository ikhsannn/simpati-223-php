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
      <h1>Guru</h1>
    </div>
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
              <div class="card">  
                <div class="card-header justify-content-end">
                    <a href="tambah_guru.php" class="btn btn-primary">Tambah Guru</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>                                 
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>NRK</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>                                 
                        <?php 
                              $query = mysqli_query($konek, "SELECT * FROM guru");
                              $no = 0;
                              while ($data = mysqli_fetch_assoc($query)) {
                              $no++;
                          ?>
                          <tr>
                              <td><?= $no; ?></td>
                              <td><?= $data['nama']; ?></td>
                              <td><?= $data['nip']; ?></td>
                              <td><?= $data['nrk']; ?></td>
                              <td><?= $data['jabatan']; ?></td>
                              <td><?= $data['golongan']; ?></td>
                              <td>
                                  <a href="ubah_guru.php?id=<?= $data['id']; ?>" class="btn btn-warning">Ubah</a>
                                  <a href="proses/proses_hapus_guru.php?id=<?= $data['id']; ?>" class="btn btn-danger" onclick="confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
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