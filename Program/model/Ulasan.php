<!--  
NAMA - NIM : NUANSA BENING AURA JELITA - 2301410
Filename : Ulasan.php
Deskripsi: Kelas model untuk tabel ulasan, menyediakan fungsi-fungsi CRUD (Create, Read, Update, Delete) 
            untuk mengelola data ulasan di database menggunakan PDO dengan prepared statement untuk keamanan
-->

<?php
require_once 'config/Database.php';

class Ulasan {
    private $conn;
    private $table = 'ulasan';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT u.*, p.nama as nama_penonton, a.nama_anime 
                 FROM " . $this->table . " u 
                 JOIN penonton p ON u.id_penonton = p.id 
                 JOIN anime a ON u.id_anime = a.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT u.*, p.nama as nama_penonton, a.nama_anime 
                 FROM " . $this->table . " u 
                 JOIN penonton p ON u.id_penonton = p.id 
                 JOIN anime a ON u.id_anime = a.id 
                 WHERE u.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($id_penonton, $id_anime, $komentar, $rating) {
        $query = "INSERT INTO " . $this->table . " (id_penonton, id_anime, komentar, rating) VALUES (:id_penonton, :id_anime, :komentar, :rating)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_penonton', $id_penonton);
        $stmt->bindParam(':id_anime', $id_anime);
        $stmt->bindParam(':komentar', $komentar);
        $stmt->bindParam(':rating', $rating);
        return $stmt->execute();
    }

    public function update($id, $id_penonton, $id_anime, $komentar, $rating) {
        $query = "UPDATE " . $this->table . " SET id_penonton = :id_penonton, id_anime = :id_anime, komentar = :komentar, rating = :rating WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_penonton', $id_penonton);
        $stmt->bindParam(':id_anime', $id_anime);
        $stmt->bindParam(':komentar', $komentar);
        $stmt->bindParam(':rating', $rating);
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