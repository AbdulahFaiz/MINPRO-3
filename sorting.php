<?php
// Mengimpor file koneksi.php untuk melakukan koneksi ke database
include 'koneksi.php';

// Tentukan arah sorting berdasarkan parameter yang diberikan
$direction = ($_POST['direction'] == 'asc') ? 'ASC' : 'DESC';

// Query untuk mengambil data dari tabel "task" dan melakukan sorting berdasarkan kolom "prioritas" dengan arah yang ditentukan
$sql = "SELECT * FROM task ORDER BY FIELD(prioritas, 'rendah', 'sedang', 'tinggi') $direction";
$result = mysqli_query($koneksi, $sql);

// Tampilkan data dalam bentuk tabel
$nomor = 1;
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $nomor++ . "</td>";
    echo "<td>" . $row['label'] . "</td>";
    echo "<td>" . $row['isi'] . "</td>";
    echo "<td>" . $row['prioritas'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "</tr>";
}
