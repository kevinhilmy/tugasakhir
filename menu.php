<?php
  session_start();
  include 'koneksi.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_produk'])) {
  $id_produk = (int)$_POST['id_produk'];

  // Ambil produk dari database berdasarkan ID
  $query = mysqli_query($db, "SELECT * FROM tb_produk WHERE id_produk = $id_produk");

  if ($query && mysqli_num_rows($query) > 0) {
    $produk = mysqli_fetch_assoc($query);

    if (!isset($_SESSION['keranjang'])) {
      $_SESSION['keranjang'] = [];
    }

    $found = false;
    foreach ($_SESSION['keranjang'] as &$item) {
        if ($item['id'] === $produk['id_produk']) {
            $item['jumlah'] += 1; // Tambahkan jumlah
            $found = true;
            break;
        }
    }
    unset($item); // Hapus referensi

    if (!$found) {
        $_SESSION['keranjang'][] = [
            'id' => $produk['id_produk'],
            'nama' => $produk['nama_produk'],
            'harga' => $produk['harga_produk'],
            'jumlah' => 1
        ];
    }

  $_SESSION['message'] = $produk['nama_produk'] . " berhasil ditambahkan ke keranjang!";

    header("Location: $_SERVER[PHP_SELF]");
    exit;
  }
}

  $result = mysqli_query($db, "SELECT * FROM tb_produk");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Menu</title>
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

    .menu-container {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      padding: 20px;
      max-width: 1200px;
      margin: auto;
    }

    .menu-container h3 {
      grid-column: 1 / -1;
      text-align: center;
      color: #fff;
      font-size: 32px;
      font-weight: bold;
      font-family: 'Georgia', serif;
      margin-bottom: 10px;
    }

    .menu-items {
      background-color: rgba(255, 255, 255, 0.2);
      border-radius: 16px;
      padding: 10px;
      text-align: center;
      color: white;
      font-weight: bold;
      transition: transform 0.2s;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .menu-items:hover {
      transform: scale(1.05);
    }

    .menu-items h4 {
      margin: 8px 0 4px;
    }

    .menu-items img.product {
      width: 100px;
      height: 100px;
      object-fit: contain;
      margin: 8px 0;
    }

    .add-cart {
      margin-top: auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      padding: 0 10px;
    }

    .add-cart span {
      font-size: 14px;
      margin-right: 45px;
      
    }

    .add-cart img {
      width: 48px;
      height: 24px;
      background-color: #a05c26;
      border-radius: 12px;
    }
    .add-cart img:hover {
      cursor: pointer;
      transform: scale(1.1);
      background-color:rgb(212, 163, 114);
    }

    .alert {
    position: fixed;
    top: 60px;
    right: 20px;
    background-color: #f0c674;
    color: #3b2900;
    padding: 25px 20px;
    border-radius: 4px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    z-index: 2000;
    animation: fadeOut 3s forwards;
    }

    @keyframes fadeOut {
    0% { opacity: 1;}
    80% { opacity: 1; }
    100% { opacity: 0; }
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
  <div class="menu-container">
    <h3>MENU</h3>

    <?php while ($row = mysqli_fetch_assoc($result)) : ?>

    <form action="" method="post">
  <div class="menu-items">
    <h4><?php echo $row['nama_produk']; ?></h4>
    <img src="./Images/Espresso_bg.png" alt="Espresso" class="product">
    <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
    <div class="add-cart">
      <span>Rp.<?php echo number_format($row['harga_produk'], 0, ',', '.'); ?></span>
      <button type="submit" style="background: none; border: none; padding: 0;">
        <img src="./Images/cart.png" alt="Add to Cart">
      </button>
    </div>
  </div>
</form>
    <?php endwhile; ?>
  </div>
  <?php if (isset($_SESSION['message'])): ?>
    <div class="alert">
      <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
    </div>
  <?php endif; ?>
  <div class="tombol">
    <a href='cart.php'>
      <button>Lihat Keranjang</button>
    </a>
  </div>
</main>

</body>
</html>