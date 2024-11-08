<?php
// Database Configuration
$host = 'localhost';
$dbname = 'cad';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Get ID from URL
$booking_id = $_GET['id'] ?? null;

if (!$booking_id) {
    die("Booking ID not provided.");
}

// Fetch booking data from database
$sql = "SELECT * FROM bookings WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $booking_id]);
$booking = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$booking) {
    die("Booking not found.");
}

// Define packages and rates based on jenis_paket
if ($booking['jenis_paket'] == 'Paket A') {
    $jenis_paket = 'Paket A';
} else {
    $jenis_paket = 'Paket B';
}

// Definisikan data paket
$all_packages = [
    'Paket A' => ['name' => 'Paket A', 'rate' => 3000.00],
    'Paket B' => ['name' => 'Paket B', 'rate' => 1500.00]
];

// Pilih paket berdasarkan input, atau fallback ke Paket B jika tidak sesuai
$selected_package = isset($all_packages[$jenis_paket]) ? $all_packages[$jenis_paket] : $all_packages['Paket B'];

// Inisialisasi subtotal dan items
$subtotal = 0;
$items = [];

// Tambahkan paket ke items untuk perhitungan
$quantity = 1; // Contoh kuantitas, sesuaikan sesuai kebutuhan
$rate = $selected_package['rate'];
$amount = $quantity * $rate;
$subtotal += $amount;
$items[] = [
    'name' => $selected_package['name'],
    'quantity' => $quantity,
    'rate' => $rate,
    'amount' => $amount
];

// Perhitungan pajak dan total
$tax = $subtotal * 0.10;
$total = $subtotal + $tax;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            font-size:  10px;
        }
        .invoice-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header{
            background-color: #333333;
            color: #fff;
            padding: 20px;
            text-align: right;
            display: flex;
            justify-content: space-between;
        }
        .header h2 {
            margin: 0;
        }
        .header p {
            margin: 5px 0;
        }
        .header img{
            width: 170px;
        }
        .section {
            padding: 0px;
        }
        .section h4 {
            margin: 0 0 10px;
            font-weight: normal;
        }
        .details, .total-due {
            margin-top: 20px;
            padding: 10px;
            /* background: #f9f9f9; */
            border-radius: 4px;
            font-size: 0.7rem;
        }
        .details-2{
            padding: 10px 50px 0px 10px;
            margin: 5px 0;
            display: flex;
            justify-content: space-between;
            background-color: whitesmoke;
            border-radius: 20px 20px 0px 0px;
            font-size: 1.2em;
        }
        table{
            border-radius: 50px;
        }
        /* #details-id{
            align-items: center;
            width: 50%;
        } */
      
        .details p, .total-due p, .payment-details p {
            margin: 5px 0;
        }
        .all-table{
            display: flex;
        }
        .items {
            display: flex; /* Pastikan menggunakan flexbox untuk layout */
            flex-direction: column; /* Mengatur arah layout menjadi kolom */
            width: 100%; /* Memastikan elemen pembungkus mengisi lebar penuh */
            font-size: 1.2em;
        }

        .items table {
            width: 100%; /* Tabel harus mengambil lebar penuh dari elemen pembungkus */
            border-collapse: collapse; /* Gabungkan border tabel */
            border-radius: 0px 0px 0px 20px; /* Terapkan border radius */
            overflow: hidden; /* Mencegah overflow */
            box-sizing: border-box; /* Menghitung padding dan border dalam lebar */
        }

        .items th, .items td {
            padding: 20px; /* Padding untuk sel tabel */
            text-align: left; /* Rata kiri untuk teks */
            border-bottom: 1px solid #ddd; /* Border bawah untuk baris */
        }

        .items th {
            background-color: #f2f2f2; /* Warna latar belakang untuk header */
        }

        
        .total-table {
            display: flex;
            justify-content: flex-end; /* Align the entire table to the right */
            border-radius: 0px 0px 20px 20px; /* Apply the border radius */
            overflow: hidden;
        }

        .total-table table {
            width: auto; /* Adjust table width if needed */
            border-collapse: collapse;
            text-align: left; /* Align text within the table cells to the right */

        }
        .total-table th, .total-table td {
            padding: 20px;
            border-bottom: 1px solid #ddd;
            background-color: #f2f2f2;
        }

        .total-table th {
            background-color: #f2f2f2;
        }

        .total p {
            font-size: 1.2em;
        }
        .total{
            font-size: 1.2em;
            color: #333;
        }
        .total-due td {
            font-weight: bold; /* Make all cells in total-due bold */
        }

        .total-due td:first-child {
            text-align: left; /* Align the first cell to the right */
        }

        .total-due td:last-child {
            color: #333; /* Set the color for the total amount */
        }
        .clossing{
            display: flex;
            margin-bottom: 10px; 
        }

        .payment-details{
            margin-top: 30px;
            width: 30%;
            margin-left: auto;
            padding: 10px;
            border-radius: 20px;
            font-size: 0.7rem;
            background-color:  #f2f2f2;
        }
        .footer {
            margin-top: 50px;
            color: black;
            padding: 20px;
            text-align: left;
            position: relative;
        }
        .footer-bkg{
            background-image: url('/asset/img/background-invoice.png') !important;
            background-repeat: no-repeat;
            /* background-position: bottom center; Position at the bottom center */
            background-size: cover;
            height: 170px;
        }
    
    </style>
</head>
<body>

<div class="invoice-container">
    <div class="header">
        <div>
            <img src="/asset/img/logo.png" alt="">
        </div>
        <div>
            <p>Jl. Mt Haryono 9 No.336, Dinoyo, <br> Kec. Lowokwaru, Kota Malang, <br>Jawa Timur 65144</p>
        </div>
    </div>
    <div class="section">
        <div class="details">
            <p><strong>Billed to:</strong></p>
            <p><?= htmlspecialchars($booking['nama']) ?></p>
            <p><?= htmlspecialchars($booking['email']) ?></p>
            <p><?= htmlspecialchars($booking['nomor_handphone']) ?></p>
        </div>

        <div class="details-2">
            <div id="details-id">
                <p><strong>Tanggal Pemesanan:</strong><br> <?= htmlspecialchars($booking['tanggal_pemesanan']) ?></p>
            </div>
            <div >
                <p><strong>Waktu Pemesanan:</strong> <br>#<?= htmlspecialchars($booking['waktu_pemesanan']) ?></p>
            </div>
            <div >
                <p><strong>ID Pemesanan:</strong> <br>#<?= htmlspecialchars($booking['id']) ?></p>
            </div>
        </div>
    </div>
    <div class="all-table">
        <div class="section items">
            <table>
                <tr>
                    <th>Jenis Paket</th>
                </tr>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                    </tr>
                    <?php endforeach; ?>
            </table>
        </div>
        
        <div class="section total">
            <div class="total-table">
                <table>
                    <tr>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td><?= htmlspecialchars($item['quantity']) ?></td>
                    <td>$<?= number_format($item['rate'], 2) ?></td>
                    <td>$<?= number_format($item['amount'], 2) ?></td>
                </tr>
                <tr>
                    <td>Subtotal </td>
                    <td></td>
                    <td>$<?= number_format($subtotal, 2) ?></td>
                </tr>
                <tr>
                    <td>Tax(10%)</td>
                    <td></td>
                    <td>$<?= number_format($tax, 2) ?></td>
                </tr>
                <tr class="total-due">
                    <td>Total </td>
                    <td></td>
                    <td>$<?= ucwords(number_format($total, 2, '.', ' ')) ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div>
    </div>
    </div>
    <div class="clossing">
        <div class="footer">
            <h2>Thank you for the business!</h2>
            <p>Please pay within 15 days of receiving this invoice.</p>
        </div>
        <div class="section payment-details">
            <p><strong>Payment details:</strong></p>
            <p>ABCD BANK</p>
            <p>SWIFT: ABCDUSXXX</p>
            <p>Acct. #: 374746893200001</p>
            <hr>
            <p>+91 0000000000 | dsadsa@gmail.com</p>
        </div>
    
    </div>
    <div class="footer-bkg">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</div>

</body>
</html>