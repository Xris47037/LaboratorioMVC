<h2>Préstamos</h2>
<p>Lista de préstamos con el nombre del usuario y el estado.</p>
<?php if(!empty($prestamos)): ?>
<table>
  <thead>
    <tr><th>ID</th><th>Usuario</th><th>Fecha préstamo</th><th>Fecha devolución</th><th>Estado</th></tr>
  </thead>
  <tbody>
    <?php foreach($prestamos as $p): ?>
    <tr>
      <td><?= htmlspecialchars($p['id_prestamo']) ?></td>
      <td><?= htmlspecialchars($p['usuario_nombre'] . ' ' . $p['usuario_apellido']) ?></td>
      <td><?= htmlspecialchars($p['fecha_prestamo']) ?></td>
      <td><?= htmlspecialchars($p['fecha_devolucion']) ?></td>
      <td><?= htmlspecialchars($p['estado'] ?? '—') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
<p>No hay préstamos para mostrar.</p>
<?php endif; ?>