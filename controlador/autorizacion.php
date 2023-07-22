<?php


function login(){ 

  require("vista/autorizacion/login.php");
  require("modelo/usuarios.php");

  $bd = new bd();
  $usuario = new usuarios();

  $conexion = $bd->conexion();
  $sql = $conexion->query("SELECT * FROM `usuarios`");

  if(empty($sql)){
    $usuario->guardarPredeterminado();   
  }
  sleep(1); 

  vista_login("autorizacion/login", ["mensaje" => ""]);
  

  die();

 return true;
}

function acceder(){ 
  require("modelo/bd.php");
  require("vista/autorizacion/login.php");
 
  $mensaje= ' ';

  if(isset($_SESSION["id"])){
    redirect("home");
  }else  if (!empty($_POST['usuario']) and !empty($_POST['password'])){  
          $usuario = $_POST['usuario'];
          $clave = $_POST['password'];    
          
          $bd = new bd();
          $conexion = $bd->conexion();

          $sql = $conexion->query("SELECT * FROM usuarios WHERE  nombres='$usuario' AND clave='$clave'");
          $datos = $sql->fetch(PDO::FETCH_OBJ);
          
          if(empty($datos->id_rol)){
            // $mensaje = "Usuario y/o Contraseña Incorrectas";
              
            // return vista_login("autorizacion/login", ["mensaje" => $mensaje]);
  
            require("vista/accesorios/error.php");
            $mensaje = "Usuario y/o Contraseña Incorrectas";
  
            error($mensaje);
            die();
            }

          if ($datos->id_rol==1) {
              
            $_SESSION['id'] = $datos->id;
            $_SESSION['usuario'] = $datos->nombres;
            $_SESSION['rol'] = $datos->id_rol;
            
            
            redirect("home");
            return false;
            }
          if($datos->id_rol==2){
              $_SESSION['id'] = $datos->id;
              $_SESSION['usuario'] = $datos->nombres;
              $_SESSION['rol'] = $datos->id_rol;
              
              redirect("home");
              return false;
            }
            if($datos->id_rol==3){
              $_SESSION['id'] = $datos->id;
              $_SESSION['usuario'] = $datos->nombres;
              $_SESSION['rol'] = $datos->id_rol;
              
              redirect("home");
              return false;
            }
         
          }
          
        }
      
    


function logout(){
  // session_start();
  if(isset($_SESSION["id"])){
    session_destroy();
    redirect("principal");
  }else{
    alerta("No tienes una sesion activa");
    redirect("principal");

  }
}

function verificacion($ruta){ 
  session_start();
  
  if(!isset($ruta)) redirect("principal");    
  $sin_autorizacion = array("login","login/acceder","principal");
  if( !in_array($ruta, $sin_autorizacion) && !isset($_SESSION["id"])){
    redirect("principal");    
  }
  if( $ruta=="login" && isset($_SESSION["id"])){
    redirect("home");    
  }
}
?>