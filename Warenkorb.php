<?php
session_start();
require_once'cart.php';

if(isset($_POST['loeschen'])) {
	cart::undo();
}

$link=mysqli_connect("localhost","root","","Spieleshop")
or die ("Keine Verbindung möglich, Versuchen Sie es später erneut!");

cart::initialise();
?>

<html>
<head> <title> Warenkorb </title> </head>
<body background="Gray.jpg"> 
<table summary="Summe der Artikel im Warenkorb">
<caption><font color="white">Produkte in Ihrem Warenkorb</font></caption>
<thead>
  <tr>
    <th scope="col"><font color="white">Anzahl</font></th>
    <th scope="col"><font color="white">Produkt</font></th>
    <th scope="col"><font color="white">Einzelpreis</font></th>
    <th scope="col"><font color="white">Gesamt</font></th>
  </tr>
</thead>
<tbody>
<?php 
$i = 0;
$zeile = cart::getDataFromDatabase($link, $i);
$Artikel = cart::get($i);
$Gesamt = 0;
while(isset($zeile) && isset($Artikel)):
?>
  <tr>
	<td><font color="white">"<?=$Artikel[1]?>"</font></td>
    <td><font color="white">"<?=$zeile['Spielname']?>"</font></td>
    <td><font color="white">"<?=$zeile['Preis']?>"</font></td>
    <td><font color="white">"<?=$zeile['Preis'] * $Artikel[1] ?>"€</font></td>
  </tr>
 
<?php 
$Gesamt += $zeile['Preis'] * $Artikel[1];
++$i;
$zeile = cart::getDataFromDatabase($link, $i);
$Artikel = cart::get($i);
endwhile;
?>
</tbody>
<tfoot>
  <tr>
    <td colspan="3"><font color="white">Summe Warenkorb: <?=$Gesamt?>€ </font></td>
    <td></td>
  </tr>
</tfoot>
</table>
<form action="Versand.php">
<p id="versand"> <input type="submit" <a href="Versand.php" value="Weiter"> </a> </p>
</form>
<form action="#" method="POST">
<input type="hidden"  name="loeschen" value=5 readonly>
<p id="undo"> <input type="submit" <a href="Warenkorb.php" value="Warenkorb löschen"> </a> </p>
</form>
<form action="Spieleshop.php">
<p id="zuruek"> <input type="submit" <a href="Spieleshop.php" value="Zurück"> </a> </p>
</form>
</body>