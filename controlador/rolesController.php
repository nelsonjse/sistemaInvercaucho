<?php

require("modelo/roles.php");
require("vista/accesorios/vista.php");
require("vista/accesorios/error.php");


      function listar()
    {
        $rol = new rol();
        $id_user = $_SESSION['id'];
        $id_rol = $_SESSION['rol'];
        $verificar = $rol->verificarPermiso($id_user, 'rol')->get(); 

        if(!empty($verificar) || $id_rol == 2){
            try{
            $rol = new rol();
            $roles = $rol->listar()->get();

            vista("usuario/roles", [
                "roles" => $roles,
                "texto" => "",
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
        $rol = new rol();
        $id_user = $_SESSION['id'];
        $id_rol = $_SESSION['rol'];
        $verificar = $proveedor->verificarPermiso($id_user, 'rol')->get(); 

        if(!empty($verificar) || $id_rol == 2){
            vista("usuario/roles", [
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
        $rol = new rol(); 

        $response = $rol->guardar([ 
            "descripcion" => $_POST["descripcion"],            
            
        ]);
        redirect("roles");
    }catch(Exception $e){
            
        $mensaje = "error";   
        error($mensaje);
        }
    }

      function mostrar()
    {
        try{
        $rol = new rol();
        $rol = $rol->mostrar("id_r", $_GET["id"])->first();        
        
        
        $roles = [
            "descripcion" => $rol['descripcion'],            
        ];
        
        echo json_encode($roles);
        
    }catch(Exception $e){
            
        $mensaje = "error";   
        error($mensaje);
        }
    }

    //   function actualizar()
    // {
    //     try{
    //     $proveedor = new proveedor();       
    //     $response = $proveedor->actualizar($_GET["id"], [
    //         "nombres" => $_POST["nombre"],            
    //         "rif" => $_POST["rif"],
    //         "telefono" => $_POST["telefono"],
    //         "direccion" => $_POST["direccion"],
    //     ]);
    //     redirect("proveedores");
    // }catch(Exception $e){
            
    //     $mensaje = "error";   
    //     error($mensaje);
    //     }


        
    // }

    function actualizar() 
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $rol = new rol();       
        $response = $rol->actualizar($_POST["rol_id"], [
            "descripcion" => $_POST["descripcion"],            
            
        ]);
        
        
    } else {
        
        $mensaje = "error";   
        error($mensaje);
    }
}


      function eliminar()
    {
        try{
        $rol = new rol();
        $response = $rol->mostrar("id_r", $_GET["id"])->first();       
        $response = $rol->eliminar($_GET["id"]);
        redirect("roles");
    }catch(Exception $e){
            
        $mensaje = "error";   
        error($mensaje);
        }
    }


?>