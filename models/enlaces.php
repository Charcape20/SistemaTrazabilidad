<?php
    class EnlacesModels{
        public function enlacesModel($enlaces){

            if($enlaces == "inicio" ||
               $enlaces == "ingreso" ||
               $enlaces == "documento" ||
               $enlaces == "perfil" ||
               $enlaces == "salir"){
    
                $module = "views/modules/".$enlaces.".php";
            }	
    
            else if($enlaces == "index"){
                $module = "views/modules/ingreso.php";
            }

            else if($enlaces == "usuario"){
                $module = "views/modules/usuario/".$enlaces.".php";
            }
    
            else{
                $module = "views/modules/ingreso.php";		
            }
    
            return $module;
    
        }
    }