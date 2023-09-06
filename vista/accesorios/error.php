<?php 

    function error($vista){
     
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <base href="" >
        <meta charset="utf-8">
        <meta name="author" content="Softnio">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
        <!-- Fav Icon  -->
        <link rel="shortcut icon" href="vista/assets/images/caucho.png">
        <!-- Page Title  -->
        <title>Invercauchos</title>


        <script src="vista/assets/js/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="vista/assets/css/sweetalert2.min.css">
        <!-- StyleSheets  -->
        <link rel="stylesheet" href="vista/assets/css/dashlite.css?ver=2.8.0">
        <link id="skin-default" rel="stylesheet" href="vista/assets/css/theme.css?ver=2.8.0">
        

        
    </head>
    <body class="nk-body bg-white npc-default has-aside ">
        
        <!-- app-root @e -->
        <!-- JavaScript -->
        <script src="vista/assets/js/bundle.js?ver=2.8.0"></script>
        <script src="vista/assets/js/scripts.js?ver=2.8.0"></script>
        

<?php 


if($vista == "listar"){
    echo "<script>
    Swal.fire({
        icon: 'info',
        title: 'Oops... Ocurrio un error al mostrar lista',
        text: 'Error en la base de datos ',
        grow:'fullscreen',
        showDenyButton: true,
        
        confirmButtonText: 'Regresar al inicio',
        
      }).then((result) => {
        
        if (result.isConfirmed) {
          window.location='?pagina=home'
        }
      })
    
    </script>";
}else if($vista == "Usuario y/o Contraseña Incorrectas"){
    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Usuario y/o Contraseña Incorrectas',
        text: '',
        
        showDenyButton: true,
        
        confirmButtonText: 'Reintentar',
        
      }).then((result) => {
        
        if (result.isConfirmed) {
          window.location='?pagina=login'
        }
      })
    
    </script>";
}else if($vista == "errorCopia"){
  echo "<script>
  Swal.fire({
      icon: 'error',
      title: 'Ocurrio un error al intentar respaldar',
      text: '',
      
      showDenyButton: true,
      
      confirmButtonText: 'ok',
      
    }).then((result) => {
      
      if (result.isConfirmed) {
        window.location='?pagina=backup'
      }
    })
  
  </script>";
}
else if($vista == "error"){
  echo "<script>
  Swal.fire({
      icon: 'info',
      title: 'Oops... Ocurrio un error',
      text: 'Error en la base de datos ',
      grow:'fullscreen',
      showDenyButton: true,
      
      confirmButtonText: 'Regresar',
      
    }).then((result) => {
      
      if (result.isConfirmed) {
        window.location='?pagina=home'
      }
    })
  
  </script>";
} 
else if($vista == "guardar"){
  echo "<script>
  Swal.fire({
      icon: 'info',
      title: 'Ya existe!',
      text: 'Intente de nuevo',
      
      showDenyButton: true,
      
      confirmButtonText: 'Reintentar',
      
    }).then((result) => {
      
      if (result.isConfirmed) {
        window.location='?pagina=$vista'
      }
    })
  
  </script>";
}
else if($vista == "Acceso Denegado"){
  echo "<script>
  Swal.fire({
      icon: 'info',
      title: 'Acceso Denegado',
      text: 'Consulte con su administrador',
      grow:'fullscreen',
      showDenyButton: true,
      
      confirmButtonText: 'Regresar a Home',
      
    }).then((result) => {
      
      if (result.isConfirmed) {
        window.location='?pagina=home'
      }
    })
  
  </script>";
} else if($vista == "bitacora"){
  echo "<script>
  Swal.fire({
      icon: 'error',
      title: 'Ocurrio un error mostrar bitacora',
      text: '',
      
      showDenyButton: true,
      
      confirmButtonText: 'ok',
      
    }).then((result) => {
      
      if (result.isConfirmed) {
        window.location='?pagina=home'
      }
    })
  
  </script>";
}


    
?>


        
    
    </body>
    </html>
<?php }?>



