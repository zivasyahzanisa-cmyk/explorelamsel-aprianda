<?php
include 'koneksi.php';

// Simpan data jika form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $alamat = $_POST['alamat'];
    $jam_buka = $_POST['jam_buka'];
    $deskripsi = $_POST['deskripsi'];

    // Upload gambar
    $gambar = 'default.jpg';
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $gambar = uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/' . $gambar);
    }

    // Simpan ke database
    $query = "INSERT INTO destination (nama, kategori, alamat, jam_buka, deskripsi, gambar, tanggal_input)
              VALUES ('$nama', '$kategori', '$alamat', '$jam_buka', '$deskripsi', '$gambar', NOW())";
    mysqli_query($conn, $query);
    header("Location: tambah_destination.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Destinasi - ExploreLamsel</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-screen font-sans text-gray-800">

<!-- 🔵 NAVBAR -->
<header class="absolute top-0 left-0 w-full z-50 bg-transparent">
  <div class="max-w-7xl mx-auto px-6 py-3">
    <div class="flex justify-between items-center bg-white rounded-xl shadow-md px-5 py-2.5">
      <div class="flex items-center space-x-3">
        <img src="img/LOGO DINAS.png" alt="Logo" class="h-11 w-11 object-contain">
        <span class="text-gray-800 text-xl font-bold hidden md:inline tracking-tight">
          visit<span class="text-blue-600">Lamsel</span>
        </span>
      </div>
      <nav class="hidden md:flex space-x-6 text-gray-800 text-sm font-medium tracking-wide">
        <a href="homepage.php" class="hover:text-blue-600 transition">HOME</a>
        <a href="destination.php" class="text-blue-600 font-semibold">DESTINATION</a>
        <a href="tour.php" class="hover:text-blue-600 transition">TOUR PACKAGE</a>
        <a href="event.php" class="hover:text-blue-600 transition">EVENT</a>
        <a href="shop.php" class="hover:text-blue-600 transition">SHOP</a>
        <a href="news.php" class="hover:text-blue-600 transition">NEWS</a>
        <a href="contact.php" class="hover:text-blue-600 transition">CONTACT US</a>
        <a href="login.php" class="hover:text-blue-600 border-l border-gray-300 pl-4 transition">LOGIN</a>
      </nav>
    </div>
  </div>
</header>

<!-- ✨ FORM TAMBAH DESTINASI -->
<section class="max-w-2xl mx-auto bg-white mt-36 mb-20 p-10 rounded-3xl shadow-lg border border-blue-100">
  <h2 class="text-3xl font-bold text-center text-blue-700 mb-8">Tambah Destinasi Baru</h2>

  <form method="POST" enctype="multipart/form-data" class="space-y-5">
    <input type="text" name="nama" placeholder="Nama Destinasi" required class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">
    <select name="kategori" required class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">
      <option value="">-- Pilih Kategori --</option>
      <option value="Top Destination">Top Destination</option>
      <option value="Cafe">Cafe</option>
      <option value="Wisata Alam">Wisata Alam</option>
      <option value="Pantai">Pantai</option>
      <option value="Taman">Taman</option>
      <option value="Kuliner">Kuliner</option>
      <option value="Budaya">Budaya</option>
    </select>
    <input type="text" name="alamat" placeholder="Alamat" required class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">
    <input type="text" name="jam_buka" placeholder="Jam Buka (contoh: 08.00 - 17.00)" required class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">
    <textarea name="deskripsi" rows="4" placeholder="Deskripsi" required class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500"></textarea>
    <input type="file" name="gambar" accept="image/*" class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">

    <div class="text-center pt-4">
      <button type="submit" class="bg-blue-600 text-white px-8 py-2.5 rounded-xl hover:bg-blue-700 transition">💾 Simpan</button>
    </div>
  </form>
</section>

<!-- 🔹 DAFTAR DESTINASI -->
<section class="max-w-6xl mx-auto px-5 mb-20">
  <h2 class="text-3xl font-bold text-blue-700 mb-5">Daftar Destinasi</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <?php
    $result = mysqli_query($conn, "SELECT * FROM destination ORDER BY id DESC");
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $imgPath = !empty($row['gambar']) ? 'uploads/' . $row['gambar'] : 'uploads/default.jpg';
        echo '
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
          <img src="' . $imgPath . '" class="w-full h-40 object-cover">
          <div class="p-4">
            <h3 class="font-bold text-lg text-blue-700">' . htmlspecialchars($row['nama']) . '</h3>
            <p class="text-gray-600 text-sm">' . htmlspecialchars($row['kategori']) . '</p>
            <p class="mt-2 text-gray-700 text-sm">' . htmlspecialchars($row['alamat']) . '</p>
            <p class="mt-1 text-gray-500 text-sm">' . htmlspecialchars($row['jam_buka']) . '</p>
            <div class="flex justify-between mt-4">
              <a href="edit_destination.php?id=' . $row['id'] . '" class="bg-yellow-400 text-white px-3 py-1 rounded-lg hover:bg-yellow-500 transition">✏️ Edit</a>
              <a href="hapus_destination.php?id=' . $row['id'] . '" onclick="return confirm(\'Yakin ingin hapus destinasi ini?\')" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition">🗑 Hapus</a>
            </div>
          </div>
        </div>';
      }
    } else {
      echo '<p class="text-gray-500 italic text-center py-10">Belum ada destinasi yang ditambahkan 🌿</p>';
    }
    ?>
  </div>
</section>

</body>
</html>
