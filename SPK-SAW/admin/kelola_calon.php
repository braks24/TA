<?php include '../config/database.php'; ?>
<?php include '../includes/admin_header.php'; ?>
<head>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<div class="container mt-5">
    <h1>Tambah Calon</h1>
    <form action="proses_tambah_calon.php" method="post" class="mt-4">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="pendapatan">Pendapatan:</label>
            <input type="number" class="form-control" id="pendapatan" name="pendapatan" required>
        </div>
        <div class="form-group">
            <label for="tanggungan">Jumlah Tanggungan:</label>
            <input type="number" class="form-control" id="tanggungan" name="tanggungan" required>
        </div>
        <div class="form-group">
            <label for="kondisi_rumah">Kondisi Rumah:</label>
            <select class="form-control" id="kondisi_rumah" name="kondisi_rumah" required>
                <option value="Baik">Baik</option>
                <option value="Sedang">Sedang</option>
                <option value="Buruk">Buruk</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status_pekerjaan">Status Pekerjaan:</label>
            <select class="form-control" id="status_pekerjaan" name="status_pekerjaan" required>
                <option value="Tetap">Tetap</option>
                <option value="Kontrak">Kontrak</option>
                <option value="Freelance">Freelance</option>
                <option value="Tidak Bekerja">Tidak Bekerja</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Calon</button>
        <button type="button" class="btn btn-secondary" onclick="window.history.back()">Kembali</button>
    </form>
</div>
<?php include '../includes/admin_footer.php'; ?>
