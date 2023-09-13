<?php

require("modelo/bd.php");


class vehiculos extends bd {

    private $data;
    
    public function listar() {  
        
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `tipo_vehiculos`");
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
        
    }

    public function mostrar($key, $value){
        
        $conexion = $this->conexion();
        $sql = $conexion->prepare("SELECT * FROM `tipo_vehiculos` WHERE `$key` = $value");
        $sql->execute();
        $this->data = $sql->fetchAll();
        return $this;
        
    }
    
    public function  guardar($data){ 
        $conexion = $this->conexion();
        $sql = $conexion->query("SELECT count(*) FROM `tipo_vehiculos` WHERE `nombreVehiculo`='".$data["nombreVehiculo"]."'");
        
        if ($sql->fetchColumn() > 0) {
        
        $mensaje="vehiculos/crear";
        error($mensaje);

        die();
        }else{


        $conexion = $this->conexion();
        $this->data = $conexion->query("INSERT INTO `tipo_vehiculos` (`id`, `nombreVehiculo`) VALUES 
        (NULL,
        
        '".$data["nombreVehiculo"]."');");

       return $this->data;
        }
    }
    
    public function eliminar($id){
        
        $conexion = $this->conexion();
        
        $sql= $conexion->prepare("DELETE FROM tipo_vehiculos WHERE id=:id");
        $sql->bindParam(':id', $id);
        $response = $sql->execute();
        return $response; 
             
    }
    
    public function actualizar($id, $data){
        
        $conexion = $this->conexion();

        $sql= $conexion->prepare("UPDATE tipo_vehiculos SET nombreVehiculo=:nombreVehiculo WHERE id=:id");
        
        $sql->bindParam(':id',$id);
        $sql->bindParam(':nombreVehiculo',$data['nombreVehiculo']);
       $response = $sql->execute();
       return $response;        
        
    }
    
    public function get(){
        return $this->data;
    }


    public function first(){
        return empty($this->data)?false:$this->data[0];
    }

    public function verificarPermiso(int $id_user, string $nombre){

        $conexion = $this->conexion();
        $sql = $conexion->prepare("SELECT permisos.id, permisos.permiso, detalle_permisos.id_usuario, detalle_permisos.id_permiso FROM permisos  INNER JOIN detalle_permisos  ON permisos.id = detalle_permisos.id_permiso WHERE detalle_permisos.id_usuario = $id_user AND permisos.permiso = '$nombre'");

        $sql->execute();
        $this->data = $sql->fetchAll();
        return $this;

    }

}
?>