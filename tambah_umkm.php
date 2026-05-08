<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Produk UMKM - ExploreLamsel</title>
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
        <a href="shop.php" class="text-blue-600 font-semibold">SHOP</a>
        <a href="kategori.php" class="hover:text-blue-600 transition">KATEGORI</a>
        <a href="news.php" class="hover:text-blue-600 transition">NEWS</a>
      </nav>
    </div>
  </div>
</header>

<!-- ✨ FORM TAMBAH PRODUK UMKM -->
<section class="max-w-2xl mx-auto bg-white mt-36 mb-20 p-10 rounded-3xl shadow-lg border border-blue-100">
  <h2 class="text-3xl font-bold text-center text-blue-700 mb-8">Tambah Produk UMKM</h2>

  <form action="simpan_umkm.php" method="POST" enctype="multipart/form-data" class="space-y-5">
    <input type="text" name="produk" placeholder="Nama Produk" required
           class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">

    <select name="kategori" required class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">
      <option value="">-- Pilih Kategori --</option>
      <option value="Agribisnis">Agribisnis</option>
      <option value="Fashion">Fashion</option>
      <option value="Kerajinan Tangan">Kerajinan Tangan</option>
      <option value="Kopi">Kopi</option>
      <option value="Oleh-Oleh">Oleh-Oleh</option>
      <option value="Tenun & Songket">Tenun & Songket</option>
    </select>

    <textarea name="deskripsi" rows="4" placeholder="Deskripsi produk..." 
              class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500"></textarea>

    <input type="number" name="harga" placeholder="Harga Produk" required 
           class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">

    <input type="number" name="stok" placeholder="Stok Produk" required 
           class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">

    <input type="text" name="ukuran" placeholder="Ukuran produk (contoh: S, M, L, XL / 100 gram, 500 gram)" 
           class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">
    
    <input type="text" name="warna" placeholder="Warna produk (contoh: Hitam, Putih, Coklat)" 
           class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">

    <input type="file" name="gambar" accept="image/*" 
           class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">

    <div class="text-center pt-4">
      <button type="submit" 
              class="bg-blue-600 text-white px-8 py-2.5 rounded-xl hover:bg-blue-700 transition">
        💾 Simpan
      </button>
    </div>
  </form>
</section>

<!-- 🔹 DAFTAR PRODUK UMKM -->
<section class="max-w-6xl mx-auto px-5 mb-20">
  <h2 class="text-3xl font-bold text-blue-700 mb-5">Daftar Produk UMKM</h2>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
  <?php
  $result = mysqli_query($conn, "SELECT * FROM produk_umkm ORDER BY id_produk DESC");
  if(mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
          $imgPath = !empty($row['gambar_umkm']) ? 'uploads/' . $row['gambar_umkm'] : 'uploads/default.jpg';
          echo '
          <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300">
              <img src="' . $imgPath . '" class="w-full h-48 object-cover">
              <div class="p-4">
                  <h3 class="font-bold text-lg text-blue-700">' . htmlspecialchars($row['produk_umkm']) . '</h3>
                  <p class="text-gray-600 text-sm mt-1 line-clamp-3">' . htmlspecialchars($row['deskripsi_umkm']) . '</p>
                  <p class="text-gray-600 text-sm mt-2">Kategori: ' . htmlspecialchars($row['kategori_umkm']) . '</p>
                  <p class="mt-2 text-gray-700 text-sm">Harga: Rp ' . number_format($row['harga_umkm'],0,',','.') . '</p>
                  <p class="text-gray-500 text-sm">Stok: ' . $row['stok_umkm'] . '</p>';

          if (!empty($row['ukuran_umkm'])) {
              echo '<p class="text-gray-500 text-sm mt-1">Ukuran: ' . htmlspecialchars($row['ukuran_umkm']) . '</p>';
          }
          if (!empty($row['warna_umkm'])) {
              echo '<p class="text-gray-500 text-sm">Warna: ' . htmlspecialchars($row['warna_umkm']) . '</p>';
          }

          echo '
                  <div class="flex justify-between mt-4">
                    <a href="edit_umkm.php?id=' . $row['id_produk'] . '" class="bg-yellow-400 text-white px-3 py-1 rounded-lg hover:bg-yellow-500 transition">✏️ Edit</a>
                    <a href="hapus_umkm.php?id=' . $row['id_produk'] . '" onclick="return confirm(\'Yakin ingin hapus produk ini?\')" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition">🗑 Hapus</a>
                  </div>
              </div>
          </div>';
      }
  } else {
      echo '<p class="text-gray-500 italic text-center py-10">Belum ada produk yang ditambahkan 🛍️</p>';
  }
  ?>
  </div>
</section>

</body>
</html>
