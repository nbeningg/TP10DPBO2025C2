<!--  
NAMA - NIM : NUANSA BENING AURA JELITA - 2301410
Filename : Database.php
Deskripsi: Kelas untuk mengelola koneksi database menggunakan PDO. Lalu, menyediakan metode 
            untuk membuat koneksi ke database MySQL dengan nama 'anime' dan menangani error koneksi secara aman.
-->

<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "anime";
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>