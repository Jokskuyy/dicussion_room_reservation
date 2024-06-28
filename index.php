<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="index_styles.css">
</head>
<body>
    <header>
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="img/imglogo.png" alt="Logo" style="height: 50px; margin-right: 10px;">
                <div>
                    <h2 style="margin: 0; font-size: 1.5rem;">UPA Perpustakaan</h2>
                    <h3 style="margin: 0; font-size: 1.25rem;">UPN Veteran Jakarta</h3>
                </div>
            </div>
            <nav>
                <ul class="d-flex justify-content-end align-items-center" style="list-style: none; padding: 0; margin: 0;">
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
                <div class="overlay"></div> <!-- Overlay div if applied -->
                <div class="hero-text">
                    <div class="section-title">
                        <a href="#reservasi" class="hero-link">
                            <p>UPA Perpustakaan</p>
                            <h2>Ruang Diskusi</h2>
                        </a>
                        <hr>
                    </div>
                    <h2 class="reservation-button">Reservation Now >>></h2>
                </div>
            </div>
        </section>
        <section class="content" id="help">
            <div class="container">
                <div class="help-content">
                    <div class="left">
                        <h2>Layanan Perpustakaan</h2>
                        <p>Kami menyediakan berbagai layanan untuk membantu Anda mendapatkan informasi dan sumber daya yang Anda butuhkan. Tim kami siap membantu Anda dengan berbagai keperluan teknis di bidang perpustakaan yang mempunyai tugas melaksanakan pemberian layanan kepustakaan.</p>
                        <div class="social-media">
                            <img src="img/instagram.png" alt="Instagram">
                            <img src="img/facebook.png" alt="Facebook">
                            <img src="img/youtube.jpg" alt="YouTube">
                        </div>
                        <div class="contact-info">
                            <h3>Narahubung</h3>
                            <p><img src="img/whatsapp.jpg" alt="WhatsApp" class="icon"> 08XXXXXXXXXX</p>
                            <p><img src="img/whatsapp.jpg" alt="WhatsApp" class="icon"> 08XXXXXXXXXX</p>
                            <p><img src="img/whatsapp.jpg" alt="WhatsApp" class="icon"> 08XXXXXXXXXX</p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="map">
                            <h2>Lokasi</h2>
                            <a href="https://maps.app.goo.gl/B2bJe3erTjoYifqu7" target="_blank">
                                <img src="img/lokasi.jpg" alt="Google Map">
                            </a>
                        </div>
                        <div class="address">
                            <h3>Alamat</h3>
                            <p><img src="img/logolokasi.png" alt="Location" class="icon"> Kampus UPN “veteran” Jakarta Gedung DR. Soetomo Lt. 3 dan Lt. 4 Jl. R.S. Fatmawati Pondok Labu - Jakarta Selatan 12450</p>
                            <p><img src="img/telepon.png" alt="Phone" class="icon"> 021 - 75902835</p>
                            <p><img src="img/email.png" alt="Email" class="icon"> library@upnvj.ac.id</p>
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

    <div id="loginModal" class="modal">
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

    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeRegister">&times;</span>
            <h2>Register</h2>
            <form method="POST" action="registrasi.php">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Nama" required>
                </div>
                <div class="form-group">
                    <label for="nim">NIM:</label>
                    <input class="form-control" type="text" id="nim" name="nim" placeholder="NIM" required>
                </div>
                <div class="form-group">
                    <label for="regEmail">Email:</label>
                    <input class="form-control" type="email" id="regEmail" name="regEmail" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="regPassword">Password:</label>
                    <input class="form-control" type="password" id="regPassword" name="regPassword" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input class="form-control" type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        var reservasiSekarang = document.querySelector('.reservation-button');

        reservasiSekarang.onclick = function() {
            loginModal.style.display = 'block';
        }

        var loginModal = document.getElementById('loginModal');
        var registerModal = document.getElementById('registerModal');

        var loginBtn = document.getElementById('loginBtn');
        var registerBtn = document.getElementById('registerBtn');

        var closeLogin = document.getElementById('closeLogin');
        var closeRegister = document.getElementById('closeRegister');

        loginBtn.onclick = function() {
            loginModal.style.display = 'block';
        }

        registerBtn.onclick = function() {
            registerModal.style.display = 'block';
            loginModal.style.display = 'none';
        }

        closeLogin.onclick = function() {
            loginModal.style.display = 'none';
        }

        closeRegister.onclick = function() {
            registerModal.style.display = 'none';
        }

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
