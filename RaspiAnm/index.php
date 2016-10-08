<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="standard.css">	
<title>Daten-Überprüfung</title>
</head>
<body>


	
Folgende Daten wurden übermittelt:<p>

Eintrags-ID: <?php echo $_GET['id']; ?>

<div id="kind">
<form action="http://localhost:8888/eintragen.php" method="post">
   <h3>Angaben zum Kind</h3> 
    <label for="vorname">Vorname</label> 
    <input type="text" name="vorname" value="<?php echo $_GET['vorname']; ?>" maxlength="30">
    
    <label for="zweitname">Zweite(r) Vorname(n)</label> 
    <input type="text" name="zweitname" value="<?php echo $_GET['zweitname']; ?>" maxlength="30">
 
    <label for="zuname">Nachname</label>  
    <input type="text" name="zuname" value="<?php echo $_GET['zuname']; ?>" maxlength="40"><br>

	<label for="geschlecht">Geschlecht</label>  
    <input type="text" name="geschlecht" value="<?php echo $_GET['geschlecht']; ?>" maxlength="50"><br>
    
    <label for="geburtsdatum">Geburtsdatum</label>  
    <input type="text" name="geburtsdatum" value="<?php echo $_GET['geburtsdatum']; ?>" maxlength="15">
    
	<label for="geburtsort">Geburtsort</label>  
    <input type="text" name="geburtsort" value="<?php echo $_GET['geburtsort']; ?>" maxlength="20">
	    
	<label for="geburtsland">Geburtsland</label> 
    <input type="text" name="geburtsland" value="<?php echo $_GET['geburtsland']; ?>" maxlength="30"><br>
  
    <label for="staat1">1. Staatsangehörigkeit</label> 
    <input type="text" name="staat1" value="<?php echo $_GET['staat1']; ?>" maxlength="30">
    
    <label for="staat2">2. Staatsangehörigkeit</label> 
    <input type="text" name="staat2" value="<?php echo $_GET['staat2']; ?>" maxlength="30"><br>
 
	<label for="bekenntnis">Bekenntnis</label> 
    <input type="text" name="bekenntnis" value="<?php echo $_GET['bekenntnis']; ?>" maxlength="30"><br>
    
    <label for="schule">ehemalige Schule und Ort</label> 
    <input type="text" name="schule" value="<?php echo $_GET['schule']; ?>" maxlength="60">
    
    <label for="klasse">ehemalige Klasse und KlassenlehrerIn</label> 
    <input type="text" name="klasse" value="<?php echo $_GET['klasse']; ?>" maxlength="60"><br>
    
    <label for="geschwister">Geschwister in Schiller-Klasse</label> 
    <input type="text" name="geschwister" value="<?php echo $_GET['geschwister']; ?>" maxlength="30"><br>
    </div>
    
    <div id="schulbesuch">
    <h3>Wahl für Schulbesuch</h3>
    <label for="reli">Religionsunterricht</label> 
    <input type="text" name="reli" value="<?php echo $_GET['reli']; ?>" maxlength="90"><br>
    
    <label for="sprachwahl">Sprachwahl</label> 
    <input type="text" name="sprachwahl" value="<?php echo $_GET['sprachwahl']; ?>" maxlength="90"><br>
    
    <label for="zug">Zugwahl</label> 
    <input type="text" name="zug" value="<?php echo $_GET['zug']; ?>" maxlength="90"><br>
    
    <label for="mit">Möchte in eine Klasse mit</label> 
    <input type="text" name="mit" value="<?php echo $_GET['mit']; ?>" maxlength="90"><br>
    
    <label for="ohne">Möchte  <b>nicht</b>  in eine Klasse mit</label> 
    <input type="text" name="ohne" value="<?php echo $_GET['ohne']; ?>" maxlength="90"><br>
    </div>
    
    <div id="eltern">
    <h3>Eltern</h3>
    <label for="muttervor">Vorname der Mutter</label> 
    <input type="text" name="muttervor" value="<?php echo $_GET['muttervor']; ?>" maxlength="30">
    
    <label for="mutternach">Nachname der Mutter</label> 
    <input type="text" name="mutternach" value="<?php echo $_GET['mutternach']; ?>" maxlength="30"><br>
    
    <label for="vatervor">Vorname des Vaters</label> 
    <input type="text" name="vatervor" value="<?php echo $_GET['vatervor']; ?>" maxlength="30">
    
    <label for="vaternach">Nachname des Vaters</label> 
    <input type="text" name="vaternach" value="<?php echo $_GET['vaternach']; ?>" maxlength="30"><br>
    
    <label for="strasse1">Straße und Hausnummer</label> 
    <input type="text" name="strasse1" value="<?php echo $_GET['strasse1']; ?>" maxlength="30"><br>
    
    <label for="plz1">Postleitzahl</label> 
    <input type="text" name="plz1" value="<?php echo $_GET['plz1']; ?>" maxlength="30">
    
    <label for="ort1">Ort</label> 
    <input type="text" name="ort1" value="<?php echo $_GET['ort1']; ?>" maxlength="30"><br>
    
    <label for="telefon1">Telefon der Eltern</label> 
    <input type="text" name="telefon1" value="<?php echo $_GET['telefon1']; ?>" maxlength="30"><br>
    
    <label for="email1">E-Mail der Eltern</label> 
    <input type="text" name="email1" value="<?php echo $_GET['email1']; ?>" maxlength="30"><br>
    </div>
    
    <div id="partner">
    <h3>Getrennt lebende (Ehe-)PartnerInnen</h3>
    
    <label for="getrenntvor">Vorname</label> 
    <input type="text" name="getrenntvor" value="<?php echo $_GET['getrenntvor']; ?>" maxlength="30">
    
    <label for="getrenntnach">Nachname</label> 
    <input type="text" name="getrenntnach" value="<?php echo $_GET['getrenntnach']; ?>" maxlength="30"><br>
    
    <label for="sorgerecht">besitzt Sorgerecht</label> 
    <input type="text" name="sorgerecht" value="<?php echo $_GET['sorgerecht']; ?>" maxlength="30"><br>
    
    <label for="getrenntstrasse">Straße und Hausnummer</label> 
    <input type="text" name="getrenntstrasse" value="<?php echo $_GET['getrenntstrasse']; ?>" maxlength="30"><br>
    
    <label for="getrenntplz">Postleitzahl</label> 
    <input type="text" name="getrenntplz" value="<?php echo $_GET['getrenntplz']; ?>" maxlength="30">
    
    <label for="getrenntort">Ort</label> 
    <input type="text" name="getrenntort" value="<?php echo $_GET['getrenntort']; ?>" maxlength="30"><br>
    
    <label for="getrennttel">Telefon des Partners</label> 
    <input type="text" name="getrennttel" value="<?php echo $_GET['getrennttel']; ?>" maxlength="30"><br>
    
    <label for="getrenntmobil">Mobilnr. des Partners</label> 
    <input type="text" name="getrenntmobil" value="<?php echo $_GET['getrenntmobil']; ?>" maxlength="30"><br>
        
    <label for="getrenntmail">E-Mail des Partners</label> 
    <input type="text" name="getrenntmail" value="<?php echo $_GET['getrenntmail']; ?>" maxlength="30"><br>
    </div>
    
    <div id="allgemein">
    <h3>Allgemeines</h3>
    
    <label for="notfallnr">Im Notfall tagsüber erreichbar unter</label> 
    <input type="text" name="notfallnr" value="<?php echo $_GET['notfallnr']; ?>" maxlength="30"><br>
    
    <label for="foto">Einwilligung für die Veröffentlichung von Fotos ist erteilt:</label> 
    <input type="text" name="foto" value="<?php echo $_GET['foto']; ?>" maxlength="30"><br>
    
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" maxlength="30"><br>
    </div>
    


       <button type="submit">Eingaben zur Datenbank senden</button>
</form>
</body>
</html>

