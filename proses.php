<?php
    include 'koneksi.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == 'add'){
            $username = $_POST['usn'];
            $password = $_POST['pw'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $role = $_POST['role'];

            $query_insert = "INSERT INTO tb_akun (id, username, password, nama, email, role) VALUES(null, '$username', '$password', '$nama', '$email', '$role')";
            $sql = mysqli_query($db, $query_insert);

            if($sql) {
                header("location:akun.php");
            } else {
                echo "gagal";
            }
        }  else if($_POST["aksi"] == 'edit'){
            $id = $_POST['id'];
            $username = $_POST['usn'];
            $password = $_POST['pw'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $role = $_POST['role'];

            $query = "UPDATE tb_akun SET usn = '$username', pw = '$password', nama = '$nama', email = '$email', role = '$role' WHERE id='$id';";
            $result = mysqli_query($conn, $query);
        }
    }

    if (isset($_GET["hapus"])) {
        if(isset($_GET["hapus"])){
            $id = $_GET["hapus"];
            $query = "DELETE FROM tb_akun WHERE id = '$id' ";
            $sql = mysqli_query($db, $query);

            if($sql) {
                header("location:akun.php");
            } else {
                echo "gagal";
            }
        }
    }
?>