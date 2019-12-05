<?php
require_once "Child.php";

$lexus = new lexus("Lexus", "Black", "3.5 L 2GR-FE V6", "4-speed U140E/F automatic");
echo $lexus->info();
echo "<br>";

$mazda = new mazda("Mazda", "Blue", "2.0 L MZR-CD I4", "6-speed A26MX-R manual");
echo $mazda->info();
echo "<br>";

?>
