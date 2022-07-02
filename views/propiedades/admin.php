<?php
use Model\ActiveRecord;
    use Model\Propiedad;
use Model\Vendedores;
$db=conectarDB();
   

    // IMPLEMENTAR UN METODO PARA OBTENER TODAS LAS PROPIEDADES
    
 
   


    /*MUESTRA MENSAJE CONDICIONAL*/
    $message=$_GET['mensaje'] ?? null;

    $vendedor=$_GET["vendedor"] ?? null;
     /*SI EXISTE
    $message=$GET['mensaje'], sino es una variable vacia*/
    


?>
<main class="contenedor seccion">
    
    <h1>Administrador</h1>
    <p class="chequeado"><?php echo $mensaje= mostrarNotificacion(intval($message));?></p>
    
    
    <a href="propiedades/crear" class="boton boton-verde">Nueva propiedad</a>
</main>
<h2>Propiedades</h2>
    <table class="propiedades">
        <thead>
            <tr class="table-head">
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($propiedades as $propiedad):?>
                
            <tr>
                <!-- MOSTRAR LOS RESULTADOS -->
                <td><?php echo $propiedad->id; ?></td>
                <td><?php echo $propiedad->titulo; ?></td>
                <td><img src="imagenes/<?php echo $propiedad->imagen; ?>" class="imagenTabla" alt=""></td>
                <td>$<?php echo $propiedad->precio; ?></td>
                <td class="table-buttons msg">
                        <input class="delete-button boton-rojo choice" type="submit" value="Eliminar">
                    <a class="boton-verde" href="propiedades/actualizar?id=<?php echo $propiedad->id ?>">Actualizar</a>
                </td>
            </tr>
            <article class="delete-article">
        <div class="delete-div-conteiner">
            <p>¿Desea eliminar el archivo?</p>
            <div class="delete-div">
                <form class="delete-form" action="propiedades/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $propiedad->id ?>">
                    <input type="hidden" name="tipo" value="propiedad">
                    <input class=" boton-verde eliminar" type="submit" value="Si">
                </form>
                <button class="boton-rojo keep">No</button>
            </div>
        </div>
    </article>
            <?php endforeach;?>
        </tbody>
    </table>
    <a href="vendedores/crear" class="boton boton-verde">Nuevo vendedor</a>
    <h2>Vendedores</h2>
    <table class="vendedores">
    <thead>
            <tr class="table-head">
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Numero</th>
                <th>Photo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <?php 
        foreach($vendedores as $vendedor):
            ?>
            <tbody>
                <tr>
                    <td> <?php echo $vendedor->id?></td>
                    <td> <?php echo $vendedor->nombre?></td>
                    <td> <?php echo $vendedor->apellido?></td>
                    <td> <?php echo $vendedor->telefono?></td>
                    <td><img src="imagenes/<?php echo $vendedor->imagen; ?>" class="imagenTabla" alt=""></td>
                    <td class="table-buttons">
                        <form action="vendedores/eliminar" method="POST" class="form-sellers">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input class=" boton-rojo " type="submit" value="Eliminar">
                        </form>
                        <a class="boton-verde" padding="1rem" href="vendedores/actualizar?id=<?php echo $vendedor->id ?>">Actualizar</a>
                    </td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>




    <?php  
 
   
    