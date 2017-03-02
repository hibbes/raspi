<!-- In diesem Script wird ein HTML-Formular erzeugt, in das die in der URL übergebenen Daten voreingetragen werden. 
Das Formular kann von unseren Sekretärinnen nachbearbeitet werden. Der Send-Button schickt die Daten dann in die Anmelde-Datenbank (eintragen.php)
Prinzipiell kann das Formular auch für die analoge Schüleraufnahme verwendet werden. Formatiert wird das über standard.css-->

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="standard.css">	
<title>Daten-&Uuml;berpr&uuml;fung</title>
</head>
<body>


	
Folgende Daten wurden &uuml;bermittelt:<p>

<!--  Daten, die mit IF-Abfragen an dieser Stelle behandelt werden, werden mit GET aus der URL ausgelesen und in lokale Variablen gespeichert Der Rest wir direkt mit Get geholt -->

Eintrags-ID: <?php echo $_GET['id']; 

$erz1strasse = $_GET["erz1strasse"];
$erz1hausnummer = $_GET["erz1hausnummer"];
$erz1ort = $_GET["erz1ort"];
$erz1teilort = $_GET["erz1teilort"];
$erz1plz = $_GET["erz1plz"];
$erz2name = $_GET["erz2name"];
$erz2strasse = $_GET["erz2strasse"];
$erz2hausnummer = $_GET["erz2hausnummer"];
$erz2ort = $_GET["erz2ort"];
$erz2teilort = $_GET["erz2teilort"];
$erz2plz = $_GET["erz2plz"];
$erz1telefon1 = $_GET["erz1telefon1"];



/* Wenn die Adressdaten des Erziehers 1 leer bleiben, werden die Adressdaten des Schülers dorthin übernommen */

if(empty($erz1strasse)){ 
	$erz1strasse = $_GET["strasse"];
	$erz1hausnummer = $_GET["hausnummer"];
	$erz1ort = $_GET["ort"];
	$erz1plz = $_GET["plz"];
	$erz1teilort = $_GET["teilort"];
}

/* Wenn die Name des Erziehers 2 gegeben ist aber die Straße des Erziehers 2 leer bleibt, werden die Adressdaten des Erziehers 1 dorthin übernommen 
 * Falls dann später der Erzieher 2 zum ELternsprecher gewählt werden sollte o.ä., sind dann auch hier die Adressdaten vorhanden
 * */

if(!empty($erz2name) && empty($erz2strasse)){
	$erz2strasse = $erz1strasse;
	$erz2hausnummer = $erz1hausnummer;
	$erz2ort = $erz1ort;
	$erz2teilort = $erz1teilort;
	$erz2plz = $erz1plz;
	$erz2telefon1  = $erz1telefon1;
}



?>
<!-- Das Formular wird generiert -->

<div id="kind">
<form action="http://192.168.0.107/eintragen.php" method="post">
   <h3>Angaben zum Kind</h3> 
    <label for="vorname">Vorname(n)</label> 
    <input type="text" name="vorname" value="<?php echo $_GET['vorname']; ?>" maxlength="30">
    
    <label for="rufname">Rufname</label> 
    <input type="text" name="rufname" value="<?php echo $_GET['rufname']; ?>" maxlength="30">
 
    <label for="zuname">Nachname</label>  
    <input type="text" name="name" value="<?php echo $_GET['name']; ?>" maxlength="40"><br>

	<label for="strasse">Stra&szlig;e </label>  
    <input type="text" name="strasse" value="<?php echo $_GET['strasse']; ?>" maxlength="50"><br>
    
    <label for="hausnummer">Nr.</label>  
    <input type="text" name="hausnummer" value="<?php echo $_GET['hausnummer']; ?>" maxlength="3"><br>
    
    <label for="postleitzahl">Postleitzahl</label>  
    <input type="text" name="plz" value="<?php echo $_GET['plz']; ?>" maxlength="15">
    
	<label for="ort">Ort</label>  
    <input type="text" name="ort" value="<?php echo $_GET['ort']; ?>" maxlength="20">
    
    <label for="teilort">Teilort</label>  
    <input type="text" name="teilort" value="<?php echo $_GET['teilort']; ?>" maxlength="30">
    
    <label for="staat1">1. Staatsangeh&ouml;rigkeit</label> 
    <input type="text" name="staat1" value="<?php echo $_GET['staat1']; ?>" maxlength="30">
    
    <label for="staat2">2. Staatsangeh&ouml;rigkeit</label> 
    <input type="text" name="staat2" value="<?php echo $_GET['staat2']; ?>" maxlength="30"><br>
    
    <label for="geschlecht">Geschlecht</label> 
    <input type="text" name="geschlecht" value="<?php echo $_GET['geschlecht']; ?>" maxlength="30"><br>
    
    <label for="bekenntnis">Bekenntnis</label> 
    <input type="text" name="bekenntnis" value="<?php echo $_GET['bekenntnis']; ?>" maxlength="30"><br>
    
	
	<label for="geburtsdatum">Geburtsdatum</label> 
    <input type="text" name="geburtsdatum" value="<?php echo $_GET['geburtsdatum']; ?>" maxlength="10">
	    
	<label for="geburtsland">Geburtsort</label> 
    <input type="text" name="geburtsort" value="<?php echo $_GET['geburtsort']; ?>" maxlength="30">
  
    <label for="geburtsland">Geburtsland</label> 
    <input type="text" name="geburtsland" value="<?php echo $_GET['geburtsland']; ?>" maxlength="30"><br>
    
    <label for="muttersprache">Muttersprache</label> 
    <input type="text" name="muttersprache" value="<?php echo $_GET['muttersprache']; ?>" maxlength="30"><br>
       
	<label for="schule">ID der abgebenden Schule </label> 
    <input type="text" name="abgebendeschule" value="<?php echo $_GET['abgebendeSchule']; ?>" maxlength="60">
    
     <label for="sonstigeschule">sonstige Schule</label> 
    <input type="text" name="sonstigeSchule" value="<?php echo $_GET['sonstigeSchule']; ?>" maxlength="60">
    
           
    <label for="geschwister">Geschwister in Schiller-Klasse</label> 
    <input type="text" name="geschwister" value="<?php echo $_GET['geschwister']; ?>" maxlength="100"><br>
    </div>
    
    <div id="schulbesuch">
    <h3>Wahl f&uuml;r Schulbesuch</h3>
    
    <label for="sprachwahl">Sprachwahl</label> 
    <input type="text" name="fremdsprache" value="<?php echo $_GET['fremdsprache']; ?>" maxlength="90"><br>
    
    <label for="reli">Religionsunterricht</label> 
    <input type="text" name="reli" value="<?php echo $_GET['reli']; ?>" maxlength="90"><br>
        
    <label for="klasse">Profilwahl</label>
    5x=Musikzug 5y=bilingual 5z=normal 
    <input type="text" name="klasse" value="<?php echo $_GET['profil1']; ?>" maxlength="90"><br>
    
    <label for="mit">M&ouml;chte in eine Klasse mit</label> 
    <input type="text" name="mit" value="<?php echo $_GET['inKlassemit']; ?>" maxlength="90"><br>
    
    <label for="ohne">M&ouml;chte  <b>&nbsp; nicht &nbsp;</b>  in eine Klasse mit</label> 
    <input type="text" name="ohne" value="<?php echo $_GET['nichtinKlassemit']; ?>" maxlength="90"><br>
    </div>
    
    <div id="eltern">
    
    <h3>Erziehungsberechtigte</h3>
    <h4>1. Erziehungsberechtigte(r)</h4>
    <label for="erz1vorname">Name</label> 
    <input type="text" name="erz1vorname" value="<?php echo $_GET['erz1vorname']; ?>" maxlength="30">
    
    <label for="erz1name">Nachname</label> 
    <input type="text" name="erz1name" value="<?php echo $_GET['erz1name']; ?>" maxlength="30"><br>
    
    <label for="erz1geschlecht">Geschlecht</label> 
    <input type="text" name="erz1geschlecht" value="<?php echo $_GET['erz1geschlecht']; ?>" maxlength="5"><br>
    
    <label for="erz1strasse">Stra&szlig;e</label> 
    <input type="text" name="erz1strasse" value="<?php echo $erz1strasse; ?>" maxlength="30"><br>
    
    <label for="erz1hausnummer">Hausnummer</label> 
    <input type="text" name="erz1hausnummer" value="<?php echo $erz1hausnummer; ?>" maxlength="30"><br>
    
    
    <label for="erz1plz">Postleitzahl</label> 
    <input type="text" name="erz1plz" value="<?php echo $erz1plz; ?>" maxlength="30">
    
    <label for="erz1ort">Ort</label> 
    <input type="text" name="erz1ort" value="<?php echo $erz1ort; ?>" maxlength="30"><br>
    
    <label for="erz1teilort">Teilort de(s/n)</label>  
    <input type="text" name="erz1teilort" value="<?php echo $erz1teilort; ?>" maxlength="30">
    
    <label for="erz1telefon1">Telefon (privat)</label> 
    <input type="text" name="erz1telefon1" value="<?php echo $_GET['erz1telefon1']; ?>" maxlength="30"><br>
    
    <label for="erz1telefon2">Telefon (Arbeit)</label> 
    <input type="text" name="erz1telefon2" value="<?php echo $_GET['erz1telefon2']; ?>" maxlength="30"><br>
    
     <label for="erz1handy">Mobilnr</label> 
    <input type="text" name="erz1handy" value="<?php echo $_GET['erz1mobil']; ?>" maxlength="30"><br>
    
    <label for="erz1email">E-Mail</label> 
    <input type="text" name="erz1email" value="<?php echo $_GET['erz1email']; ?>" maxlength="30"><br>
    
    <h4>2. Erziehungsberechtigte(r)</h4>
    
    <label for="erz2sorgerecht">Sorgerecht</label> 
    <input type="text" name="erz2sorgerecht" value="<?php echo $_GET['erz2sorgerecht']; ?>" maxlength="5">
    
    <label for="erz2auskunftsrecht">Auskunftsrecht</label> 
    <input type="text" name="erz2auskunftsrecht" value="<?php echo $_GET['erz2auskunftsrecht']; ?>" maxlength="5">
    
    <label for="erz2vorname">Vorname</label> 
    <input type="text" name="erz2vorname" value="<?php echo $_GET['erz2vorname']; ?>" maxlength="30">
    
    <label for="erz2name">Nachname</label> 
    <input type="text" name="erz2name" value="<?php echo $_GET['erz2name']; ?>" maxlength="30"><br>
    
        
    <label for="erz2geschlecht">Geschlecht</label> 
    <input type="text" name="erz2geschlecht" value="<?php echo $_GET['erz2geschlecht']; ?>" maxlength="5"><br>
    
     <label for="erz2strasse">Stra&szlig;e</label> 
    <input type="text" name="erz2strasse" value="<?php echo $erz2strasse; ?>" maxlength="30"><br>
    
    <label for="erz1hausnummer">Hausnummer</label> 
    <input type="text" name="erz2hausnummer" value="<?php echo $erz2hausnummer; ?>" maxlength="30"><br>
        
    <label for="erz2plz">Postleitzahl</label> 
    <input type="text" name="erz2plz" value="<?php echo $erz2plz; ?>" maxlength="30">
    
    <label for="erz2ort">Ort</label> 
    <input type="text" name="erz2ort" value="<?php echo $erz2ort; ?>" maxlength="30"><br>
    
    <label for="erz2teilort">Teilort</label>  
    <input type="text" name="erz2teilort" value="<?php echo $erz2teilort; ?>" maxlength="30">
    
    <label for="erz2telefon1">Telefon (privat)</label> 
    <input type="text" name="erz2telefon1" value="<?php echo $erz2telefon1; ?>" maxlength="30"><br>
    
    <label for="erz2telefon2">Telefon (Arbeit)</label> 
    <input type="text" name="erz2telefon2" value="<?php echo $_GET['erz2telefon2']; ?>" maxlength="30"><br>
    
      <label for="erz2handy">Mobilnr.</label> 
    <input type="text" name="erz2handy" value="<?php echo $_GET['erz2mobil']; ?>" maxlength="30"><br>
    
    <label for="erz2email">E-Mail</label> 
    <input type="text" name="erz2email" value="<?php echo $_GET['erz2email']; ?>" maxlength="30"><br>
    
    
    </div>
    
   <!-- Hier folgen neben der Fotoeinwilligung noch die ID, die unser Wordpress f�r jedes ausgehende Formular generiert und das Datum des Eintrags -->
        
    <div id="allgemein">
    <h3>Allgemeines</h3>
          
    <label for="foto">Einwilligung f&uuml;r die Ver&ouml;ffentlichung von Fotos ist erteilt:</label> 
    <input type="text" name="foto" value="<?php echo $_GET['einwilligung']; ?>" maxlength="30"><br>
    
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" maxlength="30"><br>
    
    <input type="hidden" name="datum" value="<?php echo $_GET['datum']; ?>" maxlength="30"><br>
    
    </div>
    


       <button type="submit">Eingaben zur Datenbank senden</button>
</form>
</body>
</html>

