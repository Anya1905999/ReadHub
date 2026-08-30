<?php

$routes = [
    '/' => __DIR__ . '/../public/ajax/home.php',
    '/category' => __DIR__ . '/../public/ajax/category.php',
    '/article' => __DIR__ . '/../public/ajax/article.php',
];

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$path = rtrim($path, '/') ?: '/';

$publicFile = __DIR__ . '/../public' . $path;

if (PHP_SAPI === 'cli-server' && is_file($publicFile)) {
    return false;
}

if (! isset($routes[$path])) {
    http_response_code(404);
    echo '404 — Страница не найдена';
    exit;
}

require $routes[$path];
