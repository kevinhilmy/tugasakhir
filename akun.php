<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header("Location: menu.php");
  exit;
}

// ambil seluruh data dari tabel tb_akun 
function getAllAkun()
{
    global $db;
    $query = "SELECT * FROM tb_akun";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="admin.css"> -->
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

        .logo a {
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
            height: 250px;
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
            color: black;
        }

        input[type="button"] {
            padding: 10px;
            border-radius: 15px;
            border: solid 1px black;
        }

        .edit {
            /* margin-top: 10px; */
            padding: 10px;
        }
    </style>
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
            <?php
            //tampilkan data akun dari database
            $akun = getAllAkun();
            if (count($akun) > 0) {
                foreach ($akun as $index => $a) {
                    echo "<tr>
                                <td>" . ($index + 1) . "." . "</td>
                                <td>" . htmlspecialchars($a['nama']) . "</td>
                                <td>" . htmlspecialchars($a['id']) . "</td>
                                <td>" . htmlspecialchars($a['username']) . "</td>
                                <td>" . htmlspecialchars($a['password']) . "</td>
                                <td>" . htmlspecialchars($a['email']) . "</td>
                                <td>" . htmlspecialchars($a['role']) . "</td>
                                <td class='aksi'><a href='kelola.php?ubah=" . $a['id'] . "'>edit</a><a href='proses.php?hapus=" . $a['id'] . "'>hapus</a></td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Tidak ada data akun.</td></tr>";
            }
            ?>
        </table>
        <div class="edit">
            <a href="kelola.php">
                <input type="button" value="tambah akun">
            </a>
        </div>
    </div>
</body>

</html>