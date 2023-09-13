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

            $_SESSION['id'] = $datos->id;
            $_SESSION['usuario'] = $datos->nombres;
            $_SESSION['rol'] = $datos->id_rol;

            
            
           
            $sql ="INSERT INTO registro (idUsuario, fechaEntrada, horaEntrada) VALUES ($datos->id, NOW(), NOW())";
            $stmt = $conexion->prepare($sql);             
            $stmt->execute();
            

            $sql2 = $conexion->query("SELECT * FROM registro ORDER BY idRegistro DESC LIMIT 1;");
            $datos2 = $sql2->fetch(PDO::FETCH_OBJ);
            
            $_SESSION['idRegistroIniciado'] = $datos2->idRegistro;

            redirect("home");
            
            return false;
            

          
         
          }
          
        }
      
    
       

function logout(){
  require("modelo/bd.php");
  
  if(isset($_SESSION["id"])){

    $bd = new bd();
    $conexion = $bd->conexion();
    
    
    
    $idRegistroIniciado = $_SESSION['idRegistroIniciado'];
  
    $sql = "UPDATE registro SET fechaSalida = NOW(), horaSalida = NOW() WHERE idRegistro = $idRegistroIniciado";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    
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