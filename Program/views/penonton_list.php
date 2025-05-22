<!--  
NAMA - NIM : NUANSA BENING AURA JELITA - 2301410
Filename : penonton_list.php
Deskripsi: File view untuk menampilkan daftar penonton dalam bentuk tabel, berisi elemen HTML 
            yang dirender ke webpage untuk menampilkan data penonton beserta aksi edit dan hapus.
-->

<?php
require_once 'views/template/header.php';
?>

<div class="bg-white rounded-xl shadow-lg p-8 mb-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-800 flex items-center">
            👥 <span class="ml-2">Daftar Penonton</span>
        </h2>
        <a href="index.php?entity=penonton&action=add" class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white px-6 py-3 rounded-lg font-medium transition duration-300 transform hover:scale-105 shadow-lg">
            ➕ Tambah Penonton
        </a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full border-collapse bg-white rounded-lg overflow-hidden shadow-sm">
            <thead>
                <tr class="bg-gradient-to-r from-purple-100 to-pink-100">
                    <th class="border-b-2 border-purple-200 p-4 text-left font-semibold text-gray-700">👤 Nama</th>
                    <th class="border-b-2 border-purple-200 p-4 text-left font-semibold text-gray-700">📧 Email</th>
                    <th class="border-b-2 border-purple-200 p-4 text-left font-semibold text-gray-700">📱 Telepon</th>
                    <th class="border-b-2 border-purple-200 p-4 text-center font-semibold text-gray-700">🔧 Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penontonList as $penonton): ?>
                <tr class="hover:bg-purple-50 transition duration-200">
                    <td class="border-b border-gray-200 p-4 font-medium text-gray-800"><?php echo $penonton['nama']; ?></td>
                    <td class="border-b border-gray-200 p-4 text-purple-600"><?php echo $penonton['email']; ?></td>
                    <td class="border-b border-gray-200 p-4 text-gray-600"><?php echo $penonton['telepon']; ?></td>
                    <td class="border-b border-gray-200 p-4 text-center">
                        <a href="index.php?entity=penonton&action=edit&id=<?php echo $penonton['id']; ?>" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm font-medium transition duration-200 mr-2">✏️ Edit</a>
                        <a href="index.php?entity=penonton&action=delete&id=<?php echo $penonton['id']; ?>" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm font-medium transition duration-200" onclick="return confirm('Yakin ingin menghapus penonton ini?');">🗑️ Hapus</a>
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