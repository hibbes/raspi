<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="standard.css">	
<title>Daten-ÃœberprÃ¼fung</title>
</head>
<body>


	
Folgende Daten wurden Ã¼bermittelt:<p>

Eintrags-ID: <?php echo $_GET['id']; ?>

<div id="kind">
<form action="http://localhost:8888/eintragen.php" method="post">
   <h3>Angaben zum Kind</h3> 
    <label for="vorname">Vorname</label> 
    <input type="text" name="vorname" value="<?php echo $_GET['vorname']; ?>" maxlength="30">
    
    <label for="rufname">Zweite(r) Vorname(n)</label> 
    <input type="text" name="zweitname" value="<?php echo $_GET['rufname']; ?>" maxlength="30">
 
    <label for="zuname">Nachname</label>  
    <input type="text" name="rufname" value="<?php echo $_GET['zuname']; ?>" maxlength="40"><br>

	<label for="strasse">Straße</label>  
    <input type="text" name="strasse" value="<?php echo $_GET['strasse']; ?>" maxlength="50"><br>
    
    <label for="hausnummer">Nr.</label>  
    <input type="text" name="hausnummer" value="<?php echo $_GET['hausnummer']; ?>" maxlength="3"><br>
    
    <label for="postleitzahl">Postleitzahl</label>  
    <input type="text" name="postleitzahl" value="<?php echo $_GET['postleitzahl']; ?>" maxlength="15">
    
	<label for="ort">Ort</label>  
    <input type="text" name="ort" value="<?php echo $_GET['ort']; ?>" maxlength="20">
    
    <label for="staat1">1. StaatsangehÃ¶rigkeit</label> 
    <input type="text" name="staat1" value="<?php echo $_GET['staat1']; ?>" maxlength="30">
    
    <label for="staat2">2. StaatsangehÃ¶rigkeit</label> 
    <input type="text" name="staat2" value="<?php echo $_GET['staat2']; ?>" maxlength="30"><br>
    
    <label for="geschlecht">Geschlecht</label> 
    <input type="text" name="geschlecht" value="<?php echo $_GET['geschlecht']; ?>" maxlength="30"><br>
	
	<label for="geburtsdatum">Geburtsdatum</label> 
    <input type="text" name="geburtsdatum" value="<?php echo $_GET['geburtsdatum']; ?>" maxlength="10">
	    
	<label for="geburtsland">Geburtsort</label> 
    <input type="text" name="geburtsort" value="<?php echo $_GET['geburtsort']; ?>" maxlength="30">
  
    <label for="geburtsland">Geburtland</label> 
    <input type="text" name="geburtsland" value="<?php echo $_GET['geburtsland']; ?>" maxlength="30"><br>
    
    <label for="muttersprache">Muttersprache</label> 
    <input type="text" name="muttersprache" value="<?php echo $_GET['muttersprache']; ?>" maxlength="30"><br>
 
      
	<label for="bekenntnis">Bekenntnis</label> 
    <input type="text" name="bekenntnis" value="<?php echo $_GET['bekenntnis']; ?>" maxlength="30"><br>
    
    <label for="schule">abgebende Schule </label> 
    <input type="text" name="schule" value="<?php echo $_GET['schule']; ?>" maxlength="60">
           
    <label for="geschwister">Geschwister in Schiller-Klasse</label> 
    <input type="text" name="geschwister" value="<?php echo $_GET['geschwister']; ?>" maxlength="100"><br>
    </div>
    
    <div id="schulbesuch">
    <h3>Wahl fÃ¼r Schulbesuch</h3>
    
    <label for="sprachwahl">Sprachwahl</label> 
    <input type="text" name="sprachwahl" value="<?php echo $_GET['sprachwahl']; ?>" maxlength="90"><br>
    
    <label for="reli">Religionsunterricht</label> 
    <input type="text" name="reli" value="<?php echo $_GET['reli']; ?>" maxlength="90"><br>
        
    <label for="zug">Profilwahl</label> 
    <input type="text" name="profil1" value="<?php echo $_GET['profil1']; ?>" maxlength="90"><br>
    
    <label for="mit">Möchte in eine Klasse mit</label> 
    <input type="text" name="mit" value="<?php echo $_GET['inKlassemit']; ?>" maxlength="90"><br>
    
    <label for="ohne">Möchte  <b>nicht</b>  in eine Klasse mit</label> 
    <input type="text" name="ohne" value="<?php echo $_GET['nichtinKlassemit']; ?>" maxlength="90"><br>
    </div>
    
    <div id="eltern">
    
    <h3>Eltern</h3>
    <label for="erz1vor">Name de(s/n) 1. Erziehungsberechtige(n/r)</label> 
    <input type="text" name="erz1vorname" value="<?php echo $_GET['erz1vorname']; ?>" maxlength="30">
    
    <label for="erz1name">Nachname de(s/n) 1. Erziehungsberechtige(n/r)</label> 
    <input type="text" name="erz1name" value="<?php echo $_GET['erz1name']; ?>" maxlength="30"><br>
    
    <label for="erz1geschlecht">Geschlecht</label> 
    <input type="text" name="erz1geschlecht" value="<?php echo $_GET['erz1geschlecht']; ?>" maxlength="5"><br>
    
    <label for="erz1strasse">Straße und Hausnummer</label> 
    <input type="text" name="erz1strasse" value="<?php echo $_GET['erz1strasse']; ?>" maxlength="30"><br>
    
    <label for="erz1plz">Postleitzahl</label> 
    <input type="text" name="erz1plz" value="<?php echo $_GET['erz1plz']; ?>" maxlength="30">
    
    <label for="erz1ort">Ort</label> 
    <input type="text" name="erz1ort" value="<?php echo $_GET['erz1ort']; ?>" maxlength="30"><br>
    
    <label for="erz1telefon">Telefon der Eltern</label> 
    <input type="text" name="erz1telefon" value="<?php echo $_GET['erz1telefon']; ?>" maxlength="30"><br>
    
    <label for="erz1email">E-Mail de(s/n) 1. Erziehungsberechtige(n/r)</label> 
    <input type="text" name="erz1email" value="<?php echo $_GET['erz1email']; ?>" maxlength="30"><br>
    
     <label for="erz2vorname">Vorname de(s/r) 2. Erziehungsberechtige(n/r)</label> 
    <input type="text" name="erz2vorname" value="<?php echo $_GET['erz2vorname']; ?>" maxlength="30">
    
    <label for="erz2name">Nachname de(s/r) 2. Erziehungsberechtige(n/r)</label> 
    <input type="text" name="erz2name" value="<?php echo $_GET['erz2name']; ?>" maxlength="30"><br>
    
    <label for="erz2geschlecht">Geschlecht</label> 
    <input type="text" name="erz2geschlecht" value="<?php echo $_GET['erz2geschlecht']; ?>" maxlength="5"><br>
    
     <label for="erz2strasse">Straße und Hausnummer</label> 
    <input type="text" name="erz2strasse" value="<?php echo $_GET['erz2strasse']; ?>" maxlength="30"><br>
    
    <label for="erz2plz">Postleitzahl</label> 
    <input type="text" name="erz2plz" value="<?php echo $_GET['erz2plz']; ?>" maxlength="30">
    
    <label for="erz2ort">Ort</label> 
    <input type="text" name="erz2ort" value="<?php echo $_GET['erz2ort']; ?>" maxlength="30"><br>
    
    <label for="erz2telefon">Telefon de(s/n) 2. Erziehungsberechtige(n/r)</label> 
    <input type="text" name="erz2telefon" value="<?php echo $_GET['erz2telefon']; ?>" maxlength="30"><br>
    
    <label for="erz2email">E-Mail de(s/n) 2. Erziehungsberechtige(n/r)</label> 
    <input type="text" name="erz2email" value="<?php echo $_GET['erz2email']; ?>" maxlength="30"><br>
    
    
    </div>
    
        
    <div id="allgemein">
    <h3>Allgemeines</h3>
    
    <label for="notfallnr">Im Notfall tagsüber erreichbar unter</label> 
    <input type="text" name="notfallnr" value="<?php echo $_GET['notfallnr']; ?>" maxlength="30"><br>
    
    <label for="foto">Einwilligung für die Veröffentlichung von Fotos ist erteilt:</label> 
    <input type="text" name="foto" value="<?php echo $_GET['foto']; ?>" maxlength="30"><br>
    
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" maxlength="30"><br>
    
    <input type="hidden" name="datum" value="<?php echo $_GET['datum']; ?>" maxlength="30"><br>
    
    </div>
    


       <button type="submit">Eingaben zur Datenbank senden</button>
</form>
</body>
</html>

