<?php
namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

class propiedadController{
    
    public static function index(Router $router){
        $propiedad=Propiedad::all();
        $vendedor=Vendedores::all();
        $router->render('propiedades/admin', [
            "mensaje"=>"Desde la vista",
            "propiedades"=>$propiedad,
            "vendedores"=>$vendedor,
            'header'=>null
        ]);
        
    }



    public static function crear(Router $router){
        $propiedad=new Propiedad();

        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $args=$_POST['propiedad'];
    $propiedad=new Propiedad($args);

    // NOMBRE ID
    $imgName=md5(uniqid(rand(), true)) . ".jpg" ;
    
    if($_FILES['propiedad']['tmp_name']["imagen"]){
    // Realiza un resize a la image
    // MAKE ACCEDE A LA UBICACION DEL ARCHIVO
    // FIT DECLARES THE HEIGHT AND THE WIDTH
    $image= Image::make($_FILES['propiedad']['tmp_name']["imagen"])->fit(800,600);
    // SE LE ASIGNA A LA FUNCION EL NOMBRE DEL Archivo
    $propiedad->setImage($imgName);

    }
    
    $errores=$propiedad->validar();
        //INSERTAR EN LA BASE DE DATOS
        //REVISAR QUE NO HAYA ERRORES
        if(empty($errores)){
            
            /*SUBIDA DE ARCHIVOS*/
            // CREAR CARPETA
            $carpetaImg=$_SERVER['DOCUMENT_ROOT'] . '/public/imagenes';
            if(!is_dir($carpetaImg)){
                mkdir($carpetaImg);
            };
            // GUARDA LA IMAGEN EN EL SERVIDOR
            $image->save($carpetaImg . "/" . $imgName);
            $propiedad->guardar();
        }   

        }

        $router->render('propiedades/crear', [
            "propiedad"=>$propiedad,
            "errores"=>Propiedad::getErrores(),
            "header"=>null
        ]);
    }

//*********************************************************** */

    public static function actualizar (Router $router){
        $id=$_GET['id'];
        $id=filter_var($id, FILTER_VALIDATE_INT);
        if(!$id){
            header('Location:../admin');
        }
        $propiedad=Propiedad::find($id);
        if($_SERVER['REQUEST_METHOD'] ==='POST'){
            // ASIGNAR ATRIBUTOS
            
            $args=$_POST['propiedad'];
            $propiedad->sincronizar($args);
           
            $imagen=$_FILES["propiedad"];
            
        
             // NOMBRE ID
            $imgName=md5(uniqid(rand(), true)) . ".jpg" ;
            
            if($_FILES['propiedad']['tmp_name']["imagen"]){
            // Realiza un resize a la image
            // MAKE ACCEDE A LA UBICACION DEL ARCHIVO
            // FIT DECLARES THE HEIGHT AND THE WIDTH
            $image= Image::make($_FILES['propiedad']['tmp_name']["imagen"])->fit(800,600);
            // SE LE ASIGNA A LA FUNCION EL NOMBRE DEL Archivo
           
            $propiedad->setImage($imgName);
            $carpetaImg=$_SERVER['DOCUMENT_ROOT'] . '/public/imagenes';
            $image->save($carpetaImg . "/" . $imgName);
            }
           
            // VALIDACION
            $errores=$propiedad->validar();
            
            // SUBIDA DE ARCHIVOS
                if(empty($errores)){
                    /*SUBIDA DE ARCHIVOS*/
                    // CREAR CARPETA
                    $carpetaImg=$_SERVER['DOCUMENT_ROOT'] . '/public/imagenes';
                    if(!is_dir($carpetaImg)){
                        $carpetaImg=$_SERVER['DOCUMENT_ROOT'] . '/public/imagenes';
                        mkdir($carpetaImg);
                    };
                    // GUARDAR LA IMAGEN
        
                    $resultado=$propiedad->update($id);
                    if($resultado){
                        echo "Agregado correctamente";
                        header('Location:../admin?mensaje=2');
                    }
                }
            
        }
        $router->render('propiedades/actualizar',[
            "propiedad"=>$propiedad,
            "errores"=>Propiedad::getErrores(),
            "header"=>null
        ]);
        
    }
    public static function eliminar(Router $router){
       
        $db=conectarDB();
        if($_SERVER["REQUEST_METHOD"]=="POST"){
      
            $id=  filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
            if($id ){
                 $propiedades=Propiedad::find($id);
                    $propiedades->eliminar();
            }
            
        }
            $router->render('/propiedades/eliminar',[
                
            ]);
        }
        
    }


/*************************/
