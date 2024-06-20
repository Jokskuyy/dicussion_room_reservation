<?php
session_start();
include("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $nim = $_POST['nim'];
    $email = $_POST['regEmail'];
    $password = $_POST['regPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validasi NIM
    if (!preg_match('/^\d{10}$/', $nim)) {
        echo "<script>alert('NIM harus berupa angka sepanjang 10 angka.');</script>";
        echo "<script>window.location.href='index.php';</script>";
        exit();
    }

    // Validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Format email tidak valid.');</script>";
        echo "<script>window.location.href='index.php';</script>";
        exit();
    }


    // Validasi password
    if (strlen($password) < 10) {
        echo "<script>alert('Password harus minimal sepanjang 10 karakter.');</script>";
        echo "<script>window.location.href='index.php';</script>";
        exit();
    }

    // Validasi konfirmasi password
    if ($password !== $confirmPassword) {
        echo "<script>alert('Password dan Konfirmasi Password tidak cocok.');</script>";
        echo "<script>window.location.href='index.php';</script>";
        exit();
    }

    // Cek apakah NIM atau email sudah terdaftar
    $checkQuery = "SELECT * FROM akun WHERE nim = '$nim' OR email = '$email'";
    $checkResult = mysqli_query($koneksi, $checkQuery);

    if (!$checkResult) {
        die("Query gagal: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('NIM atau Email sudah terdaftar.');</script>";
        echo "<script>window.location.href='index.php';</script>";
        exit();
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert data ke database
    $query = "INSERT INTO akun (nama, nim, email, password) VALUES ('$name', '$nim', '$email', '$hashedPassword')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Registrasi berhasil! Silakan login.');</script>";
        echo "<script>window.location.href='index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Registrasi gagal. Silakan coba lagi.');</script>";
        echo "<script>window.location.href='index.php';</script>";
        exit();
    }
} else {
    echo "<script>window.location.href='index.php';</script>";
}
?>
