<?php
    require_once('koneksi.php');

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash_password = md5($password);
        $role = $_POST['role'];
        $input = mysqli_query($konek, "UPDATE users SET username= '$username', password = '$password', hash_password = '$hash_password', 
        role = '$role', updated_at = now() WHERE id = '$id'");
        if ($input) {
            echo '<script>
            alert("Berhasil Ubah Data!!!");
            window.location.href = "../pengguna.php";
            </script>';
        }else {
            echo '<script>
            alert("Gagal Ubah Data!!!");
            window.location.href = "../tambah_pengguna.php";
            </script>';
        }
    }
?>