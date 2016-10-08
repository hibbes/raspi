<?php
$db = mysqli_connect("localhost", "anmeldungen", "", "anmeldungen");
if(!$db)
{
	exit("Verbindungsfehler: ".mysqli_connect_error());
}

?>