<?php include '../config/database.php'; ?>
<?php include '../includes/admin_header.php'; ?>
<head>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<div class="container mt-5">
    <h1>Kelola Kriteria</h1>
    <form action="proses_tambah_kriteria.php" method="post" class="mt-4">
        <div class="form-group">
            <label for="nama_kriteria">Nama Kriteria:</label>
            <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" required>
        </div>
        <div class="form-group">
            <label for="bobot">Bobot:</label>
            <input type="number" step="0.01" class="form-control" id="bobot" name="bobot" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Kriteria</button>
        <button type="button" class="btn btn-secondary" onclick="window.history.back()">Kembali</button>
    </form>
</div>
<?php include '../includes/admin_footer.php'; ?>
