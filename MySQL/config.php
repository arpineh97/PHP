<?php
$servername = 'localhost';
$username = 'root';
$password = '1';
$dbname = 'eTask';

$conn = new mysqli ($servername, $username, $password, $dbname);
if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
}

?>
