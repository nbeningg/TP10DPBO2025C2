<!--  
NAMA - NIM : NUANSA BENING AURA JELITA - 2301410
Filename : penonton_form.php
Deskripsi: File view untuk menampilkan formulir penonton, digunakan untuk 
            menambah atau mengedit data penonton dengan elemen HTML yang dirender ke webpage.
-->

<?php
require_once 'views/template/header.php';
?>

<div class="bg-white rounded-xl shadow-lg p-8 max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
        👥 <span class="ml-2"><?php echo isset($penonton) ? 'Edit Penonton' : 'Tambah Penonton Baru'; ?></span>
    </h2>
    
    <form action="index.php?entity=penonton&action=<?php echo isset($penonton) ? 'update&id=' . $penonton['id'] : 'save'; ?>" method="POST" class="space-y-6">
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-gray-700 flex items-center">
                👤 <span class="ml-1">Nama Lengkap</span>
            </label>
            <input type="text" name="nama" value="<?php echo isset($penonton) ? $penonton['nama'] : ''; ?>" class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-500 focus:outline-none transition duration-200" placeholder="Masukkan nama lengkap..." required>
        </div>
        
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-gray-700 flex items-center">
                📧 <span class="ml-1">Email</span>
            </label>
            <input type="email" name="email" value="<?php echo isset($penonton) ? $penonton['email'] : ''; ?>" class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-500 focus:outline-none transition duration-200" placeholder="contoh@email.com" required>
        </div>
        
        <div class="space-y-2">
            <label class="block text-sm font-semibold text-gray-700 flex items-center">
                📱 <span class="ml-1">Nomor Telepon</span>
            </label>
            <input type="text" name="telepon" value="<?php echo isset($penonton) ? $penonton['telepon'] : ''; ?>" class="w-full border-2 border-gray-300 rounded-lg p-3 focus:border-purple-500 focus:outline-none transition duration-200" placeholder="08xxxxxxxxxx">
        </div>
        
        <div class="flex space-x-4 pt-4">
            <button type="submit" class="flex-1 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white px-6 py-3 rounded-lg font-semibold transition duration-300 transform hover:scale-105 shadow-lg">
                💾 Simpan Data
            </button>
            <a href="index.php?entity=penonton" class="flex-1 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition duration-300 text-center">
                ❌ Batal
            </a>
        </div>
    </form>
</div>

<?php
require_once 'views/template/footer.php';
?>