<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'] ?? null;
    $email = $_POST['email'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;

    if ($full_name && $email && $phone && $password) {
        // Query menggunakan prepared statement untuk menghindari SQL injection
        $sql = "INSERT INTO users (full_name, email, phone, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $full_name, $email, $phone, $password);

        if ($stmt->execute()) {
            echo "Registrasi berhasil!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Data tidak lengkap!";
    }

    $conn->close();
}
?>
