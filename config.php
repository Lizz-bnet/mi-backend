<?php
$host = getenv('MYSQLHOST') . ':' . getenv('MYSQLPORT');
$user = getenv('MYSQLUSER');
$pass = getenv('MYSQLPASSWORD');
$db   = getenv('MYSQLDATABASE');

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
}
?>