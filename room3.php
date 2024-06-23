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

        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        main,
        menu,
        nav,
        section,
        summary {
        display: block;
        }
        a {
        background-color: transparent;
        }
        html {
        font-size: 10px;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
        body {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 14px;
        line-height: 1.42857143;
        color: #333333;
        background-color: #ffffff;
        }
        a {
        color: #337ab7;
        text-decoration: none;
        }
        a:hover,
        a:focus {
        color: #23527c;
        text-decoration: underline;
        }
        a:focus {
        outline: thin dotted;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
        }
        .close {
        float: right;
        font-size: 21px;
        font-weight: bold;
        line-height: 1;
        color: #000000;
        text-shadow: 0 1px 0 #ffffff;
        opacity: 0.2;
        filter: alpha(opacity=20);
        }
        .close:hover,
        .close:focus {
        color: #000000;
        text-decoration: none;
        cursor: pointer;
        opacity: 0.5;
        filter: alpha(opacity=50);
        }
        button.close {
        padding: 0;
        cursor: pointer;
        background: transparent;
        border: 0;
        -webkit-appearance: none;
        }
        .modal-open {
        overflow: hidden;
        }
        .modal {
        display: none;
        overflow: hidden;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1050;
        -webkit-overflow-scrolling: touch;
        outline: 0;
        }
        .modal.fade .modal-dialog {
        -webkit-transform: translate(0, -25%);
        -ms-transform: translate(0, -25%);
        -o-transform: translate(0, -25%);
        transform: translate(0, -25%);
        -webkit-transition: -webkit-transform 0.3s ease-out;
        -o-transition: -o-transform 0.3s ease-out;
        transition: transform 0.3s ease-out;
        }
        .modal.in .modal-dialog {
        -webkit-transform: translate(0, 0);
        -ms-transform: translate(0, 0);
        -o-transform: translate(0, 0);
        transform: translate(0, 0);
        }
        .modal-open .modal {
        overflow-x: hidden;
        overflow-y: auto;
        }
        .modal-dialog {
        position: relative;
        width: auto;
        margin: 10px;
        }
        .modal-content {
        position: relative;
        background-color: #ffffff;
        border: 1px solid #999999;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 6px;
        -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
        box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
        -webkit-background-clip: padding-box;
                background-clip: padding-box;
        outline: 0;
        }
        .modal-backdrop {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1040;
        background-color: #000000;
        }
        .modal-backdrop.fade {
        opacity: 0;
        filter: alpha(opacity=0);
        }
        .modal-backdrop.in {
        opacity: 0.5;
        filter: alpha(opacity=50);
        }
        .modal-header {
        padding: 15px;
        border-bottom: 1px solid #e5e5e5;
        min-height: 16.42857143px;
        }
        .modal-header .close {
        margin-top: -2px;
        }
        .modal-title {
        margin: 0;
        line-height: 1.42857143;
        }
        .modal-body {
        position: relative;
        padding: 15px;
        }
        .modal-footer {
        padding: 15px;
        text-align: right;
        border-top: 1px solid #e5e5e5;
        }
        .modal-footer .btn + .btn {
        margin-left: 5px;
        margin-bottom: 0;
        }
        .modal-footer .btn-group .btn + .btn {
        margin-left: -1px;
        }
        .modal-footer .btn-block + .btn-block {
        margin-left: 0;
        }
        .modal-scrollbar-measure {
        position: absolute;
        top: -9999px;
        width: 50px;
        height: 50px;
        overflow: scroll;
        }
        .clickable {
        cursor:pointer;
        }
        @media (min-width: 768px) {
        .modal-dialog {
            width: 600px;
            margin: 30px auto;
        }
        .modal-content {
            -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }
        .modal-sm {
            width: 300px;
        }
        }
        @media (min-width: 992px) {
        .modal-lg {
            width: 900px;
        }
        }
        .clearfix:before,
        .clearfix:after,
        .modal-footer:before,
        .modal-footer:after {
        content: " ";
        display: table;
        }
        .clearfix:after,
        .modal-footer:after {
        clear: both;
        }
        .center-block {
        display: block;
        margin-left: auto;
        margin-right: auto;
        }
        .pull-right {
        float: right !important;
        }
        .pull-left {
        float: left !important;
        }
        .hide {
        display: none !important;
        }
        .show {
        display: block !important;
        }
        .invisible {
        visibility: hidden;
        }
        .text-hide {
        font: 0/0 a;
        color: transparent;
        text-shadow: none;
        background-color: transparent;
        border: 0;
        }
        .hidden {
        display: none !important;
        }
        .affix {
        position: fixed;
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
            top: 20px;
            right: 10%;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
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
            <a href="#"><img src="img/profile_photo.png" alt="Profile" class="profile"></a>
        </div>
    </header>
    <div class="container">
        <aside class="sidebar">
            <h2>Start</h2>
            <ul>
                <li><img src="img/dashboard_icon.png" alt="Dashboard Icon"><a href="dashboard.php">Dashboard</a></li>
                <li><img src="img/profile_icon.png" alt="Profile Icon"><a href="">Profile</a></li>
                <li><img src="img/history_icon.png" alt="History Icon"><a href="#">History</a></li>
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
                <p>Spesifikasi: Kapasitas 2 - 4 orang <img src="orang.png" alt="Icon Orang"></p>
                <p>Maksimal peminjaman: 60 menit <img src="menit.png" alt="Icon Menit"></p>
                <p>Lantai: 1 <img src="info_lantai.png" alt="Icon Lantai"></p>
                <a href="#" class="reserve-btn" data-toggle="modal" data-target="#reservationModal">Reservasi</a>
            </div>
        </main>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="reservationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reservationModalLabel">Ruang 3 Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="room-info">
                        <img src="img/contoh.jpg" alt="Ruang 3">
                        <h2>Ruang 3</h2>
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
                            <button type="submit" id="openModalBtn" class="btn btn-primary">Konfirmasi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    // Script to toggle modal visibility
    document.getElementById('openModalBtn').addEventListener('click', function() {
        document.getElementById('reservationModal').style.display = 'block';
    });
    document.querySelectorAll('[data-dismiss="modal"]').forEach(function(element) {
        element.addEventListener('click', function() {
            document.getElementById('reservationModal').style.display = 'none';
        });
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <footer>
        <p>Copyright &copy; 2024 UPN Veteran Jakarta.</p>
    </footer>
</body>
</html>
