<?php session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username'];}
require_once("proses/koneksi.php");
$id = $_GET['id'];
$query = mysqli_query($konek,"SELECT * FROM surat_keterangan WHERE id = '$id'");
$getdata = mysqli_fetch_array($query);
require_once("layout/header.php");
require_once("layout/sidebar.php");
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
      <div class="section-header">
          <h1>Ubah Surat Keterangan</h1>
      </div>
      <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
              <form action="proses/proses_ubah_surat_keterangan.php" method="post">
                      <input type="hidden" name="id" value="<?= $id; ?>">
                      <div class="card-body">
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">No Surat</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="no_surat" placeholder="No Surat" value="<?= $getdata['nomor_surat']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Surat</label>
                              <div class="col-sm-9">
                                  <input type="date" class="form-control" name="tgl_surat" placeholder="Tanggal Surat" value="<?= $getdata['tgl_surat']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Yang bertanda tangan</label>
                              <div class="col-sm-9">
                                  <select class="form-control" name="id_guru" placeholder="Id Guru">
                                    <option value="">Pilih Guru</option>
                                      <?php
                                      // Buat query untuk menampilkan semua data siswa
                                      $query = mysqli_query($konek, "SELECT * FROM guru ORDER BY id");
                                      while ($data = mysqli_fetch_assoc($query)) {
                                      ?>
                                        <option value="<?= $data['id']; ?>" <?= ($data['id'] == $getdata['id_guru']) ? 'selected' : ''; ?>><?= $data['nama']; ?></option>
                                      <?php } ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Menerangkan dengan sesungguhnya</label>
                              <div class="col-sm-9">
                                  <select class="form-control" name="id_siswa" placeholder="Id Siswa">
                                    <option value="">Pilih Siswa</option>
                                      <?php
                                      // Buat query untuk menampilkan semua data siswa
                                      $query = mysqli_query($konek, "SELECT * FROM siswa ORDER BY id");
                                      while ($data = mysqli_fetch_assoc($query)) {
                                      ?>
                                        <option value="<?= $data['id']; ?>" <?= ($data['id'] == $getdata['id_siswa']) ? 'selected' : ''; ?>><?= $data['nama']; ?></option>
                                      <?php } ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan</label>
                              <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan"><?= $getdata['keterangan']; ?></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="card-footer">       
                          <button type="submit"  name="submit" class="btn btn-primary float-right">Simpan</button>
                          <a href="surat_keterangan.php">
                              <button type="button" class="btn btn-success mr-2 float-right">
                                  Kembali
                              </button>
                          </a>
                      </div>
                  </form>
              </div>
          </div>
    </div>
  </section>
</div>
<?php require_once("layout/footer.php"); ?>