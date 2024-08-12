<?php include '../config/database.php'; ?>
<?php include '../includes/admin_header.php'; ?>
<div class="container mt-5">
    <h1>Perhitungan SAW</h1>
    <?php
    // Ambil data kriteria
    $sql_kriteria = "SELECT * FROM kriteria";
    $result_kriteria = $conn->query($sql_kriteria);
    $kriteria = array();
    while ($row = $result_kriteria->fetch_assoc()) {
        $kriteria[$row['nama_kriteria']] = $row['bobot'];
    }

    // Ambil data calon
    $sql_calon = "SELECT * FROM calon";
    $result_calon = $conn->query($sql_calon);
    $calon = array();
    while ($row = $result_calon->fetch_assoc()) {
        $calon[] = $row;
    }

    // Normalisasi data
    $max_pendapatan = max(array_column($calon, 'pendapatan'));
    $max_tanggungan = max(array_column($calon, 'tanggungan'));
    foreach ($calon as &$c) {
        $c['pendapatan'] = $c['pendapatan'] / $max_pendapatan;
        $c['tanggungan'] = $c['tanggungan'] / $max_tanggungan;
        $c['kondisi_rumah'] = ($c['kondisi_rumah'] == 'Baik') ? 3 : (($c['kondisi_rumah'] == 'Sedang') ? 2 : 1);
        $c['status_pekerjaan'] = ($c['status_pekerjaan'] == 'Tetap') ? 4 : (($c['status_pekerjaan'] == 'Kontrak') ? 3 : (($c['status_pekerjaan'] == 'Freelance') ? 2 : 1));
    }

    // Hitung nilai preferensi
    foreach ($calon as &$c) {
        $c['nilai'] = (
            $c['pendapatan'] * $kriteria['Pendapatan'] +
            $c['tanggungan'] * $kriteria['Jumlah Tanggungan'] +
            $c['kondisi_rumah'] * $kriteria['Kondisi Rumah'] +
            $c['status_pekerjaan'] * $kriteria['Status Pekerjaan']
        );
    }

    // Simpan nilai ke database
    foreach ($calon as $c) {
        $sql_update = "UPDATE calon SET nilai = '{$c['nilai']}' WHERE id = '{$c['id']}'";
        $conn->query($sql_update);
    }

    // Urutkan berdasarkan nilai preferensi
    usort($calon, function ($a, $b) {
        return $b['nilai'] <=> $a['nilai'];
    });

    // Tampilkan hasil
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
    foreach ($calon as $c) {
        echo "<tr>
                <td>{$c['nama']}</td>
                <td>{$c['pendapatan']}</td>
                <td>{$c['tanggungan']}</td>
                <td>{$c['kondisi_rumah']}</td>
                <td>{$c['status_pekerjaan']}</td>
                <td>{$c['nilai']}</td>
            </tr>";
    }
    echo "</tbody>
        </table>";
    ?>
    <button class="btn btn-primary mt-4" onclick="window.print()">Print Hasil</button>
    <button class="btn btn-secondary mt-4" onclick="window.history.back()">Kembali</button>
</div>
<?php include '../includes/admin_footer.php'; ?>
