<?php
namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer as PHPMailer;
class paginasController{
    public static function index(Router $router){
        $propiedades=Propiedad::get(3);
        $router->render('paginas/index',[
            'propiedades'=>$propiedades,
            'header'=>'header'
            
        ]);
        
    }
   
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros',[
            'header'=>null
        ]);
        
    }
    public static function anuncios(Router $router){
        $id=$_GET["id"] ?? null;
        $id=filter_var($id, FILTER_VALIDATE_INT) ?? null;
       
        if($id==false){
            $propiedades=Propiedad::all();
        $router->render('paginas/anuncios',[
            'propiedades'=>$propiedades,
            'header'=>null
        ]);
        }else{
            $propiedades=Propiedad::find($id);
        $router->render('paginas/propiedad',[
            'propiedades'=>$propiedades,
            'header'=>null,
            'id'=>$id
        ]);
        }
        
        
    }

    public static function blog(Router $router){
        $router->render('paginas/blog',[
            'header'=> null
        ]);
        
    }
    public static function contacto(Router $router){
       if($_SERVER['REQUEST_METHOD']==="POST"){
            // CREAR UNA INSTANCIA DE PHPMAILER
            $mail= new PHPMailer();
            $respuestas=$_POST['contacto'];
     
            // CONFIGURAR SMTP (protocolo envio de emails)
            $mail->isSMTP();
            $mail->Host="smtp.mailtrap.io";
            $mail->SMTPAuth=true;
            $mail->Username="72ec8bc52185c8";
            $mail->Password="579c5ca88edb6f";
            $mail->SMTPSecure="tls";
            $mail->Port="2525";
            // CONTENIDO DE EMAIL
            $mail->setFrom("admin@bienesraices.com"); //Quien envia el email
            $mail->addAddress("admin@bienesrsices.com", "BienesRaices") ;//A que email llega
            $mail->Subject="Tiene un email"; /*Primer mensaje en leer*/
            // Habilita HTML
            $mail->isHTML(true);
            $mail->CharSet="UTF-8"; //Muestra en el mensaje los caracteres con acento
            // DEFINIR EL CONTENIDO
            $contenido ='<html>';
            $contenido .= '<p>Tienes un nuevo msg</p>';
            $contenido .= '<p> Nombre: ' . $respuestas["nombre"] . '</p>';
            $contenido .= '<p> Mensaje : ' . $respuestas["mensaje"] . '</p>';
            $contenido .= '<p> Compra/Vende : ' . $respuestas["tipo"] . '</p>';
            $contenido .= '<p> Price : $' . $respuestas["precio"] . '</p>';
            $contenido .= '<p> Contact Form : ' . $respuestas["contacto"] . '</p>';
            
            if($respuestas['contacto']=="telefono"){
                $contenido .= '<p> Phone : ' . $respuestas["phone"] . '</p>';
            $contenido .= '<p> Fecha : ' . $respuestas["fecha"] . '</p>';
            $contenido .= '<p> Hora : ' . $respuestas["hora"] . '</p>';
            $contenido .= '<p> Aclaracion : ' . $respuestas["msg"] . '</p>';
            }
            else{
                $contenido .= '<p> Mail : ' . $respuestas["mail"] . '</p>';
            }
            $contenido .= '</html>';
          
           $mail->Body=$contenido;
           $mail->AltBody="Esto es texto sin HTML"; /*Es el contenido cuando el lector de emails
            no soporta HTML*/
            // ENVIAR EL EMAIL
            if($mail->send() /*TRUE si se envio FALSE si no*/){
                header('Location:contacto?num=5' );
            } else{
                echo 'No se pudo enviar';
            }
            }
            
       
        $router->render('paginas/contacto',[
            'header'=> null
        ]);
        
    }
}