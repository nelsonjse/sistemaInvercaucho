<?php

require("modelo/proveedores.php");
require("vista/accesorios/vista.php");
require("modelo/reportes/reporteProveedor.php");
require("vista/accesorios/error.php");


      function listar()
    {
        $proveedor = new proveedor();
        $id_user = $_SESSION['id'];
        $id_rol = $_SESSION['rol'];
        
        $verificar = $proveedor->verificarPermiso($id_user, 'proveedor')->get(); 

        if(!empty($verificar) || $id_rol == 2){
            try{
            $proveedor = new proveedor();
            $proveedores = $proveedor->listar()->get();

            vista("proveedores/proveedores", [
                "proveedores" => $proveedores,
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
        $proveedor = new proveedor();
        $id_user = $_SESSION['id'];
        $id_rol = $_SESSION['rol'];
        $verificar = $proveedor->verificarPermiso($id_user, 'proveedor')->get(); 

        if(!empty($verificar) || $id_rol == 2){
            vista("proveedores/proveedorGuardar", [
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
        $proveedor = new proveedor();

        $response = $proveedor->guardar([ 
            "nombres" => $_POST["nombre"],            
            "rif" => $_POST["rif"],
            "telefono" => $_POST["telefono"],
            "direccion" => $_POST["direccion"],
        ]);

        
    }catch(Exception $e){
            
        $mensaje = "error";   
        error($mensaje);
        }
    }

      function mostrar()
    {
        try{
        $proveedor = new proveedor();
        $proveedor = $proveedor->mostrar("id", $_GET["id"])->first();        
        
        // Crear un objeto con los datos del proveedor
        $proveedores = [
            "nombre" => $proveedor['nombres'],
            "rif" => $proveedor['rif'],
            "telefono" => $proveedor['telefono'],
            "direccion" => $proveedor['direccion'],
        ];
        // Devuelve los datos del proveedor como un objeto JSON
        echo json_encode($proveedores);
        // vista("proveedores/proveedorActualizar", [
        //     "proveedor" => $proveedor,
        // ]);
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

        $proveedor = new proveedor();       
        $response = $proveedor->actualizar($_POST["proveedor_id"], [
            "nombres" => $_POST["nombre"],            
            "rif" => $_POST["rif"],
            "telefono" => $_POST["telefono"],
            "direccion" => $_POST["direccion"],
        ]);
        
        redirect("proveedores");
    } else {
        
        $mensaje = "error";   
        error($mensaje);
    }
}


      function eliminar()
    {
        try{
        $proveedor = new proveedor();
        $response = $proveedor->mostrar("id", $_GET["id"])->first();       
        $response = $proveedor->eliminar($_GET["id"]);
        redirect("proveedores");
    }catch(Exception $e){
            
        $mensaje = "error";   
        error($mensaje);
        }
    }

    function reporte () {

        $proveedor = new proveedor();
        $resultado = $proveedor->reporte();
        $pdf = new PDF();
        $pdf-> AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Helvetica','',13);  
          
        $pdf->SetFillColor(236, 214, 214);
        $pdf->SetDrawColor(173, 0, 0);       
        
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $pdf->Cell(50, 10, ($row['rif']), 1, 0, 'C', 0);
            $pdf->Cell(80, 10, ($row['nombres']), 1, 0, 'C', 0);
            $pdf->Cell(60, 10, ($row['telefono']), 1, 1, 'C', 0);
        }    
    
        $pdf->Output();   
    
    }

?>