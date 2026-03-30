<?php
header("Content-Type: text/html; charset=utf-8");

/**
 * Simple .env parser – reads KEY=VALUE lines, ignores comments and blank lines.
 */
function load_env(string $path): void {
    if (!file_exists($path)) {
        error_log("dbconnect: .env file not found at $path");
        return;
    }
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || $line[0] === '#') {
            continue;
        }
        if (strpos($line, '=') === false) {
            continue;
        }
        [$key, $value] = explode('=', $line, 2);
        $key   = trim($key);
        $value = trim($value);
        if ($key !== '') {
            $_ENV[$key] = $value;
            putenv("$key=$value");
        }
    }
}

load_env(__DIR__ . '/.env');

$db = mysqli_connect(
    $_ENV['DB_HOST'] ?? 'localhost',
    $_ENV['DB_USER'] ?? '',
    $_ENV['DB_PASS'] ?? '',
    $_ENV['DB_NAME'] ?? ''
);

if (!$db) {
    error_log("Datenbankverbindungsfehler: " . mysqli_connect_error());
    exit("Datenbankverbindung fehlgeschlagen.");
}

$db->set_charset('utf8');
