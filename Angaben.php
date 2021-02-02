<html>
<head> <title>  Benutzerregister - Angaben </title>
</head>
<body>
Sind Ihre Angaben korrekt? 
<?php
$link=mysqli_connect("localhost","root","","Spieleshop")
or die ("Keine Verbindung möglich");

$anfrage="SELECT Vorname, Nachname, Geburtsdatum, Strasse, Hausnummer, Passwort FROM Kunde;";
$ergebnis=mysqli_query($link,$anfrage) 
or die (mysqli_error($link));
print"<table>";
for ($i=0; $i<mysqli_num_rows($ergebnis); $i++)
{print "<tr>";
$datensatz=mysqli_fetch_row($ergebnis);
foreach ($datensatz as $field)
{print "<td>$field</td>";}
print "</tr>";
}
print "</table>";
mysqli_close($link);
?>

<!--Hier folgt das auf der Vorderseite 
beschriebene Eingabeformular -->
<form action="Spieleshop.php">
<p id="zuruek"> <input type="submit" <a href="Spieleshop.php" value="Zurück"> </a> </p>
</form>
</body>
</html>