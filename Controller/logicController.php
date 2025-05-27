<?php
require_once __DIR__ . '/../Model/usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputRaw = file_get_contents("php://input");
    $isJson = strpos($_SERVER["CONTENT_TYPE"] ?? '', 'application/json') !== false;

    $input = $isJson ? json_decode($inputRaw, true) : $_POST;
    $action = $input['action'] ?? null;

    // 🟢 CASO LOGIN tradicional (sin action, sin JSON, desde form HTML)
    if (!$action && !$isJson) {
        $correo = $_POST['correo'] ?? '';
        $password = $_POST['password'] ?? '';

        $usuario = Usuario::verificarLogin($correo, $password);

        if ($usuario) {
            session_start();
            $_SESSION['usuario'] = $usuario;

            echo "<script>
                const info_usuario = " . json_encode($usuario) . ";
                sessionStorage.setItem('info_usuario', JSON.stringify(info_usuario));
                window.location.href = '../View/src/pages/dashboard.php';
            </script>";
        } else {
            header("Location: ../View/src/pages/login.php?error=1");
        }
        exit;
    }

    // 🟢 CASOS DE API: crearUsuario, cambiarPassword
    header('Content-Type: application/json');

    switch ($action) {
        case 'crearUsuario':
            $datos = $input;
            $result = Usuario::crearUsuario($datos);

            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Usuario creado exitosamente']);
            } else {
                echo json_encode(['success' => false, 'message' => 'No se pudo crear el usuario']);
            }
            break;

        case 'cambiarPassword':
            $id = $input['id'] ?? null;
            $actual = $input['actual'] ?? '';
            $nueva = $input['nueva'] ?? '';

            if (!$id || !$actual || !$nueva) {
                echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
                exit;
            }

            $result = Usuario::cambiarPassword($id, $actual, $nueva);
            echo json_encode($result);
            break;

        default:
            echo json_encode(['success' => false, 'message' => 'Acción no válida']);
            break;
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
