<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');
require_once 'config.php';

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

if (!$result) {
    die("Error en SQL: " . $conn->error);
}

$datos = [];

while($row = $result->fetch_assoc()){
    $datos[] = $row;
}

echo json_encode($datos);
?>
