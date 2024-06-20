<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.sidebar {
    width: 250px;
    height: 100vh;
    background-color: #f2f2f2;
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px 0;
}

.sidebar .logo img {
    width: 80px;
    height: 80px;
    margin-bottom: 20px;
}

.sidebar-menu {
    display: flex;
    flex-direction: column;
    width: 100%;
}

.sidebar-menu a {
    text-decoration: none;
    color: #333;
    padding: 15px 20px;
    text-align: center;
    transition: background-color 0.3s;
    display: flex;
    align-items: center;
}

.sidebar-menu a img {
    width: 20px;
    margin-right: 10px;
}

.sidebar-menu a:hover,
.sidebar-menu a.active {
    background-color: #ddd;
}

.main-content {
    margin-left: 250px;
    padding: 20px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    border-bottom: 2px solid #ccc;
}

.header .left-nav {
    display: flex;
    align-items: center;
}

.header .left-nav img {
    height: 40px;
    margin-right: 10px;
}

.header .left-nav .text-container {
    display: flex;
    flex-direction: column;
}

.header .left-nav .text-container span:first-child {
    font-weight: bold;
}

.header .left-nav .text-container span:last-child {
    font-weight: bold;
    font-size: 0.8em;
}

.header-right a {
    text-decoration: none;
    color: #00796b;
    margin-left: 20px;
}

.header-right .user-profile {
    display: flex;
    align-items: center;
}

.header-right .user-profile span {
    margin-right: 10px;
}

.header-right .user-profile img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

.profile-section {
    margin-top: 20px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
}

.cover-photo img {
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

    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="img/imglogo.png" alt="UPN Veteran Jakarta Logo">
        </div>
        <div class="sidebar-menu">
            <a href="dashboard.php"><img src="dashboard.jpg" alt="Dashboard Icon">Dashboard</a>
            <a href="#" class="active"><img src="imgprofile.jpg" alt="Profile Icon">Profile</a>
            <a href="#"><img src="history.jpg" alt="History Icon">History</a>
            <a href="index.php"><img src="logout.jpg" alt="Logout Icon">Logout</a>
        </div>
    </div>
    <div class="main-content">
        <div class="header">
            <div class="left-nav">
                <img src="img/imglogo.png" alt="Logo">
                <div class="text-container">
                    <span>UPA Perpustakaan</span>
                    <span>UPN Veteran Jakarta</span>
                </div>
            </div>
            <div class="header-right">
                <a href="index.php">Home</a>
                <a href="index.php">Logout</a>
                <div class="user-profile">
                    <span>User001</span>
                    <img src="img/profile_photo.png" alt="Profile">
                </div>
            </div>
        </div>
        <div class="profile-section">
            <div class="cover-photo">
                <img src="path/to/cover-image.png" alt="Cover Photo">
            </div>
            <div class="profile-info">
                <img src="path/to/profile-image.png" alt="User Profile" class="profile-image">
                <div class="user-details">
                    <h2>User001</h2>
                    <p>2210511001@mahasiswa.upnvj.ac.id</p>
                </div>
            </div>
            <div class="profile-content">
                <div class="box profile-box">
                    <h3>Profile</h3>
                    <p>Nama : User001</p>
                    <p>NIM : 2210511001</p>
                    <p>Email : 2210511001@mahasiswa.upnvj.ac.id</p>
                    <p>Last Booking : 12 - 5 - 2024</p>
                </div>
                <div class="box about-me-box">
                    <h3>About Me</h3>
                    <p>Hidup hanya sekali, tapi kalau dilakukan dengan benar, sekali sudah cukup.</p>
                </div>
                <div class="box note-box">
                    <h3>Note</h3>
                    <p>Jam 3, tgl 10 nugas kelompok</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
