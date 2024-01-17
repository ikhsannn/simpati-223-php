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
      <h1>Surat Masuk</h1>
    </div>
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
              <div class="card">  
              <div class="card-header justify-content-end">
                  <a href="tambah_surat_masuk.php" class="btn btn-primary">Tambah Surat Masuk</a>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                              <th>#</th>
                              <th>No Surat</th>
                              <th>Tgl Surat</th>
                              <th>Asal surat</th>
                              <th>Perihal</th>
                              <th>File Surat</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                              $query = mysqli_query($konek, "SELECT * FROM surat_masuk");
                              $no = 0;
                              while ($data = mysqli_fetch_assoc($query)) {
                              $no++;
                          ?>
                          <tr>
                              <td><?= $no; ?></td>
                              <td><?= $data['no_surat']; ?></td>
                              <td><?= $data['tgl_surat']; ?></td>
                              <td><?= $data['asal_surat']; ?></td>
                              <td><?= $data['perihal']; ?></td>
                              <td>
                                <?php 
                                  if ($data['nama_berkas'] != '') { ?>
                                    <a style="color: black;" href="proses/uploads/<?= $data['nama_berkas']; ?>" class="btn btn-secondary" target="_blank"><?= $data['nama_berkas']; ?></a>
                                <?php }?>
                              </td>
                              <td>
                                  <a href="ubah_surat_masuk.php?id=<?= $data['id']; ?>" class="btn btn-warning">Ubah</a>
                                  <a href="proses/proses_hapus_surat_masuk.php?id=<?= $data['id']; ?>" class="btn btn-danger" onclick="confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
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