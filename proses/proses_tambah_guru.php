<?php
    require_once('koneksi.php');

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $nip = $_POST['nip'];
        $nrk = $_POST['nrk'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $jabatan = $_POST['jabatan'];
        $agama = $_POST['agama'];
        $ijazah = $_POST['ijazah'];
        $jurusan = $_POST['jurusan'];
        $tahun_lulus = $_POST['tahun_lulus'];
        $pangkat = $_POST['pangkat'];
        $golongan = $_POST['golongan'];
        $input = mysqli_query($konek, "INSERT INTO guru (nama,nip,nrk,tempat_lahir,tgl_lahir,jenis_kelamin,jabatan,agama,ijazah,jurusan,tahun_lulus,pangkat,golongan) 
        VALUES('$nama','$nip','$nrk','$tempat_lahir','$tgl_lahir','$jenis_kelamin','$jabatan','$agama','$ijazah','$jurusan','$tahun_lulus','$pangkat','$golongan')");
        if ($input) {
            echo '<script>
            alert("Berhasil Tambah Data!!!");
            window.location.href = "../guru.php";
            </script>';
        }else {
            echo '<script>
            alert("Gagal Tambah Data!!!");
            window.location.href = "../tambah_guru.php";
            </script>';
        }
    }
?>