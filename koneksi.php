<?php
$db = mysqli_connect("localhost", "root", "", "db_kasir");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// ambil seluruh data dari tabel admin 
function pilih($tabel, $kondisi = null)
{
    global $db;
    $query = "SELECT * FROM $tabel";
    if ($kondisi) {
        $query .= " WHERE $kondisi";
    }
    return mysqli_query($db, $query);
}
