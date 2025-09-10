<h2>Usuarios</h2>
<p>Lista de usuarios con su rol.</p>
<?php if(!empty($usuarios)): ?>
<table>
  <thead>
    <tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Correo</th><th>Rol</th></tr>
  </thead>
  <tbody>
    <?php foreach($usuarios as $u): ?>
    <tr>
      <td><?= htmlspecialchars($u['id_usuario']) ?></td>
      <td><?= htmlspecialchars($u['nombre']) ?></td>
      <td><?= htmlspecialchars($u['apellido']) ?></td>
      <td><?= htmlspecialchars($u['correo']) ?></td>
      <td><?= htmlspecialchars($u['rol'] ?? '—') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
<p>No hay usuarios para mostrar.</p>
<?php endif; ?>