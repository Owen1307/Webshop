<html>
<head> 
  <script>
  function myFunction() {
    var x, text;

    // Get the value of the input field with id="numb"
    x = document.getElementById("numb").value;

    // If x is Not a Number or less than one or greater than 10
    if (isNaN(x) || x < 1 || x > 10) {
      text = "Bitte eine Zahl zwischen 1 und 10 eingeben!";
    } else {
      text = "Gespeichert!";
    }
    document.getElementById("demo").innerHTML = text;
  }
  </script>
</head>
<body background="Gray.jpg">
</body>
<?php
$link=mysqli_connect("localhost","root","","Spieleshop")
or die ("Keine Verbindung möglich, Versuchen Sie es später erneut!");
$Artikelnr = filter_input(INPUT_POST, 'Artikelnr');
$anfrage = "SELECT Spielname, Preis, Bilder, Plattform, Name 
FROM Artikel INNER JOIN Genre ON Artikel.GenreID = Genre.GenreID 
WHERE Artikelnr = '$Artikelnr';"; 
$ergebnis = mysqli_query($link,$anfrage) or die (mysqli_error($link));
$zeile = $ergebnis->fetch_array();
?>

<table>
<tr>
<td>
<img src="<?= $zeile['Bilder'] ?>" >
</td>
<td>
<table>
  <tr>
    <td> <font color="white"> <?=$zeile['Spielname']?> </font></td>
   </tr>
   <tr>
    <td> <font color="white"> <?=$zeile['Name']?> </font></td>
   </tr>
   <tr>
     <td> <font color="white"> <?=$zeile['Preis']?> € </font></td>
   </tr>
   <tr>
   <td> <font color="white"> <?=$zeile['Plattform']?> </font></td>
   </tr>
   <tr>
   <td>
   <form action="Spieleshop.php"  method="POST">
   <input type="hidden"  name="WarenNr" value="<?=$Artikelnr?>" readonly>
   <input id="numb" value="1" name="Anzahl" required> 
   <button type="button" onclick="myFunction()">Anzahl festlegen</button>
   <p id="demo"></p>
    <input type="submit" <a href="Spieleshop.php" value="Zum Warenkorb hinzufügen"> </a>
    </form>
<form action="Spieleshop.php">
<p id="zuruek"> <input type="submit" <a href="Spieleshop.php" value="Zurück"> </a> </p>
</form>
</td>
</tr>
</table>
</tr>
</td>
</table>
</font>
</html>