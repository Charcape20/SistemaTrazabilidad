<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:ingreso");

	exit();

}

include "views/modules/menu.php";
include "views/modules/cabezote.php";
include "views/modules/cuerpo.php";

?>

<!--=====================================
INICIO       
======================================-->


<!--====  Fin de INICIO  ====-->