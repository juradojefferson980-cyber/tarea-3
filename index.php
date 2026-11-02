<?php
// Los elementos del menú se definen en PHP y se imprimen en HTML.
$menu = [
    'Productos'  => ['Laptops', 'Teléfonos', 'Accesorios'],
    'Servicios'  => ['Soporte técnico', 'Instalación', 'Capacitación'],
    'Nosotros'   => ['Historia', 'Equipo', 'Contacto'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ejercicio 1 – Menú desplegable</title>
<link rel="stylesheet" href="../css/base.css">
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<header class="sitio">
  <a class="volver" href="../index.php">← Volver al inicio</a>
  <strong>Ejercicio 1: Menú desplegable</strong>
</header>
<main>
  <nav class="menu" aria-label="Menú principal">
    <ul>
      <?php foreach ($menu as $titulo => $opciones): ?>
      <li class="item">
        <button type="button" class="toggle" aria-expanded="false"><?= htmlspecialchars($titulo) ?> <span class="flecha">▾</span></button>
        <ul class="submenu" hidden>
          <?php foreach ($opciones as $op): ?>
          <li><a href="#" data-op="<?= htmlspecialchars($op) ?>"><?= htmlspecialchars($op) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </li>
      <?php endforeach; ?>
    </ul>
  </nav>
  <div class="card" style="margin-top:6rem">
    <h2>Haz clic en un elemento del menú</h2>
    <p id="seleccion">Las opciones adicionales están ocultas al inicio y se muestran al hacer clic en el elemento principal.</p>
  </div>
</main>
<script src="menu.js"></script>
</body>
</html>
