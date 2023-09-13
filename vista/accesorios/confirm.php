<?php 

    function confirmar($vista){
     
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
$response = $vista;

if($response == "despachos"){
  echo "<script>
  Swal.fire({
    
    icon: 'success',
    title: 'Despacho Anulado',
    showConfirmButton: false,
    timer: 1500
  });
  setTimeout( function() {
    window.location.href ='?pagina=despachos';
},1500);
  </script>";

}else if($response == "copia"){
  echo "<script>
  Swal.fire({
    
    icon: 'success',
    title: 'Respaldo de Base de Datos',
    text: 'Copia de Seguridad Realizada Exitosamente ',
    
    showConfirmButton: false,
    
    timer: 2000
    
    
  });
    
  setTimeout( function() {
      window.location='?pagina=backup'
    }, 2000);
  
  </script>";
}
else if($response){
  echo "<script>
  Swal.fire({
    
    icon: 'success',
    title: 'Despacho',
    text: 'Despacho Agregado Exitosamente ',
    
    showConfirmButton: false,
    
    timer: 2000
    
    
  });
    
  setTimeout( function() {
      window.location='?pagina=despachos/crear&id=$response'
    }, 2000);
  
  </script>";
}




    
?>


        
    
    </body>
    </html>
<?php }?>



