<?php
include 'koneksi.php';

// Ambil ID produk
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Nomor WhatsApp Penjual
$wa_number_raw = '085840375278';
$wa_number = preg_replace('/^0/', '62', $wa_number_raw);

// Default data
$data = [
  'produk_umkm' => 'Produk Tidak Ditemukan',
  'harga_umkm' => 0,
  'deskripsi_umkm' => 'Data produk ini belum tersedia.',
  'gambar_umkm' => 'default.jpg',
  'kategori_umkm' => '-',
  'stok_umkm' => 0,
  'ukuran_umkm' => '',
  'warna_umkm' => ''
];

// Ambil data produk
if ($id > 0) {
  $result = mysqli_query($conn, "SELECT * FROM produk_umkm WHERE id_produk = $id LIMIT 1");
  if ($result && mysqli_num_rows($result) > 0) $data = mysqli_fetch_assoc($result);
}

$gambar_src = 'uploads/' . (!empty($data['gambar_umkm']) ? $data['gambar_umkm'] : 'default.jpg');

// Produk lain (related)
$other_query = mysqli_query($conn, "
  SELECT * FROM produk_umkm 
  WHERE id_produk != $id 
  ORDER BY RAND() 
  LIMIT 4
");

// Variasi
$kategori = strtolower($data['kategori_umkm']);
$ukuran_opsi = !empty($data['ukuran_umkm']) ? array_map('trim', explode(',', $data['ukuran_umkm'])) : [];
$warna_opsi = !empty($data['warna_umkm']) ? array_map('trim', explode(',', $data['warna_umkm'])) : [];

if (empty($ukuran_opsi)) $ukuran_opsi = ['S', 'M', 'L', 'XL'];
if (empty($warna_opsi)) $warna_opsi = ['Hitam', 'Putih', 'Merah', 'Biru', 'Hijau'];

function rupiah($n) { return 'Rp ' . number_format($n,0,',','.'); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($data['produk_umkm']) ?> — Explore Lamsel</title>
  <title>Our Shop - ExploreLamsel</title>
  <link rel="icon" href="img/LOGO DINAS.png" type="image/png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    body { background-color: #f8fafc; }
    .hover-zoom img { transition: all 0.4s ease; }
    .hover-zoom:hover img { transform: scale(1.05); }
    .cta-fixed { position: fixed; left: 0; right: 0; bottom: 0; z-index: 50; }
  </style>
</head>
<body class="text-gray-800">

<!-- 🔵 NAVBAR UNTUK HALAMAN SHOP -->
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
        <a href="shop.php" class="relative text-blue-600 font-semibold after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-[2px] after:bg-blue-500">SHOP</a>
        <a href="news.php" class="relative hover:text-blue-600 transition">NEWS</a>
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

  /* Supaya link aktif (SHOP) tetap stabil tidak ikut animasi hover */
  header a.text-blue-600::after {
    width: 100%;
  }
</style>

<!-- 🛍️ DETAIL PRODUK -->
<section class="max-w-6xl mx-auto px-6 py-12 grid md:grid-cols-2 gap-10 items-start mt-32">
  <!-- Tambahkan konten produk kamu di sini -->

  <!-- Gambar produk -->
  <div class="bg-white rounded-2xl shadow-lg p-5 hover-zoom">
    <img src="<?= htmlspecialchars($gambar_src) ?>" alt="<?= htmlspecialchars($data['produk_umkm']) ?>" 
         class="w-full h-96 object-cover rounded-xl">
  </div>

  <!-- Info Produk -->
  <div>
    <h2 class="text-3xl font-bold mb-3"><?= htmlspecialchars($data['produk_umkm']) ?></h2>
    <div class="flex items-center gap-4 mb-3">
      <p class="text-4xl font-extrabold text-blue-600"><?= rupiah($data['harga_umkm']) ?></p>
      <p class="text-sm text-gray-600">Stok: <?= htmlspecialchars($data['stok_umkm']) ?></p>
    </div>

    <p class="text-sm text-gray-600 mb-5">Kategori: <?= htmlspecialchars($data['kategori_umkm']) ?></p>

    <!-- Variasi -->
    <div class="grid grid-cols-3 gap-3 mb-5">
      <select id="optUkuran" class="border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
        <option value="">Ukuran</option>
        <?php foreach ($ukuran_opsi as $opt): ?>
          <option value="<?= htmlspecialchars($opt) ?>"><?= htmlspecialchars($opt) ?></option>
        <?php endforeach; ?>
      </select>

      <select id="optWarna" class="border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
        <option value="">Warna</option>
        <?php foreach ($warna_opsi as $w): ?>
          <option value="<?= htmlspecialchars($w) ?>"><?= htmlspecialchars($w) ?></option>
        <?php endforeach; ?>
      </select>

      <input id="qty" type="number" min="1" value="1" class="border rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
    </div>

    <!-- Tombol -->
    <div class="flex gap-3 mb-6">
      <button id="addCart" class="flex-1 bg-gray-200 text-gray-800 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
        Tambah ke Keranjang
      </button>
      <button id="buyWa" class="flex-1 bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
        Beli via WhatsApp
      </button>
    </div>

    <!-- Deskripsi -->
    <div class="bg-white p-4 rounded-xl border">
      <h3 class="font-bold mb-2 text-lg">Deskripsi Produk</h3>
      <p class="text-sm leading-relaxed text-gray-700"><?= nl2br(htmlspecialchars($data['deskripsi_umkm'])) ?></p>
    </div>
  </div>
</section>

<!-- 🧡 PRODUK TERKAIT -->
<section class="bg-white py-16">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl font-bold mb-10 text-gray-800">
      Produk <span class="text-blue-600">Terkait</span>
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
      <?php if ($other_query && mysqli_num_rows($other_query) > 0): ?>
        <?php while ($p = mysqli_fetch_assoc($other_query)): 
          $thumb = !empty($p['gambar_umkm']) ? 'uploads/'.$p['gambar_umkm'] : 'img/default.jpg';
        ?>
          <a href="detail_produk.php?id=<?= $p['id_produk'] ?>" 
             class="group bg-gray-50 rounded-2xl overflow-hidden border shadow-sm hover:shadow-xl transition-all duration-300">
            
            <!-- 🖼️ Gambar produk besar -->
            <div class="relative overflow-hidden">
              <img src="<?= htmlspecialchars($thumb) ?>" 
                   class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
            </div>

            <!-- 🧾 Info produk -->
            <div class="p-5 space-y-1">
              <p class="font-semibold text-gray-800 truncate text-lg">
                <?= htmlspecialchars($p['produk_umkm']) ?>
              </p>

              <!-- 🔸 Kategori produk -->
              <p class="text-sm text-gray-500 italic">
                <?= htmlspecialchars($p['kategori_umkm']) ?>
              </p>

              <p class="text-blue-600 font-bold text-base">
                <?= rupiah($p['harga_umkm']) ?>
              </p>
            </div>
          </a>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="text-gray-500">Tidak ada produk lain.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- 📱 CTA BAWAH (MOBILE) -->
<div class="cta-fixed md:hidden bg-white border-t shadow-lg p-3">
  <div class="max-w-7xl mx-auto flex justify-between items-center">
    <div>
      <p class="text-sm text-gray-600">Total</p>
      <p class="font-bold text-lg text-blue-600"><?= rupiah($data['harga_umkm']) ?></p>
    </div>
    <div class="flex gap-2 w-2/3">
      <button id="bottomCart" class="flex-1 bg-gray-200 rounded-lg py-2 font-semibold">Keranjang</button>
      <button id="bottomBuy" class="flex-1 bg-blue-600 text-white rounded-lg py-2 font-semibold">Beli</button>
    </div>
  </div>
</div>

<!-- 💬 FLOATING WHATSAPP -->
<a href="https://wa.me/<?= $wa_number ?>" target="_blank"
   class="hidden md:flex fixed right-6 bottom-6 items-center gap-2 bg-blue-600 text-white px-5 py-3 rounded-full shadow-lg hover:bg-blue-700 transition">
  <svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24"><path d="M21.05 3.05a10 10 0 00-14.14 0A9.93 9.93 0 003 10c0 1.7.42 3.4 1.25 4.92L3 21l6.2-1.61A10 10 0 0021.05 3.05zM12 19.8a7.8 7.8 0 01-4-1.1l-.3-.2-3.7 1 1-3.6-.2-.3A7.82 7.82 0 1112 19.8zm4.4-5.8c-.24-.12-1.44-.7-1.67-.78s-.39-.12-.55.12c-.16.23-.63.78-.77.93-.14.16-.28.18-.52.06-.24-.12-1-.37-1.9-1.18a7.23 7.23 0 01-1.34-1.68c-.14-.23-.01-.36.1-.47.1-.1.23-.26.34-.4.1-.13.14-.23.22-.38.07-.15.04-.28-.02-.4-.06-.12-.52-1.23-.7-1.7-.18-.45-.36-.39-.5-.4l-.43-.01c-.15 0-.38.05-.57.28s-.75.73-.75 1.8.77 2.09.88 2.24c.11.15 1.52 2.4 3.68 3.37.51.22.9.35 1.2.44.5.16.95.13 1.31.08.4-.06 1.23-.5 1.4-.98.17-.48.17-.9.12-.98-.04-.09-.18-.14-.42-.25z"/></svg>
  <span>Chat Seller</span>
</a>

<!-- ⚙️ SCRIPT -->
<script>
  const waNumber = '<?= $wa_number ?>';
  const productName = <?= json_encode($data['produk_umkm']) ?>;
  const productPrice = <?= json_encode(rupiah($data['harga_umkm'])) ?>;

  function buildWAUrl({ nama, ukuran, warna, qty, harga }) {
    const pageUrl = window.location.href;
    let msg = `Halo! Saya ingin membeli produk berikut:\n\n`;
    msg += `🛍️ ${nama}\n`;
    if (ukuran) msg += `📏 Ukuran: ${ukuran}\n`;
    if (warna) msg += `🎨 Warna: ${warna}\n`;
    msg += `🔢 Jumlah: ${qty}\n`;
    msg += `💰 Harga: ${harga}\n`;
    msg += `🔗 Link: ${pageUrl}\n\n`;
    msg += `Mohon konfirmasi ketersediaan produk ya. Terima kasih!`;
    return `https://wa.me/${waNumber}?text=` + encodeURIComponent(msg);
  }

  function getSelections() {
    return {
      ukuran: document.getElementById('optUkuran').value,
      warna: document.getElementById('optWarna').value,
      qty: document.getElementById('qty').value
    };
  }

  document.getElementById('buyWa').onclick = () => {
    const s = getSelections();
    window.open(buildWAUrl({ nama: productName, ukuran: s.ukuran, warna: s.warna, qty: s.qty, harga: productPrice }));
  };
  document.getElementById('bottomBuy').onclick = () => {
    const s = getSelections();
    window.open(buildWAUrl({ nama: productName, ukuran: s.ukuran, warna: s.warna, qty: s.qty, harga: productPrice }));
  };
  document.getElementById('addCart').onclick = () => alert("Produk ditambahkan ke keranjang (demo)");
  document.getElementById('bottomCart').onclick = () => alert("Buka halaman keranjang (demo)");
</script>

<!-- 🟢 MODAL BELI VIA WHATSAPP -->
<div id="waModal" class="hidden fixed inset-0 flex items-center justify-center bg-black/70 z-50 transition-opacity duration-300">
  <div class="bg-white rounded-2xl shadow-2xl w-96 p-6 relative animate-fadeIn">
    <h2 id="modalTitle" class="text-lg font-bold mb-1"></h2>
    <p id="modalPrice" class="text-blue-600 font-semibold mb-4"></p>

    <label class="block text-sm font-medium mb-1">Nama Anda</label>
    <input type="text" id="namaUser" placeholder="Nama lengkap"
           class="w-full border rounded-lg p-2 mb-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

    <label class="block text-sm font-medium mb-1">Nomor WhatsApp Anda</label>
    <input type="text" id="waUser" placeholder="Contoh: 081234567890"
           class="w-full border rounded-lg p-2 mb-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

    <label class="block text-sm font-medium mb-1">Jumlah</label>
    <input type="number" id="jumlahBeli" min="1" value="1"
           class="w-full border rounded-lg p-2 mb-5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

    <div class="flex justify-between gap-3">
      <button id="sendWA"
              class="flex-1 bg-green-500 text-white py-2 rounded-lg font-semibold hover:bg-green-600 transition active:scale-95">
        Kirim ke WhatsApp
      </button>
      <button id="closeModal"
              class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg font-semibold hover:bg-gray-300 transition active:scale-95">
        Batal
      </button>
    </div>

    <p class="text-xs text-gray-500 mt-3 text-center">
      Link akan membuka WhatsApp. Pembayaran sesuai instruksi penjual.
    </p>
  </div>
</div>

<!-- ✨ Efek animasi lembut -->
<style>
@keyframes fadeIn {
  from { opacity: 0; transform: scale(0.95); }
  to { opacity: 1; transform: scale(1); }
}
.animate-fadeIn {
  animation: fadeIn 0.25s ease forwards;
}
</style>

<script>
  // === MODAL BELI WA ===
  const modal = document.getElementById("waModal");
  const closeBtn = document.getElementById("closeModal");
  const sendBtn = document.getElementById("sendWA");

  // buka modal saat klik tombol beli
  const openButtons = [document.getElementById("buyWa"), document.getElementById("bottomBuy")];
  openButtons.forEach(btn => {
    if (btn) btn.onclick = () => {
      document.getElementById("modalTitle").textContent = productName;
      document.getElementById("modalPrice").textContent = productPrice;
      modal.classList.remove("hidden");
    };
  });

  // tutup modal
  closeBtn.onclick = () => modal.classList.add("hidden");
  window.onclick = e => { if (e.target === modal) modal.classList.add("hidden"); };

  // kirim WA
  sendBtn.onclick = () => {
    const nama = document.getElementById("namaUser").value.trim();
    const wa = document.getElementById("waUser").value.trim();
    const jumlah = document.getElementById("jumlahBeli").value;
    const s = {
      ukuran: document.getElementById('optUkuran')?.value || '-',
      warna: document.getElementById('optWarna')?.value || '-',
    };
    if (!nama || !wa) return alert("Harap isi nama dan nomor WhatsApp Anda!");
    const cleanNo = wa.replace(/^0/, "62");
    const msg = `Halo! Saya ingin membeli produk berikut:\n\n🛍️ ${productName}\n📏 Ukuran: ${s.ukuran}\n🎨 Warna: ${s.warna}\n🔢 Jumlah: ${jumlah}\n💰 Harga: ${productPrice}\n👤 Nama: ${nama}\n📞 Nomor: ${wa}`;
    window.open(`https://wa.me/${cleanNo}?text=${encodeURIComponent(msg)}`, "_blank");
    modal.classList.add("hidden");
  };
</script>

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