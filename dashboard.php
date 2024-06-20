<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            <img src="imglogo.png" alt="Logo">
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
            <a href="#"><img src="account.jpg" alt="Profile" class="profile"></a>
        </div>
    </header>
    <div class="container">
        <aside class="sidebar">
            <h2>Start</h2>
            <ul>
                <li><img src="dashboard.jpg" alt="Dashboard Icon"><a href="dashboard.php">Dashboard</a></li>
                <li><img src="imgprofile.jpg" alt="Profile Icon"><a href="#">Profile</a></li>
                <li><img src="history.jpg" alt="History Icon"><a href="#">History</a></li>
                <li><img src="logout.jpg" alt="Logout Icon"><a href="index.php">Logout</a></li>
            </ul>
        </aside>
        <main class="content">
            <a href="room1.php" class="card">
                <img src="img/contoh.jpg" alt="Ruang 1">
                <h3>Ruang 1</h3>
            </a>            
            <a href="room1.html" class="card">
                <img src="img/contoh.jpg" alt="Ruang 2">
                <h3>Ruang 2</h3>
            </a>            
            <a href="room1.html" class="card">
                <img src="img/contoh.jpg" alt="Ruang 3">
                <h3>Ruang 3</h3>
            </a>            
            <a href="room1.html" class="card">
                <img src="img/contoh.jpg" alt="Ruang 4">
                <h3>Ruang 4</h3>
            </a>            
            <a href="room1.html" class="card">
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