<?php
header('Content-Type: application/json');
require_once 'config.php';

$sql = "SELECT * FROM usuarios";
$stmt = $conn->query($sql);

$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($datos);
?>
