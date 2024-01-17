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
          <h1>Tambah Pengguna</h1>
      </div>
      <div class="row">
          <div class="col-12 col-md-6 col-lg-6">
              <div class="card">
                  <form action="proses/proses_tambah_pengguna.php" method="post">
                      <div class="card-body">
                          <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="username" placeholder="Username">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                              <div class="col-sm-9">
                                  <input type="password" class="form-control" name="password" placeholder="Password">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-3 col-form-label">Role</label>
                              <div class="col-sm-9">
                                  <select class="form-control" name="role">
                                      <option value="">Pilih Role</option>
                                      <option value="admin">Admin</option>
                                      <option value="kepala sekolah">Kepala Sekolah</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="card-footer">       
                          <button type="submit"  name="submit" class="btn btn-primary float-right">Simpan</button>
                          <a href="pengguna.php">
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