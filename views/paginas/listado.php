
<div class="propiedades">
    <?php foreach($propiedades as $propiedad) {?>
        
    <div class="anuncio" data-cy="anuncio">
        <picture class=''>
            <img loading="lazy" class='anuncio-img' src='imagenes/<?php echo $propiedad->imagen ?>' alt='anuncio1'>
        </picture>
        <div class="contenido-anuncio">
            <h3> <?php echo $propiedad->titulo?></h3>
            <p class="propiedad-description"><?php echo $propiedad->descripion?></p>
            <p class="precio"> <?php $propiedad->precio?></p>
            <ul class="rooms">
                <li><img src="build/img/icono_wc.svg" alt="room"><span><?php echo  $propiedad->wc?></span></li>
                <li><img src="build/img/icono_dormitorio.svg" alt="room"><span><?php echo  $propiedad->habitaciones?></span></li>
                <li><img src="build/img/icono_estacionamiento.svg" alt="room"><span><?php echo  $propiedad->estacionamiento?></span></li>
            </ul>
            <a data-cy="enlace-prop" href="propiedad?id=<?php echo  $propiedad->id?>" class="link-propiedad"><button>VER PROPIEDAD</button></a>
        </div>
    </div>
    <?php }?>
    
</div><!--FIN PRIMER ANUNCIO-->




