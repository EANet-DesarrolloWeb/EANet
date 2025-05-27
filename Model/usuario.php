<?php
require_once __DIR__ . '/../config/db.php';

class Usuario
{
    public static function verificarLogin($correo, $passwordIngresada)
    {
        $conn = Conexion::conectar();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = :correo");
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            $hash = $usuario['password'];

            // Si está encriptada
            if (str_starts_with($hash, '$2y$') || str_starts_with($hash, '$argon2')) {
                if (password_verify($passwordIngresada, $hash)) {
                    return $usuario;
                }
            } else {
                // Si está en texto plano
                if ($passwordIngresada === $hash) {
                    // Encriptamos la contraseña inmediatamente
                    $nuevoHash = password_hash($passwordIngresada, PASSWORD_DEFAULT);
                    $update = $conn->prepare("UPDATE usuarios SET password = :nuevo WHERE id = :id");
                    $update->bindParam(":nuevo", $nuevoHash);
                    $update->bindParam(":id", $usuario['id']);
                    $update->execute();

                    // Reemplazamos en el objeto devuelto
                    $usuario['password'] = $nuevoHash;
                    return $usuario;
                }
            }
        }

        return false;
    }

    // ✅ Crear usuario con contraseña encriptada
    public static function crearUsuario($datos)
    {
        $conn = Conexion::conectar();
        $passwordHash = password_hash($datos['password'], PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO usuarios 
            (id,primer_nombre, segundo_nombre, tercer_nombre,
             primer_apellido, segundo_apellido, tercer_apellido,
             fecha_nacimiento, correo,telefono, password, rol_id, carrera_id, Acerca_de_ti,activo)
            VALUES
            (:id,:pnom, :snom, :tnom, :pape, :sape, :tape, :fecha, :correo,:telefono, :password, :rol, :carrera,:acercadeti, 1)");

        $stmt->bindParam(":id", $datos['id']);
        $stmt->bindParam(":pnom", $datos['primer_nombre']);
        $stmt->bindParam(":snom", $datos['segundo_nombre']);
        $stmt->bindParam(":tnom", $datos['tercer_nombre']);
        $stmt->bindParam(":pape", $datos['primer_apellido']);
        $stmt->bindParam(":sape", $datos['segundo_apellido']);
        $stmt->bindParam(":tape", $datos['tercer_apellido']);
        $stmt->bindParam(":fecha", $datos['fecha_nacimiento']);
        $stmt->bindParam(":correo", $datos['correo']);
        $stmt->bindParam(":telefono", $datos['telefono']);
        $stmt->bindParam(":password", $passwordHash);
        $stmt->bindParam(":rol", $datos['rol_id']);
        $stmt->bindParam(":carrera", $datos['carrera_id']);
        $stmt->bindParam(":acercadeti", $datos['Acerca_de_ti']);

        return $stmt->execute();
    }

    public static function cambiarPassword($id, $actual, $nueva)
    {
        $conn = Conexion::conectar();

        // 1. Obtener contraseña actual encriptada
        $stmt = $conn->prepare("SELECT password FROM usuarios WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$usuario || !password_verify($actual, $usuario['password'])) {
            return ["success" => false, "error" => "Contraseña actual incorrecta"];
        }

        // 2. Guardar nueva contraseña
        $nuevoHash = password_hash($nueva, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE usuarios SET password = :pass WHERE id = :id");
        $stmt->bindParam(":pass", $nuevoHash);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return ["success" => true];
    }
}
