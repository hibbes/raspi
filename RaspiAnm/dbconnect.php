<?php
header("Content-Type: text/html; charset=utf-8");

/**
 * dbconnect.php  --  RaspiAnm (Schüleranmeldungssystem)
 *
 * Datenbankverbindung und .env-Loader für das Schüleranmeldungs-System.
 * Diese Datei wird per include("dbconnect.php") in allen anderen PHP-Dateien
 * eingebunden und stellt die globale Variable $db bereit.
 *
 * ────────────────────────────────────────────────────────────────────────────
 * .env-Konzept (Twelve-Factor App):
 *   Zugangsdaten (Datenbank-Host, -User, -Passwort) dürfen NICHT direkt
 *   im Quellcode stehen, da dieser öffentlich (z.B. auf GitHub) liegen kann.
 *   Stattdessen werden sie in einer lokalen .env-Datei gespeichert, die
 *   NICHT ins Git-Repository eingecheckt wird (steht in .gitignore).
 *
 *   .env-Format:
 *     DB_HOST=localhost
 *     DB_USER=meinuser
 *     DB_PASS=geheimespasswort
 *     DB_NAME=anmeldungen
 *
 *   load_env() liest diese Datei und trägt die Werte in $_ENV und putenv() ein,
 *   so dass sie überall im PHP-Skript verfügbar sind.
 *
 * ────────────────────────────────────────────────────────────────────────────
 * MySQLi (MySQL Improved):
 *   mysqli_connect() öffnet eine TCP-Verbindung zur MySQL-Datenbank.
 *   Rückgabewert: Verbindungsobjekt ($db) oder false bei Fehler.
 *   $db->set_charset('utf8') stellt sicher, dass Sonderzeichen (Umlaute)
 *   korrekt gespeichert und ausgegeben werden.
 *
 * ────────────────────────────────────────────────────────────────────────────
 * Sicherheitshinweise:
 *   - DB-Zugangsdaten niemals im Code hardcoden!
 *   - .env in .gitignore eingetragen? → .env.example als Vorlage einchecken
 *   - Bei Verbindungsfehler: keine Details an den Browser senden (nur error_log)
 */

/**
 * Einfacher .env-Parser: liest KEY=VALUE-Zeilen aus einer Datei.
 *
 * Regeln:
 *   - Leerzeilen und Kommentare (# ...) werden übersprungen
 *   - Zeilen ohne '=' werden ignoriert
 *   - Werte werden in $_ENV und putenv() eingetragen
 *
 * @param string $path  Absoluter Pfad zur .env-Datei (z.B. __DIR__ . '/.env')
 */
function load_env(string $path): void {
    if (!file_exists($path)) {
        error_log("dbconnect: .env file not found at $path");
        return;
    }
    // file() liest alle Zeilen als Array; FILE_SKIP_EMPTY_LINES entfernt Leerzeilen
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || $line[0] === '#') {
            continue;  // Kommentare und Leerzeilen überspringen
        }
        if (strpos($line, '=') === false) {
            continue;  // Ungültige Zeile ohne '=' ignorieren
        }
        // explode mit Limit 2: nur den ersten '=' als Trennzeichen nehmen
        // Damit können Passwörter mit '=' (z.B. Base64) korrekt geparst werden
        [$key, $value] = explode('=', $line, 2);
        $key   = trim($key);
        $value = trim($value);
        if ($key !== '') {
            $_ENV[$key] = $value;    // in superglobal $_ENV eintragen
            putenv("$key=$value");   // auch in Prozessumgebung (getenv() nutzbar)
        }
    }
}

// .env aus dem Projektverzeichnis laden (eine Ebene über dem Skript)
load_env(__DIR__ . '/.env');

// Datenbankverbindung herstellen
// ?? 'default': Falls .env-Variable fehlt, Fallback-Wert verwenden
$db = mysqli_connect(
    $_ENV['DB_HOST'] ?? 'localhost',
    $_ENV['DB_USER'] ?? '',
    $_ENV['DB_PASS'] ?? '',
    $_ENV['DB_NAME'] ?? ''
);

// Verbindungsfehler: nur ins Server-Log schreiben, nichts an den Browser
if (!$db) {
    error_log("Datenbankverbindungsfehler: " . mysqli_connect_error());
    exit("Datenbankverbindung fehlgeschlagen.");
}

// UTF-8-Zeichensatz setzen – wichtig für deutsche Umlaute (ä, ö, ü, ß)
$db->set_charset('utf8');
