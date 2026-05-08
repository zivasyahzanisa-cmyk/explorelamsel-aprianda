<?php
include 'koneksi.php';

// Cek apakah ID ada
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ambil data gambar dulu
    $query = mysqli_query($conn, "SELECT gambar FROM destination WHERE id = $id");
    $data = mysqli_fetch_assoc($query);

    if ($data) {

        // Hapus file gambar jika bukan default
        if (!empty($data['gambar']) && $data['gambar'] != 'default.jpg') {
            $file = 'uploads/' . $data['gambar'];
            if (file_exists($file)) {
                unlink($file);
            }
        }

        // Hapus data dari database
        $delete = mysqli_query($conn, "DELETE FROM destination WHERE id = $id");

        if ($delete) {
            header("Location: tambah_destination.php?status=hapus_sukses");
        } else {
            echo "Gagal hapus: " . mysqli_error($conn);
        }

    } else {
        echo "Data tidak ditemukan!";
    }

} else {
    header("Location: tambah_destination.php");
    exit;
}
?>