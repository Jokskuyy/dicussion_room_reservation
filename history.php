<?php
session_start();
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #339966;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .left-nav img {
            height: 40px;
            margin-right: 10px;
        }

        header .left-nav .text-container {
            display: inline-block;
            margin-right: 20px;
        }

        header .left-nav .text-container span:first-child {
            font-weight: bold;
        }

        header .left-nav .text-container span:last-child {
            font-weight: bold;
            font-size: 0.8em;
        }

        header nav ul {
            list-style: none;
            display: flex;
            padding: 0;
            margin: 0;
        }

        header nav ul li {
            margin: 0 10px;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
        }

        header .right-nav img {
            height: 40px;
            width: auto;
            cursor: pointer;
        }

        .container {
            display: flex;
        }

        .sidebar {
            width: 200px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            height: 100vh;
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
            width: 20px;
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
        }

        .history-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        .history-section table {
            width: 100%;
            border-collapse: collapse;
        }

        .history-section th, .history-section td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .history-section th {
            background-color: #339966;
            color: white;
        }

        footer {
            background: #339966;
            color: white;
            text-align: center;
            padding: 1rem;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <div class="left-nav">
            <img src="img/imglogo.png" alt="Logo">
            <div class="text-container">
                <span>UPA Perpustakaan</span>
                <span>UPN Veteran Jakarta</span>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        <div class="right-nav">
            <a href="profile.php"><img src="img/profile_photo.png" alt="Profile" class="profile"></a>
        </div>
    </header>
    <div class="container">
        <aside class="sidebar">
            <h2>Start</h2>
            <ul>
                <li><img src="img/dashboard_icon.png" alt="Dashboard Icon"><a href="dashboard.php">Dashboard</a></li>
                <li><img src="img/profile_icon.png" alt="Profile Icon"><a href="profile.php">Profile</a></li>
                <li><img src="img/history_icon.png" alt="History Icon"><a href="#">History</a></li>
                <li><img src="img/logout_icon.png" alt="Logout Icon"><a href="index.php">Logout</a></li>
            </ul>
        </aside>
        <main class="content">
            <div class="history-section">
                <h2>History</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Ruang</th>
                            <th>Waktu</th>
                            <th>Tanggal</th>
                            <th>Alasan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>4</td>
                            <td>07:00 - 08:00</td>
                            <td>12 - 5 - 2024</td>
                            <td>Rapat Himpunan</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>07:30 - 08:30</td>
                            <td>15 - 5 - 2024</td>
                            <td>Diskusi Proyek</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>09:00 - 10:00</td>
                            <td>9 - 5 - 2024</td>
                            <td>Turnamen Mobile Legend</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>08:30 - 09:30</td>
                            <td>9 - 5 - 2024</td>
                            <td>Rapat Anggota Himpunan</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>08:30 - 09:30</td>
                            <td>5 - 5 - 2024</td>
                            <td>Diskusi Bisnis</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>07:00 - 08:00</td>
                            <td>5 - 5 - 2024</td>
                            <td>Rapat BPH</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <footer>
        <p>Copyright &copy; 2024 UPN Veteran Jakarta.</p>
    </footer>
</body>
</html>
