<?php
// IMPORTAR CONEXION

$db=conectarDB();
// TRAER PARTES DEL LINK 

if(!$id){
    header("Location:/"); //DIRIGE A PAGINA PRINCIPAL
}
//  CONSULTAR
$query="SELECT * FROM propiedades WHERE id={$id};";
//OBTENER RESULTADOS
$resultado=$db->query( $query);
if($resultado->num_rows==0) header("Location:/");

$propiedad=$resultado->fetch_assoc();
/*echo "<pre>";
var_dump($propiedad);
echo "</pre>";*/


 
?>
<section class="section-alone">
    <p data-cy="section-title" class="section-title"><?php echo $propiedad["titulo"] ?></p>
    <article class="article">
        <img src="imagenes/<?php echo $propiedad["imagen"] ?>" alt="imagen">
        <p class="precio">$ <?php echo $propiedad["precio"] ?></p>
        <ul class="rooms">
                <li><img src="build/img/icono_wc.svg" alt="room"><span><?php echo  $propiedad['wc']?></span></li>
                <li><img src="build/img/icono_dormitorio.svg" alt="room"><span><?php echo  $propiedad['habitaciones']?></span></li>
                <li><img src="build/img/icono_estacionamiento.svg" alt="room"><span><?php echo  $propiedad['estacionamiento']?></span></li>
            </ul>
        <p> <?php echo $propiedad["descripion"] ?></p>
        
    </article>
</section>
<?php 

  
?>