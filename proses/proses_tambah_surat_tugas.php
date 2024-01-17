<?php
    require_once('koneksi.php');

    if (isset($_POST['submit'])) {
        $nomor_surat = $_POST['nomor_surat'];
        $tgl_surat = $_POST['tgl_surat'];
        $tentang_surat = $_POST['tentang_surat'];
        $id_guru = $_POST['id_guru'];
        $waktu_tugas = $_POST['waktu_tugas'];
        $tempat_tugas = $_POST['tempat_tugas'];
        $keterangan = $_POST['keterangan'];
        $keterangan2 = $_POST['keterangan2'];
        $input = mysqli_query($konek, "INSERT INTO surat_tugas (nomor_surat,tgl_surat,tentang_surat,id_guru,waktu_tugas,tempat_tugas,keterangan,keterangan2) 
        VALUES('$nomor_surat','$tgl_surat','$tentang_surat','$id_guru','$waktu_tugas','$tempat_tugas','$keterangan','$keterangan2')");
        if ($input) {
            echo '<script>
            alert("Berhasil Tambah Data!!!");
            window.location.href = "../surat_tugas.php";
            </script>';
        }else {
            echo '<script>
            alert("Gagal Tambah Data!!!");
            window.location.href = "../tambah_surat_tugas.php";
            </script>';
        }
    }
?>