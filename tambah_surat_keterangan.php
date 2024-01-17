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
          <h1>Tambah Surat Keterangan</h1>
      </div>
      <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                  <form action="proses/proses_tambah_surat_keterangan.php" method="post">
                      <input type="hidden" name="created_by" value="<?= $username; ?>">
                      <div class="card-body">
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">No Surat</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="no_surat" placeholder="No Surat">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Surat</label>
                              <div class="col-sm-9">
                                  <input type="date" class="form-control" name="tgl_surat" placeholder="Tanggal Surat">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Yang bertanda tangan</label>
                              <div class="col-sm-9">
                                <select class="form-control" name="id_guru">
                                  <option value="">Pilih</option>
                                  <?php
                                  // Buat query untuk menampilkan semua data guru
                                  $query = mysqli_query($konek, "SELECT * FROM guru ORDER BY id");
                                  while ($data = mysqli_fetch_assoc($query)) {
                                    echo "<option value='".$data['id']."'>".$data['nama']."</option>";
                                  }
                                  ?>
                                </select>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Menerangkan dengan sesungguhnya</label>
                              <div class="col-sm-9">
                                  <select class="form-control" name="id_siswa" placeholder="Id Siswa">
                                    <option value="">Pilih</option>
                                    <?php
                                    // Buat query untuk menampilkan semua data siswa
                                    $query = mysqli_query($konek, "SELECT * FROM siswa ORDER BY id");
                                    while ($data = mysqli_fetch_assoc($query)) {
                                      echo "<option value='".$data['id']."'>".$data['nama']."</option>";
                                    }
                                    ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan</label>
                              <div class="col-sm-9">
                                  <textarea type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan"></textarea>
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