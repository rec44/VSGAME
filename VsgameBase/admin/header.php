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