<?php
$db = mysqli_connect("localhost", "anmeldungen", "seki", "anmeldungen");
if(!$db)
{
	exit("Verbindungsfehler: ".mysqli_connect_error());
}

?>