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
      <h1>Surat Tugas</h1>
    </div>
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
              <div class="card">  
              <div class="card-header justify-content-end">
                  <a href="tambah_surat_tugas.php" class="btn btn-primary">Tambah Surat Tugas</a>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                              <th>#</th>
                              <th>Nomor Surat</th>
                              <th>Tgl Surat</th>
                              <th>Tentang Surat </th>
                              <th>Menugaskan Kepada </th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                              $query = mysqli_query($konek, "SELECT a.*,b.nama FROM surat_tugas a LEFT JOIN guru b ON a.id_guru = b.id");
                              $no = 0;
                              while ($data = mysqli_fetch_assoc($query)) {
                              $no++;
                          ?>
                          <tr>
                              <td><?= $no; ?></td>
                              <td><?= $data['nomor_surat']; ?></td>
                              <td><?= $data['tgl_surat']; ?></td>
                              <td><?= $data['tentang_surat']; ?></td>
                              <td><?= $data['nama']; ?></td>
                              <td>
                                  <a href="proses/proses_hapus_surat_tugas.php?id=<?= $data['id']; ?>" class="btn btn-danger" onclick="confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                                  <a href="ubah_surat_tugas.php?id=<?= $data['id']; ?>" class="btn btn-warning">Ubah</a>
                                  <a href="javascript:void(0)" onclick="cetak('<?= $data['id']; ?>')" class="btn btn-success">Cetak</a>
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
<script>
    function cetak(id) {
      window.open("laporan/cetak_surat_tugas.php?id="+id);
    }
</script>