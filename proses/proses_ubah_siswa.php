<?php
    require_once('koneksi.php');

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
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
        $input = mysqli_query($konek, "UPDATE siswa SET nipd= '$nipd', nisn = '$nisn', nama = '$nama', kelas = '$kelas', jenis_kelamin = '$jenisKelamin', agama = '$agama', tahun_ajaran = '$tahunAjaran', abk_status = '$abkStatus', tempat_lahir = '$tempatLahir', tgl_lahir ='$tglLahir', alamat = '$alamat' WHERE id = '$id'");
        if ($input) {
            echo '<script>
            alert("Berhasil Ubah Data!!!");
            window.location.href = "../siswa.php";
            </script>';
        }else {
            echo '<script>
            alert("Gagal Ubah Data!!!");
            window.location.href = "../ubah_siswa.php";
            </script>';
        }
    }
?>