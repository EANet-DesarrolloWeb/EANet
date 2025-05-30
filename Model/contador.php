<?php
require_once __DIR__ . '/../config/db.php';

class Contador {
    public static function incrementarYObtener() {
        $conn = Conexion::conectar();

        // Asegurar que exista el registro con id=1
        $conn->exec("INSERT IGNORE INTO contador_visitas (id, visitas) VALUES (1, 0)");

        // Incrementar contador
        $conn->exec("UPDATE contador_visitas SET visitas = visitas + 1 WHERE id = 1");

        // Obtener el valor actualizado
        $stmt = $conn->query("SELECT visitas FROM contador_visitas WHERE id = 1");
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        return $fila['visitas'] ?? 0;
    }
}
