<?php
include("koneksi.php");
session_start();

$nim = $_SESSION['nim'];

// Query untuk mendapatkan data user
$query = "SELECT nama, nim, email FROM akun WHERE nim = '$nim'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($koneksi));
}

$user = mysqli_fetch_assoc($result);

// Query untuk mendapatkan last booking
$query_last_booking = "SELECT tanggal FROM reservasi WHERE nim = '$nim' ORDER BY tanggal DESC LIMIT 1";
$result_last_booking = mysqli_query($koneksi, $query_last_booking);

if (!$result_last_booking) {
    die("Query failed: " . mysqli_error($koneksi));
}

$last_booking = mysqli_fetch_assoc($result_last_booking);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile Page</title>
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="logout.php">Logout</a></li>
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
                <li><img src="img/history_icon.png" alt="History Icon"><a href="history.php">History</a></li>
                <li><img src="img/logout_icon.png" alt="Logout Icon"><a href="logout.php">Logout</a></li>
            </ul>
        </aside>
        <main class="content">
            <div class="profile-section">
                <div class="profile-info">
                    <img src="img/profile-image.jpg" alt="User Profile" class="profile-image">
                    <div class="user-details">
                        <h2><?php echo $user['nama']; ?></h2>
                        <p><?php echo $user['nim']; ?></p>
                        <p><?php echo $user['email']; ?></p>
                    </div>
                </div>
                <div class="profile-content">
                    <div class="box profile-box">
                        <h3>Profile</h3>
                        <p>Nama : <?php echo $user['nama']; ?></p>
                        <p>NIM : <?php echo $user['nim']; ?></p>
                        <p>Email : <?php echo $user['email']; ?></p>
                        <p>Last Booking : <?php echo isset($last_booking['tanggal']) ? date('d - m - Y', strtotime($last_booking['tanggal'])) : 'No bookings yet'; ?></p>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <p>Copyright &copy; 2024 UPN Veteran Jakarta.</p>
    </footer>
</body>
</html>
