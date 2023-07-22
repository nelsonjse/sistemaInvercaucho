<?php

require("vista/accesorios/vista.php");

function ayuda(){ 


    vista("ayudas/ayuda", [
        "reportes" => "",
        "texto" => "",
    ]);
    
    
   }

?>