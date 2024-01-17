<?php
    require_once('koneksi.php');

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nomor_surat = $_POST['nomor_surat'];
        $tgl_surat = $_POST['tgl_surat'];
        $tentang_surat = $_POST['tentang_surat'];
        $id_guru = $_POST['id_guru'];
        $waktu_tugas = $_POST['waktu_tugas'];
        $tempat_tugas = $_POST['tempat_tugas'];
        $keterangan = $_POST['keterangan'];
        $keterangan2 = $_POST['keterangan2'];
        $input = mysqli_query($konek, "UPDATE surat_tugas SET nomor_surat = '$nomor_surat', tgl_surat = '$tgl_surat', tentang_surat = '$tentang_surat', id_guru = '$id_guru', tempat_tugas = '$tempat_tugas',
        waktu_tugas = '$waktu_tugas',keterangan = '$keterangan',keterangan2 = '$keterangan2' WHERE id = '$id'");
        if ($input) {
            echo '<script>
            alert("Berhasil Ubah Data!!!");
            window.location.href = "../surat_tugas.php";
            </script>';
        }else {
            echo '<script>
            alert("Gagal Ubah Data!!!");
            window.location.href = "../ubah_surat_tugas.php";
            </script>';
        }
    }
?>