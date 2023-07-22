<?php

if(!class_exists("bd")) require("modelo/bd.php");


class inventarios extends bd {

    private $data;
    
    public function listar() { 
               
        $conexion = $this->conexion(); 
        $response = $conexion->prepare("SELECT * FROM `inventarios`
         INNER JOIN `proveedores` ON inventarios.proveedores_id = proveedores.id
         INNER JOIN productos ON inventarios.productos_id = productos.id_pro
         
         INNER JOIN marcas ON productos.marcas_id = marcas.id          
        INNER JOIN tipo_vehiculos ON productos.tipo_vehiculos_id = tipo_vehiculos.id 
        INNER JOIN linea_productos ON productos.linea_productos_id = linea_productos.id");
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
        
    }

    public function reporte() { 
        
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `inventarios`
         INNER JOIN `proveedores` ON inventarios.proveedores_id = proveedores.id
         INNER JOIN productos ON inventarios.productos_id = productos.id_pro
         INNER JOIN marcas ON productos.marcas_id = marcas.id 
        INNER JOIN tipo_vehiculos ON productos.tipo_vehiculos_id = tipo_vehiculos.id 
        INNER JOIN linea_productos ON productos.linea_productos_id = linea_productos.id");
        $response->execute();
        return $response;
        
    }
    
    public function listarProveedores() {  
        try{
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `proveedores`");
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
        }catch (Exception $e){
            echo 'Error: ',  $e->getMessage();
        }
    }
    public function listarProductos()
    {
        
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM productos 
        INNER JOIN marcas ON productos.marcas_id = marcas.id 
        INNER JOIN tipo_vehiculos ON productos.tipo_vehiculos_id = tipo_vehiculos.id 
        INNER JOIN linea_productos ON productos.linea_productos_id = linea_productos.id");
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
        
    }

    public function listarLinea()
    {
        try{
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `linea_productos`");
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
        }catch (Exception $e){
            echo 'Error: ',  $e->getMessage();
        }
    }

    public function mostrar($key, $value){
        
        $conexion = $this->conexion();
        $sql = $conexion->prepare("SELECT * FROM `inventarios` WHERE `$key` = $value");
        $sql->execute();
        $this->data = $sql->fetchAll();
        return $this;
        
    }
    public function  save($data){
        
        $conexion = $this->conexion();
        $this->data = $conexion->query("INSERT INTO `inventarios` (`id_inv`, `cantidad`, `precio_unitario`, `proveedores_id`, `productos_id`) VALUES 
        (NULL,
        '".$data["cantidad"]."', 
        '".$data["precio_unitario"]."', 
        ".$data["proveedores_id"].", 
        ".$data["productos_id"].");");

        return $this->data;
        
    }
    
    public function eliminar($id){
        
        $conexion = $this->conexion();
        $sql= $conexion->prepare("DELETE FROM inventarios WHERE id_inv=:id");
        $sql->bindParam(':id', $id);
        $response = $sql->execute();
        return $response; 
              
    }
    
    public function actualizar($id_inv, $data){
        
        $conexion = $this->conexion();
        $sql= $conexion->prepare("UPDATE inventarios SET cantidad=:cantidad , precio_unitario=:precio_unitario , proveedores_id=:proveedores_id , productos_id=:productos_id WHERE id_inv=:id_inv");
        
        $sql->bindParam(':id_inv',$id_inv);
        $sql->bindParam(':cantidad',$data['cantidad']);
        $sql->bindParam(':precio_unitario',$data['precio_unitario']);
        $sql->bindParam(':proveedores_id',$data['proveedores_id']);
        $sql->bindParam(':productos_id',$data['productos_id']);
       $response = $sql->execute();
       return $response;      
        
    }
    public function restarInventario($productos_id, $data){

        $pro = $this->mostrar("productos_id",$productos_id)->first()->get();
        $nuevaCantidad = $pro["cantidad"] - $data ;

        $conexion = $this->conexion();
        $sql= $conexion->prepare("UPDATE inventarios SET cantidad=:cantidad WHERE productos_id=:productos_id");
        $sql->bindParam(':productos_id',$productos_id);
        $sql->bindParam(':cantidad',$nuevaCantidad);
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

    public function first2(){ 
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
