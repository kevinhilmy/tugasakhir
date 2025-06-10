<?php
include 'koneksi.php';
//ambil data akun untuk diubah
$data = [];
// Cek apakah ada parameter 'ubah' di URL
// Jika ada, ambil data akun berdasarkan ID
// Jika tidak, tampilkan form untuk menambahkan akun baru
if (isset($_GET['ubah'])) {
    $id = $_GET['ubah'];
    $query = "SELECT * FROM tb_akun WHERE id = '$id'";
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
        'id' => '',
        'username' => '',
        'password' => '',
        'nama' => '',
        'email' => '',
        'role' => ''
    ];
}
// Cek apakah ada aksi yang dilakukan
if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == 'add') {
        $username = $_POST['usn'];
        $password = $_POST['pw'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        $query_insert = "INSERT INTO tb_akun (id, username, password, nama, email, role) VALUES(null, '$username', '$password', '$nama', '$email', '$role')";
        $sql = mysqli_query($db, $query_insert);

        if ($sql) {
            header("location:akun.php");
        } else {
            echo "Gagal menambahkan data.";
        }
    } elseif ($_POST["aksi"] == 'edit') {
        $id = $_POST['id'];
        $username = $_POST['usn'];
        $password = $_POST['pw'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        $query = "UPDATE tb_akun SET username = '$username', password = '$password', nama = '$nama', email = '$email', role = '$role' WHERE id='$id'";
        $result = mysqli_query($db, $query);

        if ($result) {
            header("location:akun.php");
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

        .logo {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .logo a {
            text-decoration: none;
            color: #111;
        }

        a img {
            width: 50px;
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
        <div class="box">
            <?php
            // Cek apakah ada parameter 'ubah' di URL. Jika ada, tampilkan judul untuk mengedit data, tampilkan form untuk mengedit data dengan data yang sudah ada
            if (isset($_GET['ubah'])) {
                echo "<h1>Edit Data Akun</h1>";
            } else {
                echo "<h1>Tambah Data Akun</h1>";
            }
            ?>
            <!-- // Form untuk menambahkan atau mengedit data akun -->
            <form action="" method="post">
                <table>
                    <tr>
                        <td><label for="usn">Username</label></td>
                        <td><input type="text" name="usn" id="usn" value="<?php echo $data['username']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="pw">Password</label></td>
                        <td><input type="password" name="pw" id="pw" value="<?php echo $data['password']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="nama">Nama</label></td>
                        <td><input type="text" name="nama" id="nama" value="<?php echo $data['nama']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" name="email" id="email" value="<?php echo $data['email']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="role">Role</label></td>
                        <td><select name="role" id="role">
                                <option value="" disabled selected>Pilih Role</option>
                                <option value="admin" <?php if ($data['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                                <option value="kasir" <?php if ($data['role'] == 'kasir') echo 'selected'; ?>>Kasir</option>
                            </select></td>
                    </tr>
                </table>
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
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
                <button type="submit" name="aksi" value="add">Tambahkan Akun</button>
            <?php
            }
            ?>
            <a href="akun.php">
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