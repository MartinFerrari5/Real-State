<?php

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REAL STATE</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
   
<?php include __DIR__ . '/../base/nos-model.php';
?>

    <section class="section-grid">
        <p class="section-title">Casas y Depas en Venta</p>
        <?php
        $limite=3; 
        require 'listado.php';
         ?>
        <a class="link-propiedad" data-cy="todas-prop" href="anuncios"><button >Ver Todas</button></a>
    </section> <!--FIN SECTION-->
    <section class="contacto">
        <h1>ENCUENTRA LA CASA DE TUS SUEÑOS</h1>
        <P>Llena el formulario de contacto y un asesor se pondrá en contacto
            contigo a la brevedad</P>
            <a href="contacto" data-cy="button-contacto" class="button-contacto">
                <button>Contactanos!</button>
            </a>
    </section> 
    <!--COMIENZO BLOG-->
    <div class="blog">
        <div class="conteiner">
            <section class="conteiner-first">
                <p class="blog-title">Nuestro Blog</p>
                <article class="blog-publi publi-first">
                    <picture  class='blog-pic'>
                        
                        <source class='blog-img' srcset='/public/build/img/blog1.webp' type='image/webp'>
                        <img class='blog-img' src='/public/build/img/blog1.jpg' alt='blog'>
                    </picture>
                    <div class="blog-info">
                        <a href="entrada.php">
                            <p class="blog-info-title">Terraza en el techo de tu casa</p>
                        </a>
                        <p class="author">Escrito el: <span>20/10/2021</span>por: <span>Admin</span> </p>
                        <p class="blog-description">Consejos intuitivos y sencillos de seguir para 
                            poder acceder a una hermosa vivienda
                        </p>
                    </div>
                </article>
                <article class="blog-publi publi-dos">
                    <picture class='blog-pic'>
                       
                        <source class='blog-img' srcset='/public/build/img/blog2.webp' type='image/webp'>
                        <img class='blog-img' src='/public/build/img/blog2.jpg' alt='blog'>
                    </picture>
                    <div class="blog-info">
                        <a href="entrada.php">
                            <p class="blog-info-title">Piscina con bellisima vista</p>
                        </a>
                        <p class="author">Escrito el: <span>20/10/2021</span>por: <span>Admin</span> </p>
                        <p class="blog-description">Acceda a uno de los mejores lujos que cualquier ser humano le 
                            gustaria adquirir
                        </p>
                    </div>
                </article>
            </section> <!--FIN BLOG FIRST-COLUMN-->

            <section class="conteiner-second">
                <p class="blog-title">Testimoniales</p>
                <div class="testimonio">
                    <div class="testimonio-words">
                        <div>
                            <img src="build/img/comilla.svg" alt="comilla">
                        </div>
                        <blockquote class="p-testimonio">El personal la verdad que se ha comportado
                            excelente!!! Volveremos pronto. Ademas parece ser que los precios
                            se comportan y fluctuan de acuerdo a un mercado apetecible entre partes.
                        </blockquote>
                    </div>
                        <p class="testimonio-author">-Tinxo</p>
                </div>
                
            </section>
        </div>
    </div>
    

