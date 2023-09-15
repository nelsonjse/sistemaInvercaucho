<?php

 require("modelo/bd.php");


 class rol extends bd {

     private $data;
    
     public function listar() {  
        
         $conexion = $this->conexion();
         $response = $conexion->prepare("SELECT * FROM `rol`");
         $response->execute();
         $this->data = $response->fetchAll(); 
         return $this;
        
     }

     public function mostrar($key, $value){
        
         $conexion = $this->conexion();
         $sql = $conexion->prepare("SELECT * FROM `rol` WHERE `$key` = $value");
         $sql->execute();
         $this->data = $sql->fetchAll();
         return $this;
        
     }
    
     public function  guardar($data){
         
        $conexion = $this->conexion();
        $sql = $conexion->query("SELECT count(*) FROM `rol` WHERE `descripcion`='".$data["descripcion"]."' ");
        
        if ($sql->fetchColumn() > 0) {
        
            $mensaje="roles/crear"; 
            error($mensaje);
    
            die();
            }else{

                $conexion = $this->conexion();
                $this->data = $conexion->query("INSERT INTO `rol` (`id_r`, `descripcion`) VALUES 
                (NULL,
                
                '".$data["descripcion"]."');");

                return $this->data;
        }
     }
    
     public function eliminar($id){
        
         $conexion = $this->conexion();
        
         $sql= $conexion->prepare("DELETE FROM rol WHERE id_r=:id");
         $sql->bindParam(':id', $id);
         $response = $sql->execute();
         return $response;        
        
     }
    
     public function actualizar($id, $data){
        
         $conexion = $this->conexion();
         $sql= $conexion->prepare("UPDATE rol SET descripcion=:descripcion WHERE id_r=:id");
        
         $sql->bindParam(':id',$id);
         $sql->bindParam(':descripcion',$data['descripcion']);        
         
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