<?php
require_once __DIR__ . '/../config/db.php';
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['id'])) {
    echo json_encode(["success" => false, "error" => "Datos incompletos"]);
    exit;
}

$id = $data['id'];
$telefono = $data['telefono'] ?? null;
$acerca = $data['acerca_de_ti'] ?? null;

$actual = $data['actual'] ?? null;
$nueva = $data['nueva'] ?? null;

try {
    $conn = Conexion::conectar();

    if ($actual && $nueva) {
        $stmt = $conn->prepare("SELECT password FROM usuarios WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($actual, $user['password'])) {
            echo json_encode(["success" => false, "message" => "Contraseña actual incorrecta"]);
            exit;
        }

        // Encriptar nueva contraseña y actualizar
        $nuevaHash = password_hash($nueva, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE usuarios SET password = :nueva WHERE id = :id");
        $stmt->bindParam(":nueva", $nuevaHash);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        echo json_encode(["success" => true, "message" => "Contraseña actualizada"]);
        exit;
    }

    // ✅ Actualización normal de teléfono y acerca de ti
    $stmt = $conn->prepare("UPDATE usuarios SET telefono = :telefono, acerca_de_ti = :acerca WHERE id = :id");
    $stmt->bindParam(":telefono", $telefono);
    $stmt->bindParam(":acerca", $acerca);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    echo json_encode(["success" => true]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
