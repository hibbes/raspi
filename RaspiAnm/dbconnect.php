<?php
header("Content-Type: text/html; charset=utf-8");
$db = mysqli_connect("localhost", "anmeldungen", "seki", "anmeldungen");
$db -> set_charset('utf8');
if(!$db)
{
	exit("Verbindungsfehler: ".mysqli_connect_error());
}

?>