<?php
if(!class_exists("bd")) require("modelo/bd.php");

class despachos extends bd {

    private $data;
    
    public function listar($campo="id",$id=false) {
           
        $conexion = $this->conexion();
        if($id){
            $response = $conexion->prepare("SELECT * FROM `orden_despachos`  WHERE $campo = $id");
        }else{
            $response = $conexion->prepare("SELECT * FROM orden_despachos INNER JOIN clientes ON orden_despachos.cliente_fk = clientes.id_cliente;"); 
        }
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
    }
    public function guardar($data){
        $conexion = $this->conexion();
        $conexion->query("INSERT INTO `orden_despachos` (`id`, `estado`,`usuario`,`cliente_fk`) VALUES (NULL, 'aprobado', '".$data["usuario"]."','".$data["cliente_fk"]."');");
        
        $last_id = $conexion->lastInsertId();
        return $last_id;
    }
    public function actualizar($id, $data){
        $conexion = $this->conexion();
        $sql= $conexion->prepare("UPDATE orden_despachos SET productos_id=:productos_id, cantidad=:cantidad  WHERE id=:id");
        $sql->bindParam(':productos_id',$data['productos_id']);        
        $sql->bindParam(':cantidad',$data['cantidad']);
        $response = $sql->execute();
        return $response;        
    }
    public function detalles ($key, $value){ 
        $conexion = $this->conexion();
        $sql = $conexion->prepare("SELECT * FROM orden_despachos WHERE $key = $value");
        $sql->execute();
        $this->data = $sql->fetchAll(); 
        return $this;
    }

    public function productosDetalles($id){
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `detalle_orden_despachos` INNER JOIN productos ON detalle_orden_despachos.productos_id = productos.id_pro  
        INNER JOIN linea_productos ON productos.linea_productos_id = linea_productos.id
        INNER JOIN marcas ON productos.marcas_id = marcas.id 
        INNER JOIN tipo_vehiculos ON productos.tipo_vehiculos_id = tipo_vehiculos.id
        WHERE orden_despachos_id = $id" );
        $response->execute();
        $this->data = $response->fetchAll();
        return $this; 
    }

    public function nombreProducto($id){
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `detalle_orden_despachos`  WHERE orden_despachos_id = $id" );
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
    }

    public function eliminar($id){
        $conexion = $this->conexion();
        
        $sql= $conexion->prepare("DELETE FROM orden_despachos WHERE id=:id");
        $sql->bindParam(':id', $id);
        $response = $sql->execute();
        return $response;        
    }
    public function mostrar($key, $value){ 
        $conexion = $this->conexion();
        $sql = $conexion->prepare("SELECT * FROM `orden_despachos` WHERE `$key` = $value");
        $sql->execute();
        $this->data = $sql->fetchAll();
        return $this;
    }

    public function finalizarOrden($id){
        $conexion = $this->conexion();
        $sql= $conexion->prepare("UPDATE orden_despachos SET estado = 'aprobado' WHERE id=".number_format($id));
        $response = $sql->execute();
        return $response;        
    }

    //PRODUCTOS ORDENES   EDITADO
    public function listarProductos(){
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `detalle_orden_despachos`  WHERE orden_despachos_id = " . $this->data["id"]);
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
    }
    public function buscarProducto($campo = "id", $id = false){
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `detalle_orden_despachos` WHERE $campo = $id");
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
    }
    public function agregarProducto($data){
        $conexion = $this->conexion();
        $this->data = $conexion->query("INSERT INTO `detalle_orden_despachos` (`id`, `orden_despachos_id`, `productos_id`, `cantidad`) VALUES 
        (NULL,
        ".$data["orden_despachos_id"].",         
        ".$data["productos_id"].",         
        ".$data["cantidad"].");"); 
       return $this->data;
    }
    public function actualizarProducto($id, $data){
        $conexion = $this->conexion();
        $sql = $conexion->prepare("UPDATE `detalle_orden_despachos` SET `cantidad` = '".$data['cantidad']."' WHERE `detalle_orden_despachos`.`id` = ".$id);
        $response = $sql->execute();
        return $response;        
    }
    public function eliminarProducto(){
        $conexion = $this->conexion();
        
        $sql= $conexion->prepare("DELETE FROM detalle_orden_despachos WHERE id=".$this->data["id"]);
        $sql->bindParam(':id', $id);
        $response = $sql->execute();
        return $response;        
    }

    public function eliminarProductoPorOrden(){
        $conexion = $this->conexion();
        
        $sql= $conexion->prepare("DELETE FROM detalle_orden_despachos WHERE orden_despachos_id=".$this->data["id"]);
        $response = $sql->execute();
        return $response;        
    }


   //Reportes

    public function reporte() {  
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `orden_despachos`         
        ");
        $response->execute();
        return $response;
    }
    public function get(){
        return $this->data;
    }

    public function first2(){
        return empty($this->data)?false:$this->data[0];
    }

    public function first(){
        $this->data = $this->data[0];
        return $this; 
    }

    public function verificarPermiso(int $id_user, string $nombre){

        $conexion = $this->conexion();
        $sql = $conexion->prepare("SELECT permisos.id, permisos.permiso, detalle_permisos.id_usuario, detalle_permisos.id_permiso FROM permisos  INNER JOIN detalle_permisos  ON permisos.id = detalle_permisos.id_permiso WHERE detalle_permisos.id_usuario = $id_user AND permisos.permiso = '$nombre'");

        $sql->execute();
        $this->data = $sql->fetchAll();
        return $this;

    }
    
}
