<?php
session_start();
include 'koneksi.php';

// Ambil data dari form
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$email    = trim($_POST['email']);

// Validasi: Pastikan semua data diisi
if (empty($username) || empty($password) || empty($email)) {
    echo "<script>alert('Semua kolom harus diisi!'); window.location.href='register.php';</script>";
    exit;
}

// Cek apakah email sudah terdaftar
$query_check = "SELECT * FROM tb_akun WHERE email = ?";
$stmt = mysqli_prepare($db, $query_check);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Email sudah terdaftar!'); window.location.href='register.php';</script>";
    exit;
}


// Set role default jadi kasir
$role = "kasir";

// Simpan data ke database
$query_insert = "INSERT INTO tb_akun (username, password, email, role) VALUES (?, ?, ?, ?)";
$stmt_insert = mysqli_prepare($db, $query_insert);
mysqli_stmt_bind_param($stmt_insert, "ssss", $username, $password, $email, $role);

if (mysqli_stmt_execute($stmt_insert)) {
    echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='index.php';</script>";
} else {
    echo "<script>alert('Gagal menyimpan data!'); window.location.href='register.php';</script>";
}

// Tutup koneksi
mysqli_stmt_close($stmt);
mysqli_stmt_close($stmt_insert);
mysqli_close($db);
?>