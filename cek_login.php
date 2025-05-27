<?php
session_start();

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "nama_database");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Tangkap data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Cek data dari database
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    // Login berhasil
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:dashboard.php");
} else {
    // Login gagal
    echo "Username atau Password salah!";
}
?>
