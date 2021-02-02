<html>
<body>
<h1> Versand Ihrer Bestellung</h1>
<form action="versandspeichern.php" method="get">
<?php
$bestellnr=$_GET['bestellnr'];
print "Ihre Bestellnummer: $bestellnr<br><br>";
print "<input type=hidden name='bestellnr' value=$bestellnr>";
print "Bitte wählen Sie eine Versandart aus und klicken Sie auf Weiter:<br><br>";
print "<select name='versandart' size=3>";
$link=mysqli_connect("localhost","root","","");
$abfrage="SELECT ID, beschreibung, preis FROM Versand";
$ergebnis=mysqli_query($link,$abfrage);
for ($i=0; $i<mysqli_num_rows($ergebnis);$i++)
{$zeile=mysqli_fetch_row($ergebnis);
 print "<option value=$zeile[0]>$zeile[1] zum Preis von $zeile[2]</option>";
}
?>
</select>
<input type=submit value="Weiter">
</form>
</body>
</html>
