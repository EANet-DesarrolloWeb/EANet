<?php
require_once __DIR__ . '/../config/db.php';
header("Content-Type: application/json");

$action = $_GET['action'] ?? null;

try {
    $conn = Conexion::conectar();

    switch ($action) {
        case 'getCarreras':
            $stmt = $conn->prepare("SELECT id, nombre FROM carreras");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
            break;

        case 'getCarreraById':
            $id = $_GET['id'] ?? null;
            if (!$id) {
                echo json_encode(["error" => "ID no proporcionado"]);
                exit;
            }

            $stmt = $conn->prepare("SELECT nombre FROM carreras WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($result ?: ["error" => "No encontrada"]);
            break;

        case 'getRoles':
            $stmt = $conn->prepare("SELECT id, nombre FROM roles");
            $stmt->execute();
            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($roles);
            break;
        case 'validarCorreo':
            $correo = $_GET['correo'] ?? '';
            if (!$correo) {
                echo json_encode(["existe" => false]);
                exit;
            }

            $stmt = $conn->prepare("SELECT COUNT(*) FROM usuarios WHERE correo = :correo");
            $stmt->bindParam(":correo", $correo);
            $stmt->execute();
            $existe = $stmt->fetchColumn() > 0;

            echo json_encode(["existe" => $existe]);
            break;
        default:
            echo json_encode(["error" => "Acción no válida"]);
    }
} catch (PDOException $e) {
    echo json_encode(["error" => "Error en la base de datos"]);
}
