<!--  
NAMA - NIM : NUANSA BENING AURA JELITA - 2301410
Filename : UlasanViewModel.php
Deskripsi: Kelas ViewModel untuk tabel ulasan, berfungsi sebagai perantara antara model Ulasan dan view, 
            mengelola data ulasan untuk operasi CRUD (Create, Read, Update, Delete) sebelum dirender ke tampilan.
-->

<?php
require_once 'model/Ulasan.php';
require_once 'model/Penonton.php';
require_once 'model/Anime.php';

class UlasanViewModel {
    private $ulasan;
    private $penonton;
    private $anime;

    public function __construct() {
        $this->ulasan = new Ulasan();
        $this->penonton = new Penonton();
        $this->anime = new Anime();
    }

    public function getUlasanList() {
        return $this->ulasan->getAll();
    }

    public function getUlasanById($id) {
        return $this->ulasan->getById($id);
    }

    public function getPenonton() {
        return $this->penonton->getAll();
    }

    public function getAnime() {
        return $this->anime->getAll();
    }

    public function addUlasan($id_penonton, $id_anime, $komentar, $rating) {
        return $this->ulasan->create($id_penonton, $id_anime, $komentar, $rating);
    }

    public function updateUlasan($id, $id_penonton, $id_anime, $komentar, $rating) {
        return $this->ulasan->update($id, $id_penonton, $id_anime, $komentar, $rating);
    }

    public function deleteUlasan($id) {
        return $this->ulasan->delete($id);
    }
}
?>