<?php

if(!class_exists("bd")) require("modelo/bd.php");


class registros extends bd { 

    private $data;
    
    public function listar() {  
       
        

        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `registro` INNER JOIN usuarios ON registro.idUsuario = usuarios.id ORDER BY idRegistro DESC");
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
        
    }

   

    public function verificarPermiso(int $id_user, string $nombre){

        $conexion = $this->conexion();
        $sql = $conexion->prepare("SELECT permisos.id, permisos.permiso, detalle_permisos.id_usuario, detalle_permisos.id_permiso FROM permisos  INNER JOIN detalle_permisos  ON permisos.id = detalle_permisos.id_permiso WHERE detalle_permisos.id_usuario = $id_user AND permisos.permiso = '$nombre'");

        $sql->execute();
        $this->data = $sql->fetchAll();
        return $this;

    }

    public function get(){
        return $this->data;
    }


    public function first(){
        return empty($this->data)?false:$this->data[0];
    }

}
?>