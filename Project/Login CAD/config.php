<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cad";

// Membuat koneksi database
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
