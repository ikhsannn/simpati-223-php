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
          <h1>Tambah Siswa</h1>
      </div>
      <div class="row">
          <div class="col-12 col-md-6 col-lg-6">
              <div class="card">
                  <form action="proses/proses_tambah_siswa.php" method="post">
                      <div class="card-body">
                          <div class="form-group row">
                              <label for="inputNIPD3" class="col-sm-3 col-form-label">NIPD</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="nipd" placeholder="Masukan NIPD">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputNISN3" class="col-sm-3 col-form-label">NISN</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="nisn" placeholder="Masukan NISN">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputNama3" class="col-sm-3 col-form-label">Nama</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="nama" placeholder="Masuk Nama">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Kelas</label>
                              <div class="col-sm-9">
                                <select class="form-control" name="kelas">
                                  <option value="">Pilih Kelas</option>
                                  <?php
                                  // Buat query untuk menampilkan semua data siswa
                                  $query = mysqli_query($konek, "SELECT * FROM kelas ORDER BY id");
                                  while ($data = mysqli_fetch_assoc($query)) {
                                    echo "<option value='".$data['sub_kelas']."'>".$data['sub_kelas']."</option>";
                                  }
                                  ?>
                                </select>
                              </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="jenis_kelamin">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                          </div>                              
                          <div class="form-group row">
                              <label for="inputAgama3" class="col-sm-3 col-form-label">Agama</label>
                              <div class="col-sm-9">
                                  <select class="form-control" name="agama">
                                      <option value="">Pilih Keyakinan</option>
                                      <option value="islam">Islam</option>
                                      <option value="protestan">Prostestan</option>
                                      <option value="katolik">Katolik</option>
                                      <option value="hindu">Hindu</option>
                                      <option value="budha">Budha</option>
                                      <option value="konghucu">Konghucu</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputTahunAjaran3" class="col-sm-3 col-form-label">Tahun Ajaran</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="tahun_ajaran" placeholder="Masukan Tahun Ajaran">
                              </div>
                          </div>                                
                          <div class="form-group row">
                              <label for="inputABKStatus3" class="col-sm-4 col-form-label">ABK Status</label>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="abk_status" id="abk_status1" value="Y">
                            <label class="form-check-label" for="abk_status1">Y</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="abk_status" id="abk_status2" value="N">
                            <label class="form-check-label" for="abk_status2">N</label>
                          </div>
                            </div>
                          <div class="form-group row">
                              <label for="inputTempatLahir3" class="col-sm-3 col-form-label">Tempat Lahir</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukan Tempat Lahir">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputTanggalLahir3" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                              <div class="col-sm-9">
                                  <input type="date" class="form-control" name="tgl_lahir" placeholder="Masukan Tanggal Lahir">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputAlamat3" class="col-sm-3 col-form-label">Alamat</label>
                              <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="alamat" placeholder="Masukan Alamat"></textarea>
                              </div>
                          </div>                                
                      </div>  
                      <div class="card-footer">       
                          <button type="submit"  name="submit" class="btn btn-primary float-right">Simpan</button>
                          <a href="siswa.php">
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