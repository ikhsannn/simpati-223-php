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
      <h1>Laporan Surat Permohonan Perbulan</h1>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card"> 
                <div class="card-body">
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-3">
                            <input type="month" class="form-control" name="bulan" id="bulan">
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
                              <th>Tanggal</th>
                              <th>Sifat</th>
                              <th>Lampiran</th>
						      <th>Perihal</th>
                              
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                              $query = mysqli_query($konek, "SELECT * FROM surat_permohonan");
                              $no = 0;
                              while ($data = mysqli_fetch_assoc($query)) {
                              $no++;
                          ?>
                          <tr>
                              <td><?= $no; ?></td>
                              <td><?= $data['no_surat']; ?></td>
                              <td><?= $data['tgl_surat']; ?></td>
                              <td><?= $data['sifat']; ?></td>
                              <td><?= $data['lampiran']; ?></td>
						      <td><?= $data['perihal']; ?></td>
                              </tr>
                              <td>
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
        bulan = $("#bulan").val();
        if (bulan != '') {
            window.open("laporan/laporan_sp_perbulan.php?bulan="+bulan);
        }else{
            alert('Mohon pilih bulan terlebih dahulu !!!');
        }
    }
</script>