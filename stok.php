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
            <a href="menu.php">
                <img src="./Images/logo.png" alt="logo">
                <p>BEANPOS</p>
            </a>
        </div>
        <div id="mySidepanel" class="sidepanel">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
        </div>

            <button class="openbtn" onclick="openNav()">&#9776;</button>
    </div>
    <div class="content">
        <h1>STOK BARANG</h1>
        <table style="width: 100%;">
                <tr>
                    <th>Nama</th>
                    <th>id</th>
                    <th>jumlah</th>
                    <th>harga</th>
                    <th>stok</th>
                </tr>
                <tr>
                    <td>esspresso</td>
                    <td>21</td>
                    <td>45</td>
                    <td>RP 45.000</td>
                    <td>69</td>
                </tr>
                <tr>
                    <td>esspresso</td>
                    <td>21</td>
                    <td>45</td>
                    <td>RP 45.000</td>
                    <td>69</td>
                </tr>
                <tr>
                    <td>esspresso</td>
                    <td>21</td>
                    <td>45</td>
                    <td>RP 45.000</td>
                    <td>69</td>
                </tr>
                <tr>
                    <td>esspresso</td>
                    <td>21</td>
                    <td>45</td>
                    <td>RP 45.000</td>
                    <td>69</td>
                </tr>
                <tr>
                    <td>esspresso</td>
                    <td>21</td>
                    <td>45</td>
                    <td>RP 45.000</td>
                    <td>69</td>
                </tr>
                <tr>
                    <td>esspresso</td>
                    <td>21</td>
                    <td>45</td>
                    <td>RP 45.000</td>
                    <td>69</td>
                </tr>
                <tr>
                    <td>esspresso</td>
                    <td>21</td>
                    <td>45</td>
                    <td>RP 45.000</td>
                    <td>69</td>
                </tr>
                <tr>
                    <td>esspresso</td>
                    <td>21</td>
                    <td>45</td>
                    <td>RP 45.000</td>
                    <td>69</td>
                </tr>
                <tr>
                    <td>esspresso</td>
                    <td>21</td>
                    <td>45</td>
                    <td>RP 45.000</td>
                    <td>69</td>
                </tr>
                <tr>
                    <td>esspresso</td>
                    <td>21</td>
                    <td>45</td>
                    <td>RP 45.000</td>
                    <td>69</td>
                </tr>
                <tr>
                    <td>esspresso</td>
                    <td>21</td>
                    <td>45</td>
                    <td>RP 45.000</td>
                    <td>69</td>
                </tr>
                <tr>
                    <td>esspresso</td>
                    <td>21</td>
                    <td>45</td>
                    <td>RP 45.000</td>
                    <td>69</td>
                </tr>
                <tr>
                    <td>esspresso</td>
                    <td>21</td>
                    <td>45</td>
                    <td>RP 45.000</td>
                    <td>69</td>
                </tr>
        </table>
        <div class="edit">
            <input type="button" value="edit">
        </div>
    </div>
</body>
</html>