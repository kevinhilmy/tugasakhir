<?php
// Membuat koneksi ke database
// Parameter: (host, username, password, nama_database)
$db = mysqli_connect("localhost", "root", "", "db_kasir");

// Mengecek apakah koneksi berhasil atau tidak
if (!$db) {
    // Jika koneksi gagal, tampilkan pesan error dan hentikan program
    die("Connection failed: " . mysqli_connect_error());
}
?>
