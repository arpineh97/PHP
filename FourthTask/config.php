<?php
$dbhost = 'localhost';
$user = 'root';
$password = '1';
$dbname = 'eTask';

$conn = new mysqli ($dbhost, $user, $password, $dbname);
if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
        . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        tr, td, th {
            border: 1px solid black;
        }
    </style>
</head>
<body>

</body>
</html>