<?php
// Konfigurasi Database
$host = 'localhost';
$dbname = 'cad';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Ambil data dari form
$nama = $_POST['nama'];
$nomor_handphone = $_POST['nomor_handphone'];
$email = $_POST['email'];
$jenis_paket = $_POST['jenis_paket'];
$tanggal_pemesanan = $_POST['tanggal_pemesanan'];
$waktu_pemesanan = $_POST['waktu_pemesanan'];


// Simpan ke database
$sql = "INSERT INTO bookings (nama, nomor_handphone, email, jenis_paket, tanggal_pemesanan, waktu_pemesanan) 
        VALUES (:nama, :nomor_handphone, :email, :jenis_paket, :tanggal_pemesanan, :waktu_pemesanan)";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':nama' => $nama,
    ':nomor_handphone' => $nomor_handphone,
    ':email' => $email,
    ':jenis_paket' => $jenis_paket,
    ':tanggal_pemesanan' => $tanggal_pemesanan,
    ':waktu_pemesanan' => $waktu_pemesanan,
]);

// Dapatkan ID booking yang baru saja dibuat
$booking_id = $conn->lastInsertId();

// Redirect ke halaman E-invoice
header("Location: invoice.php?id=$booking_id");
exit;
?>
