<?php
declare(strict_types=1);

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/db.php';
require __DIR__ . '/../src/users_controller.php';

/**
 * Minimal router for a framework-less PHP REST API.
 *
 * Local run (PHP built-in server):
 * - cd section-3-practical/exercise-1-php-rest-api
 * - php -S localhost:8000 -t public public/index.php
 *
 * Endpoint:
 * - GET /usuarios/recientes
 *
 * Environment variables (recommended):
 * - DB_DSN  (e.g. mysql:host=127.0.0.1;dbname=tech_test;charset=utf8mb4)
 * - DB_USER
 * - DB_PASS
 * - APP_DEBUG=1 (optional; includes more error detail)
 */

$method = strtoupper((string) ($_SERVER['REQUEST_METHOD'] ?? 'GET'));
$path = (string) parse_url((string) ($_SERVER['REQUEST_URI'] ?? '/'), PHP_URL_PATH);
$path = rtrim($path, '/') ?: '/';

if ($method !== 'GET') {
  json_response(405, [
    'error' => ['code' => 'method_not_allowed', 'message' => 'Only GET is supported for this API.'],
  ]);
}

if ($path === '/usuarios/recientes') {
  $pdo = db_connect();
  $payload = get_recent_users($pdo);
  json_response(200, $payload);
}

json_response(404, [
  'error' => ['code' => 'not_found', 'message' => 'Route not found.'],
]);

