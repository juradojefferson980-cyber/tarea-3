<?php
require_once __DIR__ . '/auth.php';

if (estaAutenticado()) { header('Location: index.php'); exit; }

$error = '';
$usuario = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $clave   = $_POST['clave'] ?? '';
    if ($usuario === '' || $clave === '') {
        $error = 'Completa usuario y contraseña.';
    } elseif (iniciarSesion($usuario, $clave)) {
        header('Location: index.php'); exit;
    } else {
        $error = 'Usuario o contraseña incorrectos.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Iniciar sesión – Ejercicio 6</title>
<link rel="stylesheet" href="../css/base.css">
</head>
<body>
<header class="sitio">
  <a class="volver" href="../index.php">← Volver al inicio</a>
  <strong>Ejercicio 6: Sistema de login</strong>
</header>
<main style="max-width:420px">
  <div class="card">
    <h2>Iniciar sesión</h2>
    <?php if ($error): ?><div class="msg mal"><?= htmlspecialchars($error) ?></div><?php endif; ?>
    <form method="post" action="login.php">
      <label for="usuario">Usuario</label>
      <input type="text" id="usuario" name="usuario" value="<?= htmlspecialchars($usuario) ?>" required autofocus>
      <label for="clave">Contraseña</label>
      <input type="password" id="clave" name="clave" required>
      <button type="submit">Entrar</button>
    </form>
    <p style="color:var(--mut);font-size:.85rem;margin-bottom:0">Prueba: <code>admin</code> / <code>admin123</code></p>
  </div>
</main>
</body>
</html>
