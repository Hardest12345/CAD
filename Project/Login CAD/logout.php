<?php
session_start();
session_unset(); // Menghapus semua session
session_destroy(); // Menghancurkan session
header("Location: ../home.php"); // Alihkan ke halaman login setelah logout
exit();
?>