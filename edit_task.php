<?php
// Mengimpor file koneksi.php untuk melakukan koneksi ke database
include 'koneksi.php';

// Memeriksa apakah form untuk pengeditan telah dikirimkan
if (isset($_POST['edit'])) {
    // Mengambil nilai dari form
    $id = $_POST['id']; // Anda perlu menyertakan kolom id sebagai acuan untuk mengidentifikasi baris mana yang akan diedit
    $label = $_POST['label'];
    $isi = $_POST['isi'];
    $prioritas = $_POST['prioritas'];

    // Menyiapkan query SQL untuk mengupdate data di dalam tabel task berdasarkan id
    $sql = "UPDATE task SET label='$label', isi='$isi', prioritas='$prioritas' WHERE id='$id'";

    // Menjalankan query
    if (mysqli_query($koneksi, $sql)) {
        // Jika pengeditan berhasil, kembalikan pengguna ke halaman utama
        header("Location: index.php");
        exit();
    } else {
        // Jika ada kesalahan, tampilkan pesan kesalahan
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}

// Menutup koneksi database
mysqli_close($koneksi);
