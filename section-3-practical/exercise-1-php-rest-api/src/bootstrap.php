<?php
declare(strict_types=1);

date_default_timezone_set('UTC');

ini_set('display_errors', '0');
error_reporting(E_ALL);

header('Content-Type: application/json; charset=utf-8');

function json_response(int $statusCode, array $payload): void
{
  http_response_code($statusCode);
  echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  exit;
}

function app_debug_enabled(): bool
{
  return (string) getenv('APP_DEBUG') === '1';
}

set_exception_handler(static function (Throwable $e): void {
  $message = 'Unexpected server error.';

  if (app_debug_enabled()) {
    $message = $e->getMessage();
  }

  json_response(500, [
    'error' => [
      'code' => 'internal_server_error',
      'message' => $message,
    ],
  ]);
});

