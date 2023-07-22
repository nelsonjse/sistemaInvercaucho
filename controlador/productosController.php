<?php
include("modelo/productos.php");
require("vista/accesorios/vista.php");
require("vista/accesorios/error.php");



      function listar()
    {

        $producto = new productos();
        $id_user = $_SESSION['id'];
        $verificar = $producto->verificarPermiso($id_user, 'productos')->get(); 

    if(!empty($verificar)){
            $producto = new productos();
            $productos = $producto->listar()->get();
            vista("productos/producto", [
                "productos" => $productos,
                "values" => "productos"
            ]);
            die();
            }else{
                $mensaje = "Acceso Denegado";   
                error($mensaje);        
            }   
        }
      function crear()
    {
        $producto = new productos();
        $id_user = $_SESSION['id'];
        $verificar = $producto->verificarPermiso($id_user, 'productos')->get(); 
        if(!empty($verificar)){
            $producto = new productos();
            $marcas = $producto->listarMarcas()->get();
            $lineas = $producto->listarLineas()->get();
            $vehiculos = $producto->listarVehiculos()->get();
            vista("productos/productoGuardar", [
                "vehiculos" => $vehiculos,
                "marcas" => $marcas,
                "lineas" => $lineas,
                "texto" => "Guardar",
            ]);
        }else{
            $mensaje = "Acceso Denegado";   
            error($mensaje);        
        }  
    }

      function mostrar()
    {
        $producto = new productos();
        $lineas = $producto->listarLineas()->get();
        $marcas = $producto->listarMarcas()->get();
        $vehiculos = $producto->listarVehiculos()->get();

        $producto = $producto->mostrar("id_pro", $_GET["id_pro"])->first2();
            vista("productos/productoActualizar", [
            "producto" => $producto,
            "marcas" => $marcas,
            "lineas" => $lineas,
            "vehiculos" => $vehiculos,

        ]);
        die();
        
    }

      function guardar() 
    {
        $producto = new productos();

        $response = $producto->guardar([
            
            "descripcion" => $_POST["descripcion"],
            "marcas_id" => $_POST["marcas_id"],
            "tipo_vehiculos_id" => $_POST["tipo_vehiculos_id"],
            "linea_productos_id" => $_POST["linea_productos_id"],
        ]);
        if (!$response) {
            alerta("Producto no guardado");
            redirect("productos");

            die();
        }
        redirect("productos");
        die();
    }

      function actualizar()
    {
        $producto = new productos();
        if (!isset($_GET["id_pro"])) {
            alerta("Id no existe");
            redirect("productos");
        }
      
        if (!$producto->mostrar("id_pro", $_GET["id_pro"])->first2()) {
            alerta("Producto no existe");
            redirect("productos");
        }
        $response = $producto->actualizar($_GET["id_pro"], [
                       
            "descripcion" => $_POST["descripcion"],
            "marcas_id" => $_POST["marcas_id"],
            "tipo_vehiculos_id" => $_POST["tipo_vehiculos_id"],
            "linea_productos_id" => $_POST["linea_productos_id"],
        ]);
            
        if (!$response) {
            alerta("Producto no actualizado");
            redirect("productos");
        }

        redirect("productos");


    }
      function eliminar()
    {
        $producto = new productos();
        $response = $producto->mostrar("id_pro", $_GET["id_pro"])->first();
        if (!$response) {
            echo json_encode([
                "status" => true,
                "code" => 404,
                "message" => "Producto no encontrado!!"
            ]);
            die();
        }
        $response = $producto->eliminar($_GET["id_pro"]);

        if (!$response) {
            alerta("Producto no eliminado");
            redirect("productos");

            die();
        }
        
        redirect("productos");

        die();
    }

?>