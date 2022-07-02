<?php
if(!isset($_SESSION['logIn'])){
    session_start();
   
}
$auth=$_SESSION['logIn']??false;
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
    <header class=" alterno">
        <div class="barra">
            <div class="barra_img">
                <a href="/index.php">
                    <img src="/build/img/logo.svg" alt="logotipo">
                </a>
            </div>
            <div class="burguer">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <line x1="4" y1="6" x2="20" y2="6" />
                    <line x1="4" y1="12" x2="20" y2="12" />
                    <line x1="4" y1="18" x2="20" y2="18" />
                  </svg>
            </div>
            <div class="flex-links-moon">
                <nav class="links">
                    <a href="/nosotros.php" class="barra_link">Nosotros</a>
                    <a href="/anuncios.php" class="barra_link">Anuncios</a>
                    <a href="/blog.php" class="barra_link">Blog</a>
                    <a href="/contacto.php" class="barra_link">Contacto</a>
                    <?php if($auth) :?>
                            <a href="/cerrar-sesion.php" class="barra_link">Cerrar Sesión</a>
                            <?php endif; ?>
                </nav>
                <div class="obscuro">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-moon" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                    </svg>
                </div>
        </div>
    </header>