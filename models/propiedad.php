<?php declare(strict_types=1);
namespace Model;
class Propiedad extends ActiveRecord{
    
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedoresid;
    protected static $columnaDB=["id", "titulo","precio",
     "imagen", "descripion","habitaciones","wc","estacionamiento","creado","vendedoresid" ];
    protected static $tabla="propiedades";
    public function __construct($args=[] )
    {
        $this-> id= $args['id'] ?? null;
        $this-> titulo= $args['titulo'] ?? "";
        $this-> precio= $args['precio'] ?? "";
        $this-> imagen= $args['imagen'] ?? "";
        $this-> descripion= $args['descripion'] ?? "";
        $this-> habitaciones= $args['habitaciones'] ?? "";
        $this-> wc= $args['wc'] ?? "";
        $this-> estacionamiento= $args['estacionamiento'] ?? "";
        $this-> creado= date("Y/m/d");
        $this-> vendedoresid= $args['vendedoresid'] ?? "";
    }
    public function validar(){
        
        if(!$this->titulo){
            self::$errores[]="Debes agregar un titulo";
        }
        if(!$this->precio){
           self:: $errores[]="Debes agregar un precio";
        }
        if(!$this->imagen ){
            self::$errores[]="Debes agregar una imagen";
        }
        // if(($this->imagen["size"]/1000)>1000){
        //     self::$errores[]="Debes agregar una imagen menor de 100kb, tu imagen pesa " . $this->imagen["size"]/1000 . "kb" ;
        // }
        if(strlen($this->descripion)<10){
            self::$errores[]="Debes agregar una descripcion más amplia";
        }
        if(!$this->habitaciones){
            self::$errores[]="Debes agregar un numero de habitacion";
        }
        if(!$this->wc){
            self::$errores[]="Debes agregar un numero de baños ";
        }
        if(!$this->estacionamiento){
            self::$errores[]="Debes agregar un numero de estacionamiento";
        }
        if(!$this->vendedoresid){
            self::$errores[]="Debes escoger un vendedor ";
        }
        return self::$errores;
    }
}
