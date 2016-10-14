<?php
include("dbconnect.php");

$eintrags_id = $_POST["id"];
$vorname = $_POST["vorname"];
$zweitname = $_POST["zweitname"];
$nachname = $_POST["zuname"];
$geschlecht = $_POST["geschlecht"];
$geburtsdatum = $_POST["geburtsdatum"];
$geburtsort = $_POST["geburtsort"];
$geburtsland = $_POST["geburtsland"];
$staat1 = $_POST["staat1"];
$staat2 = $_POST["staat2"];
$bekenntnis = $_POST["bekenntnis"];
$abgebendeschule = $_POST["schule"];
$klasse = $_POST["klasse"];
$sprachwahl = $_POST["sprachwahl"];
$reli = $_POST["reli"];
$zug = $_POST["zug"];
$strasse1 = $_POST["strasse1"];
$hausnummer1 = $_POST["hausnummer1"];
$ort1 = $_POST["ort1"];
$plz1 = $_POST["plz1"];
$erz1vorname = $_POST["Erz1Vorname"];
$erz1name = $_POST["Erz1Name"];
$erz1geschlecht = $_POST['erz1geschlecht'];
$erz2vorname = $_POST["Erz2Vorname"];
$erz2name = $_POST["Erz2Name"];
$erz2geschlecht = $_POST['erz2geschlecht'];
$telefon1 = $_POST["telefon1"];
$email1 = $_POST["email1"];
$mobil1 = $_POST["mobil1"];
$erz2vorname = $_POST["Erz2Vorname"];
$erz2name = $_POST["Erz2Name"];
$strasse2 = $_POST["strasse2"];
$hausnummer2 = $_POST["hausnummer2"];
$ort2 = $_POST["ort2"];
$plz2 = $_POST["plz2"];
$telefon2 = $_POST["telefon2"];
$email2 = $_POST["email2"];
$mobil2 = $_POST["mobil2"];
$aussiedler = $_POST["aussiedler"];

$foto = $_POST["foto"];
$notfallnr = $_POST["notfallnr"];
$geschwister = $_POST["geschwister"];
$mit = $_POST["mit"];
$ohne = $_POST["ohne"];




$abfrage = "SELECT ID FROM Anmeldungen WHERE Eintrags_ID = '$eintrags_id'";
$ergebnis = mysqli_query($db, $abfrage);

echo "Formular-ID ist $eintrags_id";

if(mysqli_num_rows($ergebnis)==0){
	$eintrag = "INSERT INTO Anmeldungen (Vorname, Rufname, Nachname, Geschlecht, Geburtstag, Strasse, HausNr, PLZ, Ort, 
	Geburtsort, Geburtsland, Land, Land2, Religion, AbgebendeSchule, Klasse, Sprachwahl, 
	RU, Profil1, Strasse, HausNr, PLZ, Ort, Erz1Name, Erz1Vorname, Erz1Geschlecht, Erz2Vorname, Erz2Name, Erz2Geschlecht,
	Erz1Telefon, Erz1Email, Erz1Handy, Foto_Einw, Notfallnr, Geschwisterklasse, Klassenpartner, 
	nichtKlassenpartner, Erz2Strasse, Erz2PLZ, Erz2Ort, 
	Erz2Telefon, Erz2Handy, Erz2Email, Aussiedler, Eintrags_ID) VALUES
	('$vorname', '$zweitname', '$nachname', '$geschlecht', '$geburtsdatum', '$strasse1', '$hausnummer1', '$plz1', '$ort1, '$geburtsort', 
	'$geburtsland', '$staat1', '$staat2', '$bekenntnis', '$abgebendeschule', '$klasse', '$sprachwahl', '$reli',
	'$zug', '$strasse1', '$hausnummer1', $plz1', '$ort1', '$erz1name', '$erz1vorname', '$erz1geschlecht', '$erz2vorname', '$erz2name', '$erz2geschlecht', '$telefon1',
	'$email1', '$mobil1', '$foto', '$notfallnr', '$geschwister', '$mit', '$ohne', '$strasse2', '$plz2', '$ort2', '$telefon2', '$mobil2', '$email2', '$aussiedler', $eintrags_id')";
	
	$eintragen = mysqli_query($db, $eintrag);
	echo "<br> Datenbankeintrag erfolgreich!";
	echo $eintrag."\n";

} else {exit("<br><br>Anmeldung bereits aufgenommen!");}

?>