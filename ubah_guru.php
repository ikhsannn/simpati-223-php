<?php session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username'];}
require_once("proses/koneksi.php");
$id = $_GET['id'];
$query = mysqli_query($konek,"SELECT * FROM guru WHERE id = '$id'");
$getdata = mysqli_fetch_array($query);
require_once("layout/header.php");
require_once("layout/sidebar.php");
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
      <div class="section-header">
          <h1>Ubah Guru</h1>
      </div>
      <div class="row">
          <div class="col-12 col-md-6 col-lg-6">
              <div class="card">
                  <form action="proses/proses_ubah_guru.php" method="post">
                      <div class="card-body">
                          <input type="hidden" name="id" value="<?= $id ?>">
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Nama</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= $getdata['nama']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">NIP</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="nip" placeholder="NIP" value="<?= $getdata['nip']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">NRK</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="nrk" placeholder="NRK" value="<?= $getdata['nrk']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Tempat Lahir</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= $getdata['tempat_lahir']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                              <div class="col-sm-9">
                                  <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?= $getdata['tempat_lahir']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                              <div class="col-sm-9">
                                  <?php
                                      if ($getdata['jenis_kelamin'] == 'L') {
                                          $laki_laki = "selected";
                                      }else {
                                          $laki_laki = "";
                                      }
                                      if ($getdata['jenis_kelamin'] == 'P') {
                                          $perempuan = "selected";
                                      }else {
                                          $perempuan = "";
                                      }
                                  ?>
                                  <select class="form-control" name="jenis_kelamin">
                                      <option value="">Pilih Jenis Kelamin</option>
                                      <!-- <option value="L" <?= ($getdata['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki - Laki</option>
                                      <option value="P" <?= ($getdata['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option> -->
                                      <option value="L" <?= $laki_laki; ?>>Laki - Laki</option>
                                      <option value="P" <?= $perempuan; ?>>Perempuan</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Jabatan</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" value="<?= $getdata['jabatan']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Agama</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="agama" placeholder="Agama" value="<?= $getdata['agama']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Ijazah</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="ijazah" placeholder="Ijazah" value="<?= $getdata['ijazah']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Jurusan</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="jurusan" placeholder="Jurusan" value="<?= $getdata['jurusan']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Tahun Lulus</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="tahun_lulus" placeholder="Tahun Lulus" value="<?= $getdata['tahun_lulus']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Pangkat</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="pangkat" placeholder="Pangkat" value="<?= $getdata['pangkat']; ?>">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Golongan</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="golongan" placeholder="Golongan" value="<?= $getdata['golongan']; ?>">
                              </div>
                          </div>
                      </div>
                      <div class="card-footer">       
                          <button type="submit"  name="submit" class="btn btn-primary float-right">Simpan</button>
                          <a href="guru.php">
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