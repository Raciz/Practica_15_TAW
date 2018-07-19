<?php

//incluimos en esta seccion todo lo nesesario para el funcionamiento del sitio
require_once("controllers/controllerGrupo.php");
require_once("controllers/controllerCarrera.php");
require_once("controllers/controllerUsuario.php");
require_once("controllers/controllerAlumno.php");
require_once("controllers/controllerActividad.php");
require_once("controllers/controllerUnidad.php");
require_once("controllers/controller.php");
require_once("controllers/controllerTeacher.php");
require_once("controllers/controllerSession.php");
require_once("models/crudGrupo.php");
require_once("models/crudCarrera.php");
require_once("models/crudUsuario.php");
require_once("models/crudAlumno.php");
require_once("models/crudActividad.php");
require_once("models/crudUnidad.php");
require_once("models/crudTeacher.php");
require_once("models/crudSession.php");
require_once("models/crud.php");
require_once("models/url.php");

//creamos un objeto de mvcController
$MVC = new mvcController();

//y obtenemos el template
$MVC -> template();
?>



  

