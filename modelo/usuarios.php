<?php

require("modelo/bd.php");


class usuarios extends bd {

    private $data;
    
    public function listarModelo() {  
       
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `usuarios`");
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
        
    }

    public function listar() {  
       
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `usuarios`  INNER JOIN `rol` ON usuarios.id_rol = rol.id_r");
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
        
    }

    public function mostrar($key, $value){
        
        $conexion = $this->conexion();
        $sql = $conexion->prepare("SELECT * FROM `usuarios` WHERE `$key` = $value");
        $sql->execute();
        $this->data = $sql->fetchAll(); 
        return $this;
        
    }

    public function listarRol() {  
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `rol`");
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
    }
    
    public function  guardar($data){
        $conexion = $this->conexion();
        $sql = $conexion->query("SELECT count(*) FROM `usuarios` WHERE `cedula`='".$data["cedula"]."' ");
        
        if ($sql->fetchColumn() > 0) {
        
            $mensaje="guardar"; 
            error($mensaje);
    
            die();
            }else{
            $conexion = $this->conexion();
            $this->data = $conexion->query("INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `correo`, `clave`, `cedula`, `id_rol`) VALUES 
            (NULL,
            '".$data["nombres"]."', 
            '".$data["apellidos"]."', 
            '".$data["correo"]."', 
            '".$data["clave"]."', 
            '".$data["cedula"]."', 
            '".$data["id_rol"]."');");

        return $this->data;
            }
    }
    public function  guardarPredeterminado(){
        
        $conexion = $this->conexion();
        $this->data = $conexion->query("INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `correo`, `clave`, `cedula`)
         VALUES (NULL, 'admin', 'admin', 'admin@admin.com', 'admin123', '00000000');");

       return;
    }
    
    public function eliminar($id){
        
        $conexion = $this->conexion();
        
        $sql= $conexion->prepare("DELETE FROM usuarios WHERE id=:id");
        $sql->bindParam(':id', $id);
        $response = $sql->execute();
        return $response;      
        
    }
    
    public function actualizar($id, $data){
        
        $conexion = $this->conexion();
        $sql= $conexion->prepare("UPDATE usuarios SET nombres=:nombres , apellidos=:apellidos , correo=:correo , clave=:clave , cedula=:cedula, id_rol=:id_rol WHERE id=:id");
        
        $sql->bindParam(':id',$id);
        $sql->bindParam(':nombres',$data['nombres']);
        $sql->bindParam(':apellidos',$data['apellidos']);
        $sql->bindParam(':correo',$data['correo']);
        $sql->bindParam(':clave',$data['clave']);
        $sql->bindParam(':cedula',$data['cedula']);
        $sql->bindParam(':id_rol',$data['id_rol']);
       $response = $sql->execute();
       return $response;     
         
    }

    

    public function listarPermiso() {  
       
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `permisos`");
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
        
    }

    public function registrarPermisos(int $id_user, int $id_permiso){
        $conexion = $this->conexion();
        $this->data = $conexion->query("INSERT INTO detalle_permisos (id_usuario, id_permiso) VALUES ($id_user, $id_permiso)");
       $data =  $this->data;
        
        if($data == 1){
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
           
    }
    
    public function eliminarPermisos(int $id_user){

        $conexion = $this->conexion();
        
        $sql= $conexion->prepare("DELETE FROM detalle_permisos WHERE detalle_permisos.id_usuario =:id");
        $sql->bindParam(':id', $id_user);
        $response = $sql->execute();
        
              
        if($response == 1){
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;     
    }

    public function detallePermiso($id_user) {  
       
        $conexion = $this->conexion();
        $response = $conexion->prepare("SELECT * FROM `detalle_permisos` WHERE detalle_permisos.id_usuario = $id_user");
        $response->execute();
        $this->data = $response->fetchAll();
        return $this;
        
    }

    // public function verificarPermiso(int $id_user, string $nombre){

    //     $conexion = $this->conexion();
    //     $sql = $conexion->prepare("SELECT permisos.id, permisos.permiso, detalle_permisos.id_usuario, detalle_permisos.id_permiso FROM permisos  INNER JOIN detalle_permisos  ON permisos.id = detalle_permisos.id_permiso WHERE detalle_permisos.id_usuario = $id_user AND permisos.permiso = '$nombre'");

    //     $sql->execute();
    //     $this->data = $sql->fetchAll();
    //     return $this;

    // }

       
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

    // public function verifyLogin($nombre,$password){
    //     $this->nombres = $nombres;
    //     $this->clave= $password;

    //     $info = $this->buscarUsuario();

    //     foreach($info as $usuario){
    //         var_dump($usuario);
    //     }
    // }

    // public function buscarUsuario(){
    //     $conexion = $this->conexion();
    //     $sql = "SELECT * FROM usuarios WHERE nombres = '$this->nombre'";
    //     $consulta = $conexion->prepare($sql);
    //     $consulta->execute();
    //     $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
    //     return $objetoConsulta;
    // }

}
?>