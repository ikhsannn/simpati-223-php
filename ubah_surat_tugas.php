<?php session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username'];}
require_once("proses/koneksi.php");
$id = $_GET['id'];
$query = mysqli_query($konek,"SELECT * FROM surat_tugas WHERE id = '$id'");
$getdata = mysqli_fetch_array($query);
require_once("layout/header.php");
require_once("layout/sidebar.php");
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
      <div class="section-header">
          <h1>Ubah Surat Tugas</h1>
      </div>
      <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                  <form action="proses/proses_ubah_surat_tugas.php" method="post">
                      <div class="card-body">
                          <input type="hidden" name="id" value="<?= $id ?>">
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Nomor Surat</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="nomor_surat" placeholder="nomor_surat" value="<?= $getdata['nomor_surat']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Surat</label>
                              <div class="col-sm-9">
                                  <input type="date" class="form-control" name="tgl_surat" placeholder="tgl_surat" value="<?= $getdata['tgl_surat']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Tentang Surat</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="tentang_surat" placeholder="tentang_surat" value="<?= $getdata['tentang_surat']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Guru</label>
                              <div class="col-sm-9">
                                  <select class="form-control" name="id_guru">
                                    <option value="">Pilih</option>
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
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Waktu Tugas</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="waktu_tugas" placeholder="Waktu Tugas" value="<?= $getdata['waktu_tugas']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Tempat Tugas</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="tempat_tugas" placeholder="Tempat Tugas" value="<?= $getdata['tempat_tugas']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan Point 1</label>
                              <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan Point 1"><?= $getdata['keterangan']; ?></textarea>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan Point 2</label>
                              <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="keterangan2" placeholder="Masukan Keterangan Point 2"><?= $getdata['keterangan2']; ?></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="card-footer">       
                          <button type="submit"  name="submit" class="btn btn-primary float-right">Simpan</button>
                          <a href="surat_tugas.php">
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