    <h2>Actualizar</h2>

    <main class="contenedor seccion">
    <a href="../admin" class="boton boton-verde">Volver</a>
    <?php
    
    foreach($errores as $error):
    ?>
    <div class="alerta error">
        <?php echo $error?>
    </div> 
    <?php endforeach;?>
        <form class="form-contacto" enctype="multipart/form-data" method="POST" >
        
        <?php require __DIR__ . '/../form_prop.php';?>
        
        <div>
            <button value="send-propiedad" class="form-button boton-verde">Enviar</button>
        </div>
    </form>
</main>
<?php
