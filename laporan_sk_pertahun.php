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
      <h1>Laporan Surat Keterangan Pertahun</h1>
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
                                $query = mysqli_query($konek, "SELECT YEAR(tgl_surat) as tahun FROM surat_keterangan GROUP BY YEAR(tgl_surat)");
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
                              <th>Yang bertanda tangan</th>
                              <th>Menerangkan kepada</th>
                              
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                              $query = mysqli_query($konek, "SELECT a.*, b.nama as nama_guru, c.nama as nama_siswa FROM surat_keterangan a
                              LEFT JOIN guru b ON a.id_guru = b.id
                              LEFT JOIN siswa c ON a.id_siswa = c.id");
                              $no = 0;
                              while ($data = mysqli_fetch_assoc($query)) {
                              $no++;
                          ?>
                          <tr>
                              <td><?= $no; ?></td>
                              <td><?= $data['nomor_surat']; ?></td>
                              <td><?= $data['tgl_surat']; ?></td>
                              <td><?= $data['nama_guru']; ?></td>
                              <td><?= $data['nama_siswa']; ?></td>
                              <td>
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
            window.open("laporan/laporan_sk_pertahun.php?tahun="+tahun);
        }else{
            alert('Mohon pilih tahun terlebih dahulu !!!');
        }
    }
</script>