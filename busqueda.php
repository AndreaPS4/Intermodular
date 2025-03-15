<?php
header('Content-Type: application/json');
require 'bd.php'; 

$query = isset($_GET['query']) ? trim($_GET['query']) : '';

if (empty($query)) {
    echo json_encode(["error" => "No se proporcionó un término de búsqueda."]);
    exit();
}

$sql = "SELECT nombre, precio FROM productos WHERE nombre LIKE ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(["error" => "Error en la preparación de la consulta: " . $conn->error]);
    exit();
}

$likeQuery = "%$query%";
$stmt->bind_param("s", $likeQuery); 
$stmt->execute(); 

$result = $stmt->get_result();
$productos = [];

while ($row = $result->fetch_assoc()) {
    $productos[] = $row;
}

echo json_encode($productos);

$stmt->close();
$conn->close();
?>
