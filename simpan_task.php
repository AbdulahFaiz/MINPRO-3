<?php
// Mengimpor file koneksi.php untuk melakukan koneksi ke database
include 'koneksi.php';

// Memeriksa apakah form telah dikirimkan
if (isset($_POST['submit'])) {
    // Mengambil nilai dari form
    $label = $_POST['label'];
    $isi = $_POST['isi'];
    $prioritas = $_POST['prioritas'];
    $status = 'Belum Selesai'; // Set status default

    // Menyiapkan query SQL untuk menyimpan data ke dalam tabel task
    $sql = "INSERT INTO task (label, isi, prioritas, status) VALUES ('$label', '$isi', '$prioritas', '$status')";

    // Menjalankan query
    if (mysqli_query($koneksi, $sql)) {
        // Jika penyimpanan berhasil, kembalikan pengguna ke halaman utama
        header("Location: index.php");
        exit();
    } else {
        // Jika ada kesalahan, tampilkan pesan kesalahan
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    // Menutup koneksi database
    mysqli_close($koneksi);
}
