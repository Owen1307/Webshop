<?php 
require_once'cart.php';
session_start();

$link=mysqli_connect("localhost","root","","Spieleshop")
or die ("Keine Verbindung möglich, Versuchen Sie es später erneut!");

$versandkosten = 0;
switch ($_POST['Auswahl']) {
    case 'value1':
        $versandkosten = 5;
        break;
    case 'value2':
        $versandkosten = 9;
        break;
    case 'value3':
        $versandkosten = 15;
        break;
}

cart::commitToDatabase($link, $versandkosten);

header( "refresh:3;url=Spieleshop.php" );
echo 'Bestellung erfolgreich!' ;
echo 'Du wirst in 3 Sekunden weitergeleitet. Wenn nicht, klick <a href="Spieleshop.php">hier</a>.';
?>