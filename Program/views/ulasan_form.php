<!--  
NAMA - NIM : NUANSA BENING AURA JELITA - 2301410
Filename : ulasan_form.php
Deskripsi: File view untuk menampilkan formulir ulasan, digunakan untuk 
            menambah atau mengedit data ulasan dengan elemen HTML yang dirender ke webpage.
-->

<?php
require_once 'views/template/header.php';
?>

<div class="bg-white rounded-xl shadow-lg p-8 max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
        📝 <span class="ml-2"><?php echo isset($ulasan) ? 'Edit Ulasan' : 'Tambah Ulasan Baru'; ?></span>
    </h2>
    
    <form action="index.php?entity=ulasan&action=<?php echo isset($ulasan) ? 'update&id=' . $ulasan['id'] : 'save'; ?>" method="POST" class="space-y-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-gray-700 flex items-center">
                👤 <span class="ml-1">Penonton</span>
            </label>
            <select name="id_penonton" class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-500 focus:outline-none transition duration-200" required>
                <option value="">Pilih Penonton...</option>
                <?php foreach ($penonton as $p): ?>
                <option value="<?php echo $p['id']; ?>" <?php echo isset($ulasan) && $ulasan['id_penonton'] == $p['id'] ? 'selected' : ''; ?>><?php echo $p['nama']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-gray-700 flex items-center">
                🎥 <span class="ml-1">Anime</span>
            </label>
            <select name="id_anime" class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-500 focus:outline-none transition duration-200" required>
                <option value="">Pilih Anime...</option>
                <?php foreach ($anime as $a): ?>
                <option value="<?php echo $a['id']; ?>" <?php echo isset($ulasan) && $ulasan['id_anime'] == $a['id'] ? 'selected' : ''; ?>><?php echo $a['nama_anime']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-gray-700 flex items-center">
                💬 <span class="ml-1">Komentar</span>
            </label>
            <textarea name="komentar" rows="4" class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-500 focus:outline-none transition duration-200 resize-none" placeholder="Tulis review anime di sini..."><?php echo isset($ulasan) ? $ulasan['komentar'] : ''; ?></textarea>
        </div>
        
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-gray-700 flex items-center">
                ⭐ <span class="ml-1">Rating (1-5 Bintang)</span>
            </label>
            <select name="rating" class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-500 focus:outline-none transition duration-200" required>
                <option value="">Pilih Rating...</option>
                <option value="1" <?php echo isset($ulasan) && $ulasan['rating'] == 1 ? 'selected' : ''; ?>>⭐ 1 Bintang - Sangat Buruk</option>
                <option value="2" <?php echo isset($ulasan) && $ulasan['rating'] == 2 ? 'selected' : ''; ?>>⭐⭐ 2 Bintang - Buruk</option>
                <option value="3" <?php echo isset($ulasan) && $ulasan['rating'] == 3 ? 'selected' : ''; ?>>⭐⭐⭐ 3 Bintang - Biasa</option>
                <option value="4" <?php echo isset($ulasan) && $ulasan['rating'] == 4 ? 'selected' : ''; ?>>⭐⭐⭐⭐ 4 Bintang - Bagus</option>
                <option value="5" <?php echo isset($ulasan) && $ulasan['rating'] == 5 ? 'selected' : ''; ?>>⭐⭐⭐⭐⭐ 5 Bintang - Luar Biasa</option>
            </select>
        </div>
        
        <div class="flex space-x-4 pt-4">
            <button type="submit" class="flex-1 bg-gradient-to-r from-purple-500 to-blue-500 hover:from-purple-600 hover:to-blue-600 text-white px-6 py-3 rounded-lg font-semibold transition duration-300 transform hover:scale-105 shadow-lg">
                💾 Simpan Ulasan
            </button>
            <a href="index.php?entity=ulasan" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition duration-300 text-center">
                ❌ Batal
            </a>
        </div>
    </form>
</div>

<?php
require_once 'views/template/footer.php';
?>