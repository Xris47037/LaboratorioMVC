<?php
// config/database.php
class Database {
    private $host = "localhost";
    private $db_name = "laboratorio";
    private $username = "root"; // en XAMPP el usuario por defecto es root
    private $password = "";     // y la contraseña está vacía
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Error en la conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
