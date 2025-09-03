<?php
// app/models/Usuario.php

// Cargamos la configuración / clase Database (ruta relativa desde app/models)
require_once __DIR__ . '/../../config/database.php';

class Usuario {
    private $conn;          // PDO connection
    private $table = "usuario";

    public function __construct() {
        // Creamos la conexión usando la clase Database
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    /**
     * getAll
     * Devuelve todas las filas de la tabla usuario como array asociativo.
     * Retorna array[] en caso de éxito, o array vacío si no hay filas.
     */
    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        // FETCH_ASSOC devuelve un array asociativo (columna => valor)
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * find
     * Busca un usuario por id_usuario. Retorna array asociativo o null.
     */
    public function find($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id_usuario = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    // Puedes añadir más métodos: create($data), update($id,$data), delete($id)...
}
