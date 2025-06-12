<?php
session_start();

$kembalian = $_SESSION['kembalian'] ?? 0;
$total = $_SESSION['total'] ?? 0;
$bayar = $_SESSION['bayar'] ?? 0;

// Bersihkan session setelah ditampilkan
unset($_SESSION['kembalian'], $_SESSION['total'], $_SESSION['bayar']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hasil Transaksi</title>
</head>
<body>
    <h2>Transaksi Berhasil!</h2>
    <p>Total: Rp. <?= number_format($total, 0, ',', '.') ?></p>
    <p>Dibayar: Rp. <?= number_format($bayar, 0, ',', '.') ?></p>
    <p>Kembalian: Rp. <?= number_format($kembalian, 0, ',', '.') ?></p>

    <a href="menu.php">Kembali ke Menu</a>
</body>
</html>
