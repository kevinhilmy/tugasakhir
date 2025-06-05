<?php

include 'koneksi.php';

//panggil fungsi getAllAkun 
$akun = getAllAkun();
// tampilkan data akun
foreach ($akun as $a) {
    echo "ID: " . $a['id'] . "<br>";
    echo "Username: " . $a['username'] . "<br>";
    echo "Password: " . $a['password'] . "<br>";
    echo "Nama: " . $a['nama'] . "<br><br>";
}
