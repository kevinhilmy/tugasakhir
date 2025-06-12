<?php
session_start();
include 'koneksi.php';
//tampilkan seluruh isi dari $_SESSION;
// print_r($_SESSION);

if (!isset($_SESSION['keranjang']) || empty($_SESSION['keranjang'])) {
    header("Location: cart.php");
    exit;
}

$bayar = $_POST['bayar'];
$total = $_POST['total'];
$kembali = $bayar - $total;

if ($kembali < 0) {
    echo "<script>alert('Uang yang dibayarkan kurang!'); window.history.back();</script>";
    exit;
}

// pada bagian ini error session id ga ada
$id_akun = $_SESSION['id'];
$tanggal = date('Y-m-d');
$total_produk = count($_SESSION['keranjang']);

// Simpan ke tb_pemesanan
$query = "INSERT INTO tb_pemesanan (id_akun, tanggal, total_produk, total_harga, bayar, kembali)
          VALUES ('$id_akun', '$tanggal', '$total_produk', '$total', '$bayar', '$kembali')";
mysqli_query($db, $query);

// Ambil id_pesanan terakhir
$id_pesanan = mysqli_insert_id($db);

// Simpan detail pesanan ke detail_pesanan
foreach ($_SESSION['keranjang'] as $item) {
    $id_produk = $item['id'];
    $jumlah = $item['jumlah'];
    $subtotal = $item['harga'] * $jumlah;

    $query_detail = "INSERT INTO detail_pesanan (id_pesanan, id_produk, jumlah, subtotal)
                     VALUES ('$id_pesanan', '$id_produk', '$jumlah', '$subtotal')";
    mysqli_query($db, $query_detail);
}

// Kosongkan keranjang
unset($_SESSION['keranjang']);

echo "<script>alert('Pembayaran berhasil. Kembalian: Rp. " . number_format($kembali, 0, ',', '.') . "');
window.location.href='hasil_transaksi.php';</script>";
