<?php
// Modelo Prestamo
require_once __DIR__ . '/../../config/database.php';

class Prestamo {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    // Devuelve prestamos con info del usuario y del estado
    public function getAll() {
        $sql = "SELECT p.id_prestamo, p.fecha_prestamo, p.fecha_devolucion,
                       u.id_usuario, u.nombre AS usuario_nombre, u.apellido AS usuario_apellido,
                       ep.nombre_estado AS estado
                FROM Prestamo p
                JOIN Usuario u ON p.id_usuario = u.id_usuario
                LEFT JOIN EstadoPrestamo ep ON p.id_estado_prestamo = ep.id_estado_prestamo
                ORDER BY p.id_prestamo DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>