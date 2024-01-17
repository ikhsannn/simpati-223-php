<?php session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username'];}
require_once("proses/koneksi.php");
$id = $_GET['id'];
$query = mysqli_query($konek,"SELECT * FROM siswa WHERE id = '$id'");
$getdata = mysqli_fetch_array($query);
require_once("layout/header.php");
require_once("layout/sidebar.php");
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
      <div class="section-header">
          <h1>Ubah Data Siswa</h1>
      </div>
      <div class="row">
          <div class="col-12 col-md-6 col-lg-6">
              <div class="card">
                  <form action="proses/proses_ubah_siswa.php" method="post">
                      <div class="card-body">
                          <input type="hidden" name="id" value="<?= $id ?>">
                          <div class="form-group row">
                              <label for="inputNIPD3" class="col-sm-3 col-form-label">NIPD</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="nipd" placeholder="Masukan NIPD" value="<?= $getdata['nipd']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputNISN3" class="col-sm-3 col-form-label">NISN</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="nisn" placeholder="Masukan NISN" value="<?= $getdata['nisn']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputNama3" class="col-sm-3 col-form-label">Nama</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="nama" placeholder="Masukan Nama" value="<?= $getdata['nama']; ?>">
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
                                    ?>
                                      <option value="<?= $data['sub_kelas']; ?>" <?= ($data['sub_kelas'] == $getdata['kelas']) ? 'selected' : ''; ?>><?= $data['sub_kelas']; ?></option>
                                    <?php } ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputAgama3" class="col-sm-3 col-form-label">Agama</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="jenis_kelamin">
                                  <option value="">Pilih Jenis Kelamin</option>
                                  <option value="L" <?= ($getdata['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki - Laki</option>
                                  <option value="P" <?= ($getdata['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                              </select>
                            </div>
                          </div>  
                          <div class="form-group row">
                              <label for="inputAgama3" class="col-sm-3 col-form-label">Agama</label>
                              <div class="col-sm-9">
                                  <select class="form-control" name="agama">
                                      <option value="">Pilih Agama</option>
                                      <option value="islam" <?= ($getdata['agama'] == 'islam') ? 'selected' : ''; ?>>Islam</option>
                                      <option value="protestan" <?= ($getdata['agama'] == 'protestan') ? 'selected' : ''; ?>>Protestan</option>
                                      <option value="katolik" <?= ($getdata['agama'] == 'katolik') ? 'selected' : ''; ?>>Katolik</option>
                                      <option value="hindu" <?= ($getdata['agama'] == 'hindu') ? 'selected' : ''; ?>>Hindu</option>
                                      <option value="budha" <?= ($getdata['agama'] == 'budha') ? 'selected' : ''; ?>>Budha</option>
                                      <option value="konghucu" <?= ($getdata['agama'] == 'konghucu') ? 'selected' : ''; ?>>konghucu</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputTahunAjaran3" class="col-sm-3 col-form-label">Tahun Ajaran</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="tahun_ajaran" placeholder="Masukan Tahun Ajaran" value="<?= $getdata['tahun_ajaran']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputABKStatus3" class="col-sm-4 col-form-label">ABK Status</label>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="abk_status" id="abk_status1" value="Y" <?= ($getdata['abk_status'] == 'Y') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="abk_status1">Yes</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="abk_status" id="abk_status2" value="N" <?= ($getdata['abk_status'] == 'N') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="abk_status2">No</label>
                          </div>
                        </div>  
                          <div class="form-group row">
                              <label for="inputTempatLahir3" class="col-sm-3 col-form-label">Tempat Lahir</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukan Tempat Lahir" value="<?= $getdata['tempat_lahir']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputTanggalLahir3" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                              <div class="col-sm-9">
                                  <input type="date" class="form-control" name="tgl_lahir" placeholder="Masukan Tanggal Lahir" value="<?= $getdata['tgl_lahir']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputAlamat3" class="col-sm-3 col-form-label">Alamat</label>
                              <div class="col-sm-9">
                                  <textarea type="text" class="form-control" name="alamat" placeholder="Masukan Alamat"><?= $getdata['alamat']; ?></textarea>
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