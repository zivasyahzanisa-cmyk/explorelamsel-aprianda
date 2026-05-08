<?php
include 'koneksi.php';

// Pastikan request berasal dari form POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil semua data dari form
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $jam_buka = mysqli_real_escape_string($conn, $_POST['jam_buka']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    // Default gambar jika tidak diupload
    $gambar = 'default.jpg';

    // Jika ada file gambar diupload
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $gambar = uniqid() . '.' . $ext;

        // Pastikan folder uploads ada
        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }

        move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/' . $gambar);
    }

    // Query simpan ke database
    $query = "INSERT INTO destination (nama, kategori, alamat, jam_buka, deskripsi, gambar, tanggal_input)
              VALUES ('$nama', '$kategori', '$alamat', '$jam_buka', '$deskripsi', '$gambar', NOW())";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('✅ Destinasi berhasil ditambahkan!');
                window.location.href = 'tambah_destination.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Gagal menambahkan destinasi: " . mysqli_error($conn) . "');
                window.history.back();
              </script>";
    }
} else {
    // Jika bukan POST
    echo "<script>
            alert('Akses tidak sah!');
            window.location.href = 'tambah_destination.php';
          </script>";
}
?>
