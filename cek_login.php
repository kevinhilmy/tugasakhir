<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Cek data dari database
$sql = "SELECT * FROM tb_akun WHERE username='$username' AND password='$password'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // Ambil data user
    $user = $result->fetch_assoc();

    // Set session
    $_SESSION['username'] = $user['username'];
    $_SESSION['status'] = "login";
    $_SESSION['role'] = $user['role']; // Ambil role dari DB

    // echo $_SESSION['role'];
    header("location:menu.php");
} else {
    // Login gagal
    echo "<script>
            alert('Username atau Password salah!');
            window.location.href='index.php';
          </script>";
}
?>
