-- Opcional: solo si USAR_MYSQL = true en config.php
CREATE DATABASE IF NOT EXISTS pwatarea3 CHARACTER SET utf8mb4;
USE pwatarea3;

CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(50) NOT NULL UNIQUE,
  nombre  VARCHAR(100) NOT NULL,
  hash    VARCHAR(255) NOT NULL
);

-- Contraseñas de prueba: admin123 y clave2024 (ver usuarios.php para los hashes)
INSERT INTO usuarios (usuario, nombre, hash) VALUES ('admin','Administrador','$2y$10$a7YYCqjRyxfieG26AHRNrum6bIWUU19R4jc0uEO.o0rbntClKuVzS');
INSERT INTO usuarios (usuario, nombre, hash) VALUES ('maria','María Pérez','$2y$10$JCfEU15.6BhVQWgjdXrsp.39btRcrkSZWGfx/iqGnvLTJK6QY2lx6');
