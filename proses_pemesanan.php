<?php
session_start();
include 'koneksi.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $total_harga = (int)$_POST['total'];
    $bayar = (int)$_POST['bayar'];

    if ($bayar < $total_harga) {
        echo "<script>alert('Uang yang dibayarkan kurang!'); window.history.back();</script>";
        exit;
    }

    $kembali = $bayar - $total_harga;
    $total_produk = 0;

    foreach ($_SESSION['keranjang'] as $item) {
        $total_produk += $item['jumlah'];
    }

    $id_akun = 1; // Ganti dengan $_SESSION['id_akun'] jika login sudah aktif
    $tanggal = date('Y-m-d H:i:s');

    // Simpan ke tb_pemesanan
    $query = "INSERT INTO tb_pemesanan (id_akun, tanggal, total_produk, total_harga, bayar, kembali)
              VALUES ('$id_akun', '$tanggal', '$total_produk', '$total_harga', '$bayar', '$kembali')";
    if (mysqli_query($db, $query)) {
        $id_pesanan = mysqli_insert_id($db);

        // Simpan ke detail_pesanan
        foreach ($_SESSION['keranjang'] as $item) {
            $id_produk = $item['id_produk'];
            $jumlah = $item['jumlah'];
            $harga = $item['harga_produk'];
            $subtotal = $harga * $jumlah;

            $query_detail = "INSERT INTO detail_pesanan (id_pesanan, id_produk, jumlah, subtotal)
                             VALUES ('$id_pesanan', '$id_produk', '$jumlah', '$subtotal')";
            mysqli_query($db, $query_detail);
        }

        // Simpan info pembayaran untuk halaman hasil_transaksi
        $_SESSION['kembalian'] = $kembali;
        $_SESSION['total'] = $total_harga;
        $_SESSION['bayar'] = $bayar;

        // Kosongkan keranjang
        $_SESSION['keranjang'] = [];

        // Arahkan ke halaman hasil transaksi
        header("Location: hasil_transaksi.php");
        exit;
    } else {
        echo "Gagal menyimpan pemesanan: " . mysqli_error($db);
    }
}
?>
