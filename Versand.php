<html>
<?php
session_start();
if(!isset($_SESSION['Kundennr'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}
?>
<body background="Gray.jpg">
<h1> <font color="white"> Versand Ihrer Bestellung</h1>
<p> Bitte wählen Sie eine Versandart aus und klicken Sie auf Weiter:<br> </p>
</font>
<form action="Abschluss.php" method="post"> <br>
<select name="Auswahl">
    <option value="value1" selected="selected">Standard (5,00€)</option>
    <option value="value2">Eil (9,00€)</option>
	<option value="value3">Kes-Eil (15,00€)</option>
</select>
<input type=submit value="Weiter">
</form>
<form action="Spieleshop.php">
<p id="abbrechen"> <input type="submit" <a href="Spieleshop.php" value="Abbrechen"> </a> </p>
</form>
<head>
</body>
</html>
