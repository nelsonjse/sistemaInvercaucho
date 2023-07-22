<?php

require("rutas/rutas.php");
//verificacion si la variable GET llamada "pagina" no viene en la url
require("controlador/autorizacion.php");

$page = isset($_GET["pagina"]) ? $_GET["pagina"] : false;
verificacion($page);

// si ese "ruta " no tiene metodo
if (!isset($rutes[$_GET["pagina"]]["metodo"])) {
       redirect("home");
       return;
}

// si no hay errores requiere el controlador y llama el "metodo"
       require_once("controlador/" . $rutes[$_GET["pagina"]]["controlador"] . ".php");
       call_user_func($rutes[$_GET["pagina"]]["metodo"]);
?>