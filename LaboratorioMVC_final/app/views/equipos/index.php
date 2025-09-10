<h2>Equipos</h2>
<p>Lista de equipos con el nombre del estado.</p>
<?php if(!empty($equipos)): ?>
<table>
  <thead>
    <tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Fecha adquisición</th><th>Estado</th><th>Total</th><th>Disponible</th></tr>
  </thead>
  <tbody>
    <?php foreach($equipos as $e): ?>
    <tr>
      <td><?= htmlspecialchars($e['id_equipo']) ?></td>
      <td><?= htmlspecialchars($e['nombre_equipo']) ?></td>
      <td><?= htmlspecialchars($e['descripcion']) ?></td>
      <td><?= htmlspecialchars($e['fecha_adquisicion']) ?></td>
      <td><?= htmlspecialchars($e['estado'] ?? '—') ?></td>
      <td><?= htmlspecialchars($e['cantidad_total']) ?></td>
      <td><?= htmlspecialchars($e['cantidad_disponible']) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
<p>No hay equipos para mostrar.</p>
<?php endif; ?>