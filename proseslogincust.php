<?php
include ("conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password1 = $_POST['password'];
$password = sha1($password1);

if (empty($username) && empty($password)) {
	header('location:index.php?error1');
	
} else if (empty($username)) {
	header('location:index.php?error=2');
	
} else if (empty($password)) {
	header('location:index.php?error=3');
	
}

$q = mysqli_query($koneksi, "select * from customer where username='$username' and password='$password'");
$row = mysqli_fetch_array ($q);

if (mysqli_num_rows($q) == 1) {
    $_SESSION['user_id'] = $row['kd_cus'];
	$_SESSION['username'] = $username;
	$_SESSION['fullname'] = $row['nama'];
    $_SESSION['gambar'] = $row['gambar'];	

	header('location:customer/index.php');
} else {
	header('location:index.php?error=4');
}
?>