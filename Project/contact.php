<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinoyo Ceramic Navbar</title>
    <link rel="stylesheet" href="/asset/css/contact.css">
</head>
<body>
        <nav class="navbar">
            <div class="container">
                <div class="logo-container">
                    <a href="/home.php"> <img src="/asset/img/logo.png" alt="Dinoyo Ceramic Logo" class="logo"> </a> 
                </div>
                <ul class="nav-links" id="nav-links">
                    <li><a href="/information.php">Information</a></li>
                    <li><a href="/gallery.php">Gallery</a></li>
                    <li><a href="/booking.php">Booking</a></li>
                    <li><a href="/testimoni.php">Testimoni</a></li>
                    <li><a href="/vtour.php">Vtour</a></li>
                    <li><a href="/contact.php" class="active">Contact</a></li>
                </ul>
                <div class="auth-buttons">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <p class="sign-in">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
                    <a href="/Login CAD/logout.php" class="sign-out">Logout</a>
                <?php else: ?>
                    <a href="/Login CAD/login.php" class="sign-in">Sign in</a>
                    <a href="/Login CAD/register.php" class="register">Register</a>
                <?php endif; ?>
            </div>
            </div>
        </nav>
    <main>
        <section class="information-section">
            <div class="container-contact">
            <!-- Logo dan Informasi -->
            <div class="info-section">
                <div class="logo">
                        <img src="asset/img/logo.png" alt="">
                </div>
                <div class="address">
                    <p>Kampung Wisata Keramik Dinoyo<br>
                    MT Haryono 9, Malang, Jawa Timur, Indonesia</p>
                </div>
                <div class="contact">
                    <p>GET IN TOUCH</p>
                    <p><i class="fa fa-instagram"></i> @dinoyoceramic</p>
                    <p><i class="fa fa-phone"></i> +62 812-3553-1979</p>
                    <p><i class="fa fa-envelope"></i> @ceramicartdinoyo-2024</p>
                </div>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="information.php">Informasi</a></li> <br>
                    <li><a href="booking.php">Booking</a></li><br>
                    <li><a href="chatbot.php">Chatbot</a></li><br>
                    <li><a href="Produk.php">Produk</a></li><br>
                    <li><a href="testimoni.php">Testimoni</a></li><br>
                </ul>
            </div>

            <!-- Peta Lokasi -->
            <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.5515839161417!2d112.60911577455641!3d-7.9418102791050815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827327aa4fd3%3A0x5a49804dcae940ba!2sKampung%20Wisata%20Keramik%20Dinoyo!5e0!3m2!1sid!2sid!4v1731076463739!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        </section>
    </main>
</body>
</html>
