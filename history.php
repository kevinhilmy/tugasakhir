<?php
   session_start();
   include 'koneksi.php';

   function getAllAkun()
{
    global $db;
    $query = "SELECT * FROM tb_pemesanan";
    $result = mysqli_query($db, $query);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>History</title>
   <style>
      header {
      background-color: #bb874f;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
        }

      body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to bottom, #5d4d44, #a7825b);
      margin: 0;
      min-height: 100vh;
        }

      .logo {
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
        }

      .logo img {
      height: 50px;
        }

      .logo h3 {
      text-decoration: none;
      color: #111;
      font-family: Georgia, serif;
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

      h1 {
          margin-left: auto;
          margin-right: auto;
          padding-left: 70px;
          color: #fff;
          margin-bottom: 0;
          font-size: 40px;
        }

      table {
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            background-color:rgb(253, 250, 190);
            border-color: #795C32;
        }

      table, th, td {
            border: 1px solid black;
        }

      th, td {
            padding: 17px;
            font-size: 18px;
        }
      
      tr:nth-child(even) {
            background-color:rgba(250, 215, 178, 0.59);
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

    <table style="width: 1250px" border="1">
         <h1>Riwayat pesanan</h1><br>
       <tr>
         <th>ID Akun</th>   
         <th>ID Pesanan</th>   
         <th>Tanggal</th>   
         <th>Total Produk</th>   
         <th>Total Harga</th>   
         <th>Bayar</th>   
         <th>Kembali</th>   
       </tr>

       <?php
    $riwayat = getAllAkun();
    foreach ($riwayat as $row) {
      echo "<tr>";
      echo "<td>" . htmlspecialchars($row['id_akun']) . "</td>";
      echo "<td>" . htmlspecialchars($row['id_pemesanan']) . "</td>";
      echo "<td>" . htmlspecialchars($row['tanggal']) . "</td>";
      echo "<td>" . htmlspecialchars($row['total_produk']) . "</td>";
      echo "<td>" . htmlspecialchars($row['total_harga']) . "</td>";
      echo "<td>" . htmlspecialchars($row['bayar']) . "</td>";
      echo "<td>" . htmlspecialchars($row['kembali']) . "</td>";
      echo "</tr>";
    }
  ?>
  
    </table>
</body>
</html>