<?php

    use Model\Vendedores;
    $vendedores=Vendedores::all();
    
?>
    <fieldset>
        <legend>Informacion general</legend>
            <div class="campos">
                <label for="titulo" for="">Titulo:</label>
                <input id="titulo" name="propiedad[titulo]" placeholder="Titulo Propiedad" type="text" value="<?php echo escapa($propiedad->titulo) ?? ""; ?>"></input>
            </div>
            <div class="campos">
                <label  for="precio">Precio</label>
                <input value="<?php echo escapa($propiedad->precio) ?? ""; ?>" id="precio" name="propiedad[precio]" type="number"></input>
            </div>
            <div class="campos">
                <label for="">Imagen</label>
                <input name="propiedad[imagen]" type="file" placeholder="Tu celular" accept="image/jpg, image/jpeg, image/png"></input>
                <?php if($propiedad->imagen):?>
                     <img class="img-small" src="../imagenes/<?php echo $propiedad->imagen?>" alt="img">
                <?php endif;?>
                
            </div>
            <div class="campos">
                <label for="">Descripcion</label>
                <textarea name="propiedad[descripion]" id="" cols="20" rows="5"><?php echo escapa($propiedad->descripion) ?? "" ;?></textarea>
            </div>
        </label>
    </fieldset>
    <fieldset>
        <legend>Informacion general</legend>
            <div class="campos">
                <label for="habitaciones" for="">Habitaciones:</label>
                <input value="<?php echo escapa($propiedad->habitaciones) ?? "" ;?>" name="propiedad[habitaciones]" id="habitaciones" min="1" max="9" placeholder="Ej:3" type="number"></input>
            </div>
            <div class="campos">
                <label for="wc" for="">Baños:</label>
                <input value="<?php echo escapa($propiedad->wc) ?? "" ;?>" name="propiedad[wc]" id="wc" min="1" max="9" placeholder="Ej:3" type="number"></input>
            </div>
            <div class="campos">
                <label for="estacionamiento" for="">Estacionamiento:</label>
                <input id="estacionamiento" value="<?php echo escapa($propiedad->estacionamiento) ?? "" ;?>" name="propiedad[estacionamiento]" id="estacionamiento" min="1" max="9" placeholder="Ej:3" type="number"></input>
            </div>
    </fieldset>
    <fieldset>
        <legend>Vendedor</legend>
            <select name="propiedad[vendedoresid]" id="">
                <option disabled selected value="">-Selecciona-</option>
                <?php  foreach($vendedores as $vendedor):  ?>
                <option 
                <?php echo $propiedad->vendedoresid === $vendedor->id ? "selected" : "" ?>
                 value="<?php echo escapa($vendedor->id)?>"><?php echo escapa($vendedor->nombre) . " " . escapa($vendedor->apellido);  ?></option>
                <?php endforeach;?>
            </select>
    </fieldset>




    