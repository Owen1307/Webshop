<html>
<head> <title> Startseite </title>

<link type = "text/css" href="design.css" rel="stylesheet">

<?php
require_once'cart.php';
session_start();

cart::initialise();
$ArtikelNr = filter_input(INPUT_POST, 'WarenNr');
$Anzahl = filter_input(INPUT_POST, 'Anzahl');

if (isset($ArtikelNr) && isset($Anzahl)) {
	cart::add($ArtikelNr, $Anzahl);
	unset($ArtikelNr);
	unset($Anzahl);
}

$_SESSION['href'] = "LogIn.php";
$_SESSION['text'] = "Log-In (Gast)";

$link=mysqli_connect("localhost","root","","Spieleshop")
or die ("Keine Verbindung möglich, Versuchen Sie es später erneut!");

if(isset($_SESSION['Kundennr']) AND !empty($_SESSION['Kundennr'])) {

$abfrage = "select Vorname, Nachname FROM kunde WHERE Kundennr = {$_SESSION['Kundennr']}";   
$ergebnis = mysqli_query($link,$abfrage) or die (mysqli_error($link));
$daten = $ergebnis->fetch_array();

$_SESSION['href'] = "Logout.php";
$_SESSION['text'] = "Logout ({$daten['Vorname']})";
 }
?>

<li style="float:right"><a class="active" href="Benutzerregistrierung.php">Registrierung</a></li>
<li style="float:right"><a class="active" href="<?=$_SESSION['href']?>"><?=$_SESSION['text']?></a></li>
<li style="float:right"><a class="active" href="Warenkorb.php">Warenkorb (<?=cart::size()?>)</a></li>

<head>
<body background="Gray.jpg">
</body>
<center> <font color="white"> <font size=7> Willkommen bei GameKey </font> </font> </center>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<?php

$link=mysqli_connect("localhost","root","","Spieleshop")
or die ("Keine Verbindung möglich, Versuchen Sie es später erneut!");

$abfrage = "SELECT Bilder, Artikelnr FROM Artikel";
$ergebnis = mysqli_query($link,$abfrage) or die (mysqli_error($link));



while($zeile = $ergebnis->fetch_array()):
?>


<div class ="container">
<form action="Produkte.php" method="POST" class="box">
<div class="card shadow">
<button class="boxButton">
<input type="hidden"  name="Artikelnr" value="<?=$zeile['Artikelnr'] ?>" readonly>
<img src="<?= $zeile['Bilder'] ?>" >
</div>
</button>
</form>
</div>

<?php 
endwhile;
?>

</body>
  <hr>
</html>