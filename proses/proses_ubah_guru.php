<?php
    require_once('koneksi.php');

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
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
        $input = mysqli_query($konek, "UPDATE guru SET nama= '$nama', nip = '$nip', nrk = '$nrk', tempat_lahir= '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin',
        jabatan = '$jabatan', agama = '$agama', ijazah = '$ijazah', jurusan = '$jurusan',  tahun_lulus = '$tahun_lulus', pangkat = '$pangkat', golongan = '$golongan' WHERE id = '$id'");
        if ($input) {
            echo '<script>
            alert("Berhasil Ubah Data!!!");
            window.location.href = "../guru.php";
            </script>';
        }else {
            echo '<script>
            alert("Gagal Ubah Data!!!");
            window.location.href = "../ubah_guru.php?id="'.$id.';
            </script>';
        }
    }
?>