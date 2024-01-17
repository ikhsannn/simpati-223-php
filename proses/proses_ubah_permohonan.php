<?php
    require_once('koneksi.php');

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
		$no_surat = $_POST['no_surat'];
        $tgl_surat = $_POST['tgl_surat'];
        $sifat = $_POST['sifat'];
        $lampiran = $_POST['lampiran'];
		$perihal = $_POST['perihal'];
		$kepada = $_POST['kepada'];
		$keterangan = $_POST['keterangan'];
		$atas_nama = $_POST['atas_nama'];
		$jenis_permohonan = $_POST['jenis_permohonan'];
        $input = mysqli_query($konek, "UPDATE surat_permohonan SET no_surat= '$no_surat', tgl_surat = '$tgl_surat', sifat = '$sifat', lampiran= '$lampiran', perihal = '$perihal', kepada = '$kepada',
        keterangan = '$keterangan', atas_nama = '$atas_nama', jenis_permohonan = '$jenis_permohonan' WHERE id = '$id'");
        if ($input) {
            echo '<script>
            alert("Berhasil Ubah Data!!!");
            window.location.href = "../permohonan.php";
            </script>';
        }else {
            echo '<script>
            alert("Gagal Ubah Data!!!");
            window.location.href = "../ubah_permohonan.php";
            </script>';
        }
    }
?>