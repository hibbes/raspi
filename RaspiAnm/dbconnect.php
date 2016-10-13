<?php
$db = mysqli_connect("localhost", "anmeldungen", "", "Anmeldungen");
if(!$db)
{
	exit("Verbindungsfehler: ".mysqli_connect_error());
}

?>