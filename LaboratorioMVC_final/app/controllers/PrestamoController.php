<?php
// Controlador Prestamo
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Prestamo.php';

class PrestamoController extends Controller {
    public function index() {
        $m = new Prestamo();
        $prestamos = $m->getAll();
        $this->view('prestamos/index', ['prestamos' => $prestamos]);
    }
}
?>