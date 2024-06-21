<html>
<head>
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
                    <li><a href="index.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        <div class="right-nav">
            <a href="#"><img src="img/profile_photo.png" alt="Profile" class="profile"></a>
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
