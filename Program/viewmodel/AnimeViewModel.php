<!--  
NAMA - NIM : NUANSA BENING AURA JELITA - 2301410
Filename : AnimeViewModel.php
Deskripsi: Kelas ViewModel untuk tabel anime, berfungsi sebagai perantara antara model Anime dan view, 
            mengelola data anime untuk operasi CRUD (Create, Read, Update, Delete) sebelum dirender ke tampilan.
-->

<?php
require_once 'model/Anime.php';

class AnimeViewModel {
    private $anime;

    public function __construct() {
        $this->anime = new Anime();
    }

    public function getAnimeList() {
        return $this->anime->getAll();
    }

    public function getAnimeById($id) {
        return $this->anime->getById($id);
    }

    public function addAnime($nama_anime, $genre, $tahun_rilis, $status) {
        return $this->anime->create($nama_anime, $genre, $tahun_rilis, $status);
    }

    public function updateAnime($id, $nama_anime, $genre, $tahun_rilis, $status) {
        return $this->anime->update($id, $nama_anime, $genre, $tahun_rilis, $status);
    }

    public function deleteAnime($id) {
        return $this->anime->delete($id);
    }
}
?>