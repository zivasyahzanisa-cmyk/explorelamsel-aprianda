<?php
include 'koneksi.php';

// Pastikan ID dikirim
if (!isset($_GET['id'])) {
    die("❌ ID produk tidak ditemukan.");
}

$id = intval($_GET['id']);
$result = mysqli_query($conn, "SELECT * FROM produk_umkm WHERE id_produk = $id LIMIT 1");
$produk = mysqli_fetch_assoc($result);
if (!$produk) die("❌ Produk tidak ditemukan.");

// Jika tombol hapus ditekan
if (isset($_POST['hapus'])) {
    // Hapus gambar jika bukan default
    if (!empty($produk['gambar_umkm']) && $produk['gambar_umkm'] !== 'default.jpg' && file_exists('uploads/' . $produk['gambar_umkm'])) {
        unlink('uploads/' . $produk['gambar_umkm']);
    }

    // Hapus dari database
    mysqli_query($conn, "DELETE FROM produk_umkm WHERE id_produk = $id");

    echo "<script>
        alert('🗑️ Produk berhasil dihapus!');
        window.location.href = 'tambah_umkm.php';
    </script>";
    exit;
}

// Simpan perubahan jika form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['hapus'])) {
    $nama      = mysqli_real_escape_string($conn, $_POST['produk']);
    $kategori  = mysqli_real_escape_string($conn, $_POST['kategori']);
    $harga     = mysqli_real_escape_string($conn, $_POST['harga']);
    $stok      = mysqli_real_escape_string($conn, $_POST['stok']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    $gambar = $produk['gambar_umkm']; // Gunakan gambar lama dulu

    // Jika ada gambar baru diupload
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif','webp','heic','avif','bmp','svg'];

        if (in_array($ext, $allowed)) {
            if ($ext === 'jpeg') $ext = 'jpg';
            $gambarBaru = uniqid('umkm_') . '.' . $ext;

            // Hapus gambar lama jika bukan default
            if ($produk['gambar_umkm'] !== 'default.jpg' && file_exists('uploads/' . $produk['gambar_umkm'])) {
                unlink('uploads/' . $produk['gambar_umkm']);
            }

            // Upload gambar baru
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/' . $gambarBaru);
            $gambar = $gambarBaru;
        }
    }

    // Update data
    $query = "UPDATE produk_umkm SET 
                produk_umkm = '$nama',
                kategori_umkm = '$kategori',
                harga_umkm = '$harga',
                stok_umkm = '$stok',
                gambar_umkm = '$gambar',
                deskripsi_umkm = '$deskripsi'
              WHERE id_produk = $id";
    mysqli_query($conn, $query);

    echo "<script>
        alert('✅ Perubahan berhasil disimpan!');
        window.location.href = 'tambah_umkm.php';
    </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Produk UMKM - visitLamsel</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-screen font-sans text-gray-800">

<section class="max-w-2xl mx-auto bg-white mt-36 mb-20 p-10 rounded-3xl shadow-lg border border-blue-100">
<h2 class="text-3xl font-bold text-center text-blue-700 mb-8">Edit Produk UMKM</h2>

<form method="POST" enctype="multipart/form-data" class="space-y-5">

  <input type="text" name="produk" placeholder="Nama Produk" required
         value="<?php echo htmlspecialchars($produk['produk_umkm']); ?>"
         class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">

  <select name="kategori" required class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">
    <option value="">-- Pilih Kategori --</option>
    <?php
    $categories = ["Agribisnis","Fashion","Kerajinan Tangan","Kopi","Oleh-Oleh","Tenun & Songket"];
    foreach ($categories as $cat) {
        $selected = ($produk['kategori_umkm'] == $cat) ? "selected" : "";
        echo "<option value='$cat' $selected>$cat</option>";
    }
    ?>
  </select>

  <input type="number" name="harga" placeholder="Harga Produk" required 
         value="<?php echo htmlspecialchars($produk['harga_umkm']); ?>"
         class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">

  <input type="number" name="stok" placeholder="Stok Produk" required
         value="<?php echo htmlspecialchars($produk['stok_umkm']); ?>"
         class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">

  <textarea name="deskripsi" rows="4" placeholder="Deskripsi Produk" class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500"><?php echo htmlspecialchars($produk['deskripsi_umkm']); ?></textarea>

  <p class="text-sm text-gray-500">📸 Gambar saat ini:</p>
  <img src="uploads/<?php echo htmlspecialchars($produk['gambar_umkm']); ?>" 
       class="w-48 h-32 object-cover rounded mb-3 border">

  <input type="file" name="gambar" accept="image/*" class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">

  <div class="flex justify-between pt-4">
    <button type="submit" class="bg-blue-600 text-white px-6 py-2.5 rounded-xl hover:bg-blue-700 transition">
      💾 Simpan Perubahan
    </button>

    <button type="submit" name="hapus" class="bg-red-500 text-white px-6 py-2.5 rounded-xl hover:bg-red-600 transition"
            onclick="return confirm('Yakin ingin menghapus produk ini?')">
      🗑 Hapus Produk
    </button>
  </div>

</form>
</section>

</body>
</html>
