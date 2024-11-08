<?php
// Fetch booking details if needed
$booking_id = $_GET['id'] ?? null;
$phone_number = "08992134123"; // Set the number dynamically if needed

if (!$booking_id) {
    echo "Booking ID is missing.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        /* Basic styling */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Booking Confirmation</h2>
    <p>Thank you for your booking. Here are your options:</p>
    
    <!-- Button to view E-invoice -->
    <a href="invoice.php?id=<?= $booking_id ?>" class="btn">View E-invoice</a>

    <!-- Button to download invoice (modify URL to download link) -->
    <a href="download_invoice.php?id=<?= $booking_id ?>" class="btn">Download Invoice</a>

    <!-- Button to contact via WhatsApp -->
    <a href="https://wa.me/<?= $phone_number ?>" target="_blank" class="btn">Contact via WhatsApp</a>
</body>
</html>
