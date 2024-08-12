<?php include '../config/database.php'; ?>
<?php include '../includes/admin_header.php'; ?>
<head>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<div class="container mt-5">
    <h1>Kelola Bobot</h1>
    <form action="proses_ubah_bobot.php" method="post" class="mt-4">
        <?php
        // Ambil data kriteria
        $sql_kriteria = "SELECT * FROM kriteria";
        $result_kriteria = $conn->query($sql_kriteria);
        while ($row = $result_kriteria->fetch_assoc()) {
            echo "<div class='form-group'>
                    <label for='{$row['nama_kriteria']}'>{$row['nama_kriteria']}:</label>
                    <input type='number' step='0.01' class='form-control' id='{$row['nama_kriteria']}' name='{$row['nama_kriteria']}' value='{$row['bobot']}' required>
                  </div>";
        }
        ?>
        <button type="submit" class="btn btn-primary">Ubah Bobot</button>
        <button type="button" class="btn btn-secondary" onclick="window.history.back()">Kembali</button>
    </form>
</div>
<?php include '../includes/admin_footer.php'; ?>
