<?php 
    
    function vista_login($vista, $parametros=[]){
     $values = json_decode(json_encode($parametros)); 
     
?>


<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vista/assets/css/bootstrap.css">
    <link rel="shortcut icon" href="vista/assets/images/caucho.png">
    
    <link id="skin-default" rel="stylesheet" href="vista/assets/css/theme.css?ver=2.8.0">
</head>
<body>
    
<div class="container-fluid">
<div class="container">
    <div class="row">
        <div class="col-12 mt-3 d-flex justify-content-between align-items-center">
            <div>
                <img src="./vista/assets/images/logoinver.jpg" width="100px" alt="">
                <a class="navbar-brand" href="./">Invercauchos C.A.</a>
            </div>
            <a class="nav-link" href="./">Volver</a>
        </div>
    </div>
</div>
</div>

<div class="row justify-content-center">
    <div class="col-12 col-md-3 col-sm-8 mt-3 mb-3"> 
        <div class="card">
            <div class="card-header text-center">
                <h3>Ingresar al Sistema</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="?pagina=login/acceder" id="formulario">
                    <div class="form-group">
                        <label for="usuario" class="col-form-label">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingresa el usuario">
                        <p class="text-danger" id="responseUsuario"></p>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                        <p class="text-danger" id="responseClave"></p>
                    </div>
                    <input type="submit" class="btn btn-dark" name="btningresar" value="Iniciar Sesión">
                    <div class="p-1 mt-3 bg-white text-danger d-flex justify-content-center" id="mensaje"><?php echo $values->mensaje ?></div>
                </form>
            </div>
        </div>
    </div>
</div>


   

<script type="text/javascript" src="js/login.js"></script> 
</body>

</html>

<?php } ?>