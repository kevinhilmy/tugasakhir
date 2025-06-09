<?
    include 'koneksi.php';

    if(isset($_GET['ubah'])){
        $id = $_GET['ubah'];

        $query = "SELECT * FROM tb_akun WHERE id = '$id';";
        $sql = mysqli_query($db, $query);

        $result = mysqli_fetch_assoc($sql);

        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        *{
            margin: 0;
            padding: 0;
        }

        body{
            background-color: #736153;
        }

        .nav{
            display: flex;
            justify-content: space-between;
            padding: 15px;
            background-color: #bb874f;
        }

        .logo{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .logo a{
            text-decoration: none;
            color: #111;
        }

        a img{
            width: 50px;
        }

        .sidepanel {
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
        
        .isi{
            padding: 30px;
            /* display: flex;
            flex-direction: column;
            justify-content: center; */
            align-items: center;
            background-color: magenta;
        }
        
        .fc{
            background-color: red;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* .form input{
            display: flex;
            /* justify-content: end;
        } */

        td label{
            font-size: 20px
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
    <div class="isi">
        <div class="judul">
            <?php
                if(isset($_GET['ubah'])){
                    
            ?>
            <h1>edit data : </h1>
            <p>edit yang diinginkan</p>
            <?php
                } else {
            ?>
            <h1>tambahkan data</h1>
            <p>isi formulir</p>
            <?php
                }
            ?>
        </div>
        <form method="POST" action="proses.php">
            <input type="text" value="<?php echo $id; ?>">
            <div class="fc">
                <table>
                    <tr>
                        <td>
                            <label for="usn">Username :</label>
                        </td>
                        <td>
                            <input required type="text" id="usn" name="usn" placeholder="minimal 2 huruf">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="nama">Nama :</label>
                        </td>
                        <td>
                            <input required type="text" id="nama" name="nama" placeholder="minimal">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pw">Password :</label>
                        </td>
                        <td>
                            <input required type="password" name="pw" id="pw">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email :</label>
                        </td>
                        <td>
                            <input required type="email" name="email" id="email">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="role">Pilih Role</label>
                        </td>
                        <td>
                            <select required name="role" id="role">
                                <option selected>Pilih role</option>
                                <option value="admin">admin</option>
                                <option value="kasir">kasir</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="aksi">
                <button type="submit" name="change" value="add">Tambahkan Perubahan</button>
                <a href="akun.php">
                    <input type="button" value="batal">
                </a>
            </div>
        </form>
    </div>
</body>
</html>