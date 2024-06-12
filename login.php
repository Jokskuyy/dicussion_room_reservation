<?php
// session dimulai
session_start();
include("koneksi.php");
$username = $_POST['username'];
$password = $_POST['password'];

if ($username != '' && $password != '') {
    // query untuk mengecek apakah ada data user dengan username dan password yang dikirim dari form
    $sql = "SELECT * FROM akun WHERE username='$username' AND password='$password'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($query); // ambil data dari hasil query

    if (mysqli_num_rows($query) < 1) {
        // buat sebuah cookie untuk menampung data pesan kesalahan
        setcookie("message", "Maaf, username atau password salah", time() + 60);
        header("location: index.php"); // redirect ke halaman index.php
    } else {
        echo $data['username'] . $data['password'];
        $_SESSION['username'] = $data['username']; // set session username
        $_SESSION['nama'] = $data['nama']; // set session nama
        setcookie("message", "", time() - 60); // delete cookie message
        header("location: welcome.php"); // redirect ke halaman welcome.php
    }
} else {
    setcookie("message", "Username atau Password kosong", time() + 60);
    header("location: index.php"); // redirect ke halaman index.php
}
?>
