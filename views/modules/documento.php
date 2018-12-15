<?php
session_start();

if(!$_SESSION["validar"]){
    header("Location:ingreso");
    exit();
}

include "views/modules/menu.php";
include "views/modules/cabezote.php";

?>

<div class="documento">
    <div>
        
    </div>

</div>