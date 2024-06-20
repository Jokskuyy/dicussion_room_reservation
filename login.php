<?php
// session dimulai
session_start();
include("koneksi.php");
$nim = $_POST['nim'];
$password = $_POST['password'];

if ($nim != '' && $password != '') {
    // query untuk mengecek apakah ada data user dengan nim dan password yang dikirim dari form
    $sql = "SELECT * FROM akun WHERE nim='$nim' AND password='$password'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($query); // ambil data dari hasil query

    if (mysqli_num_rows($query) < 1) {
        // buat sebuah cookie untuk menampung data pesan kesalahan
        setcookie("message", "Maaf, nim atau password salah", time() + 60);
        header("location: index.php"); // redirect ke halaman index.php
    } else {
        echo $data['nim'] . $data['password'];
        $_SESSION['nim'] = $data['nim']; // set session nim
        $_SESSION['nama'] = $data['nama']; // set session nama
        setcookie("message", "", time() - 60); // delete cookie message
        header("location: dashboard.php"); // redirect ke halaman welcome.php
    }
} else {
    setcookie("message", "nim atau Password kosong", time() + 60);
    header("location: index.php"); // redirect ke halaman index.php
}
?>
