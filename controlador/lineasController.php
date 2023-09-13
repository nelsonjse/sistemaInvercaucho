<?php
include("modelo/lineas.php");
require("vista/accesorios/vista.php");
require("vista/accesorios/error.php");




      function listar()
    {
    $linea = new lineas();
    $id_user = $_SESSION['id'];
    $id_rol = $_SESSION['rol'];
    $verificar = $linea->verificarPermiso($id_user, 'productos')->get();  

    if(!empty($verificar) || $id_rol == 2){
        try{
        $linea = new lineas();
        $lineas = $linea->listar()->get();

        vista("lineaProducto/linea", [
            "lineas" => $lineas,
        ]);
        }
        catch(Exception $e){
            
            $mensaje = "listar";   
            error($mensaje);
        }
    }else{
        $mensaje = "Acceso Denegado";   
        error($mensaje);        
    }       
    }

      function crear()
    {
        $linea = new lineas();
        $id_user = $_SESSION['id'];
        $id_rol = $_SESSION['rol'];
        $verificar = $linea->verificarPermiso($id_user, 'productos')->get();  
    
        if(!empty($verificar) || $id_rol == 2){
        vista("lineaProducto/lineaGuardar", [
            "texto" => "Guardar",
        ]);
        }else{
        $mensaje = "Acceso Denegado";   
        error($mensaje);        
        }    
    }

      function guardar()
    { try{
        $linea = new lineas();
        $response = $linea->guardar([
            "nombreProducto" => $_POST["nombreProducto"],
        ]);
        redirect("lineas");
        }catch(Exception $e){            
            $mensaje = "error" ;   
             error($mensaje);
            
        }
    }
      function mostrar()
    {
        try{
        $linea = new lineas();
        $linea = $linea->mostrar("id", $_GET["id"])->first();
        vista("lineaProducto/lineaActualizar", [
            "linea" => $linea,
        ]);
        }
        catch(Exception $e){
            
            $mensaje = "error";   
        error($mensaje);
            
        }
    }

      function actualizar()
    { 
        try{
        $linea = new lineas();  
        
        $response = $linea->actualizar($_GET["id"], [
            "nombreProducto" => $_POST["nombreProducto"],
        ]);
        redirect("lineas");
    }catch(Exception $e){
            
        $mensaje = "error" ;   
        error($mensaje);
        
    }
        
        
        
        
    }

      function eliminar()
    {
        try{
        $linea = new lineas();
        $response = $linea->mostrar("id", $_GET["id"])->first();        
        $response = $linea->eliminar($_GET["id"]);     
        
        redirect("lineas");
        }catch(Exception $e){
            
            $mensaje = "error" ;   
            error($mensaje);
            
        }
        
    }

?>

