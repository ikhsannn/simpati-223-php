<?php
    require_once('koneksi.php');

    if (isset($_POST['submit'])) {
        $no_surat = $_POST['no_surat'];
        $tgl_surat = $_POST['tgl_surat'];
        $id_guru = $_POST['id_guru'];
        $id_siswa = $_POST['id_siswa'];
        $keterangan = $_POST['keterangan'];
        $input = mysqli_query($konek, "INSERT INTO surat_keterangan (nomor_surat, tgl_surat, id_guru, id_siswa, keterangan) 
        VALUES('$no_surat','$tgl_surat','$id_guru','$id_siswa','$keterangan')");
        if ($input) {
            echo '<script>
            alert("Berhasil Tambah Data!!!");
            window.location.href = "../surat_keterangan.php";
            </script>';
        }else {
            echo '<script>
            alert("Gagal Tambah Data!!!");
            window.location.href = "../tambah_surat_keterangan.php";
            </script>';
        }
    }
?>