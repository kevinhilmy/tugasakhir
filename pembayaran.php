<?php
session_start();

if (!isset($_SESSION['keranjang']) || empty($_SESSION['keranjang'])) {
    header("Location: cart.php");
    exit;
}

$total = 0;
foreach ($_SESSION['keranjang'] as $item) {
    $total += $item['harga'] * $item['jumlah'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran</title>
</head>
<body>
    <h2>Halaman Pembayaran</h2>
    <p>Total yang harus dibayar: <strong>Rp. <?= number_format($total, 0, ',', '.') ?></strong></p>

    <form action="proses_pemesanan.php" method="post">
        <label for="bayar">Jumlah Uang Dibayarkan (Rp):</label>
        <input type="number" name="bayar" id="bayar" required>
        <input type="hidden" name="total" value="<?= $total ?>">
        <br><br>
        <button type="submit">Proses Pembayaran</button>
    </form>
</body>
</html>
