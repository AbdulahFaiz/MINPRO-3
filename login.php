<?php
session_start();
// Pastikan koneksi ke database telah dibuat sebelumnya
include 'koneksi.php';

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Ambil nilai dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query SQL untuk mencari user dengan username yang cocok
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $sql);

    // Periksa apakah username ditemukan dalam database
    if (mysqli_num_rows($result) == 1) {
        // Ambil data user
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        // Verifikasi password
        if (password_verify($password, $hashed_password)) {
            // Jika password cocok, set status sesi login menjadi benar
            $_SESSION["login"] = true;

            header("Location: index.php");
            exit();
        } else {
            // Jika password tidak cocok, kembalikan ke halaman login dengan pesan error
            $_SESSION['notification'] = "Password tidak cocok";
            header("Location: pages-login.php");
            exit();
        }
    } else {
        // Jika username tidak ditemukan, kembalikan ke halaman login dengan pesan error
        $_SESSION['notification'] = "Username tidak cocok";
        header("Location: pages-login.php");
        exit();
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
}
