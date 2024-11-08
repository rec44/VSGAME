<?php
    session_start();

    if(!isset($_SESSION['nickname'])){
        if(isset($_COOKIE['nickname'])){
            $_SESSION['nickname'] = $_COOKIE['nickname'];
        }
        else{
            header("Location: login.php");
        exit();
        }
    }


    if(isset($_GET['logout']) && $_GET['logout'] === 'true'){
        session_destroy();
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="assets/css/admin.css"> <!-- Archivo CSS externo -->
</head>
<body>
    <header>
        <h1>Panel de Administración</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="index.php?controller=Carta&action=mostrarCartas">Cartas</a></li>
                <li><a href="config/config.php">Configuración</a></li>
                <li><a href="index.php?controller=Usuario&action=mostrarUsuarios">Usuarios</a></li>
                <li><a href="?logout=true"><?php if(isset($_SESSION['nickname'])) echo "Hola " . $_SESSION['nickname'] ." "?>(Cerrar Sesión)</a></li>
            </ul>
        </nav>
    </header>