<?php
    require_once('koneksi.php');

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $no_surat = $_POST['no_surat'];
        $tgl_surat = $_POST['tgl_surat'];
        $id_guru = $_POST['id_guru'];
        $id_siswa = $_POST['id_siswa'];
        $keterangan = $_POST['keterangan'];

        $input = mysqli_query($konek, "UPDATE surat_keterangan SET nomor_surat= '$no_surat', tgl_surat= '$tgl_surat', id_guru='$id_guru', id_siswa='$id_siswa', keterangan='$keterangan' WHERE id = '$id'");

        if ($input) {
            echo '<script>
            alert("Berhasil Ubah Data!!!");
            window.location.href = "../surat_keterangan.php";
            </script>';
        }else {
            echo '<script>
            alert("Gagal Ubah Data!!!");
            window.location.href = "../ubah_surat_keterangan.php";
            </script>';
        }
    }
?>