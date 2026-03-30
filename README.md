# RaspiAnm — Schüleranmeldungs-System

PHP-Webanwendung zur Erfassung und Verwaltung von Schüleranmeldungen. Läuft auf einem Raspberry Pi mit Apache und MySQL.

## Funktionsweise

Anmeldedaten werden per URL-Parameter (z. B. aus einem WordPress-Formular) an `index.php` übergeben, dort von der Sekretärin geprüft und bearbeitet, und anschließend via `eintragen.php` in die MySQL-Datenbank geschrieben.

```
WordPress-Formular → index.php (Prüfung/Bearbeitung) → eintragen.php → MySQL-Datenbank
```

## Voraussetzungen

- PHP 8.0+
- MySQL / MariaDB
- Apache oder Nginx

## Installation

### 1. Datenbank einrichten

```bash
mysql -u root -p < RaspiAnm/Anmeldungen.sql
```

### 2. Umgebungsvariablen konfigurieren

```bash
cp RaspiAnm/.env.example RaspiAnm/.env
```

Dann `.env` bearbeiten:

```env
DB_HOST=localhost
DB_USER=dein_datenbankbenutzer
DB_PASS=dein_passwort
DB_NAME=anmeldungen
```

**Wichtig:** Die `.env`-Datei niemals ins Repository committen (ist bereits in `.gitignore`).

### 3. Webserver konfigurieren

Dokumenten-Root auf das `RaspiAnm/`-Verzeichnis zeigen lassen. HTTPS muss aktiviert sein, da personenbezogene Daten übertragen werden.

## Projektstruktur

```
RaspiAnm/
├── index.php        # Formular zur Datenprüfung und -bearbeitung
├── eintragen.php    # Schreibt Daten in die Datenbank
├── dbconnect.php    # Datenbankverbindung (liest Credentials aus .env)
├── standard.css     # Stylesheet
├── match.php        # (reserviert)
├── Anmeldungen.sql  # Datenbankschema
├── .env.example     # Vorlage für Umgebungsvariablen
└── bestaetigung/    # Bestätigungsseiten
```

## Erfasste Daten

- Kind: Name, Geburtsdaten, Adresse, Staatsangehörigkeit, Religion, Muttersprache
- Schule: Abgebende Schule, Klasse, Sprachwahl, Profilwahl, Geschwister
- Erziehungsberechtigte: Zwei Erziehungsberechtigte mit Adresse, Telefon, E-Mail
- Allgemeines: Fotoeinwilligung, Schwimmfähigkeit

## Sicherheitshinweise

- Alle Eingaben werden serverseitig gegen SQL Injection (Prepared Statements) und XSS (`htmlspecialchars`) abgesichert
- CSRF-Schutz via Session-Token aktiv
- Datenbankpasswort liegt ausschließlich in `.env`, nicht im Quellcode
- HTTPS ist Pflicht — Schülerdaten dürfen nicht unverschlüsselt übertragen werden
