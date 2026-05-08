<?php
include 'koneksi.php';

// Simpan data jika form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jam_buka = $_POST['jam_buka'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = "Top Destination"; // otomatis

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

    echo "<script>alert('Top Destination berhasil ditambahkan!'); window.location='tambah_top_destination.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Top Destination - ExploreLamsel</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-screen font-sans text-gray-800">

<!-- 🌊 NAVBAR VISIT LAMSEL -->
<header class="fixed top-0 left-0 w-full z-50 bg-white/90 backdrop-blur-md shadow-sm">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
    <div class="flex items-center space-x-3">
      <img src="img/LOGO DINAS.png" alt="Logo" class="h-11 w-11 object-contain">
      <span class="text-gray-900 text-2xl font-bold tracking-tight">
        visit<span class="text-blue-600">Lamsel</span>
      </span>
    </div>

    <nav class="hidden md:flex space-x-6 text-gray-700 text-sm font-medium">
      <a href="index.php" class="hover:text-blue-600 transition">HOME</a>
      <a href="destination.php" class="text-blue-600 font-semibold">DESTINATION</a>
      <a href="tour.php" class="hover:text-blue-600 transition">TOUR PACKAGE</a>
      <a href="event.php" class="hover:text-blue-600 transition">EVENT</a>
      <a href="shop.php" class="hover:text-blue-600 transition">SHOP</a>
      <a href="news.php" class="hover:text-blue-600 transition">NEWS</a>
      <a href="contact.php" class="hover:text-blue-600 transition">CONTACT US</a>
      <a href="login.php" class="hover:text-blue-600 border-l border-gray-300 pl-4 transition">LOGIN</a>
    </nav>

    <!-- Mobile menu button -->
    <div class="md:hidden">
      <button id="menuBtn" class="text-gray-700 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="md:hidden hidden bg-white shadow-md px-6 py-4 space-y-3">
    <a href="homepage.php" class="block text-gray-700 hover:text-blue-600">HOME</a>
    <a href="destination.php" class="block text-blue-600 font-semibold">DESTINATION</a>
    <a href="tour.php" class="block text-gray-700 hover:text-blue-600">TOUR PACKAGE</a>
    <a href="event.php" class="block text-gray-700 hover:text-blue-600">EVENT</a>
    <a href="shop.php" class="block text-gray-700 hover:text-blue-600">SHOP</a>
    <a href="news.php" class="block text-gray-700 hover:text-blue-600">NEWS</a>
    <a href="contact.php" class="block text-gray-700 hover:text-blue-600">CONTACT US</a>
    <a href="login.php" class="block text-gray-700 hover:text-blue-600 border-t pt-2">LOGIN</a>
  </div>
</header>

<script>
  // Toggle mobile menu
  const menuBtn = document.getElementById('menuBtn');
  const mobileMenu = document.getElementById('mobileMenu');
  menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>

<!-- ✨ FORM TAMBAH TOP DESTINATION -->
<section class="max-w-2xl mx-auto bg-white mt-40 mb-20 p-10 rounded-3xl shadow-lg border border-blue-100">
  <h2 class="text-3xl font-bold text-center text-blue-700 mb-8">Tambah Top Destination</h2>

  <form method="POST" action="simpan_top_destination.php" enctype="multipart/form-data" class="space-y-5">
    <input type="text" name="nama" placeholder="Nama Destinasi" required
           class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">

    <input type="text" name="alamat" placeholder="Alamat" required 
           class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">

    <input type="text" name="jam_buka" placeholder="Jam Buka (contoh: 08.00 - 17.00)" required 
           class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">

    <textarea name="deskripsi" rows="4" placeholder="Deskripsi" required 
              class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500"></textarea>

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

</body>
</html>
