<?php 
require_once __DIR__ . '/../config/Conexion.php';

class UsuarioBD {
    private $conexion;

    public function __construct() {
        // Creamos una nueva instancia de la conexión
        $db = new Conexion();
        $this->conexion = $db->get_conexion();
    }
    // Método para obtener un usuario por su ID
    public function obtenerUsuarioPorID($id) {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertarUsuario($nickname,$email,$password){
        $contrasenya_Cifrada = sha1($password); 
        $sql = "INSERT INTO usuarios (nickname,email,password)
            VALUES  (:nickname,:email,:password)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':nickname',$nickname);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$contrasenya_Cifrada);
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function obtenerUsuarios(){
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarUsuario($id,$nickname,$email,$password){
        $sql = "UPDATE usuarios SET nickname = :nickname, email = :email, password = :password WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':nickname',$nickname);
        $stmt->bindParam(':email',$email);
        $contrasenya_Cifrada = sha1($password);
        $stmt->bindParam(':password',$contrasenya_Cifrada);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function eliminarUsuario($id){
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function validarLogin($email,$password){
        $sql = "SELECT * FROM usuarios WHERE email = :email AND password = :password";
        $contrasenya_Cifrada = sha1($password);
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$contrasenya_Cifrada);
        $stmt->execute();
        return $usuario = $stmt->fetch(PDO::FETCH_ASSOC);  
    }
}
?>