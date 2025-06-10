<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['keranjang']) || empty($_SESSION['keranjang'])) {
    echo "Keranjang kosong!";
    exit;
}

$id_akun = 1; // Ganti dengan ID akun user yang sedang login jika ada sistem login
$tanggal = date('Y-m-d H:i:s');
$total_produk = 0;
$total_harga = 0;

// Hitung total produk dan harga
foreach ($_SESSION['keranjang'] as $item) {
    $total_produk += $item['jumlah'];
    $total_harga += $item['jumlah'] * $item['harga_produk'];
}

// Simulasi input pembayaran
$bayar = $total_harga + 0; // Ganti dengan input real user jika tersedia
$kembali = $bayar - $total_harga;

// Simpan ke tabel tb_pemesanan
$query = "INSERT INTO tb_pemesanan (id_akun, tanggal, total_produk, total_harga, bayar, kembali)
          VALUES ('$id_akun', '$tanggal', '$total_produk', '$total_harga', '$bayar', '$kembali')";
$result = mysqli_query($db, $query);

if ($result) {
    // Hapus keranjang setelah disimpan
    unset($_SESSION['keranjang']);

    // Redirect ke halaman konfirmasi
    header("Location: pembayaran.php");
    exit;
} else {
    echo "Gagal menyimpan pesanan: " . mysqli_error($db);
}
?>
