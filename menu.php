<?php
  session_start();
  include 'koneksi.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    $query = mysqli_query($db,"SELECT * FROM tb_produk WHERE nama = '$nama' AND harga = '$harga'");
      if (!$query) {
        die("Query failed: " . mysqli_error($db));
      }

    $nama_produk = mysqli_real_escape_string($db, $nama);
    $harga_produk = (int)$harga;

    // Cek apakah produk ada di database
    $tb_produk = mysqli_fetch_assoc($query);

    if($tb_produk) {
      if (!isset($_SESSION['keranjang'])) {
            $_SESSION['keranjang'] = [];
      }

      $_SESSION['keranjang'][] = [
        'nama' => $nama,
        'harga' => $harga
      ];

      // Redirect untuk mencegah form resubmission
      header("Location: menu.php");
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
      margin-right: 40px;
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
  <a href="menu.php">Menu</a>
  <a href="cart.php">Pesanan</a>
  <a href="stok.php">Stok Barang</a>
  <a href="">Riwayat</a>
  <a href="logout.php">Logout</a>
</nav>

<main>
  <div class="menu-container">
    <h3>MENU</h3>

    <?php while ($row = mysqli_fetch_assoc($result)) : ?>

    <form action="" method="post">
      <div class="menu-items">
        <h4>Espresso</h4>
        <img src="./Images/Espresso_bg.png" alt="Espresso" class="product">
        <input type="hidden" name="id" value="">
        <input type="hidden" name="nama" value="Espresso">
        <input type="hidden" name="harga" value="25000">
        <div class="add-cart">
          <span>Rp.25.000</span>
          <button type="submit" style="background: none; border: none; padding: 0;">
            <img src="./Images/cart.png" alt="Add to Cart">
          </button>
        </div>
      </div>
    </form>

    <form action="" method="post">
      <div class="menu-items">
        <h4>Creamy Latte</h4>
        <img src="./Images/creamy-latte-bg.png" alt="Creamy Latte" class="product">
        <input type="hidden" name="id" value="">
        <input type="hidden" name="nama" value="Creamy Latte">
        <input type="hidden" name="harga" value="17000">
        <div class="add-cart">
          <span>Rp.17.000</span>
          <button type="submit" style="background: none; border: none; padding: 0;">
            <img src="./Images/cart.png" alt="Add to Cart">
          </button>
        </div>
      </div>
    </form>

    <form action="" method="post">
      <div class="menu-items">
        <h4>Cappucino</h4>
        <img src="./Images/Cappucino_bg.png" alt="Cappucino" class="product">
        <input type="hidden" name="id" value="">
        <input type="hidden" name="nama" value="Cappucino">
        <input type="hidden" name="harga" value="25000">
        <div class="add-cart">
          <span>Rp.25.000</span>
          <button type="submit" style="background: none; border: none; padding: 0;">
            <img src="./images/cart.png" alt="Add to Cart">
          </button>
        </div>
      </div>
    </form>

    <form action="" method="post">
      <div class="menu-items">
        <h4>Mocha Latte</h4>
        <img src="./Images/Mocha_Latte_bg.png" alt="Mocha Latte" class="product">
        <input type="hidden" name="id" value="">
        <input type="hidden" name="nama" value="Mocha Latte">
        <input type="hidden" name="harga" value="17000">
        <div class="add-cart">
          <span>Rp.17.000</span>
          <button type="submit" style="background: none; border: none; padding: 0;">
            <img src="./Images/cart.png" alt="Add to Cart">
          </button>
        </div>
      </div>
    </form>

    <form action="" method="post">
      <div class="menu-items">
        <h4>Iced Americano</h4>
        <img src="./Images/Iced_americano_bg.png" alt="Iced Americano" class="product">
        <input type="hidden" name="id" value="">
        <input type="hidden" name="nama" value="Iced Americano">
        <input type="hidden" name="harga" value="26000">
        <div class="add-cart">
          <span>Rp.26.000</span>
          <button type="submit" style="background: none; border: none; padding: 0;">
            <img src="./Images/cart.png" alt="Add to Cart">
          </button>
        </div>
      </div>
    </form>

    <form action="" method="post">
      <div class="menu-items">
        <h4>Macchiato Latte</h4>
        <img src="./Images/Macchiato_bg.png" alt="Macchiato Latte" class="product">
        <input type="hidden" name="id" value="">
        <input type="hidden" name="nama" value="Macchiato Latte">
        <input type="hidden" name="harga" value="24000">
        <div class="add-cart">
            <span>Rp.24.000</span>
            <button type="submit" style="background: none; border: none; padding: 0;">
              <img src="./Images/cart.png" alt="Add to Cart">
            </button>
        </div>
      </div>
    </form>

    <form action="" method="post">
      <div class="menu-items">
        <h4>Cold Brew</h4>
        <img src="./Images/cold brew.jpg" alt="Cold Brew" class="product">
        <input type="hidden" name="id" value="">
        <input type="hidden" name="nama" value="Cold Brew">
        <input type="hidden" name="harga" value="25000">
        <div class="add-cart">
          <span>Rp.25.000</span>
          <button type="submit" style="background: none; border: none; padding: 0;">
            <img src="./Images/cart.png" alt="Add to Cart">
          </button>
        </div>
      </div>
    </form>

    <form action="" method="post">
      <div class="menu-items">
        <h4>Cafe au Lait</h4>
        <img src="./Images/cafe-au-lait-bg.png" alt="Cafe au Lait" class="product">
        <input type="hidden" name="id" value="">
        <input type="hidden" name="nama" value="Cafe au Lait">
        <input type="hidden" name="harga" value="27000">
        <div class="add-cart">
          <span>Rp.27.000</span>
          <button type="submit" style="background: none; border: none; padding: 0;">
            <img src="./Images/cart.png" alt="Add to Cart">
          </button>
        </div>
      </div>
    </form>
    <?php endwhile; ?>
  </div>
</main>

</body>
</html>