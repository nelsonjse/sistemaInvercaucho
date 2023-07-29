<?php

require("modelo/usuarios.php");
require("vista/accesorios/vista.php");
require("vista/accesorios/vista_limpia.php");
require("vista/accesorios/error.php");
// require("login.php");
// $ics = new Starter();

// if(isset($_POST['action']) && $_POST['action'] == 'login'){
//     $instancia = new usuarios();
//     $instancia->verifyLogin($_POST['nombre'],$_POST['password']);
//   }

      function listar()
    {
        $usuario = new usuarios();
        $id_user = $_SESSION['id'];
        $verificar = $usuario->verificarPermiso($id_user, 'mantenimiento')->get(); 

        if(!empty($verificar)){
        try{
        $usuario = new usuarios();
        $usuarios = $usuario->listar()->get(); 
        vista("usuario/usuario", [
            "usuarios" => $usuarios,  
            
            "values" => "usuarios"         
        ]);
        }catch(Exception $e){            
            $mensaje = "listar";   
            error($mensaje);
        }
        }else{
        $mensaje = "Acceso Denegado";   
        error($mensaje);        
        }  
    }

      function crear()
    {
        $usuario = new usuarios();
        $id_user = $_SESSION['id'];
        $verificar = $usuario->verificarPermiso($id_user, 'mantenimiento')->get(); 

        if(!empty($verificar)){
        $usuario = new usuarios();
        $rol = $usuario->listarRol()->get();
        vista("usuario/usuarioGuardar", [
            "roles" => $rol,
            "texto" => "Guardar",
        ]);
        }else{
        $mensaje = "Acceso Denegado";   
        error($mensaje);        
        }  
    }

    function usuariosPerfil(){
        $usuario = new usuarios();
        $rol = $usuario->listarRol()->get(); 
        $usuarios = $usuario->mostrar("id", $_GET["id"])->first2();
        

        
        vista("usuario/perfil", [ 
            "roles" => $rol,
            "usuario" => $usuarios,
        ]);


       
    }

      function guardar() 
    {
    try{
        $usuario = new usuarios();

        $response = $usuario->guardar([
            "nombres" => $_POST["nombre"],
            "apellidos" => $_POST["apellido"],
            "cedula" => $_POST["cedula"],
            "clave" => $_POST["clave"],
            "correo" => $_POST["correo"],
            "id_rol" => $_POST["id_rol"],
        ]);     
       
        redirect("usuarios");
    }catch(Exception $e){
            
        $mensaje = "usuarios/crear";   
        error($mensaje);
        }
    }

      function mostrar()
    {
        try{ 
        $usuario = new usuarios();
        $rol = $usuario->listarRol()->get(); 
        $usuarios = $usuario->mostrar("id", $_GET["id"])->first2();
        

        
        vista("usuario/usuariosActualizar", [ 
            "roles" => $rol,
            "usuario" => $usuarios,
        ]);
    }catch(Exception $e){
            
        $mensaje = "usuarios";   
        error($mensaje);
        }
    }

      function actualizar()
    {
        try{
        $usuario = new usuarios();       
        $response = $usuario->actualizar($_GET["id"], [
            "nombres" => $_POST["nombre"],
            "apellidos" => $_POST["apellido"],
            "correo" => $_POST["correo"],
            "cedula" => $_POST["cedula"],
            "clave" => $_POST["clave"],
            "id_rol" => $_POST["id_rol"],
        ]);
        redirect("usuarios");
    }catch(Exception $e){
            
        $mensaje = "usuarios";   
        error($mensaje);
        }


        
    }

      function eliminar()
    {
        try{
        $usuario = new usuarios();
        $response = $usuario->mostrar("id", $_GET["id"])->first();
        $response = $usuario->eliminar($_GET["id"]);
        redirect("usuarios");
    }catch(Exception $e){
            
        $mensaje = "usuarios";   
        error($mensaje);
        }
    }

    function listarPermisos()
    {
        try{ 
        $usuario = new usuarios();
        $permisos = $usuario->listarPermiso()->get();
        $detalles = $usuario->detallePermiso($_GET["id"])->get();
        $asignados = array();
            foreach($detalles as $detalle){
                $asignados[$detalle['id_permiso']] = true;
            }

        $usuarios = $usuario->mostrar("id", $_GET["id"])->first2();   
        vista("usuario/permisos", [ 
            "permisos" => $permisos,
            "usuario" => $usuarios,
            "asignados" => $asignados,
        ]);
    }catch(Exception $e){
            
        $mensaje = "usuarios";   
        error($mensaje);
        }
    }

    
    
    function registrarPermiso(){
        $usuario = new usuarios();
        $msg = '';
        $id_user = $_POST['id_usuario'];
        
        $eliminar = $usuario->eliminarPermisos($id_user);
        if($eliminar == 'ok'){
            foreach($_POST['permisos'] as $id_permiso){
                $msg = $usuario->registrarPermisos($id_user, $id_permiso);
                if($msg == 'ok'){
                    $msg = array('msg' => 'Permiso Asignado', 'icono' => 'success');

                }else{
                    $msg = array('msg' => 'Permiso Denegado', 'icono' => 'error');
                }
            }
        }else{
            $msg = array('msg' => 'Error al eliminar los permisos anteriores', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        
    }



?>