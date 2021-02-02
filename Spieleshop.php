
<html>
<head> <title> Startseite </title>
<style>
ul {
    list-style-type: none;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.active {
    background-color: #050505;   
}
</style>
<head>
<body background="Gray.jpg">
</body>
<ul>
<li style="float:right"><a class="active" href="Benutzerlogin.php">Registrierung</a></li>
<li style="float:right"><a class="active" href="Angaben.php">Angaben</a></li>
</ul>
<center> <font color="white"> <font size=7> Willkommen bei GameKey </font> </center>
</head>
<body>
<?php 
$link=mysqli_connect("localhost","root","","Spieleshop")
or die ("Keine Verbindung möglich, Versuchen Sie es später erneut!");
$abfrage="SELECT Artikelnr, Spielname, GenreID, Entwickler, Plattform, Preis, Veroeffentlichung FROM Artikel;";
$ergebnis=mysqli_query($link,$abfrage) or die ($link);
for ($i=0; $i<mysqli_num_rows($ergebnis); $i++)
	(print "<tr>";
$datensatz=mysqli_fetch_rows($ergebnis);
foreach ($datensatz as $feld)
(print "<td>$feld</td>";)
print "</tr>";
}
 ?> 

</body>
  <hr>
</html> 
