<?php
include("koneksi.php");
function hariIndonesia($hariInggris) {
    $days = array(
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    );
    
    return $days[$hariInggris];
}
// Ambil nama hari dan tanggal saat ini
$currentDayQuery = "SELECT DAYNAME(CURDATE()) as hari";
$currentDayResult = mysqli_query($koneksi, $currentDayQuery);
$currentDayRow = mysqli_fetch_assoc($currentDayResult);
$currentDay = $currentDayRow['hari'];
$currentDayInggris = $currentDayRow['hari'];
$currentDay = hariIndonesia($currentDayInggris);

$currentDateQuery = "SELECT CURDATE() as tanggal";
$currentDateResult = mysqli_query($koneksi, $currentDateQuery);
$currentDateRow = mysqli_fetch_assoc($currentDateResult);
$currentDate = $currentDateRow['tanggal'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruang 1 Detail</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
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

        header .profile {
            display: flex;
            align-items: center;
        }

        header .profile img {
            height: 40px;
            cursor: pointer;
        }

        .container {
            display: flex;
            flex: 1;
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
            position: relative;
        }

        .top-right-content {
            position: absolute;
            top: 20px; /* Adjust top position as needed */
            right: 20px; /* Adjust right position as needed */
            background-color: #ffffff; /* Background color for clarity */
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000; /* Ensure it's above other content */
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

        .queue-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .queue-table th, .queue-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .queue-table th {
            background-color: #339966;
            color: white;
            text-align: center;
        }

        .queue-table td {
            text-align: center;
        }

        .reserve-btn {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            background-color: #339966;
            border: 2px solid #339966;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            text-align: center;
            margin-top: 20px;
        }

        .reserve-btn:hover {
            background-color: white;
            color: #339966;
        }

        /* Modal Style */
        .modal-dialog {
            max-width: 800px;
        }

        .modal-content {
            padding: 20px;
        }

        .modal-title {
            font-weight: bold;
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .modal-body {
            display: flex;
        }

        .room-info {
            flex: 1;
            text-align: center;
        }

        .room-info h2 {
            margin-top: 0;
        }

        .room-info img {
            width: 50px;
            height: auto;
        }

        .specification {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .specification img {
            width: 20px;
            height: auto;
            margin-right: 10px;
        }

        .time-selection {
            flex: 1;
            padding-left: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .confirm-btn {
            margin-top: 20px;
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
                    <li><a href="dashboard.php">Home</a></li>
                    <li><a href="#">Logout</a></li>
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
            <div class="top-right-content">
                <h2>Antrian <?php echo $currentDay; ?>, <?php echo $currentDate; ?></h2>
                <table class="queue-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT id_slot, jam_mulai, jam_selesai, status FROM slot WHERE hari = '$currentDay'";
                        $result = mysqli_query($koneksi, $query);
                        $no = 1;

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $row['jam_mulai'] . "</td>";
                            echo "<td>" . $row['jam_selesai'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="room-detail">
                <h2>Ruang 1</h2>
                <img src="img/contoh.jpg" alt="Ruang 1">
                <p>Ruang keberapa: 1</p>
                <p>Spesifikasi: Kapasitas 2 - 4 orang <img src="orang.png" alt="Icon Orang"></p>
                <p>Maksimal peminjaman: 60 menit <img src="menit.png" alt="Icon Menit"></p>
                <p>Lantai: 1 <img src="info_lantai.png" alt="Icon Lantai"></p>
                <a href="#" class="reserve-btn" data-toggle="modal" data-target="#reservationModal">Reservasi</a>
            </div>
            <div>
        </div>
        </main>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="reservationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reservationModalLabel">Ruang 1 Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="room-info">
                        <img src="img/contoh.jpg" alt="Ruang 1">
                        <h2>Ruang 1</h2>
                        <div class="specification">
                            <img src="orang.png" alt="Icon Orang">
                            <p>2 - 4 orang</p>
                        </div>
                        <div class="specification">
                            <img src="menit.png" alt="Icon Menit">
                            <p>Maks. 60 Menit</p>
                        </div>
                        <div class="specification">
                            <img src="info_lantai.png" alt="Icon Lantai">
                            <p>Lantai 1</p>
                        </div>
                    </div>
                    <div class="time-selection">
                        <h3>Pilih Waktu</h3>
                        <div class="form-group">
                            <select class="form-control">
                                <option>-- Pilih Jam --</option>
                                <?php
                                // Example of generating options dynamically from database or other source
                                $queryTimes = "SELECT jam_mulai FROM slot WHERE hari = '$currentDay'";
                                $resultTimes = mysqli_query($koneksi, $queryTimes);

                                while ($timeRow = mysqli_fetch_assoc($resultTimes)) {
                                    echo "<option>" . $timeRow['jam_mulai'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary confirm-btn">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
