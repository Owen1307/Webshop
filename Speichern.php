<html>
<head>
</head>

<?php
$vorname = filter_input(INPUT_GET, 'vornameDB');
$nachname = filter_input(INPUT_GET, 'nachnameDB');
$email = filter_input(INPUT_GET, 'emailDB');
$geburtsdatum = filter_input(INPUT_GET, 'geburtsdatumDB');
$strasse = filter_input(INPUT_GET, 'strasseDB');
$hausnummer = filter_input(INPUT_GET, 'hausnummerDB');
$passwort = password_hash(filter_input(INPUT_GET, 'passwortDB'), PASSWORD_DEFAULT);


$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "spieleshop";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO kunde (Vorname, Nachname, EMail, Geburtsdatum, Strasse, Hausnummer, Passwort)
VALUES ('$vorname', '$nachname', '$email', '$geburtsdatum' , '$strasse' , '$hausnummer', '$passwort')";
if ($conn->query($sql)){
echo "Sie haben sich erfolgreich registriert!";
    
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
?>
<head>
    <p id="zuruek"><a href="Spieleshop.php">Zurück</a></p>      
</head>
</html>
