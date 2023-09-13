<?php

require("modelo/cliente.php");
require("vista/accesorios/vista.php");
//require("modelo/reportes/reportecliente.php");
require("vista/accesorios/error.php");


      function listar()
    {
        $cliente = new cliente();
        $id_user = $_SESSION['id'];
        $id_rol = $_SESSION['rol'];
        $verificar = $cliente->verificarPermiso($id_user, 'cliente')->get(); 

        if(!empty($verificar) || $id_rol == 2){
            try{
            $cliente = new cliente();
            $clientes = $cliente->listar()->get();

            vista("clientes/clientes", [
                "clientes" => $clientes,
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
        $cliente = new cliente();
        $id_user = $_SESSION['id'];
        $id_rol = $_SESSION['rol'];
        $verificar = $cliente->verificarPermiso($id_user, 'cliente')->get(); 

        if(!empty($verificar) || $id_rol == 2){
            vista("clientes/clientesGuardar", [
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
        $cliente = new cliente();

        $response = $cliente->guardar([ 
            "nombres" => $_POST["nombre"],            
            "rif" => $_POST["rif"],
            "direccion" => $_POST["direccion"],
        ]);

        redirect("clientes");
    }catch(Exception $e){
            
        $mensaje = "error";   
        error($mensaje);
        }
    }

      function mostrar()
    {
        try{
        $cliente = new cliente();
        $cliente = $cliente->mostrar("id", $_GET["id"])->first();
        vista("clientes/clientesActualizar", [
            "cliente" => $cliente,
        ]);
    }catch(Exception $e){
            
        $mensaje = "error";   
        error($mensaje);
        }
    }

      function actualizar()
    {
        try{
        $cliente = new cliente();       
        $response = $cliente->actualizar($_GET["id"], [
            "nombre" => $_POST["nombre"],            
            "rif" => $_POST["rif"],
            "direccion" => $_POST["direccion"],
        ]);
        redirect("clientes");
    }catch(Exception $e){
            
        $mensaje = "error";   
        error($mensaje);
        }
        
    }

      function eliminar()
    {
        try{
        $cliente = new cliente();
        $response = $cliente->mostrar("id", $_GET["id"])->first();       
        $response = $cliente->eliminar($_GET["id"]);
        redirect("clientes");
    }catch(Exception $e){
            
        $mensaje = "error";   
        error($mensaje);
        }
    }

    function reporte () {

        $cliente = new cliente();
        $resultado = $cliente->reporte();
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