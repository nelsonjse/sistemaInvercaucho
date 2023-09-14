<?php

 require("modelo/bd.php");


 class proveedor extends bd {

     private $data;
    
     public function listar() {  
        
         $conexion = $this->conexion();
         $response = $conexion->prepare("SELECT * FROM `proveedores`");
         $response->execute();
         $this->data = $response->fetchAll(); 
         return $this;
        
     }

     public function reporte() {  
        
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `proveedores`");
        $response->execute();
        
        return $response;
        
        
    }

     public function mostrar($key, $value){
        
         $conexion = $this->conexion();
         $sql = $conexion->prepare("SELECT * FROM `proveedores` WHERE `$key` = $value");
         $sql->execute();
         $this->data = $sql->fetchAll();
         return $this;
        
     }
    
     public function  guardar($data){
         
        $conexion = $this->conexion();
        $sql = $conexion->query("SELECT count(*) FROM `proveedores` WHERE `rif`='".$data["rif"]."' ");
        
        if ($sql->fetchColumn() > 0) {
        
            $mensaje="proveedores/crear"; 
            error($mensaje);
    
            die();
            }else{

                $conexion = $this->conexion();
                $this->data = $conexion->query("INSERT INTO `proveedores` (`id`, `nombres`, `rif`, `telefono`, `direccion`) VALUES 
                (NULL,
                '".$data["nombres"]."',       
                '".$data["rif"]."', 
                '".$data["telefono"]."', 
                '".$data["direccion"]."');");

                return $this->data;
        }
     }
    
     public function eliminar($id){
        
         $conexion = $this->conexion();
        
         $sql= $conexion->prepare("DELETE FROM proveedores WHERE id=:id");
         $sql->bindParam(':id', $id);
         $response = $sql->execute();
         return $response;        
        
     }
    
     public function actualizar($id, $data){
        
         $conexion = $this->conexion();
         $sql= $conexion->prepare("UPDATE proveedores SET nombres=:nombres , rif=:rif , telefono=:telefono , direccion=:direccion WHERE id=:id");
        
         $sql->bindParam(':id',$id);
         $sql->bindParam(':nombres',$data['nombres']);        
         $sql->bindParam(':rif',$data['rif']);
         $sql->bindParam(':telefono',$data['telefono']);
         $sql->bindParam(':direccion',$data['direccion']);
        $response = $sql->execute();
        return $response;        
        
     }
    
     public function get(){
         return $this->data;
     }

     public function first2() 
     {
         return empty($this->data) ? false : $this->data[0];
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