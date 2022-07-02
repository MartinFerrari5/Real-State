
<?php
  use App\Vendedores;
    
    ?>
<fieldset>
        <div class="campos">
            <label  for="nombre">Nombre</label>
            <input name="propiedad[nombre]" id="nombre" type="text" value="<?php echo escapa( $vendedores->nombre ?? ""); ?>">

 
        </div>

        <div class="campos">
        <label  for="apellido">Apellido</label>
        <input value="<?php echo escapa( $vendedores->apellido ?? ""); ?>" name="propiedad[apellido]" id="apellido" type="text">
        </div>

        <div class="campos">
        <label  for="numero">Numero</label>
        <input value="<?php echo escapa( $vendedores->telefono ?? ""); ?>" name="propiedad[telefono]" id="numero" type="number">
        </div>

        <div class="campos">
            <label  for="">Imagen</label>
            <input type="file" accept="image/jpg, image/jpeg, image/png" value="" name="propiedad[imagen]"  ></input>
            <?php if(!is_null($vendedores->imagen)):?>
                     <img class="img-small" src="../imagenes/<?php echo $vendedores->imagen?>" alt="img">
            <?php endif;?>
        </div>


       