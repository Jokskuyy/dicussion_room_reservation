<?php
include("koneksi.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selected_time = $_POST['selected_time'];
    $room_id = $_POST['room_id'];
    $date = $_POST['date'];
    $nim = $_SESSION['nim']; // Pastikan nim diambil dari session yang aktif

    // Pisahkan waktu mulai dan selesai
    list($jam_mulai, $jam_selesai) = explode('-', $selected_time);

    // Dapatkan hari dalam bahasa Indonesia
    $queryHari = "SELECT DAYNAME('$date') as hari";
    $resultHari = mysqli_query($koneksi, $queryHari);
    $rowHari = mysqli_fetch_assoc($resultHari);
    $hariInggris = $rowHari['hari'];

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

    // Cari id_slot berdasarkan waktu yang dipilih dan hari
    $querySlot = "SELECT id_slot FROM slot WHERE hari = '$hari' AND jam_mulai = '$jam_mulai' AND jam_selesai = '$jam_selesai'";
    $resultSlot = mysqli_query($koneksi, $querySlot);
    $rowSlot = mysqli_fetch_assoc($resultSlot);
    $id_slot = $rowSlot['id_slot'];

    // Periksa apakah slot sudah penuh
    $queryCheckStatus = "SELECT status FROM slot WHERE id_slot = '$id_slot'";
    $resultCheckStatus = mysqli_query($koneksi, $queryCheckStatus);
    $rowCheckStatus = mysqli_fetch_assoc($resultCheckStatus);

    if ($rowCheckStatus['status'] == 'penuh') {
        echo "<script>alert('Slot sudah penuh, silakan pilih slot lain.');</script>";
        echo "<script>window.location.href='room1.php';</script>";
    } else {
        // Masukkan reservasi baru
        $query = "INSERT INTO reservasi (nim, id_ruangan, id_slot, tanggal, hari) VALUES ('$nim', '$room_id', '$id_slot', '$date', '$hari')";
        
        if (mysqli_query($koneksi, $query)) {
            // Update status slot menjadi penuh
            $updateSlotStatus = "UPDATE slot SET status = 'penuh' WHERE id_slot = '$id_slot'";
            mysqli_query($koneksi, $updateSlotStatus);
            echo "<script>alert('Reservasi berhasil!');</script>";
            echo "<script>window.location.href='room1.php';</script>";
        } else {
            echo "Reservasi gagal: " . mysqli_error($koneksi);
        }
    }
}
?>
