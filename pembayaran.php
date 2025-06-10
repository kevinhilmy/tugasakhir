<?php
session_start();
include 'koneksi.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        .nav{
            display: flex;
            justify-content: space-between;
            padding: 15px;
            background-color: #bb874f;
        }

        .logo a{
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            text-decoration: none;
            color: black;
        }

        .logo img{
            width: 50px;
        }

        .sidepanel{
            height: 250px; /* Specify a height */
            width: 0; /* 0 width - change this with JavaScript */
            position: fixed; /* Stay in place */
            z-index: 1; /* Stay on top */
            top: 0;
            right: 0;
            background-color: #111; /* Black*/
            overflow-x: hidden; /* Disable horizontal scroll */
            padding-top: 60px; /* Place content 60px from the top */
            transition: 0.5s; /* 0.5 second transition effect to slide in the sidepanel */
        }

        /* The sidepanel links */
        .sidepanel a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        /* When you mouse over the navigation links, change their color */
        .sidepanel a:hover {
            color: #f1f1f1;
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

        .openbtn:hover {
            background-color: #444;
        }

        body{
            background-image: url(./Images/BackgroundBean.jpeg);
            background-size: cover;
        }

        .content{
            display: flex;
            justify-content: center;
            padding: 10%;
        }

        .box{
            padding: 20px;
            background-color: bisque;
            border-radius: 10px;
        }

        .label{
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .label img{
            width: 70px;
        }

        .tombol{
            margin-top: 10px;
            display: flex;
            justify-content: center;
        }

        .tombol input[type = "button"]{
            padding: 5px;
            border-radius: 10px;
            background-color: lawngreen;
            border: solid 1px transparent;
        }

        .tombol input[type = "button"]:hover{
            background-color: forestgreen;
        }
    </style>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <a href="menu.php">
                <img src="./Images/logo.png" alt="logo">
                <p>BEANPOS</p>
            </a>
        </div>
        <div id="mySidepanel" class="sidepanel">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="menu.php">Menu</a>
            <a href="history.php">History</a>
            <a href="cart.php">Cart</a>
        </div>

        <button class="openbtn" onclick="openNav()">&#9776;</button>
    </div>
    <?php while ($row = mysqli_fetch_assoc($sql)) { ?>
        <div class="content">
            <div class="box">
                <div class="label">
                    <img src="./Images/logo.png" alt="status">
                    <p>Transaksi berhasil</p>
                    <p>Terimakasih sudah belanja</p>
                </div>
                <div class="detail">
                    <table>
                        <tr>
                            <td>ID Akun :</td>
                            <td><?php echo $row["id_akun"]; ?></td>
                        </tr>
                        <tr>
                            <td>ID Pesanan :</td>
                            <td><?php echo $row["id_pesanan"]; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal :</td>
                            <td><?php echo $row["tanggal"]; ?></td>
                        </tr>
                        <tr>
                            <td>Total produk :</td>
                            <td><?php echo $row["total_produk"]; ?></td>
                        </tr>
                        <tr>
                            <td>Total harga :</td>
                            <td><?php echo $row["total_harga"]; ?></td>
                        </tr>
                        <tr>
                            <td>Bayar :</td>
                            <td><?php echo $row["bayar"]; ?></td>
                        </tr>
                        <tr>
                            <td>Kembali :</td>
                            <td><?php echo $row["kembali"]; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="tombol">
                    <input type="button" value="belanja kembali">
                </div>
            </div>
        </div>
    <?php } ?>
</body>
</html>