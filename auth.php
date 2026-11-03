<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/usuarios.php';

if (session_status() === PHP_SESSION_NONE) session_start();

/** Busca un usuario en el arreglo o en MySQL según la configuración. */
function buscarUsuario(string $usuario): ?array
{
    if (USAR_MYSQL) {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $st = $pdo->prepare('SELECT nombre, hash FROM usuarios WHERE usuario = ?');
        $st->execute([$usuario]);
        return $st->fetch(PDO::FETCH_ASSOC) ?: null;
    }
    return obtenerUsuarios()[$usuario] ?? null;
}

/** Valida credenciales; si son correctas inicia la sesión. */
function iniciarSesion(string $usuario, string $clave): bool
{
    try { $u = buscarUsuario($usuario); } catch (Throwable $e) { return false; }
    if ($u && password_verify($clave, $u['hash'])) {
        session_regenerate_id(true);
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nombre']  = $u['nombre'];
        return true;
    }
    return false;
}

/** Verifica si el usuario está autenticado. */
function estaAutenticado(): bool
{
    return isset($_SESSION['usuario']);
}
