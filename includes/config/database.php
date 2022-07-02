<?php 
function conectarDB() : mysqli{
    $db=new mysqli ("localhost", "root", "Joan92", "bienesraicesnew");
    if(!$db){
        echo'No se puedo ejecutar el codigo';
        exit;
    }
    else return $db;
};
/*function conectarDB(){
    $db=new PDO("mysql:Host=localhost; dbname=bienesraicesnew","root","Joan92");
    if(!$db){
        echo "ERROR";
        exit;
    }
    else return $db;
}*/