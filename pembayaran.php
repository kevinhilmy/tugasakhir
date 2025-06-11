<?php
session_start();
include 'koneksi.php';

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
    <style>
         body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to bottom, #5d4d44, #a7825b);
      margin: 0;
      min-height: 100vh;
    }

    header {
      background-color: #a05c26;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 1px;
    }

    .logo img {
      height: 50px;
      width: 100%;
    }

    .logo h3 {
      color: #fff;
      font-family: Georgia, serif;
      font-size: 20px;
    }

    .menu-icon {
      font-size: 24px;
      color: #000;
      cursor: pointer;
      user-select: none;
    }

    .sidebar {
      width: 250px;
      background-color: #6e4c2c;
      position: fixed;
      top: 0;
      right: -250px;
      height: 100%;
      padding-top: 60px;
      transition: 0.3s;
      z-index: 1000;

    }

    #sidebar-toggle {
      display: none;
    }

    #sidebar-toggle:checked ~ .sidebar {
      right: 0;
    }

    .sidebar a {
      padding: 15px 24px;
      text-decoration: none;
      color: #fff;
      display: block;
    }

    .sidebar a:hover {
      background-color: #8b6845;
    }

    .close-btn {
      position: absolute;
      top: 10px;
      right: 20px;
      font-size: 28px;
      color: #fff;
      cursor: pointer;
      font-weight: bold;
    }

    main {
      margin-left: 250px;
      padding: 20px;
    }
    .pembayaran {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 15px 30px;
      border-radius: 10px;
      max-width: 600px;
      justify-content: center;
      margin: 80px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .pembayaran h2 {
      text-align: center;
      color: #333;
    }
    .pembayaran p {
      font-size: 18px;
      color: #555;
    }
    .pembayaran label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    .pembayaran input[type="number"] {
      width: 90%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
      margin-bottom: 20px;
    }
    .pembayaran button {
      background-color: #6e4c2c;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    .pembayaran button:hover {
      background-color: #8b6845;
    }
    </style>
</head>
<body>
    <input type="checkbox" id="sidebar-toggle" class="sidebar-toggle" hidden>

<header>
  <div class="logo">
    <img src="./Images/logo.png" alt="BeanPOS Logo">
    <h3>BeanPOS</h3>
  </div>
  <label for="sidebar-toggle" class="menu-icon">&#9776;</label>
</header>

<nav class="sidebar">
  <label for="sidebar-toggle" class="close-btn" style="position:absolute; top:10px; right:15px; font-size:24px; color:white; cursor:pointer;">&times;</label>
  <a href="menu.php">Menu</a>
  <a href="cart.php">Pesanan</a>
  <a href="stok.php">Stok Barang</a>
  <a href="history.php">Riwayat</a>
  <a href="logout.php">Logout</a>
</nav>

<main>
    <div class="pembayaran">
    <h2>Halaman Pembayaran</h2>
    <p>Total yang harus dibayar: <strong>Rp. <?= number_format($total, 0, ',', '.') ?></strong></p>

    <form action="proses_pemesanan.php" method="post">
        <label for="bayar">Jumlah Uang Dibayarkan (Rp):</label>
        <input type="number" name="bayar" id="bayar" required>
        <input type="hidden" name="total" value="<?= $total ?>">
        <br><br>
        <button type="submit">Proses Pembayaran</button>
    </form>
    </div>
</main>
</body>
</html>
