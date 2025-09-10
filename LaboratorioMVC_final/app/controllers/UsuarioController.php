<?php
// Controlador Usuario - aquí recibimos la acción y mostramos la vista correspondiente
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController extends Controller {
    public function index() {
        $m = new Usuario();
        $usuarios = $m->getAll();
        $this->view('usuarios/index', ['usuarios' => $usuarios]);
    }
}
?>