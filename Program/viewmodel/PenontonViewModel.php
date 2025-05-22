<!--  
NAMA - NIM : NUANSA BENING AURA JELITA - 2301410
Filename : PenontonViewModel.php
Deskripsi: Kelas ViewModel untuk tabel penonton, berfungsi sebagai perantara antara model Penonton dan view, 
            mengelola data penonton untuk operasi CRUD (Create, Read, Update, Delete) sebelum dirender ke tampilan.
-->

<?php
require_once 'model/Penonton.php';

class PenontonViewModel {
    private $penonton;

    public function __construct() {
        $this->penonton = new Penonton();
    }

    public function getPenontonList() {
        return $this->penonton->getAll();
    }

    public function getPenontonById($id) {
        return $this->penonton->getById($id);
    }

    public function addPenonton($nama, $email, $telepon) {
        return $this->penonton->create($nama, $email, $telepon);
    }

    public function updatePenonton($id, $nama, $email, $telepon) {
        return $this->penonton->update($id, $nama, $email, $telepon);
    }

    public function deletePenonton($id) {
        return $this->penonton->delete($id);
    }
}
?>