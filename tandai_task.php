<?php
// Sertakan file koneksi ke database di sini
include "koneksi.php";

// Pastikan permintaan adalah POST dan memiliki data ID task
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // Tangkap ID task dari permintaan POST
    $task_id = $_POST["id"];

    // Query untuk mengupdate status task menjadi "selesai" berdasarkan ID
    $sql = "UPDATE task SET status = 'selesai' WHERE id = $task_id";

    if (mysqli_query($koneksi, $sql)) {
        // Kirim respons ke JavaScript jika berhasil
        echo "Task berhasil ditandai sebagai selesai.";
    } else {
        // Kirim respons ke JavaScript jika terjadi kesalahan
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
} else {
    // Kirim respons ke JavaScript jika permintaan tidak valid
    echo "Permintaan tidak valid.";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
