<?php

require("modelo/inventario.php");
require("vista/accesorios/vista.php");
require("modelo/reportes/reporteInventario.php");
require("vista/accesorios/error.php");

      function listar() 
    {
    $inventario = new inventarios();
    $id_user = $_SESSION['id'];
    $verificar = $inventario->verificarPermiso($id_user, 'inventario')->get();   
  
    if(!empty($verificar)){
        try{
            $inventario = new inventarios();
            $inventarios = $inventario->listar()->get();            
            vista("inventario/inventario", [
                "inventarios" => $inventarios,  
                "values" => "inventarios"        
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

        $inventario = new inventarios();
        $id_user = $_SESSION['id'];
        $verificar = $inventario->verificarPermiso($id_user, 'inventario')->get();
        if(!empty($verificar)){

            $inventario = new inventarios();
            $productos = $inventario->listarProductos()->get();        
            $proveedores = $inventario->listarProveedores()->get(); 
            $lineas = $inventario->listarLinea()->get();
            vista("inventario/inventarioGuardar", [
                "productos"=>$productos,
                "proveedores"=>$proveedores,
                "lineas"=>$lineas,
                "texto" => "Guardar",
            ]);

        }else{
            $mensaje = "Acceso Denegado";   
         error($mensaje);
        }
        
    }
    
    function mostrar()
    {
        try{
        $inventario = new inventarios();
        $productos = $inventario->listarProductos()->get();
        $proveedores = $inventario->listarProveedores()->get(); 
        $inventario = $inventario->mostrar("id_inv", $_GET["id"])->first2();
        vista("inventario/inventarioActualizar", [
            "inventario" => $inventario,
            "productos"=>$productos,
            "proveedores"=>$proveedores,
        ]);
    }catch(Exception $e){
        $mensaje = "error";   
        error($mensaje);
        
    }
    }

      function guardar()
    {
        try{
        $inventario = new inventarios();
        $response = $inventario->save([
            "cantidad" => $_POST["cantidad"],
            "precio_unitario" => $_POST["precio_unitario"],
            "proveedores_id" => $_POST["proveedores_id"],
            "productos_id" => $_POST["productos_id"],
        ]);        
        redirect("inventarios");
    }catch(Exception $e){
        $mensaje = "error" ;   
        error($mensaje);
        
    }
    }


      function actualizar()
    {
        try{
        $inventario = new inventarios();        
        $response = $inventario->actualizar($_GET["id_inv"], [
            "cantidad" => $_POST["cantidad"],
            "precio_unitario" => $_POST["precio_unitario"],
            "proveedores_id" => $_POST["proveedores_id"],
            "productos_id" => $_POST["productos_id"],
        ]);
        redirect("inventarios");
    }catch(Exception $e){
            
        $mensaje = "error" ;   
        error($mensaje);
        
    }


        
    }

      function eliminar()
    {
        try{
        $inventario = new inventarios();
      
        $response = $inventario->mostrar("id_inv", $_GET["id"])->first();        
        $response = $inventario->eliminar($_GET["id"]);
        redirect("inventarios");
    }catch(Exception $e){
            
        $mensaje = "error" ;   
        error($mensaje);
        
    }
        
    }

    function reporte () {

        $inventario = new inventarios();
        $resultado = $inventario->reporte();
        $pdf = new PDF();
        $pdf-> AliasNbPages();
        $pdf->AddPage(); 

        $pdf->SetFont('Helvetica','',13); 
        $pdf->SetFillColor(236, 214, 214);
        $pdf->SetDrawColor(173, 0, 0);
        
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            $pdf->Cell(120, 10, ($row['nombreProducto'].' '.$row['nombreMarcas'].' '.$row['descripcion']) , 1, 0, 'C', 0);
            $pdf->Cell(30, 10, ($row['cantidad']), 1, 0, 'C', 0);
            $pdf->Cell(40, 10, (''.$row['precio_unitario']. ' Bs'), 1, 1, 'C', 0);
            
        }    
        
        $pdf->Output();   
    
    }

?>