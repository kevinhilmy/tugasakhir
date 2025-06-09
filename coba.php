<?php
include 'koneksi.php';

$nama = $username = $password = $email = $role = "";
$edit = false;

// Ambil data akun jika URL memiliki ?ubah=
if (isset($_GET['ubah'])) {
    $id = $_GET['ubah'];
    $edit = true;
    $query = "SELECT * FROM tb_akun WHERE id = '$id'";
    $result = mysqli_query($db, $query);
    $data = mysqli_fetch_assoc($result);
    $nama = $data['nama'];
    $username = $data['username'];
    $password = $data['password'];
    $email = $data['email'];
    $role = $data['role'];
}

// Simpan perubahan
if (isset($_POST['simpan'])) {
    $id = $_POST['id'] ?? '';
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    if ($edit) {
        // UPDATE akun
        $query = "UPDATE tb_akun SET 
                    nama = '$nama', 
                    username = '$username', 
                    password = '$password', 
                    email = '$email', 
                    role = '$role' 
                  WHERE id = '$id'";
    } else {
        // INSERT akun baru
        $query = "INSERT INTO tb_akun (nama, username, password, email, role) 
                  VALUES ('$nama', '$username', '$password', '$email', '$role')";
    }

    mysqli_query($db, $query);
    header("Location: kelola.php"); // kembali ke halaman kelola
}

// Ambil semua data akun
$akun = [];
$query = "SELECT * FROM tb_akun";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $akun[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Akun</title>
</head>
<body>
    <h2><?= $edit ? 'Edit' : 'Tambah' ?> Akun</h2>
    <form method="post">
        <?php if ($edit): ?>
            <input type="hidden" name="id" value="<?= $id ?>">
        <?php endif; ?>
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?= $nama ?>"><br>
        <label>Username:</label><br>
        <input type="text" name="username" value="<?= $username ?>"><br>
        <label>Password:</label><br>
        <input type="text" name="password" value="<?= $password ?>"><br>
        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $email ?>"><br>
        <label>Role:</label><br>
        <select name="role">
            <option value="admin" <?= $role == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="kasir" <?= $role == 'kasir' ? 'selected' : '' ?>>Kasir</option>
        </select><br><br>
        <button type="submit" name="simpan"><?= $edit ? 'Update' : 'Simpan' ?></button>
    </form>

    <h2>Daftar Akun</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($akun as $i => $a): ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= htmlspecialchars($a['nama']) ?></td>
            <td><?= htmlspecialchars($a['username']) ?></td>
            <td><?= htmlspecialchars($a['email']) ?></td>
            <td><?= htmlspecialchars($a['role']) ?></td>
            <td>
                <a href="?ubah=<?= $a['id'] ?>">Edit</a>
                <a href="proses.php?hapus=<?= $a['id'] ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
