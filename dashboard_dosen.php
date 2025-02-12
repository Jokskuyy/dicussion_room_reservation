<?php
include("koneksi.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
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
                    <li><a href="logout.php">Home</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        <div class="right-nav">
            <a href="profile_dosen.php"><img src="img/profile_photo.png" alt="Profile" class="profile"></a>
        </div>
    </header>
    <div class="container">
        <aside class="sidebar">
            <h2>Start</h2>
            <ul>
                <li><img src="img/dashboard_icon.png" alt="Dashboard Icon"><a href="dashboard_dosen.php">Dashboard</a></li>
                <li><img src="img/profile_icon.png" alt="Profile Icon"><a href="profile_dosen.php">Profile</a></li>
                <li><img src="img/history_icon.png" alt="History Icon"><a href="history_dosen.php">History</a></li>
                <li><img src="img/logout_icon.png" alt="Logout Icon"><a href="logout.php">Logout</a></li>
            </ul>
        </aside>
        <main class="content">
            <a href="room1_dosen.php" class="card">
                <img src="img/contoh.jpg" alt="Ruang 1">
                <h3>Ruang 1</h3>
            </a>            
            <a href="room2_dosen.php" class="card">
                <img src="img/contoh.jpg" alt="Ruang 2">
                <h3>Ruang 2</h3>
            </a>            
            <a href="room3_dosen.php" class="card">
                <img src="img/contoh.jpg" alt="Ruang 3">
                <h3>Ruang 3</h3>
            </a>            
            <a href="room4_dosen.php" class="card">
                <img src="img/contoh.jpg" alt="Ruang 4">
                <h3>Ruang 4</h3>
            </a>            
            <a href="room5_dosen.php" class="card">
                <img src="img/contoh.jpg" alt="Ruang 5">
                <h3>Ruang 5</h3>
            </a>            
        </main>
    </div>
    <footer>
        <p>Copyright &copy; 2024 UPN Veteran Jakarta.</p>
    </footer>
</body>
</html>
