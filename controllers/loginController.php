<?php
namespace Controllers;
use MVC\Router;
use Model\Admin;
class loginController{
    public static function login(Router $router){
        $db=conectarDB();
         $errores=Admin::getErrores();
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            /*echo "<pre>";
             var_dump($_POST);
             echo "</pre>";*/
            
            $usuario=new Admin($_POST);
            
            $errores=$usuario->validar();
             
         
             if(empty($errores)){ 
                $resultado=$usuario->exist();
                
                
                if($resultado->num_rows){ //SI EXISTE, SIGNIFICA QUE PUDO/EXISTE LA $consulta
                        $resultado=$resultado->fetch_assoc();
                        
                        $auth=$usuario->comprobarPassword($resultado);
       
                    
                        if( $auth){
                            $usuario->autenticar();
                        }else{
                            $errores=Admin::getErrores();
                        }
                        
                }else{
                    
                    $errores[]="Usuario incorrecto";
                } 
                
                 
            }
             
        }
        $router->render('login',[
            'errores'=>$errores,
            'header'=>null
            
        ]);
    }
    public static function logout(Router $router){
        session_start();
    $_SESSION=[];
header('Location: index');
       
    }
}