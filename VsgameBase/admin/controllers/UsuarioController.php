<?php
require_once __DIR__ . "/../../../vendor/autoload.php";
require_once  __DIR__ . "/../models/UsuarioBD.php";
include_once __DIR__ . "/../views/header.php";


class UsuarioController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioBD();
    }

    public function mostrarUsuarios()
    {
        $usuarios = $this->usuarioModel->obtenerUsuarios();

        require_once __DIR__ . "/../views/users/users.php";
    }

    public function anadirUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nickname'])) {
            $nombre = $_POST['nickname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->usuarioModel->insertarUsuario($nombre, $email,$password);
            //$this->enviarEmail($email,$nombre);

            $this->mostrarUsuarios();
            exit;
        }

        require_once __DIR__ . "/../views/users/userAdd.php";
    }

    public function enviarEmail($email,$nombre){
        try {
            $phpmailer = new PHPMailer();
            $phpmailer->isSMTP();
            $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = '036582efd6c09f';
            $phpmailer->Password = '1f72a858169eb9';
    
            $phpmailer->setFrom('vsgame@info.es', 'VSgame');
            $phpmailer->addAddress($email, $nombre);
    
            $phpmailer->isHTML(true);
            $phpmailer->Subject = 'Bienvenido a VSgame';
            $phpmailer->Body = file_get_contents(__DIR__ . "/../assets/mail/registro.php");
            $phpmailer->send();
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
        }
    }

    

    public function borrarUsuario(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $this->usuarioModel->eliminarUsuario($id);
        }

       $this->mostrarUsuarios();
    }

    public function modificarUsuario(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $nombre = $_POST['nickname'];
            $email = $_POST['email'];
            $password = sha1($_POST['password']);

            $this->usuarioModel->actualizarUsuario($id,$nombre,$email,$password);
            $this->mostrarUsuarios();
            exit();
        }

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $usuario = $this->usuarioModel->obtenerUsuarioPorID($id);
            if($usuario){
                $nombre = $usuario['nickname'];
                $email = $usuario['email'];
            }
        }
        require_once __DIR__ . "/../views/users/userEdit.php";
    }
}
