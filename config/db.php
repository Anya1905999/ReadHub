<?php

declare(strict_types=1);

$host = getenv('DB_HOST') ?: '127.0.0.1';
$port = getenv('DB_PORT') ?: '3306';
$db = getenv('DB_DATABASE') ?: 'readHub';
$username = getenv('DB_USERNAME') ?: 'readHub_user';
$password = getenv('DB_PASSWORD') ?: 'readHub_password';

$dsn = sprintf(
    'mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4',
    $host,
    $port,
    $db
);

try {
    return new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $exception) {
    throw new RuntimeException(
        'Не удалось подключиться к базе данных.',
        0,
        $exception
    );
}
