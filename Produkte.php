<html>
<?php
$link=mysqli_connect("localhost","root","","Spieleshop")
or die ("Keine Verbindung möglich, Versuchen Sie es später erneut!");
$Artikelnr = filter_input(INPUT_POST, 'Artikelnr');
$anfrage = "select Spielname, Preis from Artikel WHERE Artikelnr = '$Artikelnr';"; 
$ergebnis = mysqli_query($link,$anfrage) or die (mysqli_error($link));
$zeile = $ergebnis->fetch_array();
echo $zeile['Spielname'];
echo $zeile['Preis'];
?>
</html>