<?php

if(!class_exists("bd")) require("modelo/bd.php");

class productos extends bd {

    private $data; 

    public function listar()
    {
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM productos 
        INNER JOIN marcas ON productos.marcas_id = marcas.id 
        INNER JOIN tipo_vehiculos ON productos.tipo_vehiculos_id = tipo_vehiculos.id 
        INNER JOIN linea_productos ON productos.linea_productos_id = linea_productos.id;");
        $response->execute(); 
        $this->data = $response->fetchAll();
        return $this;
    }
    public function mostrar($campo="id_pro", $id=false)
    {
        $conexion = $this->conexion();
        if($id){
            $response = $conexion->prepare("SELECT * FROM `productos` WHERE `$campo` = $id");
        }else{
            $response = $conexion->prepare("SELECT * FROM `productos`");
        }

        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
    }
    public function listarMarcas() {  
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `marcas`");
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
    }
    public function listarVehiculos() {  
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `tipo_vehiculos`");
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
    }
    public function listarLineas() {  
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `linea_productos`");
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
    }

        public function  guardar($data){
        $conexion = $this->conexion();
        $sql = $conexion->query("SELECT count(*) FROM `productos` WHERE `descripcion`='".$data["descripcion"]."'");
        

        if ($sql->fetchColumn() > 0) {
        
            $mensaje="productos/crear";
            error($mensaje);
    
            die();
            }else{

        $conexion = $this->conexion();
        $this->data = $conexion->query("INSERT INTO `productos` (`id_pro`,  `descripcion`, `linea_productos_id`, `marcas_id`, `tipo_vehiculos_id`) VALUES 
        (NULL,
        
        '".$data["descripcion"]."', 
        ".$data["linea_productos_id"].", 
        ".$data["marcas_id"].", 
        ".$data["tipo_vehiculos_id"].");"); 

        return $this->data;
            }
    }

   

    public function eliminar($id_pro)
    {
        $conexion = $this->conexion();
        $sql = $conexion->prepare("DELETE FROM productos WHERE id_pro=:id_pro");
        $sql->bindParam(':id_pro', $id_pro);
        $response = $sql->execute();
        return $response;
    }

    public function actualizar($id_pro, $data)
    {
        $conexion = $this->conexion();
        $sql = $conexion->prepare("UPDATE productos SET descripcion=:descripcion,marcas_id=:marcas_id,linea_productos_id=:linea_productos_id,tipo_vehiculos_id=:tipo_vehiculos_id WHERE id_pro=:id_pro");

        $sql->bindParam(':id_pro', $id_pro);       
        $sql->bindParam(':descripcion', $data['descripcion']);
        $sql->bindParam(':marcas_id', $data['marcas_id']);
        $sql->bindParam(':linea_productos_id', $data['linea_productos_id']);
        $sql->bindParam(':tipo_vehiculos_id', $data['tipo_vehiculos_id']);

        $response = $sql->execute();
        return $response;
    }

    public function get(){
        return $this->data;
    }


    public function first(){
        $this->data = $this->data[0];
        return $this;
    }

    public function first2() 
    {
        return empty($this->data) ? false : $this->data[0];
    }

    public function verificarPermiso(int $id_user, string $nombre){

        $conexion = $this->conexion();
        $sql = $conexion->prepare("SELECT permisos.id, permisos.permiso, detalle_permisos.id_usuario, detalle_permisos.id_permiso FROM permisos  INNER JOIN detalle_permisos  ON permisos.id = detalle_permisos.id_permiso WHERE detalle_permisos.id_usuario = $id_user AND permisos.permiso = '$nombre'");

        $sql->execute();
        $this->data = $sql->fetchAll();
        return $this;

    }
}































/////////////////YO
// if(!class_exists("bd")) require("modelo/bd.php");


// class productos extends bd
// {

//     private $data;

//     public function listar()
//     {
        
//         $conexion = $this->conexion();
//         $response = $conexion->prepare("SELECT * FROM productos 
//         INNER JOIN marcas ON productos.marcas_id = marcas.id 
//         INNER JOIN tipo_vehiculos ON productos.tipo_vehiculos_id = tipo_vehiculos.id 
//         INNER JOIN linea_productos ON productos.linea_productos_id = linea_productos.id;");
//         $response->execute();
//         $this->data = $response->fetchAll();
//         return $this;
        
//     }
//     public function listarMarcas() {  
        
//         $conexion = $this->conexion();
//         $response = $conexion->prepare("SELECT * FROM `marcas`");
//         $response->execute();
//         $this->data = $response->fetchAll();
//         return $this;
        
//     }
//     public function listarVehiculos() {  
        
//         $conexion = $this->conexion();
//         $response = $conexion->prepare("SELECT * FROM `tipo_vehiculos`");
//         $response->execute();
//         $this->data = $response->fetchAll();
//         return $this;
        
//     }
//     public function listarLineas() {  
        
//         $conexion = $this->conexion();
//         $response = $conexion->prepare("SELECT * FROM `linea_productos`");
//         $response->execute();
//         $this->data = $response->fetchAll();
//         return $this;
        
//     }


//     public function mostrar($campo="id_pro", $id=false)
//     {
//         $conexion = $this->conexion();
//         if($id){
//             $response = $conexion->prepare("SELECT * FROM `productos` WHERE `$campo` = $id");
//         }else{
//             $response = $conexion->prepare("SELECT * FROM `productos`");
//         }

//         $response->execute();
//         $this->data = $response->fetchAll();
//         return $this;
//     }

    

//     public function  guardar($data){
//         $conexion = $this->conexion();
//         $sql = $conexion->query("SELECT count(*) FROM `productos` WHERE `descripcion`='".$data["descripcion"]."'");
        

//         if ($sql->fetchColumn() > 0) {
        
//             $mensaje="productos/crear";
//             error($mensaje);
    
//             die();
//             }else{

//         $conexion = $this->conexion();
//         $this->data = $conexion->query("INSERT INTO `productos` (`id_pro`,  `descripcion`, `linea_productos_id`, `marcas_id`, `tipo_vehiculos_id`) VALUES 
//         (NULL,
        
//         '".$data["descripcion"]."', 
//         ".$data["linea_productos_id"].", 
//         ".$data["marcas_id"].", 
//         ".$data["tipo_vehiculos_id"].");");

//         return $this->data;
//             }
//     }

//     public function eliminar($id_pro)
//     {
        
//         $conexion = $this->conexion();
//         $sql = $conexion->prepare("DELETE FROM productos WHERE id_pro=:id_pro");
//         $sql->bindParam(':id_pro', $id_pro);
//         $response = $sql->execute();
//         return $response;
        
//     }

//     public function actualizar($id_pro, $data)
//     {
        
//         $conexion = $this->conexion();
//         $sql = $conexion->prepare("UPDATE productos SET descripcion=:descripcion,marcas_id=:marcas_id,linea_productos_id=:linea_productos_id,tipo_vehiculos_id=:tipo_vehiculos_id WHERE id_pro=:id_pro");

//         $sql->bindParam(':id_pro', $id_pro);
        
//         $sql->bindParam(':descripcion', $data['descripcion']);
//         $sql->bindParam(':marcas_id', $data['marcas_id']);
//         $sql->bindParam(':linea_productos_id', $data['linea_productos_id']);
//         $sql->bindParam(':tipo_vehiculos_id', $data['tipo_vehiculos_id']);

//         $response = $sql->execute();
//         return $response;
        
//     }

//     public function get()
//     {
//         return $this->data;
//     }


//     public function first()
//     {
//         return empty($this->data) ? false : $this->data[0];
//     }
// }
?>