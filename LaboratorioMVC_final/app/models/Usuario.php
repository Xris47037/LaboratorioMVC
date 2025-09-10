<?php
// Modelo Usuario
require_once __DIR__ . '/../../config/database.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    // Devuelve un array asociativo con los usuarios y su rol (nombre_rol).
    public function getAll() {
        $sql = "SELECT u.id_usuario, u.nombre, u.apellido, u.correo, r.nombre_rol AS rol
                FROM Usuario u
                LEFT JOIN Rol r ON u.id_rol = r.id_rol
                ORDER BY u.id_usuario DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>