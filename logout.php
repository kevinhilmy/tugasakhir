<?php
session_start(); // Mulai session jika belum
session_unset(); // Hapus semua variabel session
session_destroy(); // Hancurkan session

// Redirect ke halaman login
header("Location: index.php");
exit;
?>