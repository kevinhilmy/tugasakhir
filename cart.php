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
    }
    else {
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

        body{
            min-width: 100vh;
        }
        
        nav {
            display: flex;
            background-color: #bc884f;
            padding: 10px 20px;
            align-items: center;
            justify-content: space-between;
        }
        .logo {
         display: flex;
         align-items: center;
         gap: 10px;
        }
        .logo img {
            height: 50px;
        }
        .logo h3 {
            color: #402e1e;
        }
        .sidebar_icon {
            font-size: 24px;
            color: #402e1e;
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
            height: 86vh;
            background-image: linear-gradient(to right, #5e4f48 , #9f856b)
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
            color: #fff;
            font-size: 32px;
            font-weight: bold;
            font-family: 'Georgia', serif;
            margin-bottom: 10px;
        }

        footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            background-color: #bc884f;
            padding: 13.5px 20px;
        }
        .content_footer{
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
        .content_footer a:hover{
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
            <img src="Images/Logo_kopi.jpg">
        <h3>BEANPOS</h3>
        </div>
        <label for="sidebar-toggle" class="sidebar_icon">&#9776;</label>
    </nav>
    <div class="sidebar">
        <label for="sidebar-toggle" class="close-btn" style="position:absolute; top:10px; right:15px; font-size:24px; color:white; cursor:pointer;">&times;</label>
        <a href="menu.php">Menu</a>
        <a href="">Pesanan</a>
        <a href="">Stok Barang</a>
        <a href="">Riwayat</a>
        <a href="logout.php">Logout</a>
    </div>
    <main>
       <div class="cart-container">
    <h2>Isi Keranjang</h2>

    <?php if (!empty($_SESSION['keranjang'])): ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total = 0;
                foreach ($_SESSION['keranjang'] as $item):
                    $harga = isset($item['harga_produk']) ? (float)$item['harga_produk'] : 0;
                    $jumlah = isset($item['jumlah']) ? (int)$item['jumlah'] : 1; // default 1 jika gak ada

                    $subtotal = $harga * $jumlah;

                ?>
                    <tr>
                        <td><?= htmlspecialchars($item['nama_produk']) ?></td>
                        <td>Rp. <?= number_format($item['harga_produk'], 0, ',', '.') ?></td>
                        <td><?= (int)($item['jumlah'] ?? 1) ?></td>

                        <td>Rp. <?= number_format($subtotal, 0, ',', '.') ?></td>
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

        <div class="checkout-btn">
            <a href="checkout.php" class="btn-bayar">Bayar Sekarang</a>
        </div>

    <?php else: ?>
        <p class="empty-cart">Keranjang kosong.</p>
    <?php endif; ?>
</div>
    </main>

</body>
</html>