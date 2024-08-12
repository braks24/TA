<?php
// Include file koneksi database
include '../config/database.php';

// Periksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama_kriteria = $_POST['nama_kriteria'];
    $bobot = $_POST['bobot'];

    // Perbarui bobot kriteria di database
    $sql = "UPDATE kriteria SET bobot = ? WHERE nama_kriteria= ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("di", $bobot, $nama_kriteria);

        if ($stmt->execute()) {
            // Redirect ke halaman dashboard dengan pesan sukses
            $_SESSION['message'] = "Bobot kriteria berhasil diubah.";
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Terjadi kesalahan: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }

    $conn->close();
} else {
    // Redirect ke halaman dashboard jika akses tidak melalui form submit
    header("Location: dashboard.php");
    exit;
}
?>
