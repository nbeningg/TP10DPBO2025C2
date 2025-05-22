<!--  
NAMA - NIM : NUANSA BENING AURA JELITA - 2301410
Filename : Penonton.php
Deskripsi: Kelas model untuk tabel penonton, menyediakan fungsi-fungsi CRUD (Create, Read, Update, Delete) 
            untuk mengelola data penonton di database menggunakan PDO dengan prepared statement untuk keamanan
-->

<?php
require_once 'config/Database.php';

class Penonton {
    private $conn;
    private $table = 'penonton';

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

    public function create($nama, $email, $telepon) {
        $query = "INSERT INTO " . $this->table . " (nama, email, telepon) VALUES (:nama, :email, :telepon)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telepon', $telepon);
        return $stmt->execute();
    }

    public function update($id, $nama, $email, $telepon) {
        $query = "UPDATE " . $this->table . " SET nama = :nama, email = :email, telepon = :telepon WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telepon', $telepon);
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