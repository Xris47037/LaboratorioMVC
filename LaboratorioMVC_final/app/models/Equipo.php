<?php
// Modelo Equipo
require_once __DIR__ . '/../../config/database.php';

class Equipo {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    // Devuelve todos los equipos con el estado por nombre
    public function getAll() {
        $sql = "SELECT e.id_equipo, e.nombre_equipo, e.descripcion, e.fecha_adquisicion,
                       e.cantidad_total, e.cantidad_disponible, s.nombre_estado AS estado
                FROM Equipo e
                LEFT JOIN EstadoEquipo s ON e.id_estado_equipo = s.id_estado_equipo
                ORDER BY e.id_equipo DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>