<?php
session_start();
include("koneksi.php");

// Pastikan user sudah login dan nim tersedia di session
if (!isset($_SESSION['nim'])) {
    header("Location: index.php");
    exit();
}

$nim = $_SESSION['nim'];

// Ambil data riwayat reservasi dari database
$query = "
    SELECT r.nama_ruangan, s.jam_mulai, s.jam_selesai, rs.tanggal
    FROM reservasi rs
    JOIN ruangan r ON rs.id_ruangan = r.id_ruangan
    JOIN slot s ON rs.id_slot = s.id_slot
    WHERE rs.nim = '$nim'
    ORDER BY rs.tanggal DESC, s.jam_mulai DESC
";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        .container {
            display: flex;
        }


        .content {
            flex: 1;
            padding: 20px;
        }

        .history-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 100%;
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
            text-align: center;
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
            <div class="history-section">
                <h2>History</h2>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Ruang</th>
                            <th>Waktu</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . htmlspecialchars($row['nama_ruangan']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['jam_mulai']) . " - " . htmlspecialchars($row['jam_selesai']) . "</td>";
                            echo "<td>" . date('d-m-Y', strtotime($row['tanggal'])) . "</td>";
                            echo "</tr>";
                        }
                        ?>
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
