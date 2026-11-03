<?php
/*
 * Configuración del sistema de login.
 * USAR_MYSQL = false → los usuarios se leen del arreglo de usuarios.php (funciona sin base de datos).
 * USAR_MYSQL = true  → se consultan en MySQL (ejecuta antes base_datos.sql y ajusta las credenciales).
 */
const USAR_MYSQL = false;
const DB_HOST = 'localhost';
const DB_NAME = 'pwatarea3';
const DB_USER = 'root';
const DB_PASS = '';
