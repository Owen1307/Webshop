<html>
<head> <title> Benutzerregister </title>
</head>
<body>
<body background="Gray.jpg">
</body>
<form action="Speichern.php " method="GET">
<font color="white">              
<p>Vorname: <input type="text" placeholder="Vorname" name="vornameDB" required autocomplete> </p>           
<p>Nachname: <input type="text" placeholder="Name" name="nachnameDB"required autocomplete></p>           
<p>Geburtsdatum:<input type="date" placeholder="Geburtsdatum" name="geburtsdatumDB" required autocomplete> </p>
<p>Straße:<input type="text" placeholder="Strasse" name="strasseDB" required autocomplete> </p>
<p>Hausnummer:<input type="number" placeholder="Hausnummer" name="hausnummerDB" required autocomplete </p>
<p>Passwort:<input type="password" placeholder="Passwort" name="passwortDB" required </p>
<p id="submit"> <input type="submit" <a href="Angaben.php" value="Registrieren"></p>      
</font>
</form>
<form action="Spieleshop.php">
<p id="zuruek"> <input type="submit" <a href="Spieleshop.php" value="Zurück"> </a> </p>
</form>
</body>
</html>