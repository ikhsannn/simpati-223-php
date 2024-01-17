<?php
    require_once('koneksi.php');

    if (isset($_POST['submit'])) {
        $no_surat = $_POST['no_surat'];
        $tgl_surat = $_POST['tgl_surat'];
        $sifat = $_POST['sifat'];
        $lampiran = $_POST['lampiran'];
		$perihal = $_POST['perihal'];
		$kepada = $_POST['kepada'];
		$keterangan = $_POST['keterangan'];
		$atas_nama = $_POST['atas_nama'];
		$jenis_permohonan = $_POST['jenis_permohonan'];
        $input = mysqli_query($konek, "INSERT INTO surat_permohonan (no_surat,tgl_surat,sifat,lampiran,perihal,kepada,keterangan,atas_nama,jenis_permohonan) 
        VALUES('$no_surat','$tgl_surat','$sifat','$lampiran','$perihal','$kepada','$keterangan','$atas_nama','$jenis_permohonan')");
        if ($input) {
            echo '<script>
            alert("Berhasil Tambah Data!!!");
            window.location.href = "../permohonan.php";
            </script>';
        }else {
            echo '<script>
            alert("Gagal Tambah Data!!!");
            window.location.href = "../tambah_permohonan.php";
            </script>';
        }
    }
?>