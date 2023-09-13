<?php
include("modelo/vehiculos.php");
require("vista/accesorios/vista.php");
require("vista/accesorios/error.php");


      function listar()
    {
        $vehiculo = new vehiculos();
        $id_user = $_SESSION['id'];
        $id_rol = $_SESSION['rol'];
        $verificar = $vehiculo->verificarPermiso($id_user, 'productos')->get(); 

    if(!empty($verificar) || $id_rol == 2){
        try{
        $vehiculo = new vehiculos();
        $vehiculos = $vehiculo->listar()->get();

        vista("tipoVehiculo/vehiculo", [
            "vehiculos" => $vehiculos,
        ]);
        }catch(Exception $e){           
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
        $vehiculo = new vehiculos();
        $id_user = $_SESSION['id'];
        $id_rol = $_SESSION['rol'];
        $verificar = $vehiculo->verificarPermiso($id_user, 'productos')->get(); 

    if(!empty($verificar) || $id_rol == 2){
        vista("tipoVehiculo/vehiculosGuardar", [
            "texto" => "Guardar",
        ]);
    }else{
        $mensaje = "Acceso Denegado";   
        error($mensaje);        
    }  
    }

      function guardar()
    {
        try{
        $vehiculo = new vehiculos();
        $response = $vehiculo->guardar([
            "nombreVehiculo" => $_POST["nombreVehiculo"],
        ]); 
        redirect("vehiculos");
    }catch(Exception $e){
            
        $mensaje = "error";   
        error($mensaje);
        }
    }
      function mostrar()
    {
        try{
        $vehiculo = new vehiculos();
        $vehiculo = $vehiculo->mostrar("id", $_GET["id"])->first();
        vista("tipoVehiculo/vehiculosActualizar", [
            "vehiculo" => $vehiculo,
        ]);
    }catch(Exception $e){
            
        $mensaje = "error";   
        error($mensaje);
        }
    }

      function actualizar()
    {
        try{
        $vehiculo = new vehiculos();
        $response = $vehiculo->actualizar($_GET["id"], [
            "nombreVehiculo" => $_POST["nombreVehiculo"],
        ]);
        redirect("vehiculos");
    }catch(Exception $e){
            
        $mensaje = "error";   
        error($mensaje);
        }
    }

      function eliminar()
    {
        try{
        $vehiculo = new vehiculos();
        $response = $vehiculo->mostrar("id", $_GET["id"])->first();        
        $response = $vehiculo->eliminar($_GET["id"]);
        redirect("vehiculos");
    }catch(Exception $e){
            
        $mensaje = "error";   
        error($mensaje);
        }
    }

?>