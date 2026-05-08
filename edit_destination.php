<?php
include 'koneksi.php';

// Pastikan id dikirim
if (!isset($_GET['id'])) {
    die("ID destinasi tidak ditemukan.");
}

$id = intval($_GET['id']);
$result = mysqli_query($conn, "SELECT * FROM destination WHERE id = $id LIMIT 1");
$dest = mysqli_fetch_assoc($result);
if (!$dest) die("Destinasi tidak ditemukan.");

// Simpan perubahan jika form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $alamat = $_POST['alamat'];
    $jam_buka = $_POST['jam_buka'];
    $deskripsi = $_POST['deskripsi'];

    $gambar = $dest['gambar']; // default gambar lama
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif'];
        if(in_array($ext, $allowed)){
            $gambar = uniqid() . '.' . $ext;
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/' . $gambar);
        }
    }

    $query = "UPDATE destination SET
                nama='$nama',
                kategori='$kategori',
                alamat='$alamat',
                jam_buka='$jam_buka',
                deskripsi='$deskripsi',
                gambar='$gambar'
              WHERE id=$id";
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
<title>Edit Destinasi - ExploreLamsel</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-screen font-sans text-gray-800">

<section class="max-w-2xl mx-auto bg-white mt-36 mb-20 p-10 rounded-3xl shadow-lg border border-blue-100">
<h2 class="text-3xl font-bold text-center text-blue-700 mb-8">Edit Destinasi</h2>

<form method="POST" enctype="multipart/form-data" class="space-y-5">
  <input type="text" name="nama" placeholder="Nama Destinasi" required
         value="<?php echo htmlspecialchars($dest['nama']); ?>"
         class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">

  <select name="kategori" required class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">
    <option value="">-- Pilih Kategori --</option>
    <?php
    $categories = ["Top Destination","Cafe","Wisata Alam","Pantai","Taman","Kuliner","Budaya"];
    foreach($categories as $cat){
        $selected = ($dest['kategori']==$cat) ? "selected" : "";
        echo "<option value='$cat' $selected>$cat</option>";
    }
    ?>
  </select>

  <input type="text" name="alamat" placeholder="Alamat" required 
         value="<?php echo htmlspecialchars($dest['alamat']); ?>"
         class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">

  <input type="text" name="jam_buka" placeholder="Jam Buka (contoh: 08.00 - 17.00)" required
         value="<?php echo htmlspecialchars($dest['jam_buka']); ?>"
         class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">

  <textarea name="deskripsi" rows="4" placeholder="Deskripsi" required
            class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500"><?php echo htmlspecialchars($dest['deskripsi']); ?></textarea>

  <p class="text-sm text-gray-500">Gambar saat ini:</p>
  <img src="uploads/<?php echo htmlspecialchars($dest['gambar']); ?>" class="w-48 h-32 object-cover rounded mb-3">

  <input type="file" name="gambar" accept="image/*" class="w-full border rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">

  <div class="text-center pt-4">
    <button type="submit" class="bg-blue-600 text-white px-8 py-2.5 rounded-xl hover:bg-blue-700 transition">💾 Simpan Perubahan</button>
  </div>
</form>
</section>

</body>
</html>
