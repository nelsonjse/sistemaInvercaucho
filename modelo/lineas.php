<?php

if(!class_exists("bd")) require("modelo/bd.php");


class lineas extends bd { 

    private $data;
    
    public function listar() {  
       
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `linea_productos`");
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
        
    }

    public function mostrar($key, $value){
        
        $conexion = $this->conexion();
        $sql = $conexion->prepare("SELECT * FROM `linea_productos` WHERE `$key` = $value");
        $sql->execute();
        $this->data = $sql->fetchAll();
        return $this;
        
    }
    
    public function  guardar($data){
        
        $conexion = $this->conexion();

        $sql = $conexion->query("SELECT count(*) FROM `linea_productos` WHERE `nombreProducto`='".$data["nombreProducto"]."'");
        
        if ($sql->fetchColumn() > 0) {
        $mensaje="lineas/crear";
        error($mensaje);

        die();
        }else{
            $conexion = $this->conexion();  
            $sql= $this->data = $conexion->query("INSERT INTO `linea_productos` (`id`, `nombreProducto`) VALUES 
            (NULL,        
            '".$data["nombreProducto"]."');");
            return $this->data;
        }
    }
    
    public function eliminar($id){
        
        $conexion = $this->conexion();
        
        $sql= $conexion->prepare("DELETE FROM linea_productos WHERE id=:id");
        $sql->bindParam(':id', $id);
        $response = $sql->execute();
        return $response;   
          
    }
    
    public function actualizar($id, $data){
        
        $conexion = $this->conexion();

        $sql= $conexion->prepare("UPDATE linea_productos SET nombreProducto=:nombreProducto WHERE id=:id");
        
        $sql->bindParam(':id',$id);
        $sql->bindParam(':nombreProducto',$data['nombreProducto']);
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