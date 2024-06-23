<?php
include("koneksi.php");
// Dapatkan hari ini dalam bahasa Inggris
$queryHari = "SELECT DAYNAME(CURDATE()) as hari";
$resultHari = mysqli_query($koneksi, $queryHari);
$rowHari = mysqli_fetch_assoc($resultHari);
$hariInggris = $rowHari['hari'];

// Terjemahkan hari ke dalam bahasa Indonesia
$days = array(
    'Sunday' => 'Minggu',
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu'
);

$hari = $days[$hariInggris];

// Update status slot menjadi 'tersedia' kecuali hari ini
$sql = "UPDATE slot 
        SET status = 'tersedia'
        WHERE hari != '$hari'";


mysqli_close($koneksi);
?>
