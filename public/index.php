<?php
require __DIR__ . "/../includes/app.php";
 require __DIR__ . '/../controllers/propiedadController.php';
 require __DIR__ . '/../controllers/paginasController.php';

use MVC\Router;
use Controllers\propiedadController;
use Controllers\vendedorController;
use Controllers\paginasController;
use Controllers\loginController;
$router=new Router();

// propiedadController::class = Controllers\propiedadController
//  index,crear,actualizar n= metodos

/****************** PROPIEDADES ******************/
$router->get('/admin', [propiedadController::class, 'index']);

$router->get('/propiedades/crear', [propiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [propiedadController::class, 'actualizar']);

$router->post('/propiedades/crear', [propiedadController::class, 'crear']);
$router->post('/propiedades/actualizar', [propiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [propiedadController::class, 'eliminar']);

/******************** VENDEDORES *******************/
$router->get('/vendedores/crear', [vendedorController::class, 'crear']);
$router->post('/vendedores/crear', [vendedorController::class, 'crear']);

$router->get('/vendedores/actualizar', [vendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [vendedorController::class, 'actualizar']);

$router->post('/vendedores/eliminar', [vendedorController::class, 'eliminar']);

/***********VISTA CLIENTES************/
$router->get("/index", [paginasController::class, 'index'] );
$router->get("/nosotros", [paginasController::class, 'nosotros'] );
$router->get("/anuncios", [paginasController::class, 'anuncios'] );
$router->get("/propiedad", [paginasController::class, 'anuncios'] );
$router->get("/blog", [paginasController::class, 'blog'] );
$router->get("/contacto", [paginasController::class, 'contacto'] );
$router->post("/contacto", [paginasController::class, 'contacto'] );


/***************LOG-IN****************/
$router->get("/login", [loginController::class, 'login']);
 $router->post("/login",[loginController::class, 'login']);
$router->get("/logout",[loginController::class, 'logout']);

$router->comprobarRutas();