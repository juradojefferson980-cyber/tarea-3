<?php
// Validación en el servidor (segunda línea de defensa; la primera es JavaScript).
$errores = [];
$enviado = false;
$nombre = $correo = $mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre  = trim($_POST['nombre']  ?? '');
    $correo  = trim($_POST['correo']  ?? '');
    $mensaje = trim($_POST['mensaje'] ?? '');

    if ($nombre === '' || mb_strlen($nombre) < 3)  $errores['nombre']  = 'El nombre debe tener al menos 3 caracteres.';
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) $errores['correo']  = 'Ingresa un correo electrónico válido.';
    if ($mensaje === '' || mb_strlen($mensaje) < 10) $errores['mensaje'] = 'El mensaje debe tener al menos 10 caracteres.';

    if (!$errores) {
        $enviado = true;
        // En un sitio real aquí se usaría mail() o se guardaría en base de datos.
        $linea = date('c') . " | $nombre | $correo | " . str_replace(["\r", "\n"], ' ', $mensaje) . PHP_EOL;
        @file_put_contents(__DIR__ . '/mensajes.txt', $linea, FILE_APPEND | LOCK_EX);
    }
}
$h = fn($s) => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ejercicio 2 – Formulario de contacto</title>
<link rel="stylesheet" href="../css/base.css">
</head>
<body>
<header class="sitio">
  <a class="volver" href="../index.php">← Volver al inicio</a>
  <strong>Ejercicio 2: Formulario de contacto</strong>
</header>
<main>
  <div class="card">
    <h2>Contáctanos</h2>
    <?php if ($enviado): ?>
      <div class="msg ok">¡Gracias, <?= $h($nombre) ?>! Tu mensaje fue enviado correctamente.</div>
      <a class="btn" href="index.php">Enviar otro mensaje</a>
    <?php else: ?>
    <form id="contacto" method="post" action="index.php" novalidate>
      <label for="nombre">Nombre</label>
      <input type="text" id="nombre" name="nombre" value="<?= $h($nombre) ?>">
      <p class="error" id="err-nombre"><?= $h($errores['nombre'] ?? '') ?></p>

      <label for="correo">Correo electrónico</label>
      <input type="email" id="correo" name="correo" value="<?= $h($correo) ?>">
      <p class="error" id="err-correo"><?= $h($errores['correo'] ?? '') ?></p>

      <label for="mensaje">Mensaje</label>
      <textarea id="mensaje" name="mensaje" rows="5"><?= $h($mensaje) ?></textarea>
      <p class="error" id="err-mensaje"><?= $h($errores['mensaje'] ?? '') ?></p>

      <button type="submit">Enviar</button>
    </form>
    <?php endif; ?>
  </div>
</main>
<script src="validar.js"></script>
</body>
</html>
