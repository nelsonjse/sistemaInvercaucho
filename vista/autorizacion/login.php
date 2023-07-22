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
        <div class="container-fluid">
            <div class="row ">
                <div class="col-12 mt-3">
                    <nav class="navbar navbar-expand-lg navbar-light ">
                    <img src="./vista/assets/images/logoinver.jpg" width="100px" alt="">
                    <a class="navbar-brand" href="./">Invercauchos C.A.</a>    
                    <div class="container-fluid">
                            
                    <a class="navbar-brand" href="./"></a>    
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>                            
                                <ul class="navbar-nav ms-auto">                            
                                    <li class="nav-item">
                                        <a class="nav-link ms-auto" href="./">Volver</a>
                                    </li>                       
                                </ul>                              
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-center">        
        <div class="col-4 center mt-3 mb-3">        
            <div class="card">
                <div class="card-header text-center">
                    <h3>Ingresar al Sistema</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="?pagina=login/acceder" id="formulario" >
                        <div class = "form-group mt-2 mb-2">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control mt-2 mb-2" name="usuario" id="usuario"  placeholder="Enter usuario">
                            <p class="text-danger" id="responseUsuario"></p> 
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control mt-2 mb-2" name="password" id="password" placeholder="Password">
                            <p class="text-danger" id="responseClave"></p>
                        </div>
                        <input type="submit" class="btn btn-dark mt-2 mb-2" name="btningresar" value="Iniciar Sesion"></input>                    
                        <div class="p-1 mb-3 bg-white text-danger d-flex justify-content-lg-center" id="mensaje"><?php  echo  $values->mensaje ?></div>
                    </form>                   
                </div>                
            </div>            
        </div>
    </div>
</div>
</div>   

<script type="text/javascript" src="js/login.js"></script> 
</body>

</html>

<?php } ?>