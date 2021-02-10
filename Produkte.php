<html>
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
	<input type="submit" <a href="Spieleshop.php" value="Zum Warenkorb hinzufügen"> </a> 
	</form>
   </td>
   </tr>
</table>
</tr>
</td>
</table>
</font>
</html>
