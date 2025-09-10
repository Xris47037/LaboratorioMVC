<?php
// Front controller mínimo - decide qué controlador ejecutar
error_reporting(E_ALL);
ini_set('display_errors', '1');

$controller = $_GET['controller'] ?? 'usuario';
$action = $_GET['action'] ?? 'index';

$controller = ucfirst($controller) . 'Controller';
$controllerFile = __DIR__ . '/../app/controllers/' . $controller . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $obj = new $controller();
    if (method_exists($obj, $action)) {
        $obj->$action();
    } else {
        echo "Acción no encontrada: $action";
    }
} else {
    echo "Controlador no encontrado: $controllerFile";
}
?>