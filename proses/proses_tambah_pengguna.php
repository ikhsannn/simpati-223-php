<?php
    require_once('koneksi.php');

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash_password = md5($password);
        $role = $_POST['role'];
        $input = mysqli_query($konek, "INSERT INTO users (username,password,hash_password,created_at,role) 
        VALUES('$username','$password','$hash_password',now(),'$role')");
        if ($input) {
            echo '<script>
            alert("Berhasil Tambah Data!!!");
            window.location.href = "../pengguna.php";
            </script>';
        }else {
            echo '<script>
            alert("Gagal Tambah Data!!!");
            window.location.href = "../tambah_pengguna.php";
            </script>';
        }
    }
?>