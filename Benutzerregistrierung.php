<html>
<head> <title> Benutzerregistrierung </title>
</head>
<body>
<body background="Gray.jpg">
</body>
<form action="Speichern.php " method="GET">
<font color="white">              
<p>Vorname: <br>
<input type="text" placeholder="Vorname" size="40" maxlength="250" name="vornameDB" required autocomplete> </p>           
<p>Nachname: <br>
<input type="text" placeholder="Name" size="40" maxlength="250" name="nachnameDB"required autocomplete></p>  
<p>E-Mail Adresse: <br>
<input type"text" placeholder="E-Mail" size="40" maxlength="250" name="emailDB" required autocomplete></p>         
<p>Geburtsdatum:<br>
<input type="date" placeholder="Geburtsdatum" size="40" maxlength="250" name="geburtsdatumDB" required autocomplete> </p>
<p>Straße:<br>
<input type="text" placeholder="Strasse" size="40" maxlength="250" name="strasseDB" required autocomplete> </p>
<p>Hausnummer:<br>
<input type="number" placeholder="Hausnummer" size="40" maxlength="250" name="hausnummerDB" required autocomplete </p>
<p>Passwort:<br>
<input type="password" placeholder="Passwort" size="40" maxlength="250" name="passwortDB" required </p>
<p id="submit"> <input type="submit" <a href="Angaben.php" value="Registrieren"></p>      
</font>
</form>
<form action="Spieleshop.php">
<p id="zuruek"> <input type="submit" <a href="Spieleshop.php" value="Zurück"> </a> </p>
</form>
</body>
</html>