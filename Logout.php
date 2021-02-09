<?php
session_start();
session_destroy();
 
echo "Logout erfolgreich!";
header( "refresh:3;url=Spieleshop.php" );
echo ' Du wirst in 3 Sekunden weitergeleitet. Wenn nicht, klick <a href="Spieleshop.php">hier</a>.';
?>