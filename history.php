<?php
   session_start();
   include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>History</title>
   <style>
      header {
      background-color: #a05c26;
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

      h1 {
          margin-left: auto;
          margin-right: auto;
          padding-left: 70px;
          color: #fff;
          margin-bottom: 0;
        }

      table {
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            background-color: #FFFDD0;
            border-color: #795C32;
        }

      table, th, td {
            border: 1px solid black;
        }

      th, td {
            padding: 17px;
            font-size: 18px;
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
  <a href="menu.html">Menu</a>
  <a href="">Pesanan</a>
  <a href="">Stok Barang</a>
  <a href="">Riwayat</a>
  <a href="logout.html">Logout</a>
  </nav>

    <table style="width: 1250px" border="1">
         <h1>Riwayat pesanan</h1>
       <tr>
         <th>
            ID Akun
         </th>   
         <th>
            ID Pesanan
         </th>   
         <th>
            Tanggal
         </th>   
         <th>
            Total Produk
         </th>   
         <th>
            Total Harga
         </th>   
         <th>
            Bayar
         </th>   
         <th>
            Kembali
         </th>   
       </tr>

       <tr align="center">
         <td> 
            kasir1
         </td>   
         <td> 
            123451
         </td>  
         <td> 
            15-06-2025
         </td>  
         <td> 
            2
         </td>  
         <td> 
            53.000
         </td>   
         <td> 
            55.000
         </td>   
         <td> 
            2.000
         </td>   
       </tr>

       <tr align="center">
         <td> 
            kasir1
         </td>   
         <td> 
            123452
         </td>  
         <td> 
            15-06-2025
         </td>  
         <td> 
            1
         </td>  
         <td> 
            25.000
         </td>   
         <td> 
            25.000
         </td>   
         <td> 
            -
         </td>   
       </tr>

       <tr align="center">
         <td> 
            kasir1
         </td>   
         <td> 
            123453
         </td>  
         <td> 
            15-06-2025
         </td>  
         <td> 
            1
         </td>  
         <td> 
            17.000
         </td>   
         <td> 
            20.000
         </td>   
         <td> 
            3.000
         </td>   
       </tr>

       <tr align="center">
         <td> 
            kasir2
         </td>   
         <td> 
            123454
         </td>  
         <td> 
            15-06-2025
         </td>  
         <td> 
            5
         </td>  
         <td> 
            113.000
         </td>   
         <td> 
            120.000
         </td>   
         <td> 
            7.000
         </td>   
       </tr>

       <tr align="center">
         <td> 
            kasir2
         </td>   
         <td> 
            123455
         </td>  
         <td> 
            15-06-2025
         </td>  
         <td> 
            3
         </td>  
         <td> 
            51.000
         </td>   
         <td> 
            51.000
         </td>   
         <td> 
            -
         </td>   
       </tr>
    
       <tr align="center">
         <td> 
            kasir2
         </td>   
         <td> 
            123456
         </td>  
         <td> 
            15-06-2025
         </td>  
         <td> 
            2
         </td>  
         <td> 
            50.000
         </td>   
         <td> 
            50.000
         </td>   
         <td> 
            -
         </td>   
       </tr>

       <tr align="center">
         <td> 
            kasir3
         </td>   
         <td> 
            123457
         </td>  
         <td> 
            15-06-2025
         </td>  
         <td> 
            2
         </td>  
         <td> 
            49.000
         </td>   
         <td> 
            50.000
         </td>   
         <td> 
            1.000
         </td>   
       </tr>
    </table>
</body>
</html>