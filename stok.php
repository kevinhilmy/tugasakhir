<?php
    session_start();
    include 'koneksi.php';

    $query = 'SELECT * FROM tb_produk';
    $result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href=" admin.css"> -->
    <link rel="shortcut icon" href="" type="image/x-icon">
    <script>
        /* Set the width of the sidebar to 250px (show it) */
        function openNav() {
        document.getElementById("mySidepanel").style.width = "250px";
        }

        /* Set the width of the sidebar to 0 (hide it) */
        function closeNav() {
        document.getElementById("mySidepanel").style.width = "0";
        }
    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom, #5d4d44, #a7825b);
            margin: 0;
            min-height: 100vh;
        }

        .nav {
            background-color: #a05c26;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo a {
            color: #fff;
            font-family: Georgia, serif;
            font-size: 20px;
            text-decoration: none;
        }

        a img {
            height: 50px;
            width: 100%;
        }

        .sidepanel {
            height: 100%;
            /* Specify a height */
            width: 0;
            /* 0 width - change this with JavaScript */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Stay on top */
            top: 0;
            right: 0;
            background-color: #111;
            /* Black*/
            overflow-x: hidden;
            /* Disable horizontal scroll */
            padding-top: 60px;
            /* Place content 60px from the top */
            transition: 0.5s;
            /* 0.5 second transition effect to slide in the sidepanel */
            background-color: #6e4c2c;
        }

        /* The sidepanel links */
        .sidepanel a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #fff;
            display: block;
            transition: 0.3s;
        }

        /* Position and style the close button (top right corner) */
        .sidepanel .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        /* Style the button that is used to open the sidepanel */
        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: transparent;
            color: black;
            padding: 10px 15px;
            border: none;
        }

        .sidepanel h1{
            color: #fff;
            padding-left: 15px;
        }

        .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* align-items: center; */
            margin: 3%;
            /* padding: 3%; */
            background-color: #ffe7cd;
        }

        .content h1 {
            padding: 10px;
            padding-left: 15px;
        }

        table,
        th,
        td {
            border: solid 1px transparent;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
        }

        table {
            margin-top: 10px;
        }

        tr:nth-child(even) {
            background-color: #edd7bf;
        }

        .aksi {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .aksi a {
            text-decoration: none;
            color: white;  
        }

        .edit {
            background-color:rgb(41, 193, 31);
            padding: 10px;
            border-radius: 15px;
        }

        .hapus {
            background-color: rgb(255, 0, 0);
            padding: 10px;
            border-radius: 15px;
        }

        input[type="button"] {
            padding: 10px;
            border-radius: 15px;
            border: solid 1px black;
        }

        .tambah {
            /* margin-top: 10px; */
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <a href="menu.php">
                <img src="./Images/logo.png" alt="logo">
            </a>
            <a href="menu.php">BeanPOS</a>
        </div>
        <div id="mySidepanel" class="sidepanel">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <h1><?php echo $_SESSION['username']; ?></h1>
            <a href="menu.php">Menu</a>
            <a href="akun.php">Akun</a>
            <a href="history.php">History</a>
            <a href="logout.php">Logout</a>
        </div>

        <button class="openbtn" onclick="openNav()">&#9776;</button>
    </div>
    <div class="content">
        <h1>STOK BARANG</h1>
        <table style="width: 100%;">
            <tr>
                <th>Nama</th>
                <th>Id</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result)){ ?>
            <tr>
                <td><?php echo $row['nama_produk']; ?></td>
                <td><?php echo $row['id_produk']; ?></td>
                <td><?php echo $row['harga_produk']; ?></td>
                <td><?php echo $row['stok_produk']; ?></td>
                <td class="aksi"><a href="kelola_stok.php?ubah=<?php echo $row['id_produk']?>" class="edit">Edit</a><a href="proses_stok.php?hapus=<?php echo $row['id_produk']?>" onclick="return confirm('Yakin ingin hapus produk ini?');" class="hapus">Hapus</a></td>
            </tr>            
            <?php }?>
        </table>
        <div class="tambah">
            <a href="kelola_stok.php">
                <input type="button" value="Tambah Produk">
            </a>
        </div>
    </div>
</body>
</html>