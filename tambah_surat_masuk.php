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
          <h1>Tambah Surat_masuk</h1>
      </div>
      <div class="row">
          <div class="col-12 col-md-6 col-lg-6">
              <div class="card">
                  <form action="proses/proses_tambah_surat_masuk.php" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">No Surat</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="no_surat" placeholder="No Surat">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Pengirim</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="pengirim" placeholder="pengirim">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat Pengirim</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="alamat_pengirim" placeholder="ALamat Pengirim">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Perihal</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="perihal" placeholder="Perihal">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Surat</label>
                              <div class="col-sm-9">
                                  <input type="date" class="form-control" name="tgl_surat" placeholder="Tanggal Surat">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Asal Surat</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="asal_surat" placeholder="Asal Surat">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">File Surat</label>
                              <div class="col-sm-9">
                                  <input type="file" class="form-control" name="file" placeholder="Nama Berkas">
                              </div>
                          </div>
                      </div>
                      <div class="card-footer">       
                          <button type="submit"  name="submit" class="btn btn-primary float-right">Simpan</button>
                          <a href="surat_masuk.php">
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