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
      <h1>Laporan Surat Tugas Pertahun</h1>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card"> 
                <div class="card-body">
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-3">
                            <select class="form-control form-control-sm" id="tahun">
                                <option value="">Pilih Tahun</option>
                                <?php
                                // Buat query untuk menampilkan semua data siswa
                                $query = mysqli_query($konek, "SELECT YEAR(tgl_surat) as tahun FROM surat_tugas GROUP BY YEAR(tgl_surat)");
                                while ($data = mysqli_fetch_assoc($query)) {
                                  echo "<option value='".$data['tahun']."'>".$data['tahun']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <a href="javascript:void(0)" onclick="cetak()" class="btn btn-warning btn-icon icon-left btn-lg btn-block text-white"><i class="fas fa-print"></i> CETAK</a>
                        </div>
                    </div>
                  <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                              <th>#</th>
                              <th>No Surat</th>
                              <th>Tanggal Surat</th>
                              <th>Tentang Surat</th>
                              <th>Menugaskan Kepada</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                              $query = mysqli_query($konek, "SELECT a.*, b.* FROM surat_tugas a
                              LEFT JOIN guru b ON a.id_guru = b.id");
                              $no = 0;
                              while ($data = mysqli_fetch_assoc($query)) {
                              $no++;
                          ?>
                          <tr>
                              <td><?= $no; ?></td>
                              <td><?= $data['nomor_surat']; ?></td>
                              <td><?= $data['tgl_surat']; ?></td>
                              <td><?= $data['tentang_surat']; ?></td>
                              <td><?= $data['nama']; ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </section>
</div>
<?php require_once("layout/footer.php"); ?>
<script>
    function cetak() {
        tahun = $("#tahun").val();
        if (tahun != '') {
            window.open("laporan/laporan_st_pertahun.php?tahun="+tahun);
        }else{
            alert('Mohon pilih tahun terlebih dahulu !!!');
        }
    }
</script>