<?php
class Conexion {
    public function get_conexion() {
        $user = "root";
        $pass = "";
        $host = "localhost";
        $db = "vsgame";
        
        try {
            $conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            return null;
        }
    }
}
?>