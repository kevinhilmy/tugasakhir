<?php
$db = mysqli_connect("localhost", "root", "", "db_kasir");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
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
