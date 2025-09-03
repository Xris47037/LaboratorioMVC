<?php
// public/test_usuario.php - script de prueba rápido
require_once __DIR__ . '/../app/models/Usuario.php';

$u = new Usuario();
$rows = $u->getAll();

echo "<h2>Prueba modelo Usuario - " . count($rows) . " registros</h2>";
echo "<pre>";
print_r($rows);
echo "</pre>";
