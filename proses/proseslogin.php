<?php session_start();
require_once('koneksi.php');
$username = $_POST['user_id'];
$pass = $_POST['user_pass'];
$cekuser = mysqli_query($konek, "SELECT * FROM users WHERE username = '$username' AND hash_password = md5('$pass')");
$jumlah = mysqli_num_rows($cekuser);
$hasil = mysqli_fetch_array($cekuser);
if($jumlah == 0) {
    $response=array("success"=>false);
} else {
    $response=array("success"=>true,"url"=>"index.php");
    mysqli_query($konek, "UPDATE users SET last_login = now() where username ='$username' AND hash_password = md5('$pass')");
    $_SESSION['id'] = $hasil['id'];
    $_SESSION['username'] = $hasil['username'];
}

echo json_encode($response);
?>