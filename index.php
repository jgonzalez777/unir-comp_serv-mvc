<?php
require_once 'model/database.php';

$controller = 'libro';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['entidad']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['entidad']);
    $accion = isset($_REQUEST['accion']) ? $_REQUEST['accion'] : 'Index';
    
    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}