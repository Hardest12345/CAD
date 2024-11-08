<?php
session_start();
require 'config.php'; // Menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Query untuk mengambil data pengguna berdasarkan email menggunakan prepared statement
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Ambil data pengguna
        $user = $result->fetch_assoc();

        // Verifikasi password yang diinput dengan hash di database
        if (password_verify($password, $user['password'])) {
            // Jika login berhasil, simpan informasi pengguna di session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['full_name'];

            // Arahkan pengguna ke halaman utama
            $_SESSION['logged_in'] = true;

            header("Location: ../home.php");
            exit;
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Email tidak ditemukan!";
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>
