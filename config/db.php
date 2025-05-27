<?php
class Conexion {
    public static function conectar() {
        $host = "localhost";
        $db = "eanet";
        $user = "root";
        $pass = "";
        $port = 33078; 

        try {
            $conn = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
