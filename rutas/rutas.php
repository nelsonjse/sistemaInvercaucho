<?php

 $rutes = [  
    "usuarios/perfil" =>[
        "controlador"=> "usuariosController",
        "metodo"=> "usuariosPerfil",
    ],
     "usuarios" => [
         "controlador" => "usuariosController",
         "metodo" => "listar",
     ],
     "usuarios/guardar" => [
         "controlador" => "usuariosController",
         "metodo" => "guardar",
     ],
     "usuarios/crear" => [
         "controlador" => "usuariosController",
         "metodo" => "crear",
     ],
     "usuarios/mostrar" => [
         "controlador" => "usuariosController",
         "metodo" => "mostrar",
     ],
     "usuarios/actualizar" => [
         "controlador" => "usuariosController",
         "metodo" => "actualizar",
     ],
     "usuarios/eliminar" => [
         "controlador" => "usuariosController",
         "metodo" => "eliminar",
     ],
     "usuarios/permisos" => [
        "controlador" => "usuariosController",
        "metodo" => "listarPermisos",
    ],
    "usuarios/registrarPermisos" => [
        "controlador" => "usuariosController",
        "metodo" => "registrarPermiso",
    ],
    // productos
     "productos" => [
         "controlador" => "productosController",
         "metodo" => "listar",
     ],
     "productos/crear" => [
         "controlador" => "productosController",
         "metodo" => "crear",
     ],
     "productos/guardar" => [
         "controlador" => "productosController",
         "metodo" => "guardar",
     ],
     "productos/mostrar" => [
         "controlador" => "productosController",
         "metodo" => "mostrar",
     ],
     "productos/actualizar" => [
         "controlador" => "productosController",
         "metodo" => "actualizar",
     ],
     "productos/eliminar" => [
         "controlador" => "productosController",
         "metodo" => "eliminar",
     ],
    // marcas
     "marcas" => [
         "controlador" => "marcasController",
         "metodo" => "listar",
     ],
     "marcas/crear" => [
         "controlador" => "marcasController",
         "metodo" => "crear",
     ],
     "marcas/guardar" => [
         "controlador" => "marcasController",
         "metodo" => "guardar",
     ],
     "marcas/mostrar" => [
         "controlador" => "marcasController",
         "metodo" => "mostrar",
     ],
     "marcas/actualizar" => [
         "controlador" => "marcasController",
         "metodo" => "actualizar",
     ],
     "marcas/eliminar" => [
         "controlador" => "marcasController",
         "metodo" => "eliminar",
     ],
    // proveedores
     "proveedores" => [
         "controlador" => "proveedoresController",
         "metodo" => "listar",
     ],
     "proveedores/crear" => [
         "controlador" => "proveedoresController",
         "metodo" => "crear",
     ],
     "proveedores/guardar" => [
         "controlador" => "proveedoresController",
         "metodo" => "guardar",
     ],
     "proveedores/mostrar" => [
         "controlador" => "proveedoresController",
         "metodo" => "mostrar",
     ],
     "proveedores/actualizar" => [
         "controlador" => "proveedoresController",
         "metodo" => "actualizar",
     ],
     "proveedores/eliminar" => [
         "controlador" => "proveedoresController",
         "metodo" => "eliminar",
     ],
    // Linea de producto

     "lineas" => [
         "controlador" => "lineasController",
         "metodo" => "listar",
     ],
     "lineas/crear" => [
         "controlador" => "lineasController",
         "metodo" => "crear",
     ],
     "lineas/guardar" => [
         "controlador" => "lineasController",
         "metodo" => "guardar",
     ],
     "lineas/mostrar" => [
         "controlador" => "lineasController",
         "metodo" => "mostrar",
     ],
     "lineas/actualizar" => [
         "controlador" => "lineasController",
         "metodo" => "actualizar",
     ],
     "lineas/eliminar" => [
         "controlador" => "lineasController",
         "metodo" => "eliminar",
     ],

    // Tipo de Vehiculo

     "vehiculos" => [ 
         "controlador" => "vehiculosController",
         "metodo" => "listar",
     ],
     "vehiculos/crear" => [
         "controlador" => "vehiculosController",
         "metodo" => "crear",
     ],
     "vehiculos/guardar" => [
         "controlador" => "vehiculosController",
         "metodo" => "guardar",
     ],
     "vehiculos/mostrar" => [
         "controlador" => "vehiculosController",
         "metodo" => "mostrar",
     ],
     "vehiculos/actualizar" => [
         "controlador" => "vehiculosController",
         "metodo" => "actualizar",
     ],
     "vehiculos/eliminar" => [
         "controlador" => "vehiculosController",
         "metodo" => "eliminar",
     ],
//Despacho
"despachos" => [
    "controlador" => "despachosController",
    "metodo" => "listar",
],
"despachos/mostrar" => [
   "controlador" => "despachosController",
   "metodo" => "mostrar",
],
"despachos/detalles" => [
    "controlador" => "despachosController",
    "metodo" => "detalles",
 ],
"despachos/crear" => [
    "controlador" => "despachosController",
    "metodo" => "crear",
],
"despachos/guardar" => [
   "controlador" => "despachosController",
   "metodo" => "guardar",
],
"despachos/actualizar" => [
    "controlador" => "despachosController",
    "metodo" => "actualizar",
],
"despachos/eliminar" => [
   "controlador" => "despachosController",
   "metodo" => "eliminar",
],
"despachos/eliminarProducto" => [
   "controlador" => "despachosController",
   "metodo" => "eliminarProducto",
],  
"despachos/actualizarCantidad" => [
    "controlador" => "despachosController",
    "metodo" => "actualizarCantidad",
],

     // INVENTARIO
     "inventarios" => [
         "controlador" => "inventariosController",
         "metodo" => "listar",
     ],
     "inventarios/guardar" => [
         "controlador" => "inventariosController",
         "metodo" => "guardar",
     ],
     "inventarios/crear" => [
         "controlador" => "inventariosController",
         "metodo" => "crear",
     ],
     "inventarios/mostrar" => [
         "controlador" => "inventariosController",
         "metodo" => "mostrar",
     ],
     "inventarios/actualizar" => [
         "controlador" => "inventariosController",
         "metodo" => "actualizar",
     ],
     "inventarios/eliminar" => [
         "controlador" => "inventariosController",
         "metodo" => "eliminar",
     ],
     //Login
     "login" => [
        "controlador" => "autorizacion",
        "metodo" => "login",
     ],
     "login/acceder" => [
        "controlador" => "autorizacion",
        "metodo" => "acceder",
     ],
     "logout" => [
        "controlador" => "autorizacion",
        "metodo" => "logout",
     ],
     "principal" => [
        "controlador" => "home",
        "metodo" => "principal",
     ],
     "home" => [
        "controlador" => "home",
        "metodo" => "home",
     ],
     "home2" => [
        "controlador" => "home",
        "metodo" => "home2",
     ],
     //Reportes
     "reporteProveedor" => [
        "controlador" => "proveedoresController",
        "metodo" => "reporte",
     ],
     "reporteInventario" => [
        "controlador" => "inventariosController",
        "metodo" => "reporte",
     ],
     "reporteDespacho" => [
        "controlador" => "despachosController",
        "metodo" => "reporte",
     ],
     "reporteDespachoDetalles" => [
        "controlador" => "despachosController",
        "metodo" => "reporteDetalles",
     ],
     "respaldo" => [
        "controlador" => "respaldo",
        "metodo" => "respaldo",
     ],
     "backup" => [
        "controlador" => "backup",
        "metodo" => "backup",
     ],
     "backup/respaldo" => [
        "controlador" => "backup",
        "metodo" => "respaldar",
     ],
     "backup/restaurar" => [
        "controlador" => "backup",
        "metodo" => "restaurar",
     ],
     "ayuda" => [
        "controlador" => "ayuda",
        "metodo" => "ayuda",
     ],
     "bitacora" => [
        "controlador" => "bitacora",
        "metodo" => "bitacora",
     ],
 ];

 function redirect($URL="principal"){ echo "<script> window.location.href='?pagina=".$URL."'; </script>"; }

?>