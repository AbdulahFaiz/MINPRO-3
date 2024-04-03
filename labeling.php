<?php
include 'koneksi.php';

// Query database untuk mengambil data tugas yang sudah dikelompokkan berdasarkan label
$sql = "SELECT label, GROUP_CONCAT(id) AS task_ids FROM task GROUP BY label";
$result = mysqli_query($koneksi, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<h2>" . $row['label'] . "</h2>";

        // Ambil id tugas yang sudah dikelompokkan
        $taskIds = explode(',', $row['task_ids']);

        echo "<div class='card mt-3'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>To Do List</h5>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-hover'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'>No.</th>";
        echo "<th scope='col'>Isi</th>";
        echo "<th scope='col'>Prioritas</th>";
        echo "<th scope='col'>Status</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Tampilkan detail data tugas berdasarkan id
        $nomor = 1;
        foreach ($taskIds as $taskId) {
            // Query untuk mengambil detail tugas berdasarkan id
            $detailSql = "SELECT * FROM task WHERE id = $taskId";
            $detailResult = mysqli_query($koneksi, $detailSql);
            if ($detailResult && mysqli_num_rows($detailResult) > 0) {
                $task = mysqli_fetch_assoc($detailResult);
                echo "<tr>";
                echo "<td>" . $nomor++ . "</td>";
                echo "<td>" . $task['isi'] . "</td>";
                echo "<td>" . $task['prioritas'] . "</td>";
                echo "<td>" . $task['status'] . "</td>";
                echo "</tr>";
            }
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
