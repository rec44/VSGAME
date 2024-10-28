<?php
require_once "../config/Conexion.php";

$host = 'localhost';
$user = 'root';
$contrasenya = '';
$db = 'vsgame';
$conexion = new mysqli($host, $user, $contrasenya, $db);

if ($conexion->connect_errno) {
    die('No ha sido posible la conexion a la base de datos');
}

$conexion->query(
    "CREATE TABLE IF NOT EXISTS usuarios (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP)"
);

$conexion->query(
    "CREATE TABLE IF NOT EXISTS cartas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        ataque INT NOT NULL,
        defensa INT NOT NULL,
        img INT NOT NULL,
        poderEspecial VARCHAR(255)
    )"
);

$conexion->query(
    "CREATE TABLE IF NOT EXISTS configuracion (
        clave VARCHAR(100) PRIMARY KEY,
        valor VARCHAR(100) NOT NULL
    )"
);



$conexion->query("INSERT INTO cartas (nombre,ataque,defensa,img,poderEspecial) VALUES
('Guerrero',29,10,1,'');
('Guerrero', 29, 10, 1, ''),
('Guerrero', 10, 25, 1, ''),
('Guerrero', 10, 20, 1, ''),
('Mago', 14, 23, 3, ''),
('Druida', 23, 10, 4, ''),
('Vampiro', 2, 25, 5, ''),
('Tirador', 10, 20, 6, 'Bumerang'),
('Tirador', 14, 23, 6, 'Daño extra'),
('Druida', 23, 10, 9, 'Armadura extra'),
('Vampiro', 2, 25, 10, 'Robo de vida')");

$conexion->query("INSERT INTO configuracion (clave,valor)
                VALUES ('num_cartas, 5'),
                ('max_ataque','20'),
                ('max_defensa','20')");

$contrasenyaCifrada = sha1("123");
$conexion->query("INSERT INTO usuarios(nickname,email,password) VALUES 
('Sergio','123@gmail.com',$contrasenyaCifrada)");
