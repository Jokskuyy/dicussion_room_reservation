<?php
session_start();
include("koneksi.php");

$nim = $_POST['nim'];
$password = $_POST['password'];

if ($nim != '' && $password != '') {
    // Query untuk mengambil data user berdasarkan nim
    $sql = "SELECT * FROM akun WHERE nim='$nim'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($query); // Ambil data dari hasil query

    if (mysqli_num_rows($query) < 1) {
        // Jika user tidak ditemukan
        setcookie("message", "Maaf, NIM atau password salah", time() + 60);
        header("location: index.php"); // Redirect ke halaman index.php
    } else {
        // Verifikasi password hash
        if (password_verify($password, $data['password'])) {
            $_SESSION['nim'] = $data['nim']; // Set session nim
            $_SESSION['nama'] = $data['nama']; // Set session nama
            setcookie("message", "", time() - 60); // Hapus cookie message
            header("location: dashboard.php"); // Redirect ke halaman dashboard.php
            // Redirect berdasarkan status pengguna
            if ($data['status_akun'] == 'dosen') {
                header("location: dashboard_dosen.php"); // Redirect ke halaman dashboard_dosen.php
            } else {
                header("location: dashboard.php"); // Redirect ke halaman dashboard.php
            }
        } else {
            setcookie("message", "Maaf, NIM atau password salah", time() + 60);
            header("location: index.php"); // Redirect ke halaman index.php
        }
    }
} else {
    setcookie("message", "NIM atau password kosong", time() + 60);
    header("location: index.php"); // Redirect ke halaman index.php
}
?>
