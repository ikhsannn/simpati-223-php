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
          <h1>Tambah Surat Permohonan</h1>
      </div>
      <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                  <form action="proses/proses_tambah_permohonan.php" method="post">
                      <div class="card-body">
                          <div class="form-group row">
                              <label for="inputnomor" class="col-sm-3 col-form-label">Nomor Surat</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="no_surat" placeholder="nomorsurat">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputtanggal" class="col-sm-3 col-form-label">Tanggal surat</label>
                              <div class="col-sm-9">
                                  <input type="date" class="form-control" name="tgl_surat" placeholder="tanggalsurat">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputsifat" class="col-sm-3 col-form-label">Sifat</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control" name="sifat" placeholder="sifat"> 
                              </div>
                          </div>
					        <div class="form-group row">
                              <label for="inputlampiran" class="col-sm-3 col-form-label">Lampiran</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control" name="lampiran" placeholder="lampiran"> 
                              </div>
                          </div>
					        <div class="form-group row">
                              <label for="inputperihal" class="col-sm-3 col-form-label">Perihal</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control" name="perihal" placeholder="perihal"> 
                              </div>
                          </div>
					        <div class="form-group row">
                              <label for="inputkepada" class="col-sm-3 col-form-label">Yth Kepada</label>
                              <div class="col-sm-9">
                                 <input type="text" class="form-control" name="kepada" placeholder="kepada"> 
                              </div>
                          </div>
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan</label>
                              <div class="col-sm-9">
                                <!-- <textarea class="summernote-simple" name="keterangan" placeholder="Masukan Keterangan"></textarea> -->
                                  <textarea type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan"></textarea>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Atas nama</label>
                              <div class="col-sm-9">
                                <select class="form-control" name="atas_nama">
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
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Jenis Permohonan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="jenis_permohonan">
                                        <option value="">Pilih Jenis Permohonan</option>
                                        <option value="pensiun">Pensiun</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>   
                      <div class="card-footer">       
                          <button type="submit"  name="submit" class="btn btn-primary float-right">Simpan</button>
                          <a href="permohonan.php">
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