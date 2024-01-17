<?php session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username'];}
require_once("proses/koneksi.php");
$id = $_GET['id'];
$query = mysqli_query($konek,"SELECT * FROM surat_masuk WHERE id = '$id'");
$getdata = mysqli_fetch_array($query);
require_once("layout/header.php");
require_once("layout/sidebar.php");
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
      <div class="section-header">
          <h1>Ubah Surat Masuk</h1>
      </div>
      <div class="row">
          <div class="col-12 col-md-6 col-lg-6">
              <div class="card">
                  <form action="proses/proses_ubah_surat_masuk.php" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                          <input type="hidden" name="id" value="<?= $id ?>">
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">No Surat</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="no_surat" placeholder="no_surat" value="<?= $getdata['no_surat']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Pengirim</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="pengirim" placeholder="pengirim" value="<?= $getdata['pengirim']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat Pengirim</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="alamat_pengirim" placeholder="alamat_pengirim" value="<?= $getdata['alamat_pengirim']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Perihal</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="perihal" placeholder="perihal" value="<?= $getdata['perihal']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal surat</label>
                              <div class="col-sm-9">
                                  <input type="date" class="form-control" name="tgl_surat" placeholder="tgl_surat" value="<?= $getdata['tgl_surat']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Asal surat</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="asal_surat" placeholder="asal_surat" value="<?= $getdata['asal_surat']; ?>">
                              </div>
                          </div>
                          <?php 
                            if ($getdata['nama_berkas'] != '') { ?>
                              <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-3 col-form-label">File surat</label>
                                  <div class="col-sm-9">
                                    <a style="color: black;" href="proses/uploads/<?= $getdata['nama_berkas']; ?>" class="btn btn-secondary btn-block" target="_blank"><?= $getdata['nama_berkas']; ?></a>
                                  </td>
                                  </div>
                              </div>
                          <?php } ?>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Upload File</label>
                              <div class="col-sm-9">
                                  <input type="file" class="form-control" name="file" placeholder="nama_berkas">
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