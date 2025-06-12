<?php
// Memulai session untuk menyimpan data login
session_start();

// Menghubungkan ke file koneksi database
include 'koneksi.php';

// Menangkap data username dan password yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Membuat query untuk mengecek apakah username dan password cocok dengan yang ada di database
$sql = "SELECT * FROM tb_akun WHERE username='$username' AND password='$password'";
$result = $db->query($sql); // Menjalankan query ke database

// Jika ada 1 atau lebih baris data yang cocok
if ($result->num_rows > 0) {
    // Mengambil data user dari hasil query
    $user = $result->fetch_assoc();

    // Menyimpan data penting ke dalam session agar bisa digunakan di halaman lain
    $_SESSION['username'] = $user['username']; // Simpan username
    $_SESSION['status'] = "login";             // Tandai bahwa user sudah login
    $_SESSION['role'] = $user['role'];         // Simpan peran user (admin / kasir / dll)
    $_SESSION['id'] = $user['id'];             // Simpan ID akun user

    // Arahkan user ke halaman menu setelah login berhasil
    header("location:menu.php");

} else {
    // Jika username atau password salah, tampilkan pesan kesalahan dan kembali ke halaman login
    echo "<script>
            alert('Username atau Password salah!');
            window.location.href='index.php'; // Kembali ke halaman login
          </script>";
}
