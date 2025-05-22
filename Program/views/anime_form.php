<!--  
NAMA - NIM : NUANSA BENING AURA JELITA - 2301410
Filename : anime_form.php
Deskripsi: File view untuk menampilkan formulir anime, digunakan untuk 
            menambah atau mengedit data anime dengan elemen HTML yang dirender ke webpage.
-->

<?php
require_once 'views/template/header.php';
?>

<div class="bg-white rounded-xl shadow-lg p-8 max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
        🎥 <span class="ml-2"><?php echo isset($anime) ? 'Edit Anime' : 'Tambah Anime Baru'; ?></span>
    </h2>
    
    <form action="index.php?entity=anime&action=<?php echo isset($anime) ? 'update&id=' . $anime['id'] : 'save'; ?>" method="POST" class="space-y-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-gray-700 flex items-center">
                🎌 <span class="ml-1">Nama Anime</span>
            </label>
            <input type="text" name="nama_anime" value="<?php echo isset($anime) ? $anime['nama_anime'] : ''; ?>" class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-red-500 focus:outline-none transition duration-200" placeholder="Masukkan nama anime..." required>
        </div>
        
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-gray-700 flex items-center">
                🎭 <span class="ml-1">Genre</span>
            </label>
            <input type="text" name="genre" value="<?php echo isset($anime) ? $anime['genre'] : ''; ?>" class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-red-500 focus:outline-none transition duration-200" placeholder="Action, Romance, Comedy, dll...">
        </div>
        
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-gray-700 flex items-center">
                📅 <span class="ml-1">Tahun Rilis</span>
            </label>
            <input type="number" name="tahun_rilis" value="<?php echo isset($anime) ? $anime['tahun_rilis'] : ''; ?>" class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-red-500 focus:outline-none transition duration-200" placeholder="1990, 2010, 2020, dll..." min="1900" max="2030">
        </div>
        
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-gray-700 flex items-center">
                📺 <span class="ml-1">Status</span>
            </label>
            <select name="status" class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-red-500 focus:outline-none transition duration-200" required>
                <option value="">Pilih Status...</option>
                <option value="Tamat" <?php echo isset($anime) && $anime['status'] == 'Tamat' ? 'selected' : ''; ?>>✅ Tamat</option>
                <option value="Ongoing" <?php echo isset($anime) && $anime['status'] == 'Ongoing' ? 'selected' : ''; ?>>🔄 Ongoing</option>
            </select>
        </div>
        
        <div class="flex space-x-4 pt-4">
            <button type="submit" class="flex-1 bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-white px-6 py-3 rounded-lg font-semibold transition duration-300 transform hover:scale-105 shadow-lg">
                💾 Simpan Anime
            </button>
            <a href="index.php?entity=anime" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition duration-300 text-center">
                ❌ Batal
            </a>
        </div>
    </form>
</div>

<?php
require_once 'views/template/footer.php';
?>