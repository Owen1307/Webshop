<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=spieleshop', 'root', '');

if(isset($_GET['login'])) {
	$email = $_POST['email'];
	$passwort = $_POST['passwort'];
	
	$statement = $pdo->prepare("SELECT * FROM kunde WHERE EMail = :email");
	$statement->bindParam(":email", $email);
	$result = $statement->execute();
	$user = $statement->fetch(PDO::FETCH_ASSOC);
	
if(isset($_SESSION['Kundennr']) AND !empty($_SESSION['Kundennr'])) {
	die('Sie sind bereits eingeloggt. Zurück zur <a href="Spieleshop.php">Hauptseite</a>');
}	
else if ($user !== false && password_verify($passwort, $user['Passwort'])) {
    $_SESSION['Kundennr'] = $user['Kundennr'];
	die('Login erfolgreich. Weiter zur <a href="Spieleshop.php">Hauptseite</a>');
} 
else {
	$errorMessage = "E-Mail oder Passwort war ungültig<br>";
}
    
}
?>

<html>
<head> <title> Benutzerlogin </title> </head>
<body background="Gray.jpg"> 

<?php 
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>
 
<form action="?login=1" method="post">
<font color="white"> 
E-Mail:<br>
<input type="email" size="40" maxlength="250" name="email" required autocomplete><br><br>
 
Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="passwort" required><br><br>
 
<input type="submit" value="Abschicken">

</font>
</form> 
<form action="Spieleshop.php">
<p id="zuruek"> <input type="submit" <a href="Spieleshop.php" value="Zurück"> </a> </p>
</form>
</body>

</html>