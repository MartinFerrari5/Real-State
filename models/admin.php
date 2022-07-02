<?php
namespace Model;
class Admin extends ActiveRecord{
    protected static $columnaDB=["id", "email","password"];
    public static $tabla="usuarios";
    public $id;
    public $email;
    public $password;
    public function __construct($args=[]){
        $this->id=$args['id'] ?? null;
        $this->email=$args['email'] ?? null;
        $this->password=$args['password'] ?? null;
    }
    
    public  function validar(){
        
        
        if(!$this->email){
            self::$errores[]="Debes escribir un email";
        }
        if(!$this->password){
            self::$errores[]="Debes agregar un password";
        }
        
        return self::$errores;
    }
    public function exist(){
        $consulta="SELECT * FROM usuarios WHERE email='{$this->email}';";
        $resultado=self::$db->query($consulta);
        return $resultado;
    }
    public function comprobarPassword($resultado){
       
        $prove=password_verify($this->password,$resultado["password"]);
        if(!$prove){
            self::$errores[]="Contraseña erronea";
            return;
        }
        return $prove;

    }
    public function autenticar(){
        //EL USUARIO ESTA AUTENTICADO
        session_start();
        //LLENAR EL ARREGLO DE LA SESION
        $_SESSION["usuario"]=$this->email;
        $_SESSION["logIn"]=true;
        header('Location: admin');
    }
}