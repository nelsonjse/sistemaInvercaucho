<?php

require_once('modelo/bd.php');



class vehiculo extends bd{
    
    function guardar($nombre){
		$conexion = $this->conexion();
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
		 $response = "200" ;
		   
		   return "CODIGO ".$response." GUARDADO";
		}	
		catch(Exception $e){
			return $e->getMessage();
		}
		
	}
} 
?>