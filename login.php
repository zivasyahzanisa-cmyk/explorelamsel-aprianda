<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - ExploreLamsel</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="icon" href="img/LOGO DINAS.png" type="image/png">
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center relative overflow-hidden">

<!-- 🔵 NAVBAR UNTUK HALAMAN LOGIN -->
<header class="fixed top-0 left-0 w-full z-50 bg-transparent font-sans">
  <div class="max-w-7xl mx-auto px-6 py-3">
    <div class="flex justify-between items-center bg-white rounded-xl shadow-md px-5 py-2.5">

      <!-- 🔹 Logo dan Teks -->
      <div class="flex items-center space-x-3">
        <a href="homepage.php" class="flex items-center space-x-2">
          <img src="img/LOGO DINAS.png" alt="Logo" class="h-11 w-11 object-contain">
          <span class="text-gray-800 text-xl font-bold hidden md:inline tracking-tight">
            Explore<span class="text-blue-300 font-extrabold">Lamsel</span>
          </span>
        </a>
      </div>

      <!-- 🔹 Menu Navigasi -->
      <nav class="hidden md:flex space-x-6 text-gray-800 text-sm font-medium tracking-wide">
        <a href="homepage.php" class="relative hover:text-blue-600 transition">HOME</a>
        <a href="destination.php" class="relative hover:text-blue-600 transition">DESTINATION</a>
        <a href="tour.php" class="relative hover:text-blue-600 transition">TOUR PACKAGE</a>
        <a href="event.php" class="relative hover:text-blue-600 transition">EVENT</a>
        <a href="shop.php" class="relative hover:text-blue-600 transition">SHOP</a>
        <a href="news.php" class="relative hover:text-blue-600 transition">NEWS</a>
        <a href="contact.php" class="relative hover:text-blue-600 transition">CONTACT US</a>
        <a href="login.php" class="relative text-blue-600 font-semibold pl-4 border-l border-gray-300 after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-[2px] after:bg-blue-500">LOGIN</a>
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

  /* Garis animasi bawah saat hover */
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

  /* Supaya link aktif (LOGIN) tetap biru dan garisnya permanen */
  header a.text-blue-600::after {
    width: 100%;
  }
</style>

  <!-- 🖼️ Background -->
  <img src="img/siger.png" alt="Background" class="absolute inset-0 w-full h-full object-cover">
  <div class="absolute inset-0 bg-black/40"></div>

  <!-- 💡 Konten Utama -->
  <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 w-[95%] max-w-6xl mx-auto items-center gap-10 px-4 md:px-0 mt-20">

    <!-- 🔹 KIRI: Hero Section -->
    <div class="text-white text-left space-y-4 md:pl-10">
      <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
        <div>Explore</div>
        <div class="text-blue-300 font-extrabold whitespace-nowrap">Lampung Selatan</div>
      </h1>
      <p class="text-base md:text-lg text-white/90 max-w-md">
        Jelajahi Destinasi kelas <span class="font-semibold">Dunia</span> yang mungkin belum pernah kamu ketahui di <span class="font-semibold">Lampung Selatan.</span>
      </p>
    </div>

    <!-- 🔹 KANAN: Login Card -->
    <div class="flex justify-center md:justify-end">
      <div class="bg-white w-[90%] max-w-sm rounded-xl shadow-xl p-6 md:p-8 border border-gray-100 backdrop-blur-sm bg-opacity-95 animate-fadeIn">

        <!-- Judul -->
        <div class="text-center mb-6">
          <h2 class="text-lg font-semibold text-gray-800">
            Welcome Back to <span class="text-blue-600">ExploreLamsel.com</span>
          </h2>
          <p class="text-xs text-gray-500 mt-1">
            Sign in to your account to continue using ExploreLamsel.com
          </p>
        </div>

        <!-- Form -->
        <form action="#" method="POST" class="space-y-3">
          <div>
            <label class="block text-xs font-medium text-gray-700 mb-1">Email address/username</label>
            <input type="text" name="username" class="w-full border border-gray-300 rounded-md px-3 py-1.5 text-xs focus:outline-none focus:ring-1 focus:ring-blue-500" required>
          </div>

          <div>
            <label class="block text-xs font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password" class="w-full border border-gray-300 rounded-md px-3 py-1.5 text-xs focus:outline-none focus:ring-1 focus:ring-blue-500" required>
          </div>

          <div class="flex items-center justify-between text-xs">
            <button type="submit" class="bg-blue-600 text-white font-semibold px-4 py-1.5 rounded hover:bg-blue-700 transition text-xs">SIGN-IN</button>
            <label class="flex items-center space-x-1">
              <input type="checkbox" class="rounded border-gray-300 focus:ring-blue-500">
              <span class="text-gray-600">Remember me</span>
            </label>
          </div>

          <a href="#" class="text-[11px] text-red-500 hover:underline">Forgot password?</a>
        </form>

        <!-- Garis Pembatas -->
        <div class="border-t border-gray-200 my-4"></div>

        <!-- 🔹 Sosial Media -->
        <div class="flex flex-col items-center space-y-2">
          <p class="text-xs font-semibold text-gray-700 mb-1">Or sign-up with your socials</p>

          <a href="#" class="flex items-center justify-center bg-blue-500 text-white py-1.5 w-36 rounded hover:bg-blue-600 transition text-xs font-medium shadow-sm">
            <img src="img/fb.png" alt="Facebook" class="w-5 h-5 mr-2 object-contain"> FACEBOOK
          </a>

          <a href="#" class="flex items-center justify-center bg-blue-500 text-white py-1.5 w-36 rounded hover:bg-blue-600 transition text-xs font-medium shadow-sm">
            <img src="img/google.png" onerror="this.src='https://www.svgrepo.com/show/355037/google.svg'" alt="Google" class="w-5 h-5 mr-2 object-contain"> GOOGLE
          </a>
        </div>

        <!-- Garis bawah -->
        <div class="mt-5 text-center border-t pt-3">
          <p class="text-xs text-gray-700">
            Not a member yet?
            <a href="#" class="text-red-500 hover:underline font-medium">Sign up</a> for free
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- ✨ Animasi -->
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.97); }
      to { opacity: 1; transform: scale(1); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.4s ease-in-out;
    }
  </style>

</body>
</html>
