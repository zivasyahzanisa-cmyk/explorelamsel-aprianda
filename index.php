<?php
?><!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Explore Lamsel - Jelajahi Wisata dan Kerajinan Tradisional</title>
  <link rel="icon" href="img/LOGO DINAS.png" type="image/png">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* small additional styles to match the provided design */
    .hero-title { text-shadow: 0 2px 0 rgba(0,0,0,0.2); }
    /* hide default scrollbar for horizontal sections on some browsers for cleaner look */
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
  </style>
</head>
<body class="font-sans bg-white text-gray-800">
  
<?php
// Tentukan halaman aktif
$currentPage = basename($_SERVER['PHP_SELF']); // misal homepage.php
?>
<header class="absolute top-0 left-0 w-full z-50 bg-transparent">
  <div class="max-w-7xl mx-auto px-6 py-3">
    <div class="flex justify-between items-center bg-white rounded-xl shadow-md px-5 py-2.5">
      
      <!-- Logo dan teks -->
      <div class="flex items-center space-x-3">
        <a href="/visitlamsel/homepage.php" class="flex items-center space-x-2">
          <img src="/visitlamsel/img/LOGO DINAS.png" alt="Logo" class="h-11 w-11 object-contain">
          <span class="text-gray-800 text-xl font-bold hidden md:inline tracking-tight">
            Explore<span class="text-blue-300 font-extrabold">Lamsel</span>
          </span>
        </a>
      </div>

      <!-- Menu utama desktop -->
      <nav class="hidden md:flex space-x-6 text-gray-800 text-sm font-medium tracking-wide">
        <a href="/visitlamsel/homepage.php" class="<?= $currentPage=='homepage.php'?'text-blue-600 font-semibold border-b-2 border-blue-600 pb-1':'hover:text-blue-600 transition' ?>">HOME</a>
        <a href="/visitlamsel/destination.php" class="<?= $currentPage=='destination.php'?'text-blue-600 font-semibold border-b-2 border-blue-600 pb-1':'hover:text-blue-600 transition' ?>">DESTINATION</a>
        <a href="/visitlamsel/tour.php" class="<?= $currentPage=='tour.php'?'text-blue-600 font-semibold border-b-2 border-blue-600 pb-1':'hover:text-blue-600 transition' ?>">TOUR PACKAGE</a>
        <a href="/visitlamsel/event.php" class="<?= $currentPage=='event.php'?'text-blue-600 font-semibold border-b-2 border-blue-600 pb-1':'hover:text-blue-600 transition' ?>">EVENT</a>
        <a href="/visitlamsel/shop.php" class="<?= $currentPage=='shop.php'?'text-blue-600 font-semibold border-b-2 border-blue-600 pb-1':'hover:text-blue-600 transition' ?>">SHOP</a>
        <a href="/visitlamsel/news.php" class="<?= $currentPage=='news.php'?'text-blue-600 font-semibold border-b-2 border-blue-600 pb-1':'hover:text-blue-600 transition' ?>">NEWS</a>
        <a href="/visitlamsel/contact.php" class="<?= $currentPage=='contact.php'?'text-blue-600 font-semibold border-b-2 border-blue-600 pb-1':'hover:text-blue-600 transition' ?>">CONTACT US</a>
        <a href="/visitlamsel/login.php" class="<?= $currentPage=='login.php'?'text-blue-600 font-semibold border-b-2 border-blue-600 pb-1':'hover:text-blue-600 transition' ?> border-l border-gray-300 pl-4">LOGIN</a>
      </nav>

      <!-- Tombol menu mobile -->
      <div class="md:hidden">
        <button id="menu-toggle" aria-label="menu" class="text-gray-800 text-2xl">☰</button>
      </div>
    </div>
  </div>

  <!-- Menu mobile -->
  <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md rounded-xl max-w-sm mx-auto mt-2 p-4 space-y-3">
    <a href="/visitlamsel/homepage.php" class="block hover:text-blue-600">HOME</a>
    <a href="/visitlamsel/destination.php" class="block hover:text-blue-600">DESTINATION</a>
    <a href="/visitlamsel/tour.php" class="block hover:text-blue-600">TOUR PACKAGE</a>
    <a href="/visitlamsel/event.php" class="block hover:text-blue-600">EVENT</a>
    <a href="/visitlamsel/shop.php" class="block hover:text-blue-600">SHOP</a>
    <a href="/visitlamsel/news.php" class="block hover:text-blue-600">NEWS</a>
    <a href="/visitlamsel/contact.php" class="block hover:text-blue-600">CONTACT US</a>
    <a href="/visitlamsel/login.php" class="block hover:text-blue-600">LOGIN</a>
  </div>
</header>

<script>
  const toggleButton = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  toggleButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>

<!-- Tambahkan di bagian <head> jika belum ada -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
  body {
    font-family: 'Poppins', sans-serif;
  }
  .hero-title {
    font-family: 'Poppins', sans-serif;
    line-height: 1.1;
  }
</style>

<!-- HERO SECTION FINAL HD -->
<section class="relative h-screen flex items-center justify-center text-left text-white overflow-hidden font-[Poppins]">
  <!-- Background HD Full -->
  <img src="img/siger.png" alt="Hero Background" 
       class="absolute inset-0 w-full h-full object-cover">

  <!-- Overlay modern -->
  <div class="absolute inset-0 bg-gradient-to-b from-black/10 via-black/0 to-black/20"></div>

  <!-- Konten -->
  <div class="relative z-10 max-w-6xl w-full px-6 md:px-0 mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
      
      <!-- 🔹 Teks Hero -->
      <div class="md:col-span-7 mt-8 md:mt-28">
        <h1 class="hero-title text-5xl md:text-7xl font-extrabold text-white">
          Explore <br>
          <div class="text-blue-300 font-extrabold whitespace-nowrap"> Lampung Selatan</div>
        </h1>
        <p class="mt-5 text-base md:text-lg text-white/90 max-w-xl">
          Jelajahi Destinasi kelas <span class="font-semibold">Dunia</span> yang mungkin belum pernah kamu ketahui di <span class="font-semibold">Lampung Selatan.</span>
        </p>

        <!-- 🔍 SEARCH BAR -->
        <div class="mt-10 bg-white rounded-lg shadow-lg flex flex-col md:flex-row items-stretch md:items-center justify-between max-w-3xl overflow-hidden">
          <select class="flex-1 p-4 border-b md:border-b-0 md:border-r outline-none text-gray-700">
            <option>Tour Type</option>
            <option>Adventure</option>
            <option>Culture</option>
            <option>Nature</option>
          </select>
          <select class="flex-1 p-4 border-b md:border-b-0 md:border-r outline-none text-gray-700">
            <option>Destination</option>
            <option>Gunung Rajabasa</option>
            <option>Pulau Sebesi</option>
            <option>Pantai</option>
          </select>
          <select class="flex-1 p-4 outline-none text-gray-700">
            <option>When</option>
            <option>Januari</option>
            <option>Juni</option>
            <option>Desember</option>
          </select>
          <button class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-4 flex items-center justify-center">
            🔍
          </button>
        </div>
      </div>

      <div class="md:col-span-5 hidden md:block"></div>
    </div>
  </div>
</section>

<!-- SLIDER SECTION - Full White Background -->
<section class="relative bg-white py-16 -mt-10">
  <div class="max-w-7xl mx-auto px-8">
    <!-- Carousel -->
    <div class="carousel flex justify-start space-x-8 overflow-x-auto no-scrollbar snap-x snap-mandatory scroll-smooth items-start pl-8 pr-8"
         style="scroll-padding-left: calc((100vw - 420px) / 2);">
      
      <!-- CARD 1 -->
      <div class="card min-w-[420px] max-w-[420px] flex-shrink-0 snap-center rounded-[35px] overflow-hidden bg-white shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
        <div class="relative w-full h-[270px] flex items-center justify-center bg-white overflow-hidden rounded-[35px]">
          <img src="img/bupati.png" alt="Trip 1" class="w-full h-full object-contain rounded-[35px]">
        </div>
      </div>

      <!-- CARD 2 -->
      <div class="card min-w-[420px] max-w-[420px] flex-shrink-0 snap-center rounded-[35px] overflow-hidden bg-white shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
        <div class="relative w-full h-[270px] flex items-center justify-center bg-white overflow-hidden rounded-[35px]">
          <img src="img/umkmnaikkelas.png" alt="Trip 2" class="w-full h-full object-contain rounded-[35px]">
        </div>
      </div>

      <!-- CARD 3 -->
      <div class="card min-w-[420px] max-w-[420px] flex-shrink-0 snap-center rounded-[35px] overflow-hidden bg-white shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
        <div class="relative w-full h-[270px] flex items-center justify-center bg-white overflow-hidden rounded-[35px]">
          <img src="img/beach.png" alt="Trip 3" class="w-full h-full object-contain rounded-[35px]">
        </div>
      </div>

      <!-- CARD 4 -->
      <div class="card min-w-[420px] max-w-[420px] flex-shrink-0 snap-center rounded-[35px] overflow-hidden bg-white shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
        <div class="relative w-full h-[270px] flex items-center justify-center bg-white overflow-hidden rounded-[35px]">
          <img src="img/naikkelas.png" alt="Trip 4" class="w-full h-full object-contain rounded-[35px]">
        </div>
      </div>

      <!-- CARD 5 -->
      <div class="card min-w-[420px] max-w-[420px] flex-shrink-0 snap-center rounded-[35px] overflow-hidden bg-white shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
        <div class="relative w-full h-[270px] flex items-center justify-center bg-white overflow-hidden rounded-[35px]">
          <img src="img/berkelanjutan.png" alt="Trip 5" class="w-full h-full object-contain rounded-[35px]">
        </div>
      </div>

      <!-- CARD 6 -->
      <div class="card min-w-[420px] max-w-[420px] flex-shrink-0 snap-center rounded-[35px] overflow-hidden bg-white shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
        <div class="relative w-full h-[270px] flex items-center justify-center bg-white overflow-hidden rounded-[35px]">
          <img src="img/jelajah.png" alt="Trip 6" class="w-full h-full object-contain rounded-[35px]">
        </div>
      </div>
    </div>

    <!-- Modern Pagination Dots -->
    <div class="dots flex justify-center mt-8 space-x-2">
      <button class="dot w-3 h-3 rounded-full bg-gray-300 transition-all duration-500 ease-in-out"></button>
      <button class="dot w-3 h-3 rounded-full bg-gray-300 transition-all duration-500 ease-in-out"></button>
      <button class="dot w-3 h-3 rounded-full bg-gray-300 transition-all duration-500 ease-in-out"></button>
    </div>
  </div>
</section>

<!-- JS: Smart Active Dot + Auto Scroll -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.querySelector('.carousel');
    const cards = document.querySelectorAll('.card');
    const dots = document.querySelectorAll('.dot');
    let index = 0;
    let autoScrollInterval;

    const updateDots = () => {
      const scrollPos = carousel.scrollLeft + carousel.offsetWidth / 2;
      let active = 0;
      cards.forEach((card, i) => {
        const center = card.offsetLeft + card.offsetWidth / 2;
        if (scrollPos >= center - card.offsetWidth / 2 && scrollPos < center + card.offsetWidth / 2) {
          active = i;
        }
      });
      dots.forEach((dot, i) => {
        if (i === active % dots.length) {
          dot.classList.add('bg-blue-600');
          dot.classList.remove('bg-gray-300');
          dot.style.width = '28px';
          dot.style.borderRadius = '9999px';
        } else {
          dot.classList.remove('bg-blue-600');
          dot.classList.add('bg-gray-300');
          dot.style.width = '12px';
        }
      });
    };

    const autoScroll = () => {
      index = (index + 1) % cards.length;
      carousel.scrollTo({
        left: cards[index].offsetLeft - 32,
        behavior: 'smooth'
      });
      updateDots();
    };

    autoScrollInterval = setInterval(autoScroll, 3000); // ⏳ auto scroll tiap 3 detik
    carousel.addEventListener('scroll', updateDots);
    window.addEventListener('load', updateDots);

    dots.forEach((dot, i) => {
      dot.addEventListener('click', () => {
        index = i;
        carousel.scrollTo({
          left: cards[i].offsetLeft - 32,
          behavior: 'smooth'
        });
        clearInterval(autoScrollInterval);
        autoScrollInterval = setInterval(autoScroll, 3000);
      });
    });
  });
</script>

<style>
  body {
    background-color: #ffffff;
  }
  .no-scrollbar::-webkit-scrollbar {
    display: none;
  }
  .no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>

<!-- 🌟 TOP DESTINATION SECTION -->
<section class="bg-white py-16 md:py-20 relative overflow-hidden font-poppins">
  <div class="max-w-6xl mx-auto px-4 md:px-6 relative z-10">
    
<!-- 🌍 JUDUL SECTION -->
<h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-8 text-left pl-2 md:pl-0 leading-snug tracking-tight">
  <span class="bg-gradient-to-r from-blue-600 to-sky-400 bg-clip-text text-transparent">Top</span>
  <span class="text-gray-900">Destinations</span>
</h2>

    <!-- Scroll Container -->
    <div class="relative">
      <!-- Tombol kiri -->
      <button id="scrollLeft" 
        class="absolute left-0 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-blue-600 hover:text-white
               text-gray-700 rounded-full shadow-lg w-10 h-10 flex items-center justify-center z-20 transition-all duration-300 ease-in-out backdrop-blur-sm border border-gray-200">
        &#10094;
      </button>

      <!-- Wrapper scroll -->
      <div id="destinationScroll" 
           class="flex overflow-x-auto scroll-smooth space-x-8 scrollbar-hide px-2 py-4">

        <?php
        include 'koneksi.php';
        $query_top = "SELECT * FROM destination ORDER BY tanggal_input DESC";
        $result_top = mysqli_query($conn, $query_top);

        if (mysqli_num_rows($result_top) > 0) {
          while ($row = mysqli_fetch_assoc($result_top)) {
            $id = $row['id'];
            $nama = $row['nama'];
            $gambar = !empty($row['gambar']) ? 'uploads/' . $row['gambar'] : 'img/default.jpg';
            $alamat = $row['alamat'];
        ?>
          <!-- ✨ Card -->
          <a href="detail_destination.php?id=<?php echo $id; ?>" 
             class="w-[260px] sm:w-[280px] md:w-[300px] lg:w-[310px] flex-shrink-0
                    bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl
                    transform hover:-translate-y-2 transition-all duration-500 ease-out block group">

            <div class="relative w-full h-[230px] overflow-hidden bg-gray-100">
              <img src="<?php echo htmlspecialchars($gambar); ?>" 
                   alt="<?php echo htmlspecialchars($nama); ?>" 
                   class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
              <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-70 group-hover:opacity-50 transition duration-500"></div>
            </div>

            <div class="p-5 text-left">
              <h3 class="text-lg font-semibold text-gray-900 leading-snug mb-1 line-clamp-1">
                <?php echo htmlspecialchars($nama); ?>
              </h3>
              <p class="text-sm text-gray-500 truncate flex items-center gap-1">
                📍 <?php echo htmlspecialchars($alamat); ?>
              </p>
            </div>
          </a>
        <?php
          }
        } else {
          echo "<p class='text-gray-500 text-center italic py-10 w-full'>Belum ada destinasi ditambahkan 🌿</p>";
        }
        ?>
      </div>

      <!-- Tombol kanan -->
      <button id="scrollRight" 
        class="absolute right-0 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-blue-600 hover:text-white
               text-gray-700 rounded-full shadow-lg w-10 h-10 flex items-center justify-center z-20 transition-all duration-300 ease-in-out backdrop-blur-sm border border-gray-200">
        &#10095;
      </button>
    </div>
  </div>
</section>

<!-- 🧠 Script Scroll -->
<script>
  const scrollContainer = document.getElementById('destinationScroll');
  const btnLeft = document.getElementById('scrollLeft');
  const btnRight = document.getElementById('scrollRight');

  btnLeft.addEventListener('click', () => {
    scrollContainer.scrollBy({ left: -400, behavior: 'smooth' });
  });

  btnRight.addEventListener('click', () => {
    scrollContainer.scrollBy({ left: 400, behavior: 'smooth' });
  });
</script>

<!-- 🚫 Hilangkan scrollbar -->
<style>
  .scrollbar-hide::-webkit-scrollbar {
    display: none;
  }
  .scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>

<!-- 🌐 Tambah Font Premium -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  body {
    font-family: 'Poppins', sans-serif !important;
    letter-spacing: 0.2px;
  }
</style> 

<!-- 🌐 Tambah Font Premium -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  body {
    font-family: 'Poppins', sans-serif !important;
    letter-spacing: 0.2px;
  }
</style>

<!-- LAMPUNG SELATAN TOURISM SECTION (Image + YouTube) -->
<section class="py-20 bg-white relative overflow-hidden">

  <!-- Decorative shapes -->
  <div class="absolute top-0 left-0 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply opacity-10 -translate-x-32 -translate-y-32"></div>
  <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-200 rounded-full mix-blend-multiply opacity-10 translate-x-32 translate-y-32"></div>

  <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center gap-10">

    <!-- Left: Image -->
    <div class="w-full md:w-1/2 flex justify-center items-center">
      <img src="img/bupati.png" 
           alt="Web Background" 
           class="w-full max-h-[500px] rounded-3xl shadow-xl object-cover">
    </div>

    <!-- Right: YouTube Video -->
    <div class="w-full md:w-1/2 rounded-3xl overflow-hidden shadow-2xl">
      <div class="relative" style="padding-top: 56.25%;"> <!-- 16:9 aspect ratio -->
        <iframe 
          class="absolute top-0 left-0 w-full h-full rounded-3xl" 
          src="https://www.youtube.com/embed/9PZ-OMWNTW4?autoplay=1&mute=1&rel=0&controls=1" 
          title="Wisata Lampung Selatan" 
          frameborder="0" 
          allow="autoplay; encrypted-media; picture-in-picture" 
          allowfullscreen>
        </iframe>
      </div>
    </div>

  </div>
</section>

<?php
// 1️⃣ Hubungkan ke database
include 'koneksi.php';
?>

<!-- 🟣 UMKM #NaikKelas -->
<section class="bg-white py-16 md:py-20">
  <div class="max-w-6xl mx-auto px-4 md:px-6">
    <h2 class="text-3xl md:text-4xl font-extrabold text-purple-800 mb-10 text-center md:text-left">
      UMKM <span class="text-gray-800">#NaikKelas</span>
    </h2>

    <!-- 🔹 SWIPER CONTAINER -->
    <div class="swiper mySwiper relative pb-14">
      <div class="swiper-wrapper">
        <?php
        // 2️⃣ Ambil 4 produk terbaru
        $query = "SELECT * FROM produk_umkm ORDER BY id_produk DESC LIMIT 4";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $gambar = !empty($row['gambar_umkm']) ? 'Uploads/' . $row['gambar_umkm'] : 'img/default.jpg';
            $harga = number_format($row['harga_umkm'] ?? 0, 0, ',', '.');
            $stok = intval($row['stok_umkm'] ?? 0);
            $kategori = htmlspecialchars($row['kategori_umkm'] ?? 'Kategori Tidak Diketahui');
            $produk = htmlspecialchars($row['produk_umkm'] ?? 'Produk Tidak Dikenal');

            if ($stok <= 0) {
              $badge = '<span class="absolute top-3 right-3 bg-red-500 text-white text-xs px-3 py-1 rounded-full font-semibold shadow">Stok Habis</span>';
            } elseif ($stok <= 5) {
              $badge = '<span class="absolute top-3 right-3 bg-yellow-400 text-gray-800 text-xs px-3 py-1 rounded-full font-semibold shadow">Terbatas</span>';
            } else {
              $badge = '<span class="absolute top-3 right-3 bg-green-500 text-white text-xs px-3 py-1 rounded-full font-semibold shadow">Ready</span>';
            }

            echo '
            <div class="swiper-slide">
              <a href="detail_produk.php?id=' . $row['id_produk'] . '" 
                 class="relative block rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 ease-out bg-white group">
                ' . $badge . '
                <img src="' . htmlspecialchars($gambar) . '" 
                     alt="' . $produk . '" 
                     class="w-full h-72 object-cover group-hover:opacity-90 transition duration-300">
                <div class="p-5">
                  <h3 class="text-lg font-semibold text-gray-800 group-hover:text-purple-700 transition">' . $produk . '</h3>
                  <span class="inline-block mt-1 text-sm bg-purple-100 text-purple-800 px-2 py-1 rounded-full font-medium">' . $kategori . '</span>
                  <p class="mt-3 font-bold text-gray-900 text-lg">Rp ' . $harga . '</p>
                  <p class="text-sm text-gray-600 mt-1">Stok: ' . $stok . '</p>
                </div>
              </a>
            </div>';
          }
        } else {
          echo "<p class='text-center text-gray-500'>Belum ada produk yang ditambahkan.</p>";
        }
        ?>
      </div>

      <!-- 🔹 Pagination di bawah -->
      <div class="flex justify-center mt-8">
        <div class="swiper-pagination !static"></div>
      </div>
    </div>
  </div>
</section>

<!-- 🔹 SWIPER CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- ⚙️ Swiper Setting -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      320: { slidesPerView: 1 },
      640: { slidesPerView: 2 },
      1024: { slidesPerView: 3 }
    }
  });
</script>

<!-- 🔴 BEST TOUR PACKAGES -->
<section class="bg-white py-20">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl md:text-4xl font-extrabold mb-10">
      <span class="text-purple-700">Best</span> Tour Packages
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
      <!-- Tour 1 -->
      <div class="rounded-2xl overflow-hidden shadow-xl hover:scale-[1.04] transition-all duration-300 ease-out">
        <img src="img/tour1.jpg" alt="Paket Kopi Luna Maya" class="w-full h-72 object-cover">
        <div class="p-5 bg-white">
          <h3 class="text-xl font-semibold text-gray-800">Paket Kopi Luna Maya</h3>
          <p class="text-sm text-gray-500 mt-1">📍 Kampung Kopi Rigis</p>
          <p class="mt-3 font-bold text-red-600 text-lg">Rp 75.000 / person</p>
        </div>
      </div>

      <!-- Tour 2 -->
      <div class="rounded-2xl overflow-hidden shadow-xl hover:scale-[1.04] transition-all duration-300 ease-out">
        <img src="img/tour2.jpg" alt="Trip to Mounth Rajabasa" class="w-full h-72 object-cover">
        <div class="p-5 bg-white">
          <h3 class="text-xl font-semibold text-gray-800">Tour Gunung Rajabasa</h3>
          <p class="text-sm text-gray-500 mt-1">📍 Kabupaten Lampung Selatan</p>
          <p class="mt-3 font-bold text-red-600 text-lg">Rp 40.000 / person</p>
        </div>
      </div>

      <!-- Tour 3 -->
      <div class="rounded-2xl overflow-hidden shadow-xl hover:scale-[1.04] transition-all duration-300 ease-out">
        <img src="img/tour3.jpg" alt="Photo Session Sambil Berwisata" class="w-full h-72 object-cover">
        <div class="p-5 bg-white">
          <h3 class="text-xl font-semibold text-gray-800">Photo Session Sambil Berwisata</h3>
          <p class="text-sm text-gray-500 mt-1">📍 Pinus Ecopark</p>
          <p class="mt-3 font-bold text-red-600 text-lg">Rp 180.000 / person</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 📰 TRAVEL NEWS -->
<section class="bg-white py-20">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-center mb-12">
      <span class="text-purple-800">Travel</span> News
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
<!-- 🟣 News 1 (Presisi & Rapi, Tanpa Potongan Gambar) -->
<div class="rounded-2xl overflow-hidden shadow-md hover:scale-105 transition-transform duration-300 bg-white">
  <div class="bg-gray-100 flex items-center justify-center">
    <img src="img/beach.png" alt="Danau Ranau" class="w-full h-auto object-contain">
  </div>
  <div class="p-5">
    <p class="text-sm text-gray-500 uppercase mb-1">May 15, 2025</p>
    <h3 class="text-lg font-semibold text-gray-800 mb-3 leading-snug">
      Krakatau Beach Run Lampung Selatan 2025
    </h3>
    <a href="#" class="text-sm font-semibold text-purple-700 hover:text-purple-900">
      Read this →
    </a>
  </div>
</div>

<!-- 🟣 News 2 (Presisi & Rapi, Tanpa Potongan Gambar) -->
<div class="rounded-2xl overflow-hidden shadow-md hover:scale-105 transition-transform duration-300 bg-white">
  <div class="bg-gray-100 flex items-center justify-center">
    <img src="img/jelajah.png" alt="Danau Ranau" class="w-full h-auto object-contain">
  </div>
  <div class="p-5">
    <p class="text-sm text-gray-500 uppercase mb-1">May 15, 2025</p>
    <h3 class="text-lg font-semibold text-gray-800 mb-3 leading-snug">
      Jelajah Keindahan Surga Tersembunyi di Lampung Selatan
    </h3>
    <a href="#" class="text-sm font-semibold text-purple-700 hover:text-purple-900">
      Read this →
    </a>
  </div>
</div>

<!-- 🟣 News 3 (Presisi & Rapi, Tanpa Potongan Gambar) -->
<div class="rounded-2xl overflow-hidden shadow-md hover:scale-105 transition-transform duration-300 bg-white">
  <div class="bg-gray-100 flex items-center justify-center">
    <img src="img/naikkelas.png" alt="Danau Ranau" class="w-full h-auto object-contain">
  </div>
  <div class="p-5">
    <p class="text-sm text-gray-500 uppercase mb-1">May 15, 2025</p>
    <h3 class="text-lg font-semibold text-gray-800 mb-3 leading-snug">
      Mentri Perdagangan Berkolaborasi dengan Pelaku UMKM di Lampung Selatan
    </h3>
    <a href="#" class="text-sm font-semibold text-purple-700 hover:text-purple-900">
      Read this →
    </a>
  </div>
</div>
    </div>
  </div>
</section>

<!-- 🌊 CTA BANNER FULL HD TANPA TEKS / BLUR -->
<section class="py-12">
  <div class="max-w-6xl mx-auto px-6">
    <div class="overflow-hidden rounded-2xl shadow-lg">
      <img src="img/wisata.png" alt="Banner Wisata" class="w-full h-auto object-cover">
    </div>
  </div>
</section>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Footer — Visitlambar</title>
  <style>
    :root {
      --red: #e74c3c;
      --muted: #8a8f98;
      --bg: #f7f7f8;
      --card: #ffffff;
      --container: 1200px;
      --radius: 6px;
      font-family: "Inter", ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }

    body {
      margin: 0;
      background: #fff;
      color: #222;
    }

    /* FOOTER WRAP */
    .footer-wrap {
      background: var(--bg);
      padding: 60px 24px 0;
      border-top: 1px solid rgba(0, 0, 0, 0.04);
    }

    .container {
      max-width: var(--container);
      margin: 0 auto;
      display: flex;
      gap: 60px;
      align-items: flex-start;
      flex-wrap: wrap;
    }

    /* LEFT COLUMN */
    .left {
      flex: 1 1 280px;
      min-width: 260px;
    }

    .left img {
      width: 140px;
      display: block;
      margin-bottom: 16px;
    }

    .left p {
      color: var(--muted);
      font-size: 14px;
      line-height: 1.7;
      margin-bottom: 8px;
    }

    .read-more {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      color: #111;
      font-weight: 600;
      font-size: 14px;
      text-decoration: none;
      transition: 0.3s;
    }

    .read-more:hover {
      color: var(--red);
    }

    /* MIDDLE COLUMNS */
    .mid {
      flex: 2 1 460px;
      display: flex;
      gap: 48px;
      flex-wrap: wrap;
    }

    .col {
      min-width: 160px;
      flex: 1 1 180px;
    }

    .col h4 {
      margin: 0 0 12px;
      font-size: 15px;
      font-weight: 700;
      color: #111;
    }

    .col ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .col li {
      color: var(--muted);
      font-size: 14px;
      padding: 6px 0;
      transition: 0.3s;
    }

    .col li:hover {
      color: var(--red);
      cursor: pointer;
    }

    /* NEWSLETTER */
    .newsletter {
      flex: 1 1 320px;
      min-width: 280px;
    }

    .newsletter h4 {
      margin: 0 0 12px;
      font-size: 15px;
      font-weight: 700;
      color: #111;
    }

    .newsletter p {
      color: var(--muted);
      font-size: 14px;
      margin-bottom: 14px;
      line-height: 1.6;
    }

    .form {
      display: flex;
      gap: 10px;
    }

    .newsletter input {
      flex: 1;
      padding: 10px 12px;
      border: 1px solid #dcdfe4;
      border-radius: 4px;
      font-size: 14px;
    }

    .newsletter button {
      padding: 10px 14px;
      border: none;
      background: var(--red);
      color: #fff;
      border-radius: 4px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }

    .newsletter button:hover {
      background: #c0392b;
    }

    .socials {
      display: flex;
      gap: 10px;
      margin-top: 14px;
    }

    .socials a {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 38px;
      height: 38px;
      border-radius: 6px;
      background: #fff;
      border: 1px solid rgba(0, 0, 0, 0.06);
      text-decoration: none;
      transition: 0.3s;
    }

    .socials a:hover {
      background: var(--red);
    }

    .socials a:hover svg path {
      fill: #fff;
    }

    /* DOT DECORATION */
    .dot {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: var(--red);
      display: inline-block;
      margin: 0 6px;
    }

    /* BOTTOM BAR */
    .bottom {
      border-top: 1px solid rgba(0, 0, 0, 0.06);
      margin-top: 40px;
      padding: 20px 24px;
      background: transparent;
    }

    .bottom .inner {
      max-width: var(--container);
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 13px;
      color: var(--muted);
      flex-wrap: wrap;
      gap: 10px;
    }

    .bottom a {
      color: var(--red);
      text-decoration: none;
      font-weight: 600;
    }

    .bottom a:hover {
      text-decoration: underline;
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {
      .container {
        flex-direction: column;
        gap: 40px;
      }
      .mid {
        gap: 32px;
      }
    }

    @media (max-width: 480px) {
      .footer-wrap {
        padding: 40px 16px 0;
      }
      .left img {
        width: 110px;
      }
      .col h4,
      .newsletter h4 {
        font-size: 14px;
      }
      .col li,
      .newsletter p {
        font-size: 13px;
      }
    }
  </style>
</head>
<body>

  <footer class="footer-wrap" aria-label="Footer Explore Lamsel">
    <div class="container">
      <div class="left">
        <img src="img/pemkabweb.png" alt="Pesona Indonesia — logo" />
        <p>
          ExploreLamsel.com adalah Platform Ecosystem 360° & Marketplace UMKM, Destinasi Wisata Lampung Selatan
          yang menyajikan informasi lengkap mengenai Objek Wisata, Event, Produk UMKM & Budaya Lampung Selatan.
        </p>
        <a class="read-more" href="#">Read More →</a>
      </div>

      <div class="mid" role="navigation" aria-label="Footer links">
        <div class="col">
          <h4>About Company</h4>
          <ul>
            <li>About Us</li>
            <li>Our Team</li>
            <li>Our Services</li>
            <li>For Corporate</li>
            <li>Investor Relations</li>
          </ul>
        </div>

        <div class="col">
          <h4>Customer Service</h4>
          <ul>
            <li>Contact Us</li>
            <li>FAQ <span class="dot"></span></li>
            <li>Cancellation Policy <span class="dot"></span></li>
            <li>How To Payment</li>
            <li>UMKM #NaikKelas</li>
          </ul>
        </div>

        <div class="newsletter">
          <h4>Newsletter &amp; Social</h4>
          <p>Jadilah orang pertama yang mendapatkan promo & berita terbaru dari ExploreLamsel.com.</p>
          <div class="form">
            <input type="email" placeholder="Email address" aria-label="Email untuk newsletter" />
            <button aria-label="Subscribe">OK</button>
          </div>

          <div class="socials" aria-hidden="false">
            <a href="#" title="Facebook" aria-label="Facebook">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                <path d="M22 12.072C22 6.507 17.523 2 12 2S2 6.507 2 12.072c0 4.991 3.657 9.128 8.438 9.878v-6.99H7.898v-2.888h2.54V9.845c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.196 2.238.196v2.46h-1.26c-1.243 0-1.63.772-1.63 1.562v1.875h2.773l-.443 2.888h-2.33v6.99C18.343 21.2 22 17.063 22 12.072z" fill="#111"/>
              </svg>
            </a>
            <a href="#" title="Twitter" aria-label="Twitter">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                <path d="M22 5.924c-.6.268-1.244.448-1.92.53.69-.414 1.22-1.071 1.47-1.854-.647.383-1.364.66-2.126.81A3.275 3.275 0 0016.616 5c-1.8 0-3.26 1.46-3.26 3.26 0 .255.028.504.084.742C9.728 8.87 6.1 6.93 3.77 4.02c-.28.488-.44 1.056-.44 1.66 0 1.146.583 2.156 1.47 2.748-.54-.017-1.05-.165-1.496-.41v.04c0 1.6 1.138 2.936 2.648 3.24-.278.076-.57.117-.872.117-.213 0-.42-.02-.622-.06.422 1.316 1.645 2.273 3.095 2.3A6.57 6.57 0 012 18.147 9.265 9.265 0 007.29 20c6.002 0 9.29-4.975 9.29-9.29 0-.142-.003-.284-.01-.425.64-.462 1.195-1.04 1.637-1.7-.59.262-1.226.44-1.895.52.684-.41 1.205-1.06 1.452-1.835z" fill="#111"/>
              </svg>
            </a>
            <a href="#" title="Instagram" aria-label="Instagram">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                <path d="M7 2h10a5 5 0 015 5v10a5 5 0 01-5 5H7a5 5 0 01-5-5V7a5 5 0 015-5zm5 6.5A4.5 4.5 0 1016.5 13 4.5 4.5 0 0012 8.5zm6.8-2.9a1.2 1.2 0 11-1.2-1.2 1.2 1.2 0 011.2 1.2z" fill="#111"/>
              </svg>
            </a>
            <a href="#" title="YouTube" aria-label="YouTube">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                <path d="M23.5 6.2s-.2-1.7-.82-2.44C21.8 2.7 20.6 2.66 19.9 2.6 16.95 2.4 12 2.4 12 2.4h0s-4.95 0-7.9.2c-.7.06-1.9.1-2.78 1.16C.7 4.5.5 6.2.5 6.2S.3 8 .3 9.8v.4c0 1.8.2 3.6.2 3.6s.2 1.7.82 2.44c.82 1.05 1.9 1.02 2.4 1.14 1.72.22 7.28.22 7.28.22s4.95 0 7.9-.2c.7-.06 1.9-.1 2.78-1.16.62-.74.82-2.44.82-2.44s.2-1.8.2-3.6v-.4c0-1.8-.2-3.6-.2-3.6zM10 15.5V8.5l6 3.5-6 3.5z" fill="#111"/>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="bottom">
      <div class="inner">
        <div>TERMS OF SERVICE</div>
        <div>Copyright © 2025 <a href="#">ExploreLamsel.com</a> | All Rights Reserved.</div>
      </div>
    </div>
  </footer>

</body>
</html>
