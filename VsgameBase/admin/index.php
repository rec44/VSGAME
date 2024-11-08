<?php

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Dashboard';
$action = isset($_GET['action']) ? $_GET['action'] : 'mostrar';
// Construye el nombre del archivo y de la clase del controlador
$controllerFile = "controllers/" . ucfirst($controller) . "Controller.php";
$controllerClass = ucfirst($controller) . "Controller";

// Verifica si el archivo del controlador existe
if (file_exists($controllerFile)) {
require_once $controllerFile; // Cargo el Archivo necesario
// Verifica si la clase del controlador existe

if (class_exists($controllerClass)) {
$controllerObject = new $controllerClass(); // Crea una instancia del controlador
// Verifica si el método (acción) existe en el controlador

if (method_exists($controllerObject, $action)) {
$controllerObject->$action(); // Ejecuta la acción
} else {
echo "Error: Acción '$action' no encontrada en el controlador '$controllerClass'.";
}
} else {
echo "Error: Clase de controlador '$controllerClass' no encontrada.";
}
} else {
echo "Error: Archivo de controlador '$controllerFile' no encontrado.";
}
?>