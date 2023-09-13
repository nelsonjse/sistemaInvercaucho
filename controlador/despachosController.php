<?php

require("modelo/despachos.php");
require("modelo/cliente.php");
require("modelo/productos.php");
require("modelo/marcas.php");
require("modelo/inventario.php");
require("vista/accesorios/vista.php");
require("modelo/reportes/reporteDespacho.php");

require("vista/accesorios/error.php");
require("vista/accesorios/confirm.php");

function listar(){

    $despacho = new despachos();
    $id_user = $_SESSION['id'];
    $id_rol = $_SESSION['rol'];
    $verificar = $despacho->verificarPermiso($id_user, 'despacho')->get(); 

    if(!empty($verificar) || $id_rol == 2){
        $inventario = new inventarios();
        $inventarios = $inventario->listar()->get();
        $despacho = new despachos();
        $despachos = $despacho->listar()->get();  

        vista("despacho/despachos", [
            "despachos" => $despachos,
            "inventarios" => $inventarios,
        ]);
        die();
    }else{
        $mensaje = "Acceso Denegado";   
        error($mensaje);        
    }  
}


    function mostrar(){
        $inventario = new inventarios();
        $inventarios = $inventario->listar()->get();
        $despacho = new despachos();
        $despachos = $despacho->listar()->get();
        
        vista("despacho/despachos", [
            "despachos" => $despachos, 
            "inventarios" => $inventarios, 
            "values" => "despachos"         
        ]);
        die();
    }

    function detalles(){
        $despacho = new despachos();
        $id_user = $_SESSION['id'];
        $id_rol = $_SESSION['rol'];
        $verificar = $despacho->verificarPermiso($id_user, 'despacho')->get(); 
    
        if(!empty($verificar || $id_rol == 2)){
        $despacho = new despachos();
        if (!isset($_GET["id"])) {alerta("Id no existe"); redirect("despachos");}
        $despachos = $despacho->detalles("id", $_GET["id"])->first()->get();
        if (!$despacho) {alerta("Producto no existe"); redirect("despachos"); }
        //////
        $response = $despachos['id'];
        $productos = $despacho->productosDetalles($response)->get();
        
                
        vista("despacho/despachoDetalles", [
            "despachos" => $despachos,             
            "productos" => $productos   
        ]);
    }else{
        $mensaje = "Acceso Denegado";   
        error($mensaje);        
    }  
    
}
// function listarPorCliente(){
//     $despacho = new despachos();
//     $despachos = $despacho->listar("cedula_cliente", $_GET["cedula_cliente"])->get();
//     vista("despacho/despachos", [
//         "despachos" => $despachos,
//         "values" => "despachos"
//     ]);
//     die();
// }

function crear(){
    $despacho = new despachos();
    $id_user = $_SESSION['id'];
    $id_rol = $_SESSION['rol'];
    $verificar = $despacho->verificarPermiso($id_user, 'despacho')->get(); 

    if(!empty($verificar) || $id_rol == 2){
    $inventario = new inventarios();
    $despacho = new despachos();
    $cliente = new cliente();
    $despachos = $despacho->listar()->get();
    $clientes = $cliente->listar()->get();

    vista("despacho/despachoCrear", [
        "productos" => $inventario->listar()->get(),
        "clientes" => $cliente->listar()->get(),
        "despachos" => $despachos,
    ]);
}else{
    $mensaje = "Acceso Denegado";   
    error($mensaje);        
}  
}

function guardar() {

    $despacho = new despachos();
    $productos = new productos();
    $inventario = new inventarios();

    $POST = json_decode(file_get_contents('php://input'));
    $orden_id = $despacho->guardar([
        "usuario" => $POST->usuario,
        "cliente_fk"=>$POST->clientId,
    ]);

    if (!$orden_id) {
        alerta("despacho no guardado");
        die();
    }
    
    //Variable para saber si algun producto no se guardo, incrementara!
    $cont_errors = 0;

    //Recorrido de los productos recibidos para guardarlos en la base de datos
    foreach ($POST->productos as $producto) {

        //Consultando un producto para saber si exite en la base de datos
        if (!$productos->mostrar("id_pro", $producto->id_pro)->first()->get()) {
            $cont_errors = ($cont_errors + 1);
            return;
        }

        //Agregando el producto existente en la base de datos
        $response = $despacho->agregarProducto([
            "orden_despachos_id" => $orden_id,
            "productos_id" => $producto->id_pro,
            "cantidad" => $producto->agregado,
        ]);

        //En caso de que un producto no se haya guardado, el contador "$cont_errors" incrementara!
        if (!$response) {
            $cont_errors = ($cont_errors + 1);
            return;
        }

        $cantidadRestada = $inventario->restarInventario($producto->id_pro, $producto->agregado);

        if (!$cantidadRestada) {
                $cont_errors = ($cont_errors + 1);
                return;
            }
        }

        //En caso de que todo haya salido bien, retorna respuesta positiva "200"
        echo json_encode([
            "data" => $response,
            "code" => 200,
            "errors" => $cont_errors,
            "status" => false,
            "message" => "productos agregados a la orden!"
        ]);
        die();
}

function actualizar(){
    $despacho = new despachos();

    if (!isset($_GET["id"])) {
        alerta("id no existe");
        redirect("despachos");
    }

    if (!$despacho->listar("id", $_GET["id"])->first()) {
        alerta("despacho no existe");
        redirect("despachos");
    }

    $response = $despacho->actualizar($_GET["id"], [
        "descripcion" => $_POST["descripcion"],
        "estado" => $_POST["estado"] ?? "pendiente",
    ]);

    if (!$response) {
        alerta("despacho no actualizada");
        redirect("despachos");
    }

    redirect("despachos");
    alerta("despacho actualizado correctamente!");
}

function eliminar(){
    $despacho = new despachos();
    $response = $despacho->mostrar("id", $_GET["id"])->first();
    if (!$response->get()) {
        echo json_encode([
            "status" => true,
            "code" => 404,
            "message" => "despacho no encontrado"
        ]);
        die();
    }
    $response = $despacho->eliminar($_GET["id"]);
    if (!$response) {
        alerta("despacho no eliminado");
        redirect("despachos");
        die();
    }
    $mensaje = "despachos";
    confirmar($mensaje); 
    // redirect("despachos");
    die();
}

function eliminarProducto(){

    $despacho = new despachos();
    $producto = $despacho->buscarProducto("id", $_GET["id"])->first();

    if (!$producto->get()) {
        echo json_encode([
            "status" => true,
            "code" => 404,
            "message" => "producto no encontrado"
        ]);
        die();
    }

    $response = $producto->eliminarProducto();

    if (!$response) {
        echo json_encode([
            "data" => $response,
            "code" => 400,
            "status" => false,
            "message" => "producto no eliminado"
        ]);
        die();
    }

    echo json_encode([
        "data" => $response,
        "code" => 200,
        "status" => false,
        "message" => "producto eliminado!"
    ]);
    die();
}

function actualizarCantidad(){
    $despacho = new despachos();

    $producto = $despacho->buscarProducto("id", $_GET["id"])->first();

    if (!$producto->get()) {
        echo json_encode([
            "status" => true,
            "code" => 404,
            "message" => "producto no encontrado"
        ]);
        die();
    }

    $response = $producto->actualizarProducto($_GET["id"], [
        "cantidad" => $_GET["cantidad"]
    ]);

    if (!$response) {
        echo json_encode([
            "data" => $response,
            "code" => 400,
            "status" => false,
            "message" => "producto no actualizado"
        ]);
        die();
    }

    echo json_encode([
        "data" => $response,
        "code" => 200,
        "status" => false,
        "message" => "producto actualizado!"
    ]);
    die();
}

function reporte(){
    
    $despacho = new despachos();
    $resultado = $despacho->reporte();
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Helvetica', '', 13);

    $pdf->SetFillColor(236, 214, 214);
    $pdf->SetDrawColor(173, 0, 0);

    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $pdf->Cell(40, 10, '00'.($row['id']), 1, 0, 'C', 0);
        $pdf->Cell(50, 10, ($row['usuario']), 1, 0, 'C', 0);
        $pdf->Cell(50, 10, ($row['estado']), 1, 0, 'C', 0);
        $pdf->Cell(50, 10, ($row['create_ad']), 1, 1, 'C', 0);
    }

    $pdf->Output();
}


function reporteDetalles(){
    
    $despacho = new despachos();
    if (!isset($_GET["id"])) {alerta("Id no existe"); redirect("despachos");}
    $despachos = $despacho->detalles("id", $_GET["id"])->first()->get();
    if (!$despacho) {alerta("Producto no existe"); redirect("despachos"); }
    //////
    $response = $despachos['id'];
    $productos = $despacho->productosDetalles($response)->get();

    // $despacho = new despachos();
    // $resultado = $despacho->reporte();
    $pdf = new PDF2();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Helvetica', '', 13);

    $pdf->SetFillColor(236, 214, 214);
    $pdf->SetDrawColor(173, 0, 0);

    foreach ($productos as $producto) {
        $pdf->Cell(40, 10, ($producto['productos_id']), 1, 0, 'C', 0);
        $pdf->Cell(100, 10, ($producto['nombreProducto']).' '.($producto['nombreMarcas']).' '.($producto['descripcion']), 1, 0, 'C', 0);
        $pdf->Cell(50, 10, ($producto['cantidad']), 1, 1, 'C', 0);
        
    }

    $pdf->Output();
}