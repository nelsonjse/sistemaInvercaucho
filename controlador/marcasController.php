<?php





include("modelo/marcas.php");
require("vista/accesorios/vista.php");
require("vista/accesorios/error.php");

      function listar()
    {

        $marca = new marcas();
        $id_user = $_SESSION['id'];
        $id_rol = $_SESSION['rol'];
        $verificar = $marca->verificarPermiso($id_user, 'productos')->get(); 

    if(!empty($verificar) || $id_rol == 2){
        try{
        $marca = new marcas();
        $marcas = $marca->listar()->get(); 

        vista("marcas/marcas", [
            "marcas" => $marcas,
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

        $marca = new marcas();
        $id_user = $_SESSION['id'];
        $id_rol = $_SESSION['rol'];
        $verificar = $marca->verificarPermiso($id_user, 'productos')->get();  
    
        if(!empty($verificar) || $id_rol == 2){
        vista("marcas/marcasGuardar", [
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
        $marca = new marcas();
        $response = $marca->guardar([
            "nombreMarcas" => $_POST["nombreMarcas"],
        ]);       
        redirect("marcas");
    }catch(Exception $e){
            
        $mensaje = "error";   
        error($mensaje);
        }
    }
      function mostrar() 
    {
        try{
        $marca = new marcas();
        $marca = $marca->mostrar("id", $_GET["id"])->first2();
        vista("marcas/marcasActualizar", [
            "marca" => $marca,
        ]);
         }catch(Exception $e){
            
        $mensaje = "error";   
        error($mensaje);
        }
    }

      function actualizar()
    {
        try{
        $marca = new marcas();      
        $response = $marca->actualizar($_GET["id"], [
            "nombreMarcas" => $_POST["nombreMarcas"],
        ]);
        redirect("marcas");
        }catch(Exception $e){
            
        $mensaje = "error";   
        error($mensaje);
        }
        
    }

      function eliminar()
    {
        try{
        $marca = new marcas();
        $response = $marca->mostrar("id", $_GET["id"])->first();
        $response = $marca->eliminar($_GET["id"]);
        redirect("marcas");

    }catch(Exception $e){
            
        $mensaje = "error";   
        error($mensaje);
        }
    }





































//////////////////YO
// include("modelo/marcas.php");
// require("vista/accesorios/vista.php");
// require("vista/accesorios/error.php");

//       function listar()
//     {
//         try{
//         $marca = new marcas();
//         $marcas = $marca->listar()->get();

//         vista("marcas/marcas", [
//             "marcas" => $marcas,
//         ]);
//         }catch(Exception $e){
            
//         $mensaje = "listar";   
//         error($mensaje);
//         }
//     }

//       function crear()
//     {
//         vista("marcas/marcasGuardar", [
//             "texto" => "Guardar",
//         ]);
//     }

//       function guardar()
//     {
//         try{
//         $marca = new marcas();
//         $response = $marca->guardar([
//             "nombreMarcas" => $_POST["nombreMarcas"],
//         ]);       
//         redirect("marcas");
//     }catch(Exception $e){
            
//         $mensaje = "marcas/crear";   
//         error($mensaje);
//         }
//     }
//       function mostrar()
//     {
//         try{
//         $marca = new marcas();
//         $marca = $marca->mostrar("id", $_GET["id"])->first();
//         vista("marcas/marcasActualizar", [
//             "marca" => $marca,
//         ]);
//          }catch(Exception $e){
            
//         $mensaje = "marcas";   
//         error($mensaje);
//         }
//     }

//       function actualizar()
//     {
//         try{
//         $marca = new marcas();      
//         $response = $marca->actualizar($_GET["id"], [
//             "nombreMarcas" => $_POST["nombreMarcas"],
//         ]);
//         redirect("marcas");
//         }catch(Exception $e){
            
//         $mensaje = "marcas";   
//         error($mensaje);
//         }
        
//     }

//       function eliminar()
//     {
//         try{
//         $marca = new marcas();
//         $response = $marca->mostrar("id", $_GET["id"])->first();
//         $response = $marca->eliminar($_GET["id"]);
//         redirect("marcas");

//     }catch(Exception $e){
            
//         $mensaje = "marcas";   
//         error($mensaje);
//         }
//     }

?>