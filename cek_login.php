<?php
session_start();

// Koneksi ke database
include 'koneksi.php';


// Tangkap data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Cek data dari database
$sql = "SELECT * FROM tb_akun WHERE username='$username' AND password='$password'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // Login berhasil
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:menu.php");
} else {
    // Login gagal
    echo "Username atau Password salah!";
}
?>
