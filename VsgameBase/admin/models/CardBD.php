<?php
require_once __DIR__ . '/../config/Conexion.php';
class CardBD {
    private $conexion;

    public function __construct() {
        // Creamos una nueva instancia de la conexión
        $db = new Conexion();
        $this->conexion = $db->get_conexion();
    }
    // Método para obtener un usuario por su ID
    public function obtenerCartaPorID($id) {
        $sql = "SELECT * FROM cartas WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertarCarta($nombre,$ataque,$defensa,$tipo,$img,$poderEspecial){ 
        $sql = "INSERT INTO cartas (nombre,ataque,defensa,tipo,img,poderEspecial)
            VALUES  (:nombre,:ataque,:defensa,:tipo,:img,:poderEspecial)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':nombre',$nombre);
        $stmt->bindParam(':atque',$ataque);
        $stmt->bindParam(':defensa',$defensa);
        $stmt->bindParam(':tipo',$tipo);
        $stmt->bindParam(':img',$img);
        $stmt->bindParam(':poderEspecial',$poderEspecial);
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function obtenerCartas(){
        $sql = "SELECT * FROM cartas";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarCartas($id,$nombre,$ataque,$defensa,$tipo,$img,$poderEspecial){
        $sql = "UPDATE cartas SET nombre = :nombre, ataque = :ataque, defensa = :defensa, tipo = :tipo, img = :img, poderEspecial = :poderEspecial WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':nombre',$nombre);
        $stmt->bindParam(':ataque',$ataque);
        $stmt->bindParam(':defensa',$defensa);
        $stmt->bindParam(':tipo',$tipo);
        $stmt->bindParam(':img',$img);
        $stmt->bindParam(':poderEspecial',$poderEspecial);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function eliminarCarta($id){
        $sql = "DELETE FROM cartas WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    
    public function contarCartas(){
        $sql = "SELECT COUNT(*) FROM cartas";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
?>