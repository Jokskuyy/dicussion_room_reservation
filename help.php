<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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

        header h1 {
            margin: 0;
            text-align: center;
        }

        .help-content {
            display: flex;
            flex-wrap: wrap;
            padding: 2rem 0;
            flex: 1;
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
        }

        .address p {
            display: flex;
            align-items: center;
            margin: 0.5rem 0;
        }

        footer {
            background: #339966;
            color: white;
            text-align: center;
            padding: 1rem 0;
            margin-top: auto;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Help Page</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="help-content">
                <div class="left">
                    <h2>Ruang Diskusi</h2>
                    <p>UPT Perpustakaan UPN Veteran Jakarta merupakan Unit Pelaksanaan Teknis di bidang perpustakaan yang mempunyai tugas melaksanakan pemberian layanan kepustakaan.</p>
                    <div class="social-media">
                        <p><img src="instagram.jpg" alt="Instagram"> Instagram</p>
                        <p><img src="facebook.jpg" alt="Facebook"> Facebook</p>
                        <p><img src="youtube.jpg" alt="YouTube"> YouTube</p>
                    </div>
                    <div class="contact-info">
                        <p><img src="whatsapp.jpg" alt="WhatsApp"> 08XXXXXXXXXX</p>
                        <p><img src="whatsapp.jpg" alt="WhatsApp"> 08XXXXXXXXXX</p>
                        <p><img src="whatsapp.jpg" alt="WhatsApp"> 08XXXXXXXXXX</p>
                    </div>
                </div>
                <div class="right">
                    <div class="map">
                        <h2>Lokasi</h2>
                        <img src="lokasi.jpg" alt="Google Map">
                    </div>
                    <div class="address">
                        <p><img src="lokasi.jpg" alt="Location"> Kampus UPN “veteran” Jakarta Gedung DR. Soetomo Lt. 3 dan Lt. 4 Jl. R.S. Fatmawati Pondok Labu - Jakarta Selatan 12450</p>
                        <p><img src="telepon.jpg" alt="Phone"> 021 - 75902835</p>
                        <p><img src="email.jpg" alt="Email"> library@upnvj.ac.id</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>Copyright &copy; 2024 UPN Veteran Jakarta.</p>
        </div>
    </footer>
</body>
</html>
