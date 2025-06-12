<?php
session_start();
include 'koneksi.php';
//ambil data akun untuk diubah
$data = [];
// Cek apakah ada parameter 'ubah' di URL
// Jika ada, ambil data akun berdasarkan ID
// Jika tidak, tampilkan form untuk menambahkan akun baru
if (isset($_GET['ubah'])) {
    $id = $_GET['ubah'];
    $query = "SELECT * FROM tb_produk WHERE id_produk = '$id'";
    $result = mysqli_query($db, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    // Jika tidak ada parameter 'ubah', tampilkan form untuk menambahkan akun baru
    $data = [
        'id_produk' => '',
        'nama_produk' => '',
        'foto' => '',
        'harga_produk' => '',
        'stok_produk' => ''
    ];
}
// Cek apakah ada aksi yang dilakukan
if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == 'add') {
        $nama = $_POST['nama'];
        $foto = $_POST['foto'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $query_insert = "INSERT INTO tb_produk (id_produk, nama_produk, foto, harga_produk, stok_produk) VALUES(null, '$nama', '$foto', '$harga', '$stok')";
        $sql = mysqli_query($db, $query_insert);

        if ($sql) {
            header("location:stok.php");
        } else {
            echo "Gagal menambahkan data.";
        }
    } elseif ($_POST["aksi"] == 'edit') {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $foto = $_POST['foto'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $query = "UPDATE tb_produk SET nama_produk = '$nama', foto = '$foto', harga_produk = '$harga', stok_produk = '$stok' WHERE id_produk='$id'";
        $result = mysqli_query($db, $query);

        if ($result) {
            header("location:stok.php");
        } else {
            echo "Gagal mengubah data.";
        }
    }
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
            display: flex;
            justify-content: space-between;
            padding: 15px;
            background-color: #a05c26;
        }

        .logo a{
            display: flex;
            flex-direction: row;
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

        .sidepanel h1{
            color: #fff;
            padding-left: 15px;
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

        .isi {
            margin: 30px;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
        }

        table {
            display: flex;
            justify-content: center;
        }

        .aksi button {
            border-radius: 10px;
            border: transparent;
            padding: 5px;
        }

        label{
            padding-right: 10px;
        }

        .box input {
            padding: 0px 40px 10px 0px;
        }
    </style>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <a href="menu.php">
                <img src="./Images/logo.png" alt="logo">
                <p>BeanPOS</p>
            </a>
        </div>
        <div id="mySidepanel" class="sidepanel">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <h1><?php echo $_SESSION['username']; ?></h1>
            <a href="menu.php">Menu</a>
            <a href="history.php">History</a>
            <a href="cart.php">Cart</a>
        </div>

        <button class="openbtn" onclick="openNav()">&#9776;</button>
    </div>
    <div class="isi">
        <div class="box">
            <h1>Edit Stok</h1>
            <!-- // Form untuk menambahkan atau mengedit data akun -->
            <form action="" method="post">
                <table>
                    <tr>
                        <td><label for="nama">Nama Produk</label></td>
                        <td><input type="text" name="nama" id="nama" value="<?php echo $data['nama_produk']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="foto">Foto</label></td>
                        <td><input type="text" name="foto" id="foto" value="<?php echo $data['foto']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="harga">Harga</label></td>
                        <td><input type="int" name="harga" id="harga" value="<?php echo $data['harga_produk']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="stok">Stok</label></td>
                        <td><input type="int" name="stok" id="stok" value="<?php echo $data['stok_produk']; ?>" required></td>
                    </tr>
                </table>
                <input type="hidden" name="id" value="<?php echo $data['id_produk']; ?>">
                <input type="hidden" name="aksi" value="<?php echo isset($_GET['ubah']) ? 'edit' : 'add'; ?>">
        </div>
        <div class="aksi">
            <?php
            if (isset($_GET['ubah'])) {
            ?>
                <button type="submit" name="aksi" value="edit">Edit Perubahan</button>
            <?php
            } else {
            ?>
                <button type="submit" name="aksi" value="add">Tambahkan Produk</button>
            <?php
            }
            ?>
            <a href="stok.php">
                <?php
                if (isset($_GET['ubah'])) {
                    echo "<button type='button'>Batal</button>";
                } else {
                    echo "<button type='button'>Kembali</button>";
                }
                ?>
            </a>
        </div>
        </form>
    </div>
</body>

</html>