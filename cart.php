<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['hapus_index'])) {
        $hapusIndex = (int)$_POST['hapus_index'];
        if (isset($_SESSION['keranjang'][$hapusIndex])) {
            unset($_SESSION['keranjang'][$hapusIndex]);

            $_SESSION['keranjang'] = array_values($_SESSION['keranjang']);
        }
    } else {
        $id_produk = (int)($_POST['id_produk'] ?? 0);
        $nama = $_POST['nama_produk'] ?? '';
        $harga = (int)($_POST['harga_produk'] ?? 0);

        if ($nama !== '' && $harga > 0) {
            if (!isset($_SESSION['keranjang'])) {
                $_SESSION['keranjang'] = [];
            }

            // Cek apakah produk sudah ada di keranjang
            $found = false;
            foreach ($_SESSION['keranjang'] as &$item) {
                if ($item['nama_produk'] === $nama) {
                    $item['jumlah'] += 1;
                    $found = true;
                    break;
                }
            }
            unset($item);

            if (!$found) {
                $_SESSION['keranjang'][] = [
                    'id_produk' => $id_produk,
                    'nama_produk' => $nama,
                    'harga_produk' => $harga,
                    'jumlah' => 1
                ];
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        *,
        html {
            padding: 0;
            margin: 0;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom, #5d4d44, #a7825b);
            margin: 0;
            min-height: 100vh;
        }

        nav {
            display: flex;
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

        .sidebar_icon {
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

        #sidebar-toggle:checked~.sidebar {
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

        .sidebar h1{
            color: #fff;
            padding-left: 15px;
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

        .cart-text {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cart-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border-radius: 10px;
            margin: 20px auto;
            max-width: 1100px;
            color: #ffffff;
            background: rgba(0, 0, 0, 0.5);
        }

        .tabel-keranjang {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: #ffffff;
        }

        .tabel-keranjang tr {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 10px;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .tabel-keranjang td {
            padding: 8px;
            text-align: left;
        }

        .keranjang {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }

        .keranjang h3 {
            grid-column: 1 / -1;
            text-align: center;
            color: #ffffff;
            font-size: 32px;
            font-weight: bold;
            font-family: 'Georgia', serif;
            margin-bottom: 10px;
        }

        .btn-bayar{
            padding-top: 5px;
            text-decoration: none;
            color: #fff;
        }

        footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            background-color: #bc884f;
            padding: 13.5px 20px;
        }

        .content_footer {
            display: flex;
            flex-direction: column;
            color: white;
            padding-right: 5%;
        }

        .content_footer a {
            color: #9c5a27;
            border: 2px solid white;
            background-color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .content_footer a:hover {
            border: 2px solid lightgray;
            background-color: lightgray;
            transition: .5s ease-in-out;
        }
    </style>
</head>

<body>

    <input type="checkbox" id="sidebar-toggle" class="sidebar-toggle" hidden>

    <nav>
        <div class="logo">
            <img src="./Images/logo.png" alt="BeanPOS Logo">
            <h3>BeanPOS</h3>
        </div>
        <label for="sidebar-toggle" class="sidebar_icon">&#9776;</label>
    </nav>
    <div class="sidebar">
        <label for="sidebar-toggle" class="close-btn" style="position:absolute; top:10px; right:15px; font-size:24px; color:white; cursor:pointer;">&times;</label>
        <h1><?php echo $_SESSION['username']; ?></h1>
        <a href="menu.php">Menu</a>
        <a href="#">Pesanan</a>
        <a href="stok.php">Stok Barang</a>
        <a href="history.php">Riwayat</a>
        <a href="logout.php">Logout</a>
    </div>
    <main>
        <div class="cart-text">
            <img src="Images/cart.png" alt="logo" style="width: 72px; height: 48px; display: block; margin: 0;">
            <h2 style="text-align: center; color: #fff; font-family: 'Georgia', serif;">Isi Keranjang</h2>
        </div>
        <div class="cart-container">
            <?php if (!empty($_SESSION['keranjang'])): ?>
                <table class="tabel-keranjang">
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($_SESSION['keranjang'] as $index => $item):
                            $harga = isset($item['harga']) ? (float)$item['harga'] : 0;
                            $jumlah = $item['jumlah'] ?? 1;
                            $subtotal = $harga * $jumlah;
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($item['nama']) ?></td>
                                <td>Rp. <?= number_format($harga, 0, ',', '.') ?></td>
                                <td><?= (int)$jumlah ?></td>
                                <td>
                                    <form method="post" style="margin:0;">
                                        <input type="hidden" name="hapus_index" value="<?= $index ?>">
                                        <button type="submit" onclick="return confirm('Yakin ingin hapus produk ini?');">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"><strong>Total</strong></td>
                            <td><strong>Rp. <?= number_format($total, 0, ',', '.') ?></strong></td>
                        </tr>
                    </tfoot>
                </table>

                <div class="checkout">
                    <a href="pembayaran.php" class="btn-bayar">Bayar Sekarang</a>
                </div>
            <?php else: ?>
                <p class="empty-cart">Keranjang kosong.</p>
            <?php endif; ?>
        </div>

    </main>
</body>

</html>