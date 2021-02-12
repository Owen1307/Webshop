<?php
session_start();
if(!isset($_SESSION['Kundennr'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}
 
//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];
 
echo "Hallo User: ".$userid;

header( "refresh:3;url=Spieleshop.php" );
echo 'Du wirst in 3 Sekunden weitergeleitet. Wenn nicht, klick <a href="Spieleshop.php">hier</a>.';

?>