<?php include 'config/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Hasil Perangkingan</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="img/logo-jakarta.png" width="30px">
    <a class="navbar-brand" href="index.php">Kelurahan Cipinang</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <h1>Hasil Perangkingan</h1>
    <?php
    // Ambil data calon
    $sql_calon = "SELECT * FROM calon ORDER BY nilai DESC";
    $result_calon = $conn->query($sql_calon);

    if ($result_calon->num_rows > 0) {
        echo "<table class='table table-striped'>
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
    } else {
        echo "<p>Tidak ada data yang tersedia.</p>";
    }
    ?>
    <button class="btn btn-secondary mt-4" onclick="window.history.back()">Kembali</button>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
