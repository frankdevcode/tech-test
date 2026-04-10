<?php
declare(strict_types=1);

/**
 * GET /usuarios/recientes
 *
 * Returns users registered within the last 30 days.
 *
 * Expected DB table: usuarios
 * - id (int)
 * - nombre (varchar)
 * - email (varchar)
 * - fecha_registro (datetime/timestamp)
 */
function get_recent_users(PDO $pdo): array
{
  $since = (new DateTimeImmutable('now', new DateTimeZone('UTC')))
    ->sub(new DateInterval('P30D'))
    ->format('Y-m-d H:i:s');

  $stmt = $pdo->prepare(
    'SELECT id, nombre, email, fecha_registro
     FROM usuarios
     WHERE fecha_registro >= :since
     ORDER BY fecha_registro DESC'
  );

  $stmt->execute(['since' => $since]);
  $users = $stmt->fetchAll();

  return [
    'data' => $users,
    'meta' => [
      'count' => count($users),
      'since' => $since,
    ],
  ];
}

