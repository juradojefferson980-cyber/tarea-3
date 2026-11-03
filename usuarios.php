<?php
/*
 * Arreglo con los datos de los usuarios. Las contraseñas se guardan con hash
 * (password_hash), nunca en texto plano.
 * Credenciales de prueba:  admin / admin123   ·   maria / clave2024
 */
function obtenerUsuarios(): array
{
    return [
        'admin' => ['nombre' => 'Administrador', 'hash' => '$2y$10$a7YYCqjRyxfieG26AHRNrum6bIWUU19R4jc0uEO.o0rbntClKuVzS'],
        'maria' => ['nombre' => 'María Pérez',   'hash' => '$2y$10$JCfEU15.6BhVQWgjdXrsp.39btRcrkSZWGfx/iqGnvLTJK6QY2lx6'],
    ];
}
