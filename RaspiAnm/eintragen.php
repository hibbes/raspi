<?php
session_start();
include("dbconnect.php");

/**
 * eintragen.php  --  RaspiAnm (Schüleranmeldungssystem)
 *
 * Speichert eine neue Schüleranmeldung aus dem HTML-Formular (index.php)
 * in die MySQL-Datenbank.
 *
 * ────────────────────────────────────────────────────────────────────────────
 * Sicherheitskonzept: CSRF-Schutz
 *   Cross-Site Request Forgery (CSRF) ist ein Angriff, bei dem eine fremde
 *   Website im Hintergrund eine Anfrage an diese Seite schickt, wenn der
 *   Nutzer eingeloggt ist.
 *
 *   Schutz mit CSRF-Token (Synchronizer Token Pattern):
 *   1. index.php erzeugt beim Seitenaufruf ein zufälliges Token (64 Hex-Zeichen)
 *      und speichert es in der Session: $_SESSION['csrf_token']
 *   2. Das Token wird als Hidden-Input ins Formular eingebettet
 *   3. eintragen.php vergleicht $_POST['csrf_token'] mit $_SESSION['csrf_token']
 *   4. hash_equals() statt == : zeitkonstanter Vergleich gegen Timing-Angriffe
 *
 *   Fremde Websites kennen den Session-Wert nicht → Angriff schlägt fehl.
 *
 * ────────────────────────────────────────────────────────────────────────────
 * Sicherheitskonzept: Prepared Statements
 *   SQL-Injection wäre möglich, wenn Benutzereingaben direkt in SQL eingebaut:
 *     "INSERT ... WHERE name = '" . $_POST['name'] . "'"
 *   Angreifer könnte z.B. name = "'; DROP TABLE Anmeldungen; --" eingeben.
 *
 *   Prepared Statements trennen SQL-Struktur und Daten:
 *   1. mysqli_prepare(): SQL mit ? als Platzhalter vorbereiten
 *   2. mysqli_bind_param(): Werte an Platzhalter binden (immer als String 's')
 *   3. mysqli_execute(): erst jetzt wird die Query ausgeführt
 *   → Die Datenbank interpretiert Benutzereingaben NIE als SQL-Code.
 *
 * ────────────────────────────────────────────────────────────────────────────
 * Ablauf:
 *   1. CSRF-Token prüfen (403 + exit bei Fehler)
 *   2. POST-Daten in assoziatives Array $array lesen (?? '' = Fallback)
 *   3. UTF-8-Kodierung aller Werte sicherstellen
 *   4. Duplikat-Prüfung: gibt es bereits einen Eintrag mit dieser Eintrags-ID?
 *   5. INSERT INTO Anmeldungen (55 Felder) per Prepared Statement
 *   6. Erfolgs-/Fehlermeldung ausgeben
 */

/* ── CSRF-Validierung ─────────────────────────────────────────────────────── */
if (
    empty($_POST['csrf_token']) ||
    !isset($_SESSION['csrf_token']) ||
    !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])  // zeitkonstanter Vergleich
) {
    error_log("eintragen.php: CSRF-Token ungültig oder fehlend.");
    http_response_code(403);  // HTTP 403 Forbidden
    exit("Ungültige Anfrage.");
}

/* ── POST-Daten in Array einlesen ────────────────────────────────────────── */
// ?? '': wenn $_POST-Schlüssel fehlt, leeren String als Fallback verwenden
// → kein PHP-Warning bei fehlenden Feldern
$array = [
    "eintrags_id"        => $_POST["id"]                 ?? '',
    "name"               => $_POST["name"]                ?? '',
    "vorname"            => $_POST["vorname"]             ?? '',
    "rufname"            => $_POST["rufname"]             ?? '',
    "geschlecht"         => $_POST["geschlecht"]          ?? '',
    "geburtstag"         => $_POST["geburtsdatum"]        ?? '',
    "geburtsort"         => $_POST["geburtsort"]          ?? '',
    "geburtsland"        => $_POST["geburtsland"]         ?? '',
    "land"               => $_POST["staat1"]              ?? '',
    "land2"              => $_POST["staat2"]              ?? '',
    "muttersprache"      => $_POST["muttersprache"]       ?? '',
    "bekenntnis"         => $_POST["bekenntnis"]          ?? '',
    "abgebendeschule"    => $_POST["abgebendeschule"]     ?? '',
    "sprachwahl"         => $_POST["fremdsprache"]        ?? '',
    "profil1"            => $_POST["profil1"]             ?? '',
    "ru"                 => $_POST["reli"]                ?? '',
    "zug"                => $_POST["zug"]                 ?? '',
    "strasse"            => $_POST["strasse"]             ?? '',
    "hausnummer"         => $_POST["hausnummer"]          ?? '',
    "ort"                => $_POST["ort"]                 ?? '',
    "teilort"            => $_POST["teilort"]             ?? '',
    "plz"                => $_POST["plz"]                 ?? '',
    "erz1vorname"        => $_POST["erz1vorname"]         ?? '',
    "erz1name"           => $_POST["erz1name"]            ?? '',
    "erz1geschlecht"     => $_POST["erz1geschlecht"]      ?? '',
    "erz1strasse"        => $_POST["erz1strasse"]         ?? '',
    "erz1hausnummer"     => $_POST["erz1hausnummer"]      ?? '',
    "erz1ort"            => $_POST["erz1ort"]             ?? '',
    "erz1teilort"        => $_POST["erz1teilort"]         ?? '',
    "erz1plz"            => $_POST["erz1plz"]             ?? '',
    "erz1telefon1"       => $_POST["erz1telefon1"]        ?? '',
    "erz1telefon2"       => $_POST["erz1telefon2"]        ?? '',
    "erz1email"          => $_POST["erz1email"]           ?? '',
    "erz1handy"          => $_POST["erz1handy"]           ?? '',
    "erz2sorgerecht"     => $_POST["erz2sorgerecht"]      ?? '',
    "erz2auskunftsrecht" => $_POST["erz2auskunftsrecht"]  ?? '',
    "erz2vorname"        => $_POST["erz2vorname"]         ?? '',
    "erz2name"           => $_POST["erz2name"]            ?? '',
    "erz2geschlecht"     => $_POST["erz2geschlecht"]      ?? '',
    "erz2strasse"        => $_POST["erz2strasse"]         ?? '',
    "erz2hausnummer"     => $_POST["erz2hausnummer"]      ?? '',
    "erz2ort"            => $_POST["erz2ort"]             ?? '',
    "erz2teilort"        => $_POST["erz2teilort"]         ?? '',
    "erz2plz"            => $_POST["erz2plz"]             ?? '',
    "erz2telefon1"       => $_POST["erz2telefon1"]        ?? '',
    "erz2telefon2"       => $_POST["erz2telefon2"]        ?? '',
    "erz2email"          => $_POST["erz2email"]           ?? '',
    "erz2handy"          => $_POST["erz2handy"]           ?? '',
    "foto"               => $_POST["foto"]                ?? '',
    "notfallnr"          => $_POST["notfallnr"]           ?? '',
    "geschwister"        => $_POST["geschwister"]         ?? '',
    "mit"                => $_POST["mit"]                 ?? '',
    "klasse"             => $_POST["klasse"]              ?? '',
    "reinw"              => $_POST["reinw"]               ?? '',
    "schwimmen"          => $_POST["schwimmen"]           ?? '',
    "impfung"            => $_POST["impfung"]             ?? '',
];

/* ── UTF-8-Sicherstellung ────────────────────────────────────────────────── */
// Formulardaten können je nach Browser in unterschiedlicher Kodierung ankommen.
// mb_detect_encoding() erkennt die Kodierung; mb_convert_encoding() konvertiert zu UTF-8.
// Die Referenz (&$string) erlaubt direktes Ändern des Array-Werts in der foreach-Schleife.
foreach ($array as &$string) {
    if (mb_detect_encoding($string, null, true) !== 'UTF-8') {
        $string = mb_convert_encoding($string, 'UTF-8');
    }
}
unset($string);  // Referenz aufheben, sonst zeigt $string noch auf das letzte Element!

/* ── Duplikat-Prüfung (Prepared Statement) ──────────────────────────────── */
// Verhindert, dass dieselbe Anmeldung zweimal eingetragen wird.
// Prepared Statement: SQL-Struktur getrennt von Datenwert → SQL-Injection unmöglich.
$stmt_check = mysqli_prepare($db, "SELECT ID FROM Anmeldungen WHERE Eintrags_ID = ?");
if (!$stmt_check) {
    error_log("eintragen.php: Prepare SELECT fehlgeschlagen – " . mysqli_error($db));
    exit("Interner Fehler.");
}
mysqli_bind_param($stmt_check, 's', $array['eintrags_id']);  // 's' = String
mysqli_execute($stmt_check);
mysqli_store_result($stmt_check);

if (mysqli_num_rows($stmt_check) > 0) {
    mysqli_stmt_close($stmt_check);
    exit("Anmeldung bereits aufgenommen!");
}
mysqli_stmt_close($stmt_check);

/* ── INSERT-Statement (55 Felder) ────────────────────────────────────────── */
// Die Klasse wird immer als '5' fest eingetragen (Anmeldung für Klasse 5).
// Prepared Statement mit 55 ?-Platzhaltern → bind_param mit 55 's' (String).
// 's' ist sicher für alle Felder, auch wenn die DB-Spalte INT ist,
// da MySQL die Konvertierung übernimmt.
$sql = "INSERT INTO Anmeldungen (
    Eintrags_ID, Klasse, Name, Vorname, Rufname,
    Geburtstag, Geburtsort, Geburtsland, Geschlecht, Religion,
    RU, Land, Land2, Strasse, HausNr,
    PLZ, Ort, Teilort, Muttersprache,
    Erz1Name, Erz1Vorname, Erz1Geschlecht, Erz1Strasse, Erz1HausNr,
    Erz1PLZ, Erz1Ort, Erz1Teilort, Erz1Telefon1, Erz1Telefon2,
    Erz1Handy, Erz1Email,
    Erz2Vorname, Erz2Name, Erz2Geschlecht, Erz2Strasse, Erz2HausNr,
    Erz2PLZ, Erz2Ort, Erz2Teilort, Erz2Telefon1, Erz2Telefon2,
    Erz2Handy, Erz2Email,
    AbgebendeSchule, Fremdsprache2, Profil1,
    Foto_Einw, Geschwister, Klassenpartner, vorhKlasse,
    erz2sorgerecht, erz2auskunftsrecht, reinw, schwimmen, impfung
) VALUES (
    ?, '5', ?, ?, ?,
    ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?,
    ?, ?, ?, ?,
    ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?,
    ?, ?,
    ?, ?, ?, ?, ?,
    ?, ?, ?, ?, ?,
    ?, ?,
    ?, ?, ?,
    ?, ?, ?, ?,
    ?, ?, ?, ?, ?
)";

$stmt_insert = mysqli_prepare($db, $sql);
if (!$stmt_insert) {
    error_log("eintragen.php: Prepare INSERT fehlgeschlagen – " . mysqli_error($db));
    exit("Interner Fehler.");
}

// bind_param: erster Parameter = Typ-String, dann alle Variablen in derselben Reihenfolge
// 's' × 55 = alle 55 Werte als Strings binden
mysqli_bind_param(
    $stmt_insert,
    'sssssssssssssssssssssssssssssssssssssssssssssssssssssss',  // 55 × 's'
    $array['eintrags_id'],
    $array['name'],
    $array['vorname'],
    $array['rufname'],
    $array['geburtstag'],
    $array['geburtsort'],
    $array['geburtsland'],
    $array['geschlecht'],
    $array['bekenntnis'],
    $array['ru'],
    $array['land'],
    $array['land2'],
    $array['strasse'],
    $array['hausnummer'],
    $array['plz'],
    $array['ort'],
    $array['teilort'],
    $array['muttersprache'],
    $array['erz1name'],
    $array['erz1vorname'],
    $array['erz1geschlecht'],
    $array['erz1strasse'],
    $array['erz1hausnummer'],
    $array['erz1plz'],
    $array['erz1ort'],
    $array['erz1teilort'],
    $array['erz1telefon1'],
    $array['erz1telefon2'],
    $array['erz1handy'],
    $array['erz1email'],
    $array['erz2vorname'],
    $array['erz2name'],
    $array['erz2geschlecht'],
    $array['erz2strasse'],
    $array['erz2hausnummer'],
    $array['erz2plz'],
    $array['erz2ort'],
    $array['erz2teilort'],
    $array['erz2telefon1'],
    $array['erz2telefon2'],
    $array['erz2handy'],
    $array['erz2email'],
    $array['abgebendeschule'],
    $array['sprachwahl'],
    $array['profil1'],
    $array['foto'],
    $array['geschwister'],
    $array['mit'],
    $array['klasse'],
    $array['erz2sorgerecht'],
    $array['erz2auskunftsrecht'],
    $array['reinw'],
    $array['schwimmen'],
    $array['impfung']
);

if (!mysqli_execute($stmt_insert)) {
    error_log("eintragen.php: INSERT fehlgeschlagen – " . mysqli_stmt_error($stmt_insert));
    mysqli_stmt_close($stmt_insert);
    exit("Interner Fehler beim Speichern.");
}

mysqli_stmt_close($stmt_insert);
echo "Datenbankeintrag erfolgreich!";
