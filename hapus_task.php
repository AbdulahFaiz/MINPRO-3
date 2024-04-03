<?php
// Mengimpor file koneksi.php untuk melakukan koneksi ke database
include 'koneksi.php';

// Memeriksa apakah form untuk penghapusan telah dikirimkan
if (isset($_POST['id'])) {
    // Mengambil nilai ID tugas yang akan dihapus
    $id = $_POST['id'];

    // Menyiapkan query SQL untuk menghapus data dari tabel task berdasarkan ID
    $sql = "DELETE FROM task WHERE id='$id'";

    // Menjalankan query
    if (mysqli_query($koneksi, $sql)) {
        // Jika penghapusan berhasil, kembalikan respons berhasil
        echo json_encode(array('status' => 'success', 'message' => 'Task deleted successfully.'));
    } else {
        // Jika ada kesalahan, kembalikan respons gagal
        echo json_encode(array('status' => 'error', 'message' => 'Failed to delete task.'));
    }
} else {
    // Jika tidak ada ID yang diterima, kembalikan respons gagal
    echo json_encode(array('status' => 'error', 'message' => 'ID is missing.'));
}

// Menutup koneksi database
mysqli_close($koneksi);
