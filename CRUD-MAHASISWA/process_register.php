<?php
require 'function.php';

// Mengambil data dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

// Pengecekan kelengkapan data
if (empty($username) || empty($password)) {
    header("location: register.php");
} else {
    // Query untuk memeriksa apakah username sudah digunakan sebelumnya
    $check_query = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($koneksi, $check_query);

    // Jika username sudah ada, arahkan kembali ke halaman register
   // Jika username sudah ada, arahkan kembali ke halaman register
if(mysqli_num_rows($result) > 0) {
    echo "<script>alert('Username sudah digunakan!'); window.location='register.php';</script>";
    exit();
    } else {
     // Jika username belum digunakan, lakukan penyisipan data
    $insert_query = "INSERT INTO admin(username, password) VALUES ('$username', '$password')";
    if(mysqli_query($koneksi, $insert_query)) {
        // Jika penyisipan data berhasil, tampilkan popup sukses dan arahkan ke halaman index
        echo "<script>alert('Username berhasil ditambahkan!'); window.location='index.php';</script>";
        exit();
    } else {
        // Jika terjadi kesalahan saat penyisipan data, tampilkan pesan kesalahan
        echo "<script>alert('Gagal menambahkan username!'); window.location='register.php';</script>";
        exit();
        }
    }
}
?>
