<?php
namespace Model;
class Vendedores extends ActiveRecord{
    
    protected static $tabla="vendedores";
    protected static $columnaDB=["id", "nombre", "apellido","telefono", "imagen" ];
    public $id;
    public $nombre;
    public $apellido;
    public $imagen;
    public $telefono;
    public static $errores=[];
    public function __construct($args=[] )
    {
        $this-> id= $args['id'] ?? null;
        $this-> nombre= $args['nombre'] ?? "";
        $this-> apellido= $args['apellido'] ?? "";
        $this-> telefono= $args['telefono'] ?? "";
        $this-> imagen= $args['imagen'] ?? "";
        
    }
    public function validar(){
        $errores=[];
        if(!$this->nombre){
            $errores[]="Debes agregar un nombre";
        }
        if(!$this->apellido){
            $errores[]="Debes agregar un apellido";
        }
        if(!$this->telefono){
            $errores[]="Debes agregar un numero";
        }
        if(!$this->imagen){
            $errores[]="Debes agregar una imagen";
        }
        if(!preg_match('/[0-9]/',$this->telefono)){
            $errores[]="No puedes agregar caracteres no numericos";
        }
        return $errores;
    }
}