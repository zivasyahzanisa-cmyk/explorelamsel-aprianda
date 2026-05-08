<?php
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$data = [
  'produk_umkm' => 'Produk Tidak Ditemukan',
  'harga_umkm' => 0,
  'deskripsi_umkm' => 'Data produk ini belum tersedia.',
  'gambar_umkm' => 'default.jpg',
  'stok_umkm' => 0,
  'kategori_umkm' => '-'
];

if ($id > 0) {
  $res = mysqli_query($conn, "SELECT * FROM produk_umkm WHERE id_produk=$id LIMIT 1");
  if ($res && mysqli_num_rows($res) > 0) $data = mysqli_fetch_assoc($res);
}

function rupiah($n) { return 'Rp ' . number_format($n, 0, ',', '.'); }
$gambar = 'uploads/' . (!empty($data['gambar_umkm']) ? $data['gambar_umkm'] : 'default.jpg');
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title><?= htmlspecialchars($data['produk_umkm']) ?> — Explore Lamsel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
  body { font-family: 'Poppins', sans-serif; background-color: #f8fafc; }
  .fade-in { animation: fadeIn .3s ease-in-out; }
  @keyframes fadeIn { from{opacity:0;transform:scale(.97)} to{opacity:1;transform:scale(1)} }
</style>
</head>
<body class="text-gray-800">

<!-- 🔵 HEADER -->
<header class="bg-white shadow fixed w-full z-50 top-0">
  <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-3">
    <a href="homepage.php" class="flex items-center space-x-2">
      <img src="img/LOGO DINAS.png" class="h-10 w-10 object-contain" alt="">
      <span class="font-bold text-gray-700 text-xl">Explore<span class="text-blue-500">Lamsel</span></span>
    </a>
    <nav class="hidden md:flex space-x-6 text-sm font-medium">
      <a href="homepage.php" class="hover:text-blue-600">Home</a>
      <a href="shop.php" class="text-blue-600 font-semibold">Shop</a>
      <a href="contact.php" class="hover:text-blue-600">Contact</a>
    </nav>
    <button id="cartBtn" class="relative text-gray-700">
      🛒
      <span id="cartCount" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">0</span>
    </button>
  </div>
</header>

<!-- 🛍️ DETAIL PRODUK -->
<main class="max-w-6xl mx-auto px-6 py-28 grid md:grid-cols-2 gap-10 items-start">
  <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
    <img src="<?= htmlspecialchars($gambar) ?>" class="w-full h-[420px] object-cover" alt="">
  </div>

  <div>
    <h1 class="text-3xl font-bold mb-2"><?= htmlspecialchars($data['produk_umkm']) ?></h1>
    <p class="text-2xl font-extrabold text-blue-600 mb-4"><?= rupiah($data['harga_umkm']) ?></p>
    <p class="text-sm text-gray-600 mb-6">Kategori: <?= htmlspecialchars($data['kategori_umkm']) ?></p>

    <div class="flex items-center space-x-3 mb-6">
      <input id="qty" type="number" min="1" value="1" class="border rounded-lg w-20 p-2 text-center focus:ring-2 focus:ring-blue-500">
      <button id="addCart" class="bg-gray-200 hover:bg-gray-300 px-5 py-3 rounded-lg font-semibold transition">Tambah ke Keranjang</button>
      <button id="checkoutBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg font-semibold transition">Beli Sekarang</button>
    </div>

    <div class="bg-white p-5 rounded-xl border">
      <h3 class="font-bold mb-2 text-lg">Deskripsi Produk</h3>
      <p class="text-gray-700 text-sm leading-relaxed"><?= nl2br(htmlspecialchars($data['deskripsi_umkm'])) ?></p>
    </div>
  </div>
</main>

<!-- 🧾 MODAL CHECKOUT -->
<div id="checkoutModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
  <div class="bg-white rounded-2xl shadow-2xl w-96 p-6 fade-in">
    <h2 class="text-lg font-bold mb-4 text-center text-blue-600">Checkout Pembayaran</h2>

    <div id="summary" class="mb-5 text-sm space-y-1">
      <p class="font-medium"><?= htmlspecialchars($data['produk_umkm']) ?></p>
      <p>Harga: <?= rupiah($data['harga_umkm']) ?></p>
      <p>Jumlah: <span id="summaryQty">1</span></p>
      <p>Total: <span id="summaryTotal" class="font-bold text-blue-600"><?= rupiah($data['harga_umkm']) ?></span></p>
    </div>

    <label class="block text-sm font-medium mb-1">Pilih Metode Pembayaran</label>
    <select id="paymentMethod" class="border rounded-lg p-2 w-full mb-4 focus:ring-2 focus:ring-blue-500">
      <option value="">-- Pilih --</option>
      <option value="bank">Transfer Bank</option>
      <option value="dana">DANA</option>
      <option value="ovo">OVO</option>
      <option value="gopay">GoPay</option>
      <option value="qris">QRIS</option>
    </select>

    <div id="paymentInfo" class="bg-gray-50 p-3 rounded-lg text-sm text-gray-700 mb-4 hidden">
      <p><strong>Nomor Virtual Account / QR:</strong></p>
      <p id="vaText" class="text-blue-600 font-semibold"></p>
    </div>

    <div class="flex gap-3">
      <button id="confirmPay" class="flex-1 bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">Bayar Sekarang</button>
      <button id="closeModal" class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg font-semibold hover:bg-gray-300 transition">Batal</button>
    </div>
  </div>
</div>

<!-- 🛒 MODAL KERANJANG -->
<div id="cartModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
  <div class="bg-white w-[420px] rounded-2xl shadow-2xl p-6 fade-in">
    <h2 class="text-lg font-bold mb-3 text-blue-600">Keranjang Belanja</h2>
    <ul id="cartList" class="divide-y text-sm mb-4"></ul>
    <div class="flex justify-between items-center font-semibold mb-4">
      <span>Total:</span>
      <span id="cartTotal" class="text-blue-600"></span>
    </div>
    <div class="flex gap-3">
      <button id="toCheckout" class="flex-1 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Checkout</button>
      <button id="closeCart" class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg hover:bg-gray-300">Tutup</button>
    </div>
  </div>
</div>

<script>
const price = <?= $data['harga_umkm'] ?>;
const name = <?= json_encode($data['produk_umkm']) ?>;

// === CART SYSTEM ===
let cart = JSON.parse(localStorage.getItem('cart')) || [];
const updateCartUI = () => {
  document.getElementById('cartCount').innerText = cart.length;
  const list = document.getElementById('cartList');
  const total = cart.reduce((sum, p) => sum + p.price * p.qty, 0);
  list.innerHTML = cart.map(p => `
    <li class="py-2 flex justify-between">
      <span>${p.name} x${p.qty}</span>
      <span class="font-medium">Rp ${(p.price*p.qty).toLocaleString()}</span>
    </li>
  `).join('');
  document.getElementById('cartTotal').innerText = 'Rp ' + total.toLocaleString();
};
updateCartUI();

document.getElementById('addCart').onclick = () => {
  const qty = parseInt(document.getElementById('qty').value);
  cart.push({ name, price, qty });
  localStorage.setItem('cart', JSON.stringify(cart));
  updateCartUI();
  alert("✅ Produk berhasil ditambahkan ke keranjang!");
};

// === CHECKOUT MODAL ===
const modal = document.getElementById('checkoutModal');
const summaryQty = document.getElementById('summaryQty');
const summaryTotal = document.getElementById('summaryTotal');

document.getElementById('checkoutBtn').onclick = () => {
  const qty = parseInt(document.getElementById('qty').value);
  summaryQty.innerText = qty;
  summaryTotal.innerText = 'Rp ' + (price * qty).toLocaleString();
  modal.classList.remove('hidden');
};

document.getElementById('closeModal').onclick = () => modal.classList.add('hidden');

// === PAYMENT ===
const paymentSelect = document.getElementById('paymentMethod');
const info = document.getElementById('paymentInfo');
const vaText = document.getElementById('vaText');

paymentSelect.addEventListener('change', e => {
  info.classList.remove('hidden');
  const val = e.target.value;
  const vaCodes = {
    bank: '9876543210 (BCA a/n UMKM Lamsel)',
    dana: '0857-8888-1234 (DANA)',
    ovo: '0812-7777-1234 (OVO)',
    gopay: '0858-9999-2345 (GoPay)',
    qris: 'Scan QR di aplikasi Anda (QRIS)'
  };
  vaText.innerText = vaCodes[val] || '';
});

document.getElementById('confirmPay').onclick = () => {
  alert('✅ Pembayaran berhasil dikonfirmasi!\nTerima kasih telah berbelanja di ExploreLamsel.');
  modal.classList.add('hidden');
};

// === CART MODAL ===
const cartModal = document.getElementById('cartModal');
document.getElementById('cartBtn').onclick = () => cartModal.classList.remove('hidden');
document.getElementById('closeCart').onclick = () => cartModal.classList.add('hidden');
document.getElementById('toCheckout').onclick = () => {
  cartModal.classList.add('hidden');
  document.getElementById('checkoutBtn').click();
};
</script>

</body>
</html>
