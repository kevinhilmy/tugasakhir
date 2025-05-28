<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
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
</head>
<body>
    <div class="nav">
        <div class="logo">
            <a href="">
                <img src="./Images/logo.png" alt="logo">
                <p>BEANPOS</p>
            </a>
        </div>
        <div id="mySidepanel" class="sidepanel">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="menu.php">Menu</a>
            <a href="stok.php">Stok</a>
            <a href="history.php">History</a>
        </div>

        <button class="openbtn" onclick="openNav()">&#9776;</button>
    </div>
    <div class="content">
        <h1>akun</h1>
        <table style="width: 100%;">
            <tr>
                <th>no</th>
                <th>Nama</th>
                <th>id</th>
                <th>usn</th>
                <th>pass</th>
                <th>email</th>
                <th>role</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <td>1</td>
                <td>kevin</td>
                <td>15</td>
                <td>hiru</td>
                <td>kevinaja</td>
                <td>kevinhilmy.r@gmial.com</td>
                <td>kasir</td>
                <td class="aksi"><input type="button" value="edit"><input type="button" value="hapus"></td>
            </tr>
            <tr>
                <td>2</td>
                <td>abah</td>
                <td>2</td>
                <td>abah</td>
                <td>abahaja</td>
                <td>abahabah@gmail.com</td>
                <td>admin</td>
                <td class="aksi"><input type="button" value="edit"><input type="button" value="hapus"></td>
            </tr>
        </table>
        <div class="edit">
            <input type="button" value="tambah akun">
        </div>
    </div>
</body>
</html>