<?php
// session dimulai
session_start();
// cek session untuk memeriksa user telah melakukan login atau belum
if (!isset($_SESSION['username'])) { // jika tidak ada session username
    header("location: index.php"); // redirect ke halaman index.php
}
?>
<html>
<head>
    <title>Halaman Setelah Login</title>
</head>
<body>
    <h1>Selamat datang <?php echo $_SESSION['nama']; ?></h1>
    <h4>Anda berhasil login ke dalam aplikasi.</h4>
    <a href="logout.php">Logout</a>
</body>
</html>
