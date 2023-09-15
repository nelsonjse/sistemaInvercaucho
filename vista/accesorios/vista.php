<?php 

    function vista($vista, $parametros=[]){
     $values = json_decode(json_encode($parametros)); 

     
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
      
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
        

        <script src="vista/assets/js/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="vista/assets/css/sweetalert2.min.css">
        <!-- StyleSheets  -->
        <link rel="stylesheet" href="vista/assets/css/dashlite.css?ver=2.8.0">
        <link id="skin-default" rel="stylesheet" href="vista/assets/css/theme.css?ver=2.8.0">
        

        
    </head>
    <body class="nk-body bg-white npc-default has-aside ">
        <div class="nk-app-root">
            <!-- main @s -->
            <div class="nk-main ">
                <!-- wrap @s -->
                <div class="nk-wrap ">
                    <?php require 'header.php'; ?>
                    <!-- main header @e -->
                    <!-- content @s -->
                    <div class="nk-content ">
                        <div class="container wide-xl">
                            <div class="nk-content-inner">
                                <?php 
                                
                                if($_SESSION['rol']==1){
                                    require 'menu.php';
                                }
                                if($_SESSION['rol']==2){
                                    require 'menu.php';
                                }
                                if($_SESSION['rol']==3){
                                    require 'menu2.php';
                                }
                                    
                                
                                
                              ?> 
                                <div class="nk-content-body">
                                
                                    <?php require 'vista/'.$vista.".php"?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content @e -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- main @e -->
        </div>
        <!-- app-root @e -->
        <!-- JavaScript -->
        <script src="vista/assets/js/bundle.js?ver=2.8.0"></script>
        <script src="vista/assets/js/scripts.js?ver=2.8.0"></script>
        
    
    </body>
    </html>
<?php }?>

<?php function alerta($mensaje){
    echo " <script> alert('".$mensaje."');</script>";
}?>



