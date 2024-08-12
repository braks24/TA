<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $pendapatan = $_POST['pendapatan'];
    $tanggungan = $_POST['tanggungan'];
    $kondisi_rumah = $_POST['kondisi_rumah'];
    $status_pekerjaan = $_POST['status_pekerjaan'];

    $sql = "INSERT INTO calon (nama, pendapatan, tanggungan, kondisi_rumah, status_pekerjaan) VALUES ('$nama', '$pendapatan', '$tanggungan', '$kondisi_rumah', '$status_pekerjaan')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Data calon berhasil ditambahkan.');
                window.location.href = 'dashboard.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
