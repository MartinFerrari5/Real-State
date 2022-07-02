<?php
define('TEMPLATES_URL', "templates");
define("FUNCIONES_URL","funciones.php");
function incluirTemplate(string $nombre){
    include TEMPLATES_URL."/${nombre}.php";
} 
function logIn(){
    session_start();
        /*echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";*/
    $auth=$_SESSION["logIn"] ?? null;
    if($auth) return true;
    return false;
}
function debuguear($valor){
    echo "<pre>";
    var_dump($valor);
    echo "</pre>";
    exit;
}
// ESCAPA/SANITIZA EL HTML
function escapa($html){
    $s=htmlspecialchars($html);
    return $s;
}
// VALIDA EL INPUT HIDDEN
function validarTipo($tipo){
    $tipos=["propiedad", "vendedor"];
    return in_array($tipo, $tipos);
}
// ALERTA DE CREADO, ACTUALIZADO O ELIMINADO
function mostrarNotificacion($message){
    $msg="";
   
    switch($message){
        case 1: $msg="Creado correctamente";
            break;
        case 2: $msg="Actualizado correctamente";
            break;
        case 3: $msg="Eliminado correctamente";
            break;
        case 5: $msg="Enviado correctamente";
        break;
        default:
            $msg=false;
            break;
        
    }
    return $msg;
}
