<?php
header('Content-Type: application/json');
require_once 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

$nombre = $data['nombre'] ?? '';
$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

if (empty($nombre) || empty($email) || empty($password)) {
    echo json_encode(["success" => false, "message" => "Campos vacíos"]);
    exit;
}

$sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nombre, $email, $password);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
?>