<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page - Ceramic Art Dinoyo</title>
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    color: #ffffff;
}

.container {
    background: url('asset/img/backgroudn-contact.jpg') no-repeat center center fixed;
    display: flex;
    gap: 50px;
    padding: 20px;
    background-repeat: no-repeat;
    background-size: cover; 
    height: 700px;
    margin-bottom: auto;
    justify-content: space-around;
    align-items: center;
}

.info-section {
    max-width: 40%;
}

.logo{
}
.logo h1 {
    font-size: 2em;
    font-weight: bold;
}

.logo p {
    font-size: 1em;
    font-style: italic;
}

.address, .contact {
    margin: 10px 0;
}

.contact p {
    margin: 5px 0;
}

.menu {
    display: flex;
    flex-direction: column;
    margin-right: 50px;
}

.menu ul {
    list-style-type: none;
}

.menu li {
    font-size: 1.2em;
    cursor: pointer;
    transition: color 0.3s;
    justify-items: center;
}

.menu li:hover {
    color: #d3d3d3;
}

.logo img{
   width: 220px;

}

.map {
    max-width: 30%;
}

.map img {
    width: 100%;
    border: 2px solid #ffffff;
}

</style>
<body>
    <div class="container">
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

        <!-- Menu Navigasi -->
        <div class="menu">
            <ul>
                <li>Informasi</li> <br>
                <li>Booking</li><br>
                <li>Chatbot</li><br>
                <li>Produk</li><br>
                <li>Testimoni</li><br>
            </ul>
        </div>

        <!-- Peta Lokasi -->
        <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.5515839161417!2d112.60911577455641!3d-7.9418102791050815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827327aa4fd3%3A0x5a49804dcae940ba!2sKampung%20Wisata%20Keramik%20Dinoyo!5e0!3m2!1sid!2sid!4v1731076463739!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</body>
</html>
