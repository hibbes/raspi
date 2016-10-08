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
$schule = $_POST["schule"];
$klasse = $_POST["klasse"];
$sprachwahl = $_POST["sprachwahl"];
$reli = $_POST["reli"];
$zug = $_POST["zug"];
$strasse1 = $_POST["strasse1"];
$ort1 = $_POST["ort1"];
$plz1 = $_POST["plz1"];
$muttervor = $_POST["muttervor"];
$mutternach = $_POST["mutternach"];
$vatervor = $_POST["vatervor"];
$vaternach = $_POST["vaternach"];
$telefon1 = $_POST["telefon1"];
$email1 = $_POST["email1"];
$mobil1 = $_POST["mobil1"];
$foto = $_POST["foto"];
$notfallnr = $_POST["notfallnr"];
$geschwister = $_POST["geschwister"];
$mit = $_POST["mit"];
$ohne = $_POST["ohne"];
$getrenntvor = $_POST["getrenntvor"];
$getrenntnach = $_POST["getrenntnach"];
$sorgerecht = $_POST["sorgerecht"];
$getrenntstrasse = $_POST["getrenntstrasse"];
$getrenntplz = $_POST["getrenntplz"];
$getrenntort = $_POST["getrenntort"];
$gentrennttel = $_POST["getrennttel"];
$getrenntmobil = $_POST["getrenntmobil"];
$getrenntmail = $_POST["getrenntmail"];



$abfrage = "SELECT ID FROM Anmeldungen WHERE Eintrags_ID = '$eintrags_id'";
$ergebnis = mysqli_query($db, $abfrage);

echo "Formular-ID ist $eintrags_id";

if(mysqli_num_rows($ergebnis)==0){
	$eintrag = "INSERT INTO Anmeldungen (Vorname, Zweitname, Nachname, Geschlecht, Geburtsdatum, 
	Geburtsort, Geburtsland, Staatsang1, Staatsang2, Bekenntnis, Schule, Klasse, Sprachwahl, 
	Reliunter, Zug, Strasse, PLZ, Ort, Mutter_Vorname, Mutter_Nachname, Vater_Vorname, Vater_Nachname, 
	Festnetztel, EMail, Mobilfunknr, Foto_Einw, Notfallnr, Geschwisterklasse, Klassenpartner, 
	nichtKlassenpartner, Vorname_Partner, Nachname_Partner, Sorgerecht_Partner, Strasse_Partner, PLZ_Partner, Ort_Partner, 
	Partner_Tel, Partner_Mobil, Partner_Mail, Eintrags_ID) VALUES
	('$vorname', '$zweitname', '$nachname', '$geschlecht', '$geburtsdatum', '$geburtsort', 
	'$geburtsland', '$staat1', '$staat2', '$bekenntnis', '$schule', '$klasse', '$sprachwahl', '$reli',
	'$zug', '$strasse1', '$plz1', '$ort1', '$muttervor', '$mutternach', '$vatervor', '$vaternach', '$telefon1',
	'$email1', '$mobil1', '$foto', '$notfallnr', '$geschwister', '$mit', '$ohne', '$getrenntvor', 
	'$getrenntnach', '$sorgerecht', '$getrenntstrasse', '$getrenntplz', '$getrenntort', '$getrennttel', 
	'$getrenntmobil', '$getrenntmail', '$eintrags_id')";
	
	$eintragen = mysqli_query($db, $eintrag);
	echo "<br> Datenbankeintrag erfolgreich!";
	echo $eintrag."\n";

} else {exit("<br><br>Anmeldung bereits aufgenommen!");}

?>