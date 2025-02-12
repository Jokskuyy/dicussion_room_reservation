<?php
include("koneksi.php");
session_start();

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
$currentDayInggris = $currentDayRow['hari'];
$currentDay = hariIndonesia($currentDayInggris);

$currentDateQuery = "SELECT CURDATE() as tanggal";
$currentDateResult = mysqli_query($koneksi, $currentDateQuery);
$currentDateRow = mysqli_fetch_assoc($currentDateResult);
$currentDate = $currentDateRow['tanggal'];
?>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="scripts.js" defer></script>

    <style>
        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
            z-index: 1000;
            overflow:hidden;}

        .modal-dialog {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 80%; 
            max-width: 600px;
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #888;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .modal-content {
            width: 100%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }


        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
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
            top: 20px;
            right: 10%;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            border-radius: 10px;
        }

        header {
            background: #339966;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .room-info img {
            width: 50%;
            height: auto;
            border-radius: 10px;
        }

        .room-detail img{
            border-radius: 10px;
        }

        .detail-ruangannn img{
            width: 18px;
        }
    </style>
</head>
<body>
    <header>
        <div class="left-nav">
            <img class="img" src="img/imglogo.png" alt="Logo">
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
            <a href="#"><img src="img/profile_photo.png" alt="Profile" class="profile"></a>
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
                <h2>Ruang 3</h2>
                <img src="img/contoh.jpg" alt="Ruang 3">
                <p>Spesifikasi:</p>
                <div class="detail-ruangannn">
                    <p><img src="img/orang.png" alt="Icon Orang">   Kapasitas 2 - 4 orang</p>
                    <p><img style="width: 20px;" src="img/menit.jpg" alt="Icon Menit">   Maksimal peminjaman: 60 menit</p>
                    <p><img style="width: 15px;" src="img/logolokasi.png" alt="Icon Lantai">   Lantai: 1 </p>
                    <a href="#" class="reserve-btn" data-toggle="modal" data-target="#reservationModal">Reservasi</a>
                </div>
            </div>
        </main>
    </div>   
    <!-- Modal -->
    <div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="reservationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <table style="width:100%;">
                        <tr>
                            <td>
                                <h2 class="modal-title" id="reservationModalLabel">Detail Ruang 3</h2>
                            </td>
                            <td>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-body">
                    <div class="room-info">
                        <img style="text-align:center;" src="img/contoh.jpg" alt="Ruang 3">
                        <table style="margin-left:100px;margin-right:auto;width:80%;">
                            <tr>
                                <td>
                                    <img style="width: 18px;" src="img/orang.png" alt="Icon Orang">
                                </td>
                                <td>
                                    <p>2 - 4 orang</p>
                                </td>
                                <td rowspan="3">
                                    <div class="time-selection">
                                        <h3>Pilih Waktu</h3>
                                        <form action="reservation.php" method="POST">
                                            <div class="form-group">
                                                <label for="selected_time">Jam:</label>
                                                <select class="form-control" id="selected_time" name="selected_time" required>
                                                    <option>-- Pilih Jam --</option>
                                                    <?php
                                                $status = 'tersedia';
                                                $queryTimes = "SELECT jam_mulai, jam_selesai FROM slot WHERE hari = '$currentDay'  AND status = '$status'";
                                                $resultTimes = mysqli_query($koneksi, $queryTimes);
                                                
                                                while ($timeRow = mysqli_fetch_assoc($resultTimes)) {
                                                    echo "<option value='" . $timeRow['jam_mulai'] . "-" . $timeRow['jam_selesai'] . "'>" . $timeRow['jam_mulai'] . "-" . $timeRow['jam_selesai'] . "</option>";
                                                }
                                                ?>
                                                </select>
                                            </div>
                                            <input type="hidden" name="room_id" value="3">
                                            <input type="hidden" name="date" value="<?php echo $currentDate; ?>">
                                            <button class="reserve-btn" type="submit" id="openModalBtn" class="btn btn-primary">Konfirmasi</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img style="width: 20px;" src="img/menit.jpg" alt="Icon Menit">
                                </td>
                                <td>
                                    <p>Maks. 60 Menit</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img style="width: 15px;" src="img/logolokasi.png" alt="Icon Lantai">
                                </td>
                                <td>
                                    <p>Lantai 1</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>Copyright &copy; 2024 UPN Veteran Jakarta.</p>
    </footer>
</body>
</html>
