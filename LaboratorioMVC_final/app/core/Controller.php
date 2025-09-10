<?php
// Clase base para renderizar vistas y hacer redirecciones.
class Controller {
    protected function view(string $viewPath, array $data = []) {
        extract($data);
        // Calculamos una base URL simple para enlaces dentro del public
        $baseUrl = rtrim(str_replace('\\','/', dirname($_SERVER['SCRIPT_NAME'])), '/');
        $viewFile = __DIR__ . '/../views/' . $viewPath . '.php';
        $layout   = __DIR__ . '/../views/layouts/header.php';
        $footer   = __DIR__ . '/../views/layouts/footer.php';

        if (file_exists($viewFile)) {
            include $layout;
            include $viewFile;
            include $footer;
        } else {
            echo "Vista no encontrada: $viewFile";
        }
    }

    protected function redirect(string $path) {
        $base = rtrim(str_replace('\\','/', dirname($_SERVER['SCRIPT_NAME'])), '/');
        header("Location: {$base}/index.php?controller={$path}");
        exit;
    }
}
?>