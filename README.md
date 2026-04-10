# tech-test

Solución a la prueba técnica para Desarrollador Full Stack (PHP, JavaScript, jQuery, SQL).

## Estructura

- section-1-technical-knowledge: respuestas cortas de conocimientos técnicos (1 archivo por pregunta).
- section-2-programming-logic: ejercicios de lógica en JavaScript (1 archivo por punto).
- section-3-practical
  - exercise-1-php-rest-api: API REST en PHP (sin frameworks).
  - exercise-2-dom-jquery: ejercicio de interacción DOM (jQuery para eventos + vanilla JS para lógica).
- open-questions: respuestas a preguntas abiertas (1 archivo por pregunta).

## Sección 2 (JS) — Cómo ejecutar

Requiere Node.js.

```bash
node section-2-programming-logic/01-longest-word.js
node section-2-programming-logic/02-balanced-parentheses.js
node section-2-programming-logic/03-character-frequency.js
node section-2-programming-logic/04-fizzbuzz-extended.js
```

## Sección 3 — Ejercicio 1 (API PHP) — Cómo ejecutar

Requiere PHP 8+ y una base de datos con la tabla `usuarios` (campos: id, nombre, email, fecha_registro).

Variables de entorno:

- DB_DSN (ej: mysql:host=127.0.0.1;dbname=tech_test;charset=utf8mb4)
- DB_USER
- DB_PASS
- APP_DEBUG=1 (opcional)

Levantando el servidor local:

```bash
cd section-3-practical/exercise-1-php-rest-api
php -S localhost:8000 -t public public/index.php
```

Endpoint:

- GET http://localhost:8000/usuarios/recientes

## Sección 3 — Ejercicio 2 (DOM + jQuery) — Cómo ejecutar

Abrir en el navegador:

- section-3-practical/exercise-2-dom-jquery/index.html
