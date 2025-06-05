<?php
    $db = mysqli_connect("localhost","root","","db_kasir");
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
?>