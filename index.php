<?php
require_once __DIR__ . '/auth.php';

// Página protegida: si no hay sesión, se redirige al login.
if (!estaAutenticado()) { header('Location: login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ejercicio 6 – Área privada</title>
<link rel="stylesheet" href="../css/base.css">
</head>
<body>
<header class="sitio">
  <a class="volver" href="../index.php">← Volver al inicio</a>
  <strong>Ejercicio 6: Sistema de login</strong>
</header>
<main>
  <div class="card">
    <h2>Bienvenido, <?= htmlspecialchars($_SESSION['nombre']) ?></h2>
    <p>Has iniciado sesión como <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong>. Esta página solo es visible para usuarios autenticados.</p>
    <a class="btn" href="logout.php">Cerrar sesión</a>
  </div>
</main>
</body>
</html>
