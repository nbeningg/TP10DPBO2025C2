<!--  
NAMA - NIM : NUANSA BENING AURA JELITA - 2301410
Filename : anime_list.php
Deskripsi: File view untuk menampilkan daftar anime dalam bentuk tabel, berisi elemen HTML 
            yang dirender ke webpage untuk menampilkan data anime beserta aksi edit dan hapus.
-->

<?php
require_once 'views/template/header.php';
?>

<div class="bg-white rounded-xl shadow-lg p-8 mb-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-800 flex items-center">
            🎥 <span class="ml-2">Daftar Anime</span>
        </h2>
        <a href="index.php?entity=anime&action=add" class="bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-white px-6 py-3 rounded-lg font-medium transition duration-300 transform hover:scale-105 shadow-lg">
            ➕ Tambah Anime
        </a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-white rounded-lg overflow-hidden shadow-sm">
            <thead>
                <tr class="bg-gradient-to-r from-red-100 to-pink-100">
                    <th class="border-b-2 border-red-200 p-4 text-left font-semibold text-gray-700">🎌 Nama Anime</th>
                    <th class="border-b-2 border-red-200 p-4 text-left font-semibold text-gray-700">🎭 Genre</th>
                    <th class="border-b-2 border-red-200 p-4 text-center font-semibold text-gray-700">📅 Tahun</th>
                    <th class="border-b-2 border-red-200 p-4 text-center font-semibold text-gray-700">📺 Status</th>
                    <th class="border-b-2 border-red-200 p-4 text-center font-semibold text-gray-700">🔧 Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($animeList as $anime): ?>
                <tr class="hover:bg-red-50 transition duration-200">
                    <td class="border-b border-gray-200 p-4 font-bold text-gray-800"><?php echo $anime['nama_anime']; ?></td>
                    <td class="border-b border-gray-200 p-4 text-purple-600 font-medium"><?php echo $anime['genre']; ?></td>
                    <td class="border-b border-gray-200 p-4 text-center text-gray-600"><?php echo $anime['tahun_rilis']; ?></td>
                    <td class="border-b border-gray-200 p-4 text-center">
                        <span class="px-3 py-1 rounded-full text-sm font-medium <?php echo $anime['status'] == 'Tamat' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700'; ?>">
                            <?php echo $anime['status'] == 'Tamat' ? '✅ Tamat' : '🔄 Ongoing'; ?>
                        </span>
                    </td>
                    <td class="border-b border-gray-200 p-4 text-center">
                        <a href="index.php?entity=anime&action=edit&id=<?php echo $anime['id']; ?>" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm font-medium transition duration-200 mr-2">✏️ Edit</a>
                        <a href="index.php?entity=anime&action=delete&id=<?php echo $anime['id']; ?>" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm font-medium transition duration-200" onclick="return confirm('Yakin ingin menghapus anime ini?');">🗑️ Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
require_once 'views/template/footer.php';
?>