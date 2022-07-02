<?php
namespace Controllers;
use MVC\Router;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

class vendedorController{
    public static function crear(Router $router){
        $vendedor=new Vendedores();
        $errores=$vendedor::getErrores();
        if($_SERVER["REQUEST_METHOD"]==="POST"){
    
            $vendedores=new Vendedores($_POST["propiedad"]);
            
            
           if($_FILES['propiedad']['tmp_name']['imagen']){
            $imgname=md5(uniqid(rand(),true)) . ".jpg";
            //  Realiza un resize a la image
            // MAKE ACCEDE A LA UBICACION DEL ARCHIVO
            // FIT DECLARES THE HEIGHT AND THE WIDTH
            $image= Image::make($_FILES['propiedad']['tmp_name']["imagen"])->fit(800,600);
            // SE LE ASIGNA A LA FUNCION EL NOMBRE DEL Archivo
            $vendedores->setImage($imgname);
           }
          
           $errores=$vendedores->validar();
          
          
           if(empty($errores)){
           
            //   CREAR CARPETA
            $carpetaimg=$_SERVER['DOCUMENT_ROOT'] . '/public/imagenes';
            if(!is_dir($carpetaimg)){
                mkdir($carpetaimg);
            }
            $image->save($carpetaimg . "/" . $imgname);
            $vendedores->guardar();
           }
        }
        $router->render("/vendedores/crear",[
            "vendedores"=>$vendedor,
            "errores"=>$errores
        ]);
    }
    public static function actualizar(Router $router){
        $id=$_GET["id"];
        $vendedor=Vendedores::find($id);
        $errores=$vendedor::getErrores();
        if($_SERVER["REQUEST_METHOD"]=="POST"){
    
            $args=$_POST['propiedad'];
            $vendedor->sincronizar($args);
            
          
           $imgname=md5(uniqid(rand(),true)) . ".jpg";
         
           if($_FILES['propiedad']['tmp_name']['imagen']){
            //  Realiza un resize a la image
            // MAKE ACCEDE A LA UBICACION DEL ARCHIVO
            // FIT DECLARES THE HEIGHT AND THE WIDTH
            $image= Image::make($_FILES['propiedad']['tmp_name']["imagen"])->fit(800,600);
            // SE LE ASIGNA A LA FUNCION EL NOMBRE DEL Archivo
            $vendedor->setImage($imgname);
            $carpetaimg='../../imagenes';
            $image->save($carpetaimg . "/" . $imgname);
            
            
           }
           
           $errores=$vendedor->validar();
           if(empty($errores)){
               
                   //   CREAR CARPETA
           
            
               $resultado=$vendedor->update();
               if($resultado){
                   header("Location: ../admin?mensaje=2");
               }
           }
        }
        $router->render("vendedores/actualizar",[
            'vendedores'=>$vendedor,
            'errores'=>$errores
        ]);
    }
    public static function eliminar(Router $router){
       
        $db=conectarDB();
        if($_SERVER["REQUEST_METHOD"]=="POST"){
      
            $id=  filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
            if($id ){
                 $vendedores=Vendedores::find($id);
                    $vendedores->eliminar();
            }
            
        }
            $router->render('/vendedores/eliminar',[
                
            ]);
        }
}