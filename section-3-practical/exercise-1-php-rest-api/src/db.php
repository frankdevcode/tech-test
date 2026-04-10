<?php
declare(strict_types=1);

function db_connect(): PDO
{
  $dsn = (string) getenv('DB_DSN');
  $user = (string) getenv('DB_USER');
  $pass = (string) getenv('DB_PASS');

  if ($dsn === '') {
    throw new RuntimeException('DB_DSN is not configured.');
  }

  try {
    $pdo = new PDO($dsn, $user, $pass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false,
    ]);
  } catch (PDOException $e) {
    $message = 'Database connection failed.';
    if (app_debug_enabled()) $message = $e->getMessage();
    throw new RuntimeException($message, 0, $e);
  }

  return $pdo;
}

