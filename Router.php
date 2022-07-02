<?php 
namespace MVC;
class Router{
    public $rutasGet=[];
    public $rutasPost=[];
    public function get($url, $fn){
        $this->rutasGet[$url]=$fn;
    }
    public function post($url, $fn){
        $this->rutasPost[$url]=$fn;
    }
    public function comprobarRutas(){
        
        $auth=login();
        
            //RUTAS PROTEGIDAS
            $protectedRute=['/admin','/propiedades/crear',
            '/propiedades/actualizar','/vendedores/crear','/vendedores/actualizar'];
            $url=$_SERVER['PATH_INFO'] ?? "/";
            $metodo=$_SERVER["REQUEST_METHOD"];
           
            if ($metodo=="GET"){
                $fn=$this->rutasGet[$url] ?? null;
               
            }elseif($metodo=="POST"){
                $fn=$this->rutasPost[$url] ?? null;
              
            }
            if(in_array($url,$protectedRute) && !$auth){
              
                header('Location: login');
            }
            if($fn){
                // La url existe si hay una funcion asociada
               
                call_user_func($fn,$this); 
                /*LLama a una funcion sin saber como 
                se llama esa funcion*/
               
            }else{
                echo "Pagina no encontrada";
            }
           
    }
    public function render($view, $datos=[]){
       
        foreach($datos as $key=>$value){
            $$key=$value;
            
        }
        ob_start(); //Almacena en memoria
         
        include __DIR__ . '/views/' . $view . '.php';
        $contenido=ob_get_clean(); //LIMPIA LA MEMORIA
        //TODO EL CONTENIDO QUEDA GUARDADO EN LA VARIABLE DE CONTENIDO
        
        include __DIR__ . '/views/layout.php';
    }
}

