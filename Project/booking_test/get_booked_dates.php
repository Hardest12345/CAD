<?php
// Koneksi ke database
$host = 'localhost';
$dbname = 'cad'; // Ganti dengan nama database Anda
$username = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Mendapatkan bulan dari parameter GET
if (isset($_GET['month'])) {
    $month = $_GET['month']; // format: YYYY-MM

    // Validasi format bulan
    if (preg_match('/^\d{4}-\d{2}$/', $month)) {
        $sql = "SELECT tanggal_pemesanan FROM bookings WHERE tanggal_pemesanan LIKE :month";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':month' => "$month%"]);
        $bookedDates = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Mengembalikan tanggal-tanggal yang telah dipesan dalam format JSON
        echo json_encode($bookedDates);
    } else {
        echo json_encode(["error" => "Format bulan tidak valid."]);
    }
} else {
    echo json_encode(["error" => "Parameter bulan tidak ditemukan."]);
}

?>
