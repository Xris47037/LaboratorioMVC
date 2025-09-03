<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laboratorio MVC</title>
    <link rel="stylesheet" href="/LaboratorioMVC/public/style.css">
</head>
<body>
    <header>
        <h1>Sistema de Laboratorio</h1>
        <nav>
            <a href="/LaboratorioMVC/public/">Inicio</a> |
            <a href="/LaboratorioMVC/public/?url=usuario/index">Usuarios</a> |
            <a href="/LaboratorioMVC/public/?url=equipo/index">Equipos</a> |
            <a href="/LaboratorioMVC/public/?url=prestamo/index">Préstamos</a>
        </nav>
    </header>

    <main>
        <?php if (isset($content)) echo $content; ?>
    </main>

    <footer>
        <p>© 2025 Proyecto Laboratorio</p>
    </footer>
</body>
</html>
