<?php
    require_once('koneksi.php');

    if (isset($_POST['submit'])) {
        $nipd = $_POST['nipd'];
        $nisn = $_POST['nisn'];
        $nama = $_POST['nama'];
        $jenisKelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $tahunAjaran = $_POST['tahun_ajaran'];
        $abkStatus = $_POST['abk_status'];
        $tempatLahir = $_POST['tempat_lahir'];
        $tglLahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $kelas = $_POST['kelas'];
        $input = mysqli_query($konek, "INSERT INTO siswa (nipd,nisn,nama,jenis_kelamin,agama,tahun_ajaran,abk_status,tempat_lahir,tgl_lahir,alamat,kelas) 
        VALUES('$nipd','$nisn','$nama','$jenisKelamin','$agama','$tahunAjaran','$abkStatus','$tempatLahir','$tglLahir','$alamat','$kelas')");
        if ($input) {
            echo '<script>
            alert("Berhasil Tambah Data!!!");
            window.location.href = "../siswa.php";
            </script>';
        }else {
            echo '<script>
            alert("Gagal Tambah Data!!!");
            window.location.href = "../tambah_siswa.php";
            </script>';
        }
    }
?>