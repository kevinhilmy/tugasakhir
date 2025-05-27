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
      gap: 10px;
    }

    .logo img {
      height: 50px;
    }

    .logo h3 {
      color: #fff;
      font-family: Georgia, serif;
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
      left: -250px;
      height: 100%;
      padding-top: 60px;
      transition: 0.3s;
      z-index: 1000;
    }

    #sidebar-toggle {
      display: none;
    }

    #sidebar-toggle:checked ~ .sidebar {
      left: 0;
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
    }

    .add-cart img {
      width: 24px;
      height: 24px;
    }
  </style>
</head>
<body>

<input type="checkbox" id="sidebar-toggle" class="sidebar-toggle" hidden>

<header>
  <div class="logo">
    <img src="Logo_kopi.jpg" alt="BeanPOS Logo">
    <h3>BeanPOS</h3>
  </div>
  <label for="sidebar-toggle" class="menu-icon">&#9776;</label>
</header>

<nav class="sidebar">
  <a href="">Home</a>
  <a href="menu.html">Menu</a>
  <a href="">Pesanan</a>
  <a href="">Stok Barang</a>
  <a href="">Riwayat</a>
  <a href="logout.html">Logout</a>
</nav>

<main>
  <div class="menu-container">
    <h3>MENU</h3>


    <div class="menu-items">
      <h4>Espresso</h4>
      <img src="./Images/Espresso.jpg" alt="Espresso" class="product">
      <div class="add-cart">
        <span>Rp.25.000</span>
        <img src="cart.jpg" alt="Add to Cart">
      </div>
    </div>

    <div class="menu-items">
      <h4>Creamy Latte</h4>
      <img src="./Images/creamy-latte.jpg" alt="Creamy Latte" class="product">
      <div class="add-cart">
        <span>Rp.17.000</span>
        <img src="cart.jpg" alt="Add to Cart">
      </div>
    </div>

    <div class="menu-items">
      <h4>Cappucino</h4>
      <img src="./Images/Cappucino.jpg" alt="Cappucino" class="product">
      <div class="add-cart">
        <span>Rp.25.000</span>
        <img src="cart.jpg" alt="Add to Cart">
      </div>
    </div>

    <div class="menu-items">
      <h4>Mocha Latte</h4>
      <img src="./Images/Mocha_Latte.jpg" alt="Mocha Latte" class="product">
      <div class="add-cart">
        <span>Rp.17.000</span>
       <img src="cart.jpg" alt="Add to Cart">
      </div>
    </div>

    <div class="menu-items">
      <h4>Iced Americano</h4>
      <img src="./Images/Iced_americano.jpg" alt="Iced Americano" class="product">
      <div class="add-cart">
        <span>Rp.26.000</span>
        <img src="cart.jpg" alt="Add to Cart">
      </div>
    </div>

    <div class="menu-items">
      <h4>Macchiato Latte</h4>
      <img src="./Images/Macchiato.jpg" alt="Macchiato Latte" class="product">
      <div class="add-cart">
        <span>Rp.24.000</span>
        <img src="cart.jpg" alt="Add to Cart">
      </div>
    </div>

    <div class="menu-items">
      <h4>Cold Brew</h4>
      <img src="./Images/cold brew.jpg" alt="Cold Brew" class="product">
      <div class="add-cart">
        <span>Rp.25.000</span>
        <img src="cart.jpg" alt="Add to Cart">
      </div>
    </div>

    <div class="menu-items">
      <h4>Cafe au Lait</h4>
      <img src="./Images/cafe-au-lait.jpg" alt="Cafe au Lait" class="product">
      <div class="add-cart">
        <span>Rp.27.000</span>
        <img src="cart.jpg" alt="Add to Cart">
      </div>
    </div>

  </div>
</main>

</body>
</html>
