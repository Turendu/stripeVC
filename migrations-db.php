<?php

use Doctrine\DBAL\DriverManager;

require __DIR__ . '/vendor/autoload.php';
$baseDir = __DIR__ . '/';
$dotenv = Dotenv\Dotenv::createImmutable($baseDir);
$envFile = $baseDir . '.env';
if (file_exists($envFile)) {
    $dotenv->load();
}
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS', 'DB_PORT']);

return DriverManager::getConnection([
    'dbname'    => $_SERVER['DB_NAME'],
    'user'      => $_SERVER['DB_USER'],
    'password'  => $_SERVER['DB_PASS'],
    'host'      => $_SERVER['DB_HOST'].':'.$_SERVER['DB_PORT'],
    'driver'    => 'pdo_mysql'
]);