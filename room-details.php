<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Details</title>
    <style>
            body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
        background: #339966;
        color: white;
        padding: 1rem 1; /* Mengurangi padding untuk membuatnya lebih tipis */
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header .left-nav {
        display: flex;
        align-items: center;
    }

    header .left-nav img {
        height: 40px; /* Mengurangi ukuran logo */
        margin-right: 10px;
    }

    header .left-nav .text-container {
        display: flex;
        flex-direction: column;
        margin-right: 20px; /* Adjust space between text and navigation */
    }

    header .left-nav .text-container span:first-child {
        font-weight: bold;
    }

    header .left-nav .text-container span:last-child {
        font-weight: bold;
        font-size: 0.8em;
    }

    header nav {
        display: flex;
        align-items: center;
    }

    header nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

    header nav ul li {
        margin: 0 10px;
    }

    header nav ul li a {
        color: white;
        text-decoration: none;
    }

    header .profile {
        display: flex;
        align-items: center;
    }

    header .profile img {
        height: 40px; /* Mengurangi ukuran ikon profil */
        cursor: pointer;
    }

    .container {
        display: flex;
        min-height: 100vh;
    }

    .sidebar {
        width: 200px;
        background: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        position: sticky; /* Membuat sidebar tetap diam */
        top: 0; /* Posisi tetap di bagian atas */
        height: 100vh; /* Tinggi penuh */
    }

    .sidebar h2 {
        margin-top: 0;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar ul li {
        margin: 20px 0;
        display: flex;
        align-items: center;
    }

    .sidebar ul li img {
        width: 20px; /* Sesuaikan ukuran ikon jika perlu */
        height: auto;
        margin-right: 10px;
    }

    .sidebar ul li a {
        color: #333;
        text-decoration: none;
    }

    .content {
        flex: 1;
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .card {
        width: calc(50% - 10px);
        background: white;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        overflow: hidden;
        text-decoration: none;
        color: inherit;
    }

    .card img {
        width: 100%;
        height: auto;
    }

    .card h3 {
        margin: 0;
        padding: 10px;
        background: #339966;
        color: white;
        text-align: center;
    }

    footer {
        background: #339966;
        color: white;
        text-align: center;
        padding: 1rem 1; /* Mengurangi padding untuk membuatnya lebih tipis */
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    </style>
</head>
<body>
    <header>
        <div class="left-nav">
            <img src="logo.png" alt="Logo">
            <div class="text-container">
                <span>UPA Perpustakaan</span>
                <span>UPN Veteran Jakarta</span>
            </div>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </nav>
        </div>
        <div class="right-nav">
            <a href="#"><img src="account.jpg" alt="Profile" class="profile"></a>
        </div>
    </header>
    <div class="container">
        <main class="content">
            <div class="room-details">
                <!-- Room Name -->
                <h2>Ruang 1</h2>
                <!-- Room Image -->
                <img src="img/contoh.jpg" alt="Ruang 1">
                <!-- Room Label -->
                <p>Ruang 1</p>
                <!-- Room Specifications -->
                <p>Kapasitas: 4 orang</p>
                <!-- Maximum booking duration -->
                <p>Maksimal peminjaman: 60 menit</p>
                <!-- Floor Location -->
                <p>Lantai: 1</p>
                <!-- Availability Table -->
                <table>
                    <caption>Availability for June 15, 2024</caption>
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Availability slots for each hour -->
                        <tr>
                            <td>07:30 - 08:30</td>
                            <td>Available</td>
                        </tr>
                        <!-- Repeat for other hours -->
                    </tbody>
                </table>
                <!-- Reservation Button -->
                <button onclick="openModal()">Reserve</button>
            </div>
            <!-- Modal for reservation -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <!-- Room Image in Modal -->
                    <img src="img/contoh.jpg" alt="Ruang 1">
                    <!-- Room Specifications in Modal -->
                    <p>Kapasitas: 4 orang</p>
                    <!-- Dropdown for selecting time -->
                    <label for="booking-time">Pilih waktu:</label>
                    <select id="booking-time">
                        <option value="07:30">07:30 - 08:30</option>
                        <!-- Add options for other time slots -->
                    </select>
                    <!-- Button to confirm reservation -->
                    <button onclick="confirmReservation()">Reserve</button>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <!-- Footer content similar to the dashboard -->
        <p>Copyright &copy; 2024 UPN Veteran Jakarta.</p>
    </footer>

    <!-- JavaScript for Modal functionality -->
    <script>
        // Function to open modal
        function openModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
        }

        // Function to close modal (if needed)
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

        // Function to handle reservation confirmation
        function confirmReservation() {
            // Logic to handle reservation (e.g., send request to server)
            alert("Reservation confirmed!"); // Placeholder
        }
    </script>
</body>
</html>