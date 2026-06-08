<?php
header('Content-Type: application/json');
require_once 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

$nombre = $data['nombre'] ?? '';
$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

if (empty($nombre) || empty($email) || empty($password)) {
    echo json_encode(["success" => false]);
    exit;
}

$sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt->execute([$nombre, $email, $password])) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
?>
