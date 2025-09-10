<?php
// Controlador Equipo
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Equipo.php';

class EquipoController extends Controller {
    public function index() {
        $m = new Equipo();
        $equipos = $m->getAll();
        $this->view('equipos/index', ['equipos' => $equipos]);
    }
}
?>