<?php include '../config/database.php'; ?>
<?php include '../includes/admin_header.php'; ?>
<div class="container mt-5">
    <h1>Hasil Perangkingan</h1>
    <?php
    // Ambil data calon yang telah diurutkan berdasarkan nilai
    $sql_calon = "SELECT * FROM calon ORDER BY nilai DESC";
    $result_calon = $conn->query($sql_calon);
    echo "<table class='table table-striped mt-4'>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Pendapatan</th>
                    <th>Jumlah Tanggungan</th>
                    <th>Kondisi Rumah</th>
                    <th>Status Pekerjaan</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>";
    while ($row = $result_calon->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nama']}</td>
                <td>{$row['pendapatan']}</td>
                <td>{$row['tanggungan']}</td>
                <td>{$row['kondisi_rumah']}</td>
                <td>{$row['status_pekerjaan']}</td>
                <td>{$row['nilai']}</td>
            </tr>";
    }
    echo "</tbody>
        </table>";
    ?>
    <button class="btn btn-primary mt-4" onclick="window.print()">Print Hasil</button>
    <button class="btn btn-secondary mt-4" onclick="window.history.back()">Kembali</button>
</div>
<?php include '../includes/admin_footer.php'; ?>
