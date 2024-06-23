<?php
include("koneksi.php");
session_start();

$nim = $_SESSION['nim'];

$query = "SELECT nama, nim, email FROM akun WHERE nim = '$nim'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($koneksi));
}

$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile Page</title>
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
            padding: 1rem 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .left-nav {
            display: flex;
            align-items: center;
        }

        header .left-nav img {
            height: 40px;
            margin-right: 10px;
        }

        header .left-nav .text-container {
            display: flex;
            flex-direction: column;
            margin-right: 20px;
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

        header .right-nav {
            display: flex;
            align-items: center;
        }

        header .right-nav img {
            height: 40px;
            width: auto;
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
            position: sticky;
            top: 0;
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

        .profile-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        .profile-section img {
            width: 100%;
            border-radius: 10px 10px 0 0;
        }

        .profile-info {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 0 0 10px 10px;
            position: relative;
            top: -50px;
        }

        .profile-info .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 5px solid #fff;
        }

        .profile-info .user-details {
            margin-left: 20px;
        }

        .profile-info .user-details h2 {
            margin: 0;
        }

        .profile-content {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .profile-content .box {
            background-color: #ddd;
            padding: 20px;
            border-radius: 10px;
            width: 30%;
            box-sizing: border-box;
        }

        .profile-content .box h3 {
            margin-top: 0;
        }

        footer {
            background: #339966;
            color: white;
            text-align: center;
            padding: 1rem 1;
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
                <div class="cover-photo">
                    <img src="path/to/cover-image.png" alt="Cover Photo">
                </div>
                <div class="profile-info">
                    <img src="path/to/profile-image.png" alt="User Profile" class="profile-image">
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
                        <p>Last Booking : 12 - 5 - 2024</p> <!-- Update this dynamically if needed -->
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
