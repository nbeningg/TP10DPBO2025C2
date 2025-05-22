<!--  
NAMA - NIM : NUANSA BENING AURA JELITA - 2301410
Filename : Anime.php
Deskripsi: Kelas model untuk tabel anime, menyediakan fungsi-fungsi CRUD (Create, Read, Update, Delete) 
            untuk mengelola data anime di database menggunakan PDO dengan prepared statement untuk keamanan
-->

<?php
require_once 'config/Database.php';

class Anime {
    private $conn;
    private $table = 'anime';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama_anime, $genre, $tahun_rilis, $status) {
        $query = "INSERT INTO " . $this->table . " (nama_anime, genre, tahun_rilis, status) VALUES (:nama_anime, :genre, :tahun_rilis, :status)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_anime', $nama_anime);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':tahun_rilis', $tahun_rilis);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }

    public function update($id, $nama_anime, $genre, $tahun_rilis, $status) {
        $query = "UPDATE " . $this->table . " SET nama_anime = :nama_anime, genre = :genre, tahun_rilis = :tahun_rilis, status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama_anime', $nama_anime);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':tahun_rilis', $tahun_rilis);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>