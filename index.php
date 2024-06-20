<?php
session_start();
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
            background-color: #f0f0f0; /* Warna latar belakang normal */
        }

        .container {
            width: 90%;
            margin: 0 auto;
        }

        header {
            background: #339966;
            color: white;
            padding: 1rem 0;
        }

        .full-width-image {
            width: 100%;
            text-align: center; /* Untuk memastikan gambar berada di tengah */
        }

        .full-width-image img {
            width: 100%; /* Gambar akan mengambil lebar maksimal dari parentnya */
            height: auto; /* Memastikan proporsi gambar tetap terjaga */
            display: block; /* Memastikan gambar tetap di tengah vertikal jika dibutuhkan */
            max-width: 100%; /* Mencegah gambar melampaui lebar aslinya */
        }

        header h1 {
            margin: 0;
            text-align: right;
            padding-right: 10px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            text-align: right;
            display: flex;
            justify-content: flex-end;
            margin: 0;
        }

        nav ul li {
            margin: 0;
            position: relative;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 0 15px;
            display: inline-block;
            cursor: pointer;
        }

        nav ul li:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            height: 20px;
            width: 1px;
            background-color: white;
        }

        .content {
            padding: 2rem 0;
        }

        .help-content {
            display: flex;
            flex-wrap: wrap;
            padding: 2rem 0;
        }

        .left, .right {
            flex: 1;
            min-width: 300px;
            padding: 1rem;
        }

        .left {
            text-align: left;
        }

        .left h2 {
            margin-top: 0;
        }

        .left p {
            font-size: 1rem;
        }

        .left img, .right img {
            width: 30px;
            vertical-align: middle;
            margin-right: 10px;
        }

        .social-media {
            display: flex;
            gap: 15px;
        }

        .contact-info {
            margin-top: 1rem;
        }

        .contact-info p {
            margin: 0.5rem 0;
            display: flex;
            align-items: center;
        }

        .right {
            text-align: left;
        }

        .map {
            text-align: center;
            margin-bottom: 1rem;
        }

        .map img {
            max-width: 100%;
            height: auto;
            width: 80%; /* Memastikan gambar map memenuhi lebar parent */
            max-height: 300px; /* Atur tinggi maksimal sesuai kebutuhan */
        }

        .address p {
            display: flex;
            align-items: center;
            margin: 0.5rem 0;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Set minimum tinggi body sebesar tinggi layar (viewport) */
        }

        main {
            flex: 1; /* Membuat main mengisi ruang yang tersedia */
        }

        footer {
            background: #339966;
            color: white;
            text-align: center;
            padding: 1rem 0;
        }

        footer p {
            margin: 0;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            padding-top: 60px;
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            animation: modalopen 0.5s;
        }

        @keyframes modalopen {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        .hero {
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #339966;
            opacity: 0.5; /* Opacity 50% */
        }

        .hero img {
            width: 100%;
            height: auto;
            display: block;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover, .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .form-group button {
            background: #339966;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        .form-group button:hover {
            background: #28794d;
        }

        .register-link {
            color: blue;
            cursor: pointer;
        }

        .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            z-index: 1; /* Agar teks tetap di atas overlay */
        }

        .hero-text h2 {
            font-size: 2.5rem; /* Atur ukuran font sesuai keinginan */
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5); /* Efek bayangan teks */
            cursor: pointer; /* Ubah kursor saat hover */
        }

    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#help">Help</a></li>
                    <li><a id="loginBtn">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section class="hero" id="home">
            <div class="full-width-image">
                <img src="img/contoh.jpg" alt="contoh">
                <div class="hero-text">
                    <h2>Reservasi Sekarang >>></h2>
                </div>
            </div>
        </section>
        <section class="content" id="help">
            <div class="container">
                <div class="help-content">
                    <div class="left">
                        <h2>Ruang Diskusi</h2>
                        <p>UPT Perpustakaan UPN Veteran Jakarta merupakan Unit Pelaksanaan Teknis di bidang perpustakaan yang mempunyai tugas melaksanakan pemberian layanan kepustakaan.</p>
                        <div class="social-media">
                            <img src="img/instagram.jpg" alt="Instagram">
                            <img src="img/facebook.jpg" alt="Facebook">
                            <img src="img/youtube.jpg" alt="YouTube">
                        </div>
                        <div class="contact-info">
                            <h3>Narahubung</h3>
                            <p><img src="img/whatsapp.jpg" alt="WhatsApp"> 08XXXXXXXXXX</p>
                            <p><img src="img/whatsapp.jpg" alt="WhatsApp"> 08XXXXXXXXXX</p>
                            <p><img src="img/whatsapp.jpg" alt="WhatsApp"> 08XXXXXXXXXX</p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="map">
                            <h2>Lokasi</h2>
                            <img src="img/lokasi.jpg" alt="Google Map">
                        </div>
                        <div class="address">
                            <h3>Alamat</h3>
                            <p><img src="img/logolokasi.jpg" alt="Location"> Kampus UPN “veteran” Jakarta Gedung DR. Soetomo Lt. 3 dan Lt. 4 Jl. R.S. Fatmawati Pondok Labu - Jakarta Selatan 12450</p>
                            <p><img src="img/telepon.jpg" alt="Phone"> 021 - 75902835</p>
                            <p><img src="img/email.jpg" alt="Email"> library@upnvj.ac.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <p>Copyright &copy; 2024 UPN Veteran Jakarta.</p>
        </div>
    </footer>

    <!-- Login Modal -->
    <div  id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeLogin">&times;</span>
            <h2>Login</h2>
            <form method="post" action="login.php">
                <div class="form-group">
                    <label for="nim">NIM:</label>
                    <input type="text" id="nim" name="nim" placeholder="NIM" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
            </form>
            <p>Don't have an account? <a class="register-link" id="registerBtn">Register</a></p>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeRegister">&times;</span>
            <h2>Register</h2>
            <form method="POST" action="registrasi.php">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="nim">NIM:</label>
                    <input type="text" id="nim" name="nim" required>
                </div>
                <div class="form-group">
                    <label for="regEmail">Email:</label>
                    <input type="email" id="regEmail" name="regEmail" required>
                </div>
                <div class="form-group">
                    <label for="regPassword">Password:</label>
                    <input type="password" id="regPassword" name="regPassword" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                </div>
                <div class="form-group">
                    <button type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Get the element containing "Reservasi Sekarang"
        var reservasiSekarang = document.querySelector('.hero-text h2');

        // Add click event to open login modal
        reservasiSekarang.onclick = function() {
            loginModal.style.display = 'block';
        }
        
        // Get the modals
        var loginModal = document.getElementById('loginModal');
        var registerModal = document.getElementById('registerModal');

        // Get the buttons that open the modals
        var loginBtn = document.getElementById('loginBtn');
        var registerBtn = document.getElementById('registerBtn');

        // Get the <span> elements that close the modals
        var closeLogin = document.getElementById('closeLogin');
        var closeRegister = document.getElementById('closeRegister');

        // When the user clicks the button, open the modal
        loginBtn.onclick = function() {
            loginModal.style.display = 'block';
        }

        registerBtn.onclick = function() {
            registerModal.style.display = 'block';
            loginModal.style.display = 'none';
        }

        // When the user clicks on <span> (x), close the modal
        closeLogin.onclick = function() {
            loginModal.style.display = 'none';
        }

        closeRegister.onclick = function() {
            registerModal.style.display = 'none';
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == loginModal) {
                loginModal.style.display = 'none';
            }
            if (event.target == registerModal) {
                registerModal.style.display = 'none';
            }
        }
    </script>
</body>
</html>
