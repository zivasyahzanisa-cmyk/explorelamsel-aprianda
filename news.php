<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel News - Explore Lamsel</title>
  <link rel="icon" href="img/LOGO DINAS.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-white text-gray-800">

<!-- 🔵 NAVBAR UNTUK HALAMAN NEWS -->
<header class="fixed top-0 left-0 w-full z-50 bg-transparent font-sans">
  <div class="max-w-7xl mx-auto px-6 py-3">
    <div class="flex justify-between items-center bg-white rounded-xl shadow-md px-5 py-2.5 relative">

      <!-- 🔹 Logo dan Teks -->
      <div class="flex items-center space-x-3">
        <a href="homepage.php" class="flex items-center space-x-2 relative">
          <img src="img/LOGO DINAS.png" alt="Logo" class="h-11 w-11 object-contain">
          <span class="text-gray-800 text-xl font-bold hidden md:inline tracking-tight">
            Explore<span class="text-blue-300 font-extrabold">Lamsel</span>
          </span>
        </a>
      </div>

      <!-- 🔹 Menu Navigasi -->
      <nav class="hidden md:flex space-x-6 text-gray-800 text-sm font-medium tracking-wide relative">
        <a href="homepage.php" class="relative hover:text-blue-600 transition">HOME</a>
        <a href="destination.php" class="relative hover:text-blue-600 transition">DESTINATION</a>
        <a href="tour.php" class="relative hover:text-blue-600 transition">TOUR PACKAGE</a>
        <a href="event.php" class="relative hover:text-blue-600 transition">EVENT</a>
        <a href="shop.php" class="relative hover:text-blue-600 transition">SHOP</a>
        <a href="news.php" class="relative text-blue-600 font-semibold after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-[2px] after:bg-blue-500">NEWS</a>
        <a href="contact.php" class="relative hover:text-blue-600 transition">CONTACT US</a>
        <a href="login.php" class="relative hover:text-blue-600 border-l border-gray-300 pl-4 transition">LOGIN</a>
      </nav>

      <!-- 🔹 Tombol Mobile -->
      <div class="md:hidden">
        <button aria-label="menu" class="text-gray-800 text-2xl">☰</button>
      </div>

    </div>
  </div>
</header>

<!-- 🔹 Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
  * {
    font-family: 'Poppins', sans-serif !important;
  }

  /* Garis animasi bawah link saat hover */
  header a::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 0;
    height: 2px;
    background-color: #3b82f6;
    transition: width 0.3s ease-in-out;
  }

  header a:hover::after {
    width: 100%;
  }

  /* Supaya link aktif (NEWS) tetap stabil tidak ikut animasi hover */
  header a.text-blue-600::after {
    width: 100%;
  }
</style>

<!-- 🔵 SECTION JUDUL (Travel News versi baru) -->
<section class="bg-white pt-40 pb-12">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h2 class="text-3xl md:text-4xl font-bold mb-3">
      <span class="text-purple-800">Travel</span> News
    </h2>
    <div class="h-0.5 w-20 bg-purple-800 mx-auto mb-10"></div>
  </div>
</section>

  <!-- 🔵 GRID BERITA -->
  <section class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8 pb-20">

    <!-- News 1 -->
    <div class="rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">
      <img src="img/beach.png" alt="News 1" class="w-full h-56 object-cover">
      <div class="p-5">
        <p class="text-xs text-gray-500 mb-2">September 03, 2025</p>
        <h3 class="font-semibold text-gray-800 text-lg mb-3 leading-snug">
          Krakatau Beach Run Lampung Selatan 2025
        </h3>
        <a href="#" class="text-blue-700 text-sm font-medium hover:underline">Read this →</a>
      </div>
    </div>

    <!-- News 2 -->
    <div class="rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">
      <img src="img/jelajah.png" alt="News 2" class="w-full h-56 object-cover">
      <div class="p-5">
        <p class="text-xs text-gray-500 mb-2">May 15, 2025</p>
        <h3 class="font-semibold text-gray-800 text-lg mb-3 leading-snug">
          Jelajah Keindahan Surga Tersembunyi di Lampung Selatan
        </h3>
        <a href="#" class="text-blue-700 text-sm font-medium hover:underline">Read this →</a>
      </div>
    </div>

    <!-- News 3 -->
    <div class="rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">
      <img src="img/naikkelas.png" alt="News 3" class="w-full h-56 object-cover">
      <div class="p-5">
        <p class="text-xs text-gray-500 mb-2">April 12, 2025</p>
        <h3 class="font-semibold text-gray-800 text-lg mb-3 leading-snug">
          Mentri Perdagangan Berkolaborasi dengan Pelaku UMKM di Lampung Selatan
        </h3>
        <a href="#" class="text-blue-700 text-sm font-medium hover:underline">Read this →</a>
      </div>
    </div>

  </section>

</body>
</html>

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

  <footer class="footer-wrap" aria-label="Footer Visitlambar">
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