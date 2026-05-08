<?php
include 'koneksi.php';

// Pastikan form dikirim lewat POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $jam_buka = mysqli_real_escape_string($conn, $_POST['jam_buka']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $kategori = "Top Destination"; // otomatis

    // 🖼️ Upload Gambar
    $gambar = 'default.jpg';
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $gambar = uniqid('top_') . '.' . $ext;
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/' . $gambar);
    }

    // 💾 Simpan ke database
    $query = "INSERT INTO destination (nama, kategori, alamat, jam_buka, deskripsi, gambar, tanggal_input)
              VALUES ('$nama', '$kategori', '$alamat', '$jam_buka', '$deskripsi', '$gambar', NOW())";

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('✅ Top Destination berhasil ditambahkan!');
            window.location = 'homepage.php';
        </script>";
    } else {
        echo "<script>
            alert('❌ Gagal menyimpan data: " . mysqli_error($conn) . "');
            window.location = 'tambah_top_destination.php';
        </script>";
    }
} else {
    // Jika bukan POST, kembali ke form
    header('Location: tambah_top_destination.php');
    exit;
}
?>
