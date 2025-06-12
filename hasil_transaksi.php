<?php
session_start();
include 'koneksi.php';

$kembalian = $_SESSION['kembalian'] ?? 0;
$total = $_SESSION['total'] ?? 0;
$bayar = $_SESSION['bayar'] ?? 0;

//tampilkan tb_pemesanan
$sql = "SELECT total_harga, bayar, kembali FROM tb_pemesanan WHERE id_pesanan = (SELECT MAX(id_pesanan) FROM tb_pemesanan WHERE id_akun = ?)";
$stmt = $db->prepare($sql);
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$result = $stmt->get_result();
if (!$result) {
    echo "<script>alert('Error: " . $db->error . "');</script>";
    exit;
}
// Cek apakah ada data
if ($result->num_rows === 0) {
    echo "<script>alert('Tidak ada transaksi yang ditemukan!');</script>";
    exit;
}
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total = $row['total_harga'];
    $bayar = $row['bayar'];
    $kembalian = $row['kembali'];
} else {
    echo "<script>alert('Data transaksi tidak ditemukan!');</script>";
    exit;
}

// Bersihkan session setelah ditampilkan
unset($_SESSION['kembalian'], $_SESSION['total'], $_SESSION['bayar']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hasil Transaksi</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }

        body{
            background-image: url(./Images/BackgroundBean.jpeg);
        }

        .isi{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: red;
            margin: 10% 20%;
            border-radius: 10px;
            gap: 5px;
        }

        .isi h2{
            font-size: 30px;
        }

        .isi p{
            font-size:24px
        }

        .isi a{
            font-size: 20px;
            text-decoration: none;
            
        }
    </style>
</head>

<body>
    <div class="isi">
        <h2>Transaksi Berhasil!</h2>
        <p>Total: Rp. <?= number_format($total, 0, ',', '.') ?></p>
        <p>Dibayar: Rp. <?= number_format($bayar, 0, ',', '.') ?></p>
        <p>Kembalian: Rp. <?= number_format($kembalian, 0, ',', '.') ?></p>
        <a href="menu.php">Kembali ke Menu</a>
    </div>

</body>

</html>