<?php
include("dbconnect.php");

$eintrags_id = $_POST["id"];

$name = $_POST["name"];
$vorname = $_POST["vorname"];
$rufname = $_POST["rufname"];
$geschlecht = $_POST["geschlecht"];
$geburtstag = $_POST["geburtsdatum"];
$geburtsort = $_POST["geburtsort"];
$geburtsland = $_POST["geburtsland"];
$land = $_POST["staat1"];
$land2 = $_POST["staat2"];
$muttersprache = $_POST["muttersprache"];
$bekenntnis = $_POST["bekenntnis"];
$abgebendeschule = $_POST["abgebendeschule"];
$sprachwahl = $_POST["fremdsprache"];
$profil1 = $_POST["profil1"];
$religion = $_POST["religion"];
$ru = $_POST["reli"];
$zug = $_POST["zug"];
$strasse = $_POST["strasse"];
$hausnummer = $_POST["hausnummer"];
$ort = $_POST["ort"];
$plz = $_POST["plz"];
$erz1vorname = $_POST["erz1vorname"];
$erz1name = $_POST["erz1name"];
$erz1geschlecht = $_POST['erz1geschlecht'];
$erz1strasse = $_POST["erz1strasse"];
$erz1hausnummer = $_POST["erz1hausnummer"];
$erz1ort = $_POST["erz1ort"];
$erz1plz = $_POST["erz1plz"];
$erz1telefon = $_POST["erz1telefon"];
$erz1telefon2 = $_POST["erz1telefon2"];
$erz1email = $_POST["erz1email"];
$erz1handy = $_POST["erz1handy"];


$erz2vorname = $_POST["Erz2Vorname"];
$erz2name = $_POST["Erz2Name"];
$erz2geschlecht = $_POST['erz2geschlecht'];


$erz2vorname = $_POST["erz2vorname"];
$erz2name = $_POST["erz2name"];
$erz2strasse = $_POST["erz2strasse"];
$erz2hausnummer = $_POST["erz2hausnummer"];
$erz2ort = $_POST["erz2ort"];
$erz2plz = $_POST["erz2plz"];
$erz2telefon = $_POST["erz2telefon"];
$erz2telefon2 = $_POST["erz2telefon2"];
$erz2email = $_POST["erz2email"];
$erz2handy = $_POST["erz2handy"];


$foto = $_POST["foto"];
$notfallnr = $_POST["notfallnr"];
$geschwister = $_POST["geschwister"];
$mit = $_POST["mit"];
$ohne = $_POST["ohne"];




$abfrage = "SELECT ID FROM Anmeldungen WHERE Eintrags_ID = '$eintrags_id'";
$ergebnis = mysqli_query($db, $abfrage);

echo "Formular-ID ist $eintrags_id";

if(mysqli_num_rows($ergebnis)==0){
	$eintrag = "INSERT INTO Anmeldungen (
		Eintrags_ID, 
		Klasse, 
		Name, 
		Vorname, 
		Rufname, 
		Geburtstag, 
		Geburtsort, 
		Geburtsland, 
		Geschlecht, 
		Religion, 
		RU, 
		Land, 
		Land2, 
		Strasse,
		HausNr, 
		PLZ, 
		Ort, 
		Muttersprache, 
		Erz1Name, 
		Erz1Vorname, 
		Erz1Geschlecht, 
		Erz1Strasse, 
		Erz1HausNr, 
		Erz1PLZ, 
		Erz1Ort,
		Erz1Telefon, 
		Erz1Telefon2, 
		Erz1Handy, 
		Erz1Email, 
		Erz2Vorname, 
		Erz2Name, 
		Erz2Geschlecht, 
		Erz2Strasse, 
		Erz2HausNr, 
		Erz2PLZ, 
		Erz2Ort,
		Erz2Telefon, 
		Erz2Telefon2, 
		Erz2Handy, 
		Erz2Email, 
		AbgebendeSchule, 
		Sprachwahl,
		Profil1,
		Foto_Einw, 
		Notfallnr, 
		Geschwister, 
		Klassenpartner, 
		nichtKlassenpartner) 
	VALUES
	('$eintrags_id', 
	'5', 
	'$name', 
	'$vorname', 
	'$rufname', 
	'$geburtstag', 
	'$geburtsort', 
	'$geburtsland', 
	'$geschlecht', 
	'$bekenntnis', 
	'$ru', 
	'$land', 
	'$land2', 
	'$strasse', 
	'$hausnummer', 
	'$plz', 
	'$ort',  
	'$muttersprache', 
	'$erz1name', 
	'$erz1vorname', 
	'$erz1geschlecht', 
	'$erz1strasse', 
	'$erz1hausnummer',
	'$erz1plz', 
	'$erz1ort', 
	'$erz1telefon', 
	'$erz1telefon2', 
	'$erz1handy', 
	'$erz1email',
	'$erz2vorname', 
	'$erz2name', 
	'$erz2geschlecht', 
	'$erz2strasse', 
	'$erz2hausnummer', 
	'$erz2plz', 
	'$erz2ort', 
	'$erz2telefon', 
	'$erz2telefon2', 
	'$erz2handy', 
	'$erz2email', 
	'$abgebendeschule', 
	'$sprachwahl',
	'$profil1',
	'$foto', 
	'$notfallnr', 
	'$geschwister', 
	'$mit', 
	'$ohne')";
	
	$eintragen = mysqli_query($db, $eintrag);
	echo "<br> Datenbankeintrag erfolgreich!";
	echo $eintrag."\n";

} else {exit("<br><br>Anmeldung bereits aufgenommen!");}

?>