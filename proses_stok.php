<?php
    session_start();
    include 'koneksi.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == 'add'){
            $nama = $_POST['nama'];
            $foto = $_POST['foto'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            $query_insert = "INSERT INTO tb_akun (id_produk, nama_produk, foto, harga_produk, stok_produk) VALUES(null, '$nama', '$foto', '$harga', '$stok')";
            $sql = mysqli_query($db, $query_insert);

            if($sql) {
                header("location:akun.php");
            } else {
                echo "gagal";
            }
        }  else if($_POST["aksi"] == 'edit'){
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $foto = $_POST['foto'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            $query = "UPDATE tb_akun SET nama_produk = '$nama', foto = '$foto', harga_produk = '$harga', stok_produk = '$stok', WHERE id_produk ='$id';";
            $result = mysqli_query($db, $query);
        }
    }

    if (isset($_GET["hapus"])) {
        if(isset($_GET["hapus"])){
            $id = $_GET["hapus"];
            $query = "DELETE FROM tb_produk WHERE id_produk = '$id' ";
            $sql = mysqli_query($db, $query);

            if($sql) {
                header("location:stok.php");
            } else {
                echo "gagal";
            }
        }
    }
?>