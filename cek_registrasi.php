<?php
// Memulai session
session_start();

// Menghubungkan ke file koneksi database
include 'koneksi.php';

// Ambil data dari form registrasi dan hilangkan spasi di awal/akhir
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$email    = trim($_POST['email']);

// Validasi: Cek apakah semua kolom diisi
if (empty($username) || empty($password) || empty($email)) {
    // Jika ada yang kosong, tampilkan peringatan dan kembali ke halaman registrasi
    echo "<script>alert('Semua kolom harus diisi!'); window.location.href='register.php';</script>";
    exit;
}

// Mengecek apakah email sudah pernah didaftarkan
$query_check = "SELECT * FROM tb_akun WHERE email = ?";
$stmt = mysqli_prepare($db, $query_check);                  // Siapkan query
mysqli_stmt_bind_param($stmt, "s", $email);                 // Bind parameter email ke query
mysqli_stmt_execute($stmt);                                 // Jalankan query
$result = mysqli_stmt_get_result($stmt);                    // Ambil hasilnya

if (mysqli_num_rows($result) > 0) {
    // Jika email sudah ada di database, tampilkan pesan dan kembali
    echo "<script>alert('Email sudah terdaftar!'); window.location.href='register.php';</script>";
    exit;
}

// Jika email belum terdaftar, lanjut ke proses penyimpanan data

// Tentukan role default untuk user baru
$role = "kasir";

// Menyiapkan query untuk menyimpan data ke database
$query_insert = "INSERT INTO tb_akun (username, password, email, role) VALUES (?, ?, ?, ?)";
$stmt_insert = mysqli_prepare($db, $query_insert); // Siapkan query
mysqli_stmt_bind_param($stmt_insert, "ssss", $username, $password, $email, $role); // Bind semua data ke query

// Jalankan query untuk menyimpan data
if (mysqli_stmt_execute($stmt_insert)) {
    // Jika berhasil, tampilkan pesan sukses dan arahkan ke halaman login
    echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='index.php';</script>";
} else {
    // Jika gagal menyimpan, tampilkan pesan gagal
    echo "<script>alert('Gagal menyimpan data!'); window.location.href='register.php';</script>";
}

// Tutup statement dan koneksi database
mysqli_stmt_close($stmt);
mysqli_stmt_close($stmt_insert);
mysqli_close($db);
?>
