<?php
include 'koneksi.php';

// Pastikan request berasal dari form POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Ambil data dari form dengan keamanan dasar
    $produk   = mysqli_real_escape_string($conn, $_POST['produk'] ?? '');
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori'] ?? '');
    $harga    = mysqli_real_escape_string($conn, $_POST['harga'] ?? 0);
    $stok     = mysqli_real_escape_string($conn, $_POST['stok'] ?? 0);
    $ukuran   = mysqli_real_escape_string($conn, $_POST['ukuran'] ?? '');
    $warna    = mysqli_real_escape_string($conn, $_POST['warna'] ?? '');
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi'] ?? '');

    // Pastikan kategori dipilih
    if($kategori == '') {
        echo "<script>
            alert('❌ Pilih kategori terlebih dahulu!');
            window.history.back();
        </script>";
        exit;
    }

    // Default gambar jika tidak diupload
    $gambar = 'default.jpg';

    // Jika ada file gambar diupload
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif','webp','heic','avif','bmp','svg'];

        // Cek format file
        if (!in_array($ext, $allowed)) {
            echo "<script>
                alert('❌ Format file tidak didukung! Gunakan JPG, PNG, GIF, WEBP, HEIC, AVIF, BMP, atau SVG.');
                window.history.back();
            </script>";
            exit;
        }

        // Ubah .jpeg menjadi .jpg
        if($ext === 'jpeg') $ext = 'jpg';

        // Pastikan folder uploads ada
        $uploadDir = 'uploads/';
        if(!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

        // Nama file unik
        $gambar = uniqid('umkm_') . '.' . $ext;

        // Simpan file
        if(!move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadDir . $gambar)) {
            echo "<script>
                alert('⚠️ Gagal mengunggah gambar. Pastikan folder \"uploads\" bisa ditulisi.');
                window.history.back();
            </script>";
            exit;
        }
    }

    // Simpan data ke database
    $query = "INSERT INTO produk_umkm 
              (produk_umkm, kategori_umkm, harga_umkm, stok_umkm, ukuran_umkm, warna_umkm, deskripsi_umkm, gambar_umkm)
              VALUES 
              ('$produk', '$kategori', '$harga', '$stok', '$ukuran', '$warna', '$deskripsi', '$gambar')";

    if(mysqli_query($conn, $query)) {
        echo "<script>
            alert('✅ Produk UMKM berhasil ditambahkan!');
            window.location.href = 'tambah_umkm.php';
        </script>";
    } else {
        $error = mysqli_error($conn);
        echo "<script>
            alert('❌ Gagal menambahkan produk: $error');
            window.history.back();
        </script>";
    }

} else {
    // Jika bukan metode POST
    echo "<script>
        alert('Akses tidak sah!');
        window.location.href = 'tambah_umkm.php';
    </script>";
}
?>
