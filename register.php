<?php
session_start();
// Pastikan koneksi ke database telah dibuat sebelumnya
include 'koneksi.php';

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Ambil nilai dari form
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query SQL untuk mengecek apakah username sudah ada dalam database
    $check_username_query = "SELECT * FROM users WHERE username='$username'";
    $check_username_result = mysqli_query($koneksi, $check_username_query);

    // Jika username sudah ada dalam database
    if (mysqli_num_rows($check_username_result) > 0) {
        // Tampilkan pesan alert
        $_SESSION['notification'] = "Username telah digunakan";
        // Redirect kembali ke halaman register
        header("Location: pages-register.php");
        exit();
    }

    // Hash password sebelum menyimpan ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query SQL untuk menyimpan data ke dalam tabel users
    $sql = "INSERT INTO users (username, password, nama) VALUES ('$username', '$hashed_password', '$name')";

    // Eksekusi query
    if (mysqli_query($koneksi, $sql)) {
        echo "Registration successful!";
        // Redirect ke halaman login atau halaman lainnya jika diperlukan
        header("Location: pages-login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
}
