<?php

require("vista/accesorios/vista.php");
require("vista/accesorios/error.php");
require("modelo/bitacora.php");

function bitacora(){ 
    $registro = new registros();
    $id_user = $_SESSION['id'];
    $id_rol = $_SESSION['rol'];
    $verificar = $registro->verificarPermiso($id_user, 'bitacora')->get();  

    if(!empty($verificar) || $id_rol == 2){

    try{        

        $registro = new registros();
        $registros = $registro->listar()->get();

        vista("bitacora/bitacora", [
            "registros" => $registros,
        ]);
        }
        catch(Exception $e){
            
            $mensaje = "bitacora";   
            error($mensaje);
        }
        }else{
            $mensaje = "Acceso Denegado";   
            error($mensaje);        
        }  

    
    
    
   }

?>